<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-png" href="../../../images/logo image/Logo image.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
    <link rel="stylesheet" href="../../Chitietsp/chitietspcss/product.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="icon" type="image/x-png" href="../../../images/logo image/Logo image.png">
</head>

<body>
    <div class="header">
        <div class="head-container">
            <div class="top-bar">
                <a href="../../../logined.html" class="logo">
                    <img src="../../../images/logo image/Logo image.png" alt="boardgame logo">
                </a>
                <ul class="nav-bar">
                    <li><a href="../../../logined.html">Trang chủ</a></li>
                    <li><a href="../../trangspchinh/trangspchinh.html">Cửa Hàng</a></li>
                    <li><a href="../../../Lienhe/Lienhe.html">Liên hệ</a></li>
                </ul>
                <div class="nav-icon">
                    <a href="../../../login/html/dangnhap.html"><i class='bx bx-cart' ></i></a>
                    <a href="../../../login/html/dangnhap.html"><i class='bx bx-user'></i></a>


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
                    <div class="icon"><a href="../../../assets/search/search.html"><i class="fas fa-search"></i></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-list">
        <div class="menu-container">
            <div class="cover">
                <ul class="menu-link none">
                    <li>
                        <a href="../../../danhmucsanpham/chienluoc.html">
                        Chiến lược 
                    </a>
                        <a href="../../../danhmucsanpham/chienluoc.html"><span>></span></a>
                    </li>
                    <li>
                        <a href="#">
                        Các loại cờ
                    </a>
                        <a href=""><span>></span></a>
                    </li>
                    <li>
                        <a href="../../../danhmucsanpham/giadinh.html">
                        Gia đình
                    </a>
                        <a href="../../../danhmucsanpham/giadinh.html"><span>></span></a>
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
    



</body>

</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
<script src="../js/product.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.autoWidth').lightSlider({
            autoWidth: true,
            onSliderLoad: function() {
                $('.autoWidth').removeClass('cS-hidden');
            }
        });
    });
</script>
<script>
    var checkBox = document.getElementById("showAlert");
    checkBox.addEventListener("click", function() {

        alert("Bạn cần đăng nhập");
    });
</script>