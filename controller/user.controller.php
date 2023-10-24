<?php
require_once(__DIR__ ."conexion.php");
require_once(__DIR__ ."./model/User.php");

class User_controller extends Conexion {
    public function create (User $user) {

        $mysqli = $this->connect();
        $nombre = $mysqli-> real_escape_string($user->nombre);
        $sql = "INSERT INTO User (nombre) VALUES ('$nombre')";
    
        if ($mysqli->query(query:$sql)) {
        echo "Registro creado con éxito";
        } else {
        echo "Error al crear el registro: " . $mysqli->error;
        }
    
        $mysqli->close();
    }
}

?>