<?php
include "../../require/connect.php";

function validateData($username, $password, $email, $phoneNumber, $address) {
    $errors = array();

    $usernameValue = trim($username);
    $passwordValue = trim($password);
    $emailValue = trim($email);
    $phoneNumberValue = trim($phoneNumber);
    $addressValue = trim($address); // Thêm biến địa chỉ vào hàm

    $usernamePattern = '/^(?=.*[a-zA-Z])[a-zA-Z0-9]+$/';
    $emailPattern = '/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/';
    $phoneNumberPattern = '/^(0[1-9])+([0-9]{8,9})\b/';

    if (empty($usernameValue)) {
        $errors['username'] = 'Không được bỏ trống tên đăng ký';
    } elseif (!preg_match($usernamePattern, $usernameValue)) {
        $errors['username'] = 'Tên đăng ký không hợp lệ';
    }

    if (empty($emailValue)) {
        $errors['email'] = 'Không được bỏ trống email';
    } elseif (!preg_match($emailPattern, $emailValue)) {
        $errors['email'] = 'Email không hợp lệ';
    }

    if (empty($passwordValue)) {
        $errors['password'] = 'Không được bỏ trống mật khẩu';
    } elseif (strlen($passwordValue) < 6) {
        $errors['password'] = 'Mật khẩu phải lớn hơn 6 ký tự';
    }

    if ($passwordValue !== $_POST['password2']) {
        $errors['password2'] = 'Xác nhận mật khẩu không khớp';
    }

    if (empty($phoneNumberValue)) {
        $errors['phoneNumber'] = 'Không được bỏ trống số điện thoại';
    } elseif (!preg_match($phoneNumberPattern, $phoneNumberValue)) {
        $errors['phoneNumber'] = 'Số điện thoại không hợp lệ';
    }

    if (empty($addressValue)) { // Kiểm tra nếu địa chỉ trống
        $errors['address'] = 'Không được bỏ trống địa chỉ';
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address']; // Lấy giá trị địa chỉ từ form

    // Kiểm tra dữ liệu
    $errors = validateData($username, $password, $email, $phoneNumber, $address);

    // Biến để kiểm tra xem đã hiển thị thông báo lỗi chưa
 

    // Nếu không có lỗi, thêm vào cơ sở dữ liệu
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu

        $sql = "INSERT INTO `tbl_users` (`username`, `password`, `email`, `phoneNumber`, `address`) VALUES ('$username', '$hashedPassword', '$email', '$phoneNumber', '$address') ";

        if (mysqli_query($conn, $sql)) {
            echo "Lưu dữ liệu thành công";
            header('Location:./signin.php');
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Trang đăng ký</title>
    <link rel="stylesheet" href="../../login/css/styledk.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
</head>

<body>
    <div class="register-card-container" id="account">
        <div class="form-container">
            <div class="register-card-header">
                <h1>ĐĂNG KÝ</h1>
            </div>
            <form id="register" action="" method="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Tên đăng ký" id="username" name="username">
                    <span class="text-danger"><?php if(isset($errors['username'])) echo $errors['username']; ?></span>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Nhập mật khẩu" id="password1" name="password1">
                    <span class="text-danger"><?php if(isset($errors['password'])) echo $errors['password']; ?></span>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Xác nhận lại mật khẩu" id="password2" name="password2">
                    <span class="text-danger"><?php if(isset($errors['password2'])) echo $errors['password2']; ?></span>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">email</span>
                    <input type="text" placeholder="Điền địa chỉ Email" id="email" name="email">
                    <span class="text-danger"><?php if(isset($errors['email'])) echo $errors['email']; ?></span>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">smartphone</span>
                    <input type="text" placeholder="Số điện thoại" id="phoneNumber" name="phoneNumber">
                    <span class="text-danger"><?php if(isset($errors['phoneNumber'])) echo $errors['phoneNumber']; ?></span>
                </div>
                <div class="form-item address-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="text" placeholder="Địa chỉ" id="address" name="address">
                    <span class="text-danger"><?php if(isset($errors['address'])) echo $errors['address']; ?></span> <!-- Hiển thị thông báo lỗi địa chỉ -->
                </div>
                <button class="btn" type="submit" id="myButton"> Đăng ký </button>
            </form>
        </div>
        <div class="login-card-footer">
            Bạn đã có tài khoản ?<a href="../php/signin.php">Đăng nhập</a>  
        </div>
    </div>
</body>

</html>

<style>
    /* Thêm phần CSS cho ô địa chỉ */
.address-item {
    position: relative;
}

.address-item .form-item-icon {
    position: absolute;
    top: .82rem;
    left: 1.4rem;
    font-size: 1.3rem;
    opacity: .4;
}

.address-item input[type="text"] {
    border: none;
    outline: none;
    background: rgba(255, 255, 255, .3);
    padding: 1rem 1.5rem;
    padding-left: calc(1rem * 3.5);
    border-radius: 100px;
    width: 100%;
    transition: background .5s;
}

.address-item input:focus {
    background: white;
}
</style>