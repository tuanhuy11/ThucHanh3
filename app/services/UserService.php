<?php
    require_once APP_ROOT.'/app/models/User.php';
    require_once APP_ROOT.'/app/configs/Database.php';

    class UserService {
        private $database;
        private $conn;

        public function __construct() {
            $this -> database = new Database();
            $this -> conn = $this -> database -> getConn();
        }

        public function handleGetAllUsers() {
            if ($this -> conn != null) {
                $query = "SELECT * FROM users ORDER BY id DESC";
                $statement = $this -> conn -> query($query);
                return $statement -> fetchAll(PDO::FETCH_ASSOC);
            }
            else {
                return [];
            }
        }

        public function handleGetPerUser($id) {
            if ($this -> conn != null) {
                $query = "SELECT * FROM users WHERE id=:id";
                $statement = $this -> conn -> prepare($query);
                $statement -> execute(["id" => $id]);

                return $statement -> fetchAll(PDO::FETCH_ASSOC);
            }
            else {
                return [];
            }
        }

        public function handleAddUser($fullname, $email, $password, $authorization) {
            if ($this -> conn != null) {
                $insert = "INSERT INTO users (name, email, password, authorization)
                           Values (:fullname, :email, :password, :authorization);";
                $statement = $this -> conn -> prepare($insert);

                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $data = [
                    "fullname" => $fullname,
                    "email" => $email,
                    "password" => $hashPass,
                    "authorization" => $authorization,
                ];
                $statement -> execute($data);
            }
        }

        public function handleEditUser($id, $fullname, $email, $authorization) {
            if ($this -> conn != null) {
                $update = "UPDATE users SET name=:fullname, email=:email, authorization=:authorization WHERE id=:id";
                $statement = $this -> conn -> prepare($update);

                $data = [
                    "id" => $id,
                    "fullname" => $fullname,
                    "email" => $email,
                    "authorization" => $authorization,
                ];
                $statement -> execute($data);
            }
        }

        public function handleDeleteUser($id) {
            if ($this -> conn != null) {
                $delete = "DELETE FROM users WHERE id=:id";
                $statement = $this -> conn -> prepare($delete);
                $statement -> execute([ "id" => $id ]);
            }
        }
    }
?>