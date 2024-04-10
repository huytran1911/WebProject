<?php
require '../../require/connect.php' ;


if (isset($_POST['username'], $_POST['password1'], $_POST['email'], $_POST['phoneNumber'])) {

    $username = $_POST['username'];
    $password = $_POST['password1'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `tbl_users` (`username`, `password`, `email`, `phoneNumber`) VALUES ('$username', '$password', '$email', '$phoneNumber') ";

    if (mysqli_query($conn, $sql)) {
        echo "Lưu dữ liệu thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
