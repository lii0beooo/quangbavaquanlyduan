-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2026 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_duan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `maAdmin` int(11) NOT NULL,
  `hoTen` varchar(100) DEFAULT NULL,
  `taiKhoan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`maAdmin`, `hoTen`, `taiKhoan`) VALUES
(1, 'Vũ Văn Dũng', 'Admin'),
(2, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `maDichVu` int(11) NOT NULL,
  `tenDichVu` varchar(100) DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `maNV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doitac`
--

CREATE TABLE `doitac` (
  `maDoiTac` int(11) NOT NULL,
  `ngayHopTac` date DEFAULT NULL,
  `trangThaiHopTac` varchar(50) DEFAULT NULL,
  `maKH` int(11) DEFAULT NULL,
  `taiKhoan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `doitac`
--

INSERT INTO `doitac` (`maDoiTac`, `ngayHopTac`, `trangThaiHopTac`, `maKH`, `taiKhoan`) VALUES
(1, '2026-04-20', 'Đang hoạt động', 1, 'Đối Tác'),
(2, '2026-04-20', 'Đang hoạt động', 2, 'Đối Tác 3'),
(4, '2026-04-18', 'Đang hoạt động', 4, 'Đối Tác 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duan`
--

CREATE TABLE `duan` (
  `maDA` int(11) NOT NULL,
  `tenDA` varchar(100) DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `ngayBD` date DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `maNhaThau` int(11) DEFAULT NULL,
  `maNV` int(11) DEFAULT NULL,
  `maHopDong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `duan`
--

INSERT INTO `duan` (`maDA`, `tenDA`, `moTa`, `ngayBD`, `ngayKT`, `trangThai`, `maNhaThau`, `maNV`, `maHopDong`) VALUES
(9, 'ăn lồn', 'Dự án cải tạo và trang trí nội thất văn phòng đại diện tại Hải Phòng. Quy mô 200m2, phong cách hiện đại tối giản.', '2026-04-17', '2026-04-10', 'Đang chạy', 5, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duantieubieu`
--

CREATE TABLE `duantieubieu` (
  `maDuAnTieuBieu` int(11) NOT NULL,
  `maDA` int(11) DEFAULT NULL,
  `tenDA` varchar(100) DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `hinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangmuc`
--

CREATE TABLE `hangmuc` (
  `maHangMuc` int(11) NOT NULL,
  `tenHangMuc` varchar(100) DEFAULT NULL,
  `chiPhi` float DEFAULT NULL,
  `vatTu` varchar(100) DEFAULT NULL,
  `ngayBD` date DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `maKeHoach` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hangmuc`
--

INSERT INTO `hangmuc` (`maHangMuc`, `tenHangMuc`, `chiPhi`, `vatTu`, `ngayBD`, `ngayKT`, `trangThai`, `maKeHoach`) VALUES
(1, 'Đo đạc diện tích thực tế', 5000000, 'Máy laser, thước dây', '2026-04-17', '2026-04-18', 'Hoàn thành', 1),
(2, 'Lắp đặt hệ thống điện âm', 15000000, 'Dây điện Cadivi, ống ruột gà', '2026-04-21', '2026-04-23', 'Đang thi công', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhthicong`
--

CREATE TABLE `hinhanhthicong` (
  `maHinhAnh` int(11) NOT NULL,
  `tenHinh` varchar(100) DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `thoiGianTaiLen` date DEFAULT NULL,
  `maDA` int(11) DEFAULT NULL,
  `maHangMuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhthicong`
--

INSERT INTO `hinhanhthicong` (`maHinhAnh`, `tenHinh`, `moTa`, `thoiGianTaiLen`, `maDA`, `maHangMuc`) VALUES
(5, 'DA9_HM2_1776955941_69ea32258cf7d.png', '', '2026-04-23', 9, 2),
(6, 'DA9_HM2_1776965519_69ea578f74228.png', '', '2026-04-24', 9, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `maHopDong` int(11) NOT NULL,
  `tenHopDong` varchar(100) DEFAULT NULL,
  `ngayKy` date DEFAULT NULL,
  `giaTri` float DEFAULT NULL,
  `thoiHan` date DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `maDoiTac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`maHopDong`, `tenHopDong`, `ngayKy`, `giaTri`, `thoiHan`, `trangThai`, `maDoiTac`) VALUES
(2, 'ăn hại', '2026-04-24', 15000000, NULL, 'Đang soạn thảo', 1),
(3, 'ăn hại', '2026-04-24', 25000000, NULL, 'Đang soạn thảo', 4),
(4, 'con cặc', '2026-04-24', 3636360000, NULL, 'Đã ký kết', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachthicong`
--

CREATE TABLE `kehoachthicong` (
  `maKeHoach` int(11) NOT NULL,
  `tenKeHoach` varchar(100) DEFAULT NULL,
  `ngayBD` date DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `maDA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachthicong`
--

INSERT INTO `kehoachthicong` (`maKeHoach`, `tenKeHoach`, `ngayBD`, `ngayKT`, `trangThai`, `maDA`) VALUES
(1, 'Giai đoạn 1: Khảo sát mặt bằng', '2026-04-17', '2026-04-20', 'Hoàn thành', 9),
(2, 'Giai đoạn 2: Thi công phần thô', '2026-04-21', '2026-04-25', 'Đang thực hiện', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `tenKH` varchar(100) DEFAULT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `soDienThoai` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `daidien` varchar(100) DEFAULT NULL,
  `loaihinh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `diaChi`, `soDienThoai`, `email`, `daidien`, `loaihinh`) VALUES
(1, 'Tập đoàn Vingroup', 'Ngô Quyền - Hải Phòng', '032654979', 'ba@gmail.com', 'Đại diện: Nguyễn Anh Duy', 'Doanh Nghiệp'),
(2, 'Đào Văn Thái', 'Tiên Lãng - Hải Phòng', '034159625', 'thai@gmail.com', 'Khách hàng cá nhân', 'Cá nhân'),
(3, 'Mai Thị Lan', 'An Dương - Hải Phòng', '016781236', 'lan@gmail.com', 'Khách hàng cá nhân', 'Cá nhân'),
(4, 'Đỗ Văn Minh', 'An Lão - Hải Phòng', '035297453', 'minh@gmail.com\r\n', 'Khách hàng cá nhân', 'Cá nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvucthicong`
--

CREATE TABLE `khuvucthicong` (
  `maKhuVuc` int(11) NOT NULL,
  `tenKhuVuc` varchar(100) DEFAULT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `maDA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhathau`
--

CREATE TABLE `nhathau` (
  `maNhaThau` int(11) NOT NULL,
  `tenNhaThau` varchar(100) DEFAULT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhathau`
--

INSERT INTO `nhathau` (`maNhaThau`, `tenNhaThau`, `diaChi`, `email`, `sdt`) VALUES
(4, 'Tập đoàn Xây dựng Việt', 'Quận Hồng Bàng, Hải Phòng', '', '0999999999'),
(5, 'Nhà thầu Điện nước 24h', 'Huyện An Dương, Hải Phòng', '', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nv_qlda`
--

CREATE TABLE `nv_qlda` (
  `maNV` int(11) NOT NULL,
  `hoTen` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `soDienThoai` varchar(20) DEFAULT NULL,
  `taiKhoan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nv_qlda`
--

INSERT INTO `nv_qlda` (`maNV`, `hoTen`, `email`, `soDienThoai`, `taiKhoan`) VALUES
(1, 'Vũ Văn Kiên', 'kiencanhquanxanh@gmail.com', '0978255564', 'NV QLDA 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nv_ql_website`
--

CREATE TABLE `nv_ql_website` (
  `maNV` int(11) NOT NULL,
  `hoTen` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `soDienThoai` varchar(20) DEFAULT NULL,
  `taiKhoan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nv_ql_website`
--

INSERT INTO `nv_ql_website` (`maNV`, `hoTen`, `email`, `soDienThoai`, `taiKhoan`) VALUES
(1, 'Ngô Thị Hảo', 'Haocanhquanxanh@gmail.com', '0789662411', 'NVQL Website ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `maQuyen` int(11) NOT NULL,
  `tenQuyen` varchar(100) DEFAULT NULL,
  `moTa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`maQuyen`, `tenQuyen`, `moTa`) VALUES
(1, 'Admin', 'Tất cả tác vụ'),
(2, 'NV QLDA', 'Quản lý dự án'),
(3, 'NVQL Website', 'Quản lý Website\r\n'),
(4, 'Khách hàng', 'Xem và yêu cầu dự án\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taiKhoan` varchar(32) NOT NULL,
  `matKhau` varchar(100) DEFAULT NULL,
  `maQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taiKhoan`, `matKhau`, `maQuyen`) VALUES
('Admin', '123456', 1),
('NV QLDA 1', '123456', 2),
('NV QLDA 2', '123456', 2),
('NVQL Website ', '123456', 3),
('Đối Tác', '123456', 4),
('Đối Tác 1', '123456', 4),
('Đối Tác 2', '123456', 4),
('Đối Tác 3', '123456', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkebaocao`
--

CREATE TABLE `thongkebaocao` (
  `maBaoCao` int(11) NOT NULL,
  `tenBaoCao` varchar(100) DEFAULT NULL,
  `loaiBaoCao` varchar(50) DEFAULT NULL,
  `ngayTao` date DEFAULT NULL,
  `maDA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiendoda`
--

CREATE TABLE `tiendoda` (
  `maTienDo` int(11) NOT NULL,
  `ngayCapNhat` date DEFAULT NULL,
  `noiDungCapNhat` text DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `ghiChu` text DEFAULT NULL,
  `maDA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucauda`
--

CREATE TABLE `yeucauda` (
  `maYeuCau` int(11) NOT NULL,
  `noiDungYeuCau` text DEFAULT NULL,
  `ngayGui` date DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `diaDiemThiCong` varchar(255) DEFAULT NULL,
  `nganSachDuKien` float DEFAULT NULL,
  `maKH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`maAdmin`),
  ADD KEY `taiKhoan` (`taiKhoan`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`maDichVu`),
  ADD KEY `maNV` (`maNV`);

--
-- Chỉ mục cho bảng `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`maDoiTac`),
  ADD KEY `maKH` (`maKH`),
  ADD KEY `taiKhoan` (`taiKhoan`);

--
-- Chỉ mục cho bảng `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`maDA`);

--
-- Chỉ mục cho bảng `duantieubieu`
--
ALTER TABLE `duantieubieu`
  ADD PRIMARY KEY (`maDuAnTieuBieu`),
  ADD KEY `maDA` (`maDA`);

--
-- Chỉ mục cho bảng `hangmuc`
--
ALTER TABLE `hangmuc`
  ADD PRIMARY KEY (`maHangMuc`),
  ADD KEY `maKeHoach` (`maKeHoach`);

--
-- Chỉ mục cho bảng `hinhanhthicong`
--
ALTER TABLE `hinhanhthicong`
  ADD PRIMARY KEY (`maHinhAnh`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`maHopDong`),
  ADD KEY `fk_hopdong_doitac` (`maDoiTac`);

--
-- Chỉ mục cho bảng `kehoachthicong`
--
ALTER TABLE `kehoachthicong`
  ADD PRIMARY KEY (`maKeHoach`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `khuvucthicong`
--
ALTER TABLE `khuvucthicong`
  ADD PRIMARY KEY (`maKhuVuc`),
  ADD KEY `maDA` (`maDA`);

--
-- Chỉ mục cho bảng `nhathau`
--
ALTER TABLE `nhathau`
  ADD PRIMARY KEY (`maNhaThau`);

--
-- Chỉ mục cho bảng `nv_qlda`
--
ALTER TABLE `nv_qlda`
  ADD PRIMARY KEY (`maNV`),
  ADD KEY `taiKhoan` (`taiKhoan`);

--
-- Chỉ mục cho bảng `nv_ql_website`
--
ALTER TABLE `nv_ql_website`
  ADD PRIMARY KEY (`maNV`),
  ADD KEY `taiKhoan` (`taiKhoan`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`maQuyen`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taiKhoan`),
  ADD KEY `maQuyen` (`maQuyen`);

--
-- Chỉ mục cho bảng `thongkebaocao`
--
ALTER TABLE `thongkebaocao`
  ADD PRIMARY KEY (`maBaoCao`),
  ADD KEY `maDA` (`maDA`);

--
-- Chỉ mục cho bảng `tiendoda`
--
ALTER TABLE `tiendoda`
  ADD PRIMARY KEY (`maTienDo`),
  ADD KEY `maDA` (`maDA`);

--
-- Chỉ mục cho bảng `yeucauda`
--
ALTER TABLE `yeucauda`
  ADD PRIMARY KEY (`maYeuCau`),
  ADD KEY `maKH` (`maKH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `maAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `maDichVu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `doitac`
--
ALTER TABLE `doitac`
  MODIFY `maDoiTac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `duan`
--
ALTER TABLE `duan`
  MODIFY `maDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hangmuc`
--
ALTER TABLE `hangmuc`
  MODIFY `maHangMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hinhanhthicong`
--
ALTER TABLE `hinhanhthicong`
  MODIFY `maHinhAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `maHopDong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `kehoachthicong`
--
ALTER TABLE `kehoachthicong`
  MODIFY `maKeHoach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuvucthicong`
--
ALTER TABLE `khuvucthicong`
  MODIFY `maKhuVuc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhathau`
--
ALTER TABLE `nhathau`
  MODIFY `maNhaThau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nv_qlda`
--
ALTER TABLE `nv_qlda`
  MODIFY `maNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nv_ql_website`
--
ALTER TABLE `nv_ql_website`
  MODIFY `maNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `maQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thongkebaocao`
--
ALTER TABLE `thongkebaocao`
  MODIFY `maBaoCao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tiendoda`
--
ALTER TABLE `tiendoda`
  MODIFY `maTienDo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `yeucauda`
--
ALTER TABLE `yeucauda`
  MODIFY `maYeuCau` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`taiKhoan`) REFERENCES `taikhoan` (`taiKhoan`);

--
-- Các ràng buộc cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `dichvu_ibfk_1` FOREIGN KEY (`maNV`) REFERENCES `nv_ql_website` (`maNV`);

--
-- Các ràng buộc cho bảng `doitac`
--
ALTER TABLE `doitac`
  ADD CONSTRAINT `doitac_ibfk_2` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`),
  ADD CONSTRAINT `doitac_ibfk_3` FOREIGN KEY (`taiKhoan`) REFERENCES `taikhoan` (`taiKhoan`);

--
-- Các ràng buộc cho bảng `duantieubieu`
--
ALTER TABLE `duantieubieu`
  ADD CONSTRAINT `duantieubieu_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Các ràng buộc cho bảng `hangmuc`
--
ALTER TABLE `hangmuc`
  ADD CONSTRAINT `hangmuc_ibfk_1` FOREIGN KEY (`maKeHoach`) REFERENCES `kehoachthicong` (`maKeHoach`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `fk_hopdong_doitac` FOREIGN KEY (`maDoiTac`) REFERENCES `doitac` (`maDoiTac`);

--
-- Các ràng buộc cho bảng `kehoachthicong`
--
ALTER TABLE `kehoachthicong`
  ADD CONSTRAINT `kehoachthicong_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Các ràng buộc cho bảng `khuvucthicong`
--
ALTER TABLE `khuvucthicong`
  ADD CONSTRAINT `khuvucthicong_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Các ràng buộc cho bảng `nv_qlda`
--
ALTER TABLE `nv_qlda`
  ADD CONSTRAINT `nv_qlda_ibfk_1` FOREIGN KEY (`taiKhoan`) REFERENCES `taikhoan` (`taiKhoan`);

--
-- Các ràng buộc cho bảng `nv_ql_website`
--
ALTER TABLE `nv_ql_website`
  ADD CONSTRAINT `nv_ql_website_ibfk_1` FOREIGN KEY (`taiKhoan`) REFERENCES `taikhoan` (`taiKhoan`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`maQuyen`) REFERENCES `quyen` (`maQuyen`);

--
-- Các ràng buộc cho bảng `thongkebaocao`
--
ALTER TABLE `thongkebaocao`
  ADD CONSTRAINT `thongkebaocao_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Các ràng buộc cho bảng `tiendoda`
--
ALTER TABLE `tiendoda`
  ADD CONSTRAINT `tiendoda_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Các ràng buộc cho bảng `yeucauda`
--
ALTER TABLE `yeucauda`
  ADD CONSTRAINT `yeucauda_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
