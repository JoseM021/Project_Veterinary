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
                <?php
                while ($row = $query->fetch_assoc()): ?>
                <tr class="rowscontent__users">
                    <th><?= $row['id'] ?></th>
                    <th><?= $row['username'] ?></th>
                    <th><?= $row['email'] ?></th>
                    <th><?= $row['password'] ?></th>
                    <th class="roleID__users"><?= $row['Role_id'] ?></th>
                    <th class="button__edit">
                        <form action="./process/edit_user.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="username" value="<?= $row['username'] ?>">
                            <input type="hidden" name="password" value="<?= $row['password'] ?>">
                            <input type="hidden" name="email" value="<?= $row['email'] ?>">
                            <input type="submit" value="Editar">
                        </form>
                    </th>
                    <th class="button__delete">
                        <form action="./process/delete_user.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id']?>">
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