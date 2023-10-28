<?php
if (!empty($_POST["userregister"])) {
    if (empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["email"])) {
        echo "Todos los campos son obligatorios";
    }
    else {

        $userController = new User_Controller();
        $user = new User();

        $user->username = $_POST["username"];
        $user->password = $_POST["password"];
        $user->email = $_POST["email"];
        $user->Role_id=1;

        $connection = $userController->connect();
        $sql = "SELECT * FROM Role where id = '{$user->Role_id}'";
        if ($stmt = $connection->prepare($sql)) {

            $stmt->bind_param("i", $user->Role_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $status = $userController->create($user);
    
                if ($status) {
                    echo "Usuario creado exitosamente";
                } else {
                    echo "Error al crear el usuario";
                }
            } else {
                echo "El Role_id proporcionado no existe en la tabla Role";
            }
    
            $stmt->close();
        } else {
            echo "Error al prepara la Consulta SQL: " . htmlspecialchars($connection->error);
        }
        $connection->close();
    }
}
/* require_once(__DIR__ ."/../controller/user.controller.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userController = new User_Controller();
    $user = new User();
    $user->Role_id = 1;
    $valido = true;

    $connection = $userController->connect();
    $sql = "SELECT * FROM role WHERE id = '{$user->Role_id}'";
    $result = $connection->query($sql);




    if ($result->num_rows == 0) {
        $valido = false;
        $error["Role_id"] = "El rol no existe";
        echo"Suuuuuuuu1";
    }
    if (!empty($_POST["username"])) {
        $user->username = $_POST["username"];
        echo"Seeeeee2";
    } else {
        $valido = false;
        $error["username"] = "Este campo es obligatorio";
    }
    

    if (!empty($_POST["email"])) {
        $user->email = $_POST["email"];
        echo"Seeeeee3";
    } else {
        $valido = false;
        $error["email"] = "Este campo es obligatorio";
    }
    

    if (!empty($_POST["password"])) {
        $user->password = $_POST["password"];
        echo"Seeeeee4";
    } else {
        $valido = false;
        $error["password"] = "Este campo es obligatorio";
    }
    

    if ($valido) {
        echo "Intentando crear el usuario...";
        $status = $userController->create($user);

        if ($status) {
            echo "Usuario creado";
            $message = "Se guardó en la base de datos";
        } else {
            echo "Fallo crear Usuario";
            $message = "No se guardó en la base de datos";
        }
        echo $status;
    }
} */

?>