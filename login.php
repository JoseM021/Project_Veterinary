<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<?php
session_start();
if(isset($_SESSION["User_id"])) {
    header("Location: index.php");
    exit;
}
?>
<body>
    <main>
        <section class="login__main">
            <h1>Bienvenido</h1>
            <form action="login.php" method="POST">
                <label for="data_user" class="login__user">
                    Usuario:
                    <input type="text" id="data_user" name="username" maxlength="16" value="<?php echo $_POST["username"] ?? "" ?>">
                </label>
                <label for="data_password" class="login__password">
                    Contraseña:
                    <input type="password" id="data_password" name="password" value="<?php echo $_POST["password"] ?? "" ?>" maxlength="20">
                </label>
                <div class="user_login">
                    <input type="submit" name="userlogin" value="Ingresar" class="login-button">
                </div>
            </form>
            <?php
            include("../Project_Veterinary/process/create_login.php");
            ?>
            <article class="login__footer">
                <div class="login__redirectionR">
                    <a href="register.php">
                        ¿No tienes una cuenta?<br>
                        Registrate aquí
                    </a>
                </div>
                <div class="login__inicio">
                    <a href="index.php">
                        Inicio
                    </a>
                </div>
            </article>
        </section>
    </main>
</body>
</html>