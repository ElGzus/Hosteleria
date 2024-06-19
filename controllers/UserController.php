<?php
  require_once "models/User.php";
  require_once "config/Database.php";

  class UserController {
    private $db;
    private $user;

    public function __construct() {
      $database = new Database();
      $this->db = $database->getConnection();
      $this->user = new User($this->db);
    }

    public function register() {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->user->username = $_POST["username"];
        $this->user->password = $_POST["password"];
        $this->user->email = $_POST["email"];
        $this->user->role = $_POST["role"];

        if ($this->user->register()) {
          header("Location: login.php");
        } else {
          print "Error al registrar el usuario";
        }
      }
      include "views/register.php";
    }
  }
?>