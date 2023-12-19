<?php
    
    class Lesson{
        
        private $courseId;
        private $id;
        private $title;
        private $description;
        private $createdDay;
        private $updatedDay;

        public function setCourseId($courseId){
            $this->courseId = $courseId;
        }

        public function getCourseId()
        {
            return $this->courseId;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setTitle($title){
            $this->title = $title;
        }
        public function getTitle(){
            return $this->title;
        }

        public function setDescription($description){
            $this->description = $description;
        }
        public function getDescription(){
            return $this->description;
        }

        public function setCreatedDay($createdDay){
            $this->createdDay = $createdDay;
        }
        public function getCreatedDay(){
            return $this->createdDay;
        }

        public function setUpdatedDay($updatedDay){
            $this->updatedDay = $updatedDay;
        }

        public function getUpdatedDay(){
            return $this->updatedDay;
        }

        

    }
?>