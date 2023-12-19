<?php
    include_once APP_ROOT.'/app/configs/Database.php';

    class MaterialService
    {
        private $conn;
        
            public function __construct() {

                $database = new Database();
                $this->conn = $database->getConnection();
            }
            public function getAll() {
                try {

                $sqlQuery = 'Select * from materials';
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            public function getByLessonId($lessonId){
                $sqlQuery = "Select * from materials where lesson_id = :lesson_id";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(":lesson_id", $lessonId, PDO::PARAM_INT);
                $stmt->execute();
                
                // echo '<pre>';
                // print_r($stmt->fetchAll);
                // echo '</pre>';
                return $stmt->fetch();
                
        }

            public function getById($id){
                    $sqlQuery = "Select * from materials where id = :id";
                    $stmt = $this->conn->prepare($sqlQuery);
                    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    return $stmt->fetch();
            }


            public function save($material){
               try{
                $sqlQuery = "Insert Into materials (lesson_id, title, file_path) values(:lesson_id,:title, :file_path)";
                $stmt = $this->conn->prepare($sqlQuery);
                
                    $materialFilePath = $material->getFilePath();
                    $materialTitle = $material->getTitle();
                    $materialLessonId = $material->getLessonId();

                    $stmt->bindParam(":title", $materialTitle);
                    $stmt->bindParam(":file_path", $materialFilePath);
                    $stmt->bindParam(":lesson_id", $materialLessonId);
                   

                return $stmt->execute();
                // echo '<pre>';
                // print_r($stmt);
                // echo '</pre>';
               }catch (PDOException $e) {  
                echo $e->getMessage();
               }
            }
            public function update($material){
                try {
                    $sqlQuery = "UPDATE materials SET title = :title, file_path = :file_path WHERE id = :id ";
                    $stmt = $this->conn->prepare($sqlQuery);

                    $materialId = $material->getId();
                    $materialFilePath = $material->getFilePath();
                    $materialTitle = $material->getTitle();
                    $stmt->bindParam(":id", $materialId);
                    $stmt->bindParam(":title", $materialTitle);
                    $stmt->bindParam(":file_path", $materialFilePath);
                    
                    // echo '<pre>';
                    // print_r($material);
                    // echo '</pre>';
                    return $stmt->execute();

                    

                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
            

            
            public function delete($id) {
                // Xóa tất cả các tài liệu liên quan đến tài nguyên
                // $this->deleteMaterialsByLessonId($id);
            
                // Sau đó, xóa bài học
                try {
                    $sqlQuery = "DELETE FROM materials WHERE id = :id";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                // echo '<pre>';
                //     print_r($id);
                //     echo '</pre>';
                $stmt->execute();
                }catch (PDOException $e) {
                    echo $e->getMessage();
                }
                
                
            }
            
            // private function deleteMaterialsByLessonId($lessonId) {
            //     $sqlQuery = "DELETE FROM materials WHERE lesson_id = :lesson_id";
            //     $stmt = $this->conn->prepare($sqlQuery);
            //     $stmt->bindParam(":lesson_id", $lessonId, PDO::PARAM_INT);
            //     $stmt->execute();
            // }
            
        }
?>