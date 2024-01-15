<?php

namespace App\Controllers;

use App\Models\BarangModel;


class Homepage extends BaseController
{
    public function index(): string
    {      
        $produkModel = new \App\Models\Product();
        $produkId = 1;
        $produk = $produkModel->find($produkId);
        $produkName = $produk['name'];
        $produkPrice = $produk['price'];

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
            'snapToken' => \Midtrans\Snap::getSnapToken($params)
        ];
        
        return view('homepage', $data);
    }

    public function payMidtrans()
    {
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
               'gross_amount' => 1,
           ),
           'customer_details' => array(
               'first_name' => 'Abraham',
               'last_name' => 'Abel',
               'email' => 'budi.pra@example.com',
               'phone' => '08111222333',
           ),
       );
       
       $data = [
           'snapToken' => \Midtrans\Snap::getSnapToken($params)
       ];
       
       return view('homepage', $data);
    }


    public function dashadmin()
    {
        // return view('home');
        
        return view('dashadmin');
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
}