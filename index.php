<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Cảnh Quan Xanh</title>

<link rel="icon" href="images/logo.png">

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3-7-1.slim.js"></script>

<!-- ICON
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> -->

<style>
/* hover card */
.card:hover{
    transform: translateY(-8px);
    transition: 0.3s;
}

/* banner */
.banner img{
    max-height: 450px;
    object-fit: cover;
}

/* tiêu đề */
.section-title{
    font-weight: bold;
    margin-bottom: 20px;
}

/* feature */
.feature-box{
    border-radius: 15px;
    transition: 0.3s;
}
.feature-box:hover{
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* carousel card */
.carousel .card{
    border-radius: 15px;
    overflow: hidden;
}
</style>
</head>

<body>

<?php include 'header.php'; ?>

<!-- BANNER -->
<div class="banner" onclick="goToPage()">
<img src="images/banner.jpg" class="img-fluid w-100">
</div>

<!-- GIỚI THIỆU -->
<section class="py-5" style="background:url('images/nen1.jpg') center/cover;">
<div class="container">
<div class="row align-items-center">

<div class="col-md-6">
<h2 class="text-success section-title">Về công ty chúng tôi</h2>

<p><strong>Công ty TNHH Thương mại và Xây dựng Tiểu Cảnh Xanh</strong>
được thành lập bởi đội ngũ kiến trúc sư giàu kinh nghiệm...</p>

<p>Với phương châm “Tạo dựng cuộc sống hoàn mỹ”...</p>

<a href="about.php" class="btn btn-success rounded-pill px-4">Xem thêm</a>
</div>

<div class="col-md-6">
<img src="images/about.jpg" class="img-fluid rounded-4 shadow">
</div>

</div>
</div>
</section>

<!-- DỊCH VỤ -->
<section class="py-5 bg-light">
<div class="container text-center">

<h2 class="section-title">CÁC DÒNG SẢN PHẨM</h2>

<div class="row g-4">

<?php
$data = [
["1.png","Cảnh quan sân vườn"],
["2.png","Thi công hồ cá Koi"],
["3.png","Lu nước phong thủy"],
["4.png","Vật liệu sân vườn"],
["5.png","Chậu xi măng đá mài"],
["6.png","Đèn đá sân vườn"]
];

foreach($data as $d){
echo "
<div class='col-md-4'>
<div class='card shadow-sm border-0'>
<img src='images/$d[0]' class='card-img-top'>
<div class='card-body'>
<h5 class='fw-bold'>$d[1]</h5>
<a href='#' class='text-success text-decoration-none'>Xem chi tiết →</a>
</div>
</div>
</div>
";
}
?>

</div>
</div>
</section>

<!-- LÝ DO -->
<section class="py-5 text-center" style="background:url('images/nen1.jpg') center/cover;">
<div class="container">

<h2 class="section-title">Vì sao chọn chúng tôi?</h2>

<div class="row g-4">

<div class="col-md-3">
<div class="p-4 bg-white shadow-sm feature-box">
<i class="fa-solid fa-shield-halved fa-2x text-success mb-3"></i>
<h5>Uy tín lâu năm</h5>
<p>>15 năm kinh nghiệm</p>
</div>
</div>

<div class="col-md-3">
<div class="p-4 bg-white shadow-sm feature-box">
<i class="fa-solid fa-feather fa-2x text-success mb-3"></i>
<h5>Thi công đa dạng</h5>
<p>Nhiều hạng mục</p>
</div>
</div>

<div class="col-md-3">
<div class="p-4 bg-white shadow-sm feature-box">
<i class="fa-solid fa-building fa-2x text-success mb-3"></i>
<h5>Quy mô lớn</h5>
<p>Đội ngũ chuyên nghiệp</p>
</div>
</div>

<div class="col-md-3">
<div class="p-4 bg-white shadow-sm feature-box">
<i class="fa-solid fa-yin-yang fa-2x text-success mb-3"></i>
<h5>Phong thủy</h5>
<p>Thiết kế hài hòa</p>
</div>
</div>

</div>
</div>
</section>

<!-- DỰ ÁN -->
<section class="py-5 text-white" style="background:url('images/nen2.png') center/cover;">
<div class="container">

<div class="row align-items-center">

<div class="col-md-4">
<h2 class="fw-bold">Dự án tiêu biểu</h2>
<p>Tổng hợp các dự án nổi bật đã thực hiện...</p>
<a href="#" class="btn btn-success rounded-pill px-4">Xem thêm</a>
</div>

<div class="col-md-8">

<div id="carouselProject" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">

<div class="carousel-item active">
<div class="row g-3">

<div class="col-md-6">
<div class="card">
<img src="images/duan1.png">
<div class="card-body">
<h6>Thi công sân vườn Koi</h6>
<p class="text-muted">Không gian hài hòa</p>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card">
<img src="images/duan2.png">
<div class="card-body">
<h6>Hồ cá Koi công ty</h6>
<p class="text-muted">Phong thủy đẹp</p>
</div>
</div>
</div>

</div>
</div>

</div>

<button class="carousel-control-prev" data-bs-target="#carouselProject" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" data-bs-target="#carouselProject" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>

</div>

</div>
</div>
</div>
</section>

<!-- FAQ -->
<section class="py-5 bg-light">
<div class="container">

<div class="text-center mb-5">
<h2 class="section-title">Câu hỏi thường gặp</h2>
</div>

<div class="accordion" id="faq">

    <div class="accordion-item mb-2">
        <button class="accordion-button collapsed"
        data-bs-toggle="collapse" data-bs-target="#f1">
            Liên hệ bằng cách nào?
        </button>
        <div id="f1" class="accordion-collapse collapse">
            <div class="accordion-body">
                Hotline: 0977.540.175
            </div>
        </div>
    </div>

    <div class="accordion-item mb-2">
        <button class="accordion-button collapsed"
        data-bs-toggle="collapse" data-bs-target="#f2">
            Chi phí thế nào?
        </button>
        <div id="f2" class="accordion-collapse collapse">
            <div class="accordion-body">
                Tùy diện tích và vật liệu
            </div>
        </div>
    </div>

    <div class="accordion-item mb-2">
        <button class="accordion-button collapsed"
        data-bs-toggle="collapse" data-bs-target="#f3">
            Có bảo trì không?
        </button>
        <div id="f3" class="accordion-collapse collapse">
            <div class="accordion-body">
                Có, theo yêu cầu
            </div>
        </div>
    </div>

</div>
<a href="ycda.php"
class="btn btn-danger position-fixed top-50 start-0 translate-middle-y ms-3 shadow fw-bold d-flex align-items-center justify-content-center"
style="width:90px;height:90px;border-radius:50%;line-height:1.2; z-index:2000;">
    ĐĂNG<br>KÝ
</a>
</div>
</div>
</section>

 <!-- CHAT
<div id="chat-toggle"
class="position-fixed bottom-0 end-0 m-4 btn btn-success rounded-circle shadow d-flex align-items-center justify-content-center"
style="width:55px;height:55px;" 
onclick="toggleChat()">
💬
</div> -->

<?php include 'footer.php'; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
function goToPage(){
    window.location.href="sanpham/hocakoi.php";
}

// function toggleChat(){
//     let box = document.getElementById("chatbox");
//     box.style.display = (box.style.display === "block") ? "none" : "block";
// }
</script>

</body>
</html>