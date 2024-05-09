





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
                    <a href="#" class="trigger mobile-hide">
                        <i class='bx bx-menu'></i>
                    </a>
                </div>
            </div>
            <div class="wrapper">
                <div class="search-input">
                    <input type="text" placeholder="Tìm kiếm">
                    <div class="icon"><a href="../search/usersearch.html"><i class="fas fa-search"></i></a></div>
                </div>
            </div>
        </div>
    </div>


    <div class="menu-list">
        <div class="menu-container">
            <div class="cover">
                <ul class="menu-link none">
                    <li>
                        <a href="../../danhmucsanpham/chienluocUser.html">
                        Chiến lược 
                    </a>
                        <a href="../../danhmucsanpham/chienluocUser.html"><span>></span></a>
                    </li>
                    <li>
                        <a href="#">
                        Các loại cờ
                    </a>
                        <a href="#"><span>></span></a>
                    </li>
                    <li>
                        <a href="../../danhmucsanpham/giadinhUser.html">
                        Gia đình
                    </a>
                        <a href="../../danhmucsanpham/giadinhUser.html"><span>></span></a>
                    </li>
                    <li>
                        <a href="#">
                        Vận may
                    </a>
                        <a href="#"><span>></span></a>
                    </li>
                    <li>
                        <a href="#">
                        Nhập vai
                    </a>
                        <a href="#"><span>></span></a>
                    </li>
                    <li>
                        <a href="#">
                        Nhóm bạn
                    </a>
                        <a href="#"><span>></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>


    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="../../logined.html">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="../../images/feature images/avatar.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Minh Thư</h5>
                            <p class="text-muted mb-1">Sinh viên năm 2</p>
                            <p class="text-muted mb-4">Cam Ranh, Khánh Hòa</p>
                            <li class="list-group-item d-flex justify-content-between align-items-center "></li>
                            <p class="mb-0">Hạng thành viên:</p>
                            <img src="../../images/feature images/user.png" alt="" class="img-thumbnail" style="width: 300px; height: 150px   ;">


                        </div>
                    </div>

                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <!-- <ul>

                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">xi.muoi2010</p>

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">NV Minh Thư</p>
                                </li>

                            </ul> -->
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Họ và tên</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Nguyễn Võ Minh Thư</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa chỉ email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">minhthu20102004@gmail.com</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">SĐT</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">0866600845</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa chỉ</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Cam Ranh, Khánh Hòa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class=" font-italic me-1">Lịch sử đơn hàng:</span>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-md-2">
                                            <p>Đơn hàng 1:</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Ngày đặt: 12/8/2023</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Tổng giá tiền: 1.050.000đ</p>
                                        </div>
                                        <div class="col-md-3">

                                            <p>
                                                <a href="../users/chitietdonhang1.html">Chi tiết đơn hàng</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-md-2">
                                            <p>Đơn hàng 2:</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Ngày đặt: </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Tổng giá tiền: 1.920.000đ</p>
                                        </div>
                                        <div class="col-md-3">

                                            <p>
                                                <a href="../users/chitietdonhang2.html">Chi tiết đơn hàng</a>
                                            </p>
                                        </div>
                                    </div>



                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-9"><span class=" font-italic me-1">Tổng tiền đơn hàng khách đã mua:</span>
                                        </div>

                                        <div class="col-md-3"><span class=" font-italic me-1">Tổng: 1.740.000</span>

                                        </div>
                                    </div>

                            </div>


                        </div>
                        <div class="container mt-4 text-center">
                            <a href="../../page/logout.php" >
                            <button name="dangxuat" class="btn btn-success btn btn-danger text-white w-30" type="submit" >Đăng xuất</button></a>
                        </div>
                    </div>  
                </div>

            </div>

        </div>

        </div>

        </div>

    </section>



</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4 " crossorigin="anonymous "></script>

<!-- <script>
    var myButton1 = document.getElementById("myButton1");


    myButton1.addEventListener("click", function() {
        window.location.href = "../../index.html";
        alert("Bạn đã đăng xuất");


    });
</script> -->