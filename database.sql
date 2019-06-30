-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 31, 2019 lúc 04:13 PM
-- Phiên bản máy phục vụ: 5.6.43
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vovanhoa_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `mail`, `phone`) VALUES
(1, 'admin', 'admin', 'vovanhoangtuan@vovanhoangtuan.xyz', '0703348869');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh`
--

CREATE TABLE `anh` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `anh`
--

INSERT INTO `anh` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 2, 6, NULL, NULL, NULL, 6, 4, 9, NULL, NULL, 6.5, 6.5, NULL, NULL, NULL, 4.2, 5.5),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 2, 6, NULL, NULL, NULL, 6, 4, 9, NULL, NULL, 6.5, 6.5, NULL, NULL, NULL, NULL, 5.9),
(5, 18, 1, 2, 6, NULL, NULL, NULL, 6, 4, 9, NULL, NULL, 6.5, 6.5, NULL, NULL, NULL, NULL, 5.9),
(6, 20, 1, 2, 6, NULL, NULL, NULL, 6, 4, 9, NULL, NULL, 6.5, 6.5, NULL, NULL, NULL, NULL, 5.9),
(7, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 22, 1, 9, NULL, NULL, NULL, NULL, 5, 5, 7, NULL, NULL, 8, 7, NULL, NULL, NULL, 5.8, 6.7),
(9, 23, 1, 7, NULL, NULL, NULL, NULL, 6, 5, 9, NULL, NULL, 7.5, 7, NULL, NULL, NULL, 2.6, 5.8),
(10, 24, 1, 7, NULL, NULL, NULL, NULL, 6, 8, 7, NULL, NULL, 7, 8, NULL, NULL, NULL, 5.2, 6.7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL COMMENT 'id của lớp',
  `class` varchar(5) CHARACTER SET utf8 NOT NULL COMMENT 'tên lớp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(1, '12C1'),
(2, '12C2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congdan`
--

CREATE TABLE `congdan` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `congdan`
--

INSERT INTO `congdan` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 8, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, 9.3, NULL, NULL, NULL, NULL, 9.3, 9.1),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 8, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, 9.3, NULL, NULL, NULL, NULL, NULL, 8.9),
(5, 18, 1, 8, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, 9.3, NULL, NULL, NULL, NULL, NULL, 8.9),
(6, 20, 1, 8, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, 9.3, NULL, NULL, NULL, NULL, NULL, 8.9),
(7, 22, 1, 9, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, 9.3),
(8, 23, 1, 9, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, 8.8, NULL, NULL, NULL, NULL, NULL, 8.9),
(9, 24, 1, 8, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, 9.3, NULL, NULL, NULL, NULL, 8.5, 8.4),
(10, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congnghe`
--

CREATE TABLE `congnghe` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `congnghe`
--

INSERT INTO `congnghe` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 9, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, 9.5, NULL, NULL, NULL, NULL, 9.5, 9.1),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(5, 18, 1, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(6, 20, 1, 9, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, 9.5, NULL, NULL, NULL, NULL, 9.5, 9.1),
(7, 22, 1, 8, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, 9.5, NULL, NULL, NULL, NULL, 9.5, 9.4),
(8, 23, 1, 8, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, 9.5, NULL, NULL, NULL, NULL, 9.5, 9.4),
(9, 24, 1, 9, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, 9.5, NULL, NULL, NULL, NULL, 9.5, 9.4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia`
--

CREATE TABLE `dia` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dia`
--

INSERT INTO `dia` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 7.8, NULL, NULL, NULL, NULL, 7.5, 7.7),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 7.8, NULL, NULL, NULL, NULL, NULL, 7.9),
(5, 18, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 7.8, NULL, NULL, NULL, NULL, NULL, 7.9),
(6, 20, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 7.8, NULL, NULL, NULL, NULL, NULL, 7.9),
(7, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 22, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 6.8, NULL, NULL, NULL, NULL, 8.5, 7.9),
(9, 23, 1, 9, 10, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 7.8, NULL, NULL, NULL, NULL, 8.75, 8.6),
(10, 24, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, 6.8, NULL, NULL, NULL, NULL, 8.8, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa`
--

CREATE TABLE `hoa` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoa`
--

INSERT INTO `hoa` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 9, 6, NULL, NULL, NULL, 7, 6, 7, NULL, NULL, 8.3, 8.3, NULL, NULL, NULL, 5, 6.9),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 9, 6, NULL, NULL, NULL, 7, 6, 7, NULL, NULL, 8.3, 8.3, NULL, NULL, NULL, 5, 6.9),
(5, 18, 1, 9, 6, NULL, NULL, NULL, 7, 6, 7, NULL, NULL, 8.3, 8.3, NULL, NULL, NULL, 5, 6.9),
(6, 20, 1, 9, 6, NULL, NULL, NULL, 7, 6, 7, NULL, NULL, 8.3, 8.3, NULL, NULL, NULL, 5, 6.9),
(7, 22, 1, 3, 8, NULL, NULL, NULL, 9, 6, 9, NULL, NULL, 9.3, 8.3, NULL, NULL, NULL, 8, 7.9),
(8, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 23, 1, 2, 6, NULL, NULL, NULL, 3, 7, 7, NULL, NULL, 8, 8.7, NULL, NULL, NULL, 6.5, 6.5),
(10, 24, 1, 6, NULL, NULL, NULL, NULL, 7, 7, 8, NULL, NULL, 7, 8, NULL, NULL, NULL, 8, 7.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ly`
--

CREATE TABLE `ly` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ly`
--

INSERT INTO `ly` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, 5, NULL, NULL, NULL, NULL, 6, 8, 7, NULL, NULL, 5.3, NULL, NULL, NULL, NULL, 6.5, 6.2),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 17, 1, 5, NULL, NULL, NULL, NULL, 6, 8, 7, NULL, NULL, 5.3, NULL, NULL, NULL, NULL, NULL, 6.1),
(6, 18, 1, 5, NULL, NULL, NULL, NULL, 6, 8, 7, NULL, NULL, 5.3, NULL, NULL, NULL, NULL, NULL, 6.1),
(7, 20, 1, 5, NULL, NULL, NULL, NULL, 6, 8, 7, NULL, NULL, 5.3, NULL, NULL, NULL, NULL, NULL, 6.1),
(8, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 22, 1, 8, NULL, NULL, NULL, NULL, 8, 9, 7, NULL, NULL, 7, NULL, NULL, NULL, NULL, 8, 7.8),
(10, 23, 1, 7, NULL, NULL, NULL, NULL, 8, 7, 2, NULL, NULL, 6.7, NULL, NULL, NULL, NULL, 8.3, 6.9),
(11, 24, 1, 8, NULL, NULL, NULL, NULL, 7, 8, 8, NULL, NULL, 6.7, NULL, NULL, NULL, NULL, 7.3, 7.4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notice`
--

CREATE TABLE `notice` (
  `stt` int(11) NOT NULL COMMENT 'số thứ tự',
  `id` int(11) NOT NULL COMMENT 'id của người gửi',
  `tieude` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'tiều đề của thông báo',
  `noidung` text CHARACTER SET utf8 NOT NULL COMMENT 'nội dung của thông báo',
  `den_ai` int(11) NOT NULL COMMENT 'tên lớp nhận thông báo',
  `ngay_bd` date DEFAULT NULL COMMENT 'ngày bắt đầu',
  `ngay_kt` date DEFAULT NULL COMMENT 'ngày kết thúc',
  `thoigian` int(2) DEFAULT NULL COMMENT 'thời gian gửi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notice`
--

INSERT INTO `notice` (`stt`, `id`, `tieude`, `noidung`, `den_ai`, `ngay_bd`, `ngay_kt`, `thoigian`) VALUES
(2, 1, 'Kiểm tra', 'Ngày mai, các em ôn bài kiểm tra 1 tiết Toán.', 1, '2018-11-20', '2018-11-22', 18),
(3, 1, 'Ngày mai kiểm tra ', 'oon bafi', 1, '2018-12-10', '2018-12-13', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qp`
--

CREATE TABLE `qp` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qp`
--

INSERT INTO `qp` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, NULL, 8, NULL, NULL, NULL, NULL, 9, NULL, 9, NULL, 8, NULL, 9.5, NULL, 7.5, 9, 8.6),
(4, 17, 1, NULL, 8, NULL, NULL, NULL, NULL, 9, NULL, 9, NULL, 8, NULL, 9.5, NULL, 7.5, 9, 8.6),
(5, 18, 1, NULL, 8, NULL, NULL, NULL, NULL, 9, NULL, 9, NULL, 8, NULL, 9.5, NULL, 7.5, 9, 8.6),
(6, 20, 1, NULL, 8, NULL, NULL, NULL, NULL, 9, NULL, 9, NULL, 8, NULL, 9.5, NULL, 7.5, 9, 8.6),
(7, 22, 1, NULL, 8, NULL, NULL, NULL, NULL, 9, NULL, 5, NULL, 9, NULL, 9.5, NULL, 8, 9, 8.5),
(8, 23, 1, NULL, 9, NULL, NULL, NULL, NULL, 8, NULL, 8, NULL, 10, NULL, 10, NULL, 8.5, 8, 8.8),
(9, 24, 1, NULL, 7, NULL, NULL, NULL, NULL, 8, NULL, 5, NULL, 8, NULL, 10, NULL, 6.5, 9, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'access token của fb để gửi tin nhắn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `access_token`) VALUES
(1, 'EAAE9HVCdoxEBAJPOp8Hj7VZCLZA6XNoxXcOu4R2QaU3cBdYU1UbXtou5XV1I28Y6VeurpEcCBEr4F2OGJY5FpmsPLlLQiI2TiCvNJp7OpiswN0lCMmhfKtrk19TQDDq3wICG2ObLhnCy22ztLww5AqQQQw18IKXsBwAfOXxgZDZD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh`
--

CREATE TABLE `sinh` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinh`
--

INSERT INTO `sinh` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 8, NULL, NULL, NULL, NULL, 6, NULL, 8, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, 3.8, 6.3),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 8, NULL, NULL, NULL, NULL, 6, NULL, 8, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, 7.7),
(5, 18, 1, 8, NULL, NULL, NULL, NULL, 6, NULL, 8, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, 7.7),
(6, 20, 1, 8, NULL, NULL, NULL, NULL, 6, NULL, 8, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, 7.7),
(7, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 22, 1, 9, NULL, NULL, NULL, NULL, 7, NULL, 10, NULL, NULL, NULL, 6.5, NULL, NULL, NULL, 4.7, 6.6),
(9, 23, 1, 9, NULL, NULL, NULL, NULL, 8, NULL, 9, NULL, NULL, NULL, 7.5, NULL, NULL, NULL, 5, 7),
(10, 24, 1, 6, NULL, NULL, NULL, NULL, 8, NULL, 8, NULL, NULL, NULL, 7.3, NULL, NULL, NULL, 5, 6.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user` varchar(99) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(99) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sex` int(1) NOT NULL COMMENT '0: nu, 1: nam',
  `birthday` date NOT NULL,
  `class` varchar(10) CHARACTER SET utf8 NOT NULL,
  `id_facebook` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(99) CHARACTER SET utf8 NOT NULL,
  `smas` text COLLATE utf8_unicode_ci COMMENT 'tài khoản và mật khẩi smas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `user`, `pass`, `fullname`, `address`, `sex`, `birthday`, `class`, `id_facebook`, `phone`, `mail`, `smas`) VALUES
(1, 'vovanhoangtuan', 'vovanhoangtuan', 'Võ Văn Hoàng Tuân', 'Nha Trang', 1, '2001-02-02', '12C1', '1407641966004623', '01203348869', 'vovanhoangtuan4.2@gmail.com', '0898506398_330527Y%'),
(13, 'vovanhoangtuan22', '1111', 'Võ Văn Hoàng Tuấn', '2, Nguyễn Dữ', 1, '2018-10-06', '12C2', NULL, '', 'vovanhoagntuan4.2@gmail.com', NULL),
(14, 'vovanhoangtuan22333', '1111', 'Lê Thị Trâm', '2, Nguyễn Dữ', 0, '2001-10-06', '12C1', NULL, '01203445886', 'vovanhoagntuan4.2@gmail.com', NULL),
(15, '', '', '', '', 0, '0000-00-00', '', NULL, '', '', NULL),
(16, 'abcxyz123', '123456789q', 'Nguyễn Đức Lộc', '45 Trần Bình Trọng', 1, '2001-09-26', '12C1', NULL, '01658528707', 'cutega217@gmail.com', NULL),
(20, 'nguyenthia', 'nguyenthia', 'Nguyễn Thị A', 'Nha Trang', 1, '2001-11-11', '12C1', NULL, '0123456789', 'nguyenthia@gmail.com', '0898506398_330527Y%'),
(21, 'nhokngungo', '30082001z', 'Trần Hữu Minh', '5/1 hẻm A1 Hoàng Diệu', 1, '2001-08-30', '12C1', NULL, '0962729773', 'nhokngungo154@gmail.com', NULL),
(22, 'duongthithusang', 'duongthithusang', 'Dương Thị Thu Sang', 'Lương Sơn', 1, '2001-12-28', '12C1', NULL, '0587969890', 'duongthithusang@gmail.com', '0587969890_459775s@'),
(23, 'nguyenthithanhha', 'nguyenthithanhha', 'Nguyễn Thị Thanh Hà', 'Vĩnh Ngọc', 1, '2001-04-09', '12C1', '1795845310496866', '0123456789', 'nguyenthithanhha@gmail.com', '0372942635_7ql4mr71'),
(24, 'nguyenhung', 'nguyenhung', 'Nguyễn Hưng', 'Nha Trang', 1, '2019-01-03', '12C1', NULL, '0123456789', 'nguyenhung@gmail.com', '0905755687_7tl2as17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `su`
--

CREATE TABLE `su` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `su`
--

INSERT INTO `su` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 9, NULL, NULL, NULL, NULL, 6, 7, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, 8.5, 8),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 9, NULL, NULL, NULL, NULL, 6, 7, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, NULL, 7.7),
(5, 18, 1, 9, NULL, NULL, NULL, NULL, 6, 7, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, NULL, 7.7),
(6, 20, 1, 9, NULL, NULL, NULL, NULL, 6, 7, NULL, NULL, NULL, 8.3, NULL, NULL, NULL, NULL, NULL, 7.7),
(7, 22, 1, 7, NULL, NULL, NULL, NULL, 7, 7, NULL, NULL, NULL, 9.8, NULL, NULL, NULL, NULL, 8.5, 8.3),
(8, 23, 1, 9, NULL, NULL, NULL, NULL, 6, 8, NULL, NULL, NULL, 9.8, NULL, NULL, NULL, NULL, 8.5, 8.5),
(9, 24, 1, 7, NULL, NULL, NULL, NULL, 8, 7, NULL, NULL, NULL, 8.5, NULL, NULL, NULL, NULL, 7, 7.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id_sub` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id_sub`, `name`, `subject`) VALUES
(21, 'TOÁN', 'toan'),
(22, 'VẬT LÝ', 'ly'),
(23, 'HOÁ HỌC', 'hoa'),
(24, 'NGỮ VĂN', 'van'),
(25, 'ANH VĂN', 'anh'),
(26, 'SINH HỌC', 'sinh'),
(27, 'LỊCH SỬ', 'su'),
(28, 'ĐỊA LÝ', 'dia'),
(29, 'CÔNG DÂN', 'congdan'),
(30, 'CÔNG NGHỆ', 'congnghe'),
(31, 'TIN', 'tin'),
(32, 'QUỐC PHÒNG', 'qp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL COMMENT 'số thứ tự',
  `user` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'tài khoản',
  `pass` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'mật khẩu',
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'họ và tên',
  `birthday` date NOT NULL COMMENT 'ngày sinh',
  `address` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'địa chỉ',
  `sex` int(1) NOT NULL COMMENT 'giới tính',
  `t_class` int(11) DEFAULT NULL COMMENT 'có chủ nhiệm hay không',
  `s_teacher` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'dạy bộ môn lớp nào',
  `id_sub` int(11) NOT NULL COMMENT 'id của môn dạy',
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'số điện thoại',
  `mail` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'địa chỉ mail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `user`, `pass`, `fullname`, `birthday`, `address`, `sex`, `t_class`, `s_teacher`, `id_sub`, `phone`, `mail`) VALUES
(1, 'tranthia', 'tranthia', 'Trần Thị A', '1975-10-28', 'Nha Trang', 0, 1, '[\"1\",\"2\"]', 21, '0123456789', 'tranthia@gmail.com'),
(2, 'nguyenvanb', 'nguyenvanb', 'Nguyễn Văn B', '1970-09-27', 'Nha Trang', 1, 2, '[\"2\",\"1\"]', 22, '01203348869', 'nguyenvanb@gmail.com'),
(3, 'tranthihoa', 'tranthihoa', 'Trần Thị Hoá', '2018-12-01', 'Nha Trang', 0, 0, '{\"1\":\"1\"}', 23, '0123456789', 'tranthihoa@gmail.com'),
(4, 'tranthivan', 'tranthivan', 'Trần Thị Văn', '2018-12-02', 'Nha Trnag', 1, 0, '[\"1\"]', 24, '456456546', 'tranthivan@gmail.com'),
(5, 'tranthisinh', 'tranthisinh', 'Trần Thị Sinh', '2018-12-09', 'Nha Trang', 0, 0, '[\"1\"]', 26, '0123456789', 'tranthisinh@gmail.com'),
(6, 'tranthisu', 'tranthisu', 'Trần Thị Sử', '2018-12-09', 'Nha Trang', 1, 0, '[\"1\"]', 27, '055552544555', 'tranthisu@gmail.com'),
(7, 'tranthidia', 'tranthidia', 'Trần Thị Địa', '2018-12-09', 'Nha Trang', 0, 0, '[\"1\"]', 28, '055552544555', 'tranthidia@gmail.com'),
(8, 'tranthidan', 'tranthidan', 'Trần Thị Dân', '2018-12-09', 'Nha Trang', 0, 0, '[\"1\"]', 29, '055552544555', 'tranthidan@gmail.com'),
(9, 'tranthinghe', 'tranthinghe', 'Trần Thị Nghệ', '2018-12-09', 'Nha Trang', 0, 0, '[\"1\"]', 30, '055552544555', 'tranthinghe@gmail.com'),
(10, 'tranvantin', 'tranvantin', 'Trần Văn Tin', '2018-12-23', 'Khánh Hoà', 1, 0, '[\"1\"]', 31, '6456456546', 'tranvantin@gmail.com'),
(11, 'tranthianh', 'tranthianh', 'Trần Thị Anh', '2018-12-02', 'Khánh Hoà', 0, 0, '[\"1\"]', 25, '45645654654', 'tranthianh@gmail.com'),
(12, 'nguyenvanphong', 'nguyenvanphong', 'Nguyễn Văn Phong', '2018-12-22', 'Nha Trang', 1, 0, '[\"1\"]', 32, '464564565', 'nguyenvanphong@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `term`
--

CREATE TABLE `term` (
  `id_hk` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 là hk1, 2 là hk2',
  `year` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(1) DEFAULT '0' COMMENT 'cái nào là học kì chính'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `term`
--

INSERT INTO `term` (`id_hk`, `type`, `year`, `main`) VALUES
(1, 1, '2018-2019', 1),
(2, 2, '2018-2019', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin`
--

CREATE TABLE `tin` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tin`
--

INSERT INTO `tin` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, 7, NULL, NULL, NULL, NULL, 8, NULL, 10, NULL, NULL, 6.5, NULL, 9.3, NULL, NULL, 10, 8.7),
(4, 17, 1, 7, NULL, NULL, NULL, NULL, 8, NULL, 10, NULL, NULL, 6.5, NULL, 9.3, NULL, NULL, 10, 8.7),
(5, 18, 1, 7, NULL, NULL, NULL, NULL, 8, NULL, 10, NULL, NULL, 6.5, NULL, 9.3, NULL, NULL, 10, 8.7),
(6, 20, 1, 7, NULL, NULL, NULL, NULL, 8, NULL, 10, NULL, NULL, 6.5, NULL, 9.3, NULL, NULL, 10, 8.7),
(7, 22, 1, 8, NULL, NULL, NULL, NULL, 8, NULL, 10, NULL, NULL, 7.5, NULL, 9.3, NULL, NULL, 10, 9),
(8, 23, 1, 9, NULL, NULL, NULL, NULL, 7, NULL, 10, NULL, NULL, 7.5, NULL, 9.3, NULL, NULL, 9, 8.7),
(9, 24, 1, 9, NULL, NULL, NULL, NULL, 7, NULL, 7, NULL, NULL, 8, NULL, 8.8, NULL, NULL, 10, 8.7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toan`
--

CREATE TABLE `toan` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `toan`
--

INSERT INTO `toan` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, 8, NULL, NULL, NULL, NULL, 8, 5.5, 3, NULL, NULL, 5.6, 6.5, 8, NULL, NULL, 6.8, 6.5),
(3, 15, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 13, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(5, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 17, 1, 8, NULL, NULL, NULL, NULL, 8, 5.5, 3, NULL, NULL, 5.6, 6.5, 8, NULL, NULL, NULL, 6.5),
(7, 18, 1, 8, NULL, NULL, NULL, NULL, 8, 5.5, 3, NULL, NULL, 5.6, 6.5, 8, NULL, NULL, NULL, 6.5),
(8, 20, 1, 8, NULL, NULL, NULL, NULL, 8, 5.5, 3, NULL, NULL, 5.6, 6.5, 8, NULL, NULL, NULL, 6.5),
(9, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 22, 1, 10, NULL, NULL, NULL, NULL, 5, 8, 5.5, NULL, NULL, 6.8, 6.5, 8, NULL, NULL, 7.4, 7.2),
(11, 23, 1, 9, NULL, NULL, NULL, NULL, 2.5, 3.5, 4.5, NULL, NULL, 6.4, 7, 8.4, NULL, NULL, 8.6, 6.8),
(12, 24, 1, 9, NULL, NULL, NULL, NULL, 5.5, 7, 4.5, NULL, NULL, 6, 6.5, 6.4, NULL, NULL, 8.8, 6.9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `van`
--

CREATE TABLE `van` (
  `id` int(11) NOT NULL,
  `id_hs` int(11) NOT NULL,
  `id_hk` int(11) NOT NULL,
  `mieng1` float DEFAULT NULL,
  `mieng2` float DEFAULT NULL,
  `mieng3` float DEFAULT NULL,
  `mieng4` float DEFAULT NULL,
  `mieng5` float DEFAULT NULL,
  `15p1` float DEFAULT NULL,
  `15p2` float DEFAULT NULL,
  `15p3` float DEFAULT NULL,
  `15p4` float DEFAULT NULL,
  `15p5` float DEFAULT NULL,
  `1t1` float DEFAULT NULL,
  `1t2` float DEFAULT NULL,
  `1t3` float DEFAULT NULL,
  `1t4` float DEFAULT NULL,
  `1t5` float DEFAULT NULL,
  `hk` float DEFAULT NULL,
  `tb` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `van`
--

INSERT INTO `van` (`id`, `id_hs`, `id_hk`, `mieng1`, `mieng2`, `mieng3`, `mieng4`, `mieng5`, `15p1`, `15p2`, `15p3`, `15p4`, `15p5`, `1t1`, `1t2`, `1t3`, `1t4`, `1t5`, `hk`, `tb`) VALUES
(1, 1, 1, 8, NULL, NULL, NULL, NULL, 7.5, 9, 8.5, NULL, NULL, 4, 6.5, 7.5, NULL, NULL, 5.5, 6.6),
(2, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 16, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 17, 1, 8, NULL, NULL, NULL, NULL, 7.5, 9, NULL, NULL, NULL, 4, 6.5, 7.5, NULL, NULL, NULL, 6.7),
(5, 18, 1, 8, NULL, NULL, NULL, NULL, 7.5, 9, NULL, NULL, NULL, 4, 6.5, 7.5, NULL, NULL, NULL, 6.7),
(6, 20, 1, 8, NULL, NULL, NULL, NULL, 7.5, 9, NULL, NULL, NULL, 4, 6.5, 7.5, NULL, NULL, NULL, 6.7),
(7, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 22, 1, 8, 9, NULL, NULL, NULL, 8, 8.5, 8.5, NULL, NULL, 4.5, 6, 6.5, NULL, NULL, NULL, 6.9),
(9, 23, 1, 8, NULL, NULL, NULL, NULL, 9, 9, NULL, NULL, NULL, 7, 8, 9, NULL, NULL, NULL, 8.2),
(10, 24, 1, 6, NULL, NULL, NULL, NULL, 8, 8.5, NULL, NULL, NULL, 4.5, 6.5, 8.5, NULL, NULL, 6, 6.6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_ANH` (`id_hk`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `congdan`
--
ALTER TABLE `congdan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_CONGDAN` (`id_hk`);

--
-- Chỉ mục cho bảng `congnghe`
--
ALTER TABLE `congnghe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_CONGNGHE` (`id_hk`);

--
-- Chỉ mục cho bảng `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_DIA` (`id_hk`);

--
-- Chỉ mục cho bảng `hoa`
--
ALTER TABLE `hoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_HOA` (`id_hk`);

--
-- Chỉ mục cho bảng `ly`
--
ALTER TABLE `ly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_LY` (`id_hk`);

--
-- Chỉ mục cho bảng `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `qp`
--
ALTER TABLE `qp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_QP` (`id_hk`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinh`
--
ALTER TABLE `sinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_SINH` (`id_hk`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `su`
--
ALTER TABLE `su`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_SU` (`id_hk`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_sub` (`id_sub`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sub` (`id_sub`);

--
-- Chỉ mục cho bảng `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id_hk`),
  ADD KEY `id` (`id_hk`),
  ADD KEY `id_hk` (`id_hk`);

--
-- Chỉ mục cho bảng `tin`
--
ALTER TABLE `tin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_TIN` (`id_hk`);

--
-- Chỉ mục cho bảng `toan`
--
ALTER TABLE `toan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_TOAN` (`id_hk`);

--
-- Chỉ mục cho bảng `van`
--
ALTER TABLE `van`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERM_VAN` (`id_hk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `anh`
--
ALTER TABLE `anh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của lớp', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `congdan`
--
ALTER TABLE `congdan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `congnghe`
--
ALTER TABLE `congnghe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dia`
--
ALTER TABLE `dia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hoa`
--
ALTER TABLE `hoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ly`
--
ALTER TABLE `ly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `notice`
--
ALTER TABLE `notice`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT COMMENT 'số thứ tự', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `qp`
--
ALTER TABLE `qp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sinh`
--
ALTER TABLE `sinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `su`
--
ALTER TABLE `su`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'số thứ tự', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `term`
--
ALTER TABLE `term`
  MODIFY `id_hk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tin`
--
ALTER TABLE `tin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `toan`
--
ALTER TABLE `toan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `van`
--
ALTER TABLE `van`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anh`
--
ALTER TABLE `anh`
  ADD CONSTRAINT `FK_TERM_ANH` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `congdan`
--
ALTER TABLE `congdan`
  ADD CONSTRAINT `FK_TERM_CONGDAN` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `congnghe`
--
ALTER TABLE `congnghe`
  ADD CONSTRAINT `FK_TERM_CONGNGHE` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dia`
--
ALTER TABLE `dia`
  ADD CONSTRAINT `FK_TERM_DIA` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa`
--
ALTER TABLE `hoa`
  ADD CONSTRAINT `FK_TERM_HOA` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ly`
--
ALTER TABLE `ly`
  ADD CONSTRAINT `FK_TERM_LY` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `FK_notice_teacher` FOREIGN KEY (`id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `qp`
--
ALTER TABLE `qp`
  ADD CONSTRAINT `FK_TERM_QP` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sinh`
--
ALTER TABLE `sinh`
  ADD CONSTRAINT `FK_TERM_SINH` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `su`
--
ALTER TABLE `su`
  ADD CONSTRAINT `FK_TERM_SU` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tin`
--
ALTER TABLE `tin`
  ADD CONSTRAINT `FK_TERM_TIN` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `toan`
--
ALTER TABLE `toan`
  ADD CONSTRAINT `FK_TERM_TOAN` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `van`
--
ALTER TABLE `van`
  ADD CONSTRAINT `FK_TERM_VAN` FOREIGN KEY (`id_hk`) REFERENCES `term` (`id_hk`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
