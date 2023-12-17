<?php
    require_once APP_ROOT.'/app/services/UserService.php';

    class UserController {
        private $service;

        public function __construct() {
            $this -> service = new UserService();
        }

        public function index() {
            $users = $this -> service -> handleGetAllUsers();
            include_once APP_ROOT.'/app/views/admin/users/index.php';
        }

        public function pageAddUser() {
            include_once APP_ROOT.'/app/views/admin/users/add.php';
        }

        public function pageEditUser() {
            $id = $_GET['id'];
            $user = $this -> service -> handleGetPerUser($id);
            include_once APP_ROOT.'/app/views/admin/users/edit.php';
        }

        public function addUser() {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $authorization = $_POST['authorization'];
            $this -> service -> handleAddUser($fullname, $email, $password, $authorization);
            
            header("Location:/app?controller=user&action=index");
        }

        public function editUser() {
            $id = $_GET['id'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $authorization = $_POST['authorization'];
            $this -> service -> handleEditUser($id, $fullname, $email, $authorization);

            header("Location:/app?controller=user&action=index");
        }

        public function deleteUser() {
            $id = $_POST['id'];
            $this -> service -> handleDeleteUser($id);
            echo json_encode($this -> service -> handleGetAllUsers());
        }
    }

    // Redirect to see which method will be run by which form
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $userController = new UserController();

        if (isset($_POST['button-add'])) $userController -> addUser();
        else if (isset($_POST['button-edit'])) $userController -> editUser();
    }
?>