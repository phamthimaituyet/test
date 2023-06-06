<?php 
include_once 'BaseController.php';

class UserController extends BaseController
{
    function __construct()
    {
      $this->folder = 'pages';
    }
  
    public function login()
    {
        
      $this->render('login');
    }
}

?>
