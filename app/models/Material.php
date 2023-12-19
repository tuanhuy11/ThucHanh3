<?php
    
    class Material{
        private $conn;
        private $id;
        private $lessonId;
        private $title;
        private $filePath;
        private $createDay;
        private $updatedDay;

        public function setId($id){
            $this->id = $id;
        }
        
        public function getId()
        {
            return $this->id;
        }
        public function setLessonId($lessonId){
            $this->lessonId = $lessonId;
        }

        public function getLessonId(){
            return $this->lessonId;
        }

        public function setTitle($title){
            $this->title = $title;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setFilePath($filePath){
            $this->filePath= $filePath;
        }
        public function getFilePath(){
            return $this->filePath;
        }

        public function setCreateDay($createDay){
            $this->createDay = $createDay;
        }
        public function getCreateDay(){
            return $this->createDay;
        }
        public function setUpdatedDay($updatedDay){
            $this->updatedDay = $updatedDay;
        }
        public function getUpdatedDay(){
            return $this->updatedDay;
        }
    }
?>