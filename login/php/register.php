
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

<script>
    const register = document.getElementById('register');
    const username = document.getElementById('user_name1');
    const password1 = document.getElementById('password1');
    const password2 = document.getElementById('password2');
    const email = document.getElementById('email');
    const phoneNumber = document.getElementById('phoneNumber');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        if (validateInputs()) {
            register.submit();
        }
    });

    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    }

    const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    }

    function validateInputs() {
        
        const usernameValue = username.value.trim();
        const password1Value = password1.value.trim();
        const password2Value = password2.value.trim();
        const emailValue = email.value.trim();
        const phoneNumberValue = phoneNumber.value.trim();
        const usernamePattern = /^(?=.*[a-zA-Z])[a-zA-Z0-9]+$/;
        const emailPattern = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        const phoneNumberPattern = /^(0[1-9])+([0-9]{8,9})\b/;

        if (usernameValue === '') {
            setError(username, 'Không được bỏ trống tên đăng ký');
        } else if (!usernamePattern.test(usernameValue)) {
            setError(username, 'Tên đăng ký không hợp lệ');
        } else {
            setSuccess(username);
        }

        if (emailValue === ''){
            setError(email, 'Không được bỏ trống email');
        } else if (!emailPattern.test(emailValue)) {
            setError(email, 'Email không hợp lệ');
        } else {
            setSuccess(email);
        }    

        if (password1Value === ''){
            setError(password1, 'Không được bỏ trống mật khẩu');
        } else if (password1Value.length < 6) {
            setError(password1, 'Mật khẩu phải lớn hơn 6 ký tự');
        } else {
            setSuccess(password1);
        }

        if (password2Value === ''){
            setError(password2, 'Hãy xác nhận lại mật khẩu');
        } else if (password2Value !== password1Value) {
            setError(password2, 'Xác nhận mật khẩu không khớp');
        } else {
            setSuccess(password2)
        }

        if (phoneNumberValue === ''){
            setError(phoneNumber, 'Không được bỏ trống số điện thoại');
        } else if (!phoneNumberPattern.test(phoneNumberValue)) {
            setError(phoneNumber, 'Số điện thoại không hợp lệ');
        } else {
            setSuccess(phoneNumber);
        }

    };
</script>
