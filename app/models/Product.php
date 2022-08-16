<?php

class Product 
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function getProducts()
    {
        $this->db->query(
            'SELECT * FROM products'
        );
        
        $products = Database::all();
        
        return $products;
    }

    /**
     * Add product 
     */
    
    public function addProduct($data)
    {
        $this->db->query(
            'INSERT INTO products (name, price, size, weight, length, width, height, type, sku) VALUES(:name, :price, :size, :weight, :length, :width, :height, :type, :sku)'
        );
        
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':size', $data['size']);
        $this->db->bind(':weight', $data['weight']);
        $this->db->bind(':length', $data['length']);
        $this->db->bind(':width', $data['width']);
        $this->db->bind(':height', $data['height']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':sku', $data['sku']);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    
    public function deleteProduct($id)
    {
        
        $this->db->query(
            'DELETE FROM products WHERE id = :id'
        );
        
        $this->db->bind(':id', $id);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete multiple products
     */
    
    public function deleteMultipleProducts($ids)
    {
        $this->db->query(
            'DELETE FROM products WHERE id IN  ('.implode(',', $ids).')'
        );
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if product exists using sku
     */
    public function productExists($sku)
    {
        $this->db->query(
            'SELECT * FROM products WHERE sku = :sku'
        );
        
        $this->db->bind(':sku', $sku);
        
        // $row = $this->db->single();
        
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}