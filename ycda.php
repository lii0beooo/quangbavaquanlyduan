
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký dự án</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <!-- TITLE -->
                    <h3 class="text-center fw-bold mb-2" style="color: green;">
                        Đăng ký tư vấn dự án
                    </h3>
                    <p class="text-center text-muted mb-4">
                        Điền thông tin để chúng tôi liên hệ tư vấn miễn phí
                    </p>

                    <form onsubmit="return handleSubmit(event)">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control rounded-3" placeholder="Nguyễn Văn A" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control rounded-3" placeholder="090..." required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control rounded-3" placeholder="email@gmail.com">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Địa điểm</label>
                                <input type="text" class="form-control rounded-3" placeholder="Quận/Huyện..." required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Ngân sách (VNĐ)</label>
                                <input type="number" class="form-control rounded-3" placeholder="Dự kiến...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Diện tích (m²)</label>
                                <input type="number" class="form-control rounded-3">
                            </div>

                            <!-- CHECKBOX -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nhu cầu</label>

                                <div class="d-flex flex-wrap gap-3">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Cảnh quan sân vườn</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Hồ cá Koi</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Vật liệu sân vườn</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Phong thủy</label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control rounded-3" rows="3"></textarea>
                            </div>

                            <!-- BUTTON -->
                            <div class="col-12">
                                <button class="btn btn-success w-100 py-2 rounded-3 fw-bold">
                                    GỬI YÊU CẦU
                                </button>
                            </div>

                        </div>

                    </form>

                    <!-- SUCCESS -->
                    <div id="success" class="alert alert-success text-center mt-3 d-none">
                        Gửi thành công! Chúng tôi sẽ liên hệ sớm.
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<script>
function handleSubmit(e){
    e.preventDefault();
    document.querySelector("form").style.display="none";
    document.getElementById("success").classList.remove("d-none");
}
</script>

</body>
</html>