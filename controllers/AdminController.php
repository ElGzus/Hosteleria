<?php
  require_once "models/accommodation.php";
  require_once "config/Database.php";

  class AdminController {
    private $db;
    private $accomodation;

    public function __construct() {
      $database = new Database();
      $this->db = $database->getConnection();
      $this->accomodation = new Accommodation($this->db);
    }

    public function enable() {
      session_start();

      // !isset($_SESSION["role"]) checks if the session variable role is not set
      // And $_SESSION["role"] != "admin" checks if the role is not equal to "admin"
      if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
        // Redirect to the login page if the user is not an admin
        header("Location: login.php");
        // exit() is used to stop the script from executing further
        exit();
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->accomodation->name = $_POST["name"];
        $this->accomodation->description = $_POST["description"];
        $this->accomodation->type = $_POST["type"];
        $this->accomodation->price = $_POST["price"];

        if ($this->accomodation->create()) {
          print "Habitación habilitada";
          header("Location: admin.php");
        } else {
          print "Error al habilitar la habitación";
        }
      }
      include "views/admin.php";
    }
  }
?>