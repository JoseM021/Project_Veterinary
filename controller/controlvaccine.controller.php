<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/ControlVacuna.php");

class ControlVaccineController extends Conexion {
  public function create(ControlVacuna $controlVacuna) {
    $connection = $this->connect();
    $sql = "INSERT INTO ControlVacuna(Mascota_id, Vacuna_id, fecha)
    VALUES ('{$controlVacuna->Mascota_id}', '{$controlVacuna->Vacuna_id}', '{$controlVacuna->fecha}')";

    $result = $connection->query($sql);
    return $result;
  }

  public function update(ControlVacuna $controlVacuna) {
    $connection = $this->connect();
    $sql = "UPDATE ControlVacuna SET fecha = '{$controlVacuna->fecha}'
    WHERE Mascota_id = '{$controlVacuna->Mascota_id}' AND Vacuna_id = '{$controlVacuna->Vacuna_id}'";

    $result = $connection->query($sql);
    return $result;
  }

  public function delete(ControlVacuna $controlVacuna) {
      $connection = $this->connect();
      $sql = "DELETE FROM ControlVacuna WHERE Mascota_id = '{$controlVacuna->Mascota_id}' AND Vacuna_id = '{$controlVacuna->Vacuna_id}'";

      $result = $connection->query($sql);
      return $result;
  }

  public function read() {
    $connection = $this->connect();
    $controlVacunas = [];
  
    $sql = "SELECT Vacuna_id, Mascota_id, fecha
    FROM ControlVacuna";
    $result = $connection->query($sql);
  
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $controlVacuna = new ControlVacuna();
        $controlVacuna->Vacuna_id = $row["Vacuna_id"];
        $controlVacuna->Mascota_id = $row["Mascota_id"];
        $controlVacuna->fecha = $row["fecha"];
  
        array_push($controlVacunas, $controlVacuna);
      }
    }
  
    return $controlVacunas;
  }
  
}
?>
