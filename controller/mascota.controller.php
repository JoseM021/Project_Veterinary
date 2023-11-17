<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/Mascota.php");
require_once (__DIR__ ."/../process/create_mascota.php");
class MascotaController extends Conexion {
    public $db;
    public function create(Mascota $mascota) {
        $camposRequeridos = ["nombre", "fechaNacimiento", "Raza_id"];
        foreach ($camposRequeridos as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                create_mascota(1, $campo);
            }
        }

        $fechaNacimiento = DateTime::createFromFormat("d/m/Y", $_POST["fechaNacimiento"]);
        if (!$fechaNacimiento) {
            create_mascota(2, "Fecha de nacimiento");
        }

        if (isset($_POST["TipoMascota_id"])) {
            // Si el valor está presente, lo asignamos
            $mascota->TipoMascota_id = $_POST["TipoMascota_id"];
        } else {
            $mascota->TipoMascota_id = $_POST["TipoMascota_id"] ?? null;
        }
        $sql = "INSERT INTO mascota (nombre, fechaNacimiento, User_id, Raza_id, TipoMascota_id)
            VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $mascota->nombre);
        $stmt->bindValue(2, $fechaNacimiento->format("Y-m-d"));
        $stmt->bindValue(3, $mascota->User_id);
        $stmt->bindValue(4, $mascota->Raza_id);
        $stmt->bindValue(5, $mascota->TipoMascota_id);
        $stmt->execute();

        // Devolvemos el resultado
        return [
            "id" => $this->db->lastInsertId(),
            "nombre" => $mascota->nombre,
            "fechaNacimiento" => $fechaNacimiento->format("d/m/Y"),
            "User_id" => $mascota->User_id,
            "Raza_id" => $mascota->Raza_id,
        ];
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