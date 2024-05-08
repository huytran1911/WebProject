<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-png" href="images/logo image/Logo image.png">
    <title>SnakeBoardgame</title>

</head>
<?php 
include('page/header-in.php');
include('page/header-out.php');
include('page/main.php');
include('page/footer.php');

    require 'connect.php';
    session_start();


        $isLogined = false;
        if (isset($_SESSION['dangnhap'])) {
            // Người dùng đã đăng nhập
            require_once 'page/header-in.php';
            $isLogined = true;
        } else {
            // Người dùng chưa đăng nhập
            require_once 'page/header-out.php';
        }
   



?>



</body>

</html>

<script type="text/javascript " src="https://code.jquery.com/jquery-3.6.0.js "></script>
<script type="text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4 " crossorigin="anonymous "></script>
<script type="text/javascript ">
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
    var checkBox = document.getElementById("showAlert ");
    checkBox.addEventListener("click ", function() {
        window.location.href = "login/html/dangnhap.html";
        alert("Bạn cần đăng nhập ");
    });
</script>
<script>
    function cart1() {

        var myButton = document.getElementById("myButton ");

        myButton.addEventListener("click ", function() {
            alert("Bạn chưa đăng nhập ");

        });
    }
</script>
