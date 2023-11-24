<?php
session_start();
if (isset($_POST["closeSession"])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>