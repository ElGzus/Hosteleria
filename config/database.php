<?php

class Database{
    private $host = "localhost";
    private $db_name = "hostelry";
    private $username = "root";
    private $password = "";
    public $conn; //connection

    public function getConnection(){
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";port=3307;dbname=".$this->db_name,
            $this->username,$this->password);
            $this->conn->exec('set names utf8');
        }catch(PDOException $exception){
            echo "Error al conectarse a la bd ".$exception->getMessage();
        }
        return $this->conn;
    }

}

?>