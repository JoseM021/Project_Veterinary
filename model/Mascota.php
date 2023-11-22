<?php

class Mascota {
    public int $id;
    public string $nombre;
    public $FechaNacimiento;
    public $foto;
    public int $User_id;
    public int $TipoMascota_id;
    public int $Raza_id;

    public function getRaza() {
        $razaController = new RazaController();
        return $razaController->getRazaPorNombre($this->Raza_id);
    }
}
?>