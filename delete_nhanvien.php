<?php
require "connect.php"; // Kết nối đến cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Thực hiện truy vấn để xóa nhân viên
    $sql = "DELETE FROM nhanvien WHERE Ma_NV = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa nhân viên thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>