<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="../admin-css/admin.css">
    <link rel="icon" type="image/png" href="assets/img/LOGO.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
        .product-image {
            max-width: 200px;
            max-height: 200px;
            width: auto;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background-color: #f3f8ff;">

<input type="checkbox" id="menu-toggle">
<div class="sidebar">
    <div class="side-header"></div>
    <div class="side-content" style="background-color: #f3f8ff; border-right: 1px solid #000;">
        <div class="profile">
            <img src="/asset/images/1.png" alt="Logo" style="width: 100%; height: auto;">
            <h3 style="color: #74767d; font-weight: bold;">PET FOOD</h3>
        </div>
        <div class="side-menu">
            <ul>
                <li style="margin-bottom: 15px;">
                    <a href="./admin.php">
                        <span class="las la-address-card" style="color: #74767d;"></span>
                        <h3 style="color: #74767d; font-weight: bold;">Người Quản Trị</h3>
                    </a>
                </li>
                <li style="margin-bottom: 15px;">
                    <a href="../userAdmin/admin-user.php">
                        <span class="las la-user-alt" style="color:#74767d;"></span>
                        <h3 style="color: #74767d; font-weight: bold;">Khách Hàng</h3>
                    </a>
                </li>
                <li style="margin-bottom: 15px;">
                    <a href="./Category.php">
                        <span class="las la-address-card" style="color: #74767d;"></span>
                        <h3 style="color: #74767d; font-weight: bold;">Danh Mục</h3>
                    </a>
                </li>
                <li style="margin-bottom: 15px;">
                    <a href="./admin-product.php">
                        <span class="las la-clipboard-list" style="color:#74767d;"></span>
                        <h3 style="color: #74767d; font-weight: bold;">Sản Phẩm</h3>
                    </a>
                </li>
                <li style="margin-bottom: 15px;">
                    <a href="./admin-order.php">
                        <span class="las la-shopping-cart" style="color:#74767d;"></span>
                        <h3 style="color: #74767d; font-weight: bold;">Đơn Hàng</h3>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="main-content" style="background-color: #f3f8ff;">
    <header>
        <div class="header-content">
            <label for="menu-toggle" id="bar-admin">
                <span class="las la-bars" style="font-size: 28px; margin-top: 8px;"></span>
            </label>
            <div class="header-menu">
                <div class="user" style="margin-right: 8px; margin-top: -30px;">
                    <div class="bg-img" style="background-image: url()"></div>
                    <span style="font-size: 25px;cursor: pointer;" onclick="window.location.href='admin.html'"></span>
                    <span style="font-size: 20px; cursor: pointer; color:#74767d ; font-weight: 600;" onclick="window.location.href='admin.html'">Trang chủ</span>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="page-content">
            <h1 style="padding: 1.3rem 0rem;color: #74767d; margin-left: 55px;" id="product">Sản Phẩm </h1>
            <div class="user-tab" style="margin-left: 55px;">
                <div class="user-input"></div>
                <div class="user-input" style="display: none;"></div>
                <div class="user-input"></div>
                <div class="user-input"></div>
                <div class="user-input"></div>
                <div>
                    <a href="./addProduct.php"><button onclick="addHtmlTableRow1();">Thêm +</button></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div class=".record-header"></div>
            <div>
                <table  id="table-product">
                    <thead>
                    <tr>
                        <th style="text-align: center; width: 10%;">Mã Sản Phẩm</th>
                        <th style="text-align: center; width: 10%;">Hình Ảnh Sản Phẩm</th>
                        <th style="text-align: center; width: 20%;">Tên Sản Phẩm</th>
                        <th style="text-align: center; width: 10%;">Giá</th>
                        <th style="text-align: center; width: 10%;">Danh Mục</th>
                        <th style="text-align: center; width: 20%;">Mô tả</th>
                        <th style="text-align: center; width: 5%;">Số lượng</th>
                        <th style="text-align: center; width: 8%;">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once "../../require/connect.php";
                    $records_per_page = 10;

                    // Xác định trang hiện tại
                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    // Tính offset cho truy vấn
                    $offset = ($page - 1) * $records_per_page;

                    // Truy vấn để lấy tổng số bản ghi
                    $sql_count = "SELECT COUNT(*) AS total FROM tbl_products";
                    $result_count = mysqli_query($conn, $sql_count);
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_records = $row_count['total'];

                    // Tính tổng số trang
                    $total_pages = ceil($total_records / $records_per_page);

                    // Truy vấn lấy dữ liệu với phân trang
                    $sql = "SELECT tbl_products.*, tbl_category.*
                            FROM tbl_products
                            JOIN tbl_category ON tbl_products.cid = tbl_category.cateid
                            ORDER BY pid ASC
                            LIMIT $offset, $records_per_page";


                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            // Code hiển thị dữ liệu
                            echo "<tr>";
                            echo "<td style='text-align: center'>" . $row['pid'] . "</td>";
                            echo "<td style='text-align: center'><img class='product-image' src='../productAdmin/uploads/" . $row['img'] . "' alt='Hình ảnh sản phẩm'></td>";
                            echo "<td style='text-align: center'>" . $row['productName'] . "</td>";
                            echo "<td style='text-align: center'>" . number_format($row['price'], 0, ',', '.') . "đ</td>";
                            echo "<td style='text-align: center'>" . $row['categoryName'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['detail'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['quantity'] . "</td>";
                            echo '<td style="text-align: center;">
                                    <a href="./updateProduct.php?pid=' . $row['pid'] . '"><button class="btn btn-primary">Sửa</button></a>
                                    <a onclick="return confirm(\'Bạn có chắc chắn muốn xóa ?\')" href="./deleteProduct.php?pid=' . $row['pid'] . '">
                                        <button class="btn btn-danger">Xóa</button>
                                    </a>
                                </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Hiển thị liên kết phân trang -->
    <div class="pagination" style="margin-top: 20px; text-align: center;">
        <?php
        if ($page > 1) {
            echo "<a href='admin-product.php?page=" . ($page - 1) . "'>&laquo;</a>";
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<span class='current' style='display: inline-block; padding: 5px 10px; margin: 0 2px; border: 1px solid #007bff; border-radius: 3px; color: #007bff; text-decoration: none; background-color: #007bff; color: white;'>$i</span>";
            } else {
                echo "<a href='admin-product.php?page=$i' style='display: inline-block; padding: 5px 10px; margin: 0 2px; border: 1px solid #007bff; border-radius: 3px; color: #007bff; text-decoration: none;'>$i</a>";
            }
        }
        if ($page < $total_pages) {
            echo "<a href='admin-product.php?page=" . ($page + 1) . "'>&raquo;</a>";
        }
        ?>
    </div>
</div>
</body>
</html>
