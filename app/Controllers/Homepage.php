<?php

namespace App\Controllers;

use App\Models\BarangModel;


class Homepage extends BaseController
{
    public function index(): string
    {      
        $produkModel = new \App\Models\Product();
        $produkId = 3;
        $produk = $produkModel->find($produkId);
        $produkName = $produk['name'];
        $produkPrice = 1;//$produk['price']

        $items = array(
            array(
                'id'       => $produkId,
                'price'    => $produkPrice,
                'quantity' => 1,
                'name'     => $produkName
            )
        );
        // $userId = session()->get('auth')['id'];
        // $userModel = new \App\Models\User();
        // $user = $userModel->find($userId);
        // $username = $user['username'];
        // $email = $user['email'];

        // Mendapatkan ID pengguna dari sesi
        $userId = isset(session()->get('auth')['id']) ? session()->get('auth')['id'] : 10;

        // Membuat objek model pengguna
        $userModel = new \App\Models\User();

        // Mengambil data pengguna berdasarkan ID
        $user = $userModel->find($userId);

        // Mengambil nama pengguna dan email dari objek pengguna
        $username = $user['username'] ?? '';
        $email = $user['email'] ?? '';
       

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-WoTbnlo_sJ7HleYkuWOiVG3J';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        
        $params = array(
            'transaction_details' => array(
                'order_id' => time(),
                'gross_amount' => $produkPrice,
            ),
            'item_details' => $items,
            'customer_details' => array(
            'first_name' => $username,
               'last_name' => '',
               'email' => $email,
               'phone' => '',
            ),
        );
        
        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'order_id' => time(),
            'gross_amount' => $produkPrice,
            'id'       => $produkId,
            'price'    => $produkPrice,
            'quantity' => 1,
            'name'     => $produkName,
            'first_name' => $username,
            'last_name' => '',
            'email' => $email,
            'phone' => ''
        ];
        
        return view('homepage', $data);
    }

    public function tabel()
    {
        $transaksiModel = new \App\Models\Transaksi();
        $data['transaksi'] = $transaksiModel->getTransaksiData();

        return view('/tabel', $data);
    }
    public function tabelUser()
    {
        $transaksiModel = new \App\Models\Transaksi();
            // Ambil ID user dari sesi
        $userId = session()->get('auth')['id'];

        // Ambil data transaksi berdasarkan ID user
        $data['transaksi'] = $transaksiModel->getTransaksiByUserId($userId);


        // Tampilkan view dengan data yang sudah diambil
        return view('/tabelUser', $data);

    }


    public function dashadmin()
    {
        // return view('home');
        
        return view('dashadmin');
    }
    public function dashUser()
    {
        // return view('home');
        
        return view('dashUser');
    }
    public function class1()
    {
        return view('pemula');
    }

    public function class2()
    {
        return view('menengah');
    }

    public function class3()
    {
        return view('ahli');
    }

    public function simpanData()
    {
        $user_Id = session()->get('auth')['id'];
        // // Menerima data JSON dari permintaan POST
        $jsonData = file_get_contents('php://input');
        $resultData = json_decode($jsonData, true);

        // Mengambil data yang diinginkan
        $transactionId = $resultData['transaction_id'];
        $transactionTime = $resultData['transaction_time'];
        $paymentType = $resultData['payment_type'];
        $transactionStatus = $resultData['transaction_status'];
        $grossAmount = $resultData['gross_amount'];

         // Data yang akan disimpan
         $data = [
            'transaction_id' =>  $transactionId,
            'transaction_status' => $transactionStatus,
            'gross_amount' => $grossAmount,
            'payment_type' =>   $paymentType,
            'transaction_time' => date($transactionTime),
            'produk_id' => 1, // Gantilah dengan ID produk yang sesuai
            'user_id' => $user_Id // Gantilah dengan ID user yang sesuai
        ];

        // Membuat objek model transaksi
        $transaksiModel = new \App\Models\Transaksi();

        // Menyimpan data ke tabel transaksi
        $transaksiModel->insert($data);

        

        // Lakukan pembaruan level pengguna
        // Contoh: Ubah level pengguna menjadi 'premium'
        $user_Model = new \App\Models\User(); // Pastikan menggunakan model yang sesuai dengan struktur basis data
        $users = $user_Model->find($user_Id);
        if ($users) {
            $user_Model->where('id', $user_Id)->set(['leveluser' => "1"])->update();
            // atau $user->leveluser = 'premium'; $userModel->save($user);
        }

        // Redirect atau tampilkan pesan sukses sesuai dengan kebutuhan Anda
        return redirect()->to(base_url('/dashadmin'))->with('success', 'Data transaksi berhasil disimpan.');
  
    }
}