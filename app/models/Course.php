<?php 
    class Course {
        private $id;
        private $title;
        private $description;
        private $authorId;

        public function __construct() {
    
        }
    
        public function getId() {
            return $this->id;
        }
        public function getTitle() {
            return $this->title;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getAuthorId() {
            return $this->authorId;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setTitle($title) {
            $this->title = $title;
        }
        public function setDescription($description) {
            $this->description = $description;
        }
        public function setAuthorId($authorId) {
            $this->authorId = $authorId;
        }
    }
?>