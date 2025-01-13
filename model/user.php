<?php
    include_once("conection.php");

    class user{
        public $id;
        public $name;
        public $email;
        public $password;

        public function __construct($id, $name, $email, $password) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
    }

    function getAllUsers(){
        $conection = createConection();
        $query = "SELECT * FROM usuario;";

        $result = mysqli_query($conection,$query);
        if ($result->num_rows > 0) {
            $users = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new User($row["id"], $row["nombre"], $row["email"], $row["contrasena"]);
                $users = $user;
                echo $row["nombre"] . " con email " . $row["email"] . "<br>";
            }
            closeConection($conection);
            return $users;
        }
        closeConection($conection);
        return 0;
    }
?>