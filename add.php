<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên</title>
</head>
<body>
    <h2>Thêm nhân viên</h2>

    <form method="post" action="add_nhanvien.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br>

        <label for="name">Tên nhân viên:</label>
        <input type="text" id="name" name="name" required>
        <br>
        
        <label for="gender">Giới tính:</label>
        <select id="gender" name="gender" required>
            <option value="NAM">Nam</option>
            <option value="NU">Nữ</option>
        </select>
        <br>

        <label for="birthplace">Nơi sinh:</label>
        <input type="text" id="birthplace" name="birthplace" required>
        <br>

        <label for="department">Mã phòng:</label>
        <select id="department" name="department" required>
            <?php
                require "connect.php"; // Kết nối đến cơ sở dữ liệu

                // Thực hiện truy vấn để lấy danh sách mã phòng
                $sql = "SELECT * FROM phongban";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Duyệt qua từng hàng kết quả
                    while ($row = $result->fetch_assoc()) {
                        $maPhong = $row["Ma_Phong"];
                        $tenPhong = $row["Ten_Phong"];
                        // Hiển thị một tùy chọn cho mã phòng
                        echo "<option value='$maPhong'>$tenPhong</option>";
                    }
                } else {
                    echo "<option value=''>Không có mã phòng nào</option>";
                }

                $conn->close();
            ?>
        </select><br>

        <label for="salary">Lương:</label>
        <input type="text" id="salary" name="salary" required>
        <br>

        <button type="submit">Thêm nhân viên</button>
    </form>
</body>
</html>