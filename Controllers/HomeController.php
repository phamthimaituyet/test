<?php 
include_once 'BaseController.php';

class HomeController extends BaseController
{
    public function __construct()
    {
        if (!isset($_SESSION['email'])) {
            return header("Location: http://localhost/test/test/Route");
        }
    }
   
    public function home()
    {    
      $this->render('home');
    }
}

?>
