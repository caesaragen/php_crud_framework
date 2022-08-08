<?php

//a class for dealing with a object comment saving, reading and deleting it from the database
class product_model{
    public $id;
    public $name;

    public function __construct($name,$id, $sku, $type, $weight, $height, $price, $size, $length) {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->type = $type;
        $this->weight = $weight;
        $this->height = $height;
        $this->price = $price;
        $this->type = $type;
        $this->size = $size;
        $this->length = $length;

    }

    public static function get($product_id){
        $list = [];
        $db = Db::getInstance();
        if($result = mysqli_query($db,"SELECT * FROM products where id = $product_id")) {
            if($row = mysqli_fetch_assoc($result)){
                $list = new product_model($row['name'],$row['id'], $row['sku'], $row['type'], $row['weight'], $row['height'], $row['price'], $row['type'], $row['size'], $row['length']);
            }
        }



        return $list;
    }

    // return all product_type from the database product_type table

    public static function all(){
//list of all products

        $list = [];
        $db = Db::getInstance();
        if($result = mysqli_query($db,"SELECT * FROM products")) {
            while($row = mysqli_fetch_assoc($result)){
                $list[] = new product_model($row['name'],$row['id'], $row['sku'], $row['type'], $row['weight'], $row['height'], $row['price'], $row['type'], $row['size'], $row['length']);
            }
        }
     
        return $list;
    }


    public static function delete($id){
        $db = Db::getInstance();
        $result = mysqli_query($db,"delete from product where id='$id'");
        require_once("model/comment.php");
        $result2 = mysqli_query($db,"delete from comment where product_id='$id'");
        return true;
    }

    public static function add($name, $sku, $type, $weight, $height, $price, $size, $length) {

        $db = Db::getInstance();
        $result = mysqli_query($db,"Insert into product (name) Values ('$name')");
        $id=mysqli_insert_id($db);
        return new product_model($name,$id, $sku, $type, $weight, $height, $price, $type, $size, $length);
    }
}
class product_type_model
{
    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    // get all product_type from the database product_type table
    public static function all()
    {
       // get all product_type from the database product_type table
        $list = [];
        $db = Db::getInstance();
        if($result = mysqli_query($db,"SELECT * FROM product_type")) {
            while($row = mysqli_fetch_assoc($result)){
                $list[] = new product_type_model($row['id'],$row['name']);
            }
        }
        return $list;
    
       echo json_encode($list);
        return $list;
    }
}
?>