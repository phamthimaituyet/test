<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
</head>
<body>
    <?php
        if (!empty($error_flash)) {
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>$error_flash</div>"; 
        }
    ?>

    <div class="container mt-3">
        <h1 class="mb-5">Đăng ký tài khoản</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" name="email">
                <?php
                    if (isset($errors['email'])) {
                        echo $errors['email'];
                    }
                ?>
            </div>
            <div class="mb-3 d-flex">
                <div class="pe-2" style="width: 50%;">
                    <label for="inputFirstName" class="form-label">Nhập họ</label>
                    <input type="text" class="form-control" id="inputFirstName" aria-describedby="emailHelp" name="first_name">
                    <?php
                        if (isset($errors['first_name'])) {
                            echo $errors['first_name'];
                        }
                    ?>
                </div>
                <div class="ps-2" style="width: 50%;">
                    <label for="inputLastName" class="form-label">Nhập tên</label>
                    <input type="text" class="form-control" id="inputLastName" aria-describedby="emailHelp" name="last_name">
                    <?php
                        if (isset($errors['last_name'])) {
                            echo $errors['last_name'];
                        }
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                <?php
                    if (isset($errors['password'])) {
                        foreach($errors['password'] as $value) {
                            echo $value . " ";
                        }
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password">
                <?php
                    if (isset($errors['confirm_password'])) {
                        echo $errors['confirm_password'];
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="inputSex" class="form-label me-5">Giới tính</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">Khác</label>
                </div>
                <?php
                    if (isset($errors['sex'])) {
                        echo $errors['sex'];
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Nhập địa chỉ</label>
                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
        <a href="/test/test/login" class="btn btn-primary float-end" style="margin-top: -39px;">Đăng nhập</a>
    </div>
</body>
</html>
