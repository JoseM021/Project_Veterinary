<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/TipoMascota.php");

class TipoMascotaController extends Conexion {
    public function create(TipoMascota $tipoMascota) {
        $connection = $this->connect(); 
        $sql = "INSERT INTO TipoMascota (nombre, EdadAdulto)
        VALUES ('{$tipoMascota->nombre}', '{$tipoMascota->EdadAdulto}')";
    
        $result = $connection->query($sql);
        return $result;
    }
    public function update($tipoMascotaId, $nombre) {
        $connection = $this->connect();
        $tipoMascotaId = $connection->real_escape_string($tipoMascotaId);
        $nombre = $connection->real_escape_string($nombre);
        $sql = "UPDATE TipoMascota SET nombre = '$nombre' WHERE id = '$tipoMascotaId'";
        $result = $connection->query($sql);
    
        echo "SQL Query TipoMascota Update: $sql<br>";
    
        if ($result) {
            echo "TipoMascota Update successful<br>";
            $updatedTipoMascota = $this->getById($tipoMascotaId);
            if ($updatedTipoMascota) {
                echo "TipoMascota después del update: ";
                print_r($updatedTipoMascota);
                return $result;
            } else {
                echo "Error al obtener el TipoMascota después del update<br>";
                return false;
            }
        } else {
            echo "Error updating TipoMascota record: " . $connection->error . "<br>";
            return false;
        }
    }      
    
    public function delete (TipoMascota $tipoMascota) {
        $connection = $this->connect();
        $sql = "DELETE FROM TipoMascota WHERE id = '{$tipoMascota->id}'";
        $result = $connection->query($sql);
        return $result;
    }
    public function read () {
        $connection = $this->connect();
        $tipoMascotas = [];

        $sql = "SELECT * FROM TipoMascota";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tipoMascota = new TipoMascota();
                $tipoMascota->id = $row["id"];
                $tipoMascota->nombre = $row["nombre"];
                $tipoMascotas[] = $tipoMascota;
            }
        }
        return $tipoMascotas;

    }
    public function getIdByName($nombre) {
        $connection = $this->connect();
        $sql = "SELECT id FROM TipoMascota WHERE nombre = '{$nombre}'";
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["id"];
        } else {
            return null;
        }
    }
    public function getById($id) {
        $connection = $this->connect();
        $sql = "SELECT * FROM TipoMascota WHERE id = '$id'";
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    
            $tipoMascota = new TipoMascota();
            $tipoMascota->id = $row['id'];
            $tipoMascota->nombre = $row['nombre'];
    
            return $tipoMascota;
        } else {
            return null;
        }
    }

}
?>