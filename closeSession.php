<?php
session_start();
$_SESSION["User_id"] = "";
session_destroy();
header("Location: index.php");
exit;
?>