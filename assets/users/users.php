





<?php
// Bắt đầu phiên session nếu chưa được bắt đầu
if (!isset($_SESSION)) {
    session_start();
}

// Kiểm tra xem biến $_SESSION['taikhoan'] có tồn tại hay không
if (isset($_SESSION['dangnhap'])) {
    // echo $_SESSION['dangnhap'];
} else {
    // Xử lý trường hợp nếu $_SESSION['taikhoan'] không tồn tại
    // echo "Không có tài khoản được đăng nhập";
}
?>

<?php 

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}



function validateData($receiver, $email, $phone, $street, $ward, $district, $city, $order_date) {
    $errors = array();

    $receiverValue = trim($receiver);
    $emailValue = trim($email);
    $phoneValue = trim($phone);
    $streetValue = trim($street);
    $wardValue = trim($ward);
    $districtValue = trim($district);
    $cityValue = trim($city);
    $order_dateValue = trim($street);
   
    

    if (empty($receiverValue)) {
        $errors['receiver'] = 'Không được bỏ trống thông tin người nhận ';
   
    }

    if (empty($emailValue)) {
        $errors['email'] = 'Không được bỏ trống email';
    

    if (empty($phoneValue)) {
        $errors['phone'] = 'Không được bỏ trống số điện thoại';
    }
    
    if (empty($streetValue)) {
        $errors['street'] = 'Không được bỏ trống số điện thoại';
    }
    if (empty($wardValue)) {
        $errors['ward'] = 'Không được bỏ trống số điện thoại';
    }
    if (empty($districtValue)) {
        $errors['district'] = 'Không được bỏ trống số điện thoại';
    }
    if (empty($cityValue)) {
        $errors['city'] = 'Không được bỏ trống số điện thoại';
    }
    if (empty($order_dateValue)) {
        $errors['order_date'] = 'Không được bỏ trống số điện thoại';
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiver = $_POST['receiver'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $ward = $_POST['ward'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $order_date = $_POST['order_date'];

    // Kiểm tra dữ liệu
    $errors = validateData($receiver, $email, $phone, $street, $ward, $district, $city, $order_date);

    // Biến để kiểm tra xem đã hiển thị thông báo lỗi chưa
 

    // Nếu không có lỗi, thêm vào cơ sở dữ liệu
    if (empty($errors)) {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu

       $sql = "INSERT INTO `tbl_orders` (`receiver`, `email`, `phone`, `street`, `ward`, `district`, `city`, `order_date`) 
        VALUES ('$receiver', '$email', '$phone', '$street', '$ward', '$district', '$city', '$order_date')";


        if (mysqli_query($conn, $sql)) {
            echo "Lưu dữ liệu thành công";
            header('Location:../../index.php');
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
    <link rel="stylesheet" href="../css/trangspchinh.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-png" href="../../images/logo image/Logo image.png">
    <title>SnakeBoardgame</title>
    <style>
        .pagination {
            margin-top: 20px;
            text-align: center;
            justify-content: center;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            margin-right: 5px;
        }

        .pagination a.current, .pagination span.current {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination a:disabled {
            color: #ccc;
            pointer-events: none;
        }

        /* Thêm CSS cho hiển thị/ẩn menu */
        .none {
            display: none;
        }

        /* CSS cho hiệu ứng hiển thị danh sách */
        .show {
            display: block;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="head-container">
            <div class="top-bar">
                <a href="../../logined.html" class="logo">
                    <img src="../../images/logo image/Logo image.png" alt="boardgame logo">
                </a>
                <ul class="nav-bar">
                    <li><a href="../../logined.html">Trang chủ</a></li>
                    <li><a href="../../trangsp.html/trangspchinh/usertrangsanphamchinh.html">Cửa Hàng</a></li>
                    <li><a href="../../Lienhe/UserLienhe.html">Liên hệ</a></li>

                </ul>
                <div class="nav-icon">
                    <a href="../cart/cart.html"><i class='bx bx-cart'></i></a>
                    <!-- <span style="padding-top: 10px; padding-right: 5px;"></span> -->
                    <a href="#"><i class='bx bx-user'> <?php echo $_SESSION['dangnhap'];?>   </i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="border-top">
        <div class="border-container">
            <div class="box-menu">
                <div class="main-text">
                    Danh mục sản phẩm
                    <!-- Thêm ID cho nút menu -->
                    <a href="#" id="menu-toggle" class="trigger mobile-hide">
                        <i class='bx bx-menu'></i>
                    </a>
                </div>
            </div>
            <div class="wrapper">
                <div class="search-input">
                    <input type="text" placeholder="Tìm kiếm">
                    <div class="icon"><a href="../../assets/search/search.html"><i class="fas fa-search"></i></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm lớp CSS cho danh sách danh mục -->
    

    <div class="menu-list">
        <div class="menu-container">
            <div class="cover">
            <ul class="menu-link none" id="menu-list">
        <?php
        // Truy vấn để lấy danh sách danh mục từ cơ sở dữ liệu
        $sql_categories = "SELECT * FROM tbl_category";
        $result_categories = mysqli_query($conn, $sql_categories);

        // Kiểm tra xem có danh mục nào hay không
        if (mysqli_num_rows($result_categories) > 0) {
            // Hiển thị danh sách các danh mục
            while ($row_category = mysqli_fetch_assoc($result_categories)) {
                echo "<li><a href='./loaisp.php?cateid=" . $row_category['cateid'] . "'>" . $row_category['categoryName'] . "</a></li>";

            }
        } else {
            echo "<li><a href='#'>Không có danh mục</a></li>";
        }
        ?>
    </ul>
            </div>
        </div>
    </div>


    
    <h2>Thông tin đặt hàng</h2>
    <form action="process_order.php" method="post">
        <label for="receiver">Tên người nhận:</label><br>
        <input type="text" id="receiver" name="receiver" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Số điện thoại:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="street">Địa chỉ:</label><br>
        <input type="text" id="street" name="street" required><br><br>

        <label for="ward">Phường/Xã:</label><br>
        <input type="text" id="ward" name="ward" required><br><br>

        <label for="district">Quận/Huyện:</label><br>
        <input type="text" id="district" name="district" required><br><br>

        <label for="city">Thành phố:</label><br>
        <input type="text" id="city" name="city" required><br><br>

        <input type="submit" value="Đặt hàng">
    </form>


</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4 " crossorigin="anonymous "></script>

<!-- Đoạn JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuToggle = document.getElementById('menu-toggle'); // Lấy nút menu
        var menuList = document.getElementById('menu-list'); // Lấy danh sách danh mục
        var menuLinks = document.querySelectorAll('.menu-link a'); // Lấy tất cả các liên kết trong menu

        // Thêm sự kiện click cho nút menu
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
            menuList.classList.toggle('show'); // Thêm hoặc loại bỏ lớp 'show' để ẩn hoặc hiển thị danh sách
        });
            });

</script>