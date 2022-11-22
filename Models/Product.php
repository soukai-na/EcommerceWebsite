<?php

include_once('C:\xampp\htdocs\Store\Models\DbConnection.php');

class Product extends DbConnection
{

    public $id;
    public $image;
    public $name;
    public $price;
    public $description;
    public $category;
    public $created_at;
    private $table = "products";



    public function __construct()
    {
        parent::__construct();
    }


    public function allProducts()
    {
        $select = "SELECT * FROM $this->table ORDER BY category ASC";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function homeProducts()
    {
        $select = "SELECT * FROM $this->table ORDER BY id ASC limit 4";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function productsSameCategory($category)
    {
        $select = "SELECT * FROM $this->table where category='$category'";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function toCalculPrice($name)
    {
        $select = "SELECT * FROM $this->table where name='$name'";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function productbyid($id)
    {
        $sel = "SELECT * FROM $this->table where id=$id";
        $sel1 = $this->connection->query($sel);
        return mysqli_fetch_array($sel1);
    }


    public function addProduct($image, $name, $price, $description, $category)
    {

        $add = "INSERT INTO $this->table ( image, name, description, price, category ) VALUES ('$image','$name', '$description', '$price', '$category')";
        $insert1 = $this->connection->query($add);
    }


    public function updateProduct($name, $price, $description, $category, $id)
    {

        $update = ("UPDATE $this->table SET  name = '$name', description = '$description', price = '$price', category = '$category' WHERE id= '$id'");
        // echo $update; 
        $this->connection->query($update);

        return true;
    }

    public function updatePicture($image, $id)
    {
        $update = ("UPDATE $this->table SET  image = '$image'  WHERE id= '$id'");
        $this->connection->query($update);
        return true;
    }

    function deleteProduct($where)
    {
        $delete = ("DELETE FROM $this->table WHERE id=$where");
        $this->connection->query($delete);
        return true;
    }
}
