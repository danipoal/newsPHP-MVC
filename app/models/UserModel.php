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
            $query = 'INSERT INTO Usuario(nombre, email, contrasena) 
                VALUES("' . $user->name .'", "' . $user->email .'", "'. $user->password . '" );';
        
            // TODO
            // Hay que hacer que devuelva el scalar ID para luego devolver el usuario
            $result = mysqli_query($conection, $query); // No devuelve affected rows directamente como ASP
            if ($result) {                          // Devuelve true o false
                closeConection($conection);
                return 1;
            }
            closeConection($conection);
            return 0;
        }

        // No es una forma segura de obtener un id por posible SQL Injection
        public function getUserById($id) : ?User {
            $conection = createConection();
            $query = "SELECT * FROM usuario WHERE id = " . $id . ";";

            $result = mysqli_query($conection, $query);
            if ($result && $row = mysqli_fetch_assoc($result)) {
                $user = new User($row["id"], $row["nombre"], $row["email"], $row["contrasena"]);
                closeConection($conection);
                return $user;
            }
            closeConection($conection);
            return null;
        }
        
        public function getUserByEmail($email) : ?User {
            $conection = createConection();
            $query = 'SELECT * FROM usuario WHERE email = "' . $email . '";';

            $result = mysqli_query($conection, $query);
            if ($result && $row = mysqli_fetch_assoc($result)) {
                $user = new User($row["id"], $row["nombre"], $row["email"], $row["contrasena"]);
                closeConection($conection);
                return $user;
            }
            closeConection($conection);
            return null;
        }
        public function deleteUserById($id) {
            $query = 'DELETE FROM usuario WHERE id = '. $id .';';
            $conection = createConection();

            $result = mysqli_query($conection, $query);
            if ($result) {
                $affected_rows = mysqli_affected_rows($conection); // Número de filas afectadas
                closeConection($conection);
                if ($affected_rows > 0) {
                    return 1; // Hubo filas afectadas
                }
                return 0; // Consulta exitosa pero no afectó filas
            } else {
                closeConection($conection);
                return -1; // Error en la consulta
            }
        }
    }
?>