<?php

abstract class BaseController
{
    /**
     * Load view
     *
     * @param string
     * @param array
     * @desc    hàm load view, tham số truyền vào là tên của view và dữ liệu truyền qua view
     */
    public function show($view, $data = array())
    {
        // Chuyển mảng dữ liệu thành từng biến
        extract($data);
        include_once '../Views/Pages/' . $view . '.php';
    }

    function render($view, $data = array())
    {
        // Kiểm tra file gọi đến có tồn tại hay không?
        $view_file = '../Views/Pages/' . $view . '.php';
        if (is_file($view_file)) {
            // Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
            extract($data);
            // Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
            ob_start();
            require_once($view_file);
            $content = ob_get_contents();
            ob_end_clean();
            // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
            require('../Views/Layouts/application.php');
        } else {
            // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
            header("Location: http://localhost/test/test/login");
        }
    }

    /**
     * check request is post
     *
     * @desc  kiểm tra request có phải là post
     */
    public function isPost()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            return true;
        }
        return false;
    }

    /**
     * get value request
     *
     * @desc  lấy giá trị request
     */
    // public function request($email = null)
    // {
    //     if (!$email) {
    //         array_shift($_REQUEST);
    //         return $_REQUEST;
    //     }

    //     if ($_REQUEST[$email]) {
    //         return $_REQUEST[$email];
    //     }

    //     return null;
    // }
}
