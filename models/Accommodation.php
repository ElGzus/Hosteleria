<?php
class Accommodation {
  private $connection;
  public $table_name = "accommodations";

  public $id;
  public $name;
  public $description;
  public $type;
  public $price;
  public $is_reserved;

  public function __construct($db) {
    $this->connection = $db;
  }

  public function create() {
    $query = "INSERT INTO " . $this->table_name . " SET name=:name, description=:description, type=:type, price=:price";
    $statement = $this->connection->prepare($query);

    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->price = htmlspecialchars(strip_tags($this->price));

    $statement->bindParam(":name", $this->name);
    $statement->bindParam(":description", $this->description);
    $statement->bindParam(":type", $this->type);
    $statement->bindParam(":price", $this->price);

    if ($statement->execute()) {
      return true;
    }
    return false;
  }

  public function read() {
    $query = "SELECT * FROM " . $this->table_name;
    $statement = $this->connection->prepare($query);
    $statement->execute();
    return $statement;
  }

  public function update() {
    $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description, type=:type, price=:price WHERE id=:id";
    $statement = $this->connection->prepare($query);

    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->id = htmlspecialchars(strip_tags($this->id));

    $statement->bindParam(":name", $this->name);
    $statement->bindParam(":description", $this->description);
    $statement->bindParam(":type", $this->type);
    $statement->bindParam(":price", $this->price);
    $statement->bindParam(":id", $this->id);

    if ($statement->execute()) {
      return true;
    }
    return false;
  }

  public function findOne($id) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
    $statement = $this->connection->prepare($query);
    $statement->bindParam(":id", $id);
    $statement->execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);

    $this->id = $record["id"];
    $this->name = $record["name"];
    $this->description = $record["description"];
    $this->type = $record["type"];
    $this->price = $record["price"];
  }
}
?>