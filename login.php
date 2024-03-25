<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php
        require "connect.php";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        
        // Xử lý đăng nhập
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username1 = $_POST["username"];
            $password1 = $_POST["password"];
        
            // Truy vấn kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
            $sql = "SELECT id, username, password, role FROM user WHERE username = '$username1'";
            $result = $conn->query($sql);
        
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($password1 == $row["password"]) {
                    // Đăng nhập thành công
                    session_start();
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["role"] = $row["role"];
        
                    // Chuyển hướng đến trang sau khi đăng nhập thành công
                    header("Location: index.php");
                    exit();
                } else {
                    $error_message = "Sai tài khoản hoặc mật khẩu.";
                }
            } else {
                $error_message = "Sai tài khoản hoặc mật khẩu.";
            }
        }

        if (isset($error_message)) {
            echo "<p>$error_message</p>";
        }
        $conn->close();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="username">Tài khoản:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Đăng nhập">
        </div>
    </form>
</body>
</html>