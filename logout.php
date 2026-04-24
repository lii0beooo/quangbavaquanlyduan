<?php
// 1. Khởi tạo session để có thể truy cập và hủy nó
session_start();

// 2. Xóa tất cả các biến session đã lưu
$_SESSION = array();

// 3. Nếu sử dụng cookie để lưu Session ID (mặc định), hãy xóa nó đi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Hủy bỏ hoàn toàn session trên server
session_destroy();

// 5. Chuyển hướng người dùng về trang đăng nhập (login.php)
// Thay đổi 'login.php' thành tên file đăng nhập thực tế của bạn
header("Location: login.php");
exit;
?>