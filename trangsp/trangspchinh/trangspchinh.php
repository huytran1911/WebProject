<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
    <link rel="stylesheet" href="../../assets/css/trangspchinh.css">
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
                <a href="../../index.html" class="logo">
                    <img src="../../images/logo image/Logo image.png" alt="boardgame logo">
                </a>
                <ul class="nav-bar">
                    <li><a href="../../index.html">Trang chủ</a></li>
                    <li><a href="../../trangsp.html/trangspchinh/trangspchinh.html">Cửa Hàng</a></li>
                    <li><a href="../../Lienhe/Lienhe.html">Liên hệ</a></li>

                </ul>
                <div class="nav-icon">
                    <a href="../../login/html/dangnhap.html"><i class='bx bx-cart'></i></a>
                    <a href="../../login/html/dangnhap.html"><i class='bx bx-user'> </i></a>
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
                    <div class="icon"><a href="../../assets/search/search.html"><i class="fas fa-search"></i></a></div>
                </div>
            </div>
        </div>
    </div>


    <div class="menu-list">
        <div class="menu-container">
            <div class="cover">
                <ul class="menu-link none">
                    <li>
                        <a href="../../danhmucsanpham/chienluoc.html">
                        Chiến lược 
                    </a>
                        <a href="../../danhmucsanpham/chienluoc.html"><span>></span></a>
                    </li>
                    <li>
                        <a href="#">
                        Các loại cờ
                    </a>
                        <a href="#"><span>></span></a>
                    </li>
                    <li>
                        <a href="../../danhmucsanpham/giadinh.html">
                        Gia đình
                    </a>
                        <a href="../../danhmucsanpham/giadinh.html"><span>></span></a>
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

    <div class="product-container">
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-3 col-sm-6">
            <div class="product-item">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['productName']; ?>">
                <h3><?php echo $product['productName']; ?></h3>
                <span><?php echo $product['price']; ?></span>
                <!-- Thêm các phần tử HTML khác để hiển thị thông tin sản phẩm -->
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

    <footer>
        <div class="footer-container ">
            <div class="row ">
                <div class="col-lg-3 col-sm-6 ">
                    <div class="single-box ">
                        <h2>CHĂM SÓC KHÁCH HÀNG</h2>
                        <ul>
                            <li><span>19001082</span></li>
                            <li><a href="# ">Từ thứ Hai đến thứ Bảy (08:00 - 17:00)</a></li>
                            <li><a href="# ">Chủ nhật (08:00 - 12:00)</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 ">
                    <div class="single-box ">
                        <h2>ĐIỀU KHOẢN & CHÍNH SÁCH</h2>
                        <ul>
                            <li><a href="# ">- Chính sách giao hàng </a></li>
                            <li><a href="# ">- Chính sách tích lũy điểm</a></li>
                            <li><a href="# ">- Điều khoản điều kiện</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 ">
                    <div class="single-box ">
                        <h2>HỖ TRỢ KHÁCH HÀNG</h2>
                        <ul>
                            <li><a href="# ">- Chính sách bảo mật </a></li>
                            <li><a href="# ">- Chính sách bảo hành đổi trả hàng hóa</a></li>
                            <li><a href="# ">- Chính sách thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 ">
                    <div class="single-box ">
                        <h2>Snake Boardgame</h2>
                    </div>
                    <img class="footer-img " src="/WebProject/images/logo image/SnakeBoardgame.png " alt=" ">
                </div>
            </div>
        </div>
    </footer>








</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4 " crossorigin="anonymous "></script>
<script src="../../assets/js/trangspchinh.js "></script>
<script>
    const addCartBtns = document.querySelectorAll('.add-cart-btn');

    addCartBtns.forEach(element => {
        element.addEventListener('click', function cartAdded() {
            window.location.href = "../../login/html/dangnhap.html"
            alert('Bạn chưa đăng nhập!')
        })
    });
</script>