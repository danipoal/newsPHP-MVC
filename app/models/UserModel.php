<?php
    require_once __DIR__ ."/conection.php";
    require_once __DIR__ ."/../entities/User.php";

    class UserModel{

        public function __construct() {
            
        }

        public function getAllUsers(){
            $conection = createConection();
            $query = "SELECT * FROM usuario;";
    
            $result = mysqli_query($conection,$query);
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
        public function createUser(){
            
        }
    }
?>