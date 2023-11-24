<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mascotas</title>
</head>
<body>
    <section class="main__mascotas">
        <div class="mascotas__tittle">
            <h2>Registro de mascotas</h2>
        </div>
        <table class="table__mascotas">
            <thead>
                <tr class="rowsHeaderMascotas">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>TipoMascota</th>
                    <th>Raza</th>
                    <th>Fecha de nacimiento</th>
                    <th>Dueño</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once(__DIR__ . "/../controller/mascota.controller.php");
                    require_once(__DIR__ . "/../controller/tipomascota.controller.php");
                    require_once(__DIR__ . "/../controller/raza.controller.php");
                    require_once(__DIR__ . "/../controller/user.controller.php"); 
                    require_once(__DIR__ . "/../conexion.php");

                    $mascotaController = new MascotaController();
                    $mascotas = $mascotaController->read();

                    $razaController = new RazaController();
                    $razas = $razaController->read();
                    
                    $tipoMascotaController = new TipoMascotaController();
                    $tipoMascotas = $tipoMascotaController->read();

                    $userController = new User_Controller();
                    $users = $userController->read();
                    
                ?>
                <?php foreach ($mascotas as $mascota): ?>
                    <?php
                        $razaNombre = "";
                        foreach ($razas as $raza) {
                            if ($mascota->Raza_id == $raza->id) {
                                $razaNombre = $raza->nombre;
                                break;
                            }
                        }
                        $userName = "";
                        foreach ($users as $user) {
                            if ($mascota->User_id == $user->id) {
                                $userName = $user->username;
                                break;
                            }
                        }
                    ?>
                    <tr class="rowscontent__mascotas">
                        <form action="../process/update_mascota.php" method="POST">
                            <th><?= $mascota->id ?><input type="hidden" name="id" value="<?= $mascota->id ?>"></th>
                            <th><input type="text" name="nombre" value="<?= $mascota->nombre ?>"></th>
                            <th>
                                <select name="TipoMascota_id">
                                    <?php foreach ($tipoMascotas as $tipoMascota): ?>
                                        <option value="<?= $tipoMascota->id ?>" <?= $mascota->TipoMascota_id == $tipoMascota->id ? 'selected' : '' ?>>
                                            <?= $tipoMascota->nombre ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="tipoMascotaOriginal" value="<?= $mascota->TipoMascota_id ?>">
                            </th>
                            <th>
                                <input type="hidden" name="Raza_id" value="<?= $mascota->Raza_id ?>">
                                <input type="text" name="raza" value="<?= $razaNombre ?>">
                            </th>
                            <th><input type="text" name="fechaNacimiento" value="<?= $mascota->FechaNacimiento ?>"></th>
                            <th><?= $userName ?></th>
                            <th class="buttonMascotaUpdate"><input type="submit" value="Actualizar"></th>
                        </form>
                        <th class="buttonMascotaDelete">
                            <form action="/../process/delete_mascota.php" method="POST">
                                <input type="hidden" name="id" value="<?= $mascota->id ?>">
                                <input type="submit" value="Eliminar">
                            </form>
                        </th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>
        <div class="mascotas__button">
            <a href="createMascota.php" class="buttonAddMascota">Agregar mascota</a>
        </div>
    </section>
</body>
</html>