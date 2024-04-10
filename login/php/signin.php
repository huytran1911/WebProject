<?php
session_start();
include '../../require/connect.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn cơ sở dữ liệu để kiểm tra tên người dùng và mật khẩu
    $sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Tên người dùng và mật khẩu hợp lệ, chuyển hướng người dùng đến trang chính của ứng dụng
        $_SESSION['username'] = $username;
        header("Location: ../../../../logined.html"); // Điều hướng đến trang chính của ứng dụng
        exit();
    } else {
        // Tên người dùng hoặc mật khẩu không hợp lệ, hiển thị thông báo lỗi
        $error = "Tên người dùng hoặc mật khẩu không chính xác";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="../../login/css/styledn.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
</head>

<body>
    <div class="login-card-container" id="account">

        <div class="form-container">

            <div class="login-card-header">
                <h1> Vui lòng đăng nhập </h1>

            </div>
            <form id="login">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Tên đăng nhập " id="username">


                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Mật khẩu " id="password">
                </div>
                <div class="form-item-other">
                  
                </div>
                <button class="btn" type="submit" onclick="login()"> Đăng Nhập</button>

            </form>



        </div>
        <div class="login-card-footer">
            Bạn chưa có tài khoản ?<a href="../php/register.php">Đăng ký</a>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script>
        
    </script>

</body>

</html>