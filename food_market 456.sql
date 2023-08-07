-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 07, 2023 lúc 07:13 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food_market`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(10) NOT NULL COMMENT 'mã bình luận',
  `noi_dung` varchar(255) NOT NULL COMMENT 'nội dung bình luận',
  `ma_hh` int(11) NOT NULL COMMENT 'mã hàng hoá được bình luận',
  `ma_kh` varchar(20) NOT NULL COMMENT 'mã người bình luận',
  `ngay_bl` date NOT NULL COMMENT 'thời gian bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`) VALUES
(15, 'good', 36, 'user', '2023-06-04'),
(16, 'ngon re', 36, 'user2', '2023-06-05'),
(22, 'okokoko', 28, 'admin', '2023-06-07'),
(25, '123', 38, 'admin', '2023-06-10'),
(26, '', 38, 'admin', '2023-06-10'),
(27, 'ooooo', 38, 'admin', '2023-06-10'),
(28, 'dvdvsdv', 38, 'admin', '2023-07-23'),
(29, 'dvsvdvsvd', 38, 'admin', '2023-07-23'),
(30, ' vdjvvkme32323', 38, 'admin', '2023-07-23'),
(31, 'dvdsvd', 1, 'admin', '2023-07-23'),
(32, 'vesv', 71, 'admin', '2023-07-23'),
(33, 'scasvds', 41, 'admin', '2023-07-23'),
(34, 'ko ngon', 45, 'admin', '2023-07-24'),
(35, 'good', 1, 'admin', '2023-07-31'),
(36, '213', 4, 'admin', '2023-08-01'),
(37, 'asd', 4, 'admin', '2023-08-01'),
(38, '213', 4, 'admin', '2023-08-01'),
(39, '123453vvvbhkbjsdvnovsdo', 4, 'admin', '2023-08-01'),
(40, '123', 4, 'admin', '2023-08-01'),
(41, 'hgfdsa', 4, 'admin', '2023-08-01'),
(42, 'gh', 4, 'admin', '2023-08-01'),
(43, 'ad', 1, 'admin', '2023-08-01'),
(44, 'aadc', 9, 'admin', '2023-08-01'),
(46, '222', 4, 'admin', '2023-08-03'),
(47, 'Nó có một hương vị hài hòa, với một sự pha trộn hoàn hảo.', 64, 'admin', '2023-08-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_ctdh` int(11) NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `ma_cthh` int(11) NOT NULL,
  `so_luong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ma_ctdh`, `ma_dh`, `ma_cthh`, `so_luong`) VALUES
(1, 1, 64, 2),
(2, 1, 26, 3),
(3, 2, 69, 5),
(4, 2, 29, 4),
(5, 3, 32, 1),
(6, 3, 62, 2),
(7, 3, 26, 2),
(8, 3, 35, 1),
(9, 1, 43, 1),
(10, 1, 134, 2),
(11, 1, 68, 4),
(12, 1, 67, 1),
(36, 21, 20, 1),
(45, 26, 110, 2),
(46, 26, 52, 3),
(47, 27, 130, 1),
(48, 27, 20, 1),
(49, 28, 98, 1),
(50, 28, 103, 1),
(51, 29, 53, 1),
(52, 29, 110, 2),
(53, 30, 32, 2),
(54, 30, 28, 1),
(55, 31, 127, 1),
(56, 31, 132, 1),
(57, 32, 20, 4),
(58, 33, 25, 1),
(59, 33, 60, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hang_hoa`
--

CREATE TABLE `chi_tiet_hang_hoa` (
  `ma_cthh` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `don_vi` varchar(20) NOT NULL,
  `don_gia` double(10,2) NOT NULL,
  `giam_gia` double(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hang_hoa`
--

INSERT INTO `chi_tiet_hang_hoa` (`ma_cthh`, `ma_hh`, `don_vi`, `don_gia`, `giam_gia`, `so_luong`) VALUES
(20, 1, '1 Kg', 140000.00, 10000.00, 80),
(21, 2, '1 Kg', 99000.00, 5000.00, 50),
(22, 3, '1 Kg', 110000.00, 2000.00, 50),
(23, 4, '1 Kg', 160000.00, 12000.00, 50),
(24, 5, '1 Kg', 125000.00, 0.00, 50),
(25, 6, '1 Kg', 75000.00, 3000.00, 44),
(26, 7, '1 Kg', 105000.00, 1000.00, 55),
(27, 8, '1 Kg', 355000.00, 19000.00, 45),
(28, 9, '1 Kg', 515000.00, 29000.00, 54),
(29, 10, '1 Kg', 489000.00, 22000.00, 40),
(30, 11, '1 Kg', 348000.00, 0.00, 45),
(31, 12, '1 Kg', 132000.00, 11000.00, 20),
(32, 13, '1 Kg', 102000.00, 3000.00, 28),
(33, 14, '1 Kg', 113000.00, 8000.00, 20),
(34, 15, '1 Kg', 720000.00, 22000.00, 30),
(35, 16, '1 Kg', 320000.00, 34000.00, 45),
(36, 17, '1 Kg', 111000.00, 1000.00, 45),
(37, 18, '1 Kg', 99000.00, 3000.00, 35),
(38, 19, '1 Kg', 289000.00, 14000.00, 25),
(39, 20, '1 Kg', 159000.00, 8000.00, 70),
(40, 21, '1 Kg', 309000.00, 10000.00, 45),
(41, 22, '1 Kg', 169000.00, 6000.00, 50),
(42, 23, '1 Kg', 143000.00, 5000.00, 40),
(43, 24, '1 Kg', 78000.00, 2000.00, 60),
(44, 25, '1 Kg', 79000.00, 1000.00, 30),
(45, 26, '1 Kg', 2600000.00, 90000.00, 25),
(46, 27, '1 Kg', 999000.00, 11000.00, 55),
(47, 28, '1 Kg', 899000.00, 12000.00, 65),
(48, 29, '1 Kg', 789000.00, 11000.00, 25),
(49, 30, '1 Kg', 543000.00, 5000.00, 40),
(50, 31, '1 Kg', 1099000.00, 21000.00, 45),
(51, 32, '1 Kg', 669000.00, 4000.00, 20),
(52, 33, '1 Kg', 234000.00, 11000.00, 27),
(53, 34, '1 Kg', 320000.00, 10000.00, 19),
(54, 35, '1 Kg', 211000.00, 21000.00, 30),
(55, 36, '1 Kg', 14000.00, 1000.00, 45),
(56, 37, '1 Kg', 12000.00, 1000.00, 45),
(57, 38, '1 Kg', 9000.00, 1000.00, 35),
(58, 39, '1 Kg', 8000.00, 1500.00, 25),
(59, 40, '1 Kg', 8000.00, 1000.00, 70),
(60, 41, '1 Kg', 29000.00, 2000.00, 44),
(61, 42, '1 Kg', 31000.00, 2000.00, 50),
(62, 43, '1 Kg', 39000.00, 3000.00, 40),
(63, 44, '1 Kg', 48000.00, 5000.00, 60),
(64, 45, '1 Kg', 16000.00, 1000.00, 30),
(65, 46, '1 Kg', 34000.00, 2000.00, 25),
(66, 47, '1 Kg', 62000.00, 8000.00, 55),
(67, 48, '1 hộp', 18000.00, 0.00, 65),
(68, 48, '3 hộp', 49500.00, 2000.00, 25),
(69, 48, 'Thùng 24 hộp', 355000.00, 10000.00, 40),
(70, 49, '4 hộp', 30100.00, 0.00, 45),
(71, 49, 'Thùng 48 hộp', 340000.00, 10000.00, 20),
(72, 50, '1 hộp', 8000.00, 0.00, 30),
(73, 50, '4 hộp', 27600.00, 0.00, 20),
(74, 50, 'Thùng 36 hộp', 327000.00, 14000.00, 30),
(75, 51, '1 hộp', 10000.00, 0.00, 45),
(76, 51, '6 hộp', 5700.00, 0.00, 45),
(77, 51, 'Thùng 12 hộp', 110000.00, 5000.00, 35),
(78, 52, '1 vỉ', 25000.00, 0.00, 25),
(79, 52, '4 vỉ', 92000.00, 2000.00, 70),
(80, 52, 'Thùng 6 vỉ', 134000.00, 8000.00, 45),
(81, 53, '1 vỉ', 23000.00, 0.00, 50),
(82, 53, '4 vỉ', 87000.00, 2000.00, 40),
(83, 54, '100g', 9200.00, 0.00, 0),
(84, 54, '400g', 33000.00, 500.00, 0),
(85, 54, '1Kg', 70500.00, 3000.00, 0),
(86, 54, '2Kg', 123000.00, 6000.00, 0),
(87, 54, '5Kg', 310000.00, 11000.00, 2),
(88, 55, 'gói 30g', 5000.00, 0.00, 25),
(89, 55, 'chai 150g', 13000.00, 500.00, 40),
(90, 55, 'chai 350g', 28500.00, 1000.00, 45),
(91, 56, 'Gói 80g', 19000.00, 0.00, 20),
(92, 56, 'Hũ 240g', 61000.00, 2000.00, 30),
(93, 57, 'Túi 200g', 60000.00, 3000.00, 20),
(94, 58, 'Chai 200g', 25000.00, 0.00, 30),
(95, 59, 'Tuýp 35g', 36500.00, 2000.00, 45),
(96, 59, 'Tuýp 48g', 4100.00, 3000.00, 45),
(97, 60, 'Gói 50g', 8700.00, 500.00, 35),
(98, 61, 'Gói 170g', 18500.00, 0.00, 24),
(99, 61, 'Gói 400g', 38000.00, 0.00, 70),
(100, 61, 'Gói 900g', 86000.00, 3000.00, 45),
(101, 61, 'Gói 1.2kg', 109000.00, 5000.00, 50),
(102, 61, 'Gói 1.8kg', 125000.00, 7000.00, 40),
(103, 62, 'Chai 400ml', 37000.00, 0.00, 59),
(104, 62, 'Chai 1 Lít', 70000.00, 0.00, 50),
(105, 62, 'Chai 2 Lít', 136000.00, 8000.00, 25),
(106, 62, 'Chai 5 Lít', 320000.00, 11000.00, 55),
(107, 63, 'Chai 500ml', 35000.00, 1000.00, 65),
(108, 63, 'Chai 900ml', 61000.00, 2000.00, 25),
(109, 64, 'Lon 330ml', 13000.00, 0.00, 40),
(110, 64, 'Thùng 24 lon', 365000.00, 12000.00, 41),
(111, 65, 'Hộp 18 gói', 54000.00, 0.00, 50),
(112, 65, 'Hộp 21 gói', 61000.00, 2000.00, 40),
(113, 66, '1 lon 320ml', 9200.00, 0.00, 60),
(114, 66, '6 lon 320ml', 46000.00, 2000.00, 30),
(115, 66, 'Thùng 24 lon', 190000.00, 9000.00, 25),
(116, 67, '1 lon 320ml', 9000.00, 0.00, 55),
(117, 67, '6 lon 320ml', 45000.00, 2000.00, 65),
(118, 67, 'Thùng 24 lon', 180000.00, 9000.00, 25),
(119, 68, '1 lon 320ml', 8500.00, 0.00, 40),
(120, 68, '6 lon 320ml', 40000.00, 2000.00, 45),
(121, 68, 'Thùng 24 lon', 170000.00, 9000.00, 55),
(122, 68, 'Chai 327ml', 8000.00, 0.00, 40),
(123, 68, 'Chai 1 lít', 22500.00, 0.00, 30),
(124, 69, '1 hộp 330ml', 15000.00, 0.00, 20),
(125, 69, '6 hộp 330ml', 82000.00, 2000.00, 25),
(126, 69, 'Thùng 12 hộp', 155000.00, 6000.00, 15),
(127, 70, '1 lon 320ml', 9000.00, 0.00, 64),
(128, 70, '6 lon 320ml', 49000.00, 0.00, 25),
(129, 70, 'Thùng 24 lon', 230000.00, 9000.00, 40),
(130, 71, 'Chai 1.5 lít', 64000.00, 5000.00, 34),
(131, 71, 'Thùng 12 chai', 289000.00, 10000.00, 50),
(132, 72, '1 chai 297ml', 11000.00, 0.00, 39),
(133, 72, '6 chai 297ml', 63000.00, 0.00, 60),
(134, 72, 'Thùng 24 chai', 245000.00, 6000.00, 30),
(138, 122, '1kg', 20000.00, 2000.00, 20000),
(139, 122, '2kg', 30000.00, 3000.00, 3),
(140, 122, '3kg', 100000.00, 5000.00, 321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `ma_danh_gia` int(11) NOT NULL,
  `noi_dung_danh_gia` varchar(100) NOT NULL,
  `xep_hang` int(2) NOT NULL,
  `ngay_danh_gia` date NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`ma_danh_gia`, `noi_dung_danh_gia`, `xep_hang`, `ngay_danh_gia`, `ma_hh`, `ma_kh`) VALUES
(1, 'good good!', 5, '2023-08-01', 64, 'admin'),
(35, '1', 1, '2023-07-05', 45, 'admin'),
(36, '2', 2, '2023-08-05', 7, 'admin'),
(37, '3', 3, '2023-08-06', 24, 'admin'),
(38, '4', 4, '2023-07-26', 72, 'admin'),
(39, '5', 5, '2023-06-16', 48, 'admin'),
(40, 'Hic officiis minus u', 1, '2023-06-12', 45, 'admin'),
(41, 'Est porro expedita ', 2, '2023-05-09', 7, 'admin'),
(42, 'Excepteur qui corpor', 3, '2023-05-19', 24, 'admin'),
(43, 'Fugiat reiciendis f', 4, '2023-03-17', 72, 'admin'),
(44, 'Proident deserunt n', 5, '2023-04-11', 48, 'admin'),
(45, '2131', 3, '2023-05-22', 2, 'admin'),
(46, 'jgj', 4, '2023-06-04', 4, 'admin'),
(47, 's', 4, '2023-06-23', 1, 'admin'),
(48, 's', 5, '2023-03-30', 71, 'admin'),
(49, 'oooo', 5, '2023-07-02', 1, 'cuongbip'),
(50, 'ssssss', 4, '2023-08-06', 1, 'user'),
(51, 'ui ui ui', 4, '2023-08-07', 6, 'admin'),
(52, 'qwertyu', 3, '2023-08-07', 41, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ngay_dat` date NOT NULL,
  `ma_trang_thai` int(11) NOT NULL,
  `ten_nguoi_nhan` varchar(50) NOT NULL,
  `sdt_nguoi_nhan` varchar(11) NOT NULL,
  `dia_chi_nhan` varchar(200) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ma_van_chuyen` int(11) NOT NULL,
  `ghi_chu` varchar(200) NOT NULL,
  `danh_gia_don_hang` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `ma_kh`, `ngay_dat`, `ma_trang_thai`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nhan`, `tong_tien`, `ma_van_chuyen`, `ghi_chu`, `danh_gia_don_hang`) VALUES
(1, 'admin', '2023-06-29', 3, 'Nguyễn Văn A', '0971111111', 'P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội', 302000, 5, 'mau den', 1),
(2, 'admin', '2023-06-29', 4, 'Đỗ VĂn Long', '0999999999', 'Thanh Dương, Thành Đô, Tứ Xuyên, Trung Quốc', 1232000, 3, '12345678910jqka', 0),
(3, 'user', '2023-07-01', 5, 'Nguyễn Khắc Cường', '0366666666', 'Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam.', 2321000, 5, 'Việt Nam', 0),
(21, 'admin', '2023-08-03', 2, 'Trần Văn An', '0999999888', '789 Maple Lane, Los Angeles, USA', 159000, 1, 'Giao hàng nhanh nhất có thể, cảm ơn!', 0),
(26, 'user', '2023-08-05', 8, 'mungloli', '0999999999', 'Tòa nhà FPT Polytechnic, phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội', 1404000, 1, 'Giao hàng nhanh nhất có thể, cảm ơn!', 0),
(27, 'cuongbip', '2023-01-12', 1, 'Occaecat voluptas sa', '0300000072', 'Nguyễn Khắc Cường', 225000, 2, 'hanoi, vietnam', 0),
(28, 'cuongbip', '2023-02-12', 1, 'Occaecat voluptas sa', '0300000072', 'hanoi.vietnam', 91500, 2, 'giao nhanh nhe', 0),
(29, 'cuongbip', '2023-03-12', 1, 'Occaecat voluptas sa', '0300000072', 'Nguyễn Khắc Cường', 1040000, 4, 'nhau de', 0),
(30, 'user2', '2023-04-12', 1, 'hien', '0978888888', 'Impedit facilis ess', 684000, 2, 'Est provident conse', 0),
(31, 'user2', '2023-05-12', 1, 'Do illum aperiam ex', '0999999988', 'Ut est et laborum te', 49000, 1, 'Nulla reiciendis rep', 0),
(32, 'user2', '2023-06-12', 3, 'Sit magnam ut ut qu', '0999999998', 'Porro ullamco ab atq', 545000, 5, 'Vel voluptas exercit', 0),
(33, 'admin', '2023-07-03', 8, 'Est proident volupt', '0999999998', 'Suscipit qui et adip', 123000, 4, 'Nihil sed quis ex se', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi_van_chuyen`
--

CREATE TABLE `don_vi_van_chuyen` (
  `ma_van_chuyen` int(11) NOT NULL,
  `ten_van_chuyen` varchar(100) NOT NULL,
  `gia_van_chuyen` int(10) NOT NULL,
  `hoat_dong_vc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi_van_chuyen`
--

INSERT INTO `don_vi_van_chuyen` (`ma_van_chuyen`, `ten_van_chuyen`, `gia_van_chuyen`, `hoat_dong_vc`) VALUES
(1, 'Giao hàng nhanh', 29000, 1),
(2, 'Giao hàng tiết kiệm', 36000, 1),
(3, 'Viettel Post', 31000, 1),
(4, 'VNPost', 24000, 1),
(5, 'J&T Express', 25000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gh` int(11) NOT NULL,
  `ma_kh` varchar(20) DEFAULT NULL,
  `ma_cthh` int(11) NOT NULL,
  `so_luong` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL COMMENT 'mã hàng hoá',
  `ten_hh` varchar(50) NOT NULL COMMENT 'tên hàng hoá',
  `ngay_nhap` date DEFAULT NULL COMMENT 'ngày nhập hàng',
  `mo_ta` text NOT NULL COMMENT 'mô tả hàng hoá',
  `dac_biet` tinyint(1) NOT NULL COMMENT 'tràng thái đặc biệt',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượt xem',
  `ma_loai` int(11) DEFAULT NULL COMMENT 'mã loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(1, 'Thịt ba rọi heo', '2023-06-03', 'Thịt ba chỉ (hay còn gọi là ba rọi) là phần thịt heo được cắt ra từ bụng, không có xương và nhiều mỡ. Sỡ dĩ người ta thường gọi thịt ba chỉ là bởi khi cắt ngang sẽ thấy được phần thịt và mỡ xen kẽ 3 lớp với nhau theo thứ tự lớp thịt, mỡ rồi lại đến lớp thịt', 0, 110, 1),
(2, 'Móng giò', '2023-06-03', 'Phần móng giò trắng nõn được sơ chế và pha lóc khéo léo, mang trọn hương vị của phần da dẻo mềm mềm, lớp gân giòn và thịt ngọt thơm ngon. Móng giò rất giàu Protit, sau khi đưa vào cơ thể sẽ có tác dụng hiệu quả trong việc cải thiện chức năng sinh lý của các cơ quan nội tạng, làm cho các tế bào da giữ được nước nên đỡ bị khô nhăn, khiến cho da bóng và căng', 1, 35, 1),
(3, 'Thịt heo xay', '2023-06-03', 'Loại thịt rất quen thuộc với mỗi bà nội trợ nhờ độ linh hoạt cao trong chế biến, lại nhanh thấm gia vị và có khả năng kết hợp hài hòa với hầu hết các loại rau củ, cho các đầu bếp tại gia thỏa sức biến tấu. Sản phẩm được kết hợp từ thịt nạc và mỡ tươi sạch tạo sự hài hòa cho hương vị và sự an tâm tuyệt đối về chất lượng cho các món ăn', 0, 2, 1),
(4, 'Sườn heo', '2023-06-03', 'Sườn hồng tươi với sụn giòn rụm cùng thịt mềm căng mọng được tuyển chọn kỹ lưỡng từ tảng sườn ngon nhất. Là nguyên liệ hảo hạng cho món ngon đúng điệu. Sườn heo là bộ phận chứa nhiều các chất dinh dưỡng như protein, vitamin B12, kẽm, sắt và chất béo không bão hòa như Omega-3 giúp cung cấp cho cơ thể loạt các vi chất cần thiết', 1, 47, 1),
(5, 'Bắp giò heo', '2023-06-03', 'Chân giò heo tiêu chuẩn về an toàn toàn thực phẩm. Giò heo săn chắc, thịt có sự kết hợp với gân mỡ nên ăn béo ngậy và thơm, thích hợp để hầm canh, nấu các món nước như hủ tiếu, bánh canh. Do chân hoạt động nhiều nên phần thịt sẽ mỏng, mềm, ngọt và có nhiều gân hơn vì vậy mà khi chế biến các món hầm, giả cầy, luộc,... sẽ mềm, thấm gia vị và ngon hơn', 1, 62, 1),
(6, 'Đuôi heo', '2023-06-03', 'Đuôi heo bao gồm cả phần xương đuôi. Phần đuôi gồm chủ yếu là thịt và mỡ, được bao quanh bởi da. Xương và các mẩu sụn nhỏ ở các đầu khớp nối tạo độ giòn khi thưởng thức. Trong thực đơn gia đình thì đây là nguyên liệu lý tưởng cho các món hầm, ninh nhừ để đem lại những món ăn thơm ngon, hương vị đậm đà nhưng không hề béo', 0, 2, 1),
(7, 'Nạc vai heo', '2023-06-03', 'Nạc vai heo là phần thịt đặc trưng được lấy từ đùi trước (vai) của heo. Nạc vai còn bao gồm một phần đầu của thăn ngoại heo (đầu mềm). Chất lượng thịt heo đạt chất lượng cao nhất, thịt heo đều được Cơ quan thú y nhà nước kiểm tra, đóng dấu trước khi đưa ra thị trường tiêu thụ', 1, 0, 1),
(8, 'Bắp bò Úc', '2023-06-03', 'Bắp bò Úc luôn là được xếp trong danh sách dòng sản phẩm best seller ở mọi cửa hàng trong hệ thống. Với thực đơn chế biến đa dạng như bò kho, bò hầm, bò sốt vang, bò luộc, bò xào, bò nướng, bò hấp, sản phẩm đáp ứng nhu cầu ẩm thực phong phú của nhiều gia đình Việt. Hãy đến với Food Market ngay hôm nay để được mua hàng với mức giá tốt nhất', 1, 1, 1),
(9, 'Ba chỉ bò nhập khẩu', '2023-06-03', 'Ba chỉ bò là phần thịt được lấy từ phần bụng của con bò, là phần thịt với những dải thịt nạc và thịt mỡ xen kẽ nhau tạo nên độ mềm, ngậy, ngọt nhưng hoàn toàn không ngấy. Bò nhập khẩu rất dễ chế biến. Những món ăn nấu từ thịt ba chỉ bò cũng rất đơn giản như xào, lẩu, cuốn cải nướng, cuốn nấm kim châm nướng, nhúng giấm hay làm salat', 1, 37, 1),
(10, 'Thăn ngoại bò Úc', '2023-06-03', 'Là sự xen kẽ hoàn hảo giữa lớp thịt và lớp mỡ trên miếng thịt bò tạo nên những hình vân cẩm thạch đẹp mắt.Thịt bò mềm, mọng nước, hợp để làm steak hoặc nhúng lẩu. Thăn ngoại bò vốn nổi tiếng là loại thịt bò cao cấp nhất trên thế giới. Các đường vân mỡ – nạc đan xen đều đặn tựa như đường vân cẩm thạch', 0, 4, 1),
(11, 'Gầu bò Úc', '2023-06-03', 'Gầu bò Úc hay còn gọi là nạm bò, ức bò (Brisket) là sản phẩm nhập khẩu trực tiếp từ các thương hiệu thịt bò hàng đầu của Úc với đầy đủ tem nhãn của nhà sản xuất và dấu kiểm định của Chi Cục Thú Y. Quá trình sơ chế, đóng khay, cấp đông Bò Úc vệ sinh sạch sẽ đảm bảo chất lượng, an toàn cho sức khỏe người tiêu dùng. Gầu Bò Úc được pha cắt bằng máy bào công nghiệp, bào lẩu theo tiêu chuẩn độ dày 1,5mm cho món lẩu.', 1, 15, 1),
(12, 'Gà đồi cao lãnh', '2023-06-03', 'Thịt gà đồi thường có cấu trúc cơ bắp chắc chắn và mềm mại, với một lượng mỡ ít hơn so với các loại gà nuôi công nghiệp. Do được nuôi trong môi trường tự nhiên, gà đồi thường có cơ bắp phát triển tự nhiên hơn và thường được cho ăn các nguồn thức ăn tự nhiên như cỏ, hạt, sâu, giun và côn trùng. Thịt gà đồi là một nguồn cung cấp protein chất lượng cao, vitamin B6, vitamin B12, selen và các khoáng chất khác. Nó là một lựa chọn ăn uống lành mạnh và giàu dinh dưỡng', 0, 1, 1),
(13, 'Cánh gà', '2023-06-03', 'Cánh gà là một phần thịt được lấy từ cánh của con gà. Đây là một phần thịt thường được ưa chuộng và sử dụng phổ biến trong ẩm thực nhiều quốc gia trên thế giới. Cánh gà có cấu trúc xương và thịt cân đối. Phần thịt trên cánh gà thường là mềm mại và có một lượng mỡ nhất định, tạo ra hương vị thơm ngon và độ mềm phù hợ', 1, 5, 1),
(14, 'Đùi gà', '2023-06-03', 'Đùi gà là một phần thịt được lấy từ phần đùi hoặc chân sau của con gà. Đây là một phần thịt gà phổ biến và được sử dụng rộng rãi trong ẩm thực. Khi chế biến, đùi gà có thể được nướng, quay, rán hoặc hấp theo nhiều phong cách khác nhau. Đùi gà thường được tẩm gia vị hoặc sốt để tăng cường hương vị và độ ngon. Đùi gà cũng thích hợp để làm món chính hoặc món ăn nhẹ', 1, 2, 1),
(15, 'Sườn cừu mông cổ', '2023-06-03', 'Sườn cừu Mông Cổ là một sản phẩm thịt từ phần sườn của Cừu Mông Cổ, một loại gia súc được nuôi chủ yếu ở Mông Cổ. Đây là một phần thịt ngon, giàu dinh dưỡng và có một hương vị đặc trưng. Sườn cừu Mông Cổ thường có cấu trúc xương dài và thịt mềm, có nhiều mỡ ở giữa, giúp tạo ra một hương vị giàu mỡ và thơm ngon. Phần thịt được cắt từ sườn cừu thường có lớp mỡ mỏng bao quanh, làm tăng hương vị và giữ cho thịt mềm và không khô', 1, 41, 1),
(16, 'Cá Mập Cambodia', '2023-06-03', 'Cá Mập Cambodia là một sản phẩm độc đáo được chế biến từ cá mập tươi ngon, nổi tiếng từ vùng biển Cambodia. Sản phẩm này mang đến cho bạn trải nghiệm ẩm thực độc đáo với hương vị đậm đà và thịt cá mập mềm mịn. Với sự kết hợp hoàn hảo giữa phương pháp chế biến truyền thống và công nghệ hiện đại, \"Cá Mập Cambodia\" là một món ăn tuyệt vời để khám phá hương vị biển cả và nền ẩm thực', 1, 151, 2),
(17, 'Cá Chim Trắng Lai Châu', '2023-06-11', 'Cá chim có hai loại phổ biển là cá chim trắng và cá chim đen, tuy nhiên cá chim trắng được ưa chuộng nhất bởi cá chim trắng thịt ngon và thơm hơn rất nhiều so với cá chim đen.', 0, 0, 2),
(18, 'Cá Saba Lào Cai', '2023-06-11', 'Cá sa ba tẩm tiêu xanh được nhiều người Việt ưa chuộng bởi độ dinh dưỡng cao và tốt cho sức khỏe. Cá sa ba tẩm tiêu xanh nhập khẩu nguyên liệu trực tiếp từ Nhật về Việt Nam và sau đó bắt đầu sơ chế đóng gói, dán tem, hàng chất lượng tươi ngon.', 0, 0, 2),
(19, 'Cá Hồi Nguyên Con Cao Lãnh', '2023-06-11', 'Cá hồi Nauy là loại thực phẩm giàu dinh dưỡng cho sức khỏe của chúng ta. Chúng được chế biến thành nhiều món ăn ngon, đặc biệt là các món ăn tươi sống như sushi hay sashimi rất được ưa chuộng ở khắp nơi.', 1, 0, 2),
(20, 'Cá Trích Phi Lê', '2023-06-11', 'Cá Trích đặc sản nổi tiếng ở vùng biển Bình Thuận, cá có đặc điểm màu xanh nhẹ, thân dẹp và xương nhỏ. Cá trích Phile được sơ chế từ những con cá trích tươi sống, loại bỏ xương chỉ lấy phần thịt ở 2 bên thân cá.', 0, 0, 2),
(21, 'Cá Tuyết Alaska', '2023-06-11', 'Là khúc gần cuối đuôi được xẻ làm đôi ( như hình). Khúc này có thịt nhiều thích hợp làm nhiều món như: nấu canh chua, nấu cháo, phi lê thịt cá ra chiên hoặc áp chảo. Ngoài ra, khách có thể để nguyên khúc đuôi kho tiêu rất hấp dẫn.', 1, 0, 2),
(22, 'Cá Dìa Bông Làm Sạch', '2023-06-11', 'Cá Dìa Bông là hải sản nổi tiếng ở Nha Trang, Cam Ranh được nhiều khách yêu thích. Cá chỉ có theo mùa nên được bán chạy khi có hàng tại Đảo, khách Sài Gòn rất thích ăn cá biển bơi thịt tươi ngon, ngọt và siêu béo.', 1, 6, 2),
(23, 'Cá Dứa 1 Nắng', '2023-06-11', 'Cá dứa 1 nắng là một món ăn rất quen thuộc với người Việt Nam. Vì từ lâu, loại khô cá này đã có mặt trong mọi bữa ăn của người dân ở khắp các vùng miền. Khô cá dứa được chế biến bằng cách sấy khô cá dứa và trộn các gia vị như đường, muối, tỏi, hành, ớt và dầu ăn để tạo nên hương vị đặc trưng.', 1, 0, 2),
(24, 'Cá Chỉ Vàng 2 Nắng', '2023-06-11', 'Cá chỉ vàng ( hay còn gọi là cá ngân chỉ ) cá sống tập trung nhiều ở vùng biển ven Phan Thiết - Bình Thuận vì vậy nên khu vực biển này khá nổi tiếng với khô cá chỉ vàng 2 nắng, và là vùng có khô ngon nhất hiện nay.', 1, 0, 2),
(25, 'Cá Chép Sông Đà', '2023-06-11', 'Cá chép có thể chế biến thành nhiều món ăn hấp dẫn cả thị giác lẫn khứu giác và vị giác. Các món ăn chế biến ngon nhất với nguyên liệu cá chép giòn đó là cá chép giòn nướng muối ớt và cá chép giòn om dưa chua, nướng muối ớt, bạn chỉ cần làm thịt cá chép giòn như hướng dẫn ở trên, sau đó giã một chén muối ớt tùy theo khẩu vị của bạn rồi ướp cá với chút dầu ăn nữa và nướng. Mách nhỏ các bạn ở món này là với phần muối nếu cho thêm ít đường vào sẽ dịu vị cá nướng và ngon hơn.', 1, 8, 2),
(26, 'Cua King Crab', '2023-06-11', 'Cua Hoàng Đế Alaska Cái hay còn gọi là King Crab được nhiều khách hàng ưa chuộng không chỉ tại Việt Nam mà còn rất nhiều nơi trên thế giới vì chất lượng thịt cua được đánh giá là chất lượng ngon ngọt dai mà không có loại hải sản nào có thể vượt mặt được. Vậy cua King Crab cái tại Đảo Hải sản có những đặc điểm gì? Nếu mua nhầm cua kém chất lượng thì Đảo Hải Sản có chính sách gì để bảo vệ khách hàng cùng xem qua nội dung sản phẩm này nhé!', 1, 0, 3),
(27, 'Tôm Hùm Alaska', '2023-06-11', 'So với các loại tôm hùm nội ngoại địa khác thì tôm hùm Alaska baby size nhỏ đang được Đảo Hải Sản nhập khẩu về, đây là dòng sản phẩm được ưa chuộng nhất hiện nay tại Tp Hồ Chí Minh và các tỉnh lân cận. Nếu chúng ta so sánh giá trong tầm 2.000.000đ ngoài những sản phẩm tôm hùm Việt Nam ra thì khách hàng còn có sự lựa chọn tôm hùm alaska', 1, 1, 3),
(28, 'Bào Ngư Hàn Quốc', '2023-06-11', 'Bào ngư là một lọai hải sản nổi tiếng vì độ thơm ngon bổ dưỡng, và nguồn dinh dưỡng quý giá mà chúng mang lại. Vậy đặc điểm của bào ngư, công dụng và cũng như giá thành hiện nay của bào ngư như thế nào, hãy cùng Đảo tìm hiểm qua bài viết sau.', 1, 0, 3),
(29, 'Hàu Nhật Bản', '2023-06-11', 'Hàu sữa Nhật Bản, hay còn gọi là hàu nước ngọt, là một loại hàu được nuôi trong môi trường nước ngọt. Nó được coi là một trong những loại hàu ngon nhất thế giới với vị ngọt tự nhiên, mềm mại và tươi mát. Hàu Nhật là một thực phẩm tuyệt vời cho sức khỏe của chúng ta', 1, 1, 3),
(30, 'Sò Đỏ Canada', '2023-06-11', 'Sò đỏ sống trong môi trường sống tự nhiên có tuổi thọ đến vài thập kỷ. Nó được chôn vùi trong cát và lấy lên bằng máy đào thủy lực ngoài đại dương.Sau khi tách vỏ, sò được trải qua quá trình sơ chế và cấp đông nhanh để giữ được chất lượng tuyệt đối cùng hương vị vốn có', 0, 30, 3),
(31, 'Tôm Hùm Úc', '2023-06-11', 'Tôm hùm Tây Úc thu hút ánh nhìn đầu tiên bởi màu sắc thật đẹp, dinh dưỡng cao và đặc biệt thịt tôm rất là thơm, săn chắc và ngọt lắm. Tôm hùm Tây Úc nổi tiếng trên thế giới. Tôm hùm Tây Úc có hình dáng tựa như tôm hùm xanh Nha Trang, chỉ khác về màu sắc đỏ sậm rất bắt mắt. Ngoài ra tôm hùm Tây Úc nhiều khách dễ nhầm lẫn là tôm hùm Nam Úc vì cả 2 chỉ khác nhau hóa văn trên thân tôm.', 1, 0, 3),
(32, 'Cua Tuyết', '2023-06-11', 'Cua tuyết được nhập sống trực tiếp từ vùng biển nước sâu và cực lạnh khu Bắc Cực, chính vì điều kiện s.ống khắc nghiệt đã tạo nên hương vị đặc trưng của cua tuyết. Được du nhập về Việt Nam thời gian gần đây nhưng đã gây ra \'\'cơn sốt\'\' trong giới sành ăn bởi chất lượng cực đỉnh. Thịt cua chắc từng khối và rất ngọt thịt', 0, 5, 3),
(33, 'Mực Ống 1 Nắng', '2023-06-11', 'Mực ống 1 nắng là hải sản bán chạy tại shop vào các dịp lễ , tết , tất niên hay những buổi tiệc lớn. Theo ý kiến của nhiều khách hàng , mực 1 nắng thích hợp làm quà tặng , quà biếu cho người thân , đồng nghiệp và bạn bè. Mực ống 1 nắng được làm từ mực ống câu, là loại mực ngon nhất. Những con mực từ biển xanh qua bàn tay con người lại trở nên đặc biệt và thấm đẫm cái tình biển xanh. Mực ống khi câu được ngư dân xẻ và đem đi rửa sạch để giảm bớt nước biển trong con mực, sau đó sẽ đem ra phơi nắng. Phải chọn nơi nhiều ánh nắng, nắng to để mực được ngon hơn', 1, 2, 3),
(34, 'Mực Lá', '2023-06-11', 'Mực lá bán chạy vào những dịp lễ , cuối tuần , tất niên...khách mua biếu tặng rất nhiều vì hải sản không những ăn ngon mà còn giàu dinh dưỡng , mang nhiều sức khỏe tốt cho mọi gia đình. Mực lá nhiều nhà dân hay xẻ và phơi qua 1 nắng , 2 nắng hay làm khô mực , mực tẩm ướp đều ngon và hấp dẫn. Ngoài ra mực lá làm nhiều món nướng , hấp hành gừng , xào rau củ hay rim me...Chấm kèm tương ớt sẽ ngon hơn . Mực lá thích hợp cho nhiều buổi tiệc liên hoan công ty, sinh nhật hay bạn bè gặp mặt cuối tuần tụ họp . Ngồi lai rai nhấm nhấp và uống chung với bia càng tuyệt vời', 0, 2, 3),
(35, 'Bạch tuộc tươi', '2023-06-11', 'Bạch tuộc là động vật thân mềm, thịt dày, có vị ngọt mặn tự nhiên của biển và xúc tu giòn dai nên được rất nhiều người yêu thích. Thịt bạch tuộc tươi có giá trị dinh dưỡng cao, nhiều loại khoáng chất như phốt pho, canxi, sắt, đồng, kẽm, iốt, thịt bạch tuộc chứa ít chất béo, itamin thiết yếu như A, B1, B2, C,... giúp bổ máu và tăng cường hệ miễn dịch. Trong thịt bạch tuộc chứa dồi dào canxi, kali, phốt pho, vitamin và một số axit béo omega-3 tốt cho tim và giúp xương chắc khỏe', 1, 0, 3),
(36, 'Bắp Cải Trái Tim', '2023-06-11', 'Bắp cải trái tim có thể được sử dụng trong nhiều món ăn khác nhau. Nó có thể được ăn sống trong các món salad, hoặc được nấu chín trong các món canh, xào, hấp và trộn. Với hình dáng độc đáo của mình, bắp cải trái tim thường được sử dụng để trang trí đĩa ăn và tạo điểm nhấn hấp dẫn cho bữa ăn.', 1, 0, 4),
(37, 'Bí ngô cô tiên', '2023-06-11', 'Bí ngô cô tiên là một loại quả bí ngô có hình dáng độc đáo và thu hút sự chú ý. Nó được biết đến với tên khoa học là Cucurbita pepo var. styriaca. Quả bí ngô cô tiên có hình tròn, bề mặt mịn và màu da cam sáng hoặc vàng. Ngoài ra, bí ngô cô tiên cũng có giá trị dinh dưỡng. Nó chứa nhiều chất xơ, vitamin A, vitamin C và khoáng chất như kali, magiê và sắt. Bí ngô cô tiên có vị ngọt và hơi hạt, thích hợp để nấu chín, nướng, xào hoặc chế biến thành các món ăn như súp bí ngô, bánh bí ngô, hay nước ép bí ngô.', 1, 0, 4),
(38, 'Cà rốt Mộc Châu', '2023-06-11', 'Đặc điểm nổi bật của cà rốt Mộc Châu là nó có hương vị ngọt tự nhiên và giữ được độ giòn sau khi nấu chín. Quả cà rốt này chứa nhiều chất xơ, vitamin A, vitamin C và khoáng chất như kali và sắt, mang lại nhiều lợi ích cho sức khỏe. Cà rốt Mộc Châu thường được sử dụng trong nhiều món ăn như xào, hấp, trộn salad, nấu súp hoặc chế biến thành nước ép cà rốt. Ngoài ra, nó còn được sử dụng trong công thức làm bánh và kem, tạo ra màu sắc và hương vị thú vị.', 1, 31, 4),
(39, 'Cải Chíp', '2023-06-11', 'Cải Chíp có hình dạng và kích thước nhỏ gọn, thường có chiều cao khoảng 20-30 cm. Lá của nó có dạng rễ, hình thù hơi giống chiếc chìa khóa, có thể ăn được. Lá có mùi thơm đặc trưng và vị ngọt nhẹ. Rau Cải Chíp là một nguồn cung cấp chất xơ, vitamin C, vitamin K và các chất chống oxy hóa. Nó cũng cung cấp một số khoáng chất như kali, canxi và sắt. Rau này có hàm lượng calo thấp, không chứa cholesterol và có chứa chất chống vi khuẩn tự nhiên.', 0, 30, 4),
(40, 'Cải Bó Xôi', '2023-06-11', 'Cải Bó Xôi là một nguồn cung cấp chất xơ, vitamin C, vitamin K và các chất chống oxy hóa. Nó cũng cung cấp một số khoáng chất như kali, canxi và sắt. Cải này có hàm lượng calo thấp, không chứa cholesterol và có chứa chất chống vi khuẩn tự nhiên. Cải Bó Xôi thường được sử dụng trong nhiều món ăn như xào, hấp, trộn salad, canh và nấu súp. Với lá xanh dày và cấu trúc độc đáo, nó tạo thêm sự ngon miệng và màu sắc hấp dẫn cho các món ăn.', 1, 0, 4),
(41, 'Vải Bắc Giang', '2023-06-11', 'Vải Bắc Giang là một loại trái cây đặc sản của tỉnh Bắc Giang, Việt Nam. Loại vải này có tên khoa học là Litchi chinensis và còn được gọi là vải thiều. Vải Bắc Giang có vỏ ngoài màu đỏ tươi, bóng và có những đường nổi lồi nhỏ. Vải Bắc Giang là một loại trái cây ngọt ngào, thơm ngon và giàu dinh dưỡng. Với màu sắc đẹp mắt và vị ngọt tự nhiên, nó là một sản phẩm trái cây được ưa chuộng và thường được coi là một biểu tượng của vùng đất Bắc Giang.', 1, 35, 5),
(42, 'Cam sành', '2023-06-11', 'Cam sành là một nguồn cung cấp tuyệt vời của vitamin C và chất chống oxy hóa. Nó cũng chứa chất xơ, vitamin A, kali và các khoáng chất khác có lợi cho sức khỏe. Việc ăn cam sành có thể giúp tăng cường hệ miễn dịch, cung cấp năng lượng và tốt cho da và hệ tiêu hóa. Cam sành thường được ăn tươi, trực tiếp sau khi bóc vỏ. Nó cũng được sử dụng để làm nước ép cam, sinh tố, mứt và các món tráng miệng khác. Cam sành là một loại trái cây mùa hè phổ biến và được ưa chuộng vì hương vị ngon lành và lợi ích dinh dưỡng.', 0, 0, 5),
(43, 'Chôm chôm', '2023-06-11', 'Chôm chôm là một nguồn cung cấp vitamin C, vitamin B, kali và chất xơ. Nó cũng chứa các chất chống oxy hóa và có tác dụng tăng cường hệ miễn dịch, tốt cho tim mạch và giúp duy trì sức khỏe tốt. Chôm chôm thường được ăn tươi, trực tiếp sau khi bóc vỏ. Quả này cũng thường được sử dụng trong các món tráng miệng, nước ép, mứt, và được dùng để làm nguyên liệu trong các món ăn truyền thống và hiện đại.', 1, 0, 5),
(44, 'Bơ sáp', '2023-06-11', 'Bơ sáp có hương vị béo ngọt và kem, tạo cảm giác mịn màng trong miệng. Nó có hàm lượng dầu cao và là nguồn cung cấp chất béo lành mạnh, vitamin E, kali và chất chống oxy hóa. Bơ sáp thường được sử dụng trong nhiều món ăn, từ mỡ bơ sáp trên bánh mì, bơ sáp xay để làm sốt, mousse bơ sáp, kem bơ sáp và nhiều món ăn khác. Nó cũng là một thành phần chính trong món guacamole - một món truyền thống của ẩm thực Mexico.', 1, 0, 5),
(45, 'Chuối tiêu', '2023-06-11', 'Chuối tiêu có vỏ màu vàng sáng, dễ bóc và mềm hơn so với những loại chuối khác. Thịt chuối tiêu có màu trắng sữa, mềm mịn và có vị ngọt tự nhiên đặc trưng. Chuối tiêu là nguồn cung cấp vitamin C, kali và chất xơ. Nó cũng chứa một số vitamin B và các khoáng chất khác có lợi cho sức khỏe. Chuối tiêu giúp tăng cường hệ miễn dịch, cung cấp năng lượng và có tác dụng bảo vệ da và hệ tiêu hóa.', 0, 2, 5),
(46, 'Dưa lưới xanh', '2023-06-11', 'Dưa lưới xanh màu trắng sữa, giòn và mềm mịn. Nó có hương vị ngọt tự nhiên và sảng khoái. Dưa lưới xanh thường có nhiều nước, tạo cảm giác mát lạnh khi ăn. Dưa lưới xanh là một nguồn cung cấp vitamin C, chất chống oxy hóa và chất xơ. Nó cũng chứa các khoáng chất như kali và magiê. Dưa lưới xanh có lợi cho hệ tiêu hóa, tăng cường hệ miễn dịch và giúp duy trì sức khỏe tổng thể.', 1, 0, 5),
(47, 'Táo Envy Mỹ', '2023-06-11', 'áo Envy Mỹ có vị ngọt độc đáo, vừa chua vừa ngọt, mang lại sự cân bằng hoàn hảo của hương vị. Nó có một hương thơm đặc trưng và một cấu trúc giòn tuyệt vời. Táo Envy Mỹ là một nguồn cung cấp tốt của vitamin C, chất chống oxy hóa và chất xơ. Nó cũng chứa các chất dinh dưỡng quan trọng khác như kali và vitamin A. Táo Envy giúp tăng cường hệ miễn dịch, cung cấp năng lượng và có lợi cho sức khỏe tổng thể.', 0, 0, 5),
(48, 'Sữa Đậu Đen - Óc Chó Hanh Nhân', '2023-06-12', 'Sản phẩm sữa đậu được làm từ 3 loại đậu vô cùng giàu dinh dưỡng: đậu đen, óc chó và hạnh nhân, sữa đậu Sahmyook mang đến cho bạn và cả gia đình nguồn dinh dưỡng dồi dào. Sữa đậu đen óc chó hạnh nhân Sahmyook hộp 950ml đóng hộp tiện dùng, bổ sung dinh dưỡng cho cơ thể.', 0, 5, 6),
(49, 'Sữa Tươi Tiệt Trùng Có Đường Vinamilk', '2023-06-12', 'Được chế biến từ nguồn sữa tươi 100% chứa nhiều dưỡng chất như vitamin A, D3, canxi,... tốt cho xương và hệ miễn dịch. Sữa tươi Vinamilk là thương hiệu được tin dùng hàng đầu với chất lượng tuyệt vời. Được chế biến từ nguồn sữa tươi 100% chứa nhiều dưỡng chất như vitamin A, D3, canxi,... tốt cho xương và hệ miễn dịch, sữa tươi Vinamilk là thương hiệu được tin dùng hàng đầu với chất lượng tuyệt vời. Sữa tươi có đường Vinamilk 100% Sữa Tươi thơm ngon dễ uống.', 1, 28, 6),
(50, 'Sữa Milo Lúa Mạch', '2023-06-12', 'Sản phẩm sữa socola thơm ngon, giàu canxi và protein giúp cho cơ thể phát triển. Đặc biệt, thương hiệu sữa ca cao Milo nổi tiếng rất được các bé yêu thích và tin dùng. Lốc 4 hộp thức uống lúa mạch Milo Active Go 180ml thơm ngon, đầy dinh dưỡng, vị ngon kích thích vị giác. Sản phẩm thức uống lúa mạch giúp cung cấp dinh dưỡng cân bằng từ sữa và bột 3 loại ngũ cốc hoàn hảo: yến mạch, gạo lức, lúa mì. Sữa lúa mạch Milo giúp cung cấp cho bé năng lượng hoạt động cả ngày. 2 lốc sữa Milo lúa mạch ngũ cốc tiện dùng, thơm ngon, bổ sung nhiều dinh dưỡng cho bé.', 1, 0, 6),
(51, 'Sữa Chua Nếp Cẩm Mộc Châu', '2023-06-12', 'Sữa Chua  Nếp cẩm Mộc Bắc Milk được lên men tự nhiên, là sự kết hợp giữa sữa và gạo nếp cẩm với công thức truyền thống lâu đời không chỉ mang đến cho bạn một hương vị hấp dẫn và khó quên, mà còn cung cấp rất nhiều chất dinh dưỡng cho cơ thể năng lượng, chất đạm, hydrat cacbon,… giúp tăng cường hệ tiêu hóa và hệ miễn dịch cho cả gia đình.', 0, 1, 6),
(52, 'Sữa Vinamilk Susu Táo Chuối', '2023-06-12', 'Vị ngọt béo, chua chua thơm ngon tuyệt vời. Bổ sung vitamin A giúp bé mắt sáng tinh anh.Chất xơ hòa tan (Prebiotic) hỗ trợ hệ tiêu hóa để bé luôn khỏe mạnh và năng động mỗi ngày. Sữa chua uống SuSu với vị ngọt béo, chua chua thơm ngon tuyệt vời. Sữa chua uống giúp bổ sung vitamin A giúp bé mắt sáng tinh anh, chất xơ hòa tan (Prebiotic) hỗ trợ hệ tiêu hóa để bé luôn khỏe mạnh và năng động mỗi ngày. Lốc 6 chai sữa chua uống dâu SuSu 80ml đóng lốc tiện dùng, tiết kiệm.', 1, 25, 6),
(53, 'Sữa Chua ít đường Vinamilk', '2023-06-12', 'Được sản xuất từ các nguyên liệu cao cấp, đảm bảo việc tạo ra sản phẩm có chất lượng cao, an toàn cho người sử dụng. Sản phẩm giúp tăng cường hệ vi sinh trong đường ruột, giúp hoạt động tiêu hóa được tốt hơn, tăng cường sức đề kháng và phòng ngừa mắc các bệnh cảm cúm thông thường. Sữa chua Vinamilk chứa nhiều canxi, vitamin, khoáng chất ở dạng dễ hấp thu, kích thích vị giác, tăng cường sức khỏe hệ tiêu hóa, miễn dịch. Lốc 4 hộp sữa chua ít đường Vinamilk 100g là loại sữa chua có hương vị thơm ngon tinh khiết, ngọt dịu và giàu dưỡng chất, thích hợp cho mọi người.', 1, 0, 6),
(54, 'Bột ngọt Ajinomoto', '2023-06-12', 'Được sản xuất bằng phương pháp lên men tự nhiên từ nguyên liệu thiên nhiên như mật mía đường và tinh bột khoai mì. Bột ngọt hạt lớn Ajinomoto 545g là một gia vị được sử dụng rộng rãi trong chế biến món ăn ở gia đình, quán ăn, nhà hàng và trong công nghiệp chế biến thực phẩm, giúp món ăn hấp dẫn hơn.', 1, 123, 7),
(55, 'Dầu hào Maggi', '2023-06-12', 'Dầu hào Maggi có thể sử dụng trong nhiều món ăn khác nhau, bao gồm mì xào, thịt nướng, salad, xôi, và nhiều món ngon khác. Nó là một loại gia vị đa năng và được ưa chuộng trong ẩm thực nhiều quốc gia. Dầu hào Maggi mang đến sự cân bằng vị mặn, ngọt và chua, giúp làm nổi bật hương vị và tăng cường trải nghiệm ẩm thực. Nó là một lựa chọn phổ biến trong bếp và được sử dụng để gia vị các món ăn hàng ngày.', 1, 8, 7),
(56, 'Sốt kho hoàn hảo', '2023-06-12', 'Sốt kho hoàn hảo là một loại sốt gia vị đậm đà và cân bằng, được sử dụng trong ẩm thực Việt Nam để gia vị và tạo hương vị cho các món ăn kho truyền thống. Với màu sắc và hương vị đặc trưng, sốt kho hoàn hảo là một lựa chọn phổ biến để tăng cường hương vị và độ ngon của các món ăn', 1, 1, 7),
(57, 'Sốt Bơ Cay', '2023-06-12', 'Sốt Chế Biến YOChef độc quyền Đảo Hải Sản, sốt chế biến hoàn chỉnh để chế biến nhanh chóng, tiện lợi chuẩn vị nhà hàng. Sản phẩm kết hợp đa dạng với các loại hải sản khác nhau từ tôm, cua, các loại ốc...Các loại xốt được Các Đầu Bếp chuyên nghiệp Đảo Hải Sản điều chỉnh nguyên liệu cũng như hương vị cực kì gần gũi, giúp khách hàng chế biến một món ăn đậm đà ngon chuẩn vị Nhà Hàng.', 1, 3, 7),
(58, 'Sốt Tiêu Đen', '2023-06-12', 'Sốt tiêu đen ngon đúng điệu là phải có vị thơm nồng, cay nhẹ trong miệng làm giảm đi vị tanh của hải sản, tăng vị ngon và kích thích vị giác khi ăn. Hãy tham khảo nhanh một vài hải sản chế biến với sốt tiêu đen nhé.', 0, 0, 7),
(59, 'Mù Tạt (わさび)', '2023-06-12', 'Muốn giảm bớt vị tanh của hải sản sống chỉ cần chấm với wasabi thơm nồng nàn sẽ át vị tanh - tăng vị ngon của hải sản lên gấp nhiều lần. Đặc biệt khi dùng với món ăn sống như: cồi sò điệp sushi, cá ngừ sushi, cá cờ kiếm sushi hoặc hàu sống... sẽ rất là tuyệt nhé. Wasabi tuýp dạng sệt rất tiện lợi cho các cuộc picnic ngoài trời, vô cùng gọn nhẹ mang theo bên mình. Nếu sử dụng không hết có thể đậy kín và bảo quản trong ngăn mát tủ lạnh nhé.', 1, 30, 7),
(60, 'Lẩu thái Aji-Quick', '2023-06-12', 'Là loại gia vị nêm sẵn đến từ thương hiệu Aji-Quick quen thuộc trong mỗi gia đình Việt Nam. Gia vị nêm sẵn nấu lẩu Thái Aji-Quick gói 55g là sự kết hợp hài hòa của tất cả các loại gia vị cần thiết dành cho lẩu thái chua cay đậm vì như ở nhà hàng ngay tại nhà vào bất cứ khi nào mà bạn muốn.', 0, 0, 7),
(61, 'Hạt nêm Knorr', '2023-06-12', 'Hạt nêm Knorr là thương hiệu hạt nêm nổi tiếng toàn cầu, hơn 1.7 tỷ người dùng. Hạt nêm thịt thăn, xương ống, tủy Knorr gói 170g làm từ nước cốt thịt thăn, xương ống và tủy cho vị ngon đậm đà, thơm lừng, hấp dẫn, món ăn chuẩn vị và kích thích vị giác hơn. Nước cốt thịt thăn xương ống, tủy cho món ăn thơm ngon đậm đà như nước dùng thịt thật sự, đảm bảo cung cấp các giá trị dinh dưỡng thiết yếu như: năng lượng, chất đạm, carbohydrate, chất béo, chất xơ,...', 0, 0, 7),
(62, 'Dầu đậu nành', '2023-06-12', 'Dầu đậu nành nguyên chất Simply chai 1 lít chứa tới 80% axit béo chưa bão hoà cùng lượng lớn chất chống oxy hoá giúp làm giảm lượng cholesterol xấu trong máu và cho bạn một trái tim khoẻ mạnh. Dầu ăn Simply là nhãn hiệu dầu ăn duy nhất được Hội Tim Mạch Học Việt Nam khuyên dùng. Dầu đậu nành nguyên chất Simply sử dụng nguyên liệu chọn lọc, không chứa chất bảo quản, chất tạo màu hay cholesterol, hoàn toàn thân thiện cho sức khỏe.', 0, 10, 7),
(63, 'Nước mắm Nam Ngư', '2023-06-12', 'Nước mắm Nam Ngư đem đến cho người tiêu dùng Việt Nam những giọt nước mắm thơm ngon, sự lựa chọn hàng đầu của người Việt. Nước mắm Nam Ngư 10 độ đạm chai 500ml với dây chuyền khép kín với thành phần cá cơm tươi ngon tạo nên hương vị thơm ngon, đậm đà, màu sắc hấp dẫn. Nhắc đến thương hiệu nước mắm được nhiều người tiêu dùng Việt sử dụng nhất, chúng ta không thể không nhắc đến cái tên Nam Ngư. Với chất lượng sản phẩm tốt, cùng quy trình chế biến và tuyển chọn nguyên liệu kỹ càng, cho ra những sản phẩm nước mắm tuyệt hảo đến tay người tiêu dùng', 0, 0, 7),
(64, 'Bia Hà Nội', '2023-06-12', 'Với một hợp chất chất lượng cao, bia Hà Nội mang đến trải nghiệm uống mượt mà, mềm mại và dễ uống. Nó có một hương vị hài hòa, với một sự pha trộn hoàn hảo giữa vị đắng nhẹ và vị ngọt tự nhiên, tạo cảm giác sảng khoái và thỏa mãn. Bia Hà Nội thường được uống lạnh và là một lựa chọn phổ biến trong các cuộc gặp gỡ bạn bè, tiệc tùng hoặc thưởng thức trong những ngày nóng. Nó cũng thường được kết hợp với các món ăn truyền thống và món ăn vặt như bánh mỳ, hải sản, thịt nướng và nhiều món khác.', 1, 14, 8),
(65, 'Cà phê G7 - 3 In 1', '2023-06-12', 'Cà phê G7 3 in 1 được chiết xuất từ những phần tinh túy nhất có trong từng hạt cà phê, trên công nghệ hàng đầu và bí quyết không thể sao chép để cho ra đời sản phẩm cà phê hòa tan thượng hạng, với hương vị khác biệt, đậm đà, hương thơm độc đáo quyến rũ mà không một sản phẩm cà phê hòa tan nào khác đạt được. Trong suốt 12 năm liên tục cà phê G7 được người tiêu dùng bình chọn là hàng Việt Nam chất lượng cao.', 0, 3, 8),
(66, 'Fanta Cam', '2023-06-12', 'Từ thương hiệu nước ngọt có gas nổi tiếng toàn cầu với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.  Nước ngọt bổ sung năng lượng làm việc mỗi ngày. Cam kết sản phẩm chính hãng, chất lượng và an toàn', 0, 0, 8),
(67, 'Coca-Cola', '2023-06-12', 'Từ thương hiệu nước ngọt có gas nổi tiếng toàn cầu với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.  Nước ngọt bổ sung năng lượng làm việc mỗi ngày. Cam kết sản phẩm chính hãng, chất lượng và an toàn', 1, 4, 8),
(68, 'Nước Cam Ép Teppi', '2023-06-12', 'Chiết xuất từ những quả cam mọng nước cùng với những tép cam tươi hấp dẫn tự nhiên. Và được sản xuất theo công nghệ hiện đại, không chất độc hại không ảnh hưởng đến sức khỏe người tiêu dùng. Nước ép cam Teppy nguyên tép chứa nhiều vitamin C hỗ trợ cung cấp năng lượng cho cơ thể.', 0, 1, 8),
(69, 'Nước Dừa Cocoxim Sen', '2023-06-12', 'Sản phẩm được làm từ 100% nước dừa nguyên chất tại \'Thủ phủ dừa\' Bến Tre, sẽ là thức uống đồng hành cùng bạn mỗi ngày. Chỉ với một ly nước dừa Cocoxim mỗi ngày cơ thể bạn sẽ có sự thay đổi rõ rệt: làn da căng mịn hơn, cơ thể thon gọn và tràn đầy năng lượng hơn.', 1, 1, 8),
(70, 'Nước Tăng Lực Sting', '2023-06-12', 'Sản phẩm nước tăng lực với mùi vị thơm ngon, sảng khoái, bổ sung hồng sâm chất lượng. Sting giúp cơ thể bù đắp nước, bổ sung năng lượng, vitamin C và E, giúp xua tan cơn khát và cảm giác mệt mỏi cùng dâu cho nhẹ nhàng và dễ chịu. Cam kết chính hãng, chất lượng và an toàn.', 1, 5, 8),
(71, 'Nước gạo OKF No Sugar', '2023-06-12', 'Nước gạo OKF No Sugar là một lựa chọn tốt cho những người muốn hạn chế tiêu thụ đường hoặc theo chế độ ăn ít đường. Nó là một nguồn cung cấp năng lượng và chứa nhiều chất xơ và vitamin B. Nước gạo OKF No Sugar không chỉ giúp giải khát mà còn mang lại lợi ích cho sức khỏe. Nước gạo OKF No Sugar thích hợp cho mọi lứa tuổi và có thể uống ngay từ chai mà không cần thêm đường. Nó là một sự lựa chọn tuyệt vời cho một loại nước giải khát tự nhiên, không có chất bảo quản hay hương liệu nhân tạo.', 0, 101, 8),
(72, 'Nước trái cây Nutriboots Cam', '2023-06-12', 'Sự kết hợp hoàn hảo từ sữa và nước trái cây vị cam. Sữa trái cây Nutri Boost hương cam chai 297ml giúp bù đắp nước, bổ sung năng lượng, vitamin B3, B6, E, C rất có lợi cho cơ thể,xua tan cơn khát và cảm giác mệt mỏi. Sản phẩm sữa trái cây chất lượng từ thương hiệu Nutriboost', 0, 5, 8),
(122, 'gaga', '2023-07-27', 'Veniam quaerat sit', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_hang_hoa`
--

CREATE TABLE `hinh_hang_hoa` (
  `ma_hinh` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ten_hinh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_hang_hoa`
--

INSERT INTO `hinh_hang_hoa` (`ma_hinh`, `ma_hh`, `ten_hinh`) VALUES
(1, 1, 'thit_ba-roi-heo.png'),
(2, 2, 'thit_mong-gio.png'),
(3, 3, 'thit_heo-xay.png'),
(4, 4, 'thit_suon-heo.png'),
(5, 5, 'thit_bap-gio-heo.png'),
(6, 6, 'thit_duoi-heo.png'),
(7, 7, 'thit_vai-heo.png'),
(8, 8, 'thit_bap-bo-uc.png'),
(9, 9, 'thit_ba-chi-bo.png'),
(10, 10, 'thit_than-ngoai-bo-uc.png'),
(11, 11, 'thit_gau-bo-uc.png'),
(12, 12, 'thit_ga-doi.png'),
(13, 13, 'thit_canh-ga.png'),
(14, 14, 'thit_dui-ga.png'),
(15, 15, 'thit_suon-cuu.png'),
(16, 16, 'slide-ca-tuoi-removebg-preview.png'),
(17, 17, 'ca_chim-trang.png'),
(18, 18, 'ca_ba-sa.png'),
(19, 19, 'ca_hoi-nguyen-con.png'),
(20, 20, 'ca_trich-phi-le.png'),
(21, 21, 'ca_tuyet-cat-khuc.png'),
(22, 22, 'ca_dia-bong.png'),
(23, 23, 'ca_dua.png'),
(24, 24, 'ca_chi-vang.png'),
(25, 25, 'ca_chep.png'),
(26, 26, 'haisan_cua-hoang-de.png'),
(27, 27, 'haisan_tom_alaska.png'),
(28, 28, 'haisan_bao-ngu.png'),
(29, 29, 'haisan_hau.png'),
(30, 30, 'haisan_so-do.png'),
(31, 31, 'haisan_tom-hum-uc.png'),
(32, 32, 'haisan_cua-tuyet.png'),
(33, 33, 'haisan_muc-ong-1-nang.png'),
(34, 34, 'haisan_muc-la.png'),
(35, 35, 'haisan_bach-tuoc.png'),
(36, 36, 'rau_bap-cai.png'),
(37, 37, 'rau_bi.png'),
(38, 38, 'rau_ca-rot.png'),
(39, 39, 'rau_cai-chip.png'),
(40, 40, 'rau_cai-bo-xoi.png'),
(41, 41, 'hoaqua_vai.png'),
(42, 42, 'hoaqua_cam-sanh.png'),
(43, 43, 'hoaqua_chom-chom.png'),
(44, 44, 'hoaqua_bo-sap.png'),
(45, 45, 'hoaqua_chuoi.png'),
(46, 46, 'hoaqua_dua-luoi.png'),
(47, 47, 'hoaqua_tao-my.png'),
(48, 48, 'sua_dau-den.png'),
(49, 49, 'sua_tiet-trung.png'),
(50, 50, 'sua_milo.png'),
(51, 51, 'sua_chua-moc-chau.png'),
(52, 52, 'sua_su-su.png'),
(53, 53, 'sua_chu-it-duong-vinamilk.webp'),
(54, 54, 'giavi_bot-ngot.png'),
(55, 55, 'giavi_dau-hao.png'),
(56, 56, 'giavi_sot-kho.png'),
(57, 57, 'giavi_sot-bo-cay.png'),
(58, 58, 'giavi_sot-tieu-den.png'),
(59, 59, 'giavi_mu-tat.png'),
(60, 60, 'giavi_lau-thai.png'),
(61, 61, 'giavi_hat-nem.png'),
(62, 62, 'giavi_dau-an.png'),
(63, 63, 'giavi_nuoc-mam.png'),
(64, 64, 'douong_bia-ha-noi.png'),
(65, 65, 'douong_coffee.png'),
(66, 66, 'douong_panta-cam.png'),
(67, 67, 'douong_coca-cola.png'),
(68, 68, 'douong_teppy-cam.png'),
(69, 69, 'douong_dua-sen.png'),
(70, 70, 'douong_sting.png'),
(71, 71, 'douong_nuoc-gao.png'),
(72, 72, 'douong_nutri.png'),
(98, 1, '1.1.jpg'),
(99, 1, '1.2.jpg'),
(100, 1, '1.3.jpg'),
(106, 2, '2.1.jpg'),
(108, 2, '2.2.jpg'),
(109, 2, '2.3jpg.jpg'),
(110, 3, '3.1.jpg'),
(111, 3, '3.2.jpg'),
(112, 3, '3.3.jpg'),
(113, 4, '4.1.jpg'),
(114, 4, '4.2.jpg'),
(115, 4, '4.3.jpg'),
(116, 5, '5.1.jpg'),
(117, 5, '5.2.jpg'),
(118, 5, '5.3.jpg'),
(119, 6, '6.1.jpg'),
(120, 6, '6.3.jpg'),
(121, 6, '6.2.jpg'),
(122, 7, '7.1.jpg'),
(123, 7, '7.2.jpg'),
(124, 7, '7.3.jpg'),
(125, 8, '8.1.png'),
(126, 8, '8.2.jpg'),
(127, 8, '8.3.jpg'),
(128, 9, '9.1.webp'),
(129, 9, '9.2.jpg'),
(130, 9, '9.3.jpg'),
(131, 10, '10.1.jpg'),
(132, 10, '10.2.jpg'),
(133, 10, '10.3.jpg'),
(134, 11, '11.1.jpg'),
(135, 11, '11.2.jpg'),
(136, 11, '11.3.jpg'),
(137, 12, '12.1.jpg'),
(138, 12, '12.2.jpg'),
(139, 12, '12.3.jpg'),
(140, 13, '13.1.jpg'),
(141, 13, '13.2.jpg'),
(142, 13, '13.3.jpg'),
(143, 14, '14.1.jpg'),
(144, 14, '14.2.jpg'),
(145, 14, '14.3.jpg'),
(146, 15, '15.1.jpg'),
(147, 15, '15.2.jpg'),
(148, 15, '15.3.jpg'),
(149, 16, '16.1.jpg'),
(150, 16, '16.2.jpg'),
(151, 16, '16.3.jpg'),
(152, 17, '17.1.jpg'),
(153, 17, '17.2.jpg'),
(154, 17, '17.3.jpg'),
(155, 18, '18.1.jpg'),
(156, 18, '18.2.jpg'),
(157, 18, '18.3.jpg'),
(161, 19, '19.1.jpg'),
(162, 19, '19.2.jpg'),
(163, 19, '19.3.jpg'),
(164, 20, '20.1.jpg'),
(165, 20, '20.2.jpg'),
(166, 20, '20.3.jpg'),
(167, 21, '21.1.jpg'),
(168, 21, '21.2.jpg'),
(169, 21, '21.3.jpg'),
(170, 22, '22.1.jpg'),
(171, 22, '22.2.jpg'),
(173, 22, '22.3.jpg'),
(174, 23, '23.1.jpg'),
(175, 23, '23.2.jpg'),
(176, 23, '23.3.jpeg'),
(177, 24, '24.1.jpg'),
(178, 24, '24.2.jpg'),
(179, 24, '24.3.jpg'),
(180, 25, '25.1.jpg'),
(181, 25, '25.2.jpg'),
(182, 25, '25.3.jpg'),
(183, 26, '26.1.jpg'),
(184, 26, '26.2.jpg'),
(185, 26, '26.3.jpg'),
(186, 27, '27.1.jpg'),
(187, 27, '27.2.jpg'),
(189, 27, '27.3.jpg'),
(190, 28, '28.1.jpg'),
(191, 28, '28.2.jpg'),
(192, 28, '28.3.jpg'),
(193, 29, '29.1.jpg'),
(194, 29, '29.2.jpg'),
(195, 29, '29.3.jpg'),
(196, 30, '30.1.jpg'),
(197, 30, '30.2.jpg'),
(198, 30, '30.3.jpg'),
(199, 31, '31.1.jpg'),
(200, 31, '31.2.jpg'),
(201, 31, '31.3.jpg'),
(202, 32, '32.1.jpg'),
(203, 32, '32.2.jpg'),
(204, 32, '32.3.jpg'),
(205, 33, '33.1.jpg'),
(206, 33, '33.2.jpg'),
(208, 33, '33.3.jpg'),
(209, 34, '34.1.jpg'),
(210, 34, '34.2.jpg'),
(211, 34, '34.3.jpg'),
(212, 35, '35.1.jpg'),
(213, 35, '35.2.jpg'),
(214, 35, '35.3.jpg'),
(215, 36, '36.1.jpg'),
(216, 36, '36.2.jpg'),
(217, 36, '36.3.jpg'),
(218, 37, '37.1.jpg'),
(219, 37, '37.2.jpg'),
(220, 37, '37.3.jpg'),
(221, 38, '38.1.jpg'),
(222, 38, '38.2.jpg'),
(223, 38, '38.3.jpg'),
(224, 39, '39.1.jpg'),
(225, 39, '39.2.jpg'),
(226, 39, '39.3.jpg'),
(227, 40, '40.1.jpg'),
(228, 40, '40.2.jpg'),
(229, 40, '40.3.jpg'),
(230, 41, '41..1.jpg'),
(231, 41, '41.2.jpg'),
(232, 41, '41.3.jpg'),
(233, 42, '42.1.jpg'),
(234, 42, '42.2.jpg'),
(235, 42, '42.3.jpg'),
(236, 43, '43.1.jpg'),
(237, 43, '43.2.jpg'),
(238, 43, '43.3.jpg'),
(239, 44, '44.1.jpg'),
(240, 44, '44.2.jpg'),
(241, 44, '44.3.jpeg'),
(242, 45, '45.1.jpg'),
(243, 45, '45.2.jpg'),
(244, 45, '45.3.jpg'),
(245, 46, '46.1.jpg'),
(246, 46, '46.2.jpg'),
(247, 46, '46.3.jpg'),
(248, 47, '47.1.jpg'),
(249, 47, '47.2.jpg'),
(250, 47, '47.3.jpg'),
(251, 48, '48.1.jpg'),
(252, 48, '48.2.jpg'),
(253, 48, '48.3.jpg'),
(254, 49, '49.1.jpg'),
(255, 49, '49.2.jpg'),
(256, 49, '49.3.jpg'),
(257, 50, '50.1.jpg'),
(258, 50, '50.2.jpg'),
(259, 50, '50.3.jpg'),
(260, 51, '51.1.jpg'),
(261, 51, '51.2.jpg'),
(262, 51, '51.3.jpg'),
(263, 52, '52.1.jpg'),
(264, 52, '52.2.jpg'),
(265, 52, '52.3.jpg'),
(266, 53, '53.1.jpg'),
(267, 53, '53.2.jpg'),
(268, 53, '53.3.jpg'),
(269, 54, '54.1.jpg'),
(270, 54, '54.2.jpg'),
(271, 54, '54.3.jpg'),
(272, 55, '55.1.jpg'),
(273, 55, '55.2.jpg'),
(274, 55, '55.3.jpg'),
(275, 56, '56.1.jpg'),
(276, 56, '56.2.jpg'),
(277, 56, '56.3.jpg'),
(278, 57, '57.1.jpg'),
(279, 57, '57.2.jpg'),
(280, 57, '57.3.jpg'),
(281, 58, '58.1.jpg'),
(282, 58, '58.2.jpg'),
(283, 58, '58.3.jpg'),
(284, 59, '59.1.jpg'),
(285, 59, '59.2.jpg'),
(286, 59, '59.3.jpg'),
(287, 60, '60.2.jpg'),
(288, 60, '60.3.jpg'),
(289, 61, '61.1.jpg'),
(290, 61, '61.2.jpg'),
(291, 61, '61.3.jpg'),
(292, 62, '62.1.jpg'),
(293, 62, '62.2.jpg'),
(294, 62, '62.3.jpg'),
(295, 63, '63.1.jpg'),
(296, 63, '63.2.jpg'),
(297, 63, '63.3.jpg'),
(298, 64, '64.2.jpg'),
(299, 64, '64.1.jpg'),
(300, 64, '64.3.jpg'),
(301, 66, '66.1.jpg'),
(302, 66, '66.2.jpg'),
(303, 66, '66.3.jpg'),
(304, 67, '67.1.jpg'),
(305, 67, '67.2.jpeg'),
(306, 67, '67.3.jpg'),
(307, 65, '65.1.jpg'),
(308, 65, '65.2.jpg'),
(309, 65, '65.3.jpg'),
(310, 68, '68.1.jpg'),
(311, 68, '68.2.jpg'),
(312, 68, '68.3.jpg'),
(313, 69, '69.1.jpg'),
(314, 69, '69.2.jpg'),
(315, 69, '69.3.jpg'),
(316, 70, '70.1.jpg'),
(317, 70, '70.2.jpg'),
(318, 70, '70.3.jpg'),
(319, 71, '71.1.jpg'),
(320, 71, '71.2.jpg'),
(321, 71, '71.3.jpg'),
(322, 72, '72.1.jpg'),
(323, 72, '72.2.jpg'),
(324, 72, '72.3.jpg'),
(332, 70, '2_3.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL COMMENT 'mã đăng nhập',
  `mat_khau` varchar(50) NOT NULL COMMENT 'mật khẩu',
  `ho_ten` varchar(50) NOT NULL COMMENT 'họ và tên',
  `hinh` varchar(50) NOT NULL COMMENT 'tên hình ảnh',
  `sdt` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'địa chỉ email',
  `vai_tro` tinyint(1) NOT NULL COMMENT 'vai trò true là nhân viên',
  `hoat_dong` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `hinh`, `sdt`, `email`, `vai_tro`, `hoat_dong`) VALUES
('admin', 'adminn', 'admins', 'user2.jpeg', '0999999888', 'admin@gmail.comm', 1, 1),
('Culpa21', '111111', 'Architecto id et inv', '2_3.jpeg', '0999999998', 'wyjiko@mailinator.com', 1, 0),
('cuongbip', 'Pa$$w0rd!', 'Occaecat voluptas sa', 'user2.jpeg', '0300000072', 'timaz@mailinator.com', 0, 1),
('longlong', 'Pa$$w0rd!', 'Perferendis ut unde ', 'user2.jpeg', '0999999914', 'gatose@mailinator.com', 0, 1),
('user', 'user', 'mungloli', 'Avatar Image (3).png', '0999999999', 'mykikox@mailinator.com', 0, 1),
('user2', 'user2', 'hien', 'Avatar Image (1).png', '0978888888', 'user2@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL COMMENT 'mã loại hàng',
  `ten_loai` varchar(50) NOT NULL COMMENT 'tên loại hàng',
  `hinh_loai` varchar(50) NOT NULL,
  `hoat_dong_loai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`, `hinh_loai`, `hoat_dong_loai`) VALUES
(1, 'Thịt', 'category-meat.png', 1),
(2, 'Cá', 'category-fish.png', 1),
(3, 'Hải sản', 'categoty-seafood.png', 1),
(4, 'Rau', 'category-vegetable.png', 1),
(5, 'Hoa quả', 'category-fruit.png', 1),
(6, 'Sữa', 'category-milk.png', 1),
(7, 'Gia vị', 'category-spice.png', 1),
(8, 'Đồ uống', 'category-water.png', 1),
(48, '2132aa', '2_3.jpeg', 0),
(49, '21', '2_2.jpeg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai`
--

CREATE TABLE `trang_thai` (
  `ma_trang_thai` int(11) NOT NULL,
  `ten_trang_thai` varchar(100) NOT NULL,
  `hoat_dong_tt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai`
--

INSERT INTO `trang_thai` (`ma_trang_thai`, `ten_trang_thai`, `hoat_dong_tt`) VALUES
(1, 'Chờ Xác nhận', 1),
(2, 'Chờ giao hàng', 1),
(3, 'Đang giao hàng', 1),
(4, 'Đã giao hàng', 1),
(5, 'Đã huỷ', 1),
(8, 'Đã nhận hàng', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma hh` (`ma_hh`),
  ADD KEY `ma kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_ctdh`),
  ADD KEY `ma_cthh` (`ma_cthh`),
  ADD KEY `ma_dh` (`ma_dh`);

--
-- Chỉ mục cho bảng `chi_tiet_hang_hoa`
--
ALTER TABLE `chi_tiet_hang_hoa`
  ADD PRIMARY KEY (`ma_cthh`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`ma_danh_gia`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_van_chuyen` (`ma_van_chuyen`),
  ADD KEY `ma_trang_thai` (`ma_trang_thai`);

--
-- Chỉ mục cho bảng `don_vi_van_chuyen`
--
ALTER TABLE `don_vi_van_chuyen`
  ADD PRIMARY KEY (`ma_van_chuyen`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gh`),
  ADD KEY `gio_hang_ibfk_1` (`ma_kh`),
  ADD KEY `ma_cthh` (`ma_cthh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `hinh_hang_hoa`
--
ALTER TABLE `hinh_hang_hoa`
  ADD PRIMARY KEY (`ma_hinh`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`ma_trang_thai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã bình luận', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_hang_hoa`
--
ALTER TABLE `chi_tiet_hang_hoa`
  MODIFY `ma_cthh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `ma_danh_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `don_vi_van_chuyen`
--
ALTER TABLE `don_vi_van_chuyen`
  MODIFY `ma_van_chuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã hàng hoá', AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `hinh_hang_hoa`
--
ALTER TABLE `hinh_hang_hoa`
  MODIFY `ma_hinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại hàng', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `ma_trang_thai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `ma hh` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ma kh` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_cthh`) REFERENCES `chi_tiet_hang_hoa` (`ma_cthh`),
  ADD CONSTRAINT `ma_dh` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_hang_hoa`
--
ALTER TABLE `chi_tiet_hang_hoa`
  ADD CONSTRAINT `chi_tiet_hang_hoa_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `ma_kh` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ma_trang_thai` FOREIGN KEY (`ma_trang_thai`) REFERENCES `trang_thai` (`ma_trang_thai`),
  ADD CONSTRAINT `ma_van_chuyen` FOREIGN KEY (`ma_van_chuyen`) REFERENCES `don_vi_van_chuyen` (`ma_van_chuyen`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`ma_cthh`) REFERENCES `chi_tiet_hang_hoa` (`ma_cthh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `hinh_hang_hoa`
--
ALTER TABLE `hinh_hang_hoa`
  ADD CONSTRAINT `hinh_hang_hoa_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
