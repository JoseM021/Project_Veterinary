<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mascotaIndex.css">
    <title>Registro Mascota</title>
</head>
<body>
    <main>
        <section class="login__main">
            <h1>Registrar Mascota</h1>
            <form action="../process/create_mascota.php" method="POST">
                <label for="data_user" class="login__user">
                    Nombre Mascota:
                    <input type="text" id="data_mascota" name="nombre" value="" maxlength="20">
                </label>
                <label for="data_tipo" class="login__user">
                    Tipo de Mascota:
                    <select name="TipoMascota_id" id="data_tipo">
                        <option value="1">Perro</option>
                        <option value="2">Gato</option>
                    </select>
                </label>
                <label for="data_raza" class="login__user">
                    Raza:
                    <input type="text" id="data_raza" name="raza" value="" maxlength="20">
                </label>
                <label for="data_fecha_nacimiento" class="login__user">
                    Fecha de nacimiento:
                    <input type="date" id="data_fecha_nacimiento" name="fechaNacimiento">
                </label>
                <div class="buttons__down">
                    <div class="user_login">
                        <input type="submit" name="usermascota" value="Enviar a BD" class="login-button">
                    </div>
                    <div class="user_mascotas">
                        <a name="submitmascota" href="mascotaRegistered.php">Ver Mascotas</a>
                    </div>
                </div>
            </form>
            <?php
                require_once(__DIR__ . "/../process/create_mascota.php");
            ?>
        </section>
    </main>
</body>
</html>