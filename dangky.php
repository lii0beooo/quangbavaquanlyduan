<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Dự án - Cảnh Quan Xanh</title>
    <style>
        /* --- ANIMATIONS --- */
        @keyframes attract-attention {
            0% { transform: scale(1) rotate(0deg); box-shadow: 0 0 0 0 rgba(255, 77, 79, 0.7); }
            25% { transform: scale(1.1) rotate(4deg); }
            50% { transform: scale(1.1) rotate(-4deg); box-shadow: 0 0 0 20px rgba(255, 77, 79, 0); }
            75% { transform: scale(1.1) rotate(4deg); }
            100% { transform: scale(1) rotate(0deg); box-shadow: 0 0 0 0 rgba(255, 77, 79, 0); }
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('images/nen2.png'); 
            background-size: cover; background-position: center; background-attachment: fixed;
            margin: 0; min-height: 100vh; color: white;
        }

        /* Nút quay lại */
        .btn-back {
            position: fixed; top: 20px; left: 20px; width: 45px; height: 45px;
            background: rgba(255, 255, 255, 0.9); border-radius: 12px;
            display: flex; justify-content: center; align-items: center;
            text-decoration: none; color: #333; box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 1001; transition: 0.3s;
        }
        .btn-back:hover { background: #ff4d4f; color: white; transform: translateX(-5px); }

        /* --- BỐ CỤC CHÍNH --- */
        .main-wrapper {
            display: flex; justify-content: space-between; align-items: flex-start;
            max-width: 1300px; margin: 0 auto; padding: 60px 20px; gap: 40px;
        }

        /* PHẦN GIỚI THIỆU BÊN TRÁI */
        .intro-container { flex: 1; max-width: 600px; }
        .intro-sub { font-size: 16px; background: rgba(76, 175, 80, 0.9); display: inline-block; padding: 6px 16px; border-radius: 5px; margin-bottom: 20px; font-weight: 600; }
        .intro-title { font-size: 48px; font-weight: 800; line-height: 1.1; margin-bottom: 20px; text-shadow: 2px 4px 10px rgba(0,0,0,0.5); }
        .intro-text { font-size: 17px; line-height: 1.6; margin-bottom: 30px; opacity: 0.95; }

        .services-list { margin-top: 30px; }
        .service-item { margin-bottom: 25px; background: rgba(255, 255, 255, 0.05); padding: 20px; border-radius: 15px; border-left: 4px solid #4caf50; }
        .service-item h3 { margin: 0 0 10px 0; color: #4caf50; font-size: 19px; text-transform: uppercase; }
        .service-item ul { margin: 0; padding-left: 20px; list-style-type: square; }
        .service-item li { font-size: 14.5px; line-height: 1.6; margin-bottom: 5px; opacity: 0.9; }
        
        .feature-list { display: flex; gap: 15px; margin-bottom: 35px; }
        .feature-box { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(8px); padding: 15px; border-radius: 15px; border: 1px solid rgba(255,255,255,0.2); text-align: center; flex: 1; }
        .feature-box b { font-size: 22px; display: block; color: #4caf50; }
        .feature-box small { font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; }

        .intro-long-text { 
            font-size: 15px; line-height: 1.8; opacity: 0.9; text-align: justify; 
            margin-bottom: 40px; padding-left: 15px; border-left: 3px solid #ff4d4f;
        }

        /* Lưới 4 ảnh dự án */
        .project-gallery { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .project-item { position: relative; height: 160px; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.4); }
        .project-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .project-item:hover img { transform: scale(1.1); }
        .project-label { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.85)); padding: 10px; font-size: 12px; font-weight: 600; }

        /* KHUNG FORM ĐĂNG KÝ BÊN PHẢI */
        .form-card {
            background: rgba(255, 255, 255, 0.98); width: 100%; max-width: 520px;
            padding: 25px 35px; border-radius: 24px; box-shadow: -15px 20px 50px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px); color: #333; 
            position: fixed; 
            right: calc(50% - 650px + 20px); 
            top: 50%; 
            transform: translateY(-50%); 
            z-index: 1000;
            min-height: 450px; /* Giữ khung không bị nhảy kích thước khi hiện thông báo */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo-container { display: flex; justify-content: center; margin-bottom: 15px; }
        .company-logo { max-width: 110px; height: auto; }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px 20px; }
        .input-group { margin-bottom: 2px; }
        .full-width { grid-column: span 2; }

        .input-group label { display: block; font-weight: 700; margin-bottom: 5px; color: #444; font-size: 13px; }
        .input-group input, .input-group textarea {
            width: 100%; padding: 11px; border: 2px solid #edf0f5; border-radius: 12px;
            font-size: 14px; box-sizing: border-box; background-color: #fcfcfc; transition: 0.3s;
        }
        .input-group input:focus, .input-group textarea:focus { border-color: #ff4d4f; background-color: #fff; outline: none; box-shadow: 0 0 10px rgba(255, 77, 79, 0.15); }

        .footer-action { display: flex; align-items: center; justify-content: flex-end; gap: 15px; margin-top: 10px; grid-column: span 2; }
        .btn-submit-circle {
            width: 85px; height: 85px; background: #ff4d4f; border: none; border-radius: 50%;
            color: white; font-weight: 800; cursor: pointer; text-align: center;
            line-height: 1.2; font-size: 12px; text-transform: uppercase;
            box-shadow: 0 6px 20px rgba(255, 77, 79, 0.4);
            animation: attract-attention 1.8s infinite ease-in-out;
        }
        .hint-text { font-size: 12px; color: #666; font-style: italic; text-align: right; line-height: 1.4; }

        /* Style cho thông báo thành công */
        #success-message {
            display: none;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        #success-message h2 { color: #4caf50; font-size: 24px; margin-bottom: 15px; }
        #success-message p { font-size: 16px; color: #333; line-height: 1.6; }
        #success-message .icon { font-size: 50px; color: #4caf50; margin-bottom: 10px; }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Responsive */
        @media (max-width: 1300px) { .form-card { right: 20px; } }
        @media (max-width: 1100px) {
            .main-wrapper { flex-direction: column; align-items: center; padding: 40px 20px; }
            .intro-container { max-width: 100%; text-align: center; margin-bottom: 50px; }
            .intro-long-text { border-left: none; border-top: 3px solid #ff4d4f; padding: 20px 0; }
            .form-card { position: relative; right: auto; top: auto; transform: none; margin: 0 auto; }
        }
        /* Container chính */
        .button-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        /* Ẩn checkbox mặc định */
        .button-grid input[type="checkbox"] {
            display: none;
        }

        /* Định dạng nhãn thành nút bấm */
        .button-grid label {
            flex: 0 0 calc(50% - 5px); /* Chia 2 cột trên 1 dòng */
            padding: 15px 10px;
            background-color: #ffffff;
            border: 1px solid #dcdfe6;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            box-sizing: border-box;
            font-size: 14px;
            color: #606266;
        }

        /* Hiệu ứng khi di chuột */
        .button-grid label:hover {
            border-color: #409eff;
            color: #409eff;
        }

        /* Hiệu ứng khi được chọn (Cho phép chọn nhiều nút cùng lúc) */
        .button-grid input[type="checkbox"]:checked + label {
            background-color: #ecf5ff;
            border-color: #409eff;
            color: #409eff;
            font-weight: bold;
            /* Thêm icon tích nếu muốn (tùy chọn) */
            position: relative;
        }

        /* Thêm một dấu check nhỏ ở góc nếu muốn người dùng dễ nhận biết hơn */
        .button-grid input[type="checkbox"]:checked + label::after {
            content: "✓";
            position: absolute;
            top: 2px;
            right: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <a href="index.php" class="btn-back" title="Quay về trang chủ">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </a>

    <div class="main-wrapper">
        <div class="intro-container">
            <div class="intro-sub">Giải pháp kiến trúc xanh bền vững</div>
            <h1 class="intro-title">NÂNG TẦM ĐẲNG CẤP<br>CẢNH QUAN VIỆT</h1>
            <p class="intro-text">
                Chúng tôi không chỉ trồng cây, chúng tôi kiến tạo những giá trị sống khác biệt. 
                Mỗi công trình là một tâm hồn nghệ thuật được gửi gắm vào thiên nhiên.
            </p>
            
            <div class="feature-list">
                <div class="feature-box"><b>12+</b><small>Năm kinh nghiệm</small></div>
                <div class="feature-box"><b>600+</b><small>Công trình</small></div>
                <div class="feature-box"><b>TOP 1</b><small>Chất lượng</small></div>
            </div>

            <div class="intro-long-text">
                Cảnh Quan Xanh tự hào là đối tác tin cậy của hàng ngàn gia chủ và chủ đầu tư trên toàn quốc. Với đội ngũ kiến trúc sư tâm huyết, chúng tôi chắt lọc những tinh hoa từ phong cách sân vườn Nhật Bản, hiện đại Châu Âu và hồn cốt Việt Nam để tạo nên những khu vườn không chỉ đẹp về thị giác mà còn hài hòa về phong thủy, mang lại vượng khí và sự an yên tuyệt đối cho gia đình bạn.
            </div>

            <div class="project-gallery">
                <div class="project-item"><img src="images/duan1.png" alt="Dự án 1"><div class="project-label">Biệt thự sân vườn hiện đại</div></div>
                <div class="project-item"><img src="images/duan2.png" alt="Dự án 2"><div class="project-label">Hồ cá Koi & Thác nước</div></div>
                <div class="project-item"><img src="images/duan3.png" alt="Dự án 3"><div class="project-label">Cảnh quan Resort đẳng cấp</div></div>
                <div class="project-item"><img src="images/duan4.png" alt="Dự án 4"><div class="project-label">Vườn tường đứng thông minh</div></div>
            </div>

            <div class="services-list">
                <div class="service-item">
                    <h3>1. Cảnh quan sân vườn</h3>
                    <ul>
                        <li>Cảnh quan sân vườn nhà hàng, khách sạn, quán cafe, hồ cá Koi, tường cây, vườn trên tường, vườn trên mái, tiểu cảnh ban công, tiểu cảnh giếng trời….</li>
                        <li>Thiết kế và thi công sân vườn, tiểu cảnh khách sạn, nhà hàng, trung tâm thương mại…</li>
                        <li>Thiết kế và thi công khu du lịch nghỉ dưỡng, homestay, resort…</li>
                        <li>Chế tác Hòn non bộ, Thác nước, Quần thể thác nước, Tranh đá, tranh gốm…</li>
                    </ul>
                </div>
                <div class="service-item">
                    <h3>2. Sản xuất chậu xi măng đá mài</h3>
                    <ul>
                        <li>Sản xuất cung cấp chậu xi măng đá mài, chậu xi măng nhẹ.</li>
                        <li>Thiết kế, thi công trồng cây, trang trí văn phòng, ban công nhà ở, chung cư…</li>
                    </ul>
                </div>
                <div class="service-item">
                    <h3>3. Thạch thủy bình & Lu phong thủy</h3>
                    <ul>
                        <li>Tư vấn phong thủy cảnh quan.</li>
                        <li>Sản xuất, cung cấp, lắp đặt lu nước phong thủy (thạch thủy bình).</li>
                    </ul>
                </div>
                <div class="service-item">
                    <h3>4. Cung cấp vật liệu sân vườn</h3>
                    <ul>
                        <li>Đá trang trí sân vườn: đá sỏi tự nhiên các loại, bước dạo, cọc rào, đèn đá….</li>
                        <li>Vật liệu hồ cá Koi: máy bơm, sục khí, đèn UV, đèn hắt, jmat, đèn âm nước, chổi lọc….</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="logo-container">
                <img src="images/logo.jpg" alt="Logo" class="company-logo">
            </div>

            <form id="projectForm" onsubmit="return handleSubmit(event)" class="form-grid">
                <div class="input-group">
                    <label>Họ và tên</label>
                    <input type="text" name="hoTen" placeholder="Nguyễn Văn A" required>
                </div>
                <div class="input-group">
                    <label>Số điện thoại</label>
                    <input type="tel" name="sdt" placeholder="090..." required>
                </div>
                <div class="input-group">
                    <label>Địa chỉ Email</label>
                    <input type="email" name="email" placeholder="vi-du@gmail.com">
                </div>
                <div class="input-group">
                    <label>Địa điểm thi công</label>
                    <input type="text" name="diaDiemThiCong" placeholder="Quận/Huyện, Tỉnh..." required>
                </div>
                <div class="input-group">
                    <label>Ngân sách (VNĐ)</label>
                    <input type="number" name="nganSachDuKien" placeholder="Dự kiến khoảng...">
                </div>
                <div class="input-group">
                    <label>Diện tích (m&sup2;)</label>
                    <input type="number" step="0.1" name="dienTichDuKien" placeholder="0.0">
                </div>
                <div class="input-group full-width">
                    <label>Nội dung yêu cầu chi tiết</label>
                    <div class="button-grid">
                        <input type="checkbox" id="opt1" name="noiDungYeuCau[]" value="Lựa chọn 1">
                        <label for="opt1">Cảnh quan sân vườn</label>

                        <input type="checkbox" id="opt2" name="noiDungYeuCau[]" value="Lựa chọn 2">
                        <label for="opt2">Thi công hồ cá</label>

                        <input type="checkbox" id="opt3" name="noiDungYeuCau[]" value="Lựa chọn 3">
                        <label for="opt3">Vật liệu sân vườn</label>

                        <input type="checkbox" id="opt4" name="noiDungYeuCau[]" value="Lựa chọn 4">
                        <label for="opt4">Vật liệu phong thủy</label>
                    </div>
                </div>
                <div class="input-group full-width">
                    <label>Ghi chú nhanh</label>
                    <input type="text" name="ghiChu" placeholder="Ví dụ: Cần làm gấp, làm theo phong thủy...">
                </div>
                
                <div class="footer-action">
                    <p class="hint-text">Đội ngũ kiến trúc sư<br>sẽ gọi lại tư vấn ngay!</p>
                    <button type="submit" class="btn-submit-circle">GỬI<br>YÊU CẦU</button>
                </div>
            </form>

            <div id="success-message">
                <div class="icon">✓</div>
                <h2>CẢM ƠN QUÝ KHÁCH!</h2>
                <p>Yêu cầu của bạn đã được gửi thành công.<br>
                Đội ngũ kiến trúc sư sẽ gọi lại trong thời gian sớm nhất.</p>
            </div>
        </div>
    </div>

    <script>
        function handleSubmit(event) {
            event.preventDefault(); // Ngăn form tải lại trang
            
            // Ẩn form
            document.getElementById('projectForm').style.display = 'none';
            
            // Hiện thông báo thành công
            document.getElementById('success-message').style.display = 'block';
            
            return false;
        }
    </script>

</body>
</html>