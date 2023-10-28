<?php
require_once(__DIR__ ."/../conexion.php");
require_once(__DIR__ ."/../model/User.php");

class User_controller extends Conexion {
    public function create (User $user) {

        $connection = $this->connect();
        $sql = "INSERT INTO User (username, email, password, Role_id) 
        VALUES ('{$user->username}', '{$user->email}', '{$user->password}', '{$user->Role_id}')";
        
        $result = $connection->query($sql);

        return $result;
    }
}

?>