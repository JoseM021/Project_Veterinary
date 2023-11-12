<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/Vacuna.php");
class VaccineController extends Conexion {
    public function create(Vacuna $vacuna) {
        $connection = $this->connect();
        $sql = "INSERT INTO Vacuna(nombre)
        VALUES ('{$vacuna->nombre}')";

        $result = $connection->query($sql);
        return $result;
    }
    public function update(Vacuna $vacuna) {
        $connection = $this->connect();
        $sql = "UPDATE Vacuna SET nombre = '{$vacuna->nombre}'
        WHERE id = {$vacuna->id}";
    
        $result = $connection->query($sql);
        return $result;
    }
    public function delete(Vacuna $vacuna) {
        $connection = $this->connect();
        $sql = "DELETE FROM Vacuna WHERE id='{$vacuna->id}'";
        $result = $connection->query($sql);
        return $result;
    }
    public function read () {
        $connection = $this->connect();
        $vacunas = [];

        $sql = "SELECT * FROM Vacuna";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $vacuna = new Vacuna();
                $vacuna->id = $row["id"];
                $vacuna->nombre = $row["nombre"];
                $vacunas[] = $vacuna;
            }
        }
        return $vacunas;
    }    
}

?>