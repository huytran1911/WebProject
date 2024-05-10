

<?php
require '../../require/connect.php';
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
// Kiểm tra trạng thái của session trước khi bắt đầu một session mới
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra khi người dùng nhấn nút "Thêm vào giỏ"
if (isset($_POST['addtocart'])) {
    // Lấy thông tin sản phẩm từ form
    $product_id = $_POST['id'];
    $product_image = $_POST['image'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];

    // Kiểm tra xem session giỏ hàng đã được khởi tạo chưa, nếu chưa thì tạo mới
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $product_index = -1;  
    foreach ($_SESSION['cart'] as $index => $product) {
        if ($product['id'] == $product_id) {
            $product_index = $index;
            break;
        }
    }

    if ($product_index >= 0) {
        // Nếu sản phẩm đã tồn tại, tăng số lượng của nó
        $_SESSION['cart'][$product_index]['quantity'] += 1;
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng
        $product = array(
            'id' => $product_id,
            'image' => $product_image,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1 // Số lượng ban đầu là 1
        );
        array_push($_SESSION['cart'], $product);
    }

    // // Chuyển hướng người dùng đến trang giỏ hàng
    // header('Location: ../../assets/cart/cart.php');
    // exit();
}

// Kiểm tra khi người dùng nhấn nút "Xóa sản phẩm khỏi giỏ hàng"
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    // Tìm vị trí của sản phẩm trong giỏ hàng và xóa nó
    foreach ($_SESSION['cart'] as $index => $product) {
        if ($product['id'] == $product_id) {
            unset($_SESSION['cart'][$index]);
            break;
        }
    }
    // Chuyển hướng người dùng đến trang giỏ hàng
    header('Location: cart.php');
    exit();
}
// Kiểm tra khi người dùng cập nhật số lượng sản phẩm
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['quantity'];
    // Tìm vị trí của sản phẩm trong giỏ hàng và cập nhật số lượng mới
    foreach ($_SESSION['cart'] as $index => $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['cart'][$index]['quantity'] = $new_quantity;
            // Tính toán giá tiền mới
            $_SESSION['cart'][$index]['total_price'] = calculateNewPrice($product['price'], $new_quantity);
            break;
        }
    }
    // Chuyển hướng người dùng đến trang giỏ hàng
    header('Location: cart.php');
    exit();
}

function calculateNewPrice($price, $quantity) {
    $new_price = $price * $quantity;
    return '<td>' . number_format($new_price, 2) . '</td>';
}

?>



<style>
        /* Thiết lập CSS cho giao diện */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .remove-btn {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .update-btn {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .small-image {
    width: 100px; /* Kích thước chiều rộng mới */
    height: auto; /* Chiều cao tự động tính toán tương ứng */
}
    </style>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
    <link rel="stylesheet" href="../cart/cart.css">
    <!-- <link rel="stylesheet" href="../css/main.css">   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-png" href="../../images/logo image/Logo image.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>SnakeBoardgame</title>

</head>

<body>
<?php
// require '../../require/connect.php';
 
   

//         $isLogined = false;
//         if (isset($_SESSION['dangnhap'])) {
//             // Người dùng đã đăng nhập
//             require_once '../../page/header-in.php';
//             $isLogined = true;
//         } else {
//             // Người dùng chưa đăng nhập
//             require_once '../../page/header-out.php';
//         }
//   ?> 
    <div class="container">
        <h2>Giỏ hàng của bạn</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <thead>
                <tr>
                    <th>ID Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $product): ?>
                <tr>
                <td><?php echo $product['id']; ?></td>
                <td><img src="../../admin/productAdmin/uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="small-image"></td>
                <td><?php echo $product['name']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <!-- Hiển thị giá tiền mới -->
                            <?php echo calculateNewPrice($product['price'], $product['quantity']); ?>
                        </form>
                    </td>
                    <td>
                        <form method="GET">
                            <input type="hidden" name="remove" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="remove-btn">Xóa</button>
                        </form>
                    </td>
                    
                    <td>
                        <form method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" min="1" max="100">
                            <button type="submit" class="update-btn">Cập nhật</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Giỏ hàng của bạn trống.</p>
        <?php endif; ?>
        <a href="../../trangsp/trangspchinh/trangspchinh.php">Tiếp tục mua sắm</a>
    </div>
</body>
                        
</html>
 