<?php
require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mysqli = new mysqli($_ENV["SERVER"], $_ENV["USER"], $_ENV["PASS"], $_ENV["DATABASE"]);
$mysqli->set_charset("utf8");
if ($mysqli->connect_error) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>