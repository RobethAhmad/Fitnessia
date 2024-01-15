<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Transaksi extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'transaction_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = false;
 
    protected $allowedFields    = ['transaction_id', 'gross_amount', 'transaction_time', 'transaction_status', 'payment_type', 'user_id', 'produk_id'];

    public function getTransaksiData()
    {
        return $this->select('transaksi.*, product.name, user.username')
                    ->join('product', 'product.id = transaksi.produk_id')
                    ->join('user', 'user.id = transaksi.user_id')
                    ->findAll();
    }
    public function getTransaksiByUserId($userId)
    {
        return $this->select('transaksi.*, product.name, user.username')
        ->join('product', 'product.id = transaksi.produk_id')
        ->join('user', 'user.id = transaksi.user_id')
        ->where('user_id', $userId)
                    ->findAll();
    }



    // public function getData()
    // {

    //     $products = $this->select('           
    //         gross_amount
    //         transaction_id
    //         transaction_time
    //         transaction_status
    //         product.name
    //         product.price,
    //         user.username
    //         ')
    //     ->join('user', 'product', 'transaksi.user_id = user.id', 'transaksi.produk_id = produk.id')
    //     ->orderBy('id','DESC')->findAll();
 
    //     // load helper
    //     helper('number');        
 
    //     // build data
    //     $data = [];
    //     foreach ($products as $product) {
    //         $data[] = array(
    //             'id' => $product['id'],
    //             'name' => $product['name'],
    //             'price' => number_to_currency($product['price'], "IDR", "id", 0),
    //             'owner' => $product['username'],
    //             'transaction_time' => $product['transaction_time'],
    //             'status' => $product['transaction_status']
    //         );
    //     }   
 
    //     return $data;     
    // }
 
 
}