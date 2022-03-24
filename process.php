<?php
require_once('./dbconnect.php');
if (isset($_POST['add'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $descrip = $_POST['descrip'];
    $product_amount = $_POST['product_amount'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $image = "";
    //kiểm tra người dùng đã chọn file ảnh có dung lượng khác 0
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
        $temp_name = $_FILES['image']['tmp_name'];
        //khai báo biến dùng để lưu tên của ảnh
        $img_name = $_FILES['image']['name'];
        //tách tên file ảnh dựa vào dấu chấm
        $parts = explode(".", $img_name);
        //lấy ra extension (đuôi) file ảnh
        $extension = end($parts);
        //thiết lập tên mới cho ảnh 
        $image = uniqid() . "." . $extension;
        //thiết lập địa chỉ file ảnh cần di chuyển đến
        $image_folder = "images/data/";
        $destination = $image_folder . $image;
        //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
        move_uploaded_file($temp_name, $destination);
    }
    $sql = "INSERT INTO product (product_id,product_name,category_id,product_img,descrip,product_amount,price)
VALUES (null , '$name','$category_id','$image', '$descrip','$product_amount', '$price')";
    $run = querySQL($sql);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM product WHERE product_id=$id";
    $run = querySQL($sql);
}

$id = 0;
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM product WHERE product_id=$id");
    if (count($result) == 1) {
        $row = $result->fetch_array();
        $name = $row['product_name'];
        $descrip = $row['descrip'];
        $product_amount = $row['product_amount'];
        $price = $row['price'];
        $image = $row['product_img'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category'];
    $descrip = $_POST['descrip'];
    $product_amount = $_POST['product_amount'];
    $price = $_POST['price'];
    $image = $_POST[''];
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
        $temp_name = $_FILES['image']['tmp_name'];
        //khai báo biến dùng để lưu tên của ảnh
        $img_name = $_FILES['image']['name'];
        //tách tên file ảnh dựa vào dấu chấm
        $parts = explode(".", $img_name);
        //lấy ra extension (đuôi) file ảnh
        $extension = end($parts);
        //thiết lập tên mới cho ảnh 
        $image = uniqid() . "." . $extension;
        //thiết lập địa chỉ file ảnh cần di chuyển đến
        $image_folder = "images/data/";
        $destination = $image_folder . $image;
        //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
        move_uploaded_file($temp_name, $destination);
    } else {
        $image = $row['product_img'];
    }
    $sql = "UPDATE product SET product_name = '$name', category_id='$category_id', descrip = '$descrip', product_amount='$product_amount', price='$price', product_img='$image' Where product_id=$id";
    $run = querySQL($sql);
}
