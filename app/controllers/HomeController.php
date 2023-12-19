<?php 
    class HomeController {
        public function login () {

            require_once APP_ROOT.'/app/views/auth/login.php';
        }

        public function handleLogin() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = (new HomeService())->handleLoginService($_POST['email'], $_POST['password']);
                if ($data) {
                    $_SESSION['currentUser'] = $data;
                    header('location: index.php');
                    exit();
                }
                else {
                    header('location: index.php?controller=home&action=login&error='.'Email or password is not exist');
                    exit();
                }
            }
        }
    }
?>