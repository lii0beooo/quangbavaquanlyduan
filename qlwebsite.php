<?php
session_start();
include 'config.php';
// CHƯA LOGIN
if(!isset($_SESSION['username'])){
    header("location: Login.php");
    exit;
}
// CHẶN KHÔNG ĐÚNG QUYỀN
if(!isset($_SESSION['maQuyen']) || $_SESSION['maQuyen'] != 3){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>NVQL Dashboard</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">

<div class="container py-4">

    <h3 class="text-info mb-4">NVQL - Quản lý Website</h3>

    <div class="row g-4">

        <!-- CRUD DỰ ÁN -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Dự án tiêu biểu</div>

                <div class="card-body">

                    <!-- Thêm -->
                    <div class="d-flex mb-3">
                        <input class="form-control me-2" placeholder="Tên dự án">
                        <button class="btn btn-success">Thêm</button>
                    </div>

                    <!-- Danh sách -->
                    <table class="table table-dark table-hover">
                        <tbody>

                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <input class="form-control me-2" value="Hồ cá Koi Q7">
                                        <button class="btn btn-warning me-1">Sửa</button>
                                        <button class="btn btn-danger">Xóa</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <input class="form-control me-2" value="Sân vườn Bình Chánh">
                                        <button class="btn btn-warning me-1">Sửa</button>
                                        <button class="btn btn-danger">Xóa</button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- SỬA INDEX -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Nội dung trang quảng bá</div>

                <div class="card-body">

                    <!-- Nội dung hiện tại -->
                    <div class="mb-3 p-3 bg-secondary rounded">
                        Chào mừng đến với website của chúng tôi!
                    </div>

                    <!-- Sửa -->
                    <textarea class="form-control mb-3" rows="4">
Chào mừng đến với website của chúng tôi!
                    </textarea>

                    <button class="btn btn-info w-100">
                        Cập nhật nội dung
                    </button>

                </div>
            </div>
        </div>

    </div>

</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>