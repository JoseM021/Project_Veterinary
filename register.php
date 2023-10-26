<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<?php
require_once(__DIR__ ."/controller/user.controller.php");

if (isset($_POST["userregister"])) {
    $user = new User();
    $user->nombre = $_POST["username"];
    $user->email = $_POST["email"];
    $user->password = $_POST["password"];

    $userController = new User_Controller();
    $userController->create($user);
}
?>
<body>
    <main>
        <section class="login__main">
            <h1>Bienvenido</h1>
            <form action="register.php" method="POST">
            <label for="data_user" class="login__user">
                    Email:
                    <input type="text" id="data_email" name="email" maxlength="18">
                </label>
                <label for="data_user" class="login__user">
                    Usuario:
                    <input type="text" id="data_user" name="username" maxlength="10">
                </label>
                <label for="data_password" class="login__password">
                    Contraseña:
                    <input type="text" id="data_password" name="password" maxlength="16">
                </label>
                <div class="user_login">
                    <input type="submit" name="userregister" value="Registrate" class="login-button">
                </div>
            </form>
            
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