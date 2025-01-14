<?php
    require_once __DIR__ ."/../models/UserModel.php";
    
    class UserController{
        private $userModel;

        public function __construct() {
            $this->userModel = new UserModel();
        }
        public function index(){
            // Sacar los elementos del sql a traves del modelo
            $users = $this->userModel->getAllUsers();

            // Cargarlos en la vista para luego ponerlos en /public
            require_once __DIR__ ."/../views/user/index.php";
        }

        public function createUser(){
            // Se obtienen los datos de la llamada POST del form
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            // Se validan (logica de negocio)
            // Comprobar que el email no este registrado ya

            // Llamar al modelo para que lo inserte en la bd
            $this->userModel->createUser();
            // Devolver la vista index actualizada
        }
    }
?>