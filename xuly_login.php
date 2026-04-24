<?php
session_start();
include 'CSDL/config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Truy vấn lấy thông tin tài khoản
        $sql = "SELECT * FROM taikhoan WHERE taiKhoan = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['matKhau']) {
            // QUAN TRỌNG: Lưu maQuyen vào SESSION
            $_SESSION['username'] = $user['taiKhoan'];
            $_SESSION['maQuyen'] = $user['maQuyen']; // Lưu mã quyền ở đây

            // Điều hướng dựa trên maQuyen
            switch ($user['maQuyen']) {
                case 1: header("Location: TrangChinh.php"); break;
                case 2: header("Location: qlda.php"); break;
                case 3: header("Location: NVQL-Website.php"); break;
                case 4: header("Location: TrangKhachHang.php"); break;
                default: echo "Không có quyền truy cập!"; break;
            }
            exit();
        } else {
            echo "Sai tài khoản hoặc mật khẩu!";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>