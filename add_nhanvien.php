<?php
require "connect.php"; // Kết nối đến cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthplace = $_POST['birthplace'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    // Thực hiện truy vấn để thêm nhân viên mới
    $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, NoiSinh, MaPhong, Luong) VALUES ('$id', '$name', '$gender', '$birthplace', '$department', '$salary')";
    if ($conn->query($sql) === TRUE) {
        echo "Thêm nhân viên thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>