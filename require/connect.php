<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "webproject_database";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Không thể kết nối " . $conn->connect_error);
}
?>
