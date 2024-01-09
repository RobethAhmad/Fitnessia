<?php

namespace App\Controllers;

use App\Models\BarangModel;


class Homepage extends BaseController
{
    public function index(): string
    {
        // return view('home');

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