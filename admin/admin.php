<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin-css/admin.css">
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
                         <span onclick='Logout()' style="font-size: 20px; cursor: pointer; color:#74767d ; font-weight: 600;" onclick="window.location.href='loginadmin.html'">Đăng xuất</span>
                     </div>
                 </div>
             </div>
         </header>
        
        
        <main >
            
            <div class="page-header" >
                <h1>Bảng Điều Khiển</h1>
               
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>9,124</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Người dùng hoạt động trong tháng</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-head">
                            <h2>19,141</h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Đơn hàng trong tháng</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>64.862.500vnđ</h2>
                            <span class="las la-balance-scale"></span>
                        </div>
                        <div class="card-progress">
                            <small>Tăng trưởng doanh thu hàng tháng</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>11,524</h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Tin nhắn email đã nhận</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="adminstrator">Người Quản Trị</h1>
              
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
                    <table width="100%" id="table-adminstrator">
                        <thead>
                            <tr>
                                <th># Mã</th>                          
                                <th>Email</th>
                                <th> Họ Và Tên</th>
                                <th> Chức vị </th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#AD128</td>
                             
                                <td>
                                    baotran@gmail.com
                                </td>
                                <td>
                                    Trần Quốc Bảo
                                </td>
                                <td>
                                    Quản lý khách hàng
                                </td>
                             
                              
                            </tr>
                       
                            <tr>
                                <td>#AD577</td>
                              
                                <td>
                                    thanhtung@gmail.com
                                </td>
                                <td>
                                    Đinh Thanh Tùng
                                </td>
                                <td>
                                    Quản lý khách hàng
                                </td>
                            
                           
                            </tr>
                            <tr>
                                <td>#AD120</td>
                               
                                <td>
                                    tienle@gmail.com
                                </td>
                                <td>
                                  Lê Minh Tiến
                                </td>
                                <td>
                                    Quản lý đặt hàng
                                </td>
                              
                         
                            </tr>
                            <tr>
                                <td>#AD569</td>
                              
                                <td>
                                    thang128@gmail.com
                                </td>
                                <td>
                                    Ngô Văn Thanh
                                </td>
                                <td>
                                    Quản lý đặt hàng
                                </td>
                            
                            </tr>
                            <tr>
                                <td>#AD476</td>
                                
                                <td>
                                    binh1802@gmail.com
                                </td>
                                <td>
                                   Nguyễn Văn Bình
                                </td>
                                <td>
                                    Quản lý sản phẩm
                                </td>
                             
                             
                            </tr>    
                        </tbody>
                    </table>
                </div>

            </div>
           
        




            
        </main>
        
    </div>
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="/admin/js/admin.js"></script>




