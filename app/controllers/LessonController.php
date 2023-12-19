<?php
    require_once APP_ROOT."/app/models/Lesson.php";
    require_once APP_ROOT."/app/services/LessonService.php";

    class LessonController
    {
        //Display a list of lessons
        public function index()
        {
            $lessonService = new LessonService();
            $lessons = $lessonService->getAll();
            require APP_ROOT."/app/views/lessons/index.php";
        }
        public function create()
        {
            require APP_ROOT."/app/views/lessons/create.php";
        }

        public function store(){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $course_id = $_POST['course_id'];
            $lesson = new Lesson();
            $lessonService = new LessonService();
            $lesson->setTitle($title);
            $lesson->setDescription($description);
            $lesson->setCourseId($course_id);
           
           $lessonService->save($lesson);

           header('Location: index.php?controller=lesson&action=index');

        }
        
        public function edit()
        {
            $id = $_GET['id'];
            $lesson = new Lesson();
            $lessonService = new LessonService();
            $data = $lessonService->getById($id);
            $lesson ->setId($data['id']);
            $lesson ->setTitle($data['title']);
            $lesson->setDescription($data['description']);
            require APP_ROOT.'/app/views/lessons/edit.php';

        }

        public function update(){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
           
        
            $lesson = new Lesson();
            $lessonService = new LessonService();
            $lesson->setId($id);
            $lesson->setTitle($title);
            $lesson->setDescription($description);
            
            // Pass the lesson object to update method
            $result = $lessonService->update($lesson);
        
            if ($result === true) {
                header('Location: index.php?controller=lesson&action=index');
            } else {
                // Handle the error, you might want to display an error message
                echo "Update failed: " . $result;
            }
        }
        

        public function delete() {
            $id = $_GET['id'];
        
            $lessonService = new LessonService();
            $lessonService->delete($id);
            
            header('Location: index.php?controller=lesson&action=index');
        }
    }
?>