<?php
    include_once 'BaseModel.php';

    class UserModel extends BaseModel{
       
        function checkUserLogin()
        {
            $email = $_POST["email"];
			$password = md5($_POST["password"]);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role = 1";
            $result = mysqli_query($this->conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                return $this->getFirst($result);
            }
            return false;
        }

        function singupUser()
        {
            $email = $_POST["email"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $password1 = $_POST["password"];
            $password2 = $_POST["confirm_password"];
            $sex = $_POST["sex"];
            $address = $_POST["address"];

            if ($password1 == $password2) {
                $password = md5($password1);
                $sql = "SELECT * FROM users WHERE email = '$email' ";
                $result = mysqli_query($this->conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    return false;
                } else {
                    $sql = "INSERT INTO users (email, password, first_name, last_name, sex, address, role) VALUES ('$email' ,'$password', '$first_name', '$last_name', '$sex', '$address', 2)";
                    mysqli_query($this->conn, $sql);
                }
            
            } else {
                return false;
            }
    
            return true;
        }
    }
?>
