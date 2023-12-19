<?php 
    class CourseService {
        private $conn;
        
        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConn();
        }

        public function getAllCoursesByUser($userId) {
            $sql = 'SELECT * FROM courses c INNER JOIN course_user cu ON cu.course_id = c.id
                    WHERE cu.user_id = :user_id';
            $data = [];
            try {
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $stm->execute();
                $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getAllCoursesAndUser() {
            $sql = 'SELECT c.id, c.title, c.description, cu.user_id, u.name FROM courses c 
                    INNER JOIN course_user cu ON cu.course_id = c.id
                    INNER JOIN users u ON u.id = cu.user_id';
            $data = [];
            try {
                $stm = $this->conn->prepare($sql);
                $stm->execute();
                $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // Lấy name, id author và số lượng khóa học của author
        public function getAuthorAndCourseCount() {
            $sql = 'SELECT u.id, u.name, COUNT(cu.course_id) as total FROM course_user cu 
                    INNER JOIN users u ON u.id = cu.user_id
                    GROUP BY cu.user_id';
            $data = [];
            try {
                $stm = $this->conn->prepare($sql);
                $stm->execute();
                $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getCourseLimit( $currentPage, $limit, $idAuthorCurrent) {
            $sql = 'SELECT * FROM courses c INNER JOIN course_user cu ON cu.course_id = c.id
                    WHERE cu.user_id = :userId LIMIT :start, :limit';
            $data = [];
            try {
                $stm = $this->conn->prepare($sql);
                $start = ($currentPage -1 )* $limit;
                $stm->bindParam(':userId', $idAuthorCurrent, PDO::PARAM_INT);
                $stm->bindParam(':start', $start, PDO::PARAM_INT);
                $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stm->execute();
                $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getTotalCourses($idAuthorCurrent) {
            $sql = 'SELECT COUNT(*) as total FROM courses c INNER JOIN course_user cu ON cu.course_id = c.id
                    WHERE cu.user_id = :userId';
            try {
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(':userId', $idAuthorCurrent, PDO::PARAM_INT);
                $stm->execute();
                $data = $stm->fetch(PDO::FETCH_ASSOC);
                return $data['total'];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getNewIdCourse() {
            $sql = 'SELECT c.id FROM courses c GROUP BY c.id ORDER BY c.id DESC LIMIT 1';
            try {
                $stm = $this->conn->prepare($sql);
                $stm->execute();
                $data = $stm->fetch(PDO::FETCH_ASSOC);
                return $data['id'];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function addCourseService($course) {
            $sql1 = 'INSERT INTO courses (title, description) VALUES (:title, :description)';
            $sql2 = 'INSERT INTO course_user (course_id, user_id) VALUES (:course_id, :user_id)';
            try {
                $stm = $this->conn->prepare($sql1);
                $title = $course->getTitle();
                $description = $course->getDescription();
                $stm->bindParam(':title', $title);
                $stm->bindParam(':description', $description);
                $check = $stm->execute();
                if ($check) {
                    $newCourseId = (new courseService)->getNewIdCourse($course->getAuthorId());
                    $authorId = $course->getAuthorId();
                    $stm = $this->conn->prepare($sql2);
                    $stm->bindParam(':course_id', $newCourseId, PDO::PARAM_INT);
                    $stm->bindParam(':user_id', $authorId);
                    $check = $stm->execute();
                }
                return [
                    'status' => $check,
                    'message' => $check ? 'Add to succcess' : 'Add to failded'
                ];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function deleteCourseService($id) {
            $sql = 'DELETE FROM courses WHERE id = :id';
            try {
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(':id', $id);
                $check = $stm->execute();
                return $check;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } 

        public function getCourseById($id) {
            $sql = 'SELECT * FROM courses c INNER JOIN course_user cu ON cu.course_id = c.id
                    WHERE id = :id';
            $data = [];
            try {
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $data = $stm->fetch(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function saveCourseService($course) {
            $sql = 'UPDATE courses SET title = :title, description = :description WHERE id = :id';
            try {
                $stm = $this->conn->prepare($sql);
                $id = $course->getId();
                $title = $course->getTitle();
                $description= $course->getDescription();
                $stm->bindParam(':id', $id);
                $stm->bindParam(':title', $title);
                $stm->bindParam(':description', $description);
                $check =  $stm->execute();
                return [
                    'status' => $check,
                    'message' => $check ? 'Update to succcess' : 'Update to failded'
                ];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

?>