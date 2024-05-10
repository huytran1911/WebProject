


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

    <div class="header">
        <div class="head-container">
            <div class="top-bar">
                <a href="index.php" class="logo">
                    <img src="images/logo image/Logo image.png" alt="boardgame logo">
                </a>
                <ul class="nav-bar">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="trangsp/trangspchinh/trangspchinh.php">Cửa Hàng</a></li>
                    <li><a href="Lienhe/Lienhe.html">Liên hệ</a></li>

                </ul>
                <div class="nav-icon">
                    <a href="login/html/dangnhap.html"><i class='bx bx-cart'></i></a>
                    <a href="assets/users/users.php"><i class='bx bx-user'> <?php echo $_SESSION['dangnhap'];?>  </i></a>
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
    <img class="images" src="images/logo image/SnakeBoardgame.png" alt="">
            </div>
        </div>
    </div>

    <div class="feature">
        <div class="ft-cover">
            <div class="ft-box">
                <a><img class="feature-img" src="images/feature images/f1.png" alt=""></a>
                <h5>Miễn phí giao hàng</h5>
            </div>
            <div class="ft-box">
                <a><img class="feature-img" src="images/feature images/f2.png" alt=""></a>
                <h5>Đặt hàng online</h5>
            </div>
            <div class="ft-box">
                <a><img class="feature-img" src="images/feature images/f3.png" alt=""></a>
                <h5>Tiết kiệm chi phí</h5>
            </div>
            <div class="ft-box">
                <a><img class="feature-img" src="images/feature images/f4.png" alt=""></a>
                <h5>Khuyến mãi</h5>
            </div>
            <div class="ft-box">
                <a><img class="feature-img" src="images/feature images/f5.png" alt=""></a>
                <h5>Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
