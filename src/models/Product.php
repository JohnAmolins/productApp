<?php
class Product{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

# function that gets all products from database
    public function getProducts(){
        $this->db->query("SELECT * FROM products");
        return $this->db->resultArr();
    }

# function that inserts all products to database
    public function addProduct($data){
        $this->db->query('INSERT INTO products(sku, name, price, size, weight, height, width, length) VALUES(:sku, :name, :price, :size, :weight, :height, :width, :length)');
        //binding form values to DB cells
        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':size', $data['size']);
        $this->db->bind(':weight', $data['weight']);
        $this->db->bind(':height', $data['height']);
        $this->db->bind(':width', $data['width']);
        $this->db->bind(':length', $data['length']);

        if($this->db->execute()){
            return true;
        } else{
            return false;
        }

    }

# function that removes products from database by id
    public function deleteProduct($id){
        $this->db->query("DELETE FROM products WHERE id= :id");
        $this->db->bind('id', $id);
        if($this->db->execute()){
            header("Location: /productApp/product/list");   // redirects back to product/list page as an alternative do to not using AJAX
            return;
            
        } else{
            return false;
        }
    }

    

}
?> 