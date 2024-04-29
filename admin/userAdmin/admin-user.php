<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin-user-page</title>
    <link rel="stylesheet" href="../admin-css/admin.css">
    <link rel="icon" type="image/png" href="assets/img/LOGO.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body style="background-color: #f3f8ff;">
   <input type="checkbox" id="menu-toggle">
   <div class="sidebar">
    <div class="side-header">
    
    </div>
    
    <div class="side-content" style="background-color: #f3f8ff; border-right: 1px solid #000;">
        <div class="profile">
            <div class="profile">
                <img src="/asset/images/1.png" alt="Logo" style="width: 100%; height: auto;">
                <h3 style="color: #74767d; font-weight: bold;">PET FOOD</h3> 
            </div>
        </div>

        <div class="side-menu">
             <ul>
                 <li style="margin-bottom: 15px;">
                     <a href="./admin.php">
                          <span class="las la-address-card" style="color: #74767d;"></span>
                          <h3 style="color: #74767d; font-weight: bold;">Người Quản Trị</h3>
                      </a>
                  </li>
                 <li style="margin-bottom: 15px;" >
                    <a href="./admin-user.php">
                         <span class="las la-user-alt" style="color:#74767d;"></span>
                         <h3 style="color: #74767d; font-weight: bold;">Khách Hàng</h3>
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

        <div class="page-content" style="margin-top: 50px;">
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="customer">Khách Hàng</h1>

            <div class="user-tab">
                <div class="user-input">
                </div>
                <div class="user-input"> 
             </div>
             <div class="user-input">
            </div>
          <div class="user-input">
          </div>
          
<div>
           <button><a href="./addUser.php">Thêm+></a></button>
</div>

            </div>
            
            </div>

            <div class="records table-responsive" >

                <div>
                <?php
                    require_once '../../require/connect.php';

                    // Số bản ghi trên mỗi trang
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
                    $sql_count = "SELECT COUNT(*) AS total FROM tbl_users";
                    $result_count = mysqli_query($conn, $sql_count);
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_records = $row_count['total'];

                    // Tính tổng số trang
                    $total_pages = ceil($total_records / $records_per_page);

                    // Truy vấn lấy dữ liệu với phân trang
                    $sql = "SELECT * FROM tbl_users LIMIT ?, ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "ii", $offset, $records_per_page);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($result) > 0) {
                        echo "<table id='table-user'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th> Mã Khách hàng </th>";
                                    echo "<th> Họ và tên </th>";
                                    echo "<th> Mật khẩu </th>";
                                    echo "<th> Email </th>";
                                    echo "<th> Số điện thoại </th>";
                                    echo "<th> Địa chỉ </th>";
                                    echo "<th> Vai trò </th>";
                                    echo "<th> Hành động </th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            // Lặp qua các hàng dữ liệu
                            while($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['phonenumber'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>";
                                    if ($row['role'] == 0) {
                                        echo "Khách hàng";
                                    } elseif ($row['role'] == 1) {
                                        echo "Admin";
                                    }                                       
                                    echo "</td>";
                                    echo '<td>
                                            <a href="./updateUser.php?id=' . $row['id'] . '"><button class="btn btn-primary">Sửa</button></a>
                                            <a onclick="return confirm(\'Bạn có chắc chắn muốn xóa ?\')" href="./deleteUser.php?id=' . $row['id'] . '">
                                                <button class="btn btn-danger">Xóa</button>
                                            </a>
                                        </td>';
                                echo "</tr>";
                        }
                            echo "</tbody>";
                            echo "</table>"; 
                    } else {
                        echo "<p> Không có dữ liệu </p>";
                    }

                    echo "<div class='pagination' style='margin-top: 20px; text-align: center;'>";
                    if ($page > 1) {
                        echo "<a href='admin-user.php?page=" . ($page - 1) . "'>&laquo;</a>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            echo "<span class='current' style='display: inline-block; padding: 5px 10px; margin: 0 2px; border: 1px solid #007bff; border-radius: 3px; color: #007bff; text-decoration: none; background-color: #007bff; color: white;'>$i</span>";
                        } else {
                            echo "<a href='admin-user.php?page=$i' style='display: inline-block; padding: 5px 10px; margin: 0 2px; border: 1px solid #007bff; border-radius: 3px; color: #007bff; text-decoration: none;'>$i</a>";
                        }
                    }
                    if ($page < $total_pages) {
                        echo "<a href='admin-user.php?page=" . ($page + 1) . "'>&raquo;</a>";
                    }
                    echo "</div>";
                
                    // Giải phóng bộ nhớ
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                ?>

                    
                </div>

            </div>
            
    

</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
