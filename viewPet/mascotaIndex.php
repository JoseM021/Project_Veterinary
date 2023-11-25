<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/mascotaIndex.css">
  <title>Registro Mascota</title>
</head>
<?php
session_start();
if(empty($_SESSION["User_id"])) {
    header("Location: index.php");
    exit;
}
?>
<body>
  <?php
    require_once(__DIR__ . "/../process/create_mascota.php");
  ?>
  <main>
    <section class="login__main">
      <h1>Registrar Mascota</h1>
      <form action="mascotaIndex.php" method="POST" class="container-main">
        <label for="nombre" class="login__user">
          Nombre Mascota:
          <input type="text" id="nombre" name="nombre" value="" maxlength="20">
        </label>
        <label for="TipoMascota_id" class="login__user">
          Tipo de Mascota:
          <select name="TipoMascota_id" id="TipoMascota_id">
            <option value="1">Perro</option>
            <option value="2">Gato</option>
          </select>
        </label>
        <label for="raza" class="login__user">
          Raza:
          <input type="text" id="raza" name="raza" value="" maxlength="20">
        </label>
        <label for="fechaNacimiento" class="login__user">
          Fecha de nacimiento:
          <input type="date" id="fechaNacimiento" name="fechaNacimiento">
        </label>
        <div class="buttons__down">
          <div class="user_login">
            <input type="submit" name="usermascota" value="Enviar a BD" class="login-button">
          </div>
          <div class="user_mascotas">
            <a name="submitmascota" href="mascotaRegistered.php">Ver Mascotas</a>
          </div>
          <div class="user_index">
            <a href="../index.php">Inicio</a>
          </div>
        </div>
      </form>
    </section>
  </main>
</body>
</html>