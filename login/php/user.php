<?php
require "../../require/connect.php"; // Kết nối đến cơ sở dữ liệu
function checkUserInfo($username, $password) {
    global $host, $username, $password, $dbname;

    // Kết nối đến CSDL
    $conn = new mysqli($host, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Không thể kết nối " . $conn->connect_error);
    }

    // Sử dụng câu truy vấn Prepared Statement để tránh SQL Injection
    $sql = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    // Kiểm tra lỗi truy vấn
    if ($stmt === false) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    // Bind các tham số và thực thi truy vấn
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Lấy kết quả của truy vấn
    $result = $stmt->get_result();

    // Kiểm tra xem có dòng nào trả về hay không
    if ($result->num_rows > 0) {
        // Dòng dữ liệu tồn tại, có nghĩa là thông tin người dùng hợp lệ
        return true;
    } else {
        // Không có dòng dữ liệu nào trả về, có nghĩa là thông tin người dùng không hợp lệ
        return false;
    }

    // Đóng kết nối và giải phóng bộ nhớ
    $stmt->close();
    $conn->close();
}

// Sử dụng hàm để kiểm tra thông tin người dùng
$username = "huy";
$password = "huytran123";

if (checkUserInfo($username, $password)) {
    echo "Thông tin người dùng hợp lệ.";
} else {
    echo "Thông tin người dùng không hợp lệ.";
}
?>
