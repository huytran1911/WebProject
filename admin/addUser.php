<?php
require "../require/connect.php";
require "./fuction.php";

$uid = "";  
$name = $email = $phone = "";
$name_err = $email_err = $phone_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Hãy nhập tên.";
    } else if (!preg_match("/^[a-zA-Z'-.\s+]+$/", $input_name)) {
        $name_err = "Tên không hợp lệ";
    } else {
        $name = $input_name;
    }

    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Hãy nhập email";
    } else if (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Email không hợp lệ";
    } else {
        $email = $input_email;
    }

    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Hãy nhập số điện thoại";
    } else if (!preg_match('/^(0|\+84)([3|5|7|8|9])+([0-9]{8})$/', $input_phone)) {
        $phone_err = "Số điện thoại không hợp lệ";
    } else {
        $phone = $input_phone;
    }
}

// check lỗi input trước khi insert vào database
if (empty($name_err) && empty($email_err) && empty($phone_err)) {
    // insert vào database
    $sql = "INSERT INTO tbl_usersadmin (Userid, Fullname, Email, PhoneNumber) VALUES (NULL, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_phone);

        $param_name = $name;
        $param_email = $email;
        $param_phone = $phone;

        // Tiến hành thực thi
        if (mysqli_stmt_execute($stmt)) {
            // Khi thực thi thành công thì sẽ quay về trang admin-user.php
            redirect('./admin-user.php');
   		    die();
        } else {
            echo "Đã xảy ra lỗi.";
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thêm người dùng mới</title>
    <style>
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2> Thêm người dùng mới </h2>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>Tên</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
                                <span class="text-danger"><?php echo $name_err; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" value= "<?php echo isset($email) ? $email : ''; ?>">
                                <span class="text-danger"><?php echo $email_err; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control" value= "<?php echo isset($phone) ? $phone : ''; ?>">
                                <span class="text-danger"><?php echo $email_err; ?></span>

                            </div>
                            <input type="submit" class="btn btn-primary" value="submit">
                            <a href="admin-user.php" class="btn btn-default">Huỷ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>