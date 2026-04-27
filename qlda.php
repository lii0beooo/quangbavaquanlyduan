<?php
session_start();
include_once 'CSDL/config.php';

// 1. Kiểm tra đăng nhập
if (!isset($_SESSION['username']) || $_SESSION['maQuyen'] != 2 ) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

try {
    // 2. Lấy thông tin nhân viên QLDA
    $sql_nv = "SELECT * FROM nv_qlda WHERE taiKhoan = :user";
    $stmt_nv = $conn->prepare($sql_nv);
    $stmt_nv->execute([':user' => $username]);
    $nv_info = $stmt_nv->fetch(PDO::FETCH_ASSOC);

    if (!$nv_info) {
        die("Không tìm thấy thông tin nhân sự.");
    }
    $maNV = $nv_info['maNV'];

    // 3. Thống kê số lượng dự án đang phụ trách
    $sql_count_da = "SELECT COUNT(*) as tong FROM duan WHERE maNV = :maNV";
    $stmt_count = $conn->prepare($sql_count_da);
    $stmt_count->execute([':maNV' => $maNV]);
    $tong_da = $stmt_count->fetch(PDO::FETCH_ASSOC)['tong'];

    // 4. Thống kê dự án QUÁ HẠN (Thêm mới)
    $sql_qua_han = "SELECT COUNT(*) as tong FROM duan 
                    WHERE maNV = :maNV AND ngayKT < CURDATE() AND trangThai != 'Hoàn thành'";
    $stmt_qh = $conn->prepare($sql_qua_han);
    $stmt_qh->execute([':maNV' => $maNV]);
    $tong_qua_han = $stmt_qh->fetch(PDO::FETCH_ASSOC)['tong'];

    // 5. Lấy danh sách dự án
    $sql_ds_da = "SELECT da.maDA, da.tenDA, da.ngayKT, da.trangThai, nt.tenNhaThau, 
                 (SELECT noiDungCapNhat FROM tiendoda WHERE maDA = da.maDA ORDER BY ngayCapNhat DESC LIMIT 1) as tienDoMoiNhat
                 FROM duan da
                 LEFT JOIN nhathau nt ON da.maNhaThau = nt.maNhaThau
                 WHERE da.maNV = :maNV";
    $stmt_da = $conn->prepare($sql_ds_da);
    $stmt_da->execute([':maNV' => $maNV]);
    $list_da = $stmt_da->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Lỗi kết nối CSDL: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điều khiển - NV QLDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; color: #333; font-family: 'Inter', sans-serif; }
        .main-content { margin-left: 260px; padding: 30px; transition: 0.3s; }
        .card-stat { border: none; border-radius: 15px; transition: transform 0.2s; }
        .card-stat:hover { transform: translateY(-5px); }
        .table-container { background: #fff; border-radius: 15px; overflow: hidden; border: none; }
        .status-badge { font-size: 0.75rem; padding: 5px 12px; border-radius: 20px; }
    </style>
</head>
<body>

<?php 
    // Kiểm tra xem file sidebar có tồn tại không để tránh lỗi trắng trang
    if(file_exists('sidebar-qlda.php')) include 'sidebar-qlda.php'; 
?>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Xin chào, <span class="text-primary"><?php echo htmlspecialchars($nv_info['hoTen']); ?></span>!</h2>
            <p class="text-secondary">Hôm nay là <?php echo date('d/m/Y'); ?>. Chúc bạn một ngày làm việc hiệu quả.</p>
        </div>
        <div class="modern-avatar shadow-sm bg-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; font-weight: bold;">
            <?php echo mb_substr($nv_info['hoTen'], 0, 1); ?>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card card-stat p-3 shadow-sm border-start border-primary border-5">
                <small class="text-uppercase fw-bold text-muted" style="font-size: 0.7rem;">Dự án đang phụ trách</small>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h2 class="mb-0 fw-bold"><?php echo sprintf("%02d", $tong_da); ?></h2>
                    <i class="fas fa-project-diagram fa-2x text-primary opacity-25"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-stat p-3 shadow-sm border-start border-danger border-5">
                <small class="text-uppercase fw-bold text-muted" style="font-size: 0.7rem;">Dự án quá hạn</small>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h2 class="mb-0 text-danger fw-bold"><?php echo sprintf("%02d", $tong_qua_han); ?></h2>
                    <i class="fas fa-exclamation-circle fa-2x text-danger opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card table-container shadow-sm">
        <div class="card-header bg-white py-3 border-0">
            <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-list-ul me-2 text-primary"></i>Danh sách dự án điều hành</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Tên dự án</th>
                        <th>Nhà thầu</th>
                        <th>Trạng thái hiện tại</th>
                        <th>Hạn chót</th>
                        <th class="text-center">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($list_da) > 0): ?>
                        <?php foreach ($list_da as $row): ?>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark"><?php echo htmlspecialchars($row['tenDA']); ?></div>
                                <small class="text-muted">ID: #<?php echo $row['maDA']; ?></small>
                            </td>
                            <td><span class="text-secondary"><?php echo htmlspecialchars($row['tenNhaThau'] ?? 'Chưa giao'); ?></span></td>
                            <td>
                                <?php 
                                    $statusClass = 'bg-secondary';
                                    if($row['trangThai'] == 'Hoàn thành') $statusClass = 'bg-success';
                                    if($row['trangThai'] == 'Đang thực hiện') $statusClass = 'bg-info text-dark';
                                ?>
                                <span class="badge status-badge <?php echo $statusClass; ?>">
                                    <?php echo $row['trangThai']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="<?php echo (strtotime($row['ngayKT']) < time()) ? 'text-danger fw-bold' : ''; ?>">
                                    <?php echo date('d/m/Y', strtotime($row['ngayKT'])); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="view_project.php?id=<?php echo $row['maDA']; ?>" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <i class="fas fa-eye me-1"></i> Xem
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center py-5 text-muted">Bạn chưa phụ trách dự án nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>