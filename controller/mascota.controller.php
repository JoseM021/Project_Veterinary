<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/Mascota.php");
require_once(__DIR__ ."/../model/Raza.php");

class MascotaController extends Conexion {
    public $raza;
    public function create(Mascota $mascota) {
        $connection = $this->connect();
        $sql = "INSERT INTO Mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id)
        VALUES ('{$mascota->nombre}', '{$mascota->FechaNacimiento}', '{$mascota->User_id}', '{$mascota->TipoMascota_id}', '{$mascota->Raza_id}')";

        $result = $connection ->query($sql);
        return $result;
    }
    public function update (Mascota $mascota) {
        $connection = $this->connect();
        $sql = "UPDATE Mascota SET nombre = '{$mascota->nombre}', FechaNacimiento = '{$mascota->FechaNacimiento}'
        WHERE id = '{$mascota->id}'";

        $result = $connection->query($sql);

        return $result;
    }
    public function delete (Mascota $mascota) {
        $connection = $this->connect();
        $sql = "DELETE FROM Mascota WHERE id='{$mascota->id}'";
        $result = $connection->query($sql);
        return $result;
    }
    public function read () {
        $connection = $this->connect();
        $mascotas = [];
    
        $sql = "SELECT Mascota.*, Raza.id AS Raza_id, TipoMascota.id AS TipoMascota_id
        FROM Mascota
        INNER JOIN Raza ON Mascota.Raza_id = Raza.id
        INNER JOIN TipoMascota ON Raza.TipoMascota_id = TipoMascota.id";

    
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mascota = new Mascota();
                $mascota->id = $row["id"];
                $mascota->nombre = $row["nombre"];
                $mascota->FechaNacimiento = $row["FechaNacimiento"];
                $mascota->User_id = $row["User_id"];
                $mascota->Raza_id = $row["Raza_id"];
                $mascota->TipoMascota_id = $row["TipoMascota_id"];
                $mascotas[] = $mascota;
            }            
        }
    
        return $mascotas;
    }
    public function getRazaId($raza) {
        $connection = $this->connect();
        $sql = "SELECT id FROM Raza WHERE nombre = '{$raza}'";
        $result = $connection->query($sql);
        if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          return $row["id"];
        } else {
          return null;
        }
    }
    public function getMascotaById($id) {
        $connection = $this->connect();
        $sql = "SELECT * FROM Mascota WHERE id = '{$id}'";
    
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    
            $mascota = new Mascota();
            $mascota->id = $row["id"];
            $mascota->nombre = $row["nombre"];
            $mascota->TipoMascota_id = $row["TipoMascota_id"];
            $mascota->FechaNacimiento = $row["FechaNacimiento"];
            $mascota->Raza_id = $row["Raza_id"];
    
            return $mascota;
        } else {
            return null;
        }
    }         

    public function razaExistsNombre($raza_nombre) {
        $connection = $this->connect();
        $raza_nombre = $connection->real_escape_string($raza_nombre);
        $sql = "SELECT COUNT(*) AS count FROM raza WHERE nombre = '{$raza_nombre}'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        return $row["count"] > 0;
    }
}
?>