<?php
session_start();
include 'CSDL/config.php';
if (!isset($_SESSION['username']) || $_SESSION['maQuyen'] != 1 ) {
    header("Location: login.php");
    exit();
}
$sql_tong_duan = "SELECT COUNT(*) as total FROM duan";
$stmt_tong = $conn->prepare($sql_tong_duan);
$stmt_tong->execute();
$row_tong = $stmt_tong->fetch(PDO::FETCH_ASSOC);

// Gán giá trị vào biến, nếu không có dữ liệu thì mặc định là 0
$tong_duan = $row_tong['total'] ?? 0;

$sql_dang_lam = "SELECT COUNT(*) as total FROM duan WHERE trangThai = 'Đang thực hiện'";
$stmt_dang_lam = $conn->prepare($sql_dang_lam);
$stmt_dang_lam->execute();
$row_dang_lam = $stmt_dang_lam->fetch(PDO::FETCH_ASSOC);

// Gán giá trị vào biến
$dang_thuc_hien = $row_dang_lam['total'] ?? 0;

$sql_hoan_thanh = "SELECT COUNT(*) as total FROM duan WHERE trangThai = 'Hoàn thành'";
$stmt_hoan_thanh = $conn->prepare($sql_hoan_thanh);
$stmt_hoan_thanh->execute();
$row_hoan_thanh = $stmt_hoan_thanh->fetch(PDO::FETCH_ASSOC);

// Gán giá trị vào biến
$so_hoan_thanh = $row_hoan_thanh['total'] ?? 0;

$sql_qua_han = "SELECT COUNT(*) as total FROM duan WHERE trangThai = 'Hoàn thành'";
$stmt_qua_han = $conn->prepare($sql_qua_han);
$stmt_qua_han->execute();
$row_qua_han = $stmt_qua_han->fetch(PDO::FETCH_ASSOC);

// Gán giá trị vào biến
$so_qua_han = $row_qua_han['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển - Admin CP</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    /* Tổng thể nền sáng */
    body { 
        background-color: #f0f2f5; 
        color: #333; 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    }
    
    /* Sidebar - Chuyển sang tone trắng/xám nhạt */
    .sidebar { 
        background-color: #ffffff; 
        height: 100vh; 
        position: fixed; 
        left: 0; 
        top: 0; 
        width: 250px; 
        border-right: 1px solid #dee2e6; 
        z-index: 1000; 
        display: flex; 
        flex-direction: column; 
        box-shadow: 2px 0 5px rgba(0,0,0,0.05);
    }
    
    /* Nội dung chính */
    .main-content { margin-left: 250px; padding: 30px; }
    
    /* Card thống kê - Nền trắng, đổ bóng nhẹ */
    .card { 
        background-color: #ffffff; 
        border: 1px solid #e3e6f0; 
        color: #333; 
        border-radius: 12px; 
        transition: all 0.2s ease-in-out;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1) !important;
    }
    .card:hover { transform: translateY(-3px); box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.15) !important; }
    
    /* Header của Card */
    .card-header { 
        background-color: #f8f9fc !important; 
        border-bottom: 1px solid #e3e6f0 !important; 
        color: #4e73df;
    }

    /* Menu Sidebar */
    .nav-link { color: #5a5c69; padding: 12px 20px; transition: 0.3s; font-weight: 500; }
    .nav-link:hover, .nav-link.active { 
        color: #4e73df; 
        background: #f8f9fc; 
        border-left: 4px solid #4e73df; 
    }
    
    /* Profile User phía dưới */
    .user-profile { 
        margin-top: auto; 
        background-color: #f8f9fc; 
        padding: 15px; 
        border-top: 1px solid #dee2e6; 
        color: #333;
    }
    
    /* Table - Chuyển từ Dark Table sang Light Table */
    .table-dark { 
        background-color: #ffffff !important; 
        color: #333 !important; 
    }
    .table-dark.table-hover tbody tr:hover { 
        background-color: #f8f9fc !important; 
        color: #333 !important; 
    }
    .table-light { background-color: #f8f9fc !important; }

    /* List group cho thông báo */
    .list-group-item { 
        background-color: transparent !important; 
        border-color: #edf0f5 !important; 
        color: #5a5c69 !important; 
    }
    .list-group-item:hover { background-color: #f8f9fc !important; }

    /* Điều chỉnh các text phụ */
    .text-secondary { color: #858796 !important; }
    .text-white { color: #333 !important; } /* Ép text-white trong thông báo thành màu tối */
    
    /* Icon mờ phía sau */
    .stat-icon { opacity: 0.1 !important; color: #000; }
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Bảng điều khiển</h2>
            <p class="text-secondary small mb-0">Chào mừng bạn trở lại, Admin!</p>
        </div>
        <div class="text-secondary small">
            <i class="far fa-calendar-alt me-1"></i> <?php echo date('d/m/Y'); ?>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card p-3 shadow-sm border-start border-primary border-4 h-100">
                <small class="text-secondary fw-bold text-uppercase" style="font-size: 0.7rem;">Tổng dự án</small>
                
                <h3 class="mb-0">
                    <?= ($tong_duan < 10) ? sprintf("%02d", $tong_duan) : $tong_duan ?>
                </h3>
                
                <i class="fas fa-layer-group position-absolute end-0 bottom-0 me-3 mb-2 text-secondary opacity-25" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 shadow-sm border-start border-info border-4 h-100">
                <small class="text-secondary fw-bold text-uppercase" style="font-size: 0.7rem;">Đang thực hiện</small>
                
                <h3 class="mb-0 text-info">
                    <?= sprintf("%02d", $dang_thuc_hien) ?>
                </h3>
                
                <i class="fas fa-spinner fa-spin position-absolute end-0 bottom-0 me-3 mb-2 text-info opacity-25" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 shadow-sm border-start border-success border-4 h-100">
                <small class="text-secondary fw-bold text-uppercase" style="font-size: 0.7rem;">Hoàn thành</small>
                
                <h3 class="mb-0 text-success">
                    <?= sprintf("%02d", $so_hoan_thanh) ?>
                </h3>
                
                <i class="fas fa-check-double position-absolute end-0 bottom-0 me-3 mb-2 text-success opacity-25" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 shadow-sm border-start border-danger border-4 h-100">
                <small class="text-secondary fw-bold text-uppercase" style="font-size: 0.7rem;">Quá hạn</small>
                
                <h3 class="mb-0 text-danger">
                    <?= sprintf("%02d", $so_qua_han) ?>
                </h3>
                
                <i class="fas fa-exclamation-triangle position-absolute end-0 bottom-0 me-3 mb-2 text-danger opacity-25" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 shadow-sm border-start border-warning border-4 h-100">
                <small class="text-secondary fw-bold text-uppercase" style="font-size: 0.7rem;">Yêu cầu mới</small>
                <h3 class="mb-0 text-warning">03</h3>
                <i class="fas fa-envelope-open-text position-absolute end-0 bottom-0 me-3 mb-2 text-warning opacity-25" style="font-size: 1.5rem;"></i>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-secondary py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-history me-2 text-primary"></i>Dự án mới cập nhật</h5>
                    <a href="danh-sach-duan.php" class="btn btn-sm btn-outline-primary">Xem tất cả</a>
                </div>
                <div class="table-responsive p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="bg-light text-secondary" style="font-size: 0.85rem; border-bottom: 2px solid #f0f0f0;">
                            <tr>
                                <th class="ps-4">Tên dự án</th>
                                <th>Nhà thầu</th>
                                <th>Tiến độ</th>
                                <th class="text-end pe-4">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4"><span class="fw-bold">Thi công hồ cá Koi Q.7</span></td>
                                <td>Xây dựng An Gia</td>
                                <td>
                                    <div class="progress" style="height: 6px; width: 100px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </td>
                                <td class="text-end pe-4"><span class="badge bg-success">Hoàn thành</span></td>
                            </tr>
                            <tr>
                                <td class="ps-4"><span class="fw-bold">Hệ thống tưới tự động B.Chánh</span></td>
                                <td>Green Tech</td>
                                <td>
                                    <div class="progress" style="height: 6px; width: 100px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%"></div>
                                    </div>
                                </td>
                                <td class="text-end pe-4"><span class="badge bg-warning text-dark">Đang chạy</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-secondary py-3">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-bell me-2 text-warning"></i>Thông báo mới</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-info small fw-bold">Yêu cầu mới #102</h6>
                                <small class="text-secondary">3 phút trước</small>
                            </div>
                            <p class="mb-1 small">Khách hàng yêu cầu báo giá thêm hạng mục lọc nước.</p>
                        </div>
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-danger small fw-bold">Cảnh báo quá hạn</h6>
                                <small class="text-secondary">2 giờ trước</small>
                            </div>
                            <p class="mb-1 small">Dự án "Cải tạo sân vườn Quận 2" đã quá hạn 1 ngày.</p>
                        </div>
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-danger small fw-bold">Cảnh báo quá hạn</h6>
                                <small class="text-secondary">2 giờ trước</small>
                            </div>
                            <p class="mb-1 small">Dự án "Cải tạo sân vườn Quận 2" đã quá hạn 1 ngày.</p>
                        </div>
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-danger small fw-bold">Cảnh báo quá hạn</h6>
                                <small class="text-secondary">2 giờ trước</small>
                            </div>
                            <p class="mb-1 small">Dự án "Cải tạo sân vườn Quận 2" đã quá hạn 1 ngày.</p>
                        </div>
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-danger small fw-bold">Cảnh báo quá hạn</h6>
                                <small class="text-secondary">2 giờ trước</small>
                            </div>
                            <p class="mb-1 small">Dự án "Cải tạo sân vườn Quận 2" đã quá hạn 1 ngày.</p>
                        </div>
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-danger small fw-bold">Cảnh báo quá hạn</h6>
                                <small class="text-secondary">2 giờ trước</small>
                            </div>
                            <p class="mb-1 small">Dự án "Cải tạo sân vườn Quận 2" đã quá hạn 1 ngày.</p>
                        </div>
                        <div class="list-group-item bg-transparent border-light py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 text-danger small fw-bold">Cảnh báo quá hạn</h6>
                                <small class="text-secondary">2 giờ trước</small>
                            </div>
                            <p class="mb-1 small">Dự án "Cải tạo sân vườn Quận 2" đã quá hạn 1 ngày.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
