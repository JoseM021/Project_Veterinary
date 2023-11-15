<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/preloaderIndex.css">
    <title>Veterinaria</title>
</head>
<body>
    <?php
    use Dotenv\Dotenv;
    require_once __DIR__ . "/vendor/autoload.php";

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    ?>
    <header>
        <div class="header__logo">
            <h3>Logo</h3>
        </div>
        <div class="rightContainerMain__buttons">
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
            <label for="menu-toggle" class="rightMore__button">More</label>
            <div class="right__buttons">
                <a href="register.php">Registro</a>
                <a href="login.php">Ingresar</a>
            </div>
        </div>
    </header>
    <body>
        <main class="centralContainer">
            <div class="containerUser">
                <div class="userInformation-left">
                    <div><img src="../Project_Veterinary/img/icon-user-default.png" alt="user-icon"></div>
                    <p class="userName" name="UserName">Username</p>
                </div>
                <div class="userInformation-center">
                    <p class="petsCount">Cantidad Mascotas:</p>
                </div>
            </div>
            <div class="containerMain">
                
            </div>
            <div class="containerFooter">

            </div>
        </main>
    </body>

    <div class="welcome__message">
        <div class="welcome__icon">
            <img src="img/Logo_Veterinary_Main.png" alt="welcome-icon">
        </div>
    </div>
    <script src="/javascript/loaderIndex.js"></script>
</body>
</html>