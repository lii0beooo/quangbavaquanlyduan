<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Thay 'images/background.jpg' bằng đường dẫn ảnh của bạn */
            background-image: url('images/nen2.png'); 
            background-size: cover; /* Phủ kín toàn bộ màn hình */
            background-position: center; /* Căn giữa ảnh */
            background-repeat: no-repeat; /* Không lặp lại ảnh */
            background-attachment: fixed; /* Cố định ảnh khi cuộn trang */
        }

        /* Thêm một lớp phủ mờ (optional) nếu ảnh quá sáng gây khó đọc chữ */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Phủ một lớp đen mờ 50% */
            z-index: -1;
        }
    </style>
</head>

<body class="bg-light">

<div class="container d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow p-4" style="width: 400px; border-top: 5px solid #198754;">

        <!-- LOGO -->
        <div class="text-center mb-3">
            <img src="images/logo.png" width="110">
            <h4 class="mt-2 text-success">ĐĂNG NHẬP</h4>
        </div>

        <!-- FORM -->
        <form action="xuly_login.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Đăng nhập</button>

            <div class="text-center mt-3">
                <a href="forgot_password.php" class="text-decoration-none text-success">
                    Quên mật khẩu?
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>