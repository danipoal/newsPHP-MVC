<?php
    require_once __DIR__ ."/conection.php";
    require_once __DIR__ ."/../entities/User.php";

    class UserModel{

        public function __construct() {
            
        }

        public function getAllUsers(){
            $conection = createConection();
            $query = "SELECT * FROM usuario;";
    
            $result = mysqli_query($conection, $query);
            if ($result->num_rows > 0) {
                $users = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $user = new User($row["id"], $row["nombre"], $row["email"], $row["contrasena"]);
                    $users[] = $user;
                    echo '<script>console.log("' . $row["nombre"] . ' con email ' . $row["email"] . '")</script>';
                }
                closeConection($conection);
                return $users;
            }
            closeConection($conection);
            return 0;
        }
        public function createUser($user){
            $conection = createConection();
            $query = 'INSERT INTO Usuario(name, email, password) 
                VALUES("' . $user->name .'", "' . $user->email .'", "'. $user->password . '" );';
        
            // TODO
            // Hay que hacer que devuelva el scalar ID para luego devolver el usuario
            $affected_rows = mysqli_query($conection, $query);
            if ($affected_rows > 0) {
                return 1;
            }
            return 0;
        }

        // No es una forma segura de obtener un id por posible SQL Injection
        public function getUserById($id) : ?User {
            $conection = createConection();
            $query = "SELECT * FROM usuario WHERE id = " . $id . ";";

            $result = mysqli_query($conection, $query);
            if ($result && $row = mysqli_fetch_assoc($result)) {
                $user = new User($row["id"], $row["nombre"], $row["email"], $row["contrasena"]);
                return $user;
            }
            return null;
        }
        
        public function getUserByEmail($email) : ?User {
            $conection = createConection();
            $query = "SELECT * FROM usuario WHERE email = " . $email . ";";

            $result = mysqli_query($conection, $query);
            if ($result && $row = mysqli_fetch_assoc($result)) {
                $user = new User($row["id"], $row["nombre"], $row["email"], $row["contrasena"]);
                return $user;
            }
            return null;
        }
    }
?>