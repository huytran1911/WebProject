<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin-user-page</title>
    <link rel="stylesheet" href="./admin-css/admin.css">
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
          
         <div class="user-input" style="display: none;">
            Action:<input type="text" name="action" id="action" ></input>
          </div>
           

<div>
           <a href="./addUser.php"><button>Thêm+</button></a>
                <button onclick="editHtmlTbleSelectedRow();">Chỉnh <span class="las la-edit"></span></button>
                <button onclick="removeSelectedRow();">Xóa <span class="las la-trash"></span></button>
</div>

            </div>
        </div>

            <div class="records table-responsive" >
           
                <div class="record-header">
   
                    <div class="add">
                        <span>Mục</span>
                        <select name="" id="">
                            <option value="">Mã</option>
                        </select>
                        
                    </div>

                    <div class="browse">
                       <input type="search" placeholder="Tìm kiếm" class="record-search">
                     
                    </div>
                </div>

                <div>
                <?php
                    require_once '../require/connect.php';
                    $sql = "SELECT * FROM tbl_usersadmin";
                    if($result = mysqli_query($conn, $sql)) {
                        if(mysqli_num_rows($result) > 0) {
                            echo "<table id='table-user'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th> Mã Khách hàng </th>";
                                        echo "<th> Họ và tên </th>";
                                        echo "<th> Email </th>";
                                        echo "<th> Số điện thoại </th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                // Lặp qua các hàng dữ liệu
                                while($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                        echo "<td>" . $row['UserId'] . "</td>";
                                        echo "<td>" . $row['FullName'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        echo "<td>" . $row['PhoneNumber'] . "</td>";

                                    echo "</tr>";
                            }
                                // Giải phóng bộ nhớ sau khi sử dụng
                                mysqli_free_result($result);
                                echo "</tbody>";
                                echo "</table>"; 
                        } else {
                            echo "<p> Không có dữ liệu </p>";
                        }
                    } else {
                        echo "Error: Không thể thực hiện truy vấn $sql.";
                        
                    }
                    ?>

                    
                </div>

            </div>
        
    

</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>




 