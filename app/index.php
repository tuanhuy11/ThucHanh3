<?php
    require_once ('./configs/Constant.php');
    require_once APP_ROOT.'/app/configs/Database.php';

    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    $controllerClass = ucfirst($controller).'Controller';
    $controllerFile = "constrollers/$controllerClass.php";
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controllerInstance = new $controllerClass();
        $controllerInstance->$action();
    }
    else {
        echo "Controller not found";
    }
?>