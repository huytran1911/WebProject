<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/admin-css/loginadmin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<title> Admin đăng nhập</title>
<body onload='checkLogin()'>   
    <div id="wrapper">
        <form action="" id="form-login">
            <h1 class="form-headding">Đăng nhập</h1>
             <div class="form-group">
                <i class="fa regular fa-user"></i>
                <input type="text" class="form-input" placeholder="Tên đăng nhập" id="Tên đăng nhập">
             </div>
             <div class="form-group">
                <i class="fa solid fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu" id="Mật khẩu">
                <div id="eye">
                <i class="fa solid fa-eye"></i>
                </div>
             </div>
             <button onclick='Login()' class="form-submit"> Đăng nhập</button>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="/admin/js/admin.js"></script>
</html>