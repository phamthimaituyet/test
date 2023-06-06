<?php
require '../Controllers/UserController.php';
require '../Controllers/HomeController.php';

    session_start();

    $page = 'login';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if (isset($_POST['page']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $page = $_POST['page'];
    }

    switch ($page) {
        case 'home':
            $home = new HomeController();
            $home->home();
            break;
        case 'login':
            $user = new UserController();
            $user->login();
            break;
        case 'register':
            $user = new UserController();
            $user->register();
            break;
        default:
            echo 'Error';
            echo $page;
            break;
    }
?>
