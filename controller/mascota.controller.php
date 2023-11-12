<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/Mascota.php");

class MascotaController extends Conexion {
    public function create (Mascota $mascota) {
        $connection = $this->connect();
        $sql = "INSERT INTO Mascota (nombre, FechaNacimiento, foto, User_id, TipoMascota_id, Raza_id)
        VALUES ('{$mascota->nombre}', '{$mascota->FechaNacimiento}', '{$mascota->foto}', '{$mascota->User_id}', 
        '{$mascota->TipoMascota_id}', '{$mascota->Raza_id}')";

        $result = $connection->query($sql);
        return $result;
    }
    public function update (Mascota $mascota) {
        $connection = $this->connect();
        $sql = "UPDATE Mascota SET nombre = '{$mascota->nombre}', {$mascota->FechaNacimiento}', '{$mascota->foto}'
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
    
        $sql = "SELECT *, Raza.id, TipoMascota.id
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
}
?>