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
    public function update(User $usuario) {
        $connection = $this->connect();
        $sql = "UPDATE User SET username = '{$usuario->username}', email = '{$usuario->email}', password = '{$usuario->password}'
        WHERE id = '{$usuario->id}';";

        $resultado = $connection->query($sql);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete (User $user) {
        $connection = $this->connect();
        $sql = "DELETE FROM User Where id='{$user->id}'";
        $result = $connection->query($sql);
        return $result;
    }
    public function read() {
        $connection = $this->connect();
        $users = [];
    
        $sql = "SELECT * FROM User";
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->id = $row["id"];
                $user->username = $row["username"];
                $user->email = $row["email"];
                $user->password = $row["password"];
                $user->Role_id = $row["Role_id"];
                $users[] = $user;
            }
        }
    
        return $users;
    }

    public function GetID($id) {
        $connection = $this->connect();
        $sql = "SELECT * FROM User WHERE id='{$id}'";
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->password = $row['password'];
            $user->email = $row['email'];
            $user->Role_id = $row['Role_id'];
    
            return $user;
        } else {
            return null;
        }
    }
    
    public static function findEmailPassword($email, $password, $connection) {
        $result = $connection->query("SELECT * FROM User WHERE email = '$email' AND password = '$password'");
      
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $user = new User();
          $user->id = $row['id'];
          $user->username = $row['username'];
          $user->password = $row['password'];
          $user->email = $row['email'];
          return $user;
        } else {
          return null;
        }
    }        
    public function login($email, $password) {
        $connection = $this->connect();
        if (!($user = $this->findEmailPassword($email, $password, $connection))) {
            return false;
        }
        $_SESSION["user_id"] = $user->id;
         
        return true;
    }
}
?>