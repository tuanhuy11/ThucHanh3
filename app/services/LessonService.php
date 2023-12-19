<?php
    include_once APP_ROOT.'/app/configs/Database.php';

    class LessonService
    {
        private $conn;
        
            public function __construct() {

                $database = new Database();
                $this->conn = $database->getConnection();
            }
            public function getAll() {
                try {

                $sqlQuery = 'Select * from lessons';
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

            public function getById($id){
                    $sqlQuery = "Select * from lessons where id = :id";
                    $stmt = $this->conn->prepare($sqlQuery);
                    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    return $stmt->fetch();
            }


            public function save($lesson){
               try{
                $sqlQuery = "Insert Into lessons (title, description, course_id) values(:title, :description, :course_id)";
                $stmt = $this->conn->prepare($sqlQuery);
                
                    $lessonDescription = $lesson->getDescription();
                    $lessonTitle = $lesson->getTitle();
                    $courseId = $lesson->getCourseId();


                    $stmt->bindParam(":title", $lessonTitle);
                    $stmt->bindParam(":description", $lessonDescription);
                    $stmt->bindParam(":course_id", $courseId);

                return $stmt->execute();
                // echo '<pre>';
                // print_r($stmt);
                // echo '</pre>';
               }catch (PDOException $e) {  
                echo $e->getMessage();
               }
            }
            public function update($lesson){
                try {
                    $sqlQuery = "UPDATE lessons SET title = :title, description = :description WHERE id = :id ";
                    $stmt = $this->conn->prepare($sqlQuery);

                    $lessonId = $lesson->getId();
                    $lessonDescription = $lesson->getDescription();
                    $lessonTitle = $lesson->getTitle();
                    $stmt->bindParam(":id", $lessonId);
                    $stmt->bindParam(":title", $lessonTitle);
                    $stmt->bindParam(":description", $lessonDescription);
                    
                    return $stmt->execute();
                    // echo '<pre>';
                    // print_r($stmt);
                    // echo '</pre>';
                    

                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
            

            
            public function delete($id) {
                // Xóa tất cả các tài liệu liên quan đến bài học
                $this->deleteMaterialsByLessonId($id);
            
                // Sau đó, xóa bài học
                $sqlQuery = "DELETE FROM lessons WHERE id = :id";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
            }
            
            private function deleteMaterialsByLessonId($lessonId) {
                $sqlQuery = "DELETE FROM materials WHERE lesson_id = :lesson_id";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(":lesson_id", $lessonId, PDO::PARAM_INT);
                $stmt->execute();
            }
            
        }
?>