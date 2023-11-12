<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vaccineIndex.css">
    <title>Registro Vacuna</title>
</head>
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
                        <input type="submit" name="submitvaccine" value="Ver Vacunas" class="login-button">
                    </div>
                </div>
                <?php
                require_once(__DIR__ . "../../process/create_vaccine.php");
                ?>
            </form>
        </section>
    </main>
</body>
</html>