<?php
require '../Controllers/UserController.php';
require '../Controllers/HomeController.php';

    $page = 'login';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
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
        default:
            echo 'Error';
            echo $page;
            break;
    }
?>
