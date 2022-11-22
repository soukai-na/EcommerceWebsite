<?php

include_once('C:\xampp\htdocs\Store\Models\DbConnection.php');

class Order extends DbConnection
{

    public $id;
    public $fname;
    public $phone;
    public $address;
    public $product;
    public $quantity;

    private $table = "orders";




    public function __construct()
    {
        parent::__construct();
    }


    public function allOrders()
    {
        $select = "SELECT * FROM $this->table ORDER BY id desc";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function orderbyid($id)
    {
        $sel = "SELECT * FROM $this->table where id=$id";
        $sel1 = $this->connection->query($sel);
        return mysqli_fetch_array($sel1);
    }


    public function addOrder($fname, $phone, $address, $product, $quantity)
    {

        $add = "INSERT INTO $this->table ( fname, phone, address, product, quantity ) VALUES ('$fname', '$phone', '$address', '$product','$quantity')";
        $insert1 = $this->connection->query($add);
    }


    function deleteOrder($where)
    {
        $delete = ("DELETE FROM $this->table WHERE id=$where");
        $this->connection->query($delete);
        return true;
    }

    function deleteAllOrders()
    {
        $delete = ("DELETE FROM $this->table");
        $this->connection->query($delete);
        return true;
    }
}
