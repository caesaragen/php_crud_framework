<?php


class product{
//three simple actions

//return all the comments
    function all(){
        //use the model to get all the comments from the database
        $products=product_model::all();
        require_once("view/product/index.php");
    }


    //AJAX
    function showAll(){
        $products=product_model::all();
        // dump the products to the browser
        require_once("view/product/showProducts.php");
    }

//delete a comment
    function delete(){
        //read the id passed over query string
        if(isset($_GET["id"]))
            $id=$_GET["id"];
//execute the delete command on the model
        $product=product_model::delete($id);
//return a simple view of confirming the deletion
        require_once("view/product/delete.php");
    }

    function addProduct(){
        $types = product_type_model::all();
        echo json_encode($types);
        require_once("view/product/add-product.php");
    }
//add a comment
    function add(){
//read the data send over post method
        if(isset($_POST["name"]) ) {
            $name = $_POST["name"];
            $sku = $_POST["sku"];
            $type = $_POST["type"];
            $weight = $_POST["weight"];
            $height = $_POST["height"];
            $price = $_POST["price"];
            $size = $_POST["size"];
            $length = $_POST["length"];
            $product = product_model::add($name, $sku, $type, $weight, $height, $price, $size, $length);
//return the conformation of succesful insertion
            // require_once("view/product/add.php");
        }
        
        return $product;

    }
    
}
?>