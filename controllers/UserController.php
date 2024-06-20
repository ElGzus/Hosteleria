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

    public function login() {
      session_start();

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->user->username = $_POST["username"];
        $this->user->password = $_POST["password"];

        if($this->user->login()) {
          $_SESSION["user_id"] = $this->user->id;
          $_SESSION["username"] = $this->user->username;
          $_SESSION["role"] = $this->user->role;
          header("Location: account.php");
        } else {
          print "Usuario o contraseña incorrectos";
        }
      }
      include "views/login.php";
    }
  }
?>