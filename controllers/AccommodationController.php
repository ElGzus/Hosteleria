<?php
require_once './models/Accommodation.php';
require_once './config/database.php';

class AccommodationController {
    public $accommodation;
    public $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        if ($this->db == null) {
            die("Error al conectarse a la base de datos");
        }
        $this->accommodation = new Accommodation($this->db);
    }

    public function create(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->accommodation->name = $_POST['name'];
            $this->accommodation->description = $_POST['description'];
            $this->accommodation->type = $_POST['type'];
            $this->accommodation->price = $_POST['price'];

            if($this->accommodation->create()){
                header("Location: ./index.php?action=read");
            }else{
                echo "Error al crear el alojamiento";
            }
        } else {
            include './views/create.php';
        }
    }

    public function read(){
        $sentence = $this->accommodation->read();
        $accommodations = $sentence->fetchAll(PDO::FETCH_ASSOC);
        include './views/user.php';
    }

    public function update($id) {
        $accommodation = $this->accommodation->findOne($id);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->accommodation->id = $id;
            $this->accommodation->name = $_POST['name'];
            $this->accommodation->description = $_POST['description'];
            $this->accommodation->type = $_POST['type'];
            $this->accommodation->price = $_POST['price'];

            if($this->accommodation->update()){
                header("Location: ./index.php?action=read");
            } else {
                echo "Error al actualizar el alojamiento";
            }
        } else {
            include './views/edit.php';
        }
    }

    public function reserve($id){
        $query = "UPDATE " . $this->accommodation->table_name . " SET is_reserved = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            header("Location: ./index.php?action=read");
        } else {
            echo "Error al reservar el alojamiento";
        }
    }

    public function unreserve($id){
        $query = "UPDATE " . $this->accommodation->table_name . " SET is_reserved = 0 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            header("Location: ./index.php?action=read");
        } else {
            echo "Error al eliminar la reservación del alojamiento";
        }
    }
}
?>
