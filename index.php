<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    use Dotenv\Dotenv;
    require_once __DIR__ . "/vendor/autoload.php";

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    echo $_ENV["USER"];
    ?>
    <h2>Hola mundo cruel</h2>
</body>
</html>