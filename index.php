<?php
    require 'config.php';
    require 'vendor/autoload.php';
    require 'loader.php';

    $controller = new App\Controller\ContactController();

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }
    else
        $controller->home();