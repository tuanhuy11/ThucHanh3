<?php
    class User {
        private $id;
        private $name = 'Unknown';
        private $email;
        private $password;
        private $authorization;

        public function __construct($id, $name, $email, $password, $authorization) {
            $this -> id = $id;
            $this -> name = $name;
            $this -> email = $email;
            $this -> password = $password;
            $this -> authorization = $authorization;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }
 
        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getAuthorization()
        {
            return $this->authorization;
        }

        public function setAuthorization($authorization)
        {
            $this->authorization = $authorization;
        }
    }
?>