<?php
require_once(__DIR__ ."/../controller/user.controller.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $userController = new User_Controller();
    $user = $userController->GetID($id);
?>
<form action="update_user.php" method="post">
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <label>
        Email:
        <input type="email" name="email">
    </label>
    <input type="submit" value="Guardar cambios">
</form>
<?php
} else {
    echo "Error: ID no definido.";
}
?>

