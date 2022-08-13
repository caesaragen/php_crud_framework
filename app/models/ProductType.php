<?php

class ProductType
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function getProductTypes()
    {
        $this->db->query(
            'SELECT * FROM product_type'
        );
        
        $productTypes = Database::all();
        
        return $productTypes;
    }
    
    public function addProductType($data)
    {
        $this->db->query(
            'INSERT INTO product_type (name) VALUES(:name)'
        );
        
        $this->db->bind(':name', $data['name']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteProductType($id)
    {
        $this->db->query(
            'DELETE FROM product_types WHERE id = :id'
        );
        
        $this->db->bind(':id', $id);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}