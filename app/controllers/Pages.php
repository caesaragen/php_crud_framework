<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function index()
    {
        if(isLoggedIn()){
            redirect('posts');
        }

        $products = $this->productModel->getProducts();

        $data = [
            'products' => $products,
            'title' => 'Products',
            'description' => 'Simple Social Network buil on the Custom Made PHP Framework.'
        ];
        // var_dump($data);
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Abouts Us',
            'description' => 'App to share posts with users.'
        ];

        $this->view('pages/about', $data);
    }
    
}
