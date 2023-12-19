<?php
    require_once APP_ROOT."/app/models/Material.php";
    require_once APP_ROOT."/app/services/MaterialService.php";

    class MaterialController
    {
        //Display a list of Material
        public function index()
        {   
            
            $lessonId = $_GET['id'];
            // $material = new Material();
            $materialService = new MaterialService();
            $data = $materialService->getByLessonId($lessonId);
            $material = $data?[$data]:[];
            
            require APP_ROOT."/app/views/materials/index.php";
        }
        public function create()
        {
            require APP_ROOT."/app/views/materials/create.php";
        }

        public function store(){
            $title = $_POST['title'];
            $filePath = $_POST['file_path'];
            
            $material = new Material();
            $materialService = new MaterialService();
            $material->setTitle($title);
            $material->setFilePath($filePath);
           $materialService->save($material);

           header('Location: index.php?controller=material&action=index');

        }
        
        public function edit()
        {
            $id = $_GET['id'];
            $material = new Material();
            $materialService = new MaterialService();
            $data = $materialService->getById($id);
            $material ->setId($data['id']);
            $material ->setTitle($data['title']);
            $material->setFilePath($data['file_path']);
            require APP_ROOT.'/app/views/materials/edit.php';

        }

        public function update(){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $filePath = $_POST['file_path'];
           
        
            $material = new Material();
            $materialService = new MaterialService();
            $material->setId($id);
            $material->setTitle($title);
            $material->setFilePath($filePath);
            
            // Pass the lesson object to update method
            $result = $materialService->update($material);
        
            if ($result == true) {
                header('Location: index.php?controller=material&action=index&id='. $material->getId());
            } else {
                // Handle the error, you might want to display an error message
                echo "Update failed: " . $result;
            }
        }
        

        public function delete() {
            $id = $_GET['id'];
            $material = new Material();
            $material->setId($id);
            $materialService = new MaterialService();
            $result = $materialService->delete($id);
            if($result == true) {
            header('Location: index.php?controller=material&action=index&id=' . $material->getId());
            } else {
                echo "Update failed: " . $result;
            }
        }
    }
?>