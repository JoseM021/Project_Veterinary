<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<?php

require_once(__DIR__ ."/vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


require_once(__DIR__ ."/controller/user.controller.php");



if (isset($_POST["userregister"])) {
    require_once(__DIR__ ."/process/create_user.php");
    require_once(__DIR__ ."/process/create_role.php");
}
?>
<body>
    <main>
        <section class="login__main">
            <h1>Bienvenido</h1>
            <form action="register.php" method="POST">
            <label for="data_user" class="login__user">
                    Email:
                    <input type="text" id="data_email" name="email" value="<?php echo $_POST["email"] ?? "" ?>" maxlength="24">
                </label>
                <label for="data_user" class="login__user">
                    Usuario:
                    <input type="text" id="data_user" name="username" value="<?php echo $_POST["username"] ?? "" ?>" maxlength="16">
                </label>
                <label for="data_password" class="login__password">
                    Contraseña:
                    <input type="text" id="data_password" name="password" value="<?php echo $_POST["password"] ?? "" ?>" maxlength="18">
                </label>
                <div class="user_login">
                    <input type="submit" name="userregister" value="Registrate" class="login-button">
                </div>
            </form>
            <?php
            if (isset($_SESSION["error_message_form"])) {
                echo $_SESSION["error_message_form"];
                unset($_SESSION["error_message_form"]);
            }
            if (isset($_SESSION["error_message_duplicate"])) {
                echo $_SESSION["error_message_duplicate"];
                unset($_SESSION["error_message_duplicate"]);
            }
            ?>
            <article class="login__footer">
                <div class="login__redirectionR">
                    <a href="">
                        ¿No tienes una cuenta?<br>
                        Registrate aquí
                    </a>
                </div>
            </article>
        </section>
    </main>

</body>
</html>