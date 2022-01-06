-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2021 lúc 09:01 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhangid` int(11) NOT NULL,
  `sanphamid` int(11) NOT NULL,
  `mshh` varchar(5) NOT NULL,
  `dh_soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhangid` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`donhangid`, `sanphamid`, `mshh`, `dh_soluong`, `mahang`, `khachhangid`, `ngaythang`, `tinhtrang`) VALUES
(1, 18, 'giay4', 1, '8503', 31, '2020-12-31 15:56:47', 0),
(2, 14, 'AP7', 1, '8431', 31, '2020-12-31 16:03:44', 0),
(3, 16, 'giay2', 1, '7190', 31, '2020-12-31 16:04:18', 0),
(4, 21, 'giay7', 1, '7190', 31, '2020-12-31 16:04:18', 0),
(5, 18, 'giay4', 1, '7190', 31, '2020-12-31 16:04:18', 0),
(6, 14, 'AP7', 1, '7190', 31, '2020-12-31 16:04:18', 0),
(7, 20, 'giay6', 1, '7190', 31, '2020-12-31 16:04:18', 0),
(8, 17, 'giay3', 1, '8017', 31, '2020-12-31 16:05:01', 0),
(9, 21, 'giay7', 1, '8017', 31, '2020-12-31 16:05:01', 0),
(10, 16, 'giay2', 1, '8017', 31, '2020-12-31 16:05:01', 0),
(11, 11, 'AP4', 1, '8017', 31, '2020-12-31 16:05:01', 0),
(12, 18, 'giay4', 1, '8017', 31, '2020-12-31 16:05:01', 0),
(13, 19, 'giay5', 1, '9612', 31, '2020-12-31 16:10:24', 0),
(14, 18, 'giay4', 1, '9612', 31, '2020-12-31 16:10:24', 0),
(15, 4, 'CLBDM', 1, '9612', 31, '2020-12-31 16:10:24', 0),
(16, 20, 'giay6', 1, '5007', 32, '2020-12-31 16:12:14', 0),
(17, 21, 'giay7', 1, '5007', 32, '2020-12-31 16:12:14', 0),
(18, 14, 'AP7', 1, '3745', 20, '2021-01-01 02:02:23', 0),
(19, 18, 'giay4', 1, '3745', 20, '2021-01-01 02:02:23', 0),
(20, 20, 'giay6', 1, '3745', 20, '2021-01-01 02:02:23', 0),
(21, 21, 'giay7', 7, '3745', 20, '2021-01-01 02:02:23', 0),
(22, 5, 'CLBMU', 1, '4598', 20, '2021-01-01 02:02:39', 0),
(23, 11, 'AP4', 1, '4598', 20, '2021-01-01 02:02:39', 0),
(24, 4, 'gk1', 1, '4598', 20, '2021-01-01 02:02:39', 0),
(25, 19, 'giay5', 1, '4598', 20, '2021-01-01 02:02:39', 0),
(26, 21, 'giay7', 1, '881', 20, '2021-01-01 02:02:58', 0),
(27, 20, 'giay6', 1, '881', 20, '2021-01-01 02:02:58', 0),
(28, 18, 'giay4', 1, '881', 20, '2021-01-01 02:02:58', 0),
(29, 4, 'gk1', 1, '881', 20, '2021-01-01 02:02:58', 0),
(30, 5, 'gk2', 1, '881', 20, '2021-01-01 02:02:58', 0),
(31, 18, 'giay4', 5, '8778', 33, '2021-01-01 02:21:17', 0),
(32, 14, 'AP7', 1, '8778', 33, '2021-01-01 02:21:17', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `giaodichid` int(11) NOT NULL,
  `sanphamid` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhangid` int(11) NOT NULL,
  `mshh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`giaodichid`, `sanphamid`, `soluong`, `magiaodich`, `ngaythang`, `khachhangid`, `mshh`) VALUES
(21, 2, 1, '6425', '2020-12-27 06:42:45', 29, 'giay2'),
(22, 3, 1, '6425', '2020-12-27 06:42:45', 29, 'giay3'),
(23, 4, 1, '6425', '2020-12-27 06:42:45', 29, 'giay4'),
(24, 5, 1, '6425', '2020-12-27 06:42:45', 29, 'giay5'),
(25, 7, 3, '3864', '2020-12-29 01:28:48', 30, 'ak1'),
(26, 6, 1, '3864', '2020-12-29 01:28:48', 30, 'giay6'),
(27, 2, 1, '3864', '2020-12-29 01:28:48', 30, 'bong2'),
(28, 4, 2, '3864', '2020-12-29 01:28:48', 30, 'gk1'),
(29, 5, 1, '3864', '2020-12-29 01:28:48', 30, 'CLBMU'),
(30, 4, 2, '3864', '2020-12-29 01:28:48', 30, 'AP4'),
(31, 5, 1, '3864', '2020-12-29 01:28:48', 30, 'giay5'),
(32, 2, 1, '3864', '2020-12-29 01:28:48', 30, 'gk3'),
(45, 14, 1, '3745', '2021-01-01 02:02:23', 20, 'AP7'),
(46, 18, 1, '3745', '2021-01-01 02:02:23', 20, 'giay4'),
(47, 20, 1, '3745', '2021-01-01 02:02:23', 20, 'giay6'),
(48, 21, 7, '3745', '2021-01-01 02:02:23', 20, 'giay7'),
(49, 5, 1, '4598', '2021-01-01 02:02:39', 20, 'CLBMU'),
(50, 11, 1, '4598', '2021-01-01 02:02:39', 20, 'AP4'),
(51, 4, 1, '4598', '2021-01-01 02:02:39', 20, 'gk1'),
(52, 19, 1, '4598', '2021-01-01 02:02:39', 20, 'giay5'),
(53, 21, 1, '881', '2021-01-01 02:02:58', 20, 'giay7'),
(54, 20, 1, '881', '2021-01-01 02:02:58', 20, 'giay6'),
(55, 18, 1, '881', '2021-01-01 02:02:58', 20, 'giay4'),
(56, 4, 1, '881', '2021-01-01 02:02:58', 20, 'gk1'),
(57, 5, 1, '881', '2021-01-01 02:02:58', 20, 'gk2'),
(58, 18, 5, '8778', '2021-01-01 02:21:17', 33, 'giay4'),
(59, 14, 1, '8778', '2021-01-01 02:21:17', 33, 'AP7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `giohangid` int(11) NOT NULL,
  `tenhh` varchar(255) NOT NULL,
  `mshh` varchar(50) NOT NULL,
  `gia` varchar(50) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `spid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa1`
--

CREATE TABLE `hanghoa1` (
  `id` int(11) NOT NULL,
  `mshh` varchar(5) NOT NULL,
  `tenhh` varchar(50) NOT NULL,
  `gia` int(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `idloai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa1`
--

INSERT INTO `hanghoa1` (`id`, `mshh`, `tenhh`, `gia`, `soluong`, `hinh`, `idloai`) VALUES
(1, 'CLBAJ', 'Áo Thi Đấu CLB Ajax', 140000, 50, './MVC/Public/pic/AoBD/Ajax.PNG', 1),
(2, 'CLBAS', 'Áo Thi Đấu CLB Asernal', 180000, 50, './MVC/Public/pic/AoBD/Asernal.PNG', 1),
(3, 'CLBBM', 'Áo Thi Đấu CLB Bayern Munich', 120000, 50, './MVC/Public/pic/AoBD/Bayern.PNG', 1),
(4, 'CLBDM', 'Áo Thi Đấu CLB Dortmund ', 160000, 10, './MVC/Public/pic/AoBD/DM.PNG', 1),
(5, 'CLBMU', 'Áo Thi Đấu CLB Manchester United', 140000, 60, './MVC/Public/pic/AoBD/MU.PNG', 1),
(6, 'CLBTP', 'Áo Thi Đấu CLB TP.HCM', 160000, 60, './MVC/Public/pic/AoBD/hcm.jpg', 1),
(7, 'CLBJV', 'Áo Thi Đấu CLB Juvetus', 145000, 60, './MVC/Public/pic/AoBD/hh1.jpg', 1),
(8, 'AP1', 'Áo Phông Out The Run', 800000, 50, './MVC/Public/pic/AoPhong/Ao Own the run.JPG', 2),
(9, 'AP2', 'Áo Phông Outline', 300000, 50, './MVC/Public/pic/AoPhong/Ao Phong outlne.JPG', 2),
(10, 'AP3', 'Áo Polo Adicross', 200000, 50, './MVC/Public/pic/AoPhong/Ao polo adicross.JPG', 2),
(11, 'AP4', 'Áo Polo Ultimate 365', 150000, 50, './MVC/Public/pic/AoPhong/Ao polo ultimate 365.JPG', 2),
(12, 'AP5', 'Áo Predator Minia', 200000, 30, './MVC/Public/pic/AoPhong/Ao predator minia.JPG', 2),
(13, 'AP6', 'Áo Adidas Sport', 200000, 30, './MVC/Public/pic/AoPhong/ap1.jpg', 2),
(14, 'AP7', 'Áo Adidas Trắng', 250000, 10, './MVC/Public/pic/AoPhong/ap2.jpg', 2),
(15, 'giay1', 'Giày Air Force 1 Shadow', 3000000, 50, './MVC/Public/pic/Giay/giay air force 1 shadow.JPG', 3),
(16, 'giay2', 'Giày Air Max Excee', 3000000, 50, './MVC/Public/pic/Giay/Giay air max excee.JPG', 3),
(17, 'giay3', 'Giày Air Max Impact', 1000000, 50, './MVC/Public/pic/Giay/giay air max impact.JPG', 3),
(18, 'giay4', 'Giày Fluidstreet', 1000000, 50, './MVC/Public/pic/Giay/Giay Fluidstreet.JPG', 3),
(19, 'giay5', 'Giày Jordan Mars 270 ', 2000000, 25, './MVC/Public/pic/Giay/giay jordan mars 270.jpg', 3),
(20, 'giay6', 'Giày Ultra Boost 20', 2500000, 30, './MVC/Public/pic/Giay/Giay Ultra Boost 20.jpg', 3),
(21, 'giay7', 'Giày Rapidarun', 2300000, 40, './MVC/Public/pic/Giay/giay rapidarun.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhangid` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `sodienthoai` varchar(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ghichu` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `giaohang` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachhangid`, `ten`, `sodienthoai`, `diachi`, `ghichu`, `email`, `giaohang`, `password`) VALUES
(20, 'Hưng Nguyễn', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', '2', 'avav@gmail.com', 1, '87cfe89dd6e63c2ae0a206cecc4c3b64'),
(21, 'Quốc Hưng', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'as', 'quochungst1311@gmail.com', 1, '4ca288c10794bba0aaed993726e076f8'),
(22, 'Loc', '123', 'abc', '1235', 'hunglaprost45@gmail.com', 0, ''),
(23, 'Minh Hiếu', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'ABC', 'minhhieu@gmail.com', 0, 'e36a688e4838c0f47f7eca369706d43b'),
(24, 'Vinh', '132123', '137 Trần Vĩnh kiết (Hẻm 7)', '', 'vinh@gmail.com', 0, '6d9573b8494223ea50d7e15075d45a0c'),
(25, 'Hoa', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', '', 'hoa@gmail.com', 0, '202cb962ac59075b964b07152d234b70'),
(26, 'Hoa2', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', '', 'hoa@gmail.com', 0, '202cb962ac59075b964b07152d234b70'),
(27, 'Sơn', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', '', 'son@gmail.com', 0, '202cb962ac59075b964b07152d234b70'),
(28, 'Vinh', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'ghtk', 'vinh@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e'),
(29, 'Hưng Nguyễn', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'abc', 'hung@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e'),
(30, 'Khang', '0123456', '137 Trần Vĩnh kiết (Hẻm 7)', 'a', 'khang@gmail.com', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(31, 'Hưng Nguyễn', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'a', 'hunglaprost48@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e'),
(32, 'Hưng Nguyễn', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'sad', '0834445508', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(33, 'Thịnh', '0834445508', '137 Trần Vĩnh kiết (Hẻm 7)', 'a', 'thinh@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `admin_name`) VALUES
(1, 'Hung Nguyen', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, 'Hung', '123', ''),
(5, 'admin', '123', ''),
(16, 'admin2', '202cb962ac59075b964b07152d234b70', ''),
(21, 'admin3', '202cb962ac59075b964b07152d234b70', 'Hưng Nguyễn'),
(22, 'admin4', '202cb962ac59075b964b07152d234b70', 'Hưng Nguyễn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `msnv` varchar(5) NOT NULL,
  `hotennv` varchar(50) NOT NULL,
  `chucvu` varchar(50) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`id`, `tenloai`) VALUES
(1, 'aothidau'),
(2, 'aophong'),
(3, 'giay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamkhuyenmai`
--

CREATE TABLE `sanphamkhuyenmai` (
  `id` int(11) NOT NULL,
  `mshh` varchar(5) NOT NULL,
  `tenhh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `giakhuyenmai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanphamkhuyenmai`
--

INSERT INTO `sanphamkhuyenmai` (`id`, `mshh`, `tenhh`, `soluong`, `hinh`, `gia`, `giakhuyenmai`) VALUES
(1, 'bong1', 'Bóng C1', 50, './MVC/Public/pic/spkm/B1.png', 350000, 320000),
(2, 'bong2', 'Bóng UEFA', 50, './MVC/Public/pic/spkm/B2.png', 350000, 300000),
(3, 'bong3', 'Bóng World Cup', 10, './MVC/Public/pic/spkm/B3.png', 350000, 250000),
(4, 'gk1', 'Giày Nike Mecury', 50, './MVC/Public/pic/spkm/G1.png', 750000, 730000),
(5, 'gk2', 'Giày CR7', 50, './MVC/Public/pic/spkm/G2.png', 730000, 500000),
(6, 'gk3', 'Giày Mecurial', 30, './MVC/Public/pic/spkm/G4.png', 2800000, 2500000),
(7, 'ak1', 'Áo Khoác thể thao', 30, './MVC/Public/pic/spkm/spkm.jpg', 300000, 250000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhangid`),
  ADD KEY `sanphamid` (`sanphamid`),
  ADD KEY `khachhangid` (`khachhangid`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`giaodichid`),
  ADD KEY `sanphamid` (`sanphamid`),
  ADD KEY `khachhangid` (`khachhangid`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`giohangid`),
  ADD KEY `spid` (`spid`);

--
-- Chỉ mục cho bảng `hanghoa1`
--
ALTER TABLE `hanghoa1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhangid`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`msnv`);

--
-- Chỉ mục cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD PRIMARY KEY (`id`,`mshh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `giaodichid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `giohangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `hanghoa1`
--
ALTER TABLE `hanghoa1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachhangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`sanphamid`) REFERENCES `hanghoa1` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`sanphamid`) REFERENCES `hanghoa1` (`id`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`sanphamid`) REFERENCES `hanghoa1` (`id`),
  ADD CONSTRAINT `donhang_ibfk_4` FOREIGN KEY (`khachhangid`) REFERENCES `khachhang` (`khachhangid`);

--
-- Các ràng buộc cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `giaodich_ibfk_1` FOREIGN KEY (`sanphamid`) REFERENCES `hanghoa1` (`id`),
  ADD CONSTRAINT `giaodich_ibfk_2` FOREIGN KEY (`khachhangid`) REFERENCES `khachhang` (`khachhangid`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`spid`) REFERENCES `hanghoa1` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
