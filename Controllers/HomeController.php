<?php 
include_once 'BaseController.php';

class HomeController extends BaseController
{
    function __construct()
    {
      $this->folder = 'pages';
    }
  
    public function home()
    {
        
      $this->render('home');
    }
}

?>
