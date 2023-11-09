<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/users_registered.css">
    <title>CRUD Usuarios</title>
</head>
<?php 
include("conexion.php");
require_once(__DIR__ . "/process/update_user.php");
$con = new Conexion();
$mysqli = $con->connect();

$query = $mysqli->query("SELECT * FROM User");
?>
<body>
<section class="main__users">
    <div class="users__tittle">
        <h2>Usuarios Registrados</h2>
    </div>
    <table class="table__users">
        <thead>
            <tr class="rowscontent__header">
                <th>ID</th>
                <th>username</th>
                <th>email</th>
                <th>password</th>
                <th>role_id</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $query->fetch_assoc()): ?>
                <tr class="rowscontent__users">
                    <form action="./process/update_user.php" method="post" id="editForm<?= $row['id'] ?>">
                        <th><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></th>
                        <th><input type="text" name="username" value="<?= $row['username'] ?>"></th>
                        <th><input type="text" name="email" value="<?= $row['email'] ?>"></th>
                        <th><input type="text" name="password" value="<?= $row['password'] ?>"></th>
                        <th><input type="text" readonly="readonly" name="role_id" value="<?= $row['Role_id'] ?>"></th>
                        <th><input type="submit" value="Actualizar"></th>
                    </form>
                    <th>
                        <form action="./process/delete_user.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="submit" value="Eliminar">
                        </form>
                    </th>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</section>
</body>
</html>