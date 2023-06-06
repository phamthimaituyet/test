<?php 
include_once 'BaseController.php';
require '../Models/UserModel.php'; 

class UserController extends BaseController
{
    public function __construct()
    {
        if (isset($_SESSION['email'])) {
            return header("Location: http://localhost/test/test/home");
        }
    }
  
    public function login()
    {
        $user = new UserModel();

        if ($this->isPost()) {
            $login = $user->checkUserLogin();

            if($login){
                $_SESSION['id'] = $login->id;
                $_SESSION['email'] = $_POST["email"];
                $_SESSION['timeout'] = time();

                header("Location: http://localhost/test/test/home");
            }
            else {
                $email = $_POST["email"];
                $err = "Thông tin tài khoản chưa đúng!";
                $this->render('login', compact('err', 'email'));
            }
        } else {
            $this->render('login');
        }

    }

    public function register()
    {
        $user = new UserModel();
        $error_flash = '';

        if($this->isPost()) {
            $errors = [];
            if (!isset($_POST['sex'])) {
                $errors['sex'] = 'Giới tính chưa chọn!';
            }

            foreach ($_POST as $key => $value) {
                $message = $this->__validateRegister($key, $value);
                if (!is_null($message)) {
                    $errors[$key] = $message;
                }
            }

            if (!empty($_POST["confirm_password"]) && $_POST["confirm_password"] != $_POST["password"]) {
                $errors['confirm_password'] = "Hai thông tin mật khẩu không match nhau!";
            }

            if (!empty($errors)) {
                $error_flash = 'Đăng ký thất bại';
                return $this->render('register', compact('errors', 'error_flash'));
            }

            $register = $user->singupUser();

            if($register){
                return header("Location: http://localhost/test/test/login");
            }

            $error_flash = 'Đăng ký thất bại';
        } 
        
        return $this->render('register', compact('error_flash'));
    }

    private function __validateRegister($key, $value) {
        $message = null;
        switch($key) {
            case 'email': 
                if (empty($value)) {
                    $message = 'Email là bắt buộc!';
                } else if (strlen($value) < 10 || strlen($value) > 100) {
                    $message = "Email có độ dài ký tự từ 10-100 ký tự!";
                }
                break;
            case 'password':
                if (empty($value)) {
                    $message[] = "Mật khẩu là bắt buộc";
                } else {
                    if (strlen($value) < 10 || strlen($value) > 50) {
                        $message[] = "Mật khẩu có độ dài từ 10-50 ký tự!";
                    }
                    // preg_match kiểm tra \d ( chữ số ) có trong $pwd không
                    if (!preg_match("/\d/", $value)) {
                        $message[] = "Mật khẩu phải chứa ít nhất một chữ số!";
                    }
                    if (!preg_match("/[A-Z]/", $value)) {
                        $message[] = "Mật khẩu nên chứa ít nhất một chữ in hoa!";
                    }
                    if (!preg_match("/[a-z]/", $value)) {
                        $message[] = "Mật khẩu nên chứa ít nhất một chữ thường!";
                    }
                    if (!preg_match("/\W/", $value)) {
                        $message[] = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt!";
                    }
                }
                break;
            case 'confirm_password':
                if (empty($value)) {
                    $message = "Bắt buộc nhập lại mật khẩu";
                }
                break;
            case 'first_name': 
            case 'last_name': 
                if (empty($value)) {
                    $message = "Tên là bắt buộc!";
                } else if (strlen($value) < 10 || strlen($value) > 50) {
                    $message = "Name có độ dài ký tự từ 10-50 ký tự!";
                }
                break;
            default:
                break;
        }

        return $message;
    }
}

?>
