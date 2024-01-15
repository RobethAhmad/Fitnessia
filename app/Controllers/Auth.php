<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index_login()
    {

        $data['title'] = 'Login';

        return view('auth/login', $data);
    }

    public function kembali()
    {
        return view('homepage');
    }

    public function login()
    {

        // validate input text
        $validationRule = [
            'identity' => [
                'rules' => 'required'
            ],
            'password' => [
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error_val = array_values($error);
            die(json_encode([
                'status' => false,
                'response' => $error_val[0]
            ])); 
        }       

        // input data
        $identity = $this->request->getPost('identity');
        $password = $this->request->getPost('password');        

        // load model
        $userModel = new \App\Models\User();

        // find user
        $user = $userModel->select('id,username,password')->where('username', $identity)->orWhere('email', $identity)->first();

        // user not found.
        if (!$user) {
            return $this->response->setJSON([
                'status' => false,
                'response' => 'Account not found'   
            ]);         
        }

        // validate password
        if (!password_verify($password, $user['password'])) {
            // invalid password
            return $this->response->setJSON([
                'status' => false,
                'response' => 'Password Invalid'
            ]);     
        }

        // build data
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],            
                       
        ];

        // set session
        session()->set('auth', $data);

        // check if remember exist
        if ($this->request->getPost('remember')) {

            // load helper
            helper('aeshash');

            // set cookie
            $auth_hash = aeshash('enc', json_encode($_SESSION['auth']) , config('Encryption')->key);
            setcookie('auth', $auth_hash, time() + (86400 * 30), '/');      
        }

        // return $this->response->setJSON([
        //     'status' => true,
        //     'response' => 'Success Login',
        //     'redirect' => base_url('homepage')
        // ]);     

        return redirect()->to(base_url('homepage'));

    }

    public function index_register()
    {

        $data['title'] = 'Register';

        return view('auth/register', $data);
    }   

    public function register()
    {

        // validate input text
        $validationRule = [
            'email' => [
                'rules' => 'required|max_length[100]|valid_email|is_unique[user.email]'
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[30]|is_unique[user.username]'
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]'
            ],
            'password_confirm' => [
                'rules' => 'matches[password]'
            ]            
        ];

        if (!$this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error_val = array_values($error);
            die(json_encode([
                'status' => false,
                'response' => $error_val[0]
            ])); 
        }           

        // input data
        $data['email'] = $this->request->getPost('email');        
        $data['username'] = $this->request->getPost('username');
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $data['leveluser'] = "0";


        // load model
        $userModel = new \App\Models\User();    

        // insert data
        $register = $userModel->insert($data);

        // build data
        $data = [
            'id' => $register,
            'username' => $data['username'],                
        ];

        // set session
        session()->set('auth', $data);

        // send response
        // return $this->response->setJSON([
        //     'status' => true,
        //     'response' => 'Success Register',
        //     'redirect' => base_url('product')
        // ]); 

        return redirect()->to(base_url('login'));
    }     

    public function updateUserLevel()
    {

        $user_Id = session()->get('auth')['id'];
        $user_Model = new \App\Models\User(); 
        $users = $user_Model->find($userId);
        // Pastikan menggunakan model yang sesuai dengan struktur basis data
        // Lakukan pembaruan level pengguna
        // Contoh: Ubah level pengguna menjadi 'premium'
        
        if ($users) {
            $user_Model->where('id', $user_Id)->set(['leveluser' => "1"])->update();
            // atau $user->leveluser = 'premium'; $userModel->save($user);
        }


        // Menerima data JSON dari permintaan POST
        $jsonData = file_get_contents('php://input');
        $resultData = json_decode($jsonData, true);

        // Mengambil data yang diinginkan
        $transactionId = $resultData['transaction_id'];
        $transactionTime = $resultData['transaction_time'];
        $paymentType = $resultData['payment_type'];
        $transactionStatus = $resultData['transaction_status'];

         // Data yang akan disimpan
         $data = [
            'transaction_id' => $transactionId,
            'transaction_status' => 'success',
            'gross_amount' => 100000,
            'payment_type' =>  $paymentType,
            'transaction_time' => date( $transactionTime),
            'id_produk' => 1, // Gantilah dengan ID produk yang sesuai
            'id_user' => 2 // Gantilah dengan ID user yang sesuai
        ];

        // Membuat objek model transaksi
        $transaksiModel = new TransaksiModel();

        // Menyimpan data ke tabel transaksi
        $transaksiModel->insert($data);

        
        // Redirect atau tampilkan pesan sukses sesuai dengan kebutuhan Anda
        return redirect()->to(base_url('/dashadmin'))->with('success', 'Data transaksi berhasil disimpan.');
    }


    public function logout()
    {
        session()->remove('auth');
        setcookie('auth', null, -1, '/'); 
        return redirect()->to(base_url('login'));       
    }
}