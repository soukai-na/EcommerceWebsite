<?php

include_once('C:\xampp\htdocs\Store\Models\DbConnection.php');

class Contact extends DbConnection
{

    public $id;
    public $fname;
    public $email;
    public $message;
    public $created_at;

    private $table = "contact";




    public function __construct()
    {
        parent::__construct();
    }


    public function allMessages()
    {
        $select = "SELECT * FROM $this->table ORDER BY id desc";
        $select1 = $this->connection->query($select);
        return $select1;
    }

    public function messagebyid($id)
    {
        $sel = "SELECT * FROM $this->table where id=$id";
        $sel1 = $this->connection->query($sel);
        return mysqli_fetch_array($sel1);
    }


    public function sendMessage($fname, $email, $message)
    {

        $add = "INSERT INTO $this->table ( fname, email, message ) VALUES ('$fname', '$email', '$message')";
        $insert1 = $this->connection->query($add);
    }




    function deleteMessage($where)
    {
        $delete = ("DELETE FROM $this->table WHERE id=$where");
        $this->connection->query($delete);
        return true;
    }
}
