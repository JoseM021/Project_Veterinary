<?php
require_once(__DIR__ . "/../controller/mascota.controller.php");
require_once(__DIR__ . "/../controller/tipomascota.controller.php");
require_once(__DIR__ . "/../controller/raza.controller.php");
require_once(__DIR__ . "/../controller/user.controller.php");
require_once(__DIR__ . "/../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $tipoMascota_id = $_POST["TipoMascota_id"];
    $raza_id = $_POST["Raza_id"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $tipoMascotaNombre = $_POST["tipoMascotaNombre"];

    echo "ID: $id<br>";
    echo "Nombre: $nombre<br>";
    echo "TipoMascota ID: $tipoMascota_id<br>";
    echo "Raza ID: $raza_id<br>";
    echo "Fecha de Nacimiento: $fechaNacimiento<br>";

    $mascotaController = new MascotaController();
    $mascota = new Mascota();
    $mascota->id = $id;
    $mascota->nombre = $nombre;
    $mascota->TipoMascota_id = $tipoMascota_id;
    $mascota->FechaNacimiento = $fechaNacimiento;
    $mascotaController->update($mascota);

    // Actualizo TipoMascota en la BD
    $tipoMascotaController = new TipoMascotaController();
    $tipoMascota = $tipoMascotaController->getById($tipoMascota_id);

    // Solo se actualiza el tipo de mascota si existe
    if ($tipoMascota) {
        // solo va a actualizar el nombre si este cambio
        if ($tipoMascota->nombre !== $tipoMascotaNombre) {
            // Imprimir información adicional para depuración
            echo "TipoMascota original antes de la actualización: ";
            print_r($tipoMascota);

            $tipoMascotaController->update($tipoMascota->id, $tipoMascotaNombre);

           //Actualiza el TipoMascota_id en la BD
            $mascota->TipoMascota_id = $tipoMascota->id;
            $mascotaController->update($mascota);

            echo "TipoMascota después del update: ";
            print_r($tipoMascota);
            echo "Mascota después de la actualización: ";
            print_r($mascota);
        }
    }

    $razaController = new RazaController();
    $raza = new Raza();
    $raza->id = $raza_id;
    $raza->nombre = $_POST["raza"]; 
    $razaController->update($raza);

   /*  header("Location: ../viewPet/mascotaRegistered.php"); */
   /*  exit(); */
}
?>