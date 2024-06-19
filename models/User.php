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
      $query = "SELECT id, username, email, role FROM " . $this->table_name . " WHERE username=:username AND password=:password";
      $statement = $this->connection->prepare($query);

      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->password = htmlspecialchars(strip_tags($this->password));

      $statement->bindParam(":username", $this->username);
      $statement->bindParam(":password", $this->password);

      $statement->execute();

      return $statement;
    }
  }
?>