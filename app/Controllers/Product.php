<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function index()
    {

        $data['title'] = 'Product';

        return view('product', $data);
    }

    public function read()
    {
        $productModel = new \App\Models\Product();
        $products = $productModel->getDataForBootstrapTable($this->request);        
        return $this->response->setJSON($products);
    }

    private function _post_product($is_update = false)
    {

        // validate input text
        $validationRule = [
        'name' => [
        'rules' => 'required'
        ],
        'price' => [
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

        $data['name'] = $this->request->getPost('name');      
        $data['price'] = $this->request->getPost('price');    

        return $data;        
    }

    public function create()
    {

        $data = $this->_post_product();

        // insert id_user
        $data['id_user'] = session('auth')['id'];

        $productModel = new \App\Models\Product();
        $productModel->insert($data);

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success create data '.$data['name']
            ]);
    }

    private function _hash_handle()
    {
         // load helper
        helper('aeshash'); 

        return aeshash('dec', $this->request->getPost('hash') , session('auth')['id'] );
    }

    public function edit()
    {

        $id = $this->_hash_handle();

        $productModel = new \App\Models\Product();
        $product = $productModel->select('name,category,price,photo')->where('id_user', session('auth')['id'])->find($id);

        // check product
        if (!$product) {
            return $this->response->setJSON([
                'status' => false,
                'response' => 'product invalid, are you tester ?'
                ]);
        }

        // build hash
        $product['hash'] = $this->request->getPost('hash');

        return $this->response->setJSON([
            'status' => true,
            'response' => $product
            ]);
    }

    public function update()
    {

        $id = $this->_hash_handle();

        $data = $this->_post_product($id);

        $productModel = new \App\Models\Product();
        $productModel->where('id_user', session('auth')['id'])->update($id, $data);

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success update data '.$data['name']
            ]);
    }        

    public function delete()
    {

        $id = $this->_hash_handle();

        $productModel = new \App\Models\Product();

        // read first
        $product = $productModel->where('id_user', session('auth')['id'])->select('photo')->find($id);

        // check product
        if (!$product) {
            return $this->response->setJSON([
                'status' => false,
                'response' => 'product invalid, are you tester ?'
                ]);
        }

        // then delete
        if ($productModel->delete($id) AND file_exists('./uploads/'.$product['photo'])) {
            // delete photo
            unlink('./uploads/'.$product['photo']);
        }

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success delete data '.$id
            ]);
    }

    public function delete_batch()
    {
        $hash_ids = $this->request->getPost('ids');
        $hash_ids_array = explode("','", $hash_ids);
        $count = count($hash_ids_array);

        // dec hash_ids_hash > ids_array
        helper('aeshash'); 
        $ids_array = [];
        foreach ($hash_ids_array as $hash) {
            $dec = aeshash('dec', $hash , session('auth')['id'] );
            if ($dec) {
                // only valid hash insert to ids_array
                $ids_array[] = $dec;
            }
        }

        // read model
        $productModel = new \App\Models\Product();
        
        // read first
        $products = $productModel->where('id_user', session('auth')['id'])->select('id,photo')->find($ids_array);

        // check products
        if (!$products) {
            return $this->response->setJSON([
                'status' => false,
                'response' => 'product invalid, are you tester ?'
                ]);
        }        

        // then delete one by one
        foreach ($products as $product) {
            if ($productModel->delete($product['id']) AND file_exists('./uploads/'.$product['photo'])) {
                // delete photo
                unlink('./uploads/'.$product['photo']);
            }
        }

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success '. $count .' delete data '
            ]);
    }
}