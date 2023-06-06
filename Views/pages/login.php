<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
</head>
<?php 
$emailErr = $pwdErr = "";
$errors = array();
$email = $pwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email là bắt buộc!";
    } else {
        $email = $_POST["email"];
        if (strlen($email) < 10 || strlen($email) > 100) {
            $emailErr = "Email có độ dài ký tự từ 10-100 ký tự!";
        }
      }
    // else {
    //     $email = $_POST["email"];
    //     // check if e-mail address is well-formed
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //       $emailErr = "Định dạng email chưa đúng!";
    //     }
    //   }
    if (empty($_POST["password"])) {
        $pwdErr = "Mật khẩu là bắt buộc";
    } else {
        $pwd = $_POST["password"];
        if (strlen($pwd) < 10 || strlen($pwd) > 50) {
            $errors[] = "Mật khẩu có độ dài từ 10-50 ký tự!";
        }
        // preg_match kiểm tra \d ( chữ số ) có trong $pwd không
        if (!preg_match("/\d/", $pwd)) {
            $errors[] = "Mật khẩu phải chứa ít nhất một chữ số!";
        }
        if (!preg_match("/[A-Z]/", $pwd)) {
            $errors[] = "Mật khẩu nên chứa ít nhất một chữ in hoa!";
        }
        if (!preg_match("/[a-z]/", $pwd)) {
            $errors[] = "Mật khẩu nên chứa ít nhất một chữ thường!";
        }
        if (!preg_match("/\W/", $pwd)) {
            $errors[] = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt!";
        }
    }
}
?>
<body>
    <?php
        if (!empty($err)) {
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>$err</div>"; 
        }
    ?>
    <div class="container mt-3">
        <h1 class="mb-5">Đăng nhập</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value=<?= $email ?>>
                <div id="emailHelp" class="form-text">Không được chia sẻ tài khoản!</div>
                <?php
                    echo $emailErr;
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                <?php
                    echo $pwdErr;
                    if ($errors) {
                        foreach ($errors as $error) {
                            echo $error . ' ';
                        }
                    } 
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
        <a href="http://localhost/test/test/register" class="btn btn-primary float-end" style="margin-top: -39px;">Đăng ký</a>
    </div>
</body>
</html>
