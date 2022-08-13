<?php

class Products extends Controller
{
    /**
     * Instantiate class
     */
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    /**
     * Index method to get all products
     */
    public function index()
    {
        $products = $this->productModel->getProducts();

        $data = [
            'products' => $products,
            'title' => 'Product List',
        ];

        $this->view('pages/index', $data);
    }

    /**
     * Create Products
     */
    public function addProduct()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);

            $data = Products::productData();

            // var_dump($data);

            $data['name'] = trim($_POST['name']);

            $data['sku'] = trim($_POST['sku']);

            $data['price'] = trim($_POST['price']);

            $data['type'] = trim($_POST['type']);

            $data['length'] = trim($_POST['length']);

            $data['width'] = trim($_POST['width']);

            $data['height'] = trim($_POST['height']);

            $data['weight'] = trim($_POST['weight']);

            $data['size'] = trim($_POST['size']);

            $this->validateProduct($data);
        } else {
            $data = Products::productData();

            // var_dump($data);

            $this->view('products/addproduct', $data);
        }
    }

    /**
     * Delete Products
     */
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->productModel->deleteProduct($id);
            redirect('products');
        } else {
            $product = $this->productModel->getSingleProduct($id);

            $data = [
                'product' => $product
            ];

            $this->view('products/delete', $data);
        }
    }

    /**
     * Delete multiple products
     */
    public function deleteMultiple()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->productModel->deleteMultipleProducts($_POST['products']);
            redirect('pages/index');
        } else {
            $products = $this->productModel->getProducts();
            $data = [
                'products' => $products
            ];
            $this->view('products/deleteMultiple', $data);
        }
    }

    /**
     * Validate Products
     */

    public function validateProduct($data)
    {
        // var_dump($data);
        if (empty($data['name'])) {
            $data['name_err'] = 'Please enter name';
        }

        if (empty($data['sku'])) {
            $data['sku_err'] = 'Please enter sku';
        }

        if (empty($data['price'])) {
            $data['price_err'] = 'Please enter price';
        } elseif (!is_numeric($data['price'])) {
            $data['price_err'] = 'Please enter a valid price';
        }

        if (empty($data['type'])) {
            $data['type_err'] = 'Please enter type';
        }

        if (empty($data['name_err']) && empty($data['sku_err']) && empty($data['price_err'])) {
            if ($this->productModel->addProduct($data)) {
                flash('product_message', 'Product Added');
                redirect('products/index');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->view('products/addproduct', $data);
        }
    }

    public function productData()
    {
        $data = [
            'name' => '',
            'sku' => '',
            'price' => '',
            'type' => '',
            'length' => '',
            'width' => '',
            'height' => '',
            'weight' => '',
            'size' => '',
            'name_err' => '',
            'sku_err' => '',
            'price_err' => '',
            'type_err' => ''

        ];

        return $data;
    }
}
