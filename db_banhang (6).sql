-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2024 lúc 09:47 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, '<p><span style=\"font-size:48px\">Tầm nh&igrave;n &amp; ho&agrave;i b&atilde;o của thương hiệu</span></p>', 'pA16_Gray Minimalist New Collection Banner.jpg', '<p>EShoper sẽ thiết lập một chuẩn mực mới cho ng&agrave;nh thời trang tại Việt Nam, mang đến cho kh&aacute;ch h&agrave;ng những trải nghiệm mua sắm độc nhất chỉ c&oacute; tại cửa h&agrave;ng của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Ho&agrave;i b&atilde;o của ch&uacute;ng t&ocirc;i l&agrave; phục vụ Thời trang đẹp c&ugrave;ng đội ngũ Nh&acirc;n Vi&ecirc;n Chuy&ecirc;n Nghiệp, Nhiệt t&igrave;nh v&agrave; l&agrave; một Th&agrave;nh Vi&ecirc;n Tốt của cộng đồng.</p>\r\n\r\n<p>Thời trang đẹp: ch&uacute;ng t&ocirc;i cung cấp những sản phẩm thời trang chất lượng từ c&aacute;c nh&atilde;n h&agrave;ng uy t&iacute;n v&agrave; được chọn lựa kỹ c&agrave;ng để đ&aacute;p ứng nhu cầu của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, nhiệt t&igrave;nh: ch&uacute;ng t&ocirc;i lu&ocirc;n tạo điều kiện cho nh&acirc;n vi&ecirc;n ph&aacute;t triển sự nghiệp c&ugrave;ng c&ocirc;ng ty; từ đ&oacute;, c&ugrave;ng nhau, ch&uacute;ng t&ocirc;i phục vụ kh&aacute;ch h&agrave;ng một c&aacute;ch tốt nhất.</p>\r\n\r\n<p>Th&agrave;nh vi&ecirc;n tốt của cộng đồng: Ch&uacute;ng t&ocirc;i lu&ocirc;n quan t&acirc;m đến cộng đồng, đặc biệt l&agrave; trẻ em v&agrave; c&aacute;c gia đ&igrave;nh; ch&uacute;ng t&ocirc;i mong muốn g&oacute;p phần l&agrave;m phong ph&uacute; hơn cuộc sống của mọi người th&ocirc;ng qua việc cung cấp c&aacute;c sản phẩm thời trang đẹp v&agrave; chất lượng.</p>', 'Hiện', '2020-12-10 05:05:31', '2024-05-01 04:09:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `slide`, `link`, `title`, `status`, `created_at`, `updated_at`) VALUES
(5, 'kbAu_Brown Minimalist Fashion Product Banner (2).png', '2bA3_signature-revenue-officer-photography-signature-38548f9ffe66b9d54f81d1c6a8206729.png', 'http://localhost/Graduation-Project', 'Mua ngay', 'Hiện', '2024-01-25 13:41:47', '2024-04-12 11:01:52'),
(6, 'PL7o_Brown Minimalist Fashion Product Banner (4).png', '0ckI_signature-revenue-officer-photography-signature-38548f9ffe66b9d54f81d1c6a8206729.png', 'http://localhost/Graduation-Project', 'Sale', 'Hiện', '2024-04-11 09:07:34', '2024-04-12 11:01:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Xu hướng thời trang mùa hè 2024', '<p>Từ những thiết kế đậm chất c&ocirc;ng sở đến trang phục dạo phố v&agrave; đầm dự tiệc, 5 xu hướng nổi bật từ bộ sưu tập The Flow Xu&acirc;n H&egrave; 2025 mang đến cho qu&yacute; c&ocirc; vẻ đẹp nữ t&iacute;nh, sang trọng, hiện đại v&agrave; gi&agrave;u t&iacute;nh ứng dụng.</p>', 'gixP_xu-huong-thoi-trang-2024-gam-mau-cua-tu-do-va-hy-vong-so-1-800x499.png', '<p style=\"text-align:center\"><strong>1. Xu hướng c&ocirc;ng sở 2024 ưu &aacute;i c&aacute;c set đồ blazer ph&aacute; c&aacute;ch</strong></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-11-1711016306103189398426.jpg\" target=\"_blank\" title=\"Một trong những phong cách được đánh giá cao của năm nay chính là phối áo blazer cùng quần shorts. Kiểu quần ngắn trên gối mang đến sự mát mẻ và trẻ trung cho người mặc, khi kết hợp cùng nét thanh lịch, cá tính của blazer tạo nên cặp đôi đối lập nhưng thú vị. Set áo blazer ngắn tay gam màu hồng san hô mang đến vẻ đẹp nhẹ nhàng, ngọt dịu như tưới mát tâm hồn nàng khi bước vào mùa nắng\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 1.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-11-1711016306103189398426.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 1.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Một trong những phong c&aacute;ch được đ&aacute;nh gi&aacute; cao của năm nay ch&iacute;nh l&agrave; phối &aacute;o blazer c&ugrave;ng quần shorts. Kiểu quần ngắn tr&ecirc;n gối mang đến sự m&aacute;t mẻ v&agrave; trẻ trung cho người mặc, khi kết hợp c&ugrave;ng n&eacute;t thanh lịch, c&aacute; t&iacute;nh của blazer tạo n&ecirc;n cặp đ&ocirc;i đối lập nhưng th&uacute; vị. Set &aacute;o blazer ngắn tay gam&nbsp;<a href=\"https://thanhnien.vn/thoi-trang-tre/den-cong-so-voi-gam-mau-hong-nhat-diu-mat-185230404105017725.htm\" title=\"màu hồng san hô\">m&agrave;u hồng san h&ocirc;</a>&nbsp;mang đến vẻ đẹp nhẹ nh&agrave;ng, ngọt dịu như tưới m&aacute;t t&acirc;m hồn n&agrave;ng khi bước v&agrave;o m&ugrave;a nắng</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-1-1711016305328261700911.jpg\" target=\"_blank\" title=\"Áo blazer là thiết kế dành cho dành cho cô nàng công sở đang tìm kiếm bộ trang phục trẻ trung, cá tính nhưng vẫn giữ được nét lịch sự, duyên dáng. Không chỉ riêng quần shorts mà chân váy ngắn cũng là một lựa chọn thú vị khi kết hợp cùng áo blazer\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 2.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-1-1711016305328261700911.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 2.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&Aacute;o blazer l&agrave; thiết kế d&agrave;nh cho d&agrave;nh cho c&ocirc; n&agrave;ng c&ocirc;ng sở đang t&igrave;m kiếm bộ trang phục trẻ trung, c&aacute; t&iacute;nh nhưng vẫn giữ được n&eacute;t lịch sự, duy&ecirc;n d&aacute;ng. Kh&ocirc;ng chỉ ri&ecirc;ng quần shorts m&agrave;&nbsp;<a href=\"https://thanhnien.vn/thoi-trang-tre/dien-vay-ngan-xinh-yeu-dieu-da-het-nac-duoi-nang-he-185240319091730283.htm\" title=\"chân váy ngắn\">ch&acirc;n v&aacute;y ngắn</a>&nbsp;cũng l&agrave; một lựa chọn th&uacute; vị khi kết hợp c&ugrave;ng &aacute;o blazer</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong>2. G&acirc;y ấn tượng với set &aacute;o crop top trẻ trung, nữ t&iacute;nh</strong></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-8-17110163059851517582709.jpg\" target=\"_blank\" title=\"Áo crop top mang đến sự kết hợp tinh tế giữa vẻ đẹp nữ tính và gợi cảm, phù hợp với nhiều vóc dáng và cá tính thời trang. Á hậu Tường San mang đến gợi ý diện crop top họa tiết phối cùng chân váy dài, qua đó hướng đến diện mạo ngọt ngào và tươi mới\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 3.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-8-17110163059851517582709.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 3.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&Aacute;o crop top mang đến sự kết hợp tinh tế giữa vẻ đẹp nữ t&iacute;nh v&agrave; gợi cảm, ph&ugrave; hợp với nhiều v&oacute;c d&aacute;ng v&agrave; c&aacute; t&iacute;nh thời trang. &Aacute; hậu Tường San mang đến gợi &yacute; diện crop top họa tiết phối c&ugrave;ng ch&acirc;n v&aacute;y d&agrave;i, qua đ&oacute; hướng đến diện mạo ngọt ng&agrave;o v&agrave; tươi mới</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-12-17110163061771185007944.jpg\" target=\"_blank\" title=\"Gam màu be vàng giúp set áo crop top trở nên tươi tắn và rạng rỡ. Các cô gái đôi mươi khó có thể chối từ diện mạo rạng ngời này, đặc biệt khi có thể mặc trong nhiều dịp như đi học, đi làm hay đi chơi cùng bạn bè\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 4.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-12-17110163061771185007944.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 4.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Gam m&agrave;u be v&agrave;ng gi&uacute;p set &aacute;o crop top trở n&ecirc;n tươi tắn v&agrave; rạng rỡ. C&aacute;c c&ocirc; g&aacute;i đ&ocirc;i mươi kh&oacute; c&oacute; thể chối từ diện mạo rạng ngời n&agrave;y, đặc biệt khi c&oacute; thể mặc trong nhiều dịp như đi học, đi l&agrave;m hay đi chơi c&ugrave;ng bạn b&egrave;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong>3. C&aacute;c thiết kế độc bản in họa tiết vẽ tay</strong></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-5-1711016305656106282810.jpg\" target=\"_blank\" title=\"Họa tiết nét vẽ thủ công mang đến sự sang trọng cho các thiết kế công sở hiện đại. Những mẫu đầm, váy đơn sắc được điểm xuyết những nhành hoa xinh xắn, mang đến sự độc đáo cho cá tính thời trang của quý cô\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 5.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-5-1711016305656106282810.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 5.\" /></a></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-6-17110163056721326595687.jpg\" target=\"_blank\" title=\"Họa tiết nét vẽ thủ công mang đến sự sang trọng cho các thiết kế công sở hiện đại. Những mẫu đầm, váy đơn sắc được điểm xuyết những nhành hoa xinh xắn, mang đến sự độc đáo cho cá tính thời trang của quý cô\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 6.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-6-17110163056721326595687.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 6.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Họa tiết n&eacute;t vẽ thủ c&ocirc;ng mang đến sự sang trọng cho c&aacute;c thiết kế c&ocirc;ng sở hiện đại. Những mẫu đầm, v&aacute;y đơn sắc được điểm xuyết những nh&agrave;nh hoa xinh xắn, mang đến sự độc đ&aacute;o cho c&aacute; t&iacute;nh thời trang của qu&yacute; c&ocirc;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-15-17110163064222134254022.jpg\" target=\"_blank\" title=\"Đầm trắng thanh khiết in họa tiết hoa lá nổi bật. Chi tiết bất đối xứng ở phần cổ tạo nên điểm nhấn đặc biệt duyên dáng, dễ thương\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 7.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-15-17110163064222134254022.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 7.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Đầm trắng thanh khiết in họa tiết hoa l&aacute; nổi bật. Chi tiết bất đối xứng ở phần cổ tạo n&ecirc;n điểm nhấn đặc biệt duy&ecirc;n d&aacute;ng, dễ thương</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong>4. Sở hữu diện mạo ngọt ng&agrave;o, tươi mới c&ugrave;ng gam&nbsp;<a href=\"https://thanhnien.vn/tha-ho-mong-mo-cung-gam-mau-pastel-keo-ngot-185230511111710891.htm\" target=\"_blank\" title=\"Tha hồ mộng mơ cùng gam màu pastel kẹo ngọt\">m&agrave;u pastel</a></strong></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-2-17110163054661189614711.jpg\" target=\"_blank\" title=\"Những gam màu pastel ngọt ngào được xem là một trong những “nàng thơ màu sắc” được các nhà mốt yêu thích khi mở màn cho các bộ sưu tập xuân hè. Chào đón một mùa mới với nhiều năng lượng, gam màu của “những trái mơ và đào” là một trong những màu sắc xu hướng nhất hiện nay\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 8.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-2-17110163054661189614711.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 8.\" /></a></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-14-17110163064071533407060.jpg\" target=\"_blank\" title=\"Những gam màu pastel ngọt ngào được xem là một trong những “nàng thơ màu sắc” được các nhà mốt yêu thích khi mở màn cho các bộ sưu tập xuân hè. Chào đón một mùa mới với nhiều năng lượng, gam màu của “những trái mơ và đào” là một trong những màu sắc xu hướng nhất hiện nay\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 9.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-14-17110163064071533407060.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 9.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Những gam m&agrave;u pastel ngọt ng&agrave;o được xem l&agrave; một trong những &ldquo;n&agrave;ng thơ m&agrave;u sắc&rdquo; được c&aacute;c nh&agrave; mốt y&ecirc;u th&iacute;ch khi mở m&agrave;n cho c&aacute;c bộ sưu tập xu&acirc;n h&egrave;. Ch&agrave;o đ&oacute;n một m&ugrave;a mới với nhiều năng lượng, gam m&agrave;u của &ldquo;những tr&aacute;i mơ v&agrave; đ&agrave;o&rdquo; l&agrave; một trong những m&agrave;u sắc xu hướng nhất hiện nay</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<ol start=\"4\">\r\n</ol>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-10-17110163060481827638973.jpg\" target=\"_blank\" title=\"Sắc cam pastel với hai ý tưởng kết hợp vừa mang đến vẻ đẹp nữ tính, ngọt ngào vừa chuyển tải nguồn năng lượng tươi mới\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 10.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-10-17110163060481827638973.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 10.\" /></a></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-9-17110163060041294532507.jpg\" target=\"_blank\" title=\"Sắc cam pastel với hai ý tưởng kết hợp vừa mang đến vẻ đẹp nữ tính, ngọt ngào vừa chuyển tải nguồn năng lượng tươi mới\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 11.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-9-17110163060041294532507.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 11.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Sắc cam pastel với hai &yacute; tưởng kết hợp vừa mang đến vẻ đẹp nữ t&iacute;nh, ngọt ng&agrave;o vừa chuyển tải nguồn năng lượng tươi mới</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong>5. &Aacute;o kiểu phối ch&acirc;n v&aacute;y</strong></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-13-17110163062511902606555.jpg\" target=\"_blank\" title=\"Trẻ trung, hiện đại nhưng vẫn thời thượng với thiết kế áo kiểu kết hợp chân váy. Sơ mi cổ vest kết hợp cùng chân váy chữ A trên gam màu trắng thanh nhã khéo léo hack tuổi để các nàng công sở xinh tươi như luôn ở tuổi đôi mươi; một chút cổ điển làm tăng thêm sức hấp dẫn cho tín đồ đam mê vẻ đẹp thanh lịch được thể hiện qua set áo vest kết hợp cùng chân váy xòe nhẹ nhàng\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 12.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-13-17110163062511902606555.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 12.\" /></a></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-7-1711016305927330464703.jpg\" target=\"_blank\" title=\"Trẻ trung, hiện đại nhưng vẫn thời thượng với thiết kế áo kiểu kết hợp chân váy. Sơ mi cổ vest kết hợp cùng chân váy chữ A trên gam màu trắng thanh nhã khéo léo hack tuổi để các nàng công sở xinh tươi như luôn ở tuổi đôi mươi; một chút cổ điển làm tăng thêm sức hấp dẫn cho tín đồ đam mê vẻ đẹp thanh lịch được thể hiện qua set áo vest kết hợp cùng chân váy xòe nhẹ nhàng\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 13.\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-7-1711016305927330464703.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 13.\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Trẻ trung, hiện đại nhưng vẫn thời thượng với thiết kế &aacute;o kiểu kết hợp ch&acirc;n v&aacute;y. Sơ mi cổ vest kết hợp c&ugrave;ng ch&acirc;n v&aacute;y chữ A tr&ecirc;n gam m&agrave;u trắng thanh nh&atilde; kh&eacute;o l&eacute;o hack tuổi để c&aacute;c n&agrave;ng c&ocirc;ng sở xinh tươi như lu&ocirc;n ở tuổi đ&ocirc;i mươi; một ch&uacute;t cổ điển l&agrave;m tăng th&ecirc;m sức hấp dẫn cho t&iacute;n đồ đam m&ecirc; vẻ đẹp thanh lịch được thể hiện qua set &aacute;o vest kết hợp c&ugrave;ng ch&acirc;n v&aacute;y x&ograve;e nhẹ nh&agrave;ng</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-4-17110163056201402054104.jpg\" target=\"_blank\" title=\"5 xu hướng nổi bật nằm trong bộ sưu tập The Flow mang đến cho quý cô cái nhìn toàn cảnh về dòng chảy thời trang mùa xuân hè 2024 - sự mầu nhiệm của cái đẹp lãng mạn, nữ tính và sang trọng lặng thầm\"><img alt=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 14.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/3/21/xu-huong-xuan-he-2024-4-17110163056201402054104.jpg\" title=\"5 xu hướng từ dòng chảy thời trang mùa xuân hè 2024- Ảnh 14.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">5 xu hướng nổi bật nằm trong bộ sưu tập&nbsp;<em>The Flow</em>&nbsp;mang đến cho qu&yacute; c&ocirc; c&aacute;i nh&igrave;n to&agrave;n cảnh về d&ograve;ng chảy thời trang m&ugrave;a xu&acirc;n h&egrave; 2024 - sự mầu nhiệm của c&aacute;i đẹp l&atilde;ng mạn, nữ t&iacute;nh v&agrave; sang trọng lặng thầm</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><em>Ảnh: IVY Moda</em></p>', '2024-04-30 17:00:00', '2024-05-01 04:05:00'),
(2, 'Những họa tiết và màu sắc dẫn dắt xu hướng hè này', '<p>Bảng m&agrave;u thời trang h&egrave; n&agrave;y nghi&ecirc;ng về xu hướng tươi s&aacute;ng v&agrave; dịu nhẹ, họa tiết tr&ecirc;n v&aacute;y &aacute;o c&oacute; k&iacute;ch thước nhỏ nhắn v&agrave; rạng rỡ mang theo n&eacute;t dịu d&agrave;ng của m&ugrave;a xu&acirc;n v&agrave; sự ph&oacute;ng kho&aacute;ng của m&ugrave;a hạ đan xen.</p>', 'xFz9_rue-des-chats-1-1714127147384525281767-89-0-725-1017-crop-17141271866181459974067.webp', '<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\">Những&nbsp;<a class=\"seo-suggest-link link-inline-content\" href=\"https://thanhnien.vn/5-mau-vay-he-dang-dan-dat-xu-huong-thoi-trang-185240416125837644.htm\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px\" target=\"_blank\" title=\"5 mẫu váy hè đang dẫn dắt xu hướng thời trang\">mẫu v&aacute;y h&egrave;</a>&nbsp;đang dẫn dắt xu hướng thời trang gọi t&ecirc;n&nbsp;<a class=\"seo-suggest-link link-inline-content\" href=\"https://thanhnien.vn/vay-ao-hoa-tiet-len-ngoi-vao-mua-he-185240425071823162.htm\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px\" target=\"_blank\" title=\"Váy áo họa tiết lên ngôi vào mùa hè\">v&aacute;y &aacute;o họa tiết</a>&nbsp;tươi s&aacute;ng, chất liệu ren ki&ecirc;u kỳ quyến rũ đi c&ugrave;ng những chiếc&nbsp;<a class=\"seo-suggest-link link-inline-content\" href=\"https://thanhnien.vn/vay-suong-la-ung-vien-sang-gia-nhat-he-nay-185240415101314949.htm\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px\" target=\"_blank\" title=\"Váy suông là ứng viên sáng giá nhất hè này\">v&aacute;y su&ocirc;ng</a>&nbsp;gi&agrave;u t&iacute;nh ứng dụng.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><strong>V&aacute;y &aacute;o họa tiết nhẹ nh&agrave;ng mang đến cảm gi&aacute;c thanh m&aacute;t, vui tươi</strong></span></span></span></span></p>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/rue-des-chats-1-1714127147384525281767.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Phom dáng quen thuộc và được ưa chuộng nhất của mùa hè vẫn là những chiếc váy dài, váy dáng suông cổ yếm, hai dây hoặc váy maxi xòe bồng. Khi được thêm vào những họa tiết bay bổng lãng mạn và những đường viền ren, đăng ten điệu đà càng giúp tô điểm cho nét đẹp rạng ngời của phái nữ\"><img alt=\"Phom dáng quen thuộc và được ưa chuộng nhất của mùa hè vẫn là những chiếc váy dài, váy dáng suông cổ yếm, hai dây hoặc váy maxi xòe bồng. Khi được thêm vào những họa tiết bay bổng lãng mạn và những đường viền ren, đăng ten điệu đà càng giúp tô điểm cho nét đẹp rạng ngời của phái nữ\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/rue-des-chats-1-1714127147384525281767.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 1.\" width=\"\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Phom d&aacute;ng quen thuộc v&agrave; được ưa chuộng nhất của m&ugrave;a h&egrave; vẫn l&agrave; những chiếc v&aacute;y d&agrave;i, v&aacute;y d&aacute;ng su&ocirc;ng cổ yếm, hai d&acirc;y hoặc v&aacute;y maxi x&ograve;e bồng. Khi được th&ecirc;m v&agrave;o những họa tiết bay bổng l&atilde;ng mạn v&agrave; những đường viền ren, đăng ten điệu đ&agrave; c&agrave;ng gi&uacute;p t&ocirc; điểm cho n&eacute;t đẹp rạng ngời của ph&aacute;i nữ</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div class=\"VCSortableInPreviewMode alignJustify\" style=\"margin-bottom:15px; max-width:100%; text-align:start; width:608px\">\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/rue-des-chats-3-17141271474361673395192.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px; cursor:zoom-in; display:block; width:301.5px; height:418.891px; object-fit:cover\" target=\"_blank\" title=\"Tháng tư là khoảng thời gian giao mùa đẹp nhất để nhà mốt Rue Des Chats mang đến bảng màu thời trang tươi sáng và dịu nhẹ đi cùng các chất liệu cotton, lanh và lụa. Những họa tiết được lăng xê trong bộ sưu tập xuân hè 2024 chính là sự hòa quyện của màu nắng, màu của cây cối và hoa lá đang bung nở\"><img alt=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 2.\" src=\"https://images2.thanhnien.vn/thumb_w/660/528068263637045248/2024/4/26/rue-des-chats-3-17141271474361673395192.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 2.\" /></a></span></span></span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/rue-des-chats-8-1714127147557437241411.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px; cursor:zoom-in; display:block; width:301.5px; height:418.891px; object-fit:cover\" target=\"_blank\" title=\"Tháng tư là khoảng thời gian giao mùa đẹp nhất để nhà mốt Rue Des Chats mang đến bảng màu thời trang tươi sáng và dịu nhẹ đi cùng các chất liệu cotton, lanh và lụa. Những họa tiết được lăng xê trong bộ sưu tập xuân hè 2024 chính là sự hòa quyện của màu nắng, màu của cây cối và hoa lá đang bung nở\"><img alt=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 3.\" src=\"https://images2.thanhnien.vn/thumb_w/660/528068263637045248/2024/4/26/rue-des-chats-8-1714127147557437241411.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 3.\" /></a></span></span></span></span></p>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Th&aacute;ng tư l&agrave; khoảng thời gian giao m&ugrave;a đẹp nhất để nh&agrave; mốt Rue Des Chats mang đến bảng m&agrave;u thời trang tươi s&aacute;ng v&agrave; dịu nhẹ đi c&ugrave;ng c&aacute;c chất liệu cotton, lanh v&agrave; lụa. Những họa tiết được lăng x&ecirc; trong bộ sưu tập xu&acirc;n h&egrave; 2024 ch&iacute;nh l&agrave; sự h&ograve;a quyện của m&agrave;u nắng, m&agrave;u của c&acirc;y cối v&agrave; hoa l&aacute; đang bung nở</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"margin-top:-5px; padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><strong>Gam m&agrave;u pastel dịu nhẹ</strong></span></span></span></span></p>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/le-thanh-hoa-1-17141271470641235463146.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Váy áo màu pastel mang đến cảm giác hài hòa, mát mẻ xua tan nắng nóng. Những sắc màu pastel chủ đạo trong bộ sưu tập Resort 2024 của Lê Thanh Hòa bao gồm hồng và xanh dương mát dịu\"><img alt=\"Váy áo màu pastel mang đến cảm giác hài hòa, mát mẻ xua tan nắng nóng. Những sắc màu pastel chủ đạo trong bộ sưu tập Resort 2024 của Lê Thanh Hòa bao gồm hồng và xanh dương mát dịu\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/le-thanh-hoa-1-17141271470641235463146.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 4.\" width=\"\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">V&aacute;y &aacute;o m&agrave;u pastel mang đến cảm gi&aacute;c h&agrave;i h&ograve;a, m&aacute;t mẻ xua tan nắng n&oacute;ng. Những sắc m&agrave;u pastel chủ đạo trong bộ sưu tập&nbsp;<em>Resort 2024</em>&nbsp;của L&ecirc; Thanh H&ograve;a bao gồm hồng v&agrave; xanh dương m&aacute;t dịu</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/le-thanh-hoa-8-17141271473511213439048.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Để tạo nên nét riêng sắc sảo cho mỗi thiết kế, trang phục màu pastel được nhấn nhá bằng các chi tiết drapping thủ công, qua đó vừa gây được hiệu ứng thị giác tốt, vừa tôn dáng vóc hiệu quả cho các quý cô thời trang\"><img alt=\"Để tạo nên nét riêng sắc sảo cho mỗi thiết kế, trang phục màu pastel được nhấn nhá bằng các chi tiết drapping thủ công, qua đó vừa gây được hiệu ứng thị giác tốt, vừa tôn dáng vóc hiệu quả cho các quý cô thời trang\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/le-thanh-hoa-8-17141271473511213439048.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 5.\" width=\"\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Để tạo n&ecirc;n n&eacute;t ri&ecirc;ng sắc sảo cho mỗi thiết kế, trang phục m&agrave;u pastel được nhấn nh&aacute; bằng c&aacute;c chi tiết drapping thủ c&ocirc;ng, qua đ&oacute; vừa g&acirc;y được hiệu ứng thị gi&aacute;c tốt, vừa t&ocirc;n d&aacute;ng v&oacute;c hiệu quả cho c&aacute;c qu&yacute; c&ocirc; thời trang</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><strong>Chất liệu ren ki&ecirc;u kỳ, quyến rũ</strong></p>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/le-thanh-hoa-7-1714127147224795312826.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Không chỉ hiện diện trên những chiếc đầm sang trọng và quyến rũ, vải ren với sự đa dạng của họa tiết và màu sắc được thiết kế thành những set sơ mi oversized mặc kèm quần shorts ngắn trẻ trung và nữ tính\"><img alt=\"Không chỉ hiện diện trên những chiếc đầm sang trọng và quyến rũ, vải ren với sự đa dạng của họa tiết và màu sắc được thiết kế thành những set sơ mi oversized mặc kèm quần shorts ngắn trẻ trung và nữ tính\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/le-thanh-hoa-7-1714127147224795312826.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 6.\" width=\"\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Kh&ocirc;ng chỉ hiện diện tr&ecirc;n những chiếc đầm sang trọng v&agrave; quyến rũ, vải ren với sự đa dạng của họa tiết v&agrave; m&agrave;u sắc được thiết kế th&agrave;nh những set sơ mi oversized mặc k&egrave;m quần shorts ngắn trẻ trung v&agrave; nữ t&iacute;nh</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div id=\"zone-k38hpq5p\" style=\"text-align:start\">\r\n<div id=\"share-k38hpq65\" style=\"text-align:center\">&nbsp;</div>\r\n</div>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/le-thanh-hoa-2-1714127706119587964328.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Họa tiết ren hoa được đắp trên vải hoặc cắt lazer sắc nét tạo nên nét duyên ngầm cho chiếc váy trắng dịu dàng này\"><img alt=\"Họa tiết ren hoa được đắp trên vải hoặc cắt lazer sắc nét tạo nên nét duyên ngầm cho chiếc váy trắng dịu dàng này\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/le-thanh-hoa-2-1714127706119587964328.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 7.\" width=\"\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Họa tiết ren hoa được đắp tr&ecirc;n vải hoặc cắt lazer sắc n&eacute;t tạo n&ecirc;n n&eacute;t duy&ecirc;n ngầm cho chiếc v&aacute;y trắng dịu d&agrave;ng n&agrave;y</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><strong>Phom d&aacute;ng cổ điển, đa năng được ưa chuộng</strong></span></span></span></span></p>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/le-thanh-hoa-4-17141271471581832374821.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Năm nay là một năm nhiều khó khăn, vì thế các nhà mốt Việt càng đề cao tính ứng dụng của trang phục. Phom dáng đầm dài được đầu tư nhiều nhất vẫn là váy sơ mi, đầm dài... những thiết kế vốn &quot;đa zi năng&quot;, diện đi đâu cũng hợp và vóc dáng nào cũng có thể chiều chuộng\"><img alt=\"Năm nay là một năm nhiều khó khăn, vì thế các nhà mốt Việt càng đề cao tính ứng dụng của trang phục. Phom dáng đầm dài được đầu tư nhiều nhất vẫn là váy sơ mi, đầm dài... những thiết kế vốn \" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/le-thanh-hoa-4-17141271471581832374821.jpg\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Năm nay l&agrave; một năm nhiều kh&oacute; khăn, v&igrave; thế c&aacute;c nh&agrave; mốt Việt c&agrave;ng đề cao t&iacute;nh ứng dụng của trang phục. Phom d&aacute;ng đầm d&agrave;i được đầu tư nhiều nhất vẫn l&agrave; v&aacute;y sơ mi, đầm d&agrave;i... những thiết kế vốn &quot;đa zi năng&quot;, diện đi đ&acirc;u cũng hợp v&agrave; v&oacute;c d&aacute;ng n&agrave;o cũng c&oacute; thể chiều chuộng</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><strong>V&aacute;y su&ocirc;ng, x&ograve;e nhẹ thoải m&aacute;i</strong></span></span></span></span></p>\r\n\r\n<div class=\"VCSortableInPreviewMode alignJustify\" style=\"margin-bottom:15px; max-width:100%; text-align:start; width:608px\">\r\n<div class=\"row-col-auto\">\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/rue-des-chats-6-1714127147491633339209.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px; cursor:zoom-in; display:block; width:294px; height:441px; object-fit:cover\" target=\"_blank\" title=\"Phom dáng suông hoặc xòe nhẹ nhàng mang đến khả năng thoáng khí và thoát mồ hôi, hơi ẩm nhanh chóng. Đây là một trong những lý do để xu hướng hè 2024 tràn ngập các gợi ý đầm suông, đầm chữ A\"><img alt=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 9.\" src=\"https://images2.thanhnien.vn/thumb_w/660/528068263637045248/2024/4/26/rue-des-chats-6-1714127147491633339209.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 9.\" /></a></span></span></span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/le-thanh-hoa-5-17141271471921630690578.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px; cursor:zoom-in; display:block; width:294px; height:441px; object-fit:cover\" target=\"_blank\" title=\"Phom dáng suông hoặc xòe nhẹ nhàng mang đến khả năng thoáng khí và thoát mồ hôi, hơi ẩm nhanh chóng. Đây là một trong những lý do để xu hướng hè 2024 tràn ngập các gợi ý đầm suông, đầm chữ A\"><img alt=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 10.\" src=\"https://images2.thanhnien.vn/thumb_w/660/528068263637045248/2024/4/26/le-thanh-hoa-5-17141271471921630690578.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 10.\" /></a></span></span></span></span></p>\r\n</div>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Phom d&aacute;ng su&ocirc;ng hoặc x&ograve;e nhẹ nh&agrave;ng mang đến khả năng tho&aacute;ng kh&iacute; v&agrave; tho&aacute;t mồ h&ocirc;i, hơi ẩm nhanh ch&oacute;ng. Đ&acirc;y l&agrave; một trong những l&yacute; do để xu hướng h&egrave; 2024 tr&agrave;n ngập c&aacute;c gợi &yacute; đầm su&ocirc;ng, đầm chữ A</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"margin-top:-5px; padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div style=\"text-align:center\"><a class=\"detail-img-lightbox\" href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/26/rue-des-chats-5-17141271474732144387121.jpg\" style=\"-webkit-font-smoothing:antialiased; text-rendering:geometricprecision; box-sizing:border-box; text-decoration:none; color:#0098d1; outline:0px !important; cursor:zoom-in; display:block\" target=\"_blank\" title=\"Với những thiết kế dáng suông mềm, quý cô hoàn toàn có thể lựa chọn phối thêm dây thắt lưng bằng da, lụa hoặc ren để vòng eo trở nên thon thả và hút ánh nhìn nhiều hơn. Ngược lại, đầm suông là để nàng thả mình vào khung trời mùa hạ mát rượi những cơn gió, ánh nắng hè tuy chói chang nhưng đầy ắp tiếng cười và sự phóng khoáng, hào sảng tự nhiên\"><img alt=\"Với những thiết kế dáng suông mềm, quý cô hoàn toàn có thể lựa chọn phối thêm dây thắt lưng bằng da, lụa hoặc ren để vòng eo trở nên thon thả và hút ánh nhìn nhiều hơn. Ngược lại, đầm suông là để nàng thả mình vào khung trời mùa hạ mát rượi những cơn gió, ánh nắng hè tuy chói chang nhưng đầy ắp tiếng cười và sự phóng khoáng, hào sảng tự nhiên\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/26/rue-des-chats-5-17141271474732144387121.jpg\" title=\"Những họa tiết và màu sắc dẫn dắt xu hướng hè này- Ảnh 11.\" width=\"\" /></a></div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px !important\"><span style=\"font-family:Inter\"><span style=\"color:#454545\">Với những thiết kế d&aacute;ng su&ocirc;ng mềm, qu&yacute; c&ocirc; ho&agrave;n to&agrave;n c&oacute; thể lựa chọn phối th&ecirc;m d&acirc;y thắt lưng bằng da, lụa hoặc ren để v&ograve;ng eo trở n&ecirc;n thon thả v&agrave; h&uacute;t &aacute;nh nh&igrave;n nhiều hơn. Ngược lại, đầm su&ocirc;ng l&agrave; để n&agrave;ng thả m&igrave;nh v&agrave;o khung trời m&ugrave;a hạ m&aacute;t rượi những cơn gi&oacute;, &aacute;nh nắng h&egrave; tuy ch&oacute;i chang nhưng đầy ắp tiếng cười v&agrave; sự ph&oacute;ng kho&aacute;ng, h&agrave;o sảng tự nhi&ecirc;n</span></span></span></p>\r\n\r\n<div class=\"PhotoCMS_Author\" style=\"padding-bottom:8px; text-align:center\">\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:17px\"><span style=\"color:#454545\"><span style=\"font-family:Inter\"><span style=\"background-color:#ffffff\"><em>Ảnh:&nbsp;Rue&nbsp;Des&nbsp;Chats, Le&nbsp;Thanh&nbsp;Hoa</em></span></span></span></span></p>', '2024-04-30 17:00:00', '2024-05-01 04:28:12');
INSERT INTO `blog` (`id`, `title`, `description`, `image`, `content`, `created_at`, `updated_at`) VALUES
(3, 'Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ', '<p>Trang phục xu&acirc;n h&egrave; 2024 được định h&igrave;nh bởi những gam m&agrave;u pastel kh&oacute; cưỡng, tươi tắn v&agrave; tinh tế như l&agrave;n gi&oacute; m&ugrave;a h&egrave;, ngọt ng&agrave;o như kẹo, tươi s&aacute;ng như những ng&agrave;y h&egrave; vui tươi m&agrave; ch&uacute;ng gợi l&ecirc;n.</p>', 'tcI8_2-2051708565-17143014434632127453235-380-0-1380-1600-crop-17143042234831612758599.webp', '<p style=\"text-align:center\">Những chiếc v&aacute;y m&agrave;u pastel l&agrave; chủ đề của m&ugrave;a h&egrave; 2024 với những mẫu m&atilde; v&agrave; sắc th&aacute;i thời thượng, từ buổi tr&igrave;nh diễn thời trang đến phong c&aacute;ch tr&ecirc;n đường phố.</p>\r\n\r\n<p style=\"text-align:center\"><strong>V&aacute;y m&agrave;u pastel tr&ecirc;n đường phố từ c&aacute;c It Girl</strong></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/1-gettyimages-2031408908-17143014433872034935683.jpg\" target=\"_blank\" title=\"Caroline Daur mặc một chiếc váy không tay bằng vải tuyn màu xanh nhạt, túi da màu đen, giày múa ba lê trong Tuần lễ thời trang Milan thu đông 2024 - 2025\"><img alt=\"Caroline Daur mặc một chiếc váy không tay bằng vải tuyn màu xanh nhạt, túi da màu đen, giày múa ba lê trong Tuần lễ thời trang Milan thu đông 2024 - 2025\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/1-gettyimages-2031408908-17143014433872034935683.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 1.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Caroline Daur mặc một chiếc v&aacute;y kh&ocirc;ng tay bằng&nbsp;<a href=\"https://thanhnien.vn/ve-goi-cam-toi-gian-tu-loat-vay-vai-tuyn-co-gian-185230606125231229.htm\" title=\"vải tuyn\">vải tuyn</a>&nbsp;m&agrave;u xanh nhạt, t&uacute;i da m&agrave;u đen, gi&agrave;y m&uacute;a ba l&ecirc; trong&nbsp;<em>Tuần lễ thời trang Milan thu đ&ocirc;ng 2024 - 2025</em></p>\r\n\r\n<p style=\"text-align:center\">@Caroline Daur</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/2-2051708565-17143014434632127453235.jpg\" target=\"_blank\" title=\"Một vị khách mặc váy maxi dài màu tím nhạt, túi xách màu trắng, kính râm và giày bệt được trang trí bằng pha lê bên ngoài show diễn Issey Miyake trong Tuần lễ thời trang Paris thu đông 2024 - 2025 vào ngày 1.3.2024 tại Paris, Pháp\"><img alt=\"Một vị khách mặc váy maxi dài màu tím nhạt, túi xách màu trắng, kính râm và giày bệt được trang trí bằng pha lê bên ngoài show diễn Issey Miyake trong Tuần lễ thời trang Paris thu đông 2024 - 2025 vào ngày 1.3.2024 tại Paris, Pháp\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/2-2051708565-17143014434632127453235.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 2.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Một vị kh&aacute;ch mặc v&aacute;y maxi d&agrave;i m&agrave;u t&iacute;m nhạt, t&uacute;i x&aacute;ch m&agrave;u trắng, k&iacute;nh r&acirc;m v&agrave; gi&agrave;y bệt được trang tr&iacute; bằng pha l&ecirc; b&ecirc;n ngo&agrave;i show diễn Issey Miyake trong&nbsp;<em>Tuần lễ thời trang Paris</em>&nbsp;<em>thu đ&ocirc;ng 2024 - 2025</em>&nbsp;v&agrave;o ng&agrave;y 1.3.2024 tại Paris, Ph&aacute;p</p>\r\n\r\n<p style=\"text-align:center\">@parisfashionweek</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-1-66059d64de7b2-17143028950881507234367.jpg\" target=\"_blank\" title=\"Một chiếc váy màu nude sẽ rất hợp với cả áo nịt ngực màu da trời và thêm chiếc túi cầm tay  màu xanh nhạt\"><img alt=\"Một chiếc váy màu nude sẽ rất hợp với cả áo nịt ngực màu da trời và thêm chiếc túi cầm tay  màu xanh nhạt\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-1-66059d64de7b2-17143028950881507234367.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 3.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Một chiếc v&aacute;y m&agrave;u nude sẽ rất hợp với cả &aacute;o nịt ngực m&agrave;u da trời v&agrave; th&ecirc;m chiếc t&uacute;i cầm tay m&agrave;u xanh nhạt</p>\r\n\r\n<p style=\"text-align:center\">@parisfashionweek</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-5-66059d639377a-1714302425268766934666.jpg\" target=\"_blank\" title=\"Một It Girl xuất hiện trên đường phố Milan với cả set combo màu vàng pastel phối cùng phụ kiện màu trắng tinh tế\"><img alt=\"Một It Girl xuất hiện trên đường phố Milan với cả set combo màu vàng pastel phối cùng phụ kiện màu trắng tinh tế\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-5-66059d639377a-1714302425268766934666.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 4.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Một It Girl xuất hiện tr&ecirc;n đường phố Milan với cả set combo m&agrave;u v&agrave;ng pastel phối c&ugrave;ng phụ kiện m&agrave;u trắng tinh tế</p>\r\n\r\n<p style=\"text-align:center\">@milanfashionweek</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-6-66059d65084ff-1714302425372577215361.jpg\" target=\"_blank\" title=\"Bằng cách quan sát kỹ những hình ảnh street style của các tuần lễ thời trang mới nhất, hai cách mặc màu pastel chính sẽ xuất hiện, từ hồng đến vàng và từ xanh lá cây đến hoa cà và xanh nhạt\"><img alt=\"Bằng cách quan sát kỹ những hình ảnh street style của các tuần lễ thời trang mới nhất, hai cách mặc màu pastel chính sẽ xuất hiện, từ hồng đến vàng và từ xanh lá cây đến hoa cà và xanh nhạt\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-6-66059d65084ff-1714302425372577215361.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 5.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Bằng c&aacute;ch quan s&aacute;t kỹ những h&igrave;nh ảnh street style của c&aacute;c tuần lễ thời trang mới nhất, hai c&aacute;ch mặc m&agrave;u pastel ch&iacute;nh sẽ xuất hiện, từ hồng đến v&agrave;ng v&agrave; từ xanh l&aacute; c&acirc;y đến hoa c&agrave; v&agrave; xanh nhạt</p>\r\n\r\n<p style=\"text-align:center\">@parisfashionweek</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-3-66059d64dfa38-17143024255551191149263.jpg\" target=\"_blank\" title=\"Tông màu xanh blue pastel cũng được các It Girl ưa thích bởi nó mang lại sự trang nhã, lịch thiệp\"><img alt=\"Tông màu xanh blue pastel cũng được các It Girl ưa thích bởi nó mang lại sự trang nhã, lịch thiệp\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/tendenze-moda-2024-colori-pastello-emily-ratajkowski-3-66059d64dfa38-17143024255551191149263.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 6.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">T&ocirc;ng m&agrave;u xanh blue pastel cũng được c&aacute;c It Girl ưa th&iacute;ch bởi n&oacute; mang lại sự trang nh&atilde;, lịch thiệp</p>\r\n\r\n<p style=\"text-align:center\">@parifashionweek</p>\r\n\r\n<p style=\"text-align:center\">C&aacute;ch mặc m&agrave;u pastel cho m&ugrave;a h&egrave; đ&atilde; xuất hiện, từ hồng đến v&agrave;ng v&agrave; từ xanh l&aacute; c&acirc;y đến hoa c&agrave; v&agrave; xanh nhạt. Đầu ti&ecirc;n l&agrave; tập trung v&agrave;o một m&agrave;u duy nhất, tạo ra sự kết hợp đơn sắc, sau đ&oacute; được chia nhỏ bằng c&aacute;c phụ kiện tương phản, thường l&agrave; m&agrave;u đen hoặc c&ugrave;ng t&ocirc;ng m&agrave;u, nhưng theo phi&ecirc;n bản đậm hơn v&agrave; rực rỡ hơn. Tuy nhi&ecirc;n, điều thứ hai l&agrave; chọn cả hai v&agrave; kết hợp ch&uacute;ng một c&aacute;ch tự do v&igrave; ch&uacute;ng c&oacute; khả năng kết hợp tốt với nhau. V&iacute; dụ, một chiếc v&aacute;y m&agrave;u anh đ&agrave;o sẽ rất hợp với cả &aacute;o nịt ngực m&agrave;u da trời v&agrave; &aacute;o len cashmere m&agrave;u xanh nhạt.</p>\r\n\r\n<p style=\"text-align:center\"><strong>Những chiếc v&aacute;y gam m&agrave;u pastel xuất hiện tr&ecirc;n s&agrave;n diễn xu&acirc;n h&egrave; 2024</strong></p>\r\n\r\n<p style=\"text-align:center\"><em>V&aacute;y m&agrave;u xanh sữa v&agrave; bạc h&agrave;</em></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/4-vestido-verde-pastel-coperni-primavera-verano-2024-17143014435001286673938.jpg\" target=\"_blank\" title=\"Coperni đã trình làng một chiếc váy ngắn bằng vải voan theo phong cách những năm 2000 với sự tương phản về chất liệu của diềm xếp nếp và chất liệu trong suốt, lý tưởng cho những buổi tối mùa hè\"><img alt=\"Coperni đã trình làng một chiếc váy ngắn bằng vải voan theo phong cách những năm 2000 với sự tương phản về chất liệu của diềm xếp nếp và chất liệu trong suốt, lý tưởng cho những buổi tối mùa hè\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/4-vestido-verde-pastel-coperni-primavera-verano-2024-17143014435001286673938.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 7.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Coperni đ&atilde; tr&igrave;nh l&agrave;ng một chiếc v&aacute;y ngắn bằng vải voan theo phong c&aacute;ch những năm 2000 với sự tương phản về chất liệu của diềm xếp nếp v&agrave; chất liệu trong suốt, l&yacute; tưởng cho những buổi tối m&ugrave;a h&egrave;</p>\r\n\r\n<p style=\"text-align:center\">@Coperni</p>\r\n\r\n<p style=\"text-align:center\">Tr&ecirc;n s&agrave;n catwalk xu&acirc;n h&egrave; 2024, Bottega Veneta tr&igrave;nh diễn chất liệu da mềm mại v&agrave; dẻo dai với t&ocirc;ng m&agrave;u xanh sữa v&agrave; bạc h&agrave; tươi m&aacute;t, để một chiếc v&aacute;y midi thanh lịch c&oacute; thể mặc nhiều lớp, kết hợp với xăng đan xỏ ng&oacute;n c&oacute; g&oacute;t vừa phải.</p>\r\n\r\n<p style=\"text-align:center\"><em>V&aacute;y m&agrave;u v&agrave;ng pastel với gi&agrave;y Oxford&nbsp;</em></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/5-vestido-amarillo-pastel-bally-primavera-verano-2024-17143014436092096544361.jpg\" target=\"_blank\" title=\"Có vẻ như da với tông màu pastel sẽ là sự thay thế sang trọng của mùa, thương hiệu Thụy Sĩ, Bally đã thử nghiệm trên chiếc váy màu vàng kem tinh tế với đường cắt đơn giản, chiều dài midi và với một ánh sáng lung linh sống động\"><img alt=\"Có vẻ như da với tông màu pastel sẽ là sự thay thế sang trọng của mùa, thương hiệu Thụy Sĩ, Bally đã thử nghiệm trên chiếc váy màu vàng kem tinh tế với đường cắt đơn giản, chiều dài midi và với một ánh sáng lung linh sống động\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/5-vestido-amarillo-pastel-bally-primavera-verano-2024-17143014436092096544361.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 8.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">C&oacute; vẻ như da với t&ocirc;ng m&agrave;u pastel sẽ l&agrave; sự thay thế sang trọng của m&ugrave;a, thương hiệu Thụy Sĩ, Bally đ&atilde; thử nghiệm tr&ecirc;n chiếc v&aacute;y m&agrave;u&nbsp;<a href=\"https://thanhnien.vn/vay-ao-mau-vang-kem-khong-chi-ton-da-ma-con-cuc-ky-hack-tuoi-1851385050.htm\" title=\"vàng kem\">v&agrave;ng kem</a>&nbsp;tinh tế với đường cắt đơn giản, chiều d&agrave;i&nbsp;<a href=\"https://thanhnien.vn/nhung-dang-vay-midi-hop-voi-tiet-troi-cuoi-dong-185240112091210333.htm\" title=\"midi\">midi</a>&nbsp;v&agrave; với một &aacute;nh s&aacute;ng lung linh sống động</p>\r\n\r\n<p style=\"text-align:center\">@Bally</p>\r\n\r\n<p style=\"text-align:center\">Gi&agrave;y buộc d&acirc;y Oxford l&agrave;m dịu đi cảm gi&aacute;c tinh tế bằng n&eacute;t nam t&iacute;nh nghi&ecirc;m ngặt.</p>\r\n\r\n<p style=\"text-align:center\"><em>Gi&agrave;y cao g&oacute;t buộc d&acirc;y m&agrave;u đỏ c&ugrave;ng v&aacute;y d&agrave;i m&agrave;u hồng&nbsp;</em></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/6-vestido-rosa-pastel-alaia-primavera-verano-2024-17143014436231104037475.jpg\" target=\"_blank\" title=\"Alaïa đã trình bày một phong cách quyến rũ không thể cưỡng lại. Đó là một chiếc váy màu hồng baby trong suốt quyến rũ, nhờ đường viền cổ áo và đường cắt ở phần thân trên, mang lại hiệu ứng thị giác tôn dáng\"><img alt=\"Alaïa đã trình bày một phong cách quyến rũ không thể cưỡng lại. Đó là một chiếc váy màu hồng baby trong suốt quyến rũ, nhờ đường viền cổ áo và đường cắt ở phần thân trên, mang lại hiệu ứng thị giác tôn dáng\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/6-vestido-rosa-pastel-alaia-primavera-verano-2024-17143014436231104037475.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 9.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Ala&iuml;a đ&atilde; tr&igrave;nh b&agrave;y một phong c&aacute;ch quyến rũ kh&ocirc;ng thể cưỡng lại. Đ&oacute; l&agrave; một chiếc v&aacute;y m&agrave;u hồng baby trong suốt quyến rũ, nhờ đường viền cổ &aacute;o v&agrave; đường cắt ở phần th&acirc;n tr&ecirc;n, mang lại hiệu ứng thị gi&aacute;c t&ocirc;n d&aacute;ng</p>\r\n\r\n<p style=\"text-align:center\">@Ala&iuml;a</p>\r\n\r\n<p style=\"text-align:center\">V&aacute;y nhẹ ph&aacute;t huy hiệu ứng xuy&ecirc;n thấu, trong khi d&acirc;y đeo cao, c&oacute; m&agrave;u đỏ tươi, tạo ra sự tương phản m&agrave;u sắc th&uacute; vị. Sự kết hợp giữa đỏ - hồng, ph&aacute; bỏ c&aacute;c quy tắc cũ về kết hợp m&agrave;u sắc v&agrave; trở th&agrave;nh xu hướng cho m&ugrave;a xu&acirc;n h&egrave; tới.</p>\r\n\r\n<p style=\"text-align:center\"><em>V&aacute;y m&agrave;u hoa c&agrave; với d&eacute;p cao</em></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/7-vestido-lila-courreges-primavera-verano-2024-17143014436642003145085.jpg\" target=\"_blank\" title=\"Courrèges sử dụng tông màu lạnh của hoa cà, một màu tắc kè hoa với nhiều sắc thái để tạo ra một cái nhìn tối giản và đáng nhớ\"><img alt=\"Courrèges sử dụng tông màu lạnh của hoa cà, một màu tắc kè hoa với nhiều sắc thái để tạo ra một cái nhìn tối giản và đáng nhớ\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/28/7-vestido-lila-courreges-primavera-verano-2024-17143014436642003145085.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 10.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Courr&egrave;ges sử dụng t&ocirc;ng m&agrave;u lạnh của hoa c&agrave;, một m&agrave;u tắc k&egrave; hoa với nhiều sắc th&aacute;i để tạo ra một c&aacute;i nh&igrave;n tối giản v&agrave; đ&aacute;ng nhớ</p>\r\n\r\n<p style=\"text-align:center\">@Courr&egrave;ges</p>\r\n\r\n<p style=\"text-align:center\">Đường cắt đơn giản v&agrave; uốn lượn của chiếc v&aacute;y khiến n&oacute; trở n&ecirc;n ho&agrave;n hảo cho một sự kiện trang trọng hoặc một bữa tiệc ngo&agrave;i vườn, trong khi đ&ocirc;i d&eacute;p quai mỏng c&ugrave;ng t&ocirc;ng m&agrave;u khiến n&oacute; c&agrave;ng trở n&ecirc;n thanh lịch hơn. M&agrave;u n&agrave;y, trong số c&aacute;c m&agrave;u pastel, l&agrave; m&agrave;u ngọt ng&agrave;o nhất.</p>\r\n\r\n<p style=\"text-align:center\"><em>V&aacute;y xanh blue pastel c&ugrave;ng xăng đan đế bệt</em></p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/8-gettyimages-15277307291-17143014437661277033527.jpg\" target=\"_blank\" title=\"Chiếc đầm hai dây với chất liệu lụa rất nhẹ với chiếc áo dệt kim buộc trên vai tạo hiệu ứng cách điệu, hiện có màu xanh baby blue tinh tế, màu xu hướng cho năm 2024\"><img alt=\"Một chiếc váy nhẹ có quai trở thành món đồ thực sự cần có cho mùa hè. Chiếc đầm hai dây với chất liệu lụa rất nhẹ với chiếc áo dệt kim buộc trên vai tạo hiệu ứng cách điệu, hiện có màu xanh baby blue tinh tế, màu xu hướng cho năm 2024\" height=\"\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/4/28/8-gettyimages-15277307291-17143014437661277033527.jpg\" title=\"Làn gió mới của mùa hạ 2024 từ những chiếc váy màu pastel mát mẻ- Ảnh 11.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Chiếc đầm hai d&acirc;y với chất liệu lụa rất nhẹ với chiếc &aacute;o dệt kim buộc tr&ecirc;n vai tạo hiệu ứng c&aacute;ch điệu, hiện c&oacute; m&agrave;u xanh baby blue tinh tế, m&agrave;u xu hướng cho năm 2024</p>\r\n\r\n<p style=\"text-align:center\">@parisfashionweek</p>\r\n\r\n<p style=\"text-align:center\">Đ&ocirc;i xăng đan bệt sẽ l&agrave; sự kết hợp l&yacute; tưởng cho bộ trang phục n&agrave;y với những gợi &yacute; boho sang trọng, thoải m&aacute;i v&agrave; giản dị. Trong số tất cả những chiếc v&aacute;y m&agrave;u pastel, đ&acirc;y l&agrave; chiếc v&aacute;y mang hương vị m&ugrave;a h&egrave;.</p>\r\n\r\n<p style=\"text-align:center\">Nh&acirc;n vật ch&iacute;nh tr&ecirc;n s&agrave;n catwalk m&ugrave;a h&egrave; 2024 l&agrave; c&aacute;c t&ocirc;ng m&agrave;u nhẹ nh&agrave;ng, v&aacute;y m&agrave;u pastel l&agrave; m&oacute;n đồ kh&ocirc;ng thể thiếu trong tủ đồ m&ugrave;a n&agrave;y. M&agrave;u v&agrave;ng sorbet, hồng kẹo b&ocirc;ng, xanh baby, xanh sữa v&agrave; bạc h&agrave; - những t&ocirc;ng m&agrave;u l&ecirc;n ng&ocirc;i của m&ugrave;a h&egrave; năm nay. C&aacute;c h&atilde;ng thời trang đ&atilde; tr&igrave;nh diễn những bộ quần &aacute;o nhẹ nh&agrave;ng, thanh lịch trong bảng m&agrave;u s&aacute;ng tr&ecirc;n s&agrave;n catwalk theo m&ugrave;a v&agrave; phong c&aacute;ch đường phố đ&atilde; khẳng định xu hướng v&agrave;o năm 2024, ho&agrave;n hảo cho cuộc sống hằng ng&agrave;y cũng như cho cả một dịp lễ hội trang trọng.</p>', '2024-04-29 17:00:00', '2024-05-01 04:30:12'),
(4, '\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng', '<p>M&ugrave;a h&egrave; n&oacute;ng bức đ&atilde; đến, mang theo những ng&agrave;y nắng ch&oacute;i chang v&agrave; oi ả. B&ecirc;n cạnh những trang phục m&aacute;t mẻ, năng động, phong c&aacute;ch White on white - đang trở th&agrave;nh xu hướng thời trang được ưa chuộng bởi sự thanh lịch, tinh tế v&agrave; khả năng &#39;giảm nhiệt&#39; hiệu quả.</p>', 'X10G_12-1714358530525365606908-142-0-742-960-crop-17143869823881960985523.webp', '<p style=\"text-align:center\">White on white l&agrave; xu hướng phối đồ sử dụng gam m&agrave;u trắng chủ đạo cho to&agrave;n bộ trang phục, mang đến vẻ ngo&agrave;i thanh lịch, tinh tế v&agrave; đầy sang trọng. Gam m&agrave;u trắng vốn tượng trưng cho sự tinh khiết, nhẹ nh&agrave;ng, gi&uacute;p xua tan đi c&aacute;i n&oacute;ng oi ả của m&ugrave;a h&egrave;, đồng thời tạo cảm gi&aacute;c m&aacute;t mẻ v&agrave; dễ chịu cho người mặc.</p>\r\n\r\n<p style=\"text-align:center\">Một trong những l&yacute; lo khiến phong c&aacute;ch White on white lại trở n&ecirc;n hot trong m&ugrave;a h&egrave; năm nay ch&iacute;nh l&agrave; sự linh hoạt v&agrave; dễ d&agrave;ng phối hợp. Bạn c&oacute; thể biến h&oacute;a đa dạng với c&aacute;c item trang phục kh&aacute;c nhau như &aacute;o thun, quần short, set v&aacute;y, jumpsuit,...đều c&oacute; thể kết hợp h&agrave;i h&ograve;a theo phong c&aacute;ch White on white.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/3-17143585268921116779342.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 1.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/3-17143585268921116779342.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 1.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22608%22%20height%3D%22342%22%3E%3C%2Fsvg%3E\" /></p>\r\n\r\n<p style=\"text-align:center\"><iframe id=\"goog_824785134\" src=\"https://imasdk.googleapis.com/js/core/bridge3.637.1_vi.html#goog_824785134\" title=\"Advertisement\"></iframe></p>\r\n\r\n<p style=\"text-align:center\">V&aacute;y trắng v&agrave; &aacute;o kho&aacute;c trắng l&agrave; những item&nbsp;<a href=\"https://thanhnien.vn/chiec-quan-giai-nhiet-mua-he-mon-do-thoi-trang-tao-bao-tao-dien-mao-moi-185240422171816426.htm\" title=\"thời trang\">thời trang</a>&nbsp;kinh điển, lu&ocirc;n được c&aacute;c qu&yacute; c&ocirc; y&ecirc;u th&iacute;ch bởi sự thanh lịch, tinh tế v&agrave; dễ d&agrave;ng phối đồ. Trong những ng&agrave;y h&egrave; n&oacute;ng bức, sự kết hợp n&agrave;y c&agrave;ng trở n&ecirc;n ho&agrave;n hảo, gi&uacute;p bạn vừa cảm thấy thoải m&aacute;i, m&aacute;t mẻ lại vẫn giữ được phong c&aacute;ch thời trang ấn tượng.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/5-17143585269311900420171.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 2.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/5-17143585269311900420171.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 2.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">V&aacute;y trắng c&oacute; v&ocirc; số kiểu d&aacute;ng để bạn lựa chọn, từ v&aacute;y su&ocirc;ng đơn giản đến v&aacute;y chữ A năng động, hay v&aacute;y maxi thanh lịch. Nếu bạn c&oacute; th&acirc;n h&igrave;nh mảnh mai, h&atilde;y thử những chiếc v&aacute;y &ocirc;m s&aacute;t để t&ocirc;n l&ecirc;n đường cong cơ thể. Ngược lại, với th&acirc;n h&igrave;nh đầy đặn hơn,&nbsp;<a href=\"https://thanhnien.vn/thu-tha-vao-he-voi-ao-rong-vay-suong-mem-185240421070827889.htm\" title=\"váy suông\">v&aacute;y su&ocirc;ng</a>&nbsp;hoặc v&aacute;y x&ograve;e nhẹ nh&agrave;ng sẽ gi&uacute;p che đi khuyết điểm một c&aacute;ch hiệu quả.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/6-1714358526949959895756.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 3.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/6-1714358526949959895756.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 3.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/8-17143585280892046521275.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 4.\" height=\"\" src=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/8-17143585280892046521275.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 4.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Nếu bạn kh&ocirc;ng th&iacute;ch những chiếc v&aacute;y điệu đ&agrave;, c&oacute; thể thay thế bằng chiếc quần trắng năng động v&agrave; ph&aacute; c&aacute;ch. V&agrave;o m&ugrave;a h&egrave; n&oacute;ng bức, n&ecirc;n ưu ti&ecirc;n những kiểu d&aacute;ng thoải m&aacute;i như quần short kaki, cotton,... với độ d&agrave;i tr&ecirc;n gối hoặc lửng bắp ch&acirc;n. Ph&iacute;a tr&ecirc;n kết hợp c&ugrave;ng chiếc &aacute;o blazer trắng thanh lịch v&agrave; tinh tế, sự phối hợp n&agrave;y tạo cảm gi&aacute;c h&agrave;i h&ograve;a cho tổng thể, vừa năng động trẻ trung lại pha lẫn ch&uacute;t thời thượng.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/9-17143585290571326868972.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 5.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/9-17143585290571326868972.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 5.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Đối với c&aacute;c c&ocirc; n&agrave;ng c&ocirc;ng sở, set vest trắng l&agrave; một item thời trang kh&ocirc;ng thể thiếu trong tủ đồ d&ugrave; l&agrave; bất kỳ m&ugrave;a n&agrave;o. Được ưa chuộng bởi sự thanh lịch, tinh tế v&agrave; hiện đại. M&agrave;u trắng mang đến cảm gi&aacute;c nhẹ nh&agrave;ng, trang nh&atilde;, đồng thời t&ocirc;n l&ecirc;n vẻ chuy&ecirc;n nghiệp v&agrave; tự tin của người mặc. C&aacute;c n&agrave;ng n&ecirc;n chọn set vest c&oacute; k&iacute;ch thước vừa vặn với cơ thể để t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng, phần vai kh&ocirc;ng qu&aacute; rộng cũng kh&ocirc;ng qu&aacute; chật. Quần t&acirc;y cần c&oacute; độ d&agrave;i vừa phải, c&oacute; thể ngắn tr&ecirc;n mắt c&aacute; ch&acirc;n để tạo sự trẻ trung, năng động.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/10-17143585293521496548553.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 6.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/10-17143585293521496548553.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 6.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">M&ugrave;a h&egrave; s&ocirc;i động đang đến gần, v&agrave; những chiếc v&aacute;y x&ograve;e trắng tinh kh&ocirc;i ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo cho những c&ocirc; n&agrave;ng muốn tận hưởng trọn vẹn niềm vui khi đi biển. Mang trong m&igrave;nh vẻ đẹp nhẹ nh&agrave;ng, thanh tho&aacute;t, v&aacute;y x&ograve;e trắng như đưa bạn lạc v&agrave;o thế giới thơ mộng, nơi những cơn gi&oacute; biển thổi lồng lộng, v&agrave; tiếng s&oacute;ng vỗ r&igrave; r&agrave;o như bản nhạc du dương.</p>\r\n\r\n<p style=\"text-align:center\">Với sự tiện lợi, thoải m&aacute;i v&agrave; đa dạng về kiểu d&aacute;ng, jumpsuit kh&ocirc;ng thể n&agrave;o thiếu trong tủ đồ của những c&ocirc; n&agrave;ng muốn tỏa s&aacute;ng trong m&ugrave;a h&egrave; s&ocirc;i động. Một chiếc jumpsuit trắng gi&uacute;p bạn tiết kiệm thời gian phối đồ, chỉ cần một m&oacute;n đồ duy nhất đ&atilde; c&oacute; bộ trang phục ho&agrave;n chỉnh.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/12-1714358530525365606908.jpg\" target=\"_blank\" title=\"\"><img alt=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 7.\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/12-1714358530525365606908.jpg\" title=\"\'Giảm nhiệt\' mùa hè với phong cách màu trắng \'nguyên cây\' cực thời thượng- Ảnh 7.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Jumpsuit c&oacute; rất nhiều kiểu d&aacute;ng, từ đơn giản, thanh lịch đến c&aacute; t&iacute;nh, thời thượng, gi&uacute;p bạn dễ d&agrave;ng thể hiện phong c&aacute;ch ri&ecirc;ng của m&igrave;nh. Loại trang phục n&agrave;y thường được l&agrave;m bởi chất liệu voan, linen, cotton,... l&agrave; những lựa chọn tốt nhất cho m&ugrave;a h&egrave; v&igrave; ch&uacute;ng c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i tốt, gi&uacute;p bạn lu&ocirc;n cảm thấy thoải m&aacute;i. Nếu bạn c&oacute; v&oacute;c d&aacute;ng mảnh mai, h&atilde;y chọn jumpsuit c&oacute; chi tiết b&egrave;o nh&uacute;n, xếp ly để tạo cảm gi&aacute;c đầy đặn hơn. Ngược lại, nếu bạn c&oacute; v&oacute;c d&aacute;ng mũm mĩm, h&atilde;y chọn jumpsuit c&oacute; kiểu d&aacute;ng su&ocirc;ng rộng để che đi khuyết điểm cơ thể.</p>\r\n\r\n<p style=\"text-align:center\">White on white kh&ocirc;ng chỉ l&agrave; xu hướng thời trang nhất thời m&agrave; c&ograve;n l&agrave; phong c&aacute;ch &quot;kinh điển&quot; m&agrave; bất kỳ t&iacute;n đồ thời trang n&agrave;o cũng n&ecirc;n sở hữu. H&atilde;y thử &aacute;p dụng những b&iacute; quyết tr&ecirc;n để &quot;giải nhiệt&quot; m&ugrave;a h&egrave; n&agrave;y với phong c&aacute;ch White on white cực kỳ s&agrave;nh điệu v&agrave; thời thượng nh&eacute;!</p>\r\n\r\n<p style=\"text-align:center\"><em>Nguồn ảnh: charleskeith.vn, Pinterest guitamoda</em></p>', '2024-04-29 17:00:00', '2024-05-01 04:59:54'),
(5, 'Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc', '<p>&Yacute; tưởng kết hợp v&aacute;y d&agrave;i v&agrave; quần c&oacute; thể gợi lại những h&igrave;nh ảnh về tủ quần &aacute;o những năm 90 tưởng rất xa nhưng khi t&aacute;i hiện ở những năm đầu thế kỷ 21, theo những s&aacute;ng tạo mới mẻ của c&aacute;c nữ t&iacute;n đồ n&oacute; lại trở n&ecirc;n hấp dẫn một c&aacute;ch đ&aacute;ng kể.</p>', 'OmOX_2-1714426311177984983569-177-0-1169-1587-crop-17144289650462094189979.webp', '<p style=\"text-align:center\">Được dẫn đầu kh&ocirc;ng chỉ bởi c&aacute;c nữ ng&ocirc;i sao Hollywood, &quot;combo&quot;&nbsp;<a href=\"https://thanhnien.vn/7-cach-tao-kieu-khan-lua-thanh-ao-thoi-trang-hot-nhat-tiktok-185240428210534969.htm\" title=\"thời trang\">thời trang</a>&nbsp;<a href=\"https://thanhnien.vn/quan-vay-mon-do-can-co-cua-nhung-hoat-dong-tu-do-ngoai-troi-185240426185639071.htm\" title=\"váy\">v&aacute;y</a>&nbsp;d&agrave;i v&agrave; quần c&agrave;ng gần đ&acirc;y lại c&agrave;ng được ưa chuộng bởi sự lăng x&ecirc; của c&aacute;c nữ sao Hoa ngữ v&agrave; H&agrave;n Quốc. Từ Ros&eacute; của&nbsp;<em>BlackPink</em>, Trương Tịnh Nghi (c&ocirc;ng ch&uacute;a của Cbiz, nữ ch&iacute;nh phim&nbsp;<em>Chiếc bật lửa v&agrave; v&aacute;y c&ocirc;ng ch&uacute;a</em>) đến người đẹp Ch&acirc;u Vũ Đồng của phim&nbsp;<em>Sắc xu&acirc;n gửi người t&igrave;nh</em>&nbsp;v&agrave;&nbsp;<em>T&igrave;nh y&ecirc;u m&agrave; th&ocirc;i</em>&hellip; đều lần lượt khoe d&aacute;ng trong kiểu phối đồ th&uacute; vị n&agrave;y.</p>\r\n\r\n<p style=\"text-align:center\">Nỗi lo lắng lớn nhất khi phối&nbsp;<a href=\"https://thanhnien.vn/quan-vay-mon-do-can-co-cua-nhung-hoat-dong-tu-do-ngoai-troi-185240426185639071.htm\" title=\"váy\">v&aacute;y</a>&nbsp;d&agrave;i ngo&agrave;i quần jeans l&agrave; vẻ ngo&agrave;i tr&ocirc;ng sẽ l&ocirc;i th&ocirc;i, cồng kềnh. Để tr&aacute;nh điều n&agrave;y, h&atilde;y chọn những chiếc v&aacute;y d&agrave;i nhẹ nh&agrave;ng, bồng bềnh v&agrave; tốt nhất l&agrave; n&ecirc;n bằng c&aacute;c chất liệu như voan, cotton mỏng v&agrave; kết hợp ch&uacute;ng với những đ&ocirc;i&nbsp;<a href=\"https://thanhnien.vn/7-doi-giay-cong-so-phai-co-trong-tu-do-mua-thoi-trang-he-185240406005030879.htm\" title=\"giày\">gi&agrave;y</a>, t&uacute;i x&aacute;ch tinh tế, nữ t&iacute;nh. Những kiểu thời trang quần su&ocirc;ng hoặc d&aacute;ng loe được xem l&agrave; l&yacute; tưởng, ph&ugrave; hợp nhất.</p>\r\n\r\n<p style=\"text-align:center\">Tuy nhi&ecirc;n, nếu bạn đủ gầy hoặc cảm thấy kh&ocirc;ng phiền h&agrave; về d&aacute;ng vẻ l&ocirc;i th&ocirc;i m&agrave; kiểu phối đồ n&agrave;y mang lại th&igrave; c&oacute; thể chọn cả những chiếc v&aacute;y rộng. Đơn giản bởi cảm hứng m&agrave; kiểu phối đồ n&agrave;y mang tới ch&iacute;nh l&agrave; sự ho&agrave;i cổ, vẻ đẹp tự do, nhẹ nh&agrave;ng vừa pha ch&uacute;t phong c&aacute;ch&nbsp;<a href=\"https://thanhnien.vn/7-cach-tao-kieu-khan-lua-thanh-ao-thoi-trang-hot-nhat-tiktok-185240428210534969.htm\" title=\"thời trang\">thời trang</a>&nbsp;vintage l&atilde;ng mạn lại c&oacute; ch&uacute;t phong c&aacute;ch boho ph&oacute;ng kho&aacute;ng.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/1-1714426310960476861947.jpg\" target=\"_blank\" title=\"Công chúa của Cbiz Trương Tịnh Nghi giới thiệu mẫu váy mới của Peacebird và kết hợp nó với chiếc quần trắng tạo ra một dáng vẻ vừa nữ tính, vừa phóng khoáng lại mạnh mẽ và mới lạ, rất cuốn hút\"><img alt=\"Công chúa của Cbiz Trương Tịnh Nghi giới thiệu mẫu váy mới của Peacebird và kết hợp nó với chiếc quần trắng tạo ra một dáng vẻ vừa nữ tính, vừa phóng khoáng lại mạnh mẽ và mới lạ, rất cuốn hút\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/1-1714426310960476861947.jpg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 1.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">C&ocirc;ng ch&uacute;a của Cbiz Trương Tịnh Nghi giới thiệu mẫu v&aacute;y mới của Peacebird v&agrave; kết hợp n&oacute; với chiếc quần trắng tạo ra một d&aacute;ng vẻ vừa nữ t&iacute;nh, vừa ph&oacute;ng kho&aacute;ng lại mạnh mẽ v&agrave; mới lạ, rất cuốn h&uacute;t</p>\r\n\r\n<p style=\"text-align:center\">PEACEBIRD</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/c2-1714426291698979984180.jpeg\" target=\"_blank\" title=\"Nữ diễn viên sinh năm 1995 của bộ phim Hoa ngữ đang hot Sắc xuân gửi người tình diện chiếc váy voan hoa xanh lãng mạn, kết hợp với chiếc quần jeans dài, dáng suông. Chiếc váy cài khuy, thắt eo dây được người đẹp sáng tạo không cài nút mà dùng thêm chiếc áo dây ngắn tạo thành combo trang phục trẻ trung, hiện đại\"><img alt=\"Nữ diễn viên sinh năm 1995 của bộ phim Hoa ngữ đang hot Sắc xuân gửi người tình diện chiếc váy voan hoa xanh lãng mạn, kết hợp với chiếc quần jeans dài, dáng suông. Chiếc váy cài khuy, thắt eo dây được người đẹp sáng tạo không cài nút mà dùng thêm chiếc áo dây ngắn tạo thành combo trang phục trẻ trung, hiện đại\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/c2-1714426291698979984180.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 2.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Nữ diễn vi&ecirc;n sinh năm 1995 của bộ phim Hoa ngữ đang hot&nbsp;<em>Sắc xu&acirc;n gửi người t&igrave;nh&nbsp;</em>diện chiếc v&aacute;y voan hoa xanh l&atilde;ng mạn, kết hợp với chiếc quần jeans d&agrave;i, d&aacute;ng su&ocirc;ng. Chiếc v&aacute;y c&agrave;i khuy, thắt eo d&acirc;y được người đẹp s&aacute;ng tạo kh&ocirc;ng c&agrave;i n&uacute;t m&agrave; d&ugrave;ng th&ecirc;m chiếc &aacute;o d&acirc;y ngắn tạo th&agrave;nh combo trang phục trẻ trung, hiện đại</p>\r\n\r\n<p style=\"text-align:center\">ZHOU YU TONG WEIBO</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/edit-1-1714426502383203499982.jpeg\" target=\"_blank\" title=\"Nữ diễn viên của phim Sắc xuân gửi người tình dường như rất thích kiểu phối đồ thời trang này. Trong bộ phim cô sử dụng khá nhiều bộ trang phục theo phong cách này\"><img alt=\"Nữ diễn viên của phim Sắc xuân gửi người tình dường như rất thích kiểu phối đồ thời trang này. Trong bộ phim cô sử dụng khá nhiều bộ trang phục theo phong cách này\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/edit-1-1714426502383203499982.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 3.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Nữ diễn vi&ecirc;n của phim&nbsp;<em>Sắc xu&acirc;n gửi người t&igrave;nh</em>&nbsp;dường như rất th&iacute;ch kiểu phối đồ thời trang n&agrave;y. Trong bộ phim c&ocirc; sử dụng kh&aacute; nhiều bộ trang phục theo phong c&aacute;ch n&agrave;y</p>\r\n\r\n<p style=\"text-align:center\">ZHOU YU TONG WEIBO</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/edit-c6-17144264580181664739415.jpeg\" target=\"_blank\" title=\"Diện váy dây và quần jeans ống rộng, Châu Vũ Đồng hút fan bằng phong cách thời trang táo bạo, vui nhộn mà rất khác biệt, hiện đại\"><img alt=\"Diện váy dây và quần jeans ống rộng, Châu Vũ Đồng hút fan bằng phong cách thời trang táo bạo, vui nhộn mà rất khác biệt, hiện đại\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/edit-c6-17144264580181664739415.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 4.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Diện v&aacute;y d&acirc;y v&agrave; quần jeans ống rộng, Ch&acirc;u Vũ Đồng h&uacute;t fan bằng phong c&aacute;ch thời trang t&aacute;o bạo, vui nhộn m&agrave; rất kh&aacute;c biệt, hiện đại</p>\r\n\r\n<p style=\"text-align:center\">ZHOU YU TONG WEIBO</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/x-com-black-pink-rose-171442628873761131084.jpeg\" target=\"_blank\" title=\"Ngôi sao của BlackPink (Hàn Quốc) gây chú ý với set đồ đơn giản nhưng rất thời thượng gồm quần jeans ống suông, váy hoa nhí xanh cùng tông và giày thể thao khỏe khoắn\"><img alt=\"Ngôi sao của BlackPink (Hàn Quốc) gây chú ý với set đồ đơn giản nhưng rất thời thượng gồm quần jeans ống suông, váy hoa nhí xanh cùng tông và giày thể thao khỏe khoắn\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/x-com-black-pink-rose-171442628873761131084.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 5.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Ng&ocirc;i sao của&nbsp;<em>BlackPink</em>&nbsp;(H&agrave;n Quốc) g&acirc;y ch&uacute; &yacute; với set đồ đơn giản nhưng rất thời thượng gồm quần jeans ống su&ocirc;ng, v&aacute;y hoa nh&iacute; xanh c&ugrave;ng t&ocirc;ng v&agrave; gi&agrave;y thể thao khỏe khoắn</p>\r\n\r\n<p style=\"text-align:center\">XCOM</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/itv-events--1714426292344436430616.jpeg\" target=\"_blank\" title=\"Ngôi sao Hàn Quốc tiếp tục khoe sắc trong một &quot;combo&quot; váy dài và quần jeans khác cũng vô cùng lạ mắt và cuốn hút\"><img alt=\"Ngôi sao Hàn Quốc tiếp tục khoe sắc trong một \" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/itv-events--1714426292344436430616.jpeg\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Ng&ocirc;i sao H&agrave;n Quốc tiếp tục khoe sắc trong một &quot;combo&quot; v&aacute;y d&agrave;i v&agrave; quần jeans kh&aacute;c cũng v&ocirc; c&ugrave;ng lạ mắt v&agrave; cuốn h&uacute;t</p>\r\n\r\n<p style=\"text-align:center\">ITV EVENTS</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/edit-anh-sua-2-1714426477568511857704.jpeg\" target=\"_blank\" title=\"Giới trẻ bắt nhịp rất nhanh cùng thần tượng và tạo ra những kiểu phối kết sáng tạo, giàu tính thẩm mỹ thời trang khi sử dụng phụ kiện đi kèm như giày, choker linh hoạt và lạ mắt\"><img alt=\"Giới trẻ bắt nhịp rất nhanh cùng thần tượng và tạo ra những kiểu phối kết sáng tạo, giàu tính thẩm mỹ thời trang khi sử dụng phụ kiện đi kèm như giày, choker linh hoạt và lạ mắt\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/edit-anh-sua-2-1714426477568511857704.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 7.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Giới trẻ bắt nhịp rất nhanh c&ugrave;ng thần tượng v&agrave; tạo ra những kiểu phối kết s&aacute;ng tạo, gi&agrave;u t&iacute;nh thẩm mỹ thời trang khi sử dụng phụ kiện đi k&egrave;m như gi&agrave;y, choker linh hoạt v&agrave; lạ mắt</p>\r\n\r\n<p style=\"text-align:center\">LEMON8</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/edit-lemon8-17144265547922136092342.jpeg\" target=\"_blank\" title=\"Gam đen trắng tối giản càng được nổi bật bởi chiếc váy dây gợi cảm. Sự nhất quán trong màu sắc từ dây tết kèm tóc, váy, quần, giày, túi đến màu nail khiến cô gái trẻ trở nên sành điệu hết nấc\"><img alt=\"Gam đen trắng tối giản càng được nổi bật bởi chiếc váy dây gợi cảm. Sự nhất quán trong màu sắc từ dây tết kèm tóc, váy, quần, giày, túi đến màu nail khiến cô gái trẻ trở nên sành điệu hết nấc\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/edit-lemon8-17144265547922136092342.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 8.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Gam đen trắng tối giản c&agrave;ng được nổi bật bởi chiếc v&aacute;y d&acirc;y gợi cảm. Sự nhất qu&aacute;n trong m&agrave;u sắc từ d&acirc;y tết k&egrave;m t&oacute;c, v&aacute;y, quần, gi&agrave;y, t&uacute;i đến m&agrave;u nail khiến c&ocirc; g&aacute;i trẻ trở n&ecirc;n s&agrave;nh điệu hết nấc</p>\r\n\r\n<p style=\"text-align:center\">LEMON8</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/vogue-gestuzss2417d621359f2b-17144264222641093002205.jpg\" target=\"_blank\" title=\"Không chỉ là lối phối kết thời trang ngẫu hứng, do những fashionista đường phố tạo ra, kiểu kết hợp váy dài và quần cũng góp mặt mạnh mẽ trên các sàn diễn thời trang, tạo ra một xu hướng hoàn chỉnh về một phong cách thời trang hấp dẫn\"><img alt=\"Không chỉ là lối phối kết thời trang ngẫu hứng, do những fashionista đường phố tạo ra, kiểu kết hợp váy dài và quần cũng góp mặt mạnh mẽ trên các sàn diễn thời trang, tạo ra một xu hướng hoàn chỉnh về một phong cách thời trang hấp dẫn\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/vogue-gestuzss2417d621359f2b-17144264222641093002205.jpg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 9.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Kh&ocirc;ng chỉ l&agrave; lối phối kết thời trang ngẫu hứng, do những fashionista đường phố tạo ra, kiểu kết hợp v&aacute;y d&agrave;i v&agrave; quần cũng g&oacute;p mặt mạnh mẽ tr&ecirc;n c&aacute;c s&agrave;n diễn thời trang, tạo ra một xu hướng ho&agrave;n chỉnh về một phong c&aacute;ch thời trang hấp dẫn</p>\r\n\r\n<p style=\"text-align:center\">VOGUE</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/instyle-dressoverpants-sacai-5d6686510d0b4bb1b5c8b5a88af9b59d-17144262891841661132659.jpeg\" target=\"_blank\" title=\"Váy dài ngoài quần được xem là chủ nghĩa về sự tối đa nhưng lại tạo ra những đường nét gọn gàng nhờ các gam màu, họa tiết trung tính mang lại những cảm xúc thời trang tươi sáng nhờ tinh thần phóng khoáng, tự do toát ra từ bộ đồ\"><img alt=\"Váy dài ngoài quần được xem là chủ nghĩa về sự tối đa nhưng lại tạo ra những đường nét gọn gàng nhờ các gam màu, họa tiết trung tính mang lại những cảm xúc thời trang tươi sáng nhờ tinh thần phóng khoáng, tự do toát ra từ bộ đồ\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/instyle-dressoverpants-sacai-5d6686510d0b4bb1b5c8b5a88af9b59d-17144262891841661132659.jpeg\" title=\"Phối váy dài với quần sành điệu như dàn sao Hoa ngữ và Hàn Quốc- Ảnh 10.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">V&aacute;y d&agrave;i ngo&agrave;i quần được xem l&agrave; chủ nghĩa về sự tối đa nhưng lại tạo ra những đường n&eacute;t gọn g&agrave;ng nhờ c&aacute;c gam m&agrave;u, họa tiết trung t&iacute;nh mang lại những cảm x&uacute;c thời trang tươi s&aacute;ng nhờ tinh thần ph&oacute;ng kho&aacute;ng, tự do to&aacute;t ra từ bộ đồ</p>\r\n\r\n<p style=\"text-align:center\">INSTYLE</p>', '2024-04-28 17:00:00', '2024-05-01 05:01:02');
INSERT INTO `blog` (`id`, `title`, `description`, `image`, `content`, `created_at`, `updated_at`) VALUES
(6, 'Làm đẹp cho kỳ nghỉ bằng những mẫu nail \'đình đám\' nhất mùa hè', '<p>Mẫu nail kiểu Ph&aacute;p neon, hoa văn giống Lilly Pulitzer v&agrave; những mảnh sơn bắn tung t&oacute;e theo phong c&aacute;ch nghệ thuật đại ch&uacute;ng chỉ l&agrave; một v&agrave;i trong số những thiết kế m&oacute;ng tay th&uacute; vị nhất trong m&ugrave;a n&agrave;y.</p>', 'qMCZ_allure-summer-2024-nails-trends-1714426421324265522663-0-160-900-1600-crop-17144305379511075730690.webp', '<p style=\"text-align:center\">Dạo phố, xuống biển hay đến bể bơi đều n&ecirc;n c&oacute; những bộ m&oacute;ng - những mẫu nail đẹp để kh&ocirc;ng chỉ được nổi bật m&agrave; c&ograve;n được tận hưởng cảm gi&aacute;c thời thượng tới từng chi tiết - trong những&nbsp;<a href=\"https://thanhnien.vn/trang-diem-kieu-co-tich-sugar-plum-fairy-nhe-nhang-vua-du-ly-tuong-cho-ky-nghi-185240428201428329.htm\" title=\"kỳ nghỉ\">kỳ nghỉ</a>&nbsp;d&agrave;i nhẹ nh&agrave;ng, đầy m&agrave;u sắc.</p>\r\n\r\n<p style=\"text-align:center\">Việc l&ecirc;n kế hoạch cho kỳ nghỉ v&agrave; chuẩn bị những g&igrave; cho&nbsp;<a href=\"https://thanhnien.vn/trang-diem-kieu-co-tich-sugar-plum-fairy-nhe-nhang-vua-du-ly-tuong-cho-ky-nghi-185240428201428329.htm\" title=\"kỳ nghỉ\">kỳ nghỉ</a>&nbsp;<a href=\"https://thanhnien.vn/vay-cut-out-va-nhung-voc-dang-moi-me-nhat-cua-mua-he-da-toi-185240418150024246.htm\" title=\"hè\">h&egrave;</a>&nbsp;vừa n&oacute;i tới l&agrave; cả một vấn đề. C&oacute; nhiều thứ chi tiết nhưng quan trọng tới mức nếu thiếu n&oacute; cảm x&uacute;c sẽ ảnh hưởng kh&ocirc;ng &iacute;t - những mẫu nail l&agrave; một trong số c&aacute;c vấn đề đ&oacute;.</p>\r\n\r\n<p style=\"text-align:center\">Tựa như những chuyến phi&ecirc;u lưu kỳ th&uacute; về m&agrave;u sắc, h&igrave;nh khối v&agrave; sự s&aacute;ng tạo tr&ecirc;n những chiếc m&oacute;ng tay, c&aacute;c thiết kế m&oacute;ng d&agrave;nh cho kỳ nghỉ của năm 2024 tựu trung mang lại cảm x&uacute;c vui nhộn, t&iacute;ch cực - trong một d&aacute;ng vẻ thanh lịch, khi&ecirc;m tốn v&agrave; nhẹ nh&agrave;ng, nh&atilde; nhặn, rất đ&aacute;ng để c&aacute;c nữ t&iacute;n đồ trải nghiệm v&agrave; lựa chọn.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/allure-summer-2024-nails-trends-1714426421324265522663.jpg\" target=\"_blank\" title=\"Thiết kế mẫu nail kiểu Pháp tựa như ánh sắc của đèn neon mỏng trên móng tay. Hội tụ từ những gam màu trung tính, chúng hòa trộn vừa đủ tạo nên sự tươi mới, sắc nét. Đây là mẫu móng dành cho những người yêu thích nghệ thuật làm móng và cũng là thiết kế mang lại cảm xúc tích cực nhất trong các mẫu móng &quot;hot trend&quot; của mùa hè 2024\"><img alt=\"Thiết kế mẫu nail kiểu Pháp tựa như ánh sắc của đèn neon mỏng trên móng tay. Hội tụ từ những gam màu trung tính, chúng hòa trộn vừa đủ tạo nên sự tươi mới, sắc nét. Đây là mẫu móng dành cho những người yêu thích nghệ thuật làm móng và cũng là thiết kế mang lại cảm xúc tích cực nhất trong các mẫu móng \" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/allure-summer-2024-nails-trends-1714426421324265522663.jpg\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Thiết kế mẫu nail kiểu Ph&aacute;p tựa như &aacute;nh sắc của đ&egrave;n neon mỏng tr&ecirc;n m&oacute;ng tay. Hội tụ từ những gam m&agrave;u trung t&iacute;nh, ch&uacute;ng h&ograve;a trộn vừa đủ tạo n&ecirc;n sự tươi mới, sắc n&eacute;t. Đ&acirc;y l&agrave; mẫu m&oacute;ng d&agrave;nh cho những người y&ecirc;u th&iacute;ch nghệ thuật l&agrave;m m&oacute;ng v&agrave; cũng l&agrave; thiết kế mang lại cảm x&uacute;c t&iacute;ch cực nhất trong c&aacute;c mẫu m&oacute;ng &quot;hot trend&quot; của m&ugrave;a h&egrave; 2024</p>\r\n\r\n<p style=\"text-align:center\">ALLURE</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/allure-jen-seales-colored-chrome-cat-eye-french-1714426421616147535323.jpg\" target=\"_blank\" title=\"Những người thích phong cách thẩm mỹ tối giản thường sẽ thích thiết kế nail &quot;khiêm tốn&quot; này. Gam hồng nhẹ nhàng thêm chút nhũ lấp lánh vừa thanh lịch lại vừa duyên dáng, nữ tính mà vẫn đảm bảo sự nổi bật cần thiết. Mẫu nail này rất phù hợp với các &quot;combo&quot; váy cùng tông màu hoặc cùng cặp màu (theo bánh xe màu quy chuẩn)\"><img alt=\"Những người thích phong cách thẩm mỹ tối giản thường sẽ thích thiết kế nail \" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/allure-jen-seales-colored-chrome-cat-eye-french-1714426421616147535323.jpg\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Những người th&iacute;ch phong c&aacute;ch thẩm mỹ tối giản thường sẽ th&iacute;ch thiết kế nail &quot;khi&ecirc;m tốn&quot; n&agrave;y. Gam hồng nhẹ nh&agrave;ng th&ecirc;m ch&uacute;t nhũ lấp l&aacute;nh vừa thanh lịch lại vừa duy&ecirc;n d&aacute;ng, nữ t&iacute;nh m&agrave; vẫn đảm bảo sự nổi bật cần thiết. Mẫu nail n&agrave;y rất ph&ugrave; hợp với c&aacute;c &quot;combo&quot;&nbsp;<a href=\"https://thanhnien.vn/quan-vay-mon-do-can-co-cua-nhung-hoat-dong-tu-do-ngoai-troi-185240426185639071.htm\" title=\"váy\">v&aacute;y</a>&nbsp;c&ugrave;ng t&ocirc;ng m&agrave;u hoặc c&ugrave;ng cặp m&agrave;u (theo b&aacute;nh xe m&agrave;u quy chuẩn)</p>\r\n\r\n<p style=\"text-align:center\">ALLURE</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/allure-anthony-miller-blush-nails-and-bows-1714426423672231588299.jpg\" target=\"_blank\" title=\"Các thiết kế theo xu hướng họa tiết như nơ là những lựa chọn đáng lưu tâm để giúp bạn hòa nhập vào tâm trạng mùa hè tốt nhất. Đây là thiết kế móng mà các chuyên gia khuyên rằng rất phù hợp cho các buổi dạo phố, &quot;ngồi thiền&quot; quán xá nhâm nhi cà phê hay đơn giản chỉ là lang thang ở thư viện đọc sách, tận hưởng kỳ nghỉ thư thái theo cách riêng\"><img alt=\"Các thiết kế theo xu hướng họa tiết như nơ là những lựa chọn đáng lưu tâm để giúp bạn hòa nhập vào tâm trạng mùa hè tốt nhất. Đây là thiết kế móng mà các chuyên gia khuyên rằng rất phù hợp cho các buổi dạo phố, \" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/allure-anthony-miller-blush-nails-and-bows-1714426423672231588299.jpg\" /></a></p>\r\n\r\n<p style=\"text-align:center\">C&aacute;c thiết kế theo xu hướng họa tiết như nơ l&agrave; những lựa chọn đ&aacute;ng lưu t&acirc;m để gi&uacute;p bạn h&ograve;a nhập v&agrave;o t&acirc;m trạng&nbsp;<a href=\"https://thanhnien.vn/5-loai-trai-cay-co-ham-luong-protein-cao-trong-bang-xep-hang-mua-he-18524041117130034.htm\" title=\"mùa hè\">m&ugrave;a h&egrave;</a>&nbsp;tốt nhất. Đ&acirc;y l&agrave; thiết kế m&oacute;ng m&agrave; c&aacute;c chuy&ecirc;n gia khuy&ecirc;n rằng rất ph&ugrave; hợp cho c&aacute;c buổi dạo phố, &quot;ngồi thiền&quot; qu&aacute;n x&aacute; nh&acirc;m nhi c&agrave; ph&ecirc; hay đơn giản chỉ l&agrave; lang thang ở thư viện đọc s&aacute;ch, tận hưởng kỳ nghỉ thư th&aacute;i theo c&aacute;ch ri&ecirc;ng</p>\r\n\r\n<p style=\"text-align:center\">ALLURE</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/allure-paintbox-press-ons-171442642294974255979.jpg\" target=\"_blank\" title=\"Mạnh mẽ và sắc sảo, những thiết kế móng có đường viền hoặc sắc cạnh phù hợp với các chuyến du lịch đi xuyên tỉnh. Màu sắc giản đơn nhưng lại đủ lấp lánh khiến cho tâm trạng luôn đạt được sự tích cực để trải nghiệm những cung đường không giới hạn\"><img alt=\"Mạnh mẽ và sắc sảo, những thiết kế móng có đường viền hoặc sắc cạnh phù hợp với các chuyến du lịch đi xuyên tỉnh. Màu sắc giản đơn nhưng lại đủ lấp lánh khiến cho tâm trạng luôn đạt được sự tích cực để trải nghiệm những cung đường không giới hạn\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/allure-paintbox-press-ons-171442642294974255979.jpg\" title=\"Làm đẹp cho kỳ nghỉ bằng những mẫu nail \'đình đám\' nhất mùa hè- Ảnh 4.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Mạnh mẽ v&agrave; sắc sảo, những thiết kế m&oacute;ng c&oacute; đường viền hoặc sắc cạnh ph&ugrave; hợp với c&aacute;c chuyến du lịch đi xuy&ecirc;n tỉnh. M&agrave;u sắc giản đơn nhưng lại đủ lấp l&aacute;nh khiến cho t&acirc;m trạng lu&ocirc;n đạt được sự t&iacute;ch cực để trải nghiệm những cung đường kh&ocirc;ng giới hạn</p>\r\n\r\n<p style=\"text-align:center\">ALLURE</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/4/29/allure-chillhouse-pop-nail-art-17144264225441199150811.jpg\" target=\"_blank\" title=\"Những gam màu bùng nổ theo phong cách pop-art là những lựa chọn tuyệt vời để thể hiện cá tính và thẩm mỹ thời trang. Mẫu nail đặc biệt phù hợp với những bộ bikini hoặc những chiếc váy dài có cùng gam màu, tạo ra một dáng vẻ thời trang đồng bộ và sành điệu hết nấc\"><img alt=\"Những gam màu bùng nổ theo phong cách pop-art là những lựa chọn tuyệt vời để thể hiện cá tính và thẩm mỹ thời trang. Mẫu nail đặc biệt phù hợp với những bộ bikini hoặc những chiếc váy dài có cùng gam màu, tạo ra một dáng vẻ thời trang đồng bộ và sành điệu hết nấc\" height=\"\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/4/29/allure-chillhouse-pop-nail-art-17144264225441199150811.jpg\" title=\"Làm đẹp cho kỳ nghỉ bằng những mẫu nail \'đình đám\' nhất mùa hè- Ảnh 5.\" width=\"\" /></a></p>\r\n\r\n<p style=\"text-align:center\">Những gam m&agrave;u b&ugrave;ng nổ theo&nbsp;<a href=\"https://thanhnien.vn/quan-baggy-mot-kieu-quan-ba-phong-cach-vua-nang-dong-vua-quyen-ru-185240419015745277.htm\" title=\"phong cách\">phong c&aacute;ch</a>&nbsp;pop-art l&agrave; những lựa chọn tuyệt vời để thể hiện c&aacute; t&iacute;nh v&agrave; thẩm mỹ thời trang. Mẫu nail đặc biệt ph&ugrave; hợp với những bộ bikini hoặc những chiếc v&aacute;y d&agrave;i c&oacute; c&ugrave;ng gam m&agrave;u, tạo ra một d&aacute;ng vẻ thời trang đồng bộ v&agrave; s&agrave;nh điệu hết nấc</p>\r\n\r\n<p style=\"text-align:center\">ALLURE</p>', '2024-04-28 17:00:00', '2024-05-01 05:02:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `number_star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_product`, `title`, `content`, `number_star`, `created_at`, `updated_at`) VALUES
(37, 14, 76, 'Áo đẹp', 'Quá sức tuyệt vời', 5, '2024-04-29 10:13:18', '2024-04-29 10:13:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_blogs`
--

CREATE TABLE `comment_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_blog` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `messages`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Thị Tuyết Măng', 'mvu69421@gmail.com@gmail.com', 'Shop chất lượng!', '2024-03-17 17:00:00', '2024-03-18 09:31:33'),
(3, 'Măng Vũ', 'mp753114@gmail.com', 'Tốt!', '2023-04-26 03:51:27', '2023-04-26 03:51:27'),
(4, 'dsaasd', 'trongtranbinh@gmail.com', 'sdadas', '2024-05-01 06:11:53', '2024-05-01 06:11:53'),
(5, 'dsaasd', 'trongtranbinh@gmail.com', 'sdadas', '2024-05-01 06:11:54', '2024-05-01 06:11:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_info`
--

CREATE TABLE `contact_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_info`
--

INSERT INTO `contact_info` (`id`, `address`, `tel`, `fax`, `email`, `created_at`, `updated_at`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7446.982624229566!2d105.73810386058695!3d21.053030473331955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454f9de2328cf%3A0xc5685fbea9808d8e!2zTmd1ecOqbiBYw6EsIE1pbmggS2hhaSwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1605000497757!5m2!1svi!2s', '(+84) 866 006 520', '(+84) 866 006 520', 'mp753114@gmail.com', '2024-04-10 06:22:24', '2024-05-01 06:32:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_nb` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone_nb`, `created_at`, `updated_at`, `google_id`) VALUES
(1, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2020-12-25 16:28:58', '2020-12-25 16:28:58', NULL),
(2, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2020-12-25 16:47:01', '2020-12-25 16:47:01', NULL),
(3, 'Phương Hà', 'mp753116@gmail.com', 'Cẩm Văn - Cẩm Giàng', '0866006523', '2020-12-25 16:48:15', '2020-12-25 16:48:15', NULL),
(4, 'Phương Hà', 'mp753116@gmail.com', 'Cẩm Văn - Cẩm Giàng', '0866006523', '2020-12-25 16:50:57', '2020-12-25 16:50:57', NULL),
(5, 'Hà Minh Phương', 'mp753118@gmail.com', 'Cẩm Văn Cẩm Giàng', '0866006520', '2020-12-26 03:46:09', '2020-12-26 03:46:09', NULL),
(6, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:11:42', '2021-01-08 03:11:42', NULL),
(7, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:13:25', '2021-01-08 03:13:25', NULL),
(8, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:13:32', '2021-01-08 03:13:32', NULL),
(9, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:14:15', '2021-01-08 03:14:15', NULL),
(10, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:17:20', '2021-01-08 03:17:20', NULL),
(11, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:20:18', '2021-01-08 03:20:18', NULL),
(12, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-27 12:54:44', '2021-01-27 12:54:44', NULL),
(13, 'Nguyễn Khuyến', 'mp753119@gmail.com', 'Cẩm Văn - Cẩm Giàng', '+84866006520', '2021-01-27 13:08:59', '2021-01-27 13:08:59', NULL),
(14, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2022-12-07 01:00:22', '2022-12-07 01:00:22', NULL),
(15, 'Trần Trọng ', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2022-12-08 16:28:15', '2022-12-08 16:28:15', NULL),
(16, 'Trần Trọng ', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2022-12-08 17:11:53', '2022-12-08 17:11:53', NULL),
(17, 'Trần Bình Trọng', 'trong.tran67@cd2.com', 'Nguyên Xá - Bắc Từ Liêm - Hà Nội', '0965814288', '2023-03-01 17:41:36', '2023-03-01 17:41:36', NULL),
(18, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-02 16:13:55', '2023-04-02 16:13:55', NULL),
(19, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-02 16:15:28', '2023-04-02 16:15:28', NULL),
(20, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-04 16:45:13', '2023-04-04 16:45:13', NULL),
(21, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-04 16:47:04', '2023-04-04 16:47:04', NULL),
(22, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-23 07:05:14', '2023-04-23 07:05:14', NULL),
(23, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-23 07:18:40', '2023-04-23 07:18:40', NULL),
(24, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-23 07:32:15', '2023-04-23 07:32:15', NULL),
(25, 'trong12435BSS', 'trongtb@gmail.com', 'Số 289 - Minh Khai - Bắc Từ Liêm', '0964446491', '2024-04-12 07:47:31', '2024-04-12 07:47:31', NULL),
(26, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-17 10:07:10', '2024-04-17 10:07:10', NULL),
(27, 'vtm123', 'mangvu002@gmail.com', 'fdsfs', 'dfsfsd', '2024-04-17 10:11:02', '2024-04-17 10:11:02', NULL),
(28, 'vtm123', 'mangvu002@gmail.com', 'đấ', 'dsadsa', '2024-04-17 10:18:22', '2024-04-17 10:18:22', NULL),
(29, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-19 10:42:23', '2024-04-19 10:42:23', NULL),
(30, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-19 10:44:09', '2024-04-19 10:44:09', NULL),
(31, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 00:55:02', '2024-04-20 00:55:02', NULL),
(32, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 00:58:29', '2024-04-20 00:58:29', NULL),
(33, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 01:03:43', '2024-04-20 01:03:43', NULL),
(34, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 01:06:10', '2024-04-20 01:06:10', NULL),
(35, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 01:07:18', '2024-04-20 01:07:18', NULL),
(36, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 01:07:54', '2024-04-20 01:07:54', NULL),
(37, 'vtm123', 'mangvu002@gmail.com', 'Ha Noi', '0972226371', '2024-04-20 01:08:31', '2024-04-20 01:08:31', NULL),
(38, 'mangvu123', 'mangvtt@gmail.com', 'dfg', 'gfdgfd', '2024-04-29 10:06:54', '2024-04-29 10:06:54', NULL),
(39, 'Măng Vũ', 'mangvtt02@gmail.com', 'Test', 'Test', '2024-04-29 10:08:44', '2024-04-29 10:08:44', NULL),
(40, 'Măng Vũ', 'mangvtt02@gmail.com', 'bcvcv', 'bvcxcvx', '2024-04-29 10:10:01', '2024-04-29 10:10:01', NULL),
(41, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:25:40', '2024-04-29 10:25:40', NULL),
(42, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:26:27', '2024-04-29 10:26:27', NULL),
(43, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:28:36', '2024-04-29 10:28:36', NULL),
(44, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:29:25', '2024-04-29 10:29:25', NULL),
(45, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:30:10', '2024-04-29 10:30:10', NULL),
(46, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:30:37', '2024-04-29 10:30:37', NULL),
(47, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:36:04', '2024-04-29 10:36:04', NULL),
(48, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:36:48', '2024-04-29 10:36:48', NULL),
(49, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:41:29', '2024-04-29 10:41:29', NULL),
(50, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:42:34', '2024-04-29 10:42:34', NULL),
(51, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:43:14', '2024-04-29 10:43:14', NULL),
(52, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:44:38', '2024-04-29 10:44:38', NULL),
(53, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:44:39', '2024-04-29 10:44:39', NULL),
(54, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:48:18', '2024-04-29 10:48:18', NULL),
(55, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:48:36', '2024-04-29 10:48:36', NULL),
(56, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:49:20', '2024-04-29 10:49:20', NULL),
(57, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:49:39', '2024-04-29 10:49:39', NULL),
(58, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 10:57:35', '2024-04-29 10:57:35', NULL),
(59, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-04-29 11:04:42', '2024-04-29 11:04:42', NULL),
(60, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 02:20:15', '2024-05-01 02:20:15', NULL),
(61, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 02:21:24', '2024-05-01 02:21:24', NULL),
(62, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 02:21:42', '2024-05-01 02:21:42', NULL),
(63, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 07:09:32', '2024-05-01 07:09:32', NULL),
(64, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 07:14:27', '2024-05-01 07:14:27', NULL),
(65, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 07:14:54', '2024-05-01 07:14:54', NULL),
(66, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 07:17:15', '2024-05-01 07:17:15', NULL),
(67, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 07:23:42', '2024-05-01 07:23:42', NULL),
(68, 'Măng Vũ', 'mangvtt02@gmail.com', 'Đại Học Công Nghiệp Hà Nội', '0965988156', '2024-05-01 07:37:28', '2024-05-01 07:37:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `priority` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `link`, `priority`, `created_at`, `updated_at`) VALUES
(10, 'JPQ5_banner-home-1.jpg', NULL, 'Vị trí 2', '2020-12-19 08:54:18', '2020-12-19 08:54:18'),
(11, 'o27z_1_3e7313a2-24ef-4dea-b4f4-19a75f8b51fa.png', NULL, 'Vị trí 1', '2020-12-19 08:56:26', '2020-12-19 08:56:26'),
(12, '7smc_bn1_53149ef0-f92a-4804-b600-02e903aa4559.png', NULL, 'Vị trí 3', '2020-12-19 08:56:40', '2020-12-19 08:57:09'),
(14, '0ilD_NXAd_collections_banner_top.jpg', NULL, 'Vị trí 4', '2020-12-22 16:15:45', '2020-12-22 16:15:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2020_11_04_124640_size', 1),
(22, '2020_11_04_124941_topping', 1),
(23, '2020_11_04_125513_type_product', 1),
(24, '2020_11_04_125846_product', 1),
(25, '2020_11_04_130404_comment', 1),
(26, '2020_11_04_130734_banner', 1),
(27, '2020_11_10_034638_order_detail', 1),
(28, '2020_11_10_040026_blogs', 1),
(29, '2020_11_10_040038_comment_blogs', 1),
(30, '2020_11_10_122130_contact', 1),
(31, '2020_11_30_103357_customer', 1),
(32, '2020_11_30_113926_order', 2),
(33, '2020_12_01_014242_images', 2),
(34, '2020_12_10_090945_about__us', 3),
(35, '2020_12_10_091434_our_team', 3),
(36, '2020_12_10_092227_contact_info', 3),
(37, '2020_12_10_094627_about_us', 4),
(38, '2020_12_10_102643_about_us', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `payment` varchar(255) NOT NULL,
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `id_customer`, `total`, `note`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(76, 63, 2102973.5, 'Test', 'Thanh toán khi nhận hàng', 1, '2024-05-01 07:09:32', '2024-05-01 07:37:46'),
(77, 64, 938393, 'dsa', 'Thanh toán online', 1, '2024-04-01 07:14:27', '2024-04-01 07:37:46'),
(78, 65, 1715133.5, 'Test', 'Thanh toán khi nhận hàng', 1, '2024-03-01 07:14:54', '2024-03-01 07:37:45'),
(79, 66, 2941576.5, 'Giao trước nhanh giúp tôiiiiii', 'Thanh toán khi nhận hàng', 1, '2024-01-01 07:17:15', '2024-01-01 07:37:45'),
(81, 68, 6816391, 'Giao trước Tết nha shop', 'Thanh toán khi nhận hàng', 1, '2024-02-01 07:37:28', '2024-02-01 07:37:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_size` bigint(20) UNSIGNED NOT NULL,
  `id_topping` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `id_size`, `id_topping`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(74, 76, 76, 2, 1, 2, 817191, '2024-05-01 07:09:32', '2024-05-01 07:09:32'),
(75, 76, 87, 2, 1, 1, 408141, '2024-05-01 07:09:32', '2024-05-01 07:09:32'),
(76, 76, 82, 2, 1, 1, 857641.5, '2024-05-01 07:09:32', '2024-05-01 07:09:32'),
(77, 77, 97, 2, NULL, 1, 918393, '2024-05-01 07:14:27', '2024-05-01 07:14:27'),
(78, 78, 87, 2, NULL, 1, 408141, '2024-05-01 07:14:54', '2024-05-01 07:14:54'),
(79, 78, 92, 2, NULL, 1, 1286992.5, '2024-05-01 07:14:54', '2024-05-01 07:14:54'),
(80, 79, 91, 2, 4, 1, 807192, '2024-05-01 07:17:15', '2024-05-01 07:17:15'),
(81, 79, 107, 2, 1, 1, 983992.5, '2024-05-01 07:17:15', '2024-05-01 07:17:15'),
(82, 79, 80, 2, 3, 1, 1130392, '2024-05-01 07:17:15', '2024-05-01 07:17:15'),
(86, 81, 97, 2, 1, 6, 5510358, '2024-05-01 07:37:28', '2024-05-01 07:37:28'),
(87, 81, 112, 2, 1, 2, 1286033, '2024-05-01 07:37:28', '2024-05-01 07:37:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `our_team`
--

CREATE TABLE `our_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `introduce` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `our_team`
--

INSERT INTO `our_team` (`id`, `image`, `name`, `position`, `introduce`, `created_at`, `updated_at`) VALUES
(1, 'WwuE_images (1).jpg', 'VŨ THỊ TUYẾT MĂNG', 'Chairman - CEO', '<p>Vũ Thị Tuyết Măng l&agrave; một trong những nh&acirc;n vật h&agrave;ng đầu trong ng&agrave;nh c&ocirc;ng nghiệp thời trang, đồng thời l&agrave; CEO của h&atilde;ng thời trang ESHOPER - một thương hiệu được biết đến với sự s&aacute;ng tạo, c&aacute;i mới v&agrave; sự đổi mới trong ng&agrave;nh.</p>\r\n\r\n<p>Sinh ra v&agrave; lớn l&ecirc;n tại Việt Nam, Tuyết Măng lu&ocirc;n tỏ ra l&agrave; một người phụ nữ quyết đo&aacute;n, c&oacute; tầm nh&igrave;n v&agrave; nhiệt huyết với lĩnh vực thời trang. Với kiến thức s&acirc;u sắc v&agrave; kinh nghiệm t&iacute;ch lũy được từ nhiều năm hoạt động trong ng&agrave;nh, c&ocirc; đ&atilde; đưa ESHOPER trở th&agrave;nh một trong những thương hiệu thời trang h&agrave;ng đầu tại Việt Nam v&agrave; c&oacute; uy t&iacute;n tr&ecirc;n thị trường quốc tế.</p>\r\n\r\n<p>Với tư c&aacute;ch l&agrave; CEO của ESHOPER, Tuyết Măng kh&ocirc;ng chỉ đ&oacute;ng vai tr&ograve; trong việc định h&igrave;nh chiến lược kinh doanh v&agrave; ph&aacute;t triển sản phẩm m&agrave; c&ograve;n thể hiện bản lĩnh v&agrave; sức mạnh l&atilde;nh đạo. C&ocirc; lu&ocirc;n khuyến kh&iacute;ch sự s&aacute;ng tạo v&agrave; đổi mới trong c&ocirc;ng ty, tạo điều kiện để nh&acirc;n vi&ecirc;n ph&aacute;t triển tối đa khả năng s&aacute;ng tạo của họ.</p>\r\n\r\n<p>Ngo&agrave;i ra, Tuyết Măng cũng rất đam m&ecirc; với việc x&acirc;y dựng cộng đồng v&agrave; đ&oacute;ng g&oacute;p v&agrave;o sự ph&aacute;t triển của x&atilde; hội. Bằng việc tổ chức c&aacute;c hoạt động từ thiện v&agrave; hỗ trợ c&aacute;c dự &aacute;n x&atilde; hội, c&ocirc; đ&atilde; đem lại niềm vui v&agrave; sự gi&uacute;p đỡ cho nhiều người trong cộng đồng.</p>\r\n\r\n<p>Với tầm nh&igrave;n v&agrave; tinh thần l&atilde;nh đạo xuất sắc, Vũ Thị Tuyết Măng đ&atilde; l&agrave;m n&ecirc;n th&agrave;nh c&ocirc;ng của ESHOPER v&agrave; g&oacute;p phần v&agrave;o sự ph&aacute;t triển của ng&agrave;nh c&ocirc;ng nghiệp thời trang tại Việt Nam v&agrave; tr&ecirc;n to&agrave;n cầu.</p>', '2024-02-10 05:38:00', '2024-05-01 04:17:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_price` double NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `total_rating` int(11) DEFAULT NULL,
  `number_star` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `storage_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_type`, `name`, `description`, `unit_price`, `discount`, `image`, `unit`, `total_rating`, `number_star`, `status`, `created_at`, `updated_at`, `storage_quantity`) VALUES
(76, 1, 'Hoodie Harry Potter', '<h4><strong>THUỘC T&Iacute;NH SẢN PHẨM</strong></h4>\r\n\r\n<p>- Chất liệu: 65% l&agrave; sợi polyester v&agrave; 35% l&agrave; sợi b&ocirc;ng tự nhi&ecirc;n. Chất nỉ d&agrave;y dặn giữ nhiệt tốt, kh&ocirc;ng x&ugrave; v&agrave; c&oacute; độ đứng form nhất định.</p>\r\n\r\n<p>- Form d&aacute;ng: Th&acirc;n &aacute;o rộng ngang, tay &aacute;o rộng v&agrave; d&agrave;i, vai rơi, mũ rộng. &Aacute;o mặc tạo cảm gi&aacute;c rộng r&atilde;i, thoải m&aacute;i năng động, kh&aacute; trendy. Ph&ugrave; hợp cho kh&aacute;ch h&agrave;ng ưu ti&ecirc;n sự thoải m&aacute;i, hợp với cả d&aacute;ng người to, d&agrave;y. &Aacute;o c&oacute; thể mix được với hầu hết c&aacute;c sản phẩm Bottom m&agrave; vẫn ph&ugrave; hợp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Họa tiết: Mặt trước in logo</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Mẫu nam: 1m85 - 70kg - Size L</p>', 899000, 55, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 1, 5, 'Hiện', '2024-04-12 07:40:46', '2024-05-01 07:09:32', 99),
(77, 1, 'Hoodie Spider Man', '<p><strong>THUỘC T&Iacute;NH SẢN PHẨM</strong><br />\r\n&Aacute;O HOODIE OVERSIZED SPIDERMAN MARVEL BZL</p>', 799000, 50, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-12 07:43:59', '2024-05-01 02:21:42', 100),
(78, 5, 'Quần Kaki', '<h4><strong>THUỘC T&Iacute;NH SẢN PHẨM</strong></h4>\r\n\r\n<p>- Chất liệu: Khaki - &quot;Vải kaki tho&aacute;ng m&aacute;i, độ bền cao, co gi&atilde;n nhẹ thoải m&aacute;i khi vận động&quot;</p>\r\n\r\n<p>- Form d&aacute;ng: &quot;Quần form loose c&oacute; thiết kế d&aacute;ng su&ocirc;ng, rộng r&atilde;i, thoải m&aacute;i khi vận động. Đ&acirc;y l&agrave; form quần ph&ugrave; hợp với mọi d&aacute;ng người&quot;</p>\r\n\r\n<p>- M&agrave;u sắc: Đen/ Be Cream/ Xanh r&ecirc;u</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Mẫu nam: 1m80 - 70kg - Size M</p>\r\n\r\n<p>- Mẫu nữ: 1m58 - 47kg - Size S</p>', 699000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-12 08:38:36', '2024-04-16 11:10:08', 100),
(79, 3, 'Áo thun Aorus', '<p>Test</p>', 250000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-16 10:51:44', '2024-05-01 02:21:25', 100),
(80, 2, 'Jacket Retro', '<p>Áo khoác retro mang lại vẻ đẹp hoài cổ và lãng mạn.</p>', 1399000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:17:15', 99),
(81, 3, 'Áo Thun Nữ Vintage', '<p>Áo thun nữ phong cách vintage, đậm chất cá nhân.</p>', 549000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(82, 4, 'Sơ Mi Kẻ Sọc', '<p>Sơ mi nam với họa tiết kẻ sọc, trẻ trung và năng động.</p>', 999000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:09:32', 99),
(83, 5, 'Quần Jeans Rách', '<p>Quần jeans nam với thiết kế rách, phong cách và cá tính.</p>', 699000, 5, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(84, 6, 'Quần Jogger Nữ Thể Thao', '<p>Quần jogger nữ phong cách thể thao, dễ dàng kết hợp với nhiều loại áo khác nhau.</p>', 849000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(85, 1, 'Hoodie Mystery', '<p>Hoodie với họa tiết bí ẩn, tạo nên sự lôi cuốn và thú vị.</p>', 1199000, 25, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(86, 2, 'Jacket Classic', '<p>Áo khoác classic, phong cách và sang trọng.</p>', 1499000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:23:42', 98),
(87, 3, 'Áo Thun Stripe', '<p>Áo thun nam với họa tiết sọc, trẻ trung và cá tính.</p>', 449000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:09:32', 99),
(88, 4, 'Sơ Mi Trắng Cổ Đức', '<p>Sơ mi nam màu trắng, phong cách cổ điển và lịch lãm.</p>', 899000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(89, 5, 'Quần Jean Xanh Rêu', '<p>Quần jean nam màu xanh rêu, phù hợp với nhiều phong cách thời trang.</p>', 799000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(90, 6, 'Quần Jogger Nữ Màu Xanh', '<p>Quần jogger nữ màu xanh, mang lại vẻ trẻ trung và năng động.</p>', 749000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:23:42', 98),
(91, 1, 'Hoodie Cá Tính', '<p>Hoodie nam với họa tiết cá tính, phong cách và độc đáo.</p>', 999000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:17:15', 99),
(92, 2, 'Jacket Aviator', '<p>Áo khoác aviator mang lại vẻ lịch lãm và phong cách.</p>', 1699000, 25, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(93, 3, 'Áo Thun Cổ Tròn', '<p>Áo thun nam cổ tròn, đơn giản và dễ phối đồ.</p>', 349000, 5, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(94, 4, 'Sơ Mi Kẻ Dọc', '<p>Sơ mi nam với họa tiết kẻ dọc, thanh lịch và trang trọng.</p>', 1099000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(95, 5, 'Quần Jean Slim Fit', '<p>Quần jean nam slim fit, ôm sát cơ thể và tôn dáng.</p>', 899000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(96, 6, 'Quần Jogger Nữ Màu Đen', '<p>Quần jogger nữ màu đen, dễ dàng kết hợp với nhiều loại áo khác nhau.</p>', 799000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(97, 1, 'Hoodie Galaxy', '<p>Hoodie với họa tiết thiên hà, tạo nên sự lạ mắt và cuốn hút.</p>', 1299000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:37:28', 94),
(98, 2, 'Jacket Leather', '<p>Áo khoác da mang lại vẻ mạnh mẽ và nam tính.</p>', 1899000, 35, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(99, 3, 'Áo Thun Polo', '<p>Áo thun nam kiểu polo, phong cách và lịch lãm.</p>', 399000, 0, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(100, 4, 'Sơ Mi Đen Cổ Đức', '<p>Sơ mi nam màu đen, phong cách cổ điển và lịch lãm.</p>', 1199000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(101, 1, 'Hoodie Fire', '<p>Hoodie với họa tiết lửa, tạo nên sự nổi bật và mạnh mẽ.</p>', 1199000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(102, 2, 'Jacket Urban', '<p>Áo khoác urban, phong cách và hiện đại.</p>', 1599000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(103, 3, 'Áo Thun Hoạ Tiết', '<p>Áo thun nam với hoạ tiết độc đáo và sành điệu.</p>', 449000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(104, 4, 'Sơ Mi Trắng Xanh', '<p>Sơ mi nam màu trắng kết hợp với viền xanh, tạo điểm nhấn và tươi mới.</p>', 1099000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(105, 5, 'Quần Kaki Đen', '<p>Quần kaki nam màu đen, lịch lãm và dễ phối đồ.</p>', 799000, 5, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(106, 6, 'Quần Jogger Nữ Hồng', '<p>Quần jogger nữ màu hồng, tạo điểm nhấn và nữ tính.</p>', 849000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(107, 1, 'Hoodie Snow', '<p>Hoodie với họa tiết tuyết, mang lại cảm giác mùa đông và ấm áp.</p>', 1299000, 25, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:17:15', 99),
(108, 2, 'Jacket Military', '<p>Áo khoác military, phong cách và mạnh mẽ.</p>', 1699000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(109, 3, 'Áo Thun Vintage', '<p>Áo thun nam phong cách vintage, đơn giản và thanh lịch.</p>', 349000, 5, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(110, 4, 'Sơ Mi Đỏ Kẻ', '<p>Sơ mi nam màu đỏ kẻ, nổi bật và cá tính.</p>', 999000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(111, 5, 'Quần Jean Rách', '<p>Quần jean nam với thiết kế rách, phong cách và cá tính.</p>', 899000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(112, 6, 'Quần Jogger Nữ Xám', '<p>Quần jogger nữ màu xám, dễ dàng phối đồ và linh hoạt.</p>', 749000, 15, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:37:28', 98),
(113, 1, 'Hoodie Galaxy', '<p>Hoodie với họa tiết thiên hà, tạo nên sự lạ mắt và cuốn hút.</p>', 1299000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-05-01 07:23:42', 96),
(114, 2, 'Jacket Leather', '<p>Áo khoác da mang lại vẻ mạnh mẽ và nam tính.</p>', 1899000, 35, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(115, 3, 'Áo Thun Polo', '<p>Áo thun nam kiểu polo, phong cách và lịch lãm.</p>', 399000, 0, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(116, 4, 'Sơ Mi Đen Cổ Đức', '<p>Sơ mi nam màu đen, phong cách cổ điển và lịch lãm.</p>', 1199000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(141, 1, 'Hoodie Sky', '<p>Hoodie với họa tiết bầu trời, mang lại cảm giác thoải mái và bình yên.</p>', 1299000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(142, 2, 'Jacket Blazer', '<p>Áo khoác blazer, lịch lãm và thanh lịch.</p>', 1899000, 25, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(143, 3, 'Áo Thun Streetwear', '<p>Áo thun streetwear, phong cách và năng động.</p>', 399000, 0, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(144, 4, 'Sơ Mi Họa Tiết', '<p>Sơ mi nam với họa tiết sáng tạo và độc đáo.</p>', 1599000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(145, 5, 'Quần Kaki Xanh', '<p>Quần kaki nam màu xanh dương, nam tính và dễ phối đồ.</p>', 899000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(146, 1, 'Hoodie Mountain', '<p>Hoodie với họa tiết núi, tạo nên sự mạnh mẽ và kiên định.</p>', 1399000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(147, 2, 'Jacket Harrington', '<p>Áo khoác harrington, thời trang và cá tính.</p>', 1699000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(148, 3, 'Áo Thun Graphic', '<p>Áo thun nam kiểu graphic, cá tính và độc đáo.</p>', 449000, 0, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(149, 4, 'Sơ Mi Lụa', '<p>Sơ mi nam chất liệu lụa, mềm mại và sang trọng.</p>', 1999000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(150, 5, 'Quần Kaki Kem', '<p>Quần kaki nam màu kem, dịu dàng và thanh lịch.</p>', 799000, 5, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(151, 1, 'Hoodie Nebula', '<p>Hoodie với họa tiết tinh vân, mang lại cảm giác phóng khoáng và mênh mông.</p>', 1499000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(152, 2, 'Jacket Puffer', '<p>Áo khoác puffer, ấm áp và phong cách.</p>', 1799000, 25, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(153, 3, 'Áo Thun Pattern', '<p>Áo thun nam kiểu pattern, độc đáo và cá tính.</p>', 399000, 0, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(154, 4, 'Sơ Mi Hoa', '<p>Sơ mi nam với họa tiết hoa, tươi mới và trẻ trung.</p>', 1299000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(155, 5, 'Quần Kaki Trắng', '<p>Quần kaki nam màu trắng, thanh lịch và tinh tế.</p>', 899000, 10, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(156, 1, 'Hoodie Aurora', '<p>Hoodie với họa tiết bắt sáng, tạo nên sự lấp lánh và quyến rũ.</p>', 1399000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(157, 2, 'Jacket Denim', '<p>Áo khoác denim, phong cách và cá tính.</p>', 1599000, 30, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(158, 3, 'Áo Thun Graphic', '<p>Áo thun nam kiểu graphic, cá tính và độc đáo.</p>', 449000, 0, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(159, 4, 'Sơ Mi Lụa', '<p>Sơ mi nam chất liệu lụa, mềm mại và sang trọng.</p>', 1999000, 20, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100),
(160, 5, 'Quần Kaki Kem', '<p>Quần kaki nam màu kem, dịu dàng và thanh lịch.</p>', 799000, 5, 'VmUd_1.0.06.3.22.003.222.23-10700013-n-2.jpg', 'VNĐ', 0, 0, 'Hiện', '2024-04-14 03:00:00', '2024-04-14 03:00:00', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(2, 'M', 1, 'Hiện', '2023-03-09 23:50:01', '2024-04-12 06:43:22'),
(3, 'L', 1, 'Hiện', '2023-03-09 23:50:23', '2024-04-12 06:43:12'),
(6, 'XL', 1, 'Hiện', '2024-04-12 06:43:04', '2024-04-12 06:43:04'),
(7, 'S', 1, 'Hiện', '2024-04-12 06:43:43', '2024-04-12 06:43:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topping`
--

CREATE TABLE `topping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topping`
--

INSERT INTO `topping` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xanh Dương', 0, 'Hiện', '2023-03-09 23:51:59', '2024-04-12 06:45:11'),
(3, 'Xanh Lá', 0, 'Hiện', '2023-03-09 23:52:50', '2024-04-12 06:44:53'),
(4, 'Đỏ', 0, 'Hiện', '2023-03-25 18:21:52', '2024-04-12 06:45:23'),
(6, 'Vàng', 0, 'Hiện', '2023-03-25 15:48:30', '2024-04-12 06:45:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `banner_type` varchar(255) NOT NULL,
  `new` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `banner_type`, `new`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hoodie', '14vo_hooded-jacket-mannequin-spooky-mysterious-generated-by-ai_188544-40073.jpg', 1, 'Hiện', '2020-11-16 03:15:58', '2024-04-11 10:11:43'),
(2, 'Jacket', 'g88l_pngtree-asian-man-wearing-jacket-and-shirt-in-an-alley-picture-image_2646147.jpg', 1, 'Hiện', '2020-11-16 03:16:12', '2024-04-11 10:17:49'),
(3, 'Áo Thun', 'VbHh_pngtree-child-tee-shirt-print-picture-image_3186357.jpg', 2, 'Hiện', '2020-11-16 03:16:27', '2024-04-11 10:19:44'),
(4, 'Sơ mi', 'DdiL__methode_times_prod_web_bin_ba599057-fa30-48d0-8877-61c0feb0eed4.jpg', 2, 'Hiện', '2020-11-16 03:16:41', '2024-04-11 10:36:46'),
(5, 'Quần suông', 'kh7b_a570209d3744e23b8f63dca81180ec2d.jpg', 2, 'Hiện', '2020-11-16 03:17:10', '2024-04-11 10:40:39'),
(6, 'Quần jogger', '6foW_a570209d3744e23b8f63dca81180ec2d.jpg', 2, 'Hiện', '2020-11-16 03:17:37', '2024-04-11 10:41:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `token` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `google_id`, `SDT`, `address`, `gender`, `token`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '6oTY_Untitled.png', 'Admin', 'mp753114@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', NULL, '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 1, NULL, NULL, NULL, '2023-04-03 16:56:36'),
(2, 'xxNC_Untitled.png', 'Trần Trọng ', 'mp753115@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', NULL, '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 0, NULL, NULL, NULL, '2023-04-02 17:45:19'),
(3, 'y51r_face21.jpg', 'Trọng Trần', 'mp753116@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', NULL, '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 0, NULL, NULL, '2020-12-03 18:28:56', '2020-12-14 02:04:43'),
(4, NULL, 'Tùng', 'mp753117@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-12-16 16:05:43', '2020-12-16 16:05:43'),
(5, 'Likr_about_avatar_2.jpg', 'Quỳnh', 'mp753118@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', NULL, '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 0, NULL, NULL, '2020-12-26 03:44:22', '2020-12-26 03:45:14'),
(11, '1GNV_meo.JPG', 'Trần Bình Trọng', 'tbt@gmail.com', '$2y$10$gaKJuW4G1disGfBc5ohTqOR2LwGp.2P2T8Azr0l1zss...', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(12, 'Bv9C_ryujinx_capture_2024-01-23_00-41-01.png', 'mangvu123', 'mangvtt@gmail.com', '$2y$10$cyTUOrbX1ZD83eu99oDSreCx/cc54xUxafWMuRamlKsU9rVGGCOfC', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-04-12 07:23:41', '2024-04-12 07:25:00'),
(13, NULL, 'vtm123', 'mangvu002@gmail.com', '$2y$10$EKE2HgyvlqMUDiNr81N5Neo4AIK3Z3UhOhSqgd6bIjo5HzA0zfhkq', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-04-16 10:31:38', '2024-04-16 10:31:38'),
(14, '1GNV_meo.JPG', 'Măng Vũ', 'mangvtt02@gmail.com', '$2y$10$J4MLhPEB7LircbrkGyETFubhs0oG6Fx70kDPkbcJkAVUdFW3uK5Ti', NULL, '0965988156', 'Đại Học Công Nghiệp Hà Nội', 'nữ', 0, NULL, NULL, '2024-04-29 10:08:13', '2024-04-29 10:11:07'),
(15, NULL, 'DevLap', 'mangvu@gmail.com', '$2y$10$BivgOR.0wqlxH4Rc.LWTgO.8z8IUbZBEFUJC1RurHogdH.qW7aiMS', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-04-29 10:18:34', '2024-04-29 10:18:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id_user_foreign` (`id_user`),
  ADD KEY `comment_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_blogs_id_blog_foreign` (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_id_order_foreign` (`id_order`),
  ADD KEY `order_detail_id_product_foreign` (`id_product`),
  ADD KEY `order_detail_id_size_foreign` (`id_size`),
  ADD KEY `order_detail_id_topping_foreign` (`id_topping`);

--
-- Chỉ mục cho bảng `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `comment_blogs`
--
ALTER TABLE `comment_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `topping`
--
ALTER TABLE `topping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD CONSTRAINT `comment_blogs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_blogs_id_blog_foreign` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_topping_foreign` FOREIGN KEY (`id_topping`) REFERENCES `topping` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
