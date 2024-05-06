<?php
require "../../require/connect.php";
require "../function.php";

$quantity = $cid = $p_name = $price = $description = $image = ""; // Khởi tạo các biến

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý khi nhấn nút "Cập nhật"
    if (isset($_POST["btn_sbm"]) && $_POST["btn_sbm"]) {
        // Lấy dữ liệu từ biểu mẫu
        $p_name = $_POST["p_name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $cid = $_POST["category"];
        $quantity = $_POST["quantity"];

        // Kiểm tra xem người dùng đã chọn một file mới hay không
        if ($_FILES['new_image']['size'] > 0) {
            // Nếu có, lưu file mới và cập nhật đường dẫn vào cơ sở dữ liệu
            $new_image = $_FILES["new_image"]["name"];
            $target_file_new = $target_dir . basename($_FILES["new_image"]["name"]);
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file_new)) {
                // Xóa file ảnh cũ
                unlink($target_dir . $image);
                // Cập nhật đường dẫn hình ảnh mới vào cơ sở dữ liệu
                $image = $new_image;
            } else {
                // Nếu có lỗi khi tải lên ảnh mới
                echo "Có lỗi xảy ra khi tải lên ảnh mới.";
            }
        }

        // Cập nhật dữ liệu vào cơ sở dữ liệu
        $sql_update = "UPDATE tbl_products SET productName=?, quantity=?, price=?, detail=?, img=?, cid=? WHERE pid=?";
        if ($stmt_update = mysqli_prepare($conn, $sql_update)) {
            mysqli_stmt_bind_param($stmt_update, "sisssii", $param_p_name, $param_quantity, $param_price, $param_description, $param_image, $param_cid, $param_id);

            // Thiết lập các tham số
            $param_p_name = $p_name;
            $param_quantity = $quantity;
            $param_price = $price;
            $param_description = $description;
            $param_image = $image;
            $param_cid = $cid;
            $param_id = $id;

            // Thực thi câu lệnh cập nhật
            if (mysqli_stmt_execute($stmt_update)) {
                // Cập nhật thành công, chuyển hướng về trang admin-product.php hoặc thông báo thành công
                redirect("./admin-product.php");
                exit();
            } else {
                // Nếu có lỗi xảy ra khi cập nhật
                echo "Có lỗi xảy ra khi cập nhật sản phẩm.";
            }

            // Đóng câu lệnh
            mysqli_stmt_close($stmt_update);
        }
    }
} else {
    // Nếu không phải là phương thức POST, kiểm tra xem có tham số id trong URL không
    if (isset($_GET["pid"])) {
        $id = trim($_GET["pid"]);

        // Truy vấn để lấy thông tin sản phẩm theo id
        $sql = "SELECT p.pid, p.img, p.productName, p.price, p.quantity, p.detail, c.categoryName
                FROM tbl_products AS p
                INNER JOIN tbl_category AS c ON p.cid = c.cateid
                WHERE p.pid=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                // Lấy kết quả từ truy vấn
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Gán dữ liệu từ cơ sở dữ liệu vào biến
                    $cid = $row["categoryName"];
                    $p_name = $row["productName"];
                    $quantity = $row["quantity"];
                    $price = $row["price"];
                    $description = $row["detail"];
                    $image = $row["img"];
                } else {
                    // Nếu không tìm thấy sản phẩm, chuyển hướng về trang admin-product.php
                    redirect("./admin-product.php");
                    exit();
                }
            }
        }
        // Đóng câu lệnh và kết nối
        mysqli_stmt_close($stmt);
        
    }
}
$sql_categories = "SELECT cateid, categoryName FROM tbl_category";
$result_categories = mysqli_query($conn, $sql_categories);
$categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sửa sản phẩm</title>
    <style>
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2> Sửa sản phẩm </h2>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="pid" value="<?php echo $id; ?>">

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="p_name" id="p_name" class="form-control" value="<?php echo htmlspecialchars($p_name); ?>">
                            </div>

                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" name="price" id="price" class="form-control" value="<?php echo htmlspecialchars($price); ?>">
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" name="description" id="description" class="form-control" value="<?php echo htmlspecialchars($description); ?>">
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo htmlspecialchars($quantity); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <!-- Hiển thị hình ảnh từ cơ sở dữ liệu -->
                                <img id="preview" src="/WebProject/admin/productAdmin/uploads/<?php echo $image; ?>" alt="Hình ảnh sản phẩm" style="max-width: 100%; height: auto;">
                            </div>

                            <div class="form-group">
                                <label>Chọn hình ảnh mới</label>
                                <input type="file" name="new_image" id="new_image" class="form-control-file" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" name="category">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['cateid']; ?>" <?php if ($category['cateid'] == $cid) echo 'selected'; ?>>
                                            <?php echo htmlspecialchars($category['categoryName']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>


                            <input type="submit" name="btn_sbm" class="btn btn-primary" value="Cập nhật">
                            <a href="admin-product.php" class="btn btn-default">Huỷ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Hiển thị hình ảnh trước khi upload
        document.getElementById("new_image").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
                document.getElementById("preview").style.display = "block";
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>
</html>
