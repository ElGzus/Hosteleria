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
      // Check if the request method is POST with the global variable $_SERVER
      // $_SERVER["REQUEST_METHOD"] is a global variable that holds the request method of the current script
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->user->username = $_POST["username"];
        $this->user->password = $_POST["password"];
        $this->user->email = $_POST["email"];
        $this->user->role = $_POST["role"];

        if ($this->user->register()) {
          // Redirect to the login page if the user is registered successfully
          header("Location: login.php");
        } else {
          print "Error al registrar el usuario";
        }
      }
      // Include the register view to display the registration form
      include "views/register.php";
    }

    public function login() {
      // The session_start() function is used to start a new session or resume the existing session
      session_start();

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assign the values from the form to the object's properties
        $this->user->username = $_POST["username"];
        $this->user->password = $_POST["password"];

        if ($this->user->login()) {
          // Assign the user's id, username, and role to the session variables
          $_SESSION["user_id"] = $this->user->id;
          $_SESSION["username"] = $this->user->username;
          $_SESSION["role"] = $this->user->role;
          // Redirect to the account page if the user is logged in successfully
          header("Location: account.php");
        } else {
          print "Usuario o contraseña incorrectos";
        }
      }
      // Include the login view to display the login form
      include "views/login.php";
    }

    // The logout() method is used to destroy the session and redirect the user to the login page
    public function logout() {
      // The session start will resume the existing session
      session_start();
      // The unset method is used to unset the session variables
      session_unset();
      // 🤯 D-E-S-T-R-O-Y
      session_destroy();
      // Redirect to the login page after destroying the session
      header("Location: login.php");
    }

    public function account() {
      // The session_start() function is used to start a new session or resume the existing session
      session_start();

      // Check if the session variable user_id is not set
      if (!isset($_SESSION["user_id"])) {
        // Redirect to the login page if the user is not logged in
        header("Location: login.php");
        // exit() is used to stop the script from executing further
        exit();
      }

      // Call the readAll() method from the User class to get all the users
      $statement = $this->user->readAll();
      // Include the account view to display the user's account details
      include "views/account.php";
    }
  }
?>