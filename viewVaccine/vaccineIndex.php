<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vaccineIndex.css">
    <title>Registro Vacuna</title>
</head>
<?php
session_start();
if(empty($_SESSION["User_id"])) {
    header("Location: ../index.php");
    exit;
}
?>
<body>
    <main>
        <section class="login__main">
            <h1>Registrar Vacunas</h1>
            <form action="vaccineIndex.php" method="POST">
                <label for="data_user" class="login__user">
                    Nombre Vacuna:
                    <input type="text" id="data_vacuna" name="vaccine" value="" maxlength="20">
                </label>
                <div class="buttons__down">
                    <div class="user_login">
                        <input type="submit" name="uservaccine" value="Enviar a BD" class="login-button">
                    </div>
                    <div class="user_vaccines">
                        <a name="submitvaccine" href="vaccineRegistered.php">Ver Vacunas</a>
                    </div>
                </div>
            </form>
            <?php
                require_once(__DIR__ . "../../process/create_vaccine.php");
            ?>
        </section>
    </main>
</body>
</html>