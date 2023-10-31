<?php
require_once(__DIR__ ."/../conexion.php");

class Role_controller extends Conexion {
    public function createRole($nombre) {
        $connection = $this->connect();

        $sqlCheckRole = "SELECT * FROM Role Where nombre = '{$nombre}'";
        $resultCheckRole = $connection->query($sqlCheckRole);

        if ($resultCheckRole->num_rows == 0)  {
            $sqlInsertRole = "INSERT INTO Role (nombre) VALUES '{$nombre}'";
            if (!$connection->query($sqlInsertRole)) {
                echo"Error al insertar rol: " . $connection->error;
            }
        } 
        $connection->close();
    }
}
$roleController = new Role_Controller();
$roleController->createRole('user');
?>