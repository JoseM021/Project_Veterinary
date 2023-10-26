<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/User.php");

class User_controller extends Conexion {
    public function create (User $user) {

        $mysqli = $this->connect();
        $nombre = $mysqli-> real_escape_string($user->nombre);
        $email = $mysqli->real_escape_string($user->email);
        $password = $mysqli->real_escape_string($user->password);
        $sql = "INSERT INTO User (id, nombre, email, password, Role_id) VALUES ('$id','$nombre', '$email', '$password', '$role_id')";

        if (isset($user->id)) {
            $id = $mysqli->real_escape_string($user->id);
        } else {
            $id = null;
        }
        
        if (isset($user->Role_id)) {
            $role_id = $mysqli->real_escape_string($user->Role_id);
        } else {
            $role_id = null;
        }

        if ($mysqli->query(query:$sql)) {
        echo "Registro creado con éxito";
        } else {
        echo "Error al crear el registro: " . $mysqli->error;
        }
    
        $mysqli->close();
    }
}

?>