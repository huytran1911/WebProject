<?php
  
?>



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
        
        /* CSS cho hình ảnh sản phẩm */
        .product-image {
            max-width: 200px; /* Giới hạn chiều rộng tối đa của hình ảnh */
            max-height: 200px; /* Giới hạn chiều cao tối đa của hình ảnh */
            width: auto; /* Cho phép chiều rộng tự động điều chỉnh theo chiều cao để giữ tỷ lệ hình ảnh */
            height: auto; /* Cho phép chiều cao tự động điều chỉnh theo chiều rộng để giữ tỷ lệ hình ảnh */
            display: block; /* Hiển thị hình ảnh dưới dạng block để căn chỉnh nội dung xung quanh */
            margin: 0 auto; /* Canh giữa hình ảnh trong khung chứa */
        }
    </style>
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
                     <a href="./addCategory.php">
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
        
        <main >
<div class="page-content">
        
    <h1 style="padding: 1.3rem 0rem;color: #74767d; margin-left: 55px;" id="product">Sản Phẩm Muốn Thêm</h1>
    <div class="user-tab" style="margin-left: 55px;">
        <div class="user-input">
   
             
        </div>
        <div class="user-input" style="display: none;">
           
    
                 </div>
        <div class="user-input">
           
        
        </div>
        <div class="user-input">
       
       
        </div>
        <div class="user-input">
          

        </div>

   

       <div>
        <a href="./addProduct.php"><button onclick="addHtmlTableRow1();">Thêm +</button></a>
                <button onclick="editHtmlTbleSelectedRow1();">Chỉnh <span class="las la-edit"></span></button>
                <button onclick="removeSelectedRow1();">Xóa <span class="las la-trash"></span></button>
</div>

    </div>
</div>
          
          <div class="table-responsive" >

            <div class=".record-header">
            
            </div>

            <div>
            <table  id="table-product">
            <thead>
            <?php   
            require_once "../../require/connect.php";
            $sql = "SELECT p.pid, p.img, p.productName, p.price, p.quantity, p.detail, c.categoryName
                    FROM tbl_products AS p
                    INNER JOIN tbl_category AS c ON p.cid = c.cateid;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {

                echo "<table id='table-product' style='width: 100%;'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='text-align: center; width: 10%;'>Mã Sản Phẩm</th>";
                echo "<th style='text-align: center; width: 10%;'>Hình Ảnh Sản Phẩm</th>";
                echo "<th style='text-align: center; width: 20%;'>Tên Sản Phẩm</th>";
                echo "<th style='text-align: center; width: 10%;'>Giá</th>";
                echo "<th style='text-align: center; width: 10%;'>Danh Mục</th>";
                echo "<th style='text-align: center; width: 20%;'>Mô tả</th>";
                echo "<th style='text-align: center; width: 5;'>Số lượng</th>";
                echo "<th style='text-align: center; width: 8%;'>Hành động</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Lặp qua các hàng dữ liệu
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td style='text-align: center'>" . $row['pid'] . "</td>";
                    echo "<td style='text-align: center'><img class='product-image' src='/WebProject/admin/productAdmin/uploads/" . $row['img'] . "' alt='Hình ảnh sản phẩm'></td>";
                    echo "<td style='text-align: center'>" . $row['productName'] . "</td>";
                    echo "<td style='text-align: center'>" . $row['price'] . "</td>";
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
                echo "</tbody>";
                echo "</table>"; 
                echo "</div>"; // Kết thúc phần tử có khả năng cuộn
            } else {
                echo "<p>Không có dữ liệu</p>";
            }
            ?>

            </tbody>
            </table>
            </div>

          </div>
</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
