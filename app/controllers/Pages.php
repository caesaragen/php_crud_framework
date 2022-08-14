<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function index()
    {

        $products = $this->productModel->getProducts();

        $data = [
            'products' => $products,
            'title' => 'Product List'
        ];
        // var_dump($data);
        $this->view('pages/index', $data);
    }
    
}
