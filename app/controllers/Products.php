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

        $this->view('index', $data);
    }

    /**
     * Create Products
     */
    public function addProduct()
    {

        $products = $this->productModel->getProducts();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = Products::productData();

            $data['name'] = trim($_POST['name']);

            $data['sku'] = trim($_POST['sku']);

            $data['price'] = trim($_POST['price']) ? trim($_POST['price']) : 0;

            $data['type'] = trim($_POST['type']);

            $data['length'] = trim($_POST['length']) ? trim($_POST['length']) : 0;

            $data['width'] = trim($_POST['width']) ? trim($_POST['width']) : 0;

            $data['height'] = trim($_POST['height']) ? trim($_POST['height']) : 0;

            $data['weight'] = trim($_POST['weight']) ? trim($_POST['weight']) : 0;

            $data['size'] = trim($_POST['size']) ? trim($_POST['size']) : 0;

            $this->validateProduct($data);
        } else {
            $data = Products::productData();

            // var_dump($data);

            $this->view('addproduct', $data, $products);
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
        $products = $this->productModel->getProducts();

        if (empty($data['name'])) {
            $data['name_err'] = 'Please enter name';
        }

        if (empty($data['sku'])) {
            $data['sku_err'] = 'Please enter sku';
        }

        //if sku already exists and is not the current product
        foreach ($products as $product) {
            if ($product->sku == $data['sku']) {
                $data['sku_err'] = 'SKU already exists';
            }
        }


        if (empty($data['price'])) {
            $data['price_err'] = 'Please enter price';
        } elseif (!is_numeric($data['price'])) {
            $data['price_err'] = 'Please enter a valid price';
        } elseif ($data['price'] <= 0) {
            $data['price_err'] = 'Please enter a positive price';
        }

        if (empty($data['type'])) {
            $data['type_err'] = 'Please enter type';
        }

        // only validate length height and width if type = 3
        if ($data['type'] == 3) {
            if (empty($data['length'])) {
                $data['length_err'] = 'Please enter length';
            } elseif (!is_numeric($data['length'])) {
                $data['length_err'] = 'Please enter a valid length';
            } elseif ($data['length'] <= 0) {
                $data['length_err'] = 'Please enter a positive length';
            }
            if (empty($data['width'])) {
                $data['width_err'] = 'Please enter width';
            } elseif (!is_numeric($data['width'])) {
                $data['width_err'] = 'Please enter a valid width';
            } elseif ($data['width'] <= 0) {
                $data['width_err'] = 'Please enter a positive width';
            }
            if (empty($data['height'])) {
                $data['height_err'] = 'Please enter height';
            } elseif (!is_numeric($data['height'])) {
                $data['height_err'] = 'Please enter a valid height';
            } elseif ($data['height'] <= 0) {
                $data['height_err'] = 'Please enter a positive height';
            }
        }
        // if(isset($data['size'])){
        //     if(!is_numeric($data['size'])) {
        //         $data['size_err'] = 'Please enter a valid size';
        //     } elseif ($data['size'] <= 0) {
        //         $data['size_err'] = 'Please enter a positive size';
        //     }
        // }
        // if(!empty($data['length']) && !is_numeric($data['length'])) {
        //     $data['length_err'] = 'Please enter a valid length';
        // } elseif ($data['length'] <= 0) {
        //     $data['length_err'] = 'Please enter a positive length';
        // }

        // if(!empty($data['width']) && !is_numeric($data['width'])) {
        //     $data['width_err'] = 'Please enter a valid width';
        // } elseif ($data['width'] <= 0) {
        //     $data['width_err'] = 'Please enter a positive width';
        // }

        if (!empty($data['height']) && !is_numeric($data['height'])) {
            $data['height_err'] = 'Please enter a valid height';
        } elseif ($data['height'] <= 0 || $data['height'] <= '0') {
            $data['height_err'] = 'Please enter a positive height';
        }

        if (empty($data['name_err']) && empty($data['sku_err']) && empty($data['price_err'])) {
            // var_dump($data);
            if ($this->productModel->addProduct($data)) {
                flash('product_message', 'Product Added');
                redirect('index');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->view('addproduct', $data);
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
