<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin-order</title>
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
        <div class="page-content" style="margin-top: 50px; background-color: #fef5f5;">
            
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="order">Đơn Hàng</h1>
          
        </div>
        
        <div class="records table-responsive" >
           
            <div class="record-header">
                <div class="add">
                    <span>Mục</span>
                    <select name="" id="">
                        <option value="">ID</option>
                    </select>
                    
                </div>
        
                <div class="browse">
                   <input type="search" placeholder="Tìm kiếm" class="record-search">
                 
                </div>
            </div>
        
            <div>
                <table width="100%" id="table-order">
                    <thead>
                        <tr>
                            <th>Đơn Hàng</th>                          
                            <th> Tên Khách Hàng</th>
                            <th> Trang Thái Hoạt Động</th>
                            <th> Chi Tiết</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                         
                            <td>
                                <div class="client">
                                    <div class="client-img bg-img" style="background-image: url(assets/images/pic/custome1.png)"></div>
                                    <div class="client-info">
                                    <h4>Nguyễn Văn A</h4>
                                    <small>a@gmail.com</small>
                                    </div>
                                    </div>
                            </td>
                            <td>
                                <span class="paid">hoạt động</span>
                            </td>
                            <td>
                                <a href="">Thông tin</a>
                            </td>
                         
                          
                        </tr>
                   
                        <tr>
                            <td>#002</td>
                          
                            <td>
                                <div class="client">
                                    <div class="client-img bg-img" style="background-image: url(assets/images/pic/custome1.png)"></div>
                                    <div class="client-info">
                                    <h4>Nguyễn Thị B</h4>
                                    <small>nguyenb@gmail.com</small>
                                    </div>
                                    </div>
                            </td>
                            <td>
                                <span class="paid" style="color:#FF3131; background-color: rgb(250, 160, 160);">Không hoạt động</span>
                            </td>
                            <td>
                                <a href="order-detail-admin.html">Thông tin</a>
                            </td>
                        
                       
                        </tr>
                        <tr>
                            <td>#003</td>
                           
                            <td>
                                <div class="client">
                                    <div class="client-img bg-img" style="background-image: url(assets/images/pic/custome1.png)"></div>                                         
                                    <div class="client-info">                                         
                                    <h4>Phạm Thành Dương</h4>                                             
                                    <small>phamduong@gmail.com</small>                                                
                                    </div>
                                    </div> 
                            </td>
                            <td>
                                <span class="paid">Hoạt động</span>
                            </td>
                            <td>
                                <a href="">Thông tin</a>
                            </td>
                          
                     
                        </tr>
                 
                        <tr>
                            <td>#004</td>
                            
                            <td>
                                <div class="client">
                                    <div class="client-img bg-img" style="background-image: url(assets/images/pic/custome2.png)"></div>
                                    <div class="client-info">
                                    <h4>Phan Tuấn Tài</h4>
                                    <small>tutai@gmail.com</small>
                                    </div>
                                    </div>
                            </td>
                            <td>
                                <span class="paid">Hoạt động</span>
                            </td>
                            <td>
                                <a href="">Thông tin</a>
                            </td>
                         
                         
                        </tr>
               
                        <tr>
                            <td>#005</td>
                            
                            <td>
                                <div class="client">
                                    <div class="client-img bg-img" style="background-image: url(assets/images/pic/custome1.png)"></div>
                                    <div class="client-info">
                                    <h4>Lê Ngọc Huyền</h4>
                                    <small>huyen@gmail.com</small>
                                    </div>
                                    </div>
                            </td>
                            <td>
                                <span class="paid">Hoạt động</span>
                            </td>
                            <td>
                                <a href="">Thông tin</a>
                            </td>
                         
                         
                        </tr>
                 
                        
                    </tbody>
                </table>
            </div>
        
        </div> 
        
        <main >

</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>