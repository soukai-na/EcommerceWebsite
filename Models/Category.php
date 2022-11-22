<?php

include_once('C:\xampp\htdocs\Store\Models\DbConnection.php');

class Category extends DbConnection
{

    public $id;
    public $name;
    public $description;
    public $created_at;

    private $table = "categories";




    public function __construct()
    {
        parent::__construct();
    }


    public function allCategories()
    {
        $select = "SELECT * FROM $this->table ORDER BY name ASC";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function categorybyid($id)
    {
        $sel = "SELECT * FROM $this->table where id=$id";
        $sel1 = $this->connection->query($sel);
        return mysqli_fetch_array($sel1);
    }


    public function addCategory($name, $description)
    {

        $add = "INSERT INTO $this->table ( name, description ) VALUES ('$name', '$description')";
        $insert1 = $this->connection->query($add);
    }


    public function updateCategory($name, $description, $id)
    {

        $update = ("UPDATE $this->table SET name = '$name', description = '$description' WHERE id= '$id'");
        // echo $update; 
        $this->connection->query($update);

        return true;
    }

    function deleteCategory($where)
    {
        $delete = ("DELETE FROM $this->table WHERE id=$where");
        $this->connection->query($delete);
        return true;
    }
}
