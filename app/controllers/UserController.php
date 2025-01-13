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
    }
?>