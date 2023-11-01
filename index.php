<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
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
        <div class="main__buttons">
            <a href="">Services</a>
            <a href="">About</a>
            <a href="">Contact</a>
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
</body>
</html>