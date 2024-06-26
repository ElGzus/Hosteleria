<?php
  class User {
    private $connection;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $email;
    public $role;

    public function __construct($db) {
      $this->connection = $db;
    }

    public function register() {
      $query = "INSERT INTO " . $this->table_name . " SET username=:username, password=:password, email=:email, role=:role";
      $statement = $this->connection->prepare($query);

      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->password = htmlspecialchars(strip_tags($this->password));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->role = htmlspecialchars(strip_tags($this->role));

      $statement->bindParam(":username", $this->username);
      $statement->bindParam(":password", $this->password);
      $statement->bindParam(":email", $this->email);
      $statement->bindParam(":role", $this->role);

      if ($statement->execute()) {
        return true;
      }
      return false;
    }

    public function login() {
      // query to check if username exists, the ? is a placeholder for the actual value and LIMIT 0,1 is to get only one record
      $query = "SELECT * FROM " . $this->table_name . "WHERE username = ? LIMIT 0,1";
      $statement = $this->connection->prepare($query);
      // bind value to the placeholder
      $statement->bindParam(1, $this->username);
      $statement->execute();

      // fetch the record with an associative array which is a PDO built-in method
      $record = $statement->fetch(PDO::FETCH_ASSOC);
      if ($record) {
        // if the record is found, assign the values from the database to the object's properties
        // Assign in the sense of assigning the values from the database to the object's properties no to the database (to be very clear)
        // the password_verify() method is used to verify if the password matches the hashed password in the database
        if (password_verify($this->password, $record["password"])) {
          $this->id = $record["id"];
          $this->username = $record["username"];
          $this->email = $record["email"];
          $this->role = $record["role"];
          return true;
        }
      }
      // return false if the record is not found or the password is incorrect
      return false;
    }

    public function readAll() {
      $query = "SELECT * FROM " . $this->table_name;
      $statement = $this->connection->prepare($query);
      $statement->execute();
      return $statement;
    }
  }
?>