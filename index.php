<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cảnh Quan Hải Phòng</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    @keyframes attract-attention {
        0% { transform: scale(1) rotate(0deg); box-shadow: 0 0 0 0 rgba(255, 77, 79, 0.7); }
        25% { transform: scale(1.1) rotate(5deg); }
        50% { transform: scale(1.1) rotate(-5deg); box-shadow: 0 0 0 15px rgba(255, 77, 79, 0); }
        75% { transform: scale(1.1) rotate(5deg); }
        100% { transform: scale(1) rotate(0deg); box-shadow: 0 0 0 0 rgba(255, 77, 79, 0); }
    }
</style>
<body>
<?php include 'header.php'; ?>


<!-- BANNER -->
<section class="banner" onclick="goToPage()">
    
</section>

<!-- GIỚI THIỆU -->
<section class="about"
    style="background:url('images/nen1.jpg') center/cover no-repeat;
        padding:80px 0;
        position:relative;
        margin:0 1px;
        margin-top: 10px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        ">

    <div class="about-text" style="width:55%;padding-left:100px;">
        <h2 style="color:#4CAF50; font-size:34px; margin-bottom:20px; text-shadow: 4px 4px 5px rgb(251, 249, 249);">
            Về công ty chúng tôi
        </h2>

        <p style="line-height:1.8; margin-bottom:18px; font-size:19px; text-align: justify;">
            <strong>Công ty TNHH Thương mại và Xây dựng Tiểu Cảnh Xanh</strong>
            được thành lập bởi đội ngũ kiến trúc sư giàu kinh nghiệm cùng các chuyên viên
            có tay nghề cao, với khát vọng kiến tạo nên những
            <strong>không gian sống đẳng cấp, hài hòa và tràn đầy sức sống.</strong>
        </p>

        <p style="line-height:1.8; margin-bottom:25px; font-size:19px; text-align: justify;">
            Với phương châm “Tạo dựng cuộc sống hoàn mỹ”, chúng tôi luôn đặt trọn tâm huyết
            vào từng công trình, mang đến cho khách hàng
            <strong>những tác phẩm tinh tế, phù hợp nhất với nhu cầu và phong cách riêng.</strong>
        </p>

        <a href="about.php"
           style="display:inline-block; background:#4CAF50; color:white; padding:12px 25px; border-radius:25px; text-decoration:none; font-weight:500;">
            Xem thêm >
        </a>
    </div>

    <img src="images/about.jpg">
</section>

<!-- DỊCH VỤ -->
<section style="padding:60px 0; background:#f5f5f5;">
    <div style="max-width:1200px; margin:auto;">

        <!-- Tiêu đề -->
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="font-size:36px;">
                CÁC DÒNG SẢN PHẨM CHỦ ĐẠO CỦA CHÚNG TÔI
            </h2>
            <div style="width:80px; height:4px; background:#4CAF50; margin:15px auto;"></div>
        </div>

        <!-- Grid sản phẩm -->
        <div style="
            display:flex;
            flex-wrap:wrap;
            gap:30px;
        ">

            <!-- Card 1-->
            <div style="
                width: calc(33.33% - 20px);
                background:white;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.3s;
            "
            onmouseover="this.style.transform='translateY(-5px)'"
            onmouseout="this.style.transform='translateY(0)'">

                <img src="images/1.png" style="width:100%;">

                <div style="padding:20px;">
                    <h3 style="font-size:25px">Cảnh quan sân vườn</h3>
                    <hr>
                    <a href="#" style="color:#4CAF50; text-decoration:none;">
                        Xem chi tiết >
                    </a>
                </div>
            </div>

            <!-- Card 2-->
            <div style="
                width: calc(33.33% - 20px);
                background:white;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.3s;
            "
            onmouseover="this.style.transform='translateY(-5px)'"
            onmouseout="this.style.transform='translateY(0)'">

                <img src="images/2.png" style="width:100%;">

                <div style="padding:20px;">
                    <h3 style="font-size:25px">Thi công hồ cá Koi</h3>
                    <hr>
                    <a href="#" style="color:#4CAF50; text-decoration:none;">
                        Xem chi tiết >
                    </a>
                </div>
            </div>

            <!-- Card 3-->
            <div style="
                width: calc(33.33% - 20px);
                background:white;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.3s;
            "
            onmouseover="this.style.transform='translateY(-5px)'"
            onmouseout="this.style.transform='translateY(0)'">

                <img src="images/3.png" style="width:100%;">

                <div style="padding:20px;">
                    <h3 style="font-size:25px">Lu nước phong thủy</h3>
                    <hr>
                    <a href="#" style="color:#4CAF50; text-decoration:none;">
                        Xem chi tiết >
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div style="
                width: calc(33.33% - 20px);
                background:white;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.3s;
            "
            onmouseover="this.style.transform='translateY(-5px)'"
            onmouseout="this.style.transform='translateY(0)'">

                <img src="images/4.png" style="width:100%;">

                <div style="padding:20px;">
                    <h3 style="font-size:25px">Vật liệu sân vườn</h3>
                    <hr>
                    <a href="#" style="color:#4CAF50; text-decoration:none;">
                        Xem chi tiết >
                    </a>
                </div>
            </div>

            <!-- Card 5-->
            <div style="
                width: calc(33.33% - 20px);
                background:white;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.3s;
            "
            onmouseover="this.style.transform='translateY(-5px)'"
            onmouseout="this.style.transform='translateY(0)'">

                <img src="images/5.png" style="width:100%;">

                <div style="padding:20px;">
                    <h3 style="font-size:25px">Chậu xi măng đá mài</h3>
                    <hr>
                    <a href="#" style="color:#4CAF50; text-decoration:none;">
                        Xem chi tiết >
                    </a>
                </div>
            </div>

            <!-- Card 6-->
            <div style="
                width: calc(33.33% - 20px);
                background:white;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.3s;
            "
            onmouseover="this.style.transform='translateY(-5px)'"
            onmouseout="this.style.transform='translateY(0)'">

                <img src="images/6.png" style="width:100%;">

                <div style="padding:20px;">
                    <h3 style="font-size:25px">Đèn đá sân vườn</h3>
                    <hr>
                    <a href="#" style="color:#4CAF50; text-decoration:none;">
                        Xem chi tiết >
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Mô tả -->
<section style="
    background:url('images/nen1.jpg') center/cover no-repeat;
    padding:80px 0;
">

    <div style="max-width:1200px; margin:auto; text-align:center;">

        <h2 style="font-size:36px; margin-bottom:10px;">
            Vì sao bạn nên chọn Cảnh Quan Xanh?
        </h2>

        <div style="
            width:80px;
            height:4px;
            background:#4CAF50;
            margin:10px auto 50px;
        "></div>

        <div style="
            display:flex;
            gap:30px;
            flex-wrap:wrap;
            justify-content:center;
        ">

            <!-- CARD TEMPLATE -->
            <div style="
                width:260px;
                background:rgba(255,255,255,0.9);
                padding:30px 20px;
                border-radius:10px;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.4s;
            "
            onmouseover="
                this.style.transform='translateY(-10px)';
                this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)';
                this.querySelector('.icon').style.background='#4CAF50';
                this.querySelector('.icon').style.color='white';
                this.querySelector('h3').style.color='#4CAF50';
            "
            onmouseout="
                this.style.transform='translateY(0)';
                this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';
                this.querySelector('.icon').style.background='transparent';
                this.querySelector('.icon').style.color='black';
                this.querySelector('h3').style.color='black';
            ">

                <div class="icon" style="
                    width:80px;
                    height:80px;
                    border-radius:50%;
                    border:2px solid #ccc;
                    margin:auto;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:32px;
                    transition:0.4s;
                ">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <h3 style="margin:20px 0 10px;">Uy tín lâu năm</h3>

                <p style="line-height:1.6;">
                    Là đơn vị có trên 15 năm kinh nghiệm,
                    đội ngũ nhân công chuyên nghiệp, tay nghề cao.
                </p>
            </div>

            <!-- CARD 2 -->
            <div style="
                width:260px;
                background:rgba(255,255,255,0.9);
                padding:30px 20px;
                border-radius:10px;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.4s;
            "
            onmouseover="
                this.style.transform='translateY(-10px)';
                this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)';
                this.querySelector('.icon').style.background='#4CAF50';
                this.querySelector('.icon').style.color='white';
                this.querySelector('h3').style.color='#4CAF50';
            "
            onmouseout="
                this.style.transform='translateY(0)';
                this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';
                this.querySelector('.icon').style.background='transparent';
                this.querySelector('.icon').style.color='black';
                this.querySelector('h3').style.color='black';
            ">

                <div class="icon" style="
                    width:80px;
                    height:80px;
                    border-radius:50%;
                    border:2px solid #ccc;
                    margin:auto;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:32px;
                    transition:0.4s;
                ">
                    <i class="fa-solid fa-feather"></i>
                </div>

                <h3 style="margin:20px 0 10px;">Thi công đa dạng</h3>

                <p style="line-height:1.6;">
                    Thi công trọn gói các hạng mục cảnh quan,
                    từ sân vườn, hồ cá Koi đến tiểu cảnh phong thủy.
                </p>
            </div>

            <!-- CARD 3 -->
            <div style="
                width:260px;
                background:rgba(255,255,255,0.9);
                padding:30px 20px;
                border-radius:10px;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.4s;
            "
            onmouseover="
                this.style.transform='translateY(-10px)';
                this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)';
                this.querySelector('.icon').style.background='#4CAF50';
                this.querySelector('.icon').style.color='white';
                this.querySelector('h3').style.color='#4CAF50';
            "
            onmouseout="
                this.style.transform='translateY(0)';
                this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';
                this.querySelector('.icon').style.background='transparent';
                this.querySelector('.icon').style.color='black';
                this.querySelector('h3').style.color='black';
            ">

                <div class="icon" style="width:80px;height:80px;border-radius:50%;border:2px solid #ccc;margin:auto;display:flex;align-items:center;justify-content:center;font-size:32px;transition:0.4s;">
                    <i class="fa-solid fa-building"></i>
                </div>

                <h3 style="margin:20px 0 10px;">Quy mô bài bản</h3>

                <p style="line-height:1.6;">
                    Có đầy đủ văn phòng, xưởng sản xuất,
                    kho nguyên vật liệu và đội ngũ kỹ thuật chuyên nghiệp.
                </p>
            </div>

            <!-- CARD 4 -->
            <div style="
                width:260px;
                background:rgba(255,255,255,0.9);
                padding:30px 20px;
                border-radius:10px;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
                transition:0.4s;
            "
            onmouseover="
                this.style.transform='translateY(-10px)';
                this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)';
                this.querySelector('.icon').style.background='#4CAF50';
                this.querySelector('.icon').style.color='white';
                this.querySelector('h3').style.color='#4CAF50';
            "
            onmouseout="
                this.style.transform='translateY(0)';
                this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';
                this.querySelector('.icon').style.background='transparent';
                this.querySelector('.icon').style.color='black';
                this.querySelector('h3').style.color='black';
            ">

                <div class="icon" style="width:80px;height:80px;border-radius:50%;border:2px solid #ccc;margin:auto;display:flex;align-items:center;justify-content:center;font-size:32px;transition:0.4s;">
                    <i class="fa-solid fa-yin-yang"></i>
                </div>

                <h3 style="margin:20px 0 10px;">Cảnh quan phong thủy</h3>

                <p style="line-height:1.6;">
                    Ứng dụng kiến thức phong thủy trong thiết kế,
                    giúp không gian sống hài hòa và thịnh vượng.
                </p>
            </div>

        </div>
    </div>
</section>



<!-- DỰ ÁN -->
<section 
    style="
        background:url('images/nen2.png') center/cover no-repeat;
        padding:80px 0;
        position:relative;
        display:flex;
        align-items:center;
        justify-content:space-between;
    ">

    <!-- LEFT -->
    <div style="
            width:30%;
            padding-left:100px;
            color:white;
            z-index:2;
            position:relative;
        ">
        <h2 style="
            font-size:34px;
            margin-bottom:20px;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.8);
        ">
            Dự án tiêu biểu
        </h2>

        <p style="
            line-height:1.8;
            margin-bottom:18px;
            font-size:18px;
            color:#ddd;
            text-align: justify;
        ">
            Tổng hợp các dự án tiêu biểu chung tối đã tham gia thi ở nhiều hạng mục như: tiểu cảnh sân vườn, thi công hồ cá Koi, lát đá sân vườn, ...
        </p>

        <a href="#"
           style="
                display:inline-block;
                background:#4CAF50;
                color:white;
                padding:12px 25px;
                border-radius:25px;
                text-decoration:none;
           ">
            Xem thêm
        </a>
    </div>

    <!-- RIGHT (slider) -->
    <div style="width:60%; position:relative; overflow:hidden;">

        <!-- SLIDER -->
        <div id="slider" style="
            display:flex;
            gap:20px;
            transition:0.5s;
        ">

            <!-- CARD -->
            <div style="min-width:280px; max-width:280px; background:white; border-radius:15px; overflow:hidden;">
                <img src="images/duan1.png" style="width:100%; height:350px; object-fit:cover;">
                <div style="padding:15px;">
                    <h3 style="margin-bottom:10px;">Thi công sân vườn hồ cá Koi tại Tiên Lãng Hải Phòng</h3>
                    <p style="color:#555;">Mang lại không gian thiên nhiên hài hòa.</p>
                </div>
            </div>

            <!-- CARD -->
            <div style="min-width:280px; max-width:280px; background:white; border-radius:15px; overflow:hidden;">
                <img src="images/duan2.png" style="width:100%; height:350px; object-fit:cover;">
                <div style="padding:15px;">
                    <h3 style="margin-bottom:10px;">Thi công hồ cá Koi tại công ty ô tô Chiến Thắng</h3>
                    <p style="color:#555;">Kết hợp phong thủy và thẩm mỹ.</p>
                </div>
            </div>

            <!-- CARD -->
            <div style="min-width:280px; max-width:280px; background:white; border-radius:15px; overflow:hidden;">
                <img src="images/duan3.png" style="width:100%; height:350px; object-fit:cover;">
                <div style="padding:15px;">
                    <h3 style="margin-bottom:10px;">Thi công hồ cá Koi tại Waterfront City hải phòng</h3>
                    <p style="color:#555;">Không gian thư giãn sang trọng.</p>
                </div>
            </div>

            <!-- CARD -->
            <div style="min-width:280px; max-width:280px; background:white; border-radius:15px; overflow:hidden;">
                <img src="images/duan4.png" style="width:100%; height:350px; object-fit:cover;">
                <div style="padding:15px;">
                    <h3 style="margin-bottom:10px;">Wellcome Center Vũng Tàu</h3>
                    <p style="color:#555;">Không gian thư giãn sang trọng.</p>
                </div>
            </div>

        </div>

        <!-- NÚT TRÁI -->
        <button onclick="moveSlide(-1)" style="
            position:absolute;
            left:10px;
            top:50%;
            transform:translateY(-50%);
            z-index:10;
            background:white;
            border:none;
            width:40px;
            height:40px;
            border-radius:50%;
            cursor:pointer;
            color: #4CAF50;
        "><i class="fa-solid fa-chevron-left"></i></button>

        <!-- NÚT PHẢI -->
        <button onclick="moveSlide(1)" style="
            position:absolute;
            right:10px;
            top:50%;
            transform:translateY(-50%);
            z-index:10;
            background:white;
            border:none;
            width:40px;
            height:40px;
            border-radius:50%;
            cursor:pointer;
            color: #4CAF50;
        "><i class="fa-solid fa-chevron-right"></i></button>

    </div>

</section>

<section style="padding:60px 0; background:#f5f5f5;">
    <div style="max-width:1200px; margin:auto;">
        <!-- Tiêu đề -->
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="font-size:36px;">
                Câu hỏi thường gặp
            </h2>
            <div style="width:80px; height:4px; background:#4CAF50; margin:15px auto;"></div>
            <p>Câu trả lời cho các câu hỏi thường gặp về Công ty Tiểu Cảnh Xanh có sẵn dưới đây:</p>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <!-- ITEM 1-->
            <div>
                <!-- BOX -->
                <div onclick="toggleFAQ(this)" 
                style="background:white; border-radius:30px; box-shadow:0 4px 10px rgba(0,0,0,0.08); padding:15px 20px; cursor:pointer; position:relative;">
                    
                    Tôi liên hệ với Công ty Tiểu Cảnh Xanh bằng cách nào?
                    <span style="position:absolute; right:20px;">▼</span>
                </div>

                <!-- ANSWER (ngoài box) -->
                <div style="display:none; padding:10px 20px;">
                    Địa chỉ: Số 510D Nguyễn Văn Linh, Lê Chân, Hải Phòng<br>
                    Hotline: 0977.540.175
                </div>
            </div>

            <!-- ITEM 2 -->
            <div>
                <div onclick="toggleFAQ(this)" 
                style="background:white; border-radius:30px; box-shadow:0 4px 10px rgba(0,0,0,0.08); padding:15px 20px; cursor:pointer; position:relative;">
                    
                    Chi phí thiết kế và thi công tiểu cảnh được tính như thế nào?
                    <span style="position:absolute; right:20px;">▼</span>
                </div>

                <div style="display:none; padding:10px 20px;">
                    Chi phí phụ thuộc vào diện tích, vật liệu và yêu cầu thiết kế cụ thể.
                </div>
            </div>

            <!-- ITEM 3 -->
            <div>
                <div onclick="toggleFAQ(this)" 
                style="background:white; border-radius:30px; box-shadow:0 4px 10px rgba(0,0,0,0.08); padding:15px 20px; cursor:pointer; position:relative;">
                    
                    Vật liệu sân vườn của công ty có đảm bảo chất lượng không?
                    <span style="position:absolute; right:20px;">▼</span>
                </div>

                <div style="display:none; padding:10px 20px;">
                    Chúng tôi sử dụng vật liệu chất lượng cao, đảm bảo độ bền và tính thẩm mỹ.
                </div>
            </div>

            <!-- ITEM 4 -->
             <div>
                <div onclick="toggleFAQ(this)" 
                style="background:white; border-radius:30px; box-shadow:0 4px 10px rgba(0,0,0,0.08); padding:15px 20px; cursor:pointer; position:relative;">
                    
                    Công ty có dịch vụ bảo trì tiểu cảnh sau khi thi công không?
                    <span style="position:absolute; right:20px;">▼</span>
                </div>

                <div style="display:none; padding:10px 20px;">
                    Có, chúng tôi cung cấp dịch vụ bảo trì định kỳ theo yêu cầu.
                </div>
            </div>

            <!-- ITEM 5 -->
                <div>
                    <div onclick="toggleFAQ(this)" 
                    style="background:white; border-radius:30px; box-shadow:0 4px 10px rgba(0,0,0,0.08); padding:15px 20px; cursor:pointer; position:relative;">
                        
                        Thời gian thi công tiểu cảnh sân vườn là bao lâu?
                        <span style="position:absolute; right:20px;">▼</span>
                    </div>
    
                    <div style="display:none; padding:10px 20px;">
                        Thời gian thi công phụ thuộc vào quy mô và độ phức tạp của dự án, thường từ 2-6 tuần.
                    </div>
            </div>

             <!-- ITEM 6 -->
             <div>
                <div onclick="toggleFAQ(this)" 
                style="background:white; border-radius:30px; box-shadow:0 4px 10px rgba(0,0,0,0.08); padding:15px 20px; cursor:pointer; position:relative;">
                    
                    Công ty có nhận thi công tiểu cảnh cho các công trình lớn không?
                    <span style="position:absolute; right:20px;">▼</span>
                </div>

                <div style="display:none; padding:10px 20px;">
                    Có, chúng tôi có kinh nghiệm thi công cho các dự án lớn như khách sạn, khu nghỉ dưỡng, khu đô thị.
                </div>
            </div>
        </div>

    </div>
</section>

<section style="padding:60px 0; background:#f5f5f5;">
    <div style="max-width:1200px; margin:auto;">
        <!-- Tiêu đề -->
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="font-size:36px;">
                Đối tác đồng hành
            </h2>
            <div style="width:80px; height:4px; background:#4CAF50; margin:15px auto;"></div>
            <p style="text-align: center;">Chúng tôi tập trung tối đa vào lợi ích mang đến cho khách hàng. Chính vì tinh thần làm việc này,
chúng tôi đã hợp tác và cung cấp vật liệu trang trí sân vườn cho các đối tác lớn trong lĩnh vực xây dựng.</p>
        </div>
</div>
</section>

<!-- icon mở chat -->
    <div id="fb-toggle" style="position:fixed;
    bottom:160px; /* nằm trên Zalo */
    right:20px;
    width:60px;
    height:60px;
    background:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(0,0,0,0.3);
    z-index:2000;" onclick="openFacebook()">
        <img style=" width:32px; height:32px;" src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg">
    </div>

    <div id="zalo-toggle" style="position:fixed;
    bottom:95px;   /* nằm trên chat */
    right:20px;
    width:60px;
    height:60px;
    background:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(0,0,0,0.3);
    z-index:2000;" onclick="openZalo()">
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Icon_of_Zalo.svg">
    </div>

    <div id="chat-toggle" onclick="toggleChat()">
    💬
    </div>

    <!-- chatbot -->

    <div id="chatbox">

    <div id="chat-header">
        Hỗ trợ khách hàng
        <span onclick="toggleChat()" style="float:right;cursor:pointer;">✖</span>
    </div>

    <div id="messages"></div>

    <div id="chat-input">
    <input id="msg" placeholder="Nhập tin nhắn...">
    <button onclick="sendMsg()">Gửi</button>
    </div>

</div>
<div id="register-toggle" 
     onclick="openRegister()"
     style="position: fixed;
            bottom: 230px;
            left: 30px;
            width: 100px;  /* Kích thước nút */
            height: 100px; 
            background: #ff4d4f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            z-index: 2000;
            /* Animation này sẽ chạy mãi mãi, không bị ngắt quãng */
            animation: attract-attention 1.5s infinite ease-in-out;">
    
    <span style="font-size: 15px; 
                 text-align: center;
                 line-height: 1.1;
                 display: block;
                 pointer-events: none; /* Giúp click xuyên qua chữ vào thẳng nút */">
        ĐĂNG<br>KÝ
    </span>
</div>

<!-- FOOTER -->
    <?php include 'footer.php'; ?>


<script src="chatbot/chat.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(){

    window.toggleChat = function() {
        const chatbox = document.getElementById("chatbox");
        const fb = document.getElementById("fb-toggle");
        const zalo = document.getElementById("zalo-toggle");

        if (chatbox.style.display === "flex") {
            chatbox.style.display = "none";
            fb.style.display = "flex";
            zalo.style.display = "flex";
        } else {
            chatbox.style.display = "flex";
            fb.style.display = "none";
            zalo.style.display = "none";
        }
    };

});
</script>
<script>
    function openFacebook(){
        window.open("https://www.facebook.com/anh.duy.nguyen.399989", "_blank");
    }
</script>
<script>
    function openZalo(){
        window.open("https://zalo.me/0813782636", "_blank");
    }
</script>
<script>
    function goToPage() {
        window.location.href = "sanpham/hocakoi.php";
    }
</script>
<script>
    window.addEventListener("scroll", function() {
        const header = document.querySelector(".header");
        
        if (window.scrollY > 80) {
            header.classList.add("fixed");
        } else {
            header.classList.remove("fixed");
        }
    });
</script>
<script>
let index = 0;

function moveSlide(direction) {
    const slider = document.getElementById("slider");
    const cardWidth = 300; // 280 + gap
    const total = slider.children.length;

    index += direction;

    if (index < 0) index = 0;
    if (index > total - 2) index = total - 2; // giới hạn

    slider.style.transform = `translateX(-${index * cardWidth}px)`;
}
</script>
<script>
function toggleFAQ(el) {
    let answer = el.parentElement.querySelector("div:nth-child(2)");
    let icon = el.querySelector("span");

    if (answer.style.display === "block") {
        answer.style.display = "none";
        icon.style.transform = "rotate(0deg)";
        el.style.color = "black";
    } else {
        answer.style.display = "block";
        icon.style.transform = "rotate(180deg)";
        el.style.color = "#4CAF50";
    }
}
</script>
<script>
function openRegister(){
    window.location.href = "dangky.php";
}
</script>

</body>
</html>