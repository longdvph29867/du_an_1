-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 05, 2023 lúc 03:37 PM
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
  `ma_hh` int(10) NOT NULL COMMENT 'mã hàng hoá được bình luận',
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
(27, 'ooooo', 38, 'admin', '2023-06-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_ctdh` int(11) NOT NULL,
  `ma_dh` int(10) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `so_luong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ma_ctdh`, `ma_dh`, `ma_hh`, `so_luong`) VALUES
(1, 1, 64, 2),
(2, 1, 9, 3),
(3, 2, 69, 5),
(4, 2, 14, 4),
(5, 3, 32, 1),
(6, 3, 62, 2),
(7, 3, 26, 2),
(8, 3, 35, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `ma_danh_gia` int(10) NOT NULL,
  `noi_dung_danh_gia` varchar(100) NOT NULL,
  `xep_hang` int(2) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`ma_danh_gia`, `noi_dung_danh_gia`, `xep_hang`, `ma_hh`, `ma_kh`) VALUES
(1, 'good good!', 5, 64, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int(10) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ngay_dat` date NOT NULL,
  `ma_trang_thai` int(10) NOT NULL,
  `ten_nguoi_nhan` varchar(50) NOT NULL,
  `sdt_nguoi_nhan` varchar(11) NOT NULL,
  `dia_chi_nhan` varchar(200) NOT NULL,
  `tong_tien` int(10) NOT NULL,
  `ma_van_chuyen` int(10) NOT NULL,
  `ghi_chu` varchar(200) NOT NULL,
  `danh_gia_don_hang` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `ma_kh`, `ngay_dat`, `ma_trang_thai`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nhan`, `tong_tien`, `ma_van_chuyen`, `ghi_chu`, `danh_gia_don_hang`) VALUES
(1, 'admin', '2023-06-29', 4, 'Nguyễn Văn A', '0971111111', 'P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội', 302000, 5, 'mau den', 0),
(2, 'admin', '2023-06-29', 5, 'Đỗ VĂn Long', '0999999999', 'Thanh Dương, Thành Đô, Tứ Xuyên, Trung Quốc', 1232000, 3, '12345678910jqka', 0),
(3, 'user', '2023-07-01', 5, 'Nguyễn Khắc Cường', '0366666666', 'Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam.', 2321000, 5, 'Việt Nam', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi`
--

CREATE TABLE `don_vi` (
  `ma_dv` int(11) NOT NULL,
  `ten_dv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi`
--

INSERT INTO `don_vi` (`ma_dv`, `ten_dv`) VALUES
(1, 'Kg'),
(2, 'Lít'),
(3, 'Túi'),
(4, 'Lốc'),
(5, 'Thùng'),
(6, 'Chai'),
(7, 'Hộp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi_van_chuyen`
--

CREATE TABLE `don_vi_van_chuyen` (
  `ma_van_chuyen` int(10) NOT NULL,
  `ten_van_chuyen` varchar(100) NOT NULL,
  `gia_van_chuyen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi_van_chuyen`
--

INSERT INTO `don_vi_van_chuyen` (`ma_van_chuyen`, `ten_van_chuyen`, `gia_van_chuyen`) VALUES
(1, 'Giao hàng nhanh', 29000),
(2, 'Giao hàng tiết kiệm', 36000),
(3, 'Viettel Post', 31000),
(4, 'VNPost', 24000),
(5, 'J&T Express', 25000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gh` int(10) NOT NULL,
  `ma_kh` varchar(20) DEFAULT NULL,
  `ma_hh` int(11) DEFAULT NULL,
  `so_luong` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`ma_gh`, `ma_kh`, `ma_hh`, `so_luong`) VALUES
(1, 'admin', 9, 32),
(2, 'user2', 64, 2),
(3, 'user2', 61, 2),
(4, 'user', 25, 4),
(5, 'user', 32, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL COMMENT 'mã hàng hoá',
  `ten_hh` varchar(50) NOT NULL COMMENT 'tên hàng hoá',
  `don_gia` double(10,2) NOT NULL COMMENT 'đơn giá',
  `giam_gia` double(10,2) DEFAULT 0.00 COMMENT 'mức giảm giá',
  `hinh` varchar(50) NOT NULL COMMENT 'hình ảnh',
  `ngay_nhap` date DEFAULT NULL COMMENT 'ngày nhập hàng',
  `mo_ta` text NOT NULL COMMENT 'mô tả hàng hoá',
  `dac_biet` tinyint(1) NOT NULL COMMENT 'tràng thái đặc biệt',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượt xem',
  `ma_loai` int(10) NOT NULL COMMENT 'mã loại',
  `ma_dv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`, `ma_dv`) VALUES
(1, 'Thịt ba rọi heo', 140000.00, 10000.00, 'thit_ba-roi-heo.png', '2023-06-03', 'Thịt ba chỉ (hay còn gọi là ba rọi) là phần thịt heo được cắt ra từ bụng, không có xương và nhiều mỡ. Sỡ dĩ người ta thường gọi thịt ba chỉ là bởi khi cắt ngang sẽ thấy được phần thịt và mỡ xen kẽ 3 lớp với nhau theo thứ tự lớp thịt, mỡ rồi lại đến lớp thịt', 0, 45, 1, 1),
(2, 'Móng giò', 99000.00, 5000.00, 'thit_mong-gio.png', '2023-06-03', 'Phần móng giò trắng nõn được sơ chế và pha lóc khéo léo, mang trọn hương vị của phần da dẻo mềm mềm, lớp gân giòn và thịt ngọt thơm ngon. Móng giò rất giàu Protit, sau khi đưa vào cơ thể sẽ có tác dụng hiệu quả trong việc cải thiện chức năng sinh lý của các cơ quan nội tạng, làm cho các tế bào da giữ được nước nên đỡ bị khô nhăn, khiến cho da bóng và căng', 1, 4, 1, 1),
(3, 'Thịt heo xay', 110000.00, 2000.00, 'thit_heo-xay.png', '2023-06-03', 'Loại thịt rất quen thuộc với mỗi bà nội trợ nhờ độ linh hoạt cao trong chế biến, lại nhanh thấm gia vị và có khả năng kết hợp hài hòa với hầu hết các loại rau củ, cho các đầu bếp tại gia thỏa sức biến tấu. Sản phẩm được kết hợp từ thịt nạc và mỡ tươi sạch tạo sự hài hòa cho hương vị và sự an tâm tuyệt đối về chất lượng cho các món ăn', 0, 1, 1, 1),
(4, 'Sườn heo', 160000.00, 12000.00, 'thit_suon-heo.png', '2023-06-03', 'Sườn hồng tươi với sụn giòn rụm cùng thịt mềm căng mọng được tuyển chọn kỹ lưỡng từ tảng sườn ngon nhất. Là nguyên liệ hảo hạng cho món ngon đúng điệu. Sườn heo là bộ phận chứa nhiều các chất dinh dưỡng như protein, vitamin B12, kẽm, sắt và chất béo không bão hòa như Omega-3 giúp cung cấp cho cơ thể loạt các vi chất cần thiết', 1, 6, 1, 1),
(5, 'Bắp giò heo', 125000.00, 0.00, 'thit_bap-gio-heo.png', '2023-06-03', 'Chân giò heo tiêu chuẩn về an toàn toàn thực phẩm. Giò heo săn chắc, thịt có sự kết hợp với gân mỡ nên ăn béo ngậy và thơm, thích hợp để hầm canh, nấu các món nước như hủ tiếu, bánh canh. Do chân hoạt động nhiều nên phần thịt sẽ mỏng, mềm, ngọt và có nhiều gân hơn vì vậy mà khi chế biến các món hầm, giả cầy, luộc,... sẽ mềm, thấm gia vị và ngon hơn', 1, 0, 1, 1),
(6, 'Đuôi heo', 75000.00, 3000.00, 'thit_duoi-heo.png', '2023-06-03', 'Đuôi heo bao gồm cả phần xương đuôi. Phần đuôi gồm chủ yếu là thịt và mỡ, được bao quanh bởi da. Xương và các mẩu sụn nhỏ ở các đầu khớp nối tạo độ giòn khi thưởng thức. Trong thực đơn gia đình thì đây là nguyên liệu lý tưởng cho các món hầm, ninh nhừ để đem lại những món ăn thơm ngon, hương vị đậm đà nhưng không hề béo', 0, 1, 1, 1),
(7, 'Nạc vai heo', 105000.00, 1000.00, 'thit_vai-heo.png', '2023-06-03', 'Nạc vai heo là phần thịt đặc trưng được lấy từ đùi trước (vai) của heo. Nạc vai còn bao gồm một phần đầu của thăn ngoại heo (đầu mềm). Chất lượng thịt heo đạt chất lượng cao nhất, thịt heo đều được Cơ quan thú y nhà nước kiểm tra, đóng dấu trước khi đưa ra thị trường tiêu thụ', 1, 0, 1, 1),
(8, 'Bắp bò Úc', 355000.00, 19000.00, 'thit_bap-bo-uc.png', '2023-06-03', 'Bắp bò Úc luôn là được xếp trong danh sách dòng sản phẩm best seller ở mọi cửa hàng trong hệ thống. Với thực đơn chế biến đa dạng như bò kho, bò hầm, bò sốt vang, bò luộc, bò xào, bò nướng, bò hấp, sản phẩm đáp ứng nhu cầu ẩm thực phong phú của nhiều gia đình Việt. Hãy đến với Food Market ngay hôm nay để được mua hàng với mức giá tốt nhất', 1, 1, 1, 1),
(9, 'Ba chỉ bò nhập khẩu', 515000.00, 29000.00, 'thit_ba-chi-bo.png', '2023-06-03', 'Ba chỉ bò là phần thịt được lấy từ phần bụng của con bò, là phần thịt với những dải thịt nạc và thịt mỡ xen kẽ nhau tạo nên độ mềm, ngậy, ngọt nhưng hoàn toàn không ngấy. Bò nhập khẩu rất dễ chế biến. Những món ăn nấu từ thịt ba chỉ bò cũng rất đơn giản như xào, lẩu, cuốn cải nướng, cuốn nấm kim châm nướng, nhúng giấm hay làm salat', 1, 33, 1, 1),
(10, 'Thăn ngoại bò Úc', 489000.00, 12000.00, 'thit_than-ngoai-bo-uc.png', '2023-06-03', 'Là sự xen kẽ hoàn hảo giữa lớp thịt và lớp mỡ trên miếng thịt bò tạo nên những hình vân cẩm thạch đẹp mắt.Thịt bò mềm, mọng nước, hợp để làm steak hoặc nhúng lẩu. Thăn ngoại bò vốn nổi tiếng là loại thịt bò cao cấp nhất trên thế giới. Các đường vân mỡ – nạc đan xen đều đặn tựa như đường vân cẩm thạch', 0, 3, 1, 1),
(11, 'Gầu bò Úc', 348000.00, 0.00, 'thit_gau-bo-uc.png', '2023-06-03', 'Gầu bò Úc hay còn gọi là nạm bò, ức bò (Brisket) là sản phẩm nhập khẩu trực tiếp từ các thương hiệu thịt bò hàng đầu của Úc với đầy đủ tem nhãn của nhà sản xuất và dấu kiểm định của Chi Cục Thú Y. Quá trình sơ chế, đóng khay, cấp đông Bò Úc vệ sinh sạch sẽ đảm bảo chất lượng, an toàn cho sức khỏe người tiêu dùng. Gầu Bò Úc được pha cắt bằng máy bào công nghiệp, bào lẩu theo tiêu chuẩn độ dày 1,5mm cho món lẩu.', 1, 13, 1, 1),
(12, 'Gà đồi cao lãnh', 132000.00, 11000.00, 'thit_ga-doi.png', '2023-06-03', 'Thịt gà đồi thường có cấu trúc cơ bắp chắc chắn và mềm mại, với một lượng mỡ ít hơn so với các loại gà nuôi công nghiệp. Do được nuôi trong môi trường tự nhiên, gà đồi thường có cơ bắp phát triển tự nhiên hơn và thường được cho ăn các nguồn thức ăn tự nhiên như cỏ, hạt, sâu, giun và côn trùng. Thịt gà đồi là một nguồn cung cấp protein chất lượng cao, vitamin B6, vitamin B12, selen và các khoáng chất khác. Nó là một lựa chọn ăn uống lành mạnh và giàu dinh dưỡng', 0, 1, 1, 1),
(13, 'Cánh gà', 102000.00, 3000.00, 'thit_canh-ga.png', '2023-06-03', 'Cánh gà là một phần thịt được lấy từ cánh của con gà. Đây là một phần thịt thường được ưa chuộng và sử dụng phổ biến trong ẩm thực nhiều quốc gia trên thế giới. Cánh gà có cấu trúc xương và thịt cân đối. Phần thịt trên cánh gà thường là mềm mại và có một lượng mỡ nhất định, tạo ra hương vị thơm ngon và độ mềm phù hợ', 1, 4, 1, 1),
(14, 'Đùi gà', 113000.00, 8000.00, 'thit_dui-ga.png', '2023-06-03', 'Đùi gà là một phần thịt được lấy từ phần đùi hoặc chân sau của con gà. Đây là một phần thịt gà phổ biến và được sử dụng rộng rãi trong ẩm thực. Khi chế biến, đùi gà có thể được nướng, quay, rán hoặc hấp theo nhiều phong cách khác nhau. Đùi gà thường được tẩm gia vị hoặc sốt để tăng cường hương vị và độ ngon. Đùi gà cũng thích hợp để làm món chính hoặc món ăn nhẹ', 1, 2, 1, 1),
(15, 'Sườn cừu mông cổ', 720000.00, 22000.00, 'thit_suon-cuu.png', '2023-06-03', 'Sườn cừu Mông Cổ là một sản phẩm thịt từ phần sườn của Cừu Mông Cổ, một loại gia súc được nuôi chủ yếu ở Mông Cổ. Đây là một phần thịt ngon, giàu dinh dưỡng và có một hương vị đặc trưng. Sườn cừu Mông Cổ thường có cấu trúc xương dài và thịt mềm, có nhiều mỡ ở giữa, giúp tạo ra một hương vị giàu mỡ và thơm ngon. Phần thịt được cắt từ sườn cừu thường có lớp mỡ mỏng bao quanh, làm tăng hương vị và giữ cho thịt mềm và không khô', 1, 37, 1, 1),
(16, 'Cá Mập Cambodia', 320000.00, 34000.00, 'slide-ca-tuoi-removebg-preview.png', '2023-06-03', 'Cá Mập Cambodia là một sản phẩm độc đáo được chế biến từ cá mập tươi ngon, nổi tiếng từ vùng biển Cambodia. Sản phẩm này mang đến cho bạn trải nghiệm ẩm thực độc đáo với hương vị đậm đà và thịt cá mập mềm mịn. Với sự kết hợp hoàn hảo giữa phương pháp chế biến truyền thống và công nghệ hiện đại, \"Cá Mập Cambodia\" là một món ăn tuyệt vời để khám phá hương vị biển cả và nền ẩm thực', 1, 27, 2, 1),
(17, 'Cá Chim Trắng Lai Châu', 111000.00, 1000.00, 'ca_chim-trang.png', '2023-06-11', 'Cá chim có hai loại phổ biển là cá chim trắng và cá chim đen, tuy nhiên cá chim trắng được ưa chuộng nhất bởi cá chim trắng thịt ngon và thơm hơn rất nhiều so với cá chim đen.', 0, 0, 2, 1),
(18, 'Cá Saba Lào Cai', 99000.00, 3000.00, 'ca_ba-sa.png', '2023-06-11', 'Cá sa ba tẩm tiêu xanh được nhiều người Việt ưa chuộng bởi độ dinh dưỡng cao và tốt cho sức khỏe. Cá sa ba tẩm tiêu xanh nhập khẩu nguyên liệu trực tiếp từ Nhật về Việt Nam và sau đó bắt đầu sơ chế đóng gói, dán tem, hàng chất lượng tươi ngon.', 0, 0, 2, 1),
(19, 'Cá Hồi Nguyên Con Cao Lãnh', 289000.00, 14000.00, 'ca_hoi-nguyen-con.png', '2023-06-11', 'Cá hồi Nauy là loại thực phẩm giàu dinh dưỡng cho sức khỏe của chúng ta. Chúng được chế biến thành nhiều món ăn ngon, đặc biệt là các món ăn tươi sống như sushi hay sashimi rất được ưa chuộng ở khắp nơi.', 1, 0, 2, 1),
(20, 'Cá Trích Phi Lê', 159000.00, 8000.00, 'ca_trich-phi-le.png', '2023-06-11', 'Cá Trích đặc sản nổi tiếng ở vùng biển Bình Thuận, cá có đặc điểm màu xanh nhẹ, thân dẹp và xương nhỏ. Cá trích Phile được sơ chế từ những con cá trích tươi sống, loại bỏ xương chỉ lấy phần thịt ở 2 bên thân cá.', 0, 0, 2, 1),
(21, 'Cá Tuyết Alaska', 309000.00, 10000.00, 'ca_tuyet-cat-khuc.png', '2023-06-11', 'Là khúc gần cuối đuôi được xẻ làm đôi ( như hình). Khúc này có thịt nhiều thích hợp làm nhiều món như: nấu canh chua, nấu cháo, phi lê thịt cá ra chiên hoặc áp chảo. Ngoài ra, khách có thể để nguyên khúc đuôi kho tiêu rất hấp dẫn.', 1, 0, 2, 1),
(22, 'Cá Dìa Bông Làm Sạch', 169000.00, 6000.00, 'ca_dia-bong.png', '2023-06-11', 'Cá Dìa Bông là hải sản nổi tiếng ở Nha Trang, Cam Ranh được nhiều khách yêu thích. Cá chỉ có theo mùa nên được bán chạy khi có hàng tại Đảo, khách Sài Gòn rất thích ăn cá biển bơi thịt tươi ngon, ngọt và siêu béo.', 1, 0, 2, 1),
(23, 'Cá Dứa 1 Nắng', 143000.00, 5000.00, 'ca_dua.png', '2023-06-11', 'Cá dứa 1 nắng là một món ăn rất quen thuộc với người Việt Nam. Vì từ lâu, loại khô cá này đã có mặt trong mọi bữa ăn của người dân ở khắp các vùng miền. Khô cá dứa được chế biến bằng cách sấy khô cá dứa và trộn các gia vị như đường, muối, tỏi, hành, ớt và dầu ăn để tạo nên hương vị đặc trưng.', 1, 0, 2, 1),
(24, 'Cá Chỉ Vàng 2 Nắng', 78000.00, 2000.00, 'ca_chi-vang.png', '2023-06-11', 'Cá chỉ vàng ( hay còn gọi là cá ngân chỉ ) cá sống tập trung nhiều ở vùng biển ven Phan Thiết - Bình Thuận vì vậy nên khu vực biển này khá nổi tiếng với khô cá chỉ vàng 2 nắng, và là vùng có khô ngon nhất hiện nay.', 1, 0, 2, 1),
(25, 'Cá Chép Sông Đà', 79000.00, 1000.00, 'ca_chep.png', '2023-06-11', 'Cá chép có thể chế biến thành nhiều món ăn hấp dẫn cả thị giác lẫn khứu giác và vị giác. Các món ăn chế biến ngon nhất với nguyên liệu cá chép giòn đó là cá chép giòn nướng muối ớt và cá chép giòn om dưa chua, nướng muối ớt, bạn chỉ cần làm thịt cá chép giòn như hướng dẫn ở trên, sau đó giã một chén muối ớt tùy theo khẩu vị của bạn rồi ướp cá với chút dầu ăn nữa và nướng. Mách nhỏ các bạn ở món này là với phần muối nếu cho thêm ít đường vào sẽ dịu vị cá nướng và ngon hơn.', 1, 0, 2, 1),
(26, 'Cua King Crab', 2600000.00, 90000.00, 'haisan_cua-hoang-de.png', '2023-06-11', 'Cua Hoàng Đế Alaska Cái hay còn gọi là King Crab được nhiều khách hàng ưa chuộng không chỉ tại Việt Nam mà còn rất nhiều nơi trên thế giới vì chất lượng thịt cua được đánh giá là chất lượng ngon ngọt dai mà không có loại hải sản nào có thể vượt mặt được. Vậy cua King Crab cái tại Đảo Hải sản có những đặc điểm gì? Nếu mua nhầm cua kém chất lượng thì Đảo Hải Sản có chính sách gì để bảo vệ khách hàng cùng xem qua nội dung sản phẩm này nhé!', 1, 0, 3, 1),
(27, 'Tôm Hùm Alaska', 999000.00, 11000.00, 'haisan_tom_alaska.png', '2023-06-11', 'So với các loại tôm hùm nội ngoại địa khác thì tôm hùm Alaska baby size nhỏ đang được Đảo Hải Sản nhập khẩu về, đây là dòng sản phẩm được ưa chuộng nhất hiện nay tại Tp Hồ Chí Minh và các tỉnh lân cận. Nếu chúng ta so sánh giá trong tầm 2.000.000đ ngoài những sản phẩm tôm hùm Việt Nam ra thì khách hàng còn có sự lựa chọn tôm hùm alaska', 1, 1, 3, 1),
(28, 'Bào Ngư Hàn Quốc', 899000.00, 12000.00, 'haisan_bao-ngu.png', '2023-06-11', 'Bào ngư là một lọai hải sản nổi tiếng vì độ thơm ngon bổ dưỡng, và nguồn dinh dưỡng quý giá mà chúng mang lại. Vậy đặc điểm của bào ngư, công dụng và cũng như giá thành hiện nay của bào ngư như thế nào, hãy cùng Đảo tìm hiểm qua bài viết sau.', 1, 0, 3, 1),
(29, 'Hàu Nhật Bản', 789000.00, 11000.00, 'haisan_hau.png', '2023-06-11', 'Hàu sữa Nhật Bản, hay còn gọi là hàu nước ngọt, là một loại hàu được nuôi trong môi trường nước ngọt. Nó được coi là một trong những loại hàu ngon nhất thế giới với vị ngọt tự nhiên, mềm mại và tươi mát. Hàu Nhật là một thực phẩm tuyệt vời cho sức khỏe của chúng ta', 1, 0, 3, 1),
(30, 'Sò Đỏ Canada', 543000.00, 5000.00, 'haisan_so-do.png', '2023-06-11', 'Sò đỏ sống trong môi trường sống tự nhiên có tuổi thọ đến vài thập kỷ. Nó được chôn vùi trong cát và lấy lên bằng máy đào thủy lực ngoài đại dương.Sau khi tách vỏ, sò được trải qua quá trình sơ chế và cấp đông nhanh để giữ được chất lượng tuyệt đối cùng hương vị vốn có', 0, 30, 3, 1),
(31, 'Tôm Hùm Úc', 1099000.00, 21000.00, 'haisan_tom-hum-uc.png', '2023-06-11', 'Tôm hùm Tây Úc thu hút ánh nhìn đầu tiên bởi màu sắc thật đẹp, dinh dưỡng cao và đặc biệt thịt tôm rất là thơm, săn chắc và ngọt lắm. Tôm hùm Tây Úc nổi tiếng trên thế giới. Tôm hùm Tây Úc có hình dáng tựa như tôm hùm xanh Nha Trang, chỉ khác về màu sắc đỏ sậm rất bắt mắt. Ngoài ra tôm hùm Tây Úc nhiều khách dễ nhầm lẫn là tôm hùm Nam Úc vì cả 2 chỉ khác nhau hóa văn trên thân tôm.', 1, 0, 3, 1),
(32, 'Cua Tuyết', 669000.00, 4000.00, 'haisan_cua-tuyet.png', '2023-06-11', 'Cua tuyết được nhập sống trực tiếp từ vùng biển nước sâu và cực lạnh khu Bắc Cực, chính vì điều kiện s.ống khắc nghiệt đã tạo nên hương vị đặc trưng của cua tuyết. Được du nhập về Việt Nam thời gian gần đây nhưng đã gây ra \'\'cơn sốt\'\' trong giới sành ăn bởi chất lượng cực đỉnh. Thịt cua chắc từng khối và rất ngọt thịt', 0, 0, 3, 1),
(33, 'Mực Ống 1 Nắng', 234000.00, 11000.00, 'haisan_muc-ong-1-nang.png', '2023-06-11', 'Mực ống 1 nắng là hải sản bán chạy tại shop vào các dịp lễ , tết , tất niên hay những buổi tiệc lớn. Theo ý kiến của nhiều khách hàng , mực 1 nắng thích hợp làm quà tặng , quà biếu cho người thân , đồng nghiệp và bạn bè. Mực ống 1 nắng được làm từ mực ống câu, là loại mực ngon nhất. Những con mực từ biển xanh qua bàn tay con người lại trở nên đặc biệt và thấm đẫm cái tình biển xanh. Mực ống khi câu được ngư dân xẻ và đem đi rửa sạch để giảm bớt nước biển trong con mực, sau đó sẽ đem ra phơi nắng. Phải chọn nơi nhiều ánh nắng, nắng to để mực được ngon hơn', 1, 0, 3, 1),
(34, 'Mực Lá', 320000.00, 10000.00, 'haisan_muc-la.png', '2023-06-11', 'Mực lá bán chạy vào những dịp lễ , cuối tuần , tất niên...khách mua biếu tặng rất nhiều vì hải sản không những ăn ngon mà còn giàu dinh dưỡng , mang nhiều sức khỏe tốt cho mọi gia đình. Mực lá nhiều nhà dân hay xẻ và phơi qua 1 nắng , 2 nắng hay làm khô mực , mực tẩm ướp đều ngon và hấp dẫn. Ngoài ra mực lá làm nhiều món nướng , hấp hành gừng , xào rau củ hay rim me...Chấm kèm tương ớt sẽ ngon hơn . Mực lá thích hợp cho nhiều buổi tiệc liên hoan công ty, sinh nhật hay bạn bè gặp mặt cuối tuần tụ họp . Ngồi lai rai nhấm nhấp và uống chung với bia càng tuyệt vời', 0, 2, 3, 1),
(35, 'Bạch tuộc tươi', 211000.00, 21000.00, 'haisan_bach-tuoc.png', '2023-06-11', 'Bạch tuộc là động vật thân mềm, thịt dày, có vị ngọt mặn tự nhiên của biển và xúc tu giòn dai nên được rất nhiều người yêu thích. Thịt bạch tuộc tươi có giá trị dinh dưỡng cao, nhiều loại khoáng chất như phốt pho, canxi, sắt, đồng, kẽm, iốt, thịt bạch tuộc chứa ít chất béo, itamin thiết yếu như A, B1, B2, C,... giúp bổ máu và tăng cường hệ miễn dịch. Trong thịt bạch tuộc chứa dồi dào canxi, kali, phốt pho, vitamin và một số axit béo omega-3 tốt cho tim và giúp xương chắc khỏe', 1, 0, 3, 1),
(36, 'Bắp Cải Trái Tim', 14000.00, 1000.00, 'rau_bap-cai.png', '2023-06-11', 'Bắp cải trái tim có thể được sử dụng trong nhiều món ăn khác nhau. Nó có thể được ăn sống trong các món salad, hoặc được nấu chín trong các món canh, xào, hấp và trộn. Với hình dáng độc đáo của mình, bắp cải trái tim thường được sử dụng để trang trí đĩa ăn và tạo điểm nhấn hấp dẫn cho bữa ăn.', 1, 0, 4, 1),
(37, 'Bí ngô cô tiên', 12000.00, 1000.00, 'rau_bi.png', '2023-06-11', 'Bí ngô cô tiên là một loại quả bí ngô có hình dáng độc đáo và thu hút sự chú ý. Nó được biết đến với tên khoa học là Cucurbita pepo var. styriaca. Quả bí ngô cô tiên có hình tròn, bề mặt mịn và màu da cam sáng hoặc vàng. Ngoài ra, bí ngô cô tiên cũng có giá trị dinh dưỡng. Nó chứa nhiều chất xơ, vitamin A, vitamin C và khoáng chất như kali, magiê và sắt. Bí ngô cô tiên có vị ngọt và hơi hạt, thích hợp để nấu chín, nướng, xào hoặc chế biến thành các món ăn như súp bí ngô, bánh bí ngô, hay nước ép bí ngô.', 1, 0, 4, 1),
(38, 'Cà rốt Mộc Châu', 9000.00, 1000.00, 'rau_ca-rot.png', '2023-06-11', 'Đặc điểm nổi bật của cà rốt Mộc Châu là nó có hương vị ngọt tự nhiên và giữ được độ giòn sau khi nấu chín. Quả cà rốt này chứa nhiều chất xơ, vitamin A, vitamin C và khoáng chất như kali và sắt, mang lại nhiều lợi ích cho sức khỏe. Cà rốt Mộc Châu thường được sử dụng trong nhiều món ăn như xào, hấp, trộn salad, nấu súp hoặc chế biến thành nước ép cà rốt. Ngoài ra, nó còn được sử dụng trong công thức làm bánh và kem, tạo ra màu sắc và hương vị thú vị.', 1, 0, 4, 1),
(39, 'Cải Chíp', 8000.00, 1500.00, 'rau_cai-chip.png', '2023-06-11', 'Cải Chíp có hình dạng và kích thước nhỏ gọn, thường có chiều cao khoảng 20-30 cm. Lá của nó có dạng rễ, hình thù hơi giống chiếc chìa khóa, có thể ăn được. Lá có mùi thơm đặc trưng và vị ngọt nhẹ. Rau Cải Chíp là một nguồn cung cấp chất xơ, vitamin C, vitamin K và các chất chống oxy hóa. Nó cũng cung cấp một số khoáng chất như kali, canxi và sắt. Rau này có hàm lượng calo thấp, không chứa cholesterol và có chứa chất chống vi khuẩn tự nhiên.', 0, 30, 4, 1),
(40, 'Cải Bó Xôi', 8000.00, 1000.00, 'rau_cai-bo-xoi.png', '2023-06-11', 'Cải Bó Xôi là một nguồn cung cấp chất xơ, vitamin C, vitamin K và các chất chống oxy hóa. Nó cũng cung cấp một số khoáng chất như kali, canxi và sắt. Cải này có hàm lượng calo thấp, không chứa cholesterol và có chứa chất chống vi khuẩn tự nhiên. Cải Bó Xôi thường được sử dụng trong nhiều món ăn như xào, hấp, trộn salad, canh và nấu súp. Với lá xanh dày và cấu trúc độc đáo, nó tạo thêm sự ngon miệng và màu sắc hấp dẫn cho các món ăn.', 1, 0, 4, 1),
(41, 'Vải Bắc Giang', 29000.00, 2000.00, 'hoaqua_vai.png', '2023-06-11', 'Vải Bắc Giang là một loại trái cây đặc sản của tỉnh Bắc Giang, Việt Nam. Loại vải này có tên khoa học là Litchi chinensis và còn được gọi là vải thiều. Vải Bắc Giang có vỏ ngoài màu đỏ tươi, bóng và có những đường nổi lồi nhỏ. Vải Bắc Giang là một loại trái cây ngọt ngào, thơm ngon và giàu dinh dưỡng. Với màu sắc đẹp mắt và vị ngọt tự nhiên, nó là một sản phẩm trái cây được ưa chuộng và thường được coi là một biểu tượng của vùng đất Bắc Giang.', 1, 31, 5, 1),
(42, 'Cam sành', 31000.00, 2000.00, 'hoaqua_cam-sanh.png', '2023-06-11', 'Cam sành là một nguồn cung cấp tuyệt vời của vitamin C và chất chống oxy hóa. Nó cũng chứa chất xơ, vitamin A, kali và các khoáng chất khác có lợi cho sức khỏe. Việc ăn cam sành có thể giúp tăng cường hệ miễn dịch, cung cấp năng lượng và tốt cho da và hệ tiêu hóa. Cam sành thường được ăn tươi, trực tiếp sau khi bóc vỏ. Nó cũng được sử dụng để làm nước ép cam, sinh tố, mứt và các món tráng miệng khác. Cam sành là một loại trái cây mùa hè phổ biến và được ưa chuộng vì hương vị ngon lành và lợi ích dinh dưỡng.', 0, 0, 5, 1),
(43, 'Chôm chôm', 39000.00, 3000.00, 'hoaqua_chom-chom.png', '2023-06-11', 'Chôm chôm là một nguồn cung cấp vitamin C, vitamin B, kali và chất xơ. Nó cũng chứa các chất chống oxy hóa và có tác dụng tăng cường hệ miễn dịch, tốt cho tim mạch và giúp duy trì sức khỏe tốt. Chôm chôm thường được ăn tươi, trực tiếp sau khi bóc vỏ. Quả này cũng thường được sử dụng trong các món tráng miệng, nước ép, mứt, và được dùng để làm nguyên liệu trong các món ăn truyền thống và hiện đại.', 1, 0, 5, 1),
(44, 'Bơ sáp', 48000.00, 5000.00, 'hoaqua_bo-sap.png', '2023-06-11', 'Bơ sáp có hương vị béo ngọt và kem, tạo cảm giác mịn màng trong miệng. Nó có hàm lượng dầu cao và là nguồn cung cấp chất béo lành mạnh, vitamin E, kali và chất chống oxy hóa. Bơ sáp thường được sử dụng trong nhiều món ăn, từ mỡ bơ sáp trên bánh mì, bơ sáp xay để làm sốt, mousse bơ sáp, kem bơ sáp và nhiều món ăn khác. Nó cũng là một thành phần chính trong món guacamole - một món truyền thống của ẩm thực Mexico.', 1, 0, 5, 1),
(45, 'Chuối tiêu', 16000.00, 1000.00, 'hoaqua_chuoi.png', '2023-06-11', 'Chuối tiêu có vỏ màu vàng sáng, dễ bóc và mềm hơn so với những loại chuối khác. Thịt chuối tiêu có màu trắng sữa, mềm mịn và có vị ngọt tự nhiên đặc trưng. Chuối tiêu là nguồn cung cấp vitamin C, kali và chất xơ. Nó cũng chứa một số vitamin B và các khoáng chất khác có lợi cho sức khỏe. Chuối tiêu giúp tăng cường hệ miễn dịch, cung cấp năng lượng và có tác dụng bảo vệ da và hệ tiêu hóa.', 0, 0, 5, 1),
(46, 'Dưa lưới xanh', 34000.00, 2000.00, 'hoaqua_dua-luoi.png', '2023-06-11', 'Dưa lưới xanh màu trắng sữa, giòn và mềm mịn. Nó có hương vị ngọt tự nhiên và sảng khoái. Dưa lưới xanh thường có nhiều nước, tạo cảm giác mát lạnh khi ăn. Dưa lưới xanh là một nguồn cung cấp vitamin C, chất chống oxy hóa và chất xơ. Nó cũng chứa các khoáng chất như kali và magiê. Dưa lưới xanh có lợi cho hệ tiêu hóa, tăng cường hệ miễn dịch và giúp duy trì sức khỏe tổng thể.', 1, 0, 5, 1),
(47, 'Táo Envy Mỹ', 62000.00, 8000.00, 'hoaqua_tao-my.png', '2023-06-11', 'áo Envy Mỹ có vị ngọt độc đáo, vừa chua vừa ngọt, mang lại sự cân bằng hoàn hảo của hương vị. Nó có một hương thơm đặc trưng và một cấu trúc giòn tuyệt vời. Táo Envy Mỹ là một nguồn cung cấp tốt của vitamin C, chất chống oxy hóa và chất xơ. Nó cũng chứa các chất dinh dưỡng quan trọng khác như kali và vitamin A. Táo Envy giúp tăng cường hệ miễn dịch, cung cấp năng lượng và có lợi cho sức khỏe tổng thể.', 0, 0, 5, 1),
(48, 'Sữa Đậu Đen - Óc Chó Hanh Nhân', 42000.00, 5000.00, 'sua_dau-den.png', '2023-06-12', 'Sản phẩm sữa đậu được làm từ 3 loại đậu vô cùng giàu dinh dưỡng: đậu đen, óc chó và hạnh nhân, sữa đậu Sahmyook mang đến cho bạn và cả gia đình nguồn dinh dưỡng dồi dào. Sữa đậu đen óc chó hạnh nhân Sahmyook hộp 950ml đóng hộp tiện dùng, bổ sung dinh dưỡng cho cơ thể.', 0, 0, 6, 4),
(49, 'Sữa Tươi Tiệt Trùng Có Đường Vinamilk', 28000.00, 2000.00, 'sua_tiet-trung.png', '2023-06-12', 'Được chế biến từ nguồn sữa tươi 100% chứa nhiều dưỡng chất như vitamin A, D3, canxi,... tốt cho xương và hệ miễn dịch. Sữa tươi Vinamilk là thương hiệu được tin dùng hàng đầu với chất lượng tuyệt vời. Được chế biến từ nguồn sữa tươi 100% chứa nhiều dưỡng chất như vitamin A, D3, canxi,... tốt cho xương và hệ miễn dịch, sữa tươi Vinamilk là thương hiệu được tin dùng hàng đầu với chất lượng tuyệt vời. Sữa tươi có đường Vinamilk 100% Sữa Tươi thơm ngon dễ uống.', 1, 1, 6, 4),
(50, 'Sữa Milo Lúa Mạch', 21000.00, 1000.00, 'sua_milo.png', '2023-06-12', 'Sản phẩm sữa socola thơm ngon, giàu canxi và protein giúp cho cơ thể phát triển. Đặc biệt, thương hiệu sữa ca cao Milo nổi tiếng rất được các bé yêu thích và tin dùng. Lốc 4 hộp thức uống lúa mạch Milo Active Go 180ml thơm ngon, đầy dinh dưỡng, vị ngon kích thích vị giác. Sản phẩm thức uống lúa mạch giúp cung cấp dinh dưỡng cân bằng từ sữa và bột 3 loại ngũ cốc hoàn hảo: yến mạch, gạo lức, lúa mì. Sữa lúa mạch Milo giúp cung cấp cho bé năng lượng hoạt động cả ngày. 2 lốc sữa Milo lúa mạch ngũ cốc tiện dùng, thơm ngon, bổ sung nhiều dinh dưỡng cho bé.', 1, 0, 6, 4),
(51, 'Sữa Chua Nếp Cẩm Mộc Châu', 33000.00, 4000.00, 'sua_chua-moc-chau.png', '2023-06-12', 'Sữa Chua  Nếp cẩm Mộc Bắc Milk được lên men tự nhiên, là sự kết hợp giữa sữa và gạo nếp cẩm với công thức truyền thống lâu đời không chỉ mang đến cho bạn một hương vị hấp dẫn và khó quên, mà còn cung cấp rất nhiều chất dinh dưỡng cho cơ thể năng lượng, chất đạm, hydrat cacbon,… giúp tăng cường hệ tiêu hóa và hệ miễn dịch cho cả gia đình.', 0, 0, 6, 4),
(52, 'Sữa Vinamilk Susu Táo Chuối', 45000.00, 3000.00, 'sua_su-su.png', '2023-06-12', 'Vị ngọt béo, chua chua thơm ngon tuyệt vời. Bổ sung vitamin A giúp bé mắt sáng tinh anh.Chất xơ hòa tan (Prebiotic) hỗ trợ hệ tiêu hóa để bé luôn khỏe mạnh và năng động mỗi ngày. Sữa chua uống SuSu với vị ngọt béo, chua chua thơm ngon tuyệt vời. Sữa chua uống giúp bổ sung vitamin A giúp bé mắt sáng tinh anh, chất xơ hòa tan (Prebiotic) hỗ trợ hệ tiêu hóa để bé luôn khỏe mạnh và năng động mỗi ngày. Lốc 6 chai sữa chua uống dâu SuSu 80ml đóng lốc tiện dùng, tiết kiệm.', 1, 0, 6, 4),
(53, 'Sữa Chua ít đường Vinamilk', 43000.00, 1000.00, 'sua_chu-it-duong-vinamilk.webp', '2023-06-12', 'Được sản xuất từ các nguyên liệu cao cấp, đảm bảo việc tạo ra sản phẩm có chất lượng cao, an toàn cho người sử dụng. Sản phẩm giúp tăng cường hệ vi sinh trong đường ruột, giúp hoạt động tiêu hóa được tốt hơn, tăng cường sức đề kháng và phòng ngừa mắc các bệnh cảm cúm thông thường. Sữa chua Vinamilk chứa nhiều canxi, vitamin, khoáng chất ở dạng dễ hấp thu, kích thích vị giác, tăng cường sức khỏe hệ tiêu hóa, miễn dịch. Lốc 4 hộp sữa chua ít đường Vinamilk 100g là loại sữa chua có hương vị thơm ngon tinh khiết, ngọt dịu và giàu dưỡng chất, thích hợp cho mọi người.', 1, 0, 6, 4),
(54, 'Bột ngọt Ajinomoto', 37000.00, 2000.00, 'giavi_bot-ngot.png', '2023-06-12', 'Được sản xuất bằng phương pháp lên men tự nhiên từ nguyên liệu thiên nhiên như mật mía đường và tinh bột khoai mì. Bột ngọt hạt lớn Ajinomoto 545g là một gia vị được sử dụng rộng rãi trong chế biến món ăn ở gia đình, quán ăn, nhà hàng và trong công nghiệp chế biến thực phẩm, giúp món ăn hấp dẫn hơn.', 1, 0, 7, 3),
(55, 'Dầu hào Maggi', 12000.00, 1000.00, 'giavi_dau-hao.png', '2023-06-12', 'Dầu hào Maggi có thể sử dụng trong nhiều món ăn khác nhau, bao gồm mì xào, thịt nướng, salad, xôi, và nhiều món ngon khác. Nó là một loại gia vị đa năng và được ưa chuộng trong ẩm thực nhiều quốc gia. Dầu hào Maggi mang đến sự cân bằng vị mặn, ngọt và chua, giúp làm nổi bật hương vị và tăng cường trải nghiệm ẩm thực. Nó là một lựa chọn phổ biến trong bếp và được sử dụng để gia vị các món ăn hàng ngày.', 1, 0, 7, 6),
(56, 'Sốt kho hoàn hảo', 54000.00, 5000.00, 'giavi_sot-kho.png', '2023-06-12', 'Sốt kho hoàn hảo là một loại sốt gia vị đậm đà và cân bằng, được sử dụng trong ẩm thực Việt Nam để gia vị và tạo hương vị cho các món ăn kho truyền thống. Với màu sắc và hương vị đặc trưng, sốt kho hoàn hảo là một lựa chọn phổ biến để tăng cường hương vị và độ ngon của các món ăn', 1, 0, 7, 3),
(57, 'Sốt Bơ Cay', 43000.00, 6000.00, 'giavi_sot-bo-cay.png', '2023-06-12', 'Sốt Chế Biến YOChef độc quyền Đảo Hải Sản, sốt chế biến hoàn chỉnh để chế biến nhanh chóng, tiện lợi chuẩn vị nhà hàng. Sản phẩm kết hợp đa dạng với các loại hải sản khác nhau từ tôm, cua, các loại ốc...Các loại xốt được Các Đầu Bếp chuyên nghiệp Đảo Hải Sản điều chỉnh nguyên liệu cũng như hương vị cực kì gần gũi, giúp khách hàng chế biến một món ăn đậm đà ngon chuẩn vị Nhà Hàng.', 1, 0, 7, 3),
(58, 'Sốt Tiêu Đen', 42000.00, 5000.00, 'giavi_sot-tieu-den.png', '2023-06-12', 'Sốt tiêu đen ngon đúng điệu là phải có vị thơm nồng, cay nhẹ trong miệng làm giảm đi vị tanh của hải sản, tăng vị ngon và kích thích vị giác khi ăn. Hãy tham khảo nhanh một vài hải sản chế biến với sốt tiêu đen nhé.', 0, 0, 7, 6),
(59, 'Mù Tạt (わさび)', 19000.00, 2000.00, 'giavi_mu-tat.png', '2023-06-12', 'Muốn giảm bớt vị tanh của hải sản sống chỉ cần chấm với wasabi thơm nồng nàn sẽ át vị tanh - tăng vị ngon của hải sản lên gấp nhiều lần. Đặc biệt khi dùng với món ăn sống như: cồi sò điệp sushi, cá ngừ sushi, cá cờ kiếm sushi hoặc hàu sống... sẽ rất là tuyệt nhé. Wasabi tuýp dạng sệt rất tiện lợi cho các cuộc picnic ngoài trời, vô cùng gọn nhẹ mang theo bên mình. Nếu sử dụng không hết có thể đậy kín và bảo quản trong ngăn mát tủ lạnh nhé.', 1, 30, 7, 6),
(60, 'Lẩu thái Aji-Quick', 11000.00, 2000.00, 'giavi_lau-thai.png', '2023-06-12', 'Là loại gia vị nêm sẵn đến từ thương hiệu Aji-Quick quen thuộc trong mỗi gia đình Việt Nam. Gia vị nêm sẵn nấu lẩu Thái Aji-Quick gói 55g là sự kết hợp hài hòa của tất cả các loại gia vị cần thiết dành cho lẩu thái chua cay đậm vì như ở nhà hàng ngay tại nhà vào bất cứ khi nào mà bạn muốn.', 0, 0, 7, 3),
(61, 'Hạt nêm Knorr', 29000.00, 2000.00, 'giavi_hat-nem.png', '2023-06-12', 'Hạt nêm Knorr là thương hiệu hạt nêm nổi tiếng toàn cầu, hơn 1.7 tỷ người dùng. Hạt nêm thịt thăn, xương ống, tủy Knorr gói 170g làm từ nước cốt thịt thăn, xương ống và tủy cho vị ngon đậm đà, thơm lừng, hấp dẫn, món ăn chuẩn vị và kích thích vị giác hơn. Nước cốt thịt thăn xương ống, tủy cho món ăn thơm ngon đậm đà như nước dùng thịt thật sự, đảm bảo cung cấp các giá trị dinh dưỡng thiết yếu như: năng lượng, chất đạm, carbohydrate, chất béo, chất xơ,...', 0, 0, 7, 3),
(62, 'Dầu đậu nành', 48000.00, 5000.00, 'giavi_dau-an.png', '2023-06-12', 'Dầu đậu nành nguyên chất Simply chai 1 lít chứa tới 80% axit béo chưa bão hoà cùng lượng lớn chất chống oxy hoá giúp làm giảm lượng cholesterol xấu trong máu và cho bạn một trái tim khoẻ mạnh. Dầu ăn Simply là nhãn hiệu dầu ăn duy nhất được Hội Tim Mạch Học Việt Nam khuyên dùng. Dầu đậu nành nguyên chất Simply sử dụng nguyên liệu chọn lọc, không chứa chất bảo quản, chất tạo màu hay cholesterol, hoàn toàn thân thiện cho sức khỏe.', 0, 0, 7, 6),
(63, 'Nước mắm Nam Ngư', 38000.00, 3000.00, 'giavi_nuoc-mam.png', '2023-06-12', 'Nước mắm Nam Ngư đem đến cho người tiêu dùng Việt Nam những giọt nước mắm thơm ngon, sự lựa chọn hàng đầu của người Việt. Nước mắm Nam Ngư 10 độ đạm chai 500ml với dây chuyền khép kín với thành phần cá cơm tươi ngon tạo nên hương vị thơm ngon, đậm đà, màu sắc hấp dẫn. Nhắc đến thương hiệu nước mắm được nhiều người tiêu dùng Việt sử dụng nhất, chúng ta không thể không nhắc đến cái tên Nam Ngư. Với chất lượng sản phẩm tốt, cùng quy trình chế biến và tuyển chọn nguyên liệu kỹ càng, cho ra những sản phẩm nước mắm tuyệt hảo đến tay người tiêu dùng', 0, 0, 7, 6),
(64, 'Bia Hà Nội', 323000.00, 21000.00, 'douong_bia-ha-noi.png', '2023-06-12', 'Với một hợp chất chất lượng cao, bia Hà Nội mang đến trải nghiệm uống mượt mà, mềm mại và dễ uống. Nó có một hương vị hài hòa, với một sự pha trộn hoàn hảo giữa vị đắng nhẹ và vị ngọt tự nhiên, tạo cảm giác sảng khoái và thỏa mãn. Bia Hà Nội thường được uống lạnh và là một lựa chọn phổ biến trong các cuộc gặp gỡ bạn bè, tiệc tùng hoặc thưởng thức trong những ngày nóng. Nó cũng thường được kết hợp với các món ăn truyền thống và món ăn vặt như bánh mỳ, hải sản, thịt nướng và nhiều món khác.', 1, 0, 8, 5),
(65, 'Cà phê G7 - 3 In 1', 55000.00, 7000.00, 'douong_coffee.png', '2023-06-12', 'Cà phê G7 3 in 1 được chiết xuất từ những phần tinh túy nhất có trong từng hạt cà phê, trên công nghệ hàng đầu và bí quyết không thể sao chép để cho ra đời sản phẩm cà phê hòa tan thượng hạng, với hương vị khác biệt, đậm đà, hương thơm độc đáo quyến rũ mà không một sản phẩm cà phê hòa tan nào khác đạt được. Trong suốt 12 năm liên tục cà phê G7 được người tiêu dùng bình chọn là hàng Việt Nam chất lượng cao.', 0, 0, 8, 7),
(66, 'Fanta Cam', 19000.00, 1000.00, 'douong_panta-cam.png', '2023-06-12', 'Từ thương hiệu nước ngọt có gas nổi tiếng toàn cầu với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.  Nước ngọt bổ sung năng lượng làm việc mỗi ngày. Cam kết sản phẩm chính hãng, chất lượng và an toàn', 0, 0, 8, 5),
(67, 'Coca-Cola', 9000.00, 1000.00, 'douong_coca-cola.png', '2023-06-12', 'Từ thương hiệu nước ngọt có gas nổi tiếng toàn cầu với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.  Nước ngọt bổ sung năng lượng làm việc mỗi ngày. Cam kết sản phẩm chính hãng, chất lượng và an toàn', 1, 0, 8, 4),
(68, 'Nước Cam Ép Teppi', 10000.00, 1000.00, 'douong_teppy-cam.png', '2023-06-12', 'Chiết xuất từ những quả cam mọng nước cùng với những tép cam tươi hấp dẫn tự nhiên. Và được sản xuất theo công nghệ hiện đại, không chất độc hại không ảnh hưởng đến sức khỏe người tiêu dùng. Nước ép cam Teppy nguyên tép chứa nhiều vitamin C hỗ trợ cung cấp năng lượng cho cơ thể.', 0, 0, 8, 6),
(69, 'Nước Dừa Cocoxim Sen', 15000.00, 2000.00, 'douong_dua-sen.png', '2023-06-12', 'Sản phẩm được làm từ 100% nước dừa nguyên chất tại \'Thủ phủ dừa\' Bến Tre, sẽ là thức uống đồng hành cùng bạn mỗi ngày. Chỉ với một ly nước dừa Cocoxim mỗi ngày cơ thể bạn sẽ có sự thay đổi rõ rệt: làn da căng mịn hơn, cơ thể thon gọn và tràn đầy năng lượng hơn.', 1, 0, 8, 7),
(70, 'Nước Tăng Lực Sting', 8000.00, 1000.00, 'douong_sting.png', '2023-06-12', 'Sản phẩm nước tăng lực với mùi vị thơm ngon, sảng khoái, bổ sung hồng sâm chất lượng. Sting giúp cơ thể bù đắp nước, bổ sung năng lượng, vitamin C và E, giúp xua tan cơn khát và cảm giác mệt mỏi cùng dâu cho nhẹ nhàng và dễ chịu. Cam kết chính hãng, chất lượng và an toàn.', 1, 0, 8, 4),
(71, 'Nước gạo OKF No Sugar', 18000.00, 3000.00, 'douong_nuoc-gao.png', '2023-06-12', 'Nước gạo OKF No Sugar là một lựa chọn tốt cho những người muốn hạn chế tiêu thụ đường hoặc theo chế độ ăn ít đường. Nó là một nguồn cung cấp năng lượng và chứa nhiều chất xơ và vitamin B. Nước gạo OKF No Sugar không chỉ giúp giải khát mà còn mang lại lợi ích cho sức khỏe. Nước gạo OKF No Sugar thích hợp cho mọi lứa tuổi và có thể uống ngay từ chai mà không cần thêm đường. Nó là một sự lựa chọn tuyệt vời cho một loại nước giải khát tự nhiên, không có chất bảo quản hay hương liệu nhân tạo.', 0, 28, 8, 6),
(72, 'Nước trái cây Nutriboots Cam', 11000.00, 2000.00, 'douong_nutri.png', '2023-06-12', 'Sự kết hợp hoàn hảo từ sữa và nước trái cây vị cam. Sữa trái cây Nutri Boost hương cam chai 297ml giúp bù đắp nước, bổ sung năng lượng, vitamin B3, B6, E, C rất có lợi cho cơ thể,xua tan cơn khát và cảm giác mệt mỏi. Sản phẩm sữa trái cây chất lượng từ thương hiệu Nutriboost', 0, 0, 8, 6);

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
  `vai_tro` tinyint(1) NOT NULL COMMENT 'vai trò true là nhân viên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `hinh`, `sdt`, `email`, `vai_tro`) VALUES
('111111', '111111', 'Aliquid praesentium ', '2_1.png', '77', 'hijuga@mailinator.com', 0),
('222222', '222222', '222222', '1.1-removebg-preview.png', '222222', 'longdvph29867@fpt.edu.vn', 0),
('22222222', 'Pa$$w0rd!', 'Itaque nihil culpa d', '1.1-removebg-preview.png', '7', 'femotul@mailinator.com', 0),
('333333', 'Pa$$w0rd!', 'Accusantium autem ir', '3_1.png', '51', 'wocopifu@mailinator.com', 0),
('admin', 'admin', 'adminsssssss', 'user2.jpeg', '0123456789', 'admin@gmail.coms', 1),
('user', 'user', 'mungloli', 'Avatar Image (3).png', '0999999999', 'mykikox@mailinator.com', 0),
('user2', 'user2', 'hien', 'Avatar Image (1).png', '0978888888', 'user2@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(10) NOT NULL COMMENT 'mã loại hàng',
  `ten_loai` varchar(50) NOT NULL COMMENT 'tên loại hàng',
  `hinh_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`, `hinh_loai`) VALUES
(1, 'Thịt', 'category-meat.png'),
(2, 'Cá', 'category-fish.png'),
(3, 'Hải sản', 'categoty-seafood.png'),
(4, 'Rau', 'category-vegetable.png'),
(5, 'Hoa quả', 'category-fruit.png'),
(6, 'Sữa', 'category-milk.png'),
(7, 'Gia vị', 'category-spice.png'),
(8, 'Đồ uống', 'category-water.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai`
--

CREATE TABLE `trang_thai` (
  `ma_trang_thai` int(10) NOT NULL,
  `ten_trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai`
--

INSERT INTO `trang_thai` (`ma_trang_thai`, `ten_trang_thai`) VALUES
(1, 'Chờ Xác nhận'),
(2, 'Chờ giao hàng'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Đã huỷ'),
(6, 'Trả hàng');

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
  ADD KEY `ma_dh` (`ma_dh`),
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
-- Chỉ mục cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`ma_dv`);

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
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `gio_hang_ibfk_1` (`ma_kh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma loai` (`ma_loai`),
  ADD KEY `ma_dv` (`ma_dv`);

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
  MODIFY `ma_bl` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã bình luận', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `ma_danh_gia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  MODIFY `ma_dv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `don_vi_van_chuyen`
--
ALTER TABLE `don_vi_van_chuyen`
  MODIFY `ma_van_chuyen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã hàng hoá', AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã loại hàng', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `ma_trang_thai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `ma_dh` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`),
  ADD CONSTRAINT `ma_hh` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `ma_kh` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `ma_trang_thai` FOREIGN KEY (`ma_trang_thai`) REFERENCES `trang_thai` (`ma_trang_thai`),
  ADD CONSTRAINT `ma_van_chuyen` FOREIGN KEY (`ma_van_chuyen`) REFERENCES `don_vi_van_chuyen` (`ma_van_chuyen`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `ma loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ma_dv` FOREIGN KEY (`ma_dv`) REFERENCES `don_vi` (`ma_dv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
