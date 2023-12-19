<?php 
    class CourseController {
        public function index() {
            if (isset($_SESSION['currentUser']) && ($_SESSION['currentUser']['role'] == 'admin' || $_SESSION['currentUser']['role'] == 'author')) {
                
                $_SESSION['active'] = 'course';
                $authors = [];
                $courseService = new CourseService();
                $idAuthorCurrent = $_SESSION['currentUser']['id'];
                
                $curentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $courses = $courseService->getCourseLimit($curentPage, LIMIT, $idAuthorCurrent);
                $total = $courseService->getTotalCourses($idAuthorCurrent);
                $totalPage = ceil($total / LIMIT);
                $totalShow = isset($_GET['page']) ? $_GET['page']+2 : 3;
                $startShow = $totalShow > 3 ? $totalShow - 2 : 1;
                if ($startShow + 2 > $totalPage) {
                    $totalShow = $totalPage;
                }

                include APP_ROOT.'/app/views/courses/index.php';
                exit();
            }
            else {
                header('location: index.php');
                exit();
            }
        }
        
        public function show() {
            if (isset($_SESSION['currentUser']) && ($_SESSION['currentUser']['role'] == 'admin' || $_SESSION['currentUser']['role'] == 'author')) {
                $_SESSION['active'] = 'course';
                $authors = [$_SESSION['currentUser']];
                
                include_once APP_ROOT.'/app/views/courses/add.php';
                exit();
            }
            else {
                header('location: index.php');
                exit();
            }
        }

        public function add() {
            
            if (isset($_SESSION['currentUser']) 
                && ($_SESSION['currentUser']['role'] == 'admin' || $_SESSION['currentUser']['role'] == 'author') 
                && isset($_POST['title']) && isset($_POST['description']) 
            ){
                $_SESSION['active'] = 'user';
                $course = new Course();
                $course->setTitle($_POST['title']);
                $course->setDescription($_POST['description']);
                $course->setAuthorId($_POST['author']);

                $courseService = new CourseService();
                $res = $courseService->addCourseService($course);
                if ($res && $res['status']) {
                    header('location: index.php?c=course');
                    exit();
                }
                else {
                    header('location: index.php?c=course&error='.$res['message']);
                    exit();
                }
            }
            else {
                header('location: index.php');
                exit();
            }
        }

        public function delete() {
            if (isset($_SESSION['currentUser']) && ($_SESSION['currentUser']['role'] == 'admin' || $_SESSION['currentUser']['role'] == 'author')
                && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])
            ){
                $_SESSION['active'] = 'course';
                $courseService = new CourseService();
                $check = $courseService->deleteCourseService($_POST['id']);
                echo json_encode($check);
                exit();
            }
            else {
                header('location: index.php');
                exit();
            }
        }

        public function showEdit() {
            if (isset($_SESSION['currentUser']) && ($_SESSION['currentUser']['role'] == 'admin' || $_SESSION['currentUser']['role'] == 'author')
                && isset($_GET['id'])
            ) {
                $_SESSION['active'] = 'course';
                $courseService = new CourseService();
                $data = $courseService->getCourseById($_GET['id']);
                $course = new Course();
                $course->setId($data['id']);
                $course->setTitle($data['title']);
                $course->setDescription($data['description']);
                $course->setAuthorId($data['user_id']);
                
                $authors = [$_SESSION['currentUser']];

                include_once APP_ROOT.'/app/views/courses/edit.php';
                exit();
            }
            else {
                header('location: index.php');
                exit();
            }
        }

        public function save() {
            if (isset($_SESSION['currentUser']) && ($_SESSION['currentUser']['role'] == 'admin' || $_SESSION['currentUser']['role'] == 'author')
                && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['authorId'])
            ) {
                $_SESSION['active'] = 'course';
                $course = new Course();
                $course->setId($_POST['id']);
                $course->setTitle($_POST['title']);
                $course->setDescription($_POST['description']);
                $course->setAuthorId($_POST['authorId']);
                
                $courseService = new CourseService();
                $res = $courseService->saveCourseService($course);
                if ($res && $res['status']) {
                    header('location: index.php?c=course');
                    exit();
                }
                else {
                    header('location: index.php?c=course&a=showEdit&id='.$course->getId().'&error='.$res['message']);
                    exit();
                }
            }
            else {
                header('location: index.php');
                exit();
            }
        }
    }
?>