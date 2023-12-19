<?php 
    class HomeService {
        private $conn;

        public function __construct() {
            $this->conn = (new Database())->getConn();
        }

        public function handleLoginService($email, $password) {
            $sql = 'SELECT * FROM users WHERE email = :email';
            try {
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(':email', $email);
                $stm->execute();
                $data = $stm->fetch(PDO::FETCH_ASSOC);
                if ($data && password_verify($password, $data['password'])) {
                    return $data;
                }
                return [];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>