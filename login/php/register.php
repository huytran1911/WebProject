<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameValue = trim($_POST['user_name1']);
    $password1Value = trim($_POST['password1']);
    $password2Value = trim($_POST['password2']);
    $emailValue = trim($_POST['email']);
    $phoneNumberValue = trim($_POST['phoneNumber']);
    $usernamePattern = '/^(?=.*[a-zA-Z])[a-zA-Z0-9]+$/';
    $emailPattern = '/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/';
    $phoneNumberPattern = '/^(0[1-9])+([0-9]{8,9})\b/';

    function setError($element, $message) {
        echo "<script>document.getElementById('$element').classList.add('error');</script>";
        echo "<script>document.getElementById('$element').classList.remove('success');</script>";
        echo "<script>document.querySelector('#$element + .error').innerText = '$message';</script>";
    }

    function setSuccess($element) {
        echo "<script>document.getElementById('$element').classList.add('success');</script>";
        echo "<script>document.getElementById('$element').classList.remove('error');</script>";
        echo "<script>document.querySelector('#$element + .error').innerText = '';</script>";
    }

    if (empty($usernameValue)) {
        setError('user_name1', 'Không được bỏ trống tên đăng ký');
        return false;
    } elseif (!preg_match($usernamePattern, $usernameValue)) {
        setError('user_name1', 'Tên đăng ký không hợp lệ');
        return false;
    } else {
        setSuccess('user_name1');
    }

    if (empty($emailValue)) {
        setError('email', 'Không được bỏ trống email');
        return false;
    } elseif (!preg_match($emailPattern, $emailValue)) {
        setError('email', 'Email không hợp lệ');
        return false;
    } else {
        setSuccess('email');
    }

    if (empty($password1Value)) {
        setError('password1', 'Không được bỏ trống mật khẩu');
        return false;
    } elseif (strlen($password1Value) < 6) {
        setError('password1', 'Mật khẩu phải lớn hơn 6 ký tự');
        return false;
    } else {
        setSuccess('password1');
    }

    if (empty($password2Value)) {
        setError('password2', 'Hãy xác nhận lại mật khẩu');
        return false;
    } elseif ($password2Value !== $password1Value) {
        setError('password2', 'Xác nhận mật khẩu không khớp');
        return false;
    } else {
        setSuccess('password2');
    }

    if (empty($phoneNumberValue)) {
        setError('phoneNumber', 'Không được bỏ trống số điện thoại');
        return false;
    } elseif (!preg_match($phoneNumberPattern, $phoneNumberValue)) {
        setError('phoneNumber', 'Số điện thoại không hợp lệ');
        return false;
    } else {
        setSuccess('phoneNumber');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form id="register" action="./updateUser.php" method ="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Tên đăng ký" id="user_name1" name="username">
                    <div class="error" style="color: red; padding-left:20px "></div>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Nhập mật khẩu" id="password1" name="password1">
                    <div class="error" style="color: red; padding-left:20px "></div>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Xác nhận lại mật khẩu" id="password2" name="password2">
                    <div class="error" style="color: red; padding-left:20px "></div>
                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">email</span>
                    <input type="text" placeholder="Điền địa chỉ Email" id="email" name="email">
                    <div class="error" style="color: red; padding-left:20px "></div>
                </div>
               
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">smartphone</span>
                    <input type="text" placeholder="Số điện thoại" id="phoneNumber" name="phoneNumber">
                    <div class="error" style="color: red; padding-left:20px "></div>
                </div>

                <button class="btn" type="submit" id="myButton"  onsubmit="validateInputs()"> Đăng ký </button>

            </form>
        </div>
        <div class="login-card-footer">
            Bạn đã có tài khoản ?<a href="../php/signin.php">Đăng nhập</a>
        </div>
    </div>
   
</body>

</html>

