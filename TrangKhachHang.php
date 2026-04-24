<?php
session_start();
include_once 'CSDL/config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

try {
    /**
     * LOGIC TRUY VẤN CHUẨN:
     * Lấy thông tin từ doitac -> hopdong -> duan
     */
    $sql_data = "SELECT 
                    dt.maDoiTac, dt.taiKhoan,
                    h.maHopDong, h.giaTri, h.tenHopDong,
                    d.maDA, d.tenDA, d.ngayBD, d.ngayKT, d.trangThai as trangThaiDA
                 FROM doitac dt
                 INNER JOIN hopdong h ON dt.maDoiTac = h.maDoiTac
                 LEFT JOIN duan d ON h.maHopDong = d.maHopDong
                 WHERE dt.taiKhoan = :user 
                 ORDER BY h.maHopDong DESC LIMIT 1";
                 
    $stmt = $conn->prepare($sql_data);
    $stmt->execute([':user' => $username]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $tien_do = [];
    if($data && $data['maDA']) {
        // Lấy 5 cập nhật tiến độ mới nhất của dự án này
        $sql_td = "SELECT ngayCapNhat, noiDungCapNhat, trangThai 
                   FROM tiendoda 
                   WHERE maDA = :maDA 
                   ORDER BY ngayCapNhat DESC LIMIT 5";
        $stmt_td = $conn->prepare($sql_td);
        $stmt_td->execute([':maDA' => $data['maDA']]);
        $tien_do = $stmt_td->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) { 
    error_log($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cổng Thông Tin Đối Tác</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CHUYỂN SANG LIGHT TONE */
        body { background-color: #f4f7f6; color: #333; font-family: 'Segoe UI', sans-serif; }
        .main-content { margin-left: 260px; padding: 40px; }
        .card { 
            background-color: #fff; 
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.05); 
        }
        .status-pill { border-radius: 50px; padding: 5px 15px; font-size: 0.8rem; font-weight: 600; }
        .border-light-custom { border-right: 1px solid #eee; }
        header h2 { color: #2c3e50; }
        .list-group-item { border-left: none; border-right: none; padding: 15px 0; }
        
        @media (max-width: 992px) {
            .main-content { margin-left: 0; padding: 20px; }
        }
    </style>
</head>
<body>

    <?php include 'sidebar-kh.php'; ?>

    <div class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold">Xin chào, <?php echo htmlspecialchars($data['taiKhoan'] ?? 'Đối tác'); ?></h2>
                <p class="text-muted">Hệ thống quản lý tiến độ dự án dành cho đối tác.</p>
            </div>
            <button class="btn btn-primary px-4 shadow-sm rounded-pill">
                <i class="fas fa-plus me-2"></i>Tạo yêu cầu mới
            </button>
        </header>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h5 class="text-uppercase text-muted small fw-bold mb-1">Dự án hiện tại</h5>
                            <h3 class="text-primary fw-bold"><?php echo htmlspecialchars($data['tenDA'] ?? 'Chưa có dự án'); ?></h3>
                        </div>
                        <span class="badge bg-success-subtle text-success status-pill">
                            <?php echo htmlspecialchars($data['trangThaiDA'] ?? 'Đang chờ'); ?>
                        </span>
                    </div>
                    
                    <div class="row mb-5 py-3 bg-light rounded-3 text-center g-0">
                        <div class="col-4 border-light-custom">
                            <small class="text-muted d-block">Ngày bắt đầu</small>
                            <span class="fw-bold text-dark"><?php echo ($data && $data['ngayBD']) ? date('d/m/Y', strtotime($data['ngayBD'])) : '--/--/----'; ?></span>
                        </div>
                        <div class="col-4 border-light-custom">
                            <small class="text-muted d-block">Dự kiến kết thúc</small>
                            <span class="fw-bold text-dark"><?php echo ($data && $data['ngayKT']) ? date('d/m/Y', strtotime($data['ngayKT'])) : '--/--/----'; ?></span>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">Tổng ngân sách</small>
                            <span class="fw-bold text-success">
                                <?php echo (isset($data['giaTri'])) ? number_format($data['giaTri'], 0, ',', '.') . ' ₫' : 'N/A'; ?>
                            </span>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3"><i class="fas fa-stream me-2 text-primary"></i>Nhật ký tiến độ</h6>
                    <div class="list-group list-group-flush">
                        <?php if (empty($tien_do)): ?>
                            <div class="text-center py-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="60" class="opacity-25 mb-2">
                                <p class="text-muted small">Hiện tại chưa có cập nhật tiến độ mới.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($tien_do as $td): ?>
                            <div class="list-group-item bg-transparent">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1 fw-bold text-dark">
                                        <i class="fas fa-calendar-day text-primary me-2"></i>
                                        <?php echo date('d/m/Y', strtotime($td['ngayCapNhat'])); ?>
                                    </h6>
                                    <small class="badge bg-info-subtle text-info"><?php echo htmlspecialchars($td['trangThai']); ?></small>
                                </div>
                                <p class="mb-1 text-muted ms-4"><?php echo htmlspecialchars($td['noiDungCapNhat']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-4 mb-4">
                    <h5 class="fw-bold mb-4 text-dark"><i class="fas fa-file-contract me-2 text-warning"></i>Hợp đồng dự án</h5>
                    <div class="p-3 border rounded-3 mb-3 bg-light">
                        <small class="text-muted d-block">Mã số hồ sơ:</small>
                        <span class="fw-bold text-dark">DA-<?php echo str_pad($data['maDA'] ?? '0', 3, '0', STR_PAD_LEFT); ?></span>
                    </div>
                    <?php if (isset($data['maHopDong'])): ?>
                        <a href="chi-tiet-hop-dong.php?id=<?php echo $data['maHopDong']; ?>" target="_blank" class="btn btn-outline-dark w-100 mb-3 border-2">
                            <i class="fas fa-file-pdf me-2 text-danger"></i>Xem & Tải Hợp đồng (PDF)
                        </a>
                    <?php else: ?>
                        <button class="btn btn-outline-secondary w-100 mb-3 border-2" disabled>
                            <i class="fas fa-times-circle me-2"></i>Chưa có hợp đồng
                        </button>
                    <?php endif; ?>
                    <div class="alert alert-warning border-0 small mb-0">
                        <i class="fas fa-info-circle me-1"></i> Mọi thay đổi về ngân sách sẽ được cập nhật sau 24h.
                    </div>
                </div>

                <div class="card p-4 bg-primary text-white">
                    <h6 class="fw-bold"><i class="fas fa-headset me-2"></i>Hỗ trợ đối tác</h6>
                    <p class="small opacity-75">Nếu có bất kỳ thắc mắc nào về tiến độ thi công, vui lòng liên hệ quản lý dự án.</p>
                    <a href="#" class="btn btn-light btn-sm w-100 fw-bold text-primary">Gửi phản hồi</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>