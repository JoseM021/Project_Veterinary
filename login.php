<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <section class="login__main">
            <h1>Bienvenido</h1>
            <form action="login.php" method="POST">
                <label for="data_user" class="login__user">
                    Usuario:
                    <input type="text" id="data_user" name="username" maxlength="10">
                </label>
                <label for="data_password" class="login__password">
                    Contraseña:
                    <input type="text" id="data_password" name="password" maxlength="16">
                </label>
                <div class="user_login">
                    <input type="submit" name="userlogin" value="Login" class="login-button">
                </div>
            </form>
            <?php
            include("conexion.php");
            include("controlador.php");
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