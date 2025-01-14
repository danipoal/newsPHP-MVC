<?php
    class User{
        public $id;
        public $name;
        public $email;
        public $password;

        public function __construct($id = 0, $name = "", $email = "", $password = "") {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
    }
?>