-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 10:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, '<p><strong>Broad Way tại<br />\r\nViệt Nam</strong></p>\r\n\r\n<p>C&oacute; mặt tại hơn 118 quốc gia với chuỗi 35,000 nh&agrave; h&agrave;ng tại khắp c&aacute;c ch&acirc;u lục, mỗi ng&agrave;y, NOMNOM&agrave;n cầu phục vụ hơn 70 triệu người ti&ecirc;u d&ugrave;ng, kh&ocirc;ng chỉ đảm bảo mang đến cho họ những bữa ăn ngon, an to&agrave;n vệ sinh, m&agrave; c&ograve;n l&agrave;m họ h&agrave;i l&ograve;ng với dịch vụ của NOMNOM.</p>\r\n\r\n<p>Nắm bắt nhu cầu của người ti&ecirc;u d&ugrave;ng Việt Nam hiện nay, ch&uacute;ng t&ocirc;i mong muốn phục vụ những bữa ăn nhanh nhưng hợp vệ sinh, đầy đủ dưỡng chất c&ugrave;ng với cung c&aacute;ch phục vụ chuy&ecirc;n nghiệp, NOMNOM cam kết sẽ l&agrave;m bạn h&agrave;i l&ograve;ng với d&ograve;ng sản phẩm nổi tiếng khắp thế giới . Kh&ocirc;ng chỉ nổi tiếng về thức ăn ngon, NOMNOM c&ograve;n nổi tiếng về chuỗi ti&ecirc;u chuẩn Chất Lượng, Dịch Vụ, Vệ Sinh v&agrave; Gi&aacute; trị.</p>\r\n\r\n \r\n\r\n', 'ehbD_about_banner.jpg', '<p><span style=\"font-size:22px\"><strong>Tầm nh&igrave;n &amp; ho&agrave;i b&atilde;o<br />\nthương hiệu</strong></span></p>\n\n<p>NOMNOM sẽ thiết lập một chuẩn mực mới cho ng&agrave;nh c&ocirc;ng nghiệp nh&agrave; h&agrave;ng phục vụ thức ăn nhanh tại Việt Nam, mang đến cho kh&aacute;ch h&agrave;ng những trải nghiệm độc nhất chỉ c&oacute; tại chuỗi nh&agrave; h&agrave;ng của ch&uacute;ng t&ocirc;i.</p>\n\n<p>Ho&agrave;i b&atilde;o của ch&uacute;ng t&ocirc;i l&agrave; phục vụ Thức ăn ngon c&ugrave;ng đội ngũ Nh&acirc;n Vi&ecirc;n Chuy&ecirc;n Nghiệp,Th&acirc;n Thiện v&agrave; l&agrave; một Th&agrave;nh Vi&ecirc;n Tốt của cộng đồng.</p>\n\n<p>Thức ăn ngon: ch&uacute;ng t&ocirc;i phục vụ thức ăn ngon từ nguồn nguy&ecirc;n vật liệu chất lượng nhất v&agrave; được chế biến theo từng y&ecirc;u cầu của kh&aacute;ch h&agrave;ng.</p>\n\n<p>Nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, th&acirc;n thiện: ch&uacute;ng t&ocirc;i lu&ocirc;n tạo cơ hội để nh&acirc;n vi&ecirc;n ph&aacute;t triển sự nghiệp c&ugrave;ng c&ocirc;ng ty; từ đ&oacute;, c&ugrave;ng nhau, ch&uacute;ng t&ocirc;i phục vụ kh&aacute;ch h&agrave;ng một c&aacute;ch tốt nhất.</p>\n\n<p>Th&agrave;nh vi&ecirc;n tốt của cộng đồng: Ch&uacute;ng t&ocirc;i lu&ocirc;n quan t&acirc;m đến cộng đồng, đặc biệt l&agrave; trẻ em v&agrave; c&aacute;c gia đ&igrave;nh; ch&uacute;ng t&ocirc;i mang đến niềm vui v&agrave; l&agrave;m phong ph&uacute; hơn cuộc sống của mọi người.</p>', 'Hiện', '2020-12-10 05:05:31', '2020-12-21 17:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `slide`, `link`, `title`, `status`, `created_at`, `updated_at`) VALUES
(3, 'banner.jfif', '44.png', 'http://localhost/LARAVEL/Project/product/1', 'Tìm hiểu thêm', 'Hiện', '2020-12-19 09:29:06', '2020-12-25 13:44:47'),
(5, 'banner1.jpg', '22.png', 'http://localhost/LARAVEL/Project/product_detail/40', 'Mua ngay', 'Hiện', '2020-12-25 13:41:47', '2020-12-25 13:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `image`, `content`, `created_at`, `updated_at`) VALUES
(3, 'Ẩm thực gia đình Việt truyền thống lịch sử trong cộng đồng cũ', '<p>Ăn uống m&aacute;i ấm gia đ&igrave;nh l&agrave; một trong những phần đặc biệt quan trọng, l&agrave; n&eacute;t rực rỡ trong ẩm thực Việt v&agrave; c&oacute; sự chuyển biến, chuyển hướng qua những thời k&igrave;. H&atilde;y kh&aacute;m ph&aacute; ngay những chuyển m&igrave;nh đ&oacute; nh&eacute;!</p>', '2wjw_65dad28a-s.jpg', '<p><strong>Ẩm thực gia đ&igrave;nh Việt truyền thống lịch sử trong cộng đồng cũ</strong></p>\r\n\r\n<p>Bạn phương T&acirc;y sống duy l&yacute;, ch&iacute;nh v&igrave; thế dở cơm gia đ&igrave;nh kh&ocirc;ng được nh&igrave;n nhận trong, con c&aacute;i khi trưởng th&agrave;nh đều sống ri&ecirc;ng phụ huynh, c&oacute; cuộc sống đời thường tự lập ngay khi tr&ograve;n 18 tuổi. Người nước ta th&igrave; ngược lại, lối sống duy t&igrave;nh n&ecirc;n c&oacute; c&aacute;c việc hay l&agrave;m sau đ&oacute; 1 ng&agrave;y thao t&aacute;c vất vả, hay sau những ng&agrave;y đi xa th&igrave; lu&ocirc;n lu&ocirc;n c&oacute; nhu cầu quay trở về m&aacute;i nh&agrave; chung để qu&acirc;y quần b&ecirc;n nhau d&ugrave;ng bữa ăn đầm ấm, sum vầy. V&agrave; đ&oacute; l&agrave; l&uacute;c m&agrave; &ocirc;ng b&agrave;, phụ huynh, con c&aacute;i, C&aacute;c bạn c&ugrave;ng ngồi b&ecirc;n m&acirc;m cơm thưởng thức c&aacute;c m&oacute;n ăn sở trường do b&agrave;, do mẹ nấu v&agrave; c&ugrave;ng kể lẫn nhau nghe những c&acirc;u chuy&ecirc;n vui vẻ. Đ&acirc;y l&agrave; n&eacute;t xinh văn h&oacute;a đc t&iacute;n đồ Việt duy tr&igrave; v&agrave; g&igrave;n giữ từ đời n&agrave;y sang đời kh&aacute;c, từ thế hệ n&agrave;y sang thế hệ kh&aacute;c.</p>\r\n\r\n<p>L&agrave; cư d&acirc;n gốc n&ocirc;ng nghiệp l&uacute;a nước, sống quần cư trong c&aacute;c x&oacute;m l&agrave;ng n&ecirc;n ẩm thực m&aacute;i ấm gia đ&igrave;nh Việt thường đơn giản hơn nhiều, t&ugrave;y từng điều kiện kinh tế của mỗi m&aacute;i ấm gia đ&igrave;nh m&agrave; c&oacute; sự kh&ocirc;ng giống nhau. Nguy&ecirc;n liệu để chế biến c&aacute;c m&oacute;n ăn rất đa dạng chủng loại, đ&oacute; l&agrave; sản vật trồng, nu&ocirc;i đc hoặc tự đ&aacute;nh bắt được trong thi&ecirc;n nhi&ecirc;n. Thường th&igrave; m&acirc;m cơm t&iacute;n đồ Việt sẽ c&oacute; một m&oacute;n ăn mặn, một m&oacute;n x&agrave;o v&agrave; một m&oacute;n canh, đa phần Trong đ&oacute; l&agrave; được tạo ra từ thực vật, những loại rau củ. Kh&aacute;c biệt đặc biệt l&agrave; những m&oacute;n canh, hầu như tr&ecirc;n nh&acirc;n loại chỉ c&oacute; fan việt nam c&oacute; c&aacute;ch sử dụng canh chan v&agrave;o cơm v&agrave; một điều lu&ocirc;n lu&ocirc;n phải c&oacute; l&agrave; ch&eacute;n nước mắm với nhiều loại như: mắm c&aacute;, mắm t&ocirc;m, mắm t&eacute;p c&ugrave;ng b&aacute;t dưa c&agrave; muối.<br />\r\n&nbsp;</p>\r\n\r\n<p>M&acirc;m cơm ch&iacute;nh l&agrave; sự thể hiện r&otilde; rệt ăn uống m&aacute;i ấm gia đ&igrave;nh cũng tương tự n&eacute;t văn h&oacute;a truyền thống tiếp x&uacute;c ứng xử của bạn Việt. &ldquo;Ẳn tr&ocirc;ng nồi, ngồi tr&ocirc;ng hướng&rdquo; bộc lộ ở chỗ: bạn con g&aacute;i sẽ l&agrave; người ngồi đầu nồi để vừa miệng vừa bới cơm phục vụ cả nh&agrave;. Nếu cơm c&oacute; nấu kh&ocirc;ng đủ th&igrave; t&iacute;n đồ ngồi ngo&agrave;i phải ăn chậm lại v&agrave; nhường c&aacute;c member kh&aacute;c trong gia đ&igrave;nh. Mỗi dở cơm m&aacute;i ấm gia đ&igrave;nh kh&ocirc;ng chỉ để ăn cho no m&agrave; c&ograve;n l&agrave; trong khoảng thời gian để mọi người trong gia đ&igrave;nh hiểu nhau hơn, l&agrave; sợi d&acirc;y gắn kết t&igrave;nh th&acirc;n của c&aacute;c th&agrave;nh vi&ecirc;n. Truyền thống cuội nguồn, nền nếp gia đ&igrave;nh cũng từ đ&oacute; m&agrave; h&igrave;nh th&agrave;nh &amp; đc củng cố. Trong bữa ăn, kh&ocirc;ng chỉ l&agrave; đơn thuần d&agrave;nh cho nhau c&aacute;c lời hỏi han, quan t&acirc;m m&agrave; đ&acirc;y c&ograve;n l&agrave; thời cơ để học hỏi c&aacute;c b&agrave;i học cuộc sống thường ng&agrave;y qu&yacute; gi&aacute; từ &ocirc;ng b&agrave;, bố mẹ truyền dạy, từ đ&oacute; thấm nhuần c&aacute;c b&agrave;i học về đạo l&yacute; l&agrave;m t&iacute;n đồ.</p>\r\n\r\n<p><br />\r\n<strong>ẩm thực m&aacute;i ấm gia đ&igrave;nh Việt trong cuộc sống đời thường văn minh</strong></p>\r\n\r\n<p><br />\r\nTrong thời đại c&ocirc;ng nghiệp h&oacute;a &ndash; t&acirc;n tiến h&oacute;a b&acirc;y giờ, mỗi con fan đều trở n&ecirc;n bận rộn, hối hả hơn, đặt biệt l&agrave; ở những th&agrave;nh phố lớn, v&igrave; thế m&agrave; những bữa cơm th&acirc;n thiết ng&agrave;y c&agrave;ng trở n&ecirc;n thưa vắng dần. C&ocirc;ng việc nhiều hơn, những mối quan hệ tạo th&ecirc;m, việc đi sớm về muộn đ&atilde; kh&ocirc;ng c&ograve;n l&agrave; điều kh&ocirc;ng quen so với c&aacute;c đ&ocirc;i b&agrave; x&atilde; &ocirc;ng x&atilde; trẻ. &Aacute;p lực cuộc sống, ganh đua chỗ đứng khiến cho bọn họ dần đ&aacute;nh mất c&aacute;c gi&aacute; trị văn h&oacute;a để v&ugrave;i m&igrave;nh v&agrave;o qu&aacute; tr&igrave;nh. And c&aacute;c bữa cơm hối hả, dễ ợt l&agrave; điều bọn họ chọn, m&agrave; kh&ocirc;ng ch&uacute; t&acirc;m đến c&aacute;c dở cơm m&aacute;i ấm gia đ&igrave;nh nữa v&agrave; đ&oacute; cũng l&agrave; 1 phần nguy&ecirc;n do cho t&igrave;nh cảm m&aacute;i ấm gia đ&igrave;nh bị rạn nứt.<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/2/f/2f2ba935.jpg\" target=\"_blank\" title=\"147038050958447-cung-co-hon-1\"><img alt=\"147038050958447-cung-co-hon-1\" height=\"360\" src=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/2/f/2f2ba935-s.jpg\" width=\"480\" /></a><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>tuy vậy, trong tiềm thức của mỗi c&aacute; nh&acirc;n d&acirc;n Việt th&igrave; m&acirc;m cơm gia đ&igrave;nh với khung cảnh qu&acirc;y quần vẫn lu&ocirc;n lu&ocirc;n l&agrave; n&eacute;t xin xắn đ&aacute;ng nhớ &amp; kh&ocirc;ng thể n&agrave;o mất đi. Điều đ&oacute; bộc lộ ở c&aacute;c dịp nghỉ lễ, tết, giỗ, rằm,&hellip; mọi th&agrave;nh vi&ecirc;n đều nhắc nhớ nhau sum họp, trở về d&ugrave; c&oacute; ở nơi n&agrave;o xa x&ocirc;i đi chăng nữa. Mong muốn đc về sum vầy b&ecirc;n m&acirc;m cơm, t&igrave;m lại cảm gi&aacute;c ấm &aacute;p, th&acirc;n cận, muốn đc t&aacute;i ngộ những t&iacute;n đồ th&acirc;n y&ecirc;u, chia sẻ những niềm chiều chuộng, sự g&acirc;y được sự ch&uacute; &yacute;, chăm nom từ tận đ&aacute;y l&ograve;ng. Để được &ocirc;ng b&agrave; dạy dỗ, để đc bố mẹ bảo ban, để lu&ocirc;n lu&ocirc;n thấy rằng c&aacute;c fan m&agrave; m&igrave;nh mến thương vẫn lu&ocirc;n lu&ocirc;n ở đ&acirc;y, b&ecirc;n cạnh m&igrave;nh, sau c&aacute;c gi&ocirc;ng b&atilde;o, s&oacute;ng gi&oacute; cuộc đời.<br />\r\n&nbsp;</p>\r\n\r\n<p>so với mỗi c&aacute; nh&acirc;n việt nam, m&aacute;i ấm gia đ&igrave;nh v&ocirc; c&ugrave;ng quan trọng. Gia đ&igrave;nh l&agrave; nơi hun đ&uacute;c những gi&aacute; trị truyền thống h&igrave;nh th&agrave;nh n&ecirc;n con t&iacute;n đồ. Ch&iacute;nh v&igrave; như thế, rất c&oacute; thể coi bữa ăn, ăn uống m&aacute;i ấm gia đ&igrave;nh l&agrave; 1 trong h&igrave;nh tượng cho văn ho&aacute; VN rất cần phải g&igrave;n giữ and ph&aacute;t huy.</p>', '2020-11-15 12:39:29', '2020-11-24 11:45:41'),
(4, 'Tham quan Hội An thưởng thức món mắm thính độc đáo', '<h2><span style=\"font-size:20px\"><strong>Mắm th&iacute;nh: đặc sản nhất định phải thử khi đến tour du lịch Hội An</strong></span></h2>\r\n\r\n<p>Kh&ocirc;ng biết c&oacute; tự bao giờ nhưng mắm th&iacute;nh đ&atilde; trở th&agrave;nh m&oacute;n ăn gần gũi với người d&acirc;n Hội An v&agrave; kh&aacute;ch du lịch. Nhiều du kh&aacute;ch trước khi rời phố cổ c&ograve;n tranh thủ mua &iacute;t mắm th&iacute;nh về l&agrave;m qu&agrave; cho người th&acirc;n.</p>', '7219_5eb2c92d-s.jpg', '<p>Du lịch Hội An, h&agrave;nh kh&aacute;ch thường kh&ocirc;ng thể bỏ qua khu chợ Hội An, địa điểm lưu giữ nhiều tinh hoa văn h&oacute;a một thời thương cảng xưa. Đ&oacute; l&agrave; những mặt h&agrave;ng truyền thống như chiếu Tr&agrave; Nhi&ecirc;u, sản phẩm gốm Thanh H&agrave;, mộc Kim Bồng&hellip; v&agrave; cả những m&oacute;n ăn truyền thống b&igrave;nh d&acirc;n xứ Quảng.</p>\r\n\r\n<p>Đặc biệt chợ Hội An l&agrave; địa điểm họp mặt c&aacute;c loại mắm đặc sản chế biến từ những con c&aacute;, con t&ocirc;m được đ&aacute;nh bắt từ biển Cửa Đại, C&ugrave; L&agrave;o Ch&agrave;m&hellip;, trong đ&oacute; c&oacute; nhiều loại mắm th&iacute;nh.</p>\r\n\r\n<p>Cư d&acirc;n Hội An rất hiểu con c&aacute; xứ biển qu&ecirc; m&igrave;nh để chọn l&agrave;m th&iacute;nh, phổ biến l&agrave; c&aacute; de, c&aacute; chuồn, c&aacute; nục bởi c&aacute;c loại c&aacute; n&agrave;y thịt săn chắc, tươi, ngon v&agrave; rất rẻ.<br />\r\n&nbsp;</p>\r\n\r\n<p>Để c&oacute; một gh&egrave; c&aacute; th&iacute;nh ngon quả thật l&agrave; rất cầu kỳ. C&aacute; đem về bỏ ruột, đu&ocirc;i v&agrave; d&ugrave;ng nước muối nấu s&ocirc;i để nguội rửa c&aacute; cho sạch, vớt ra để r&aacute;o. Kh&acirc;u quan trọng l&agrave; ủ c&aacute; với muối. Cứ bỏ một lớp c&aacute; v&agrave;o hũ th&igrave; rắc một lớp muối mỏng, cẩn thận hơn người ta c&ograve;n d&ugrave;ng nẹp tre để chần c&aacute;. Đem hũ c&aacute; đ&atilde; đậy k&iacute;n phơi v&agrave;i nắng, khi c&aacute; dậy m&ugrave;i th&igrave; chắt cạn nước. Kh&acirc;u tiếp theo l&agrave; trộn c&aacute; với th&iacute;nh. Th&iacute;nh l&agrave; thứ bột được gi&atilde; nhỏ từ bắp rang hoặc gạo rang.<br />\r\n&nbsp;</p>\r\n\r\n<p>Vớt c&aacute; ra để kh&ocirc; nước mới trộn th&iacute;nh v&agrave; chờ c&aacute; cứng lại cho v&agrave;o hũ, sau đ&oacute; d&ugrave;ng l&aacute; d&ocirc;ng phơi kh&ocirc; đậy k&iacute;n c&ugrave;ng mo cau, thắng nước đường đen h&ograve;a chung với nước mắm đổ l&ecirc;n.</p>\r\n\r\n<p>Tiếp tục ủ th&ecirc;m v&agrave;i ng&agrave;y. Tiếp x&uacute;c với th&iacute;nh sau một thời gian ủ v&agrave; phơi nắng sẽ l&agrave;m c&aacute; c&oacute; m&ugrave;i thơm đậm đ&agrave;, thịt c&aacute; l&uacute;c n&agrave;y trở m&agrave;u n&acirc;u v&agrave;ng rất đẹp, đ&oacute; cũng l&agrave; l&uacute;c mắm ch&iacute;n tới.<br />\r\nC&aacute; cơm, c&aacute; de từ khi mới l&agrave;m đến l&uacute;c sử dụng được thường hai th&aacute;ng, ri&ecirc;ng c&aacute; chuồn, c&aacute; nục, c&aacute; tr&iacute;ch phải đợi đến ba th&aacute;ng.</p>\r\n\r\n<p>Từ mắm th&iacute;nh, c&oacute; thể chế biến th&agrave;nh c&aacute;c m&oacute;n ngon l&agrave;m &ldquo;m&ecirc; mệt&rdquo; nhiều người. Chỉ cần gắp v&agrave;i con th&iacute;nh, đem ra chưng với cơm hay kho c&ugrave;ng thịt ba chỉ, một &iacute;t ớt quả, ti&ecirc;u, n&eacute;n.<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/5/e/5eb2c92d.jpg\" target=\"_blank\" title=\"thuong-con-mam-thinh-hoi-an-ivivu-4\"><img alt=\"thuong-con-mam-thinh-hoi-an-ivivu-4\" height=\"270\" src=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/5/e/5eb2c92d-s.jpg\" width=\"480\" /></a><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra muốn lạ miệng c&oacute; thể trộn mắm th&iacute;nh c&ugrave;ng với c&aacute;c loại dưa gan, dưa chuột.</p>\r\n\r\n<p>Đặc biệt kh&ocirc;ng thể qu&ecirc;n rang c&aacute; th&iacute;nh với l&aacute; n&eacute;n. Chỉ cần khử dầu phộng, cho c&aacute; th&iacute;nh v&agrave;o, đợi c&aacute; thấm dầu lật đều hai mặt v&agrave; th&ecirc;m l&aacute; n&eacute;n. Hạ nhỏ lửa đến khi m&ugrave;i thơm lan tỏa, bay từ nh&agrave; n&agrave;y sang nh&agrave; kh&aacute;c đến nức cả mũi th&igrave; nhanh tay nhắc xuống.</p>\r\n\r\n<p>Hiện nay nghề l&agrave;m mắm th&iacute;nh của cư d&acirc;n v&ugrave;ng cửa biển Hội An được Trung t&acirc;m bảo tồn di sản Hội An đưa v&agrave;o danh s&aacute;ch nghề truyền thống v&agrave; chọn l&agrave;m điểm tham quan của tour sinh th&aacute;i l&agrave;ng qu&ecirc;.<br />\r\n&nbsp;</p>\r\n\r\n<p>Thế n&ecirc;n, d&ugrave; rất giản dị nhưng mắm th&iacute;nh vẫn nghiễm nhi&ecirc;n trở th&agrave;nh m&oacute;n đặc sản nổi tiếng trong v&agrave; ngo&agrave;i nước.</p>', '2020-11-15 12:47:01', '2020-11-24 11:46:01'),
(5, 'Du lịch An Giang khám phá những hồ nước tuyệt đẹp ở vùng Bảy Núi', '<p><strong><a href=\"https://www.tripnow.vn/bai-viet/kinh-nghiem-du-lich-mien-tay-tu-a-z-tan-tinh-chi-tiet-ai-di-cung-duoc-9036\">Du lịch miền T&acirc;y</a></strong>&nbsp;xui về v&ugrave;ng Thất Sơn nằm ở huyện Tri T&ocirc;n, Tịnh Bi&ecirc;n, tỉnh An Giang. Địa h&igrave;nh cao tạo ra những hồ nước thi&ecirc;n nhi&ecirc;n tuyệt đẹp dưới v&ugrave;ng đồng bằng, sơn thủy hữu t&igrave;nh.</p>', 'AcxK_1a6d0817-s.jpg', '<h2><strong>H&agrave;nh tr&igrave;nh&nbsp;du lịch An Giang kh&aacute;m ph&aacute; những hồ nước tuyệt đẹp ở v&ugrave;ng Bảy N&uacute;i</strong></h2>\r\n\r\n<p><strong>1. Hồ T&agrave; Pạ, x&atilde; N&uacute;i T&ocirc;, huyện Tri T&ocirc;n:</strong>&nbsp;Hồ T&agrave; Pạ l&agrave; một hồ nước được h&igrave;nh th&agrave;nh từ việc khai th&aacute;c đ&aacute;, v&ocirc; t&igrave;nh đ&atilde; tạo n&ecirc;n một hồ đ&aacute; chứa nước tr&ecirc;n n&uacute;i T&agrave; Pạ, tạo n&ecirc;n cảnh quan thật đẹp, như bức tranh thủy mặc, l&agrave;m cho biết bao người phải trầm trồ.<br />\r\nGiống như c&aacute;c hồ nước trong v&ugrave;ng Thất Sơn, đường v&agrave;o hồ T&agrave; Pạ c&ograve;n rất hoang sơ v&agrave; tĩnh lặng. Cảnh sắc xung quanh hồ kh&aacute; đẹp, với n&uacute;i non h&ugrave;ng vĩ bao quanh</p>\r\n\r\n<p><br />\r\n<strong>2. Hồ Thủy Li&ecirc;m tr&ecirc;n n&uacute;i Thi&ecirc;n Cấm, x&atilde; An Hảo, huyện Tịnh Bi&ecirc;n:&nbsp;</strong>Hồ Thủy Li&ecirc;m tọa lạc ngay trước tượng Phật Di Lặc, hai b&ecirc;n l&agrave; ch&ugrave;a Phật Lớn v&agrave; ch&ugrave;a vạn Linh tr&ecirc;n đỉnh Cấm Sơn h&ugrave;ng vĩ. Do hồ Thủy Li&ecirc;n tọa lạc tr&ecirc;n một vị tr&iacute; kh&aacute; cao tr&ecirc;n đỉnh n&uacute;i, m&acirc;y l&uacute;c n&agrave;o cũng c&oacute; thể che k&iacute;n mặt hồ. L&uacute;c trước hồ Thủy Li&ecirc;m rất cạn, v&agrave;o m&ugrave;a mưa th&igrave; c&oacute; nước, c&ograve;n v&agrave;o m&ugrave;a kh&ocirc; th&igrave; kh&ocirc; đ&aacute;y.<br />\r\nNh&igrave;n chung, hồ Thủy Li&ecirc;m l&agrave; hồ chứa nước được x&acirc;y dựng trước nhất so với một số hồ trong v&ugrave;ng. Hồ Thủy Li&ecirc;m được x&acirc;y dựng năm 2005 v&agrave; ho&agrave;n th&agrave;nh năm 2008. Hồ cũng được nhiều người biết đến, v&igrave; đ&oacute; cũng điểm l&agrave; dừng ch&acirc;n của c&aacute;c tuyến xe lữ h&agrave;nh l&ecirc;n đỉnh n&uacute;i, v&agrave; mới đ&acirc;y l&agrave; điểm đến của hệ thống c&aacute;p treo l&ecirc;n Thi&ecirc;n Cấm Sơn.</p>\r\n\r\n<p><br />\r\n<strong>3. Hồ Thanh Long tr&ecirc;n n&uacute;i Thi&ecirc;n Cấm, x&atilde; An Hảo, huyện Tịnh Bi&ecirc;n:</strong>&nbsp;Hồ Thanh Long được x&acirc;y dựng v&agrave; ho&agrave;n th&agrave;nh trong năm 2015. Tọa lạc tr&ecirc;n n&uacute;i Thi&ecirc;n Cấm h&ugrave;ng vĩ, hồ Thanh Long được t&iacute;ch nước từ con suối Thanh Long tr&ecirc;n triền n&uacute;i &Ocirc;ng Cấm.<br />\r\nHồ t&iacute;ch nước nhằm phục vụ sinh hoạt cho người d&acirc;n sinh sống tr&ecirc;n n&uacute;i, v&agrave; dự trữ nước trong m&ugrave;a kh&ocirc; hạn. Hồ nằm dưới tuyến đường c&aacute;p treo, tạo th&ecirc;m cảnh quan cho c&aacute;c h&agrave;nh kh&aacute;ch khi đến tham quan .</p>\r\n\r\n<p><br />\r\n<strong>4. &Ocirc; Tức Sa, dưới n&uacute;i Thi&ecirc;n Cấm, x&atilde; An Cư, huyện Tịnh Bi&ecirc;n:</strong>&nbsp;Hồ &Ocirc; Tức Sa c&oacute; mặt nước y&ecirc;n lặng như tờ, kh&ocirc;ng kh&iacute; th&ocirc;ng tho&aacute;ng, m&aacute;t mẻ. Nhưng do hồ tọa lạc gần s&aacute;t dưới ch&acirc;n Thi&ecirc;n Cấm Sơn, phần n&agrave;o v&agrave;o m&ugrave;a n&agrave;y cũng bị che khuất gi&oacute;, kh&aacute;c với c&aacute;c hồ kh&aacute;c như &Ocirc; T&agrave; S&oacute;c v&agrave; So&agrave;i So.<br />\r\nHồ &Ocirc; Tức l&agrave; hồ thủy lợi, phục vụ cho n&ocirc;ng nghiệp của người d&acirc;n v&ugrave;ng n&uacute;i v&agrave;o m&ugrave;a kh&ocirc;. Đường v&agrave;o tại đ&acirc;y vắng vẻ v&agrave; thưa thớt d&acirc;n cư, lại tọa lạc c&aacute;ch xa trung t&acirc;m, n&ecirc;n hồ d&ugrave; khung cảnh cũng kh&aacute; đẹp, c&aacute;c bạn đến cũng &iacute;t hơn so với c&aacute;c hồ gần trung t&acirc;m.</p>\r\n\r\n<p><br />\r\n<strong>5. Hồ So&agrave;i So, n&uacute;i Phụng Ho&agrave;ng Sơn, x&atilde; N&uacute;i T&ocirc;, huyện Tri T&ocirc;n:&nbsp;</strong>Hồ So&agrave;i So l&agrave; một địa điểm du lịch mới được khai th&aacute;c trong những năm gần đ&acirc;y, lu&ocirc;n thu h&uacute;t được rất nhiều bạn . Hồ tọa lạc ở sườn ph&iacute;a đ&ocirc;ng n&uacute;i C&ocirc; T&ocirc;, c&oacute; vẻ đẹp hoang sơ, nước hồ quanh năm xanh biếc v&agrave; phẳng lặng. Hồ cũng kh&aacute; rộng, với d&ograve;ng suối V&agrave;ng từ tr&ecirc;n n&uacute;i chảy xuống, tạo ra phong cảnh rất hữu t&igrave;nh n&ecirc;n thơ.<br />\r\nHồ tọa lạc dưới ch&acirc;n n&uacute;i Phụng Ho&agrave;ng, kh&aacute;ch du lịch phải đi qua đ&acirc;y trước khi v&agrave;o n&uacute;i. Nh&igrave;n chung, hồ So&agrave;i So &ndash; suối V&agrave;ng đ&atilde; c&oacute; từ l&acirc;u, nay mới x&acirc;y lại c&aacute;c th&agrave;nh đ&ecirc; cho vững chắc v&agrave; tạo cảnh quan. Hồ c&oacute; vị tr&iacute; v&agrave; địa thế rất ph&ugrave; hợp cho ph&aacute;t triển tham quan của địa phương. C&ugrave;ng với hồ T&agrave; Pạ đ&atilde; c&oacute; v&agrave; hồ So&agrave;i Chek vừa mới x&acirc;y dựng xong, So&agrave;i So cũng g&oacute;p phần quan trọng tạo th&ecirc;m cảnh quan xinh đẹp cho v&ugrave;ng Bảy N&uacute;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a href=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/1/a/1a6d0817.jpg\" target=\"_blank\" title=\"nhung-ho-nuoc-tuyet-dep-o-vung-bay-nui-an-giang-ivivu-14\"><img alt=\"nhung-ho-nuoc-tuyet-dep-o-vung-bay-nui-an-giang-ivivu-14\" height=\"320\" src=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/1/a/1a6d0817-s.jpg\" width=\"480\" /></a></strong><br />\r\n&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>6. Hồ &Ocirc; T&agrave; S&oacute;c dưới n&uacute;i Ngọa Long, x&atilde; Lương Phi, huyện Tri T&ocirc;n:</strong>&nbsp;Hồ &Ocirc; T&agrave; S&oacute;c vừa được x&acirc;y dựng v&agrave; đưa v&agrave;o sử dụng trong năm 2016. Hồ cũng c&oacute; chức năng phục vụ n&ocirc;ng nghiệp cho những cư d&acirc;n canh t&aacute;c trong v&ugrave;ng.<br />\r\nL&ograve;ng hồ tọa lạc giữa khe n&uacute;i, mặt nước rất đẹp, v&igrave; gi&oacute; l&uacute;c n&agrave;o cũng thổi đến, tạo th&agrave;nh gợn s&oacute;ng. L&ograve;ng hồ cũng mới đưa v&agrave;o dự trữ nước trong m&ugrave;a mưa vừa qua, mực nước cũng chưa cao. Một số người d&acirc;n dưới ch&acirc;n n&uacute;i hay dẫn trẻ em ra đ&acirc;y bơi lội. Nước trong hồ rất m&aacute;t, sạch, do nước từ c&aacute;c khe đ&aacute; tr&ecirc;n n&uacute;i xuống.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>7. Hồ &Ocirc; Thum dưới n&uacute;i Phụng Ho&agrave;ng , x&atilde; &Ocirc; L&acirc;m, huyện Tri T&ocirc;n:</strong>&nbsp;Hồ &Ocirc; Thum l&agrave; hồ ngăn nước dưới ch&acirc;n n&uacute;i C&ocirc; T&ocirc; để phục vụ sản xuất n&ocirc;ng nghiệp. Hồ tọa lạc về hướng t&acirc;y của n&uacute;i C&ocirc; T&ocirc; (Phụng Ho&agrave;ng Sơn) v&agrave; hướng đ&ocirc;ng của đồi Tức Dụp. Hồ &Ocirc; Thum c&oacute; khung cảnh kh&aacute; đẹp, nhưng do nằm s&acirc;u dưới triền n&uacute;i, kh&aacute; vắng vẻ, n&ecirc;n &iacute;t người đến. Điều đ&oacute; v&ocirc; t&igrave;nh tạo kh&ocirc;ng gian l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch sự tĩnh lặng của n&uacute;i rừng. Trong l&ograve;ng hồ c&oacute; một g&ograve; đất kh&aacute; cao so với mặt hồ, nh&igrave;n giống như một ốc đảo nho nhỏ. Một số người d&acirc;n đ&atilde; l&agrave;m một c&acirc;y cầu gỗ nối liền hai bờ để qua lại. Cầu gỗ đơn sơ nhưng v&ocirc; t&igrave;nh lại l&agrave;m tăng l&ecirc;n vẻ đẹp của n&uacute;i đồi khi đến đ&acirc;y .</p>\r\n\r\n<p><br />\r\n<strong>8. Hồ So&agrave;i Chek tọa lạc dưới thung lũng n&uacute;i T&agrave; Pạ v&agrave; n&uacute;i Phụng Ho&agrave;ng, x&atilde; L&ecirc; Tr&igrave;, huyện Tri T&ocirc;n:&nbsp;</strong>Hồ So&agrave;i Chek l&agrave; hồ nước vừa được x&acirc;y dựng, đưa v&agrave;o sử dụng phục vụ n&ocirc;ng nghiệp trong năm qua. Hồ c&oacute; cảnh quang kh&aacute; đẹp, lại nằm c&aacute;ch trung t&acirc;m thị trấn kh&ocirc;ng xa. Đ&acirc;y cũng l&agrave; một điểm thuận lợi cho sự ph&aacute;t triển tham quan sinh th&aacute;i v&ugrave;ng n&uacute;i của địa phương.</p>', '2020-11-15 12:55:19', '2020-11-24 11:46:14'),
(6, 'Những điều khiến khách muốn trở lại quán cafe của bạn?', '<p>C&oacute; hai&nbsp;thắc mắc&nbsp;mang trường nghĩa đối lập nhau nhưng đều phản &aacute;nh rất nhiều suy nghĩ trong bu&ocirc;n b&aacute;n đồ uống. Đ&oacute; l&agrave; &ldquo;tại sao kh&aacute;ch h&agrave;ng lại ph&ugrave; hợp qu&aacute;n m&igrave;nh đến vậy? V&agrave; l&agrave;m thế n&agrave;o để&nbsp;kh&aacute;ch&nbsp;quay lại đ&acirc;y lần nữa?&rdquo;. Vấn đề đầu ti&ecirc;n c&oacute; thể qu&aacute; dễ d&agrave;ng để trả lời l&agrave; bạn đang l&agrave;m rất tốt một mặt n&agrave;o đ&oacute;, c&ograve;n ở c&acirc;u hỏi c&acirc;u hỏi thứ hai để lại nhiều vấn đề m&agrave; ch&uacute;ng ta n&ecirc;n phải thảo luận. H&atilde;y c&ugrave;ng đi t&igrave;m kiếm đ&aacute;p &aacute;n cho&nbsp;vấn đề&nbsp;n&agrave;y trong b&agrave;i viết dưới đ&acirc;y nh&eacute;!</p>', 'dvf4_ffc8f460-s.jpg', '<h2 dir=\"ltr\"><strong>Chất lượng m&oacute;n nước</strong></h2>\r\n\r\n<p dir=\"ltr\">Chất lượng lu&ocirc;n l&agrave; yếu tố phải được ch&uacute; trọng ưu ti&ecirc;n. Hương vị của một cốc c&agrave; ph&ecirc; mang lại cho kh&aacute;ch h&agrave;ng một trải nghiệm kh&ocirc;ng thể qu&ecirc;n nếu đủ g&acirc;y &ldquo;nghiện&rdquo; cho những kh&aacute;ch h&agrave;ng s&agrave;nh c&agrave; ph&ecirc;. V&agrave; chất lượng cũng l&agrave; yếu tố m&agrave; ch&uacute;ng ta c&oacute; thể dễ d&agrave;ng thay đổi nhất bằng sự&nbsp;thay đổi&nbsp;t&iacute;ch cực k&egrave;m với việc kiểm so&aacute;t những &yacute; kiến phản hồi của kh&aacute;ch h&agrave;ng. C&oacute; bao giờ bạn nhận biết được một qu&aacute;n rất đỗi b&igrave;nh thường, kh&ocirc;ng đẹp, kh&ocirc;ng sang nhưng lu&ocirc;n đ&ocirc;ng nghẹt kh&aacute;ch chưa? Chắc chắn rằng chất lượng của&nbsp;cốc&nbsp;c&agrave; ph&ecirc; l&agrave; ch&iacute;nh l&agrave; đ&aacute;p &aacute;n của c&acirc;u hỏi n&agrave;y đấy.<br />\r\n&nbsp;</p>\r\n\r\n<h2 dir=\"ltr\"><strong>Định vị qu&aacute;n c&agrave; ph&ecirc; của bạn</strong></h2>\r\n\r\n<p dir=\"ltr\">Bạn c&oacute; nhiều lựa chọn để định vị qu&aacute;n c&agrave; ph&ecirc; của m&igrave;nh, v&iacute; dụ qu&aacute;n c&agrave; ph&ecirc; với m&oacute;n chủ đạo l&agrave; c&agrave; ph&ecirc; trứng, hay qu&aacute;n c&agrave; ph&ecirc; chỉ b&aacute;n 100% hạt c&agrave; ph&ecirc; Arabica thượng hạng, hoặc qu&aacute;n C&agrave; ph&ecirc; Vợt, hay qu&aacute;n #CoffeeBike với m&oacute;n chủ đạo l&agrave; Espresso Sữa đ&aacute; với hạt Robusta chất lượng kết hợp c&ugrave;ng m&aacute;y m&aacute;y pha cafe nhập khẩu từ &Yacute;.</p>\r\n\r\n<p dir=\"ltr\">Ngo&agrave;i định vị bằng hạt C&agrave; ph&ecirc;, bạn cũng thể định vị m&igrave;nh bằng kh&ocirc;ng gian, hoặc c&ugrave;ng 1 thức uống đặc biệt n&agrave;o đ&oacute; tạo sự dấu ấn cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p dir=\"ltr\">Nếu định vị của bạn chung chung, hoặc kh&ocirc;ng t&igrave;m kiếm được định vị bạn h&atilde;y b&igrave;nh tĩnh trước việc mở qu&aacute;n hoặc ph&aacute;t triển m&ocirc; h&igrave;nh bu&ocirc;n b&aacute;n c&agrave; ph&ecirc; của bạn.</p>\r\n\r\n<h2 dir=\"ltr\"><strong>T&ocirc;n trọng những chi tiết</strong></h2>\r\n\r\n<p dir=\"ltr\">C&oacute; c&acirc;u: &quot;Chi tiết l&agrave;m n&ecirc;n đẳng cấp&quot;. Mỗi một thao t&aacute;c nhỏ cũng l&agrave;m thay đổi chất lượng một&nbsp;cốc&nbsp;c&agrave; ph&ecirc;, hay một c&acirc;u n&oacute;i, một h&agrave;nh vi cũng ảnh hưởng đến việc thu h&uacute;t hoặc giữ ch&acirc;n kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p dir=\"ltr\">Kh&ocirc;ng v&igrave; số lượng m&agrave; qua loa trong việc theo d&otilde;i v&agrave; y&ecirc;u cầu sự chỉnh chu trong chi tiết, t&ocirc;i đ&atilde; từng trả gi&aacute; rất đắt cho việc kh&ocirc;ng theo s&aacute;t c&aacute;c chi tiết trong pha chế, dẫn đến giảm chất lượng sản phẩm v&agrave; mất kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p dir=\"ltr\">Một&nbsp;ly&nbsp;c&agrave; ph&ecirc; dỏm l&agrave;m mất cảm x&uacute;c một ng&agrave;y của một kh&aacute;ch h&agrave;ng, bạn mất kh&aacute;ch h&agrave;ng l&agrave; mất tất cả.</p>\r\n\r\n<p dir=\"ltr\">Ch&uacute;ng ta c&oacute; thể thoả hiệp với số lượng nhưng chất lượng th&igrave; kh&ocirc;ng! Bạn c&oacute; thể kiếm được lợi nhuận nhiều từ việc l&ocirc;i k&eacute;o kh&aacute;ch h&agrave;ng mới, nhưng nguồn doanh thu n&agrave;y bản chất kh&ocirc;ng bền vững. M&ocirc; h&igrave;nh bu&ocirc;n b&aacute;n qu&aacute;n c&agrave; ph&ecirc; sống s&oacute;t nhờ v&agrave;o lượng kh&aacute;ch h&agrave;ng trung th&agrave;nh.</p>\r\n\r\n<h2 dir=\"ltr\"><strong>Thu thập phản hồi của kh&aacute;ch h&agrave;ng</strong></h2>\r\n\r\n<p dir=\"ltr\">Đối với thương hiệu mới đang ph&aacute;t triển, cần thực hiện nghi&ecirc;n cứu đầu tay về cảm t&igrave;nh của kh&aacute;ch h&agrave;ng xem họ&nbsp;th&iacute;ch&nbsp;hay kh&ocirc;ng&nbsp;y&ecirc;u th&iacute;ch&nbsp;những g&igrave; li&ecirc;n quan đến việc kinh doanh của doanh nghiệp bạn. H&atilde;y cung cấp phiếu phản hồi hoặc địa chỉ email để tiếp nhận những g&oacute;p &yacute; v&agrave; ph&acirc;n t&iacute;ch xem điều g&igrave; l&agrave;m cần th&agrave;nh c&ocirc;ng v&agrave; vấn đề n&agrave;o n&ecirc;n được cải thiện.</p>\r\n\r\n<p dir=\"ltr\">Lưu trữ hồ sơ khiếu nại của kh&aacute;ch h&agrave;ng để cung cấp một thước đo chuẩn x&aacute;c về c&aacute;c loại vấn đề ph&aacute;t sinh, tần suất của những lời ph&agrave;n n&agrave;n v&agrave; phản hồi nhận được. Trong một số v&iacute; dụ, khiếu nại giảm đi đ&aacute;ng kể khi c&aacute;c sản phẩm hoặc dịch vụ được cải thiện.&nbsp;Điều n&agrave;y rất cần thiết trong việc&nbsp;<strong><a href=\"https://www.nowpos.vn/tin-tuc\">quản l&yacute; nh&agrave; h&agrave;ng</a></strong>.</p>\r\n\r\n<p dir=\"ltr\">Nếu những ph&agrave;n n&agrave;n về c&ugrave;ng một vấn đề cứ lặp đi lặp lại th&igrave; đ&acirc;y l&agrave; l&uacute;c c&ocirc;ng ty cần phải suy nghĩ v&agrave; thử nghiệm những biện ph&aacute;p kh&aacute;c tốt hơn để cải thiện vấn đề.</p>', '2020-11-15 12:56:44', '2020-11-24 11:46:56'),
(7, 'Du lịch Nhật Bản đừng quên thưởng thức những món đặc sản này', '<p>Tới Okinawa du kh&aacute;ch sẽ &iacute;t thấy thịt nướng yakitori hay sushi, m&agrave; thay v&agrave;o đ&oacute; l&agrave; những m&oacute;n như tempura, rong nho hay thịt rafute.</p>', 'DTq7_f5ceca47-s.jpg', '<p><strong><a href=\"https://www.tripnow.vn/bai-viet/kinh-nghiem-du-lich-nhat-ban-tu-tuc-chi-tiet-day-du-nhat-cho-ga-mo-9152\" target=\"_blank\">Du lịch Nhật Bản</a>&nbsp;kh&aacute;m ph&aacute; 9 m&oacute;n phải thử ở cực nam</strong></p>\r\n\r\n<p><br />\r\n<strong>Goya champuru</strong><br />\r\nN&oacute;i đến ẩm thực Okinawa kh&ocirc;ng thể kh&ocirc;ng nhắc tới những m&oacute;n ăn nổi bật như goya champuru. Champuru, nghĩa l&agrave; &ldquo;trộn lẫn&rdquo;, một di sản ẩm thực của v&ugrave;ng. M&oacute;n n&agrave;y gồm một số nguy&ecirc;n liệu, phổ biến nhất l&agrave; c&oacute; mướp đắng (goya), x&agrave;o với đậu phụ, thịt heo v&agrave; trứng. M&oacute;n n&agrave;y c&oacute; thể l&agrave;m theo nhiều c&aacute;ch, hoặc chi&ecirc;n như tempura hoặc th&aacute;i mỏng v&agrave; trộn trong salad hay với l&agrave;m đồ muối để ăn k&egrave;m.</p>\r\n\r\n<p><a href=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/f/5/f5ceca47.jpg\" target=\"_blank\" title=\"9-mon-phai-thu-o-cuc-nam-nhat-ban-6\"><img alt=\"9-mon-phai-thu-o-cuc-nam-nhat-ban-6\" height=\"270\" src=\"https://livedoor.blogimg.jp/tin_tuc-amthuc/imgs/f/5/f5ceca47-s.jpg\" width=\"480\" /></a><br />\r\n&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Umi budo</strong><br />\r\nĐ&uacute;ng như t&ecirc;n gọi umi budo (rong nho) đ&acirc;y l&agrave; một loại rong biển nhưng h&igrave;nh d&aacute;ng như những ch&ugrave;m nho t&iacute; hon. Rong nho được ăn sống k&egrave;m với nước tương, chanh tươi, khi nhai ch&uacute;ng nổ trong miệng thực kh&aacute;ch hệt như m&oacute;n trứng c&aacute; hồi.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Awamori</strong><br />\r\nĐ&acirc;y l&agrave; một loại rượu chế biến từ gạo hạt d&agrave;i tạo hương vị hấp dẫn, thường uống k&egrave;m đ&aacute; v&agrave; ch&uacute;t nước. Đ&ocirc;i khi awamori được th&ecirc;m rắn ng&acirc;m để tạo th&agrave;nh habushu để b&aacute;n như một loại &ldquo;đồ lưu niệm&rdquo; cho kh&aacute;ch hoặc c&aacute;c nh&agrave; h&agrave;ng mua về trưng b&agrave;y.</p>\r\n\r\n<p><br />\r\n<strong>Tempura</strong><br />\r\nNgười Okinawa rất y&ecirc;u th&iacute;ch m&oacute;n chi&ecirc;n nổi tiếng n&agrave;y. Trong c&aacute;c nh&agrave; h&agrave;ng địa phương thường d&ugrave;ng những nguy&ecirc;n liệu phổ biến như khoai lang t&iacute;m, mướp đắng, t&ocirc;m, nấm, c&agrave; t&iacute;m để chế biến tempura. Một loại tempura kh&aacute;c phổ biến ở Okinawa l&agrave; l&agrave;m từ rong biển n&acirc;u c&oacute; t&ecirc;n mozuku.</p>\r\n\r\n<p><br />\r\n<strong>Rafute</strong><br />\r\nĐ&acirc;y l&agrave; một m&oacute;n ăn l&agrave;m từ mimigaa (phần thịt tai heo) v&agrave; chiragaa (phần da mặt heo). Những miếng thịt l&agrave;m rafute được nấu nhừ với nước tương, đường n&acirc;u tạo m&agrave;u hấp dẫn. M&oacute;n n&agrave;y thực chất c&oacute; nguồn gốc từ Trung Quốc nhưng được &ldquo;biến tấu&rdquo; th&agrave;nh nhiều phi&ecirc;n bản kh&aacute;c nhau tr&ecirc;n khắp ch&acirc;u &Aacute;. Rafute ở Okinawa vừa c&oacute; vị mặn v&agrave; ngọt, mềm tới mức c&oacute; thể tan chảy trong miệng. Ngo&agrave;i ra, rafute c&ograve;n l&agrave; m&oacute;n ăn c&ugrave;ng với m&igrave; soba.</p>\r\n\r\n<p><br />\r\n<strong>Okinawa soba</strong><br />\r\nCũng l&agrave; soba nhưng so với nhiều nơi kh&aacute;c ở Nhật Bản th&igrave; c&aacute;ch chế biến v&agrave; ăn m&oacute;n n&agrave;y ở Okinawa c&oacute; phần kh&aacute;c biệt. M&igrave; được ăn k&egrave;m nước ninh từ thịt heo, c&aacute; ngừ kh&ocirc; katsuobushi v&agrave; rong biển, c&ograve;n sợi m&igrave; vừa chắc vừa dễ nhai. Một trong những loại thịt ăn k&egrave;m phổ biến nhất của soba ở Okinawa l&agrave; soki (sườn hầm) v&agrave; rafute. Khi thưởng thức, thực kh&aacute;ch c&oacute; thể ăn th&ecirc;m gừng muối, h&agrave;nh l&aacute;, ớt ng&acirc;m.</p>\r\n\r\n<p><br />\r\nCơm Taco<br />\r\nThực kh&aacute;ch tới Okinawa sẽ thấy cơm taco &ndash; m&oacute;n k&egrave;m với thịt b&ograve;, phomat, salad, sốt c&agrave; chua. Thực kh&aacute;ch cũng c&oacute; thể gọi đ&acirc;y l&agrave; một loại salad taco phi&ecirc;n bản Okinawa để so s&aacute;nh với taco phương t&acirc;y. Đ&acirc;y l&agrave; một trong những kiểu nấu cơm kh&ocirc;ng chỉ phổ biến ở c&aacute;c nh&agrave; h&agrave;ng Okinawa m&agrave; cả nhiều nơi kh&aacute;c tại Nhật Bản.</p>\r\n\r\n<p><br />\r\n<strong>Sukugarasu</strong><br />\r\nL&agrave; những miếng đậu phụ chắc, k&egrave;m những con c&aacute; nhỏ x&iacute;u b&ecirc;n tr&ecirc;n, m&oacute;n sukugarasu rất phổ biến ở Okinawa v&agrave; thường d&ugrave;ng khi thưởng thức rượu sake hay awamori. Mỗi phần đậu được cắt vừa một miếng ăn v&agrave; vị mặn đậm của c&aacute; th&igrave; h&ograve;a hợp với sự mềm mại của miếng đậu phụ.</p>\r\n\r\n<p>Sata andagi: Người d&acirc;n Okinawa tạo ra những chiếc b&aacute;nh mềm trong gi&ograve;n ngo&agrave;i c&oacute; m&agrave;u v&agrave;ng n&acirc;u gọi l&agrave; sata andagi. Trong tiếng Nhật t&ecirc;n m&oacute;n c&oacute; nghĩa l&agrave; &ldquo;đường chi&ecirc;n ngập dầu&rdquo;. B&aacute;nh gồm đường, bột, trứng, l&agrave; m&oacute;n ăn thường xuất hiện trong c&aacute;c lễ hội, l&agrave;m đồ tr&aacute;ng miệng trong nh&agrave; h&agrave;ng hoặc b&aacute;n h&egrave; phố như đồ ăn vặt.</p>', '2020-11-15 12:57:45', '2020-11-24 11:47:26'),
(9, 'Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng', '<h2>Loại rau n&agrave;y rất rẻ tiền, dễ chế biến th&agrave;nh nhiều m&oacute;n ngon, kh&ocirc;ng g&acirc;y ng&aacute;n, rất tốt cho sức khoẻ.</h2>', 'Nh94_Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-2-1607922305-219-width800height534.jpg', '<p><strong>Nguy&ecirc;n liệu:</strong></p>\r\n\r\n<p>1 c&acirc;y cải thảo, 350g thịt ba chỉ, gừng, ớt đỏ kh&ocirc;, miến, h&agrave;nh l&aacute;, tỏi, hoa hồi, l&aacute; nguyệt quế, muối, hạt n&ecirc;m, nước tương, ti&ecirc;u.</p>\r\n\r\n<p><strong>C&aacute;ch thực hiện:</strong></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 2\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-3-1607922210-905-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Chuẩn bị c&aacute;c nguy&ecirc;n liệu sẵn.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 3\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-4-1607922219-366-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Ng&acirc;m miến&nbsp;v&agrave;o trong nước trước nửa tiếng cho mềm.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 4\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-5-1607922229-97-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Sau khi rửa sạch bắp cải, cắt kh&uacute;c th&agrave;nh h&igrave;nh khối.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 6\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-6-1607922254-933-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Thịt heo cắt miếng nhỏ 2-3 cm.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 7\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-7-1607922238-602-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Gừng th&aacute;i l&aacute;t mỏng, tỏi đập dập, cắt nhỏ ớt kh&ocirc;.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 8\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-8-1607922266-746-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Cho thịt heo v&agrave;o chảo, đảo đều, r&aacute;n một l&uacute;c rồi chắt bỏ phần mỡ thừa.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 9\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-9-1607922276-519-width800height534.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Cho hoa hồi, l&aacute; nguyệt quế, gừng, ớt... v&agrave;o, th&ecirc;m 2 b&aacute;t con nước, thịt heo, đun s&ocirc;i rồi hạ nhỏ lửa trong 4 ph&uacute;t.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 10\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-10-1607922287-201-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Tiếp tục cho cải thảo v&agrave;o đun trong 2 ph&uacute;t, th&ecirc;m miến v&agrave; gia vị, đun tiếp 3 ph&uacute;t nữa rồi n&ecirc;m nếm lại cho vừa miệng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 11\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-11-1607922296-106-width800height533.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Tắt bếp, rắc ti&ecirc;u, h&agrave;nh l&aacute;, dọn ra m&acirc;m.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thịt heo hầm với nguyên liệu rẻ tiền này vừa lạ miệng hao cơm lại bổ dưỡng - 12\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-14/Khong-biet-ham-thit-heo-voi-gi-cho-la-mieng-ma-hao-com-hay-thu-ngay-nguyen-lieu-re-tien-nay-2-1607922305-219-width800height534.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Th&agrave;nh phẩm.</p>', '2020-11-20 01:51:19', '2020-12-17 03:11:57'),
(10, 'Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán', '<h2>Quan trọng nhất l&agrave; m&oacute;n n&agrave;y kh&ocirc;ng qu&aacute; nhiều dầu mỡ, kh&ocirc;ng ng&aacute;n, m&ugrave;i vị lạ, rất ngon.</h2>', '5SaN_Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-1-1599718709-664-width700height467.jpg', '<p><strong>Nguy&ecirc;n liệu</strong></p>\r\n\r\n<p>- 500 gram thịt ba chỉ, gạo, tỏi, h&agrave;nh l&aacute;</p>\r\n\r\n<p>- Gia vị: 2 th&igrave;a nước tương, 1 th&igrave;a rượu nấu ăn, 1 th&igrave;a dầu h&agrave;o, 2 th&igrave;a nước mắm ngọt, nửa th&igrave;a đường.</p>\r\n\r\n<p><strong>C&aacute;ch thực hiện</strong></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán - 2\" src=\"https://cdn.24h.com.vn/upload/3-2020/images/2020-09-10/Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-3-1599718721-596-width700height467.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Cho gạo v&agrave;o chảo, rang v&agrave;ng, sau đ&oacute; để nguội cho v&agrave;o cối xay vừa, kh&ocirc;ng xay th&agrave;nh bột.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán - 3\" src=\"https://cdn.24h.com.vn/upload/3-2020/images/2020-09-10/Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-4-1599718730-195-width700height467.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Th&aacute;i thịt ba chỉ th&agrave;nh những miếng đều nhau.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán - 4\" src=\"https://cdn.24h.com.vn/upload/3-2020/images/2020-09-10/Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-5-1599718739-785-width700height467.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Ướp thịt heo với một ch&uacute;t gia vị, trộn đều, bọc lại rồi để ngăn m&aacute;t tủ lạnh 1 tiếng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán - 6\" src=\"https://cdn.24h.com.vn/upload/3-2020/images/2020-09-10/Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-6-1599718746-412-width700height467.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Trộn thịt với 2 th&igrave;a nước.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán - 7\" src=\"https://cdn.24h.com.vn/upload/3-2020/images/2020-09-10/Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-7-1599718757-345-width700height467.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Đổ bột gạo v&agrave;o thịt, phủ đều, cho thịt v&agrave;o xửng hấp trong 1 tiếng l&agrave; xong, c&oacute; thể rắc th&ecirc;m một &iacute;t h&agrave;nh l&aacute; để hấp dẫn hơn.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Mẹo làm thịt heo hấp gạo rang nghe cực lạ, thịt mềm thơm và không hề ngán - 8\" src=\"https://cdn.24h.com.vn/upload/3-2020/images/2020-09-10/Meo-lam-thit-heo-hap-gao-rang-nghe-cuc-la-nhung-thit-mem-thom-va-khong-he-ngan-2-1599718764-270-width700height467.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Thịt thấm, b&eacute;o nhưng kh&ocirc;ng ngấy.</p>', '2020-12-17 03:16:01', '2020-12-17 03:16:01'),
(11, 'Làm sườn nướng tại nhà lại không hề đơn giản vì nếu không khéo, sườn dễ bị cháy khi nướng than hoặc bị khô.', '<h2>L&agrave;m sườn nướng tại nh&agrave; lại kh&ocirc;ng hề đơn giản v&igrave; nếu kh&ocirc;ng kh&eacute;o, sườn dễ bị ch&aacute;y khi nướng than hoặc bị kh&ocirc;.</h2>', 'aukI_1607823227-logo-90136804-2510398159065808-8795276402896142336-o-1607790775853451330855.jpg', '<p>M&oacute;n sườn nướng khoai t&acirc;y l&agrave; m&oacute;n kho&aacute;i khẩu của nhiều người, đặc biệt l&agrave; trẻ em. Tuy nhi&ecirc;n, l&agrave;m sườn nướng tại nh&agrave; lại kh&ocirc;ng hề đơn giản v&igrave; nếu kh&ocirc;ng kh&eacute;o, sườn dễ bị ch&aacute;y khi nướng than hoặc bị kh&ocirc;.</p>\r\n\r\n<p>Bạn c&oacute; thể giải quyết vấn đề n&agrave;y bằng c&aacute;ch sử dụng nồi chi&ecirc;n kh&ocirc;ng dầu với c&aacute;c mẹo nhỏ n&agrave;y.&nbsp;M&oacute;n ăn n&agrave;y với c&aacute;ch l&agrave;m đơn giản, th&agrave;nh phẩm với vị thịt thơm ngon, khoai t&acirc;y b&ugrave;i b&eacute;o, c&oacute; thể kết hợp với cơm hoặc b&aacute;nh m&igrave; trong những buổi chiều mưa.&nbsp;</p>\r\n\r\n<p><strong>Nguy&ecirc;n liệu l&agrave;m sườn nướng khoai t&acirc;y:</strong></p>\r\n\r\n<p>- Khoảng 500 gram sườn&nbsp;</p>\r\n\r\n<p>- Khoai t&acirc;y bổ cau khoảng 5 củ nhỏ</p>\r\n\r\n<p>- Gia vị: h&agrave;nh kh&ocirc;, hạt ti&ecirc;u, bột tỏi, bột h&uacute;ng l&igrave;u, gia vị ướp sốt nướng Cholimex, bơ Trường An, nước mắm, m&igrave; ch&iacute;nh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Làm sườn nướng khoai tây bằng nồi chiên không dầu thơm ngậy, không khô - 1\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-13//1607823226-logo-9094489825103980790658161575537464670420992o-1607790774686861674098.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">L&oacute;t giấy bạc khi nướng để tr&aacute;nh chảy sốt v&agrave; l&agrave;m bẩn nồi khi l&agrave;m sườn nướng</p>\r\n\r\n<p><strong>C&aacute;ch l&agrave;m sườn nướng khoai t&acirc;y:&nbsp;</strong></p>\r\n\r\n<p>- Sườn trần sơ qua nước s&ocirc;i cho sạch m&ugrave;i h&ocirc;i, khoai t&acirc;y rửa sạch bổ cau.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Làm sườn nướng khoai tây bằng nồi chiên không dầu thơm ngậy, không khô - 3\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-12-13//1607823227-logo-90136804-2510398159065808-8795276402896142336-o-1607790775853451330855.jpg\" width=\"660\" /></p>\r\n\r\n<p style=\"text-align:center\">Th&agrave;nh phẩm với sườn nướng thơm ngon, khoai t&acirc;y b&eacute;o b&ugrave;i</p>\r\n\r\n<p>- Sau đ&oacute; cho v&agrave;o tẩm ướp c&ugrave;ng khoai, tẩm ướp lu&ocirc;n để khoai nướng l&ecirc;n kh&ocirc;ng bị lạc vị, ướp khoai c&ugrave;ng sườn với h&agrave;nh kh&ocirc; b&oacute;c vỏ th&aacute;i mỏng c&ugrave;ng gia vị, m&igrave; ch&iacute;nh, ch&uacute;t nước mắm c&ugrave;ng bột h&uacute;ng l&igrave;u, 2 th&igrave;a ăn cơm sốt nướng Cholimex.</p>\r\n\r\n<p>- Sau 30 ph&uacute;t ướp, l&agrave;m n&oacute;ng nồi chi&ecirc;n kh&ocirc;ng dầu 3 ph&uacute;t 180 độ đ&atilde; l&oacute;t sẵn giấy bạc (đ&atilde; phết sẵn 1 ch&uacute;t bơ để l&agrave;m n&oacute;ng v&agrave; thơm ngậy hơn cho m&oacute;n ăn) để kh&ocirc;ng l&agrave;m bẩn nồi v&agrave; chảy sốt, giữ được nước sốt từ khoai t&acirc;y v&agrave; sườn tiết ra trong l&uacute;c nướng để kh&ocirc;ng bị kh&ocirc;.</p>\r\n\r\n<p>- Tiếp đến&nbsp;cho sườn v&agrave; khoai v&agrave;o nồi bật chế độ thịt 15 ph&uacute;t 180 độ. Sau đ&oacute; 200 độ 10 ph&uacute;t l&agrave; xong một m&oacute;n ăn dễ l&agrave;m lại c&ograve;n ngon.</p>\r\n\r\n<p>M&oacute;n sườn nướng c&oacute; thể ăn c&ugrave;ng với cơm, hoặc b&aacute;nh m&igrave; th&ecirc;m ch&uacute;t sốt đều ngon.</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>*M&oacute;n ăn v&agrave; h&igrave;nh ảnh m&oacute;n sườn nướng do bếp Trang Ph&ugrave;ng thực hiện.</em></strong></p>', '2020-12-17 03:19:37', '2020-12-17 03:22:40'),
(12, 'Bánh trung thu Sharetea Việt Nam', NULL, 'TA5g_Photo+9-14-18,+7+08+40+AM-2.jpg', '<p>Sharetea Việt Nam tuy gia nhập thị trường kh&ocirc;ng sớm song đ&atilde; sớm khẳng định vị thế &ocirc;ng lớn v&agrave; chiếm được l&ograve;ng tin của đ&ocirc;ng đảo giới mộ điệu tr&agrave; sữa khắp mọi miền. Một điều th&uacute; vị l&agrave; cũng như nhiều h&atilde;ng b&aacute;nh, tr&agrave; kh&aacute;c&hellip;, Sharetea đ&atilde; kh&ocirc;ng đứng ngo&agrave;i cuộc chơi Trung thu, nhanh ch&oacute;ng cho ra mắt d&ograve;ng sản phẩm b&aacute;nh Trung thu của ri&ecirc;ng h&atilde;ng.</p>\r\n\r\n<p>Hộp b&aacute;nh vẫn mang sắc đỏ đặc trưng của Sharetea song từng chiếc b&aacute;nh lại đặt trong những chiếc hộp được thiết kế tinh tế, hiện đại v&agrave; trẻ trung, bắt mắt. Một hộp b&aacute;nh cơ bản của Sharetea c&oacute; 3 chiếc b&aacute;nh với 3 vị kh&aacute;c nhau, lấy từ 5 vị ch&iacute;nh m&agrave; Sharetea c&oacute; b&aacute;n trong năm nay: cốm dừa, hoa quả kh&ocirc;, đậu xanh hạnh nh&acirc;n, tinh than tre mứt cam v&agrave; thập cẩm. C&aacute;c vị b&aacute;nh l&agrave; sự tổng h&ograve;a giữa truyền thống v&agrave; hiện đại, l&agrave; những g&igrave; tinh t&uacute;y xưa cũ kết hợp với những d&ograve;ng nguy&ecirc;n liệu tươi mới v&agrave; đặc biệt l&agrave; l&agrave;nh mạnh, tốt cho sức khỏe. Hai vị b&aacute;nh t&ocirc;i thấy th&uacute; vị nhất ở đ&acirc;y ch&iacute;nh l&agrave; tinh than tre mứt cam thanh dịu v&agrave; đậu xanh hạnh nh&acirc;n ngậy b&ugrave;i.</p>\r\n\r\n<p>Nh&acirc;m nhi từng chiếc b&aacute;nh tươi n&agrave;y, kh&ocirc;ng thể thiếu được một ch&eacute;n tr&agrave; Oolong đ&uacute;ng điệu b&ecirc;n cạnh. V&igrave; l&agrave; b&aacute;nh tươi n&ecirc;n b&aacute;nh sẽ thưởng thức ngon nhất khi được đặt v&agrave; mới mua về. Trung thu sắp tới gần, bạn đ&atilde; chọn được cho m&igrave;nh một hộp b&aacute;nh Sharetea chưa?</p>\r\n\r\n<p><strong>Th&ocirc;ng tin sản phẩm B&aacute;nh Trung thu Sharetea </strong><br />\r\nGi&aacute; b&aacute;n lẻ: 68.000 VND/b&aacute;nh.<br />\r\nSản phẩm b&aacute;n tại c&aacute;c cơ sở của Sharetea VN tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>', '2020-12-20 10:30:36', '2020-12-20 10:42:17');
INSERT INTO `blog` (`id`, `title`, `description`, `image`, `content`, `created_at`, `updated_at`) VALUES
(13, 'Cách làm trà sữa bằng sữa tươi tại nhà', '<p>C&aacute;ch l&agrave;m tr&agrave; sữa bằng sữa tươi ngon miệng v&agrave; hấp dẫn ngay tại nh&agrave; đang được rất nhiều bạn y&ecirc;u th&iacute;ch. V&igrave; thế để l&agrave;m phong ph&uacute; th&ecirc;m chiếc tủ lạnh đồ uống nh&agrave; bạn th&igrave; h&ocirc;m nay Blog YUMMY sẽ mang tới cho mọi người c&ocirc;ng thức l&agrave;m tr&agrave; sữa bằng sữa tươi ngay tại nh&agrave;.</p>', 'LjX4_Cách-làm-trà-sữa-bằng-sữa-tươi-ngon.jpg', '<h2>Những nguy&ecirc;n liệu để l&agrave;m tr&agrave; sữa bằng sữa tươi</h2>\r\n\r\n<p>B&iacute; quyết đầu ti&ecirc;n để l&agrave;m n&ecirc;n những ly tr&agrave; sữa sữa tươi thơm ngon, tuyệt vời th&igrave; bạn cần chuẩn bị những nguy&ecirc;n liệu như sau:</p>\r\n\r\n<p>Sữa đặc 20ml</p>\r\n\r\n<p>Sữa tưới 70ml</p>\r\n\r\n<p>Tr&acirc;n ch&acirc;u 50g</p>\r\n\r\n<p>Nước đường ph&egrave;n 10ml</p>\r\n\r\n<p>Tr&agrave; &ocirc; long hoặc tr&agrave; l&agrave;i 30 g</p>\r\n\r\n<p>Đ&aacute; vi&ecirc;n</p>\r\n\r\n<p>C&ugrave;ng một số dụng cụ l&agrave;m tr&agrave; sữa như muỗng khuấy, nồi ng&acirc;m tr&agrave;, ly, r&acirc;y lọc,&hellip; l&agrave; đ&atilde; c&oacute; thể bắt tay v&agrave;o thực hiện m&oacute;n đồ uống n&agrave;y.</p>\r\n\r\n<h2>C&ocirc;ng thức l&agrave;m tr&agrave; sữa bằng sữa tươi tại nh&agrave;</h2>\r\n\r\n<p>L&agrave;m tr&agrave; sữa bằng sữa tươi sẽ phải trải qua 3 bước ch&iacute;nh như sau:</p>\r\n\r\n<h3>Bước 1: Ủ tr&agrave; l&agrave;m tr&agrave; sữa bằng sữa tươi</h3>\r\n\r\n<p>Để ủ tr&agrave; bằng tr&agrave; sữa bạn chỉ cần đun s&ocirc;i 1 nồi nước v&agrave; cho to&agrave;n bộ c&aacute;c t&uacute;i tr&agrave; v&agrave;o ng&acirc;m.</p>\r\n\r\n<p>Sau khi ng&acirc;m khoảng 10&rsquo; th&igrave; lấy t&uacute;i tr&agrave; ra v&agrave; lọc bằng r&acirc;y. Như vậy c&aacute;c tạp chất v&agrave; b&atilde; tr&agrave; sẽ được loại bỏ. Cuối c&ugrave;ng bạn lọc lấy nước cốt tr&agrave;.</p>\r\n\r\n<h3>Bước 2: L&agrave;m tr&acirc;n ch&acirc;u tr&agrave; sữa</h3>\r\n\r\n<p>Tr&acirc;n ch&acirc;u sau khi nặn sẽ được bỏ v&agrave;o nồi nước s&ocirc;i để luộc. L&uacute;c n&agrave;o trần ch&acirc;u nổi l&ecirc;n mặt nước th&igrave; vớt ra v&agrave; cho v&agrave;o b&aacute;t nước đ&aacute;. Như vậy tr&acirc;n ch&acirc;u của bạn sẽ mềm, dai v&agrave; kh&ocirc;ng bị d&iacute;nh.</p>\r\n\r\n<p><img alt=\"Cách làm trà sữa bằng sữa tươi tại nhà\" height=\"188\" sizes=\"(max-width: 300px) 100vw, 300px\" src=\"https://amthucblog.com/wp-content/uploads/2020/04/C%C3%A1ch-l%C3%A0m-tr%C3%A0-s%E1%BB%AFa-b%E1%BA%B1ng-s%E1%BB%AFa-t%C6%B0%C6%A1i-300x188.jpg\" srcset=\"https://amthucblog.com/wp-content/uploads/2020/04/Cách-làm-trà-sữa-bằng-sữa-tươi-300x188.jpg 300w, https://amthucblog.com/wp-content/uploads/2020/04/Cách-làm-trà-sữa-bằng-sữa-tươi.jpg 640w\" width=\"300\" /></p>\r\n\r\n<p>C&aacute;ch l&agrave;m tr&agrave; sữa bằng sữa tươi tại nh&agrave;</p>\r\n\r\n<p>Ngo&agrave;i ra nếu bạn th&iacute;ch vị ngọt của tr&acirc;n ch&acirc;u th&igrave; c&oacute; thể thăng caramen v&agrave; ng&acirc;m v&agrave;o. Như thế tr&acirc;n ch&acirc;u của bạn sẽ rất ngon, ngọt v&agrave; dai.</p>\r\n\r\n<h3>Bước 3: Pha tr&agrave; sữa bằng sữa tươi</h3>\r\n\r\n<p>H&atilde;y cho sữa đặc, sữa tươi c&ugrave;ng đường ph&egrave;n v&agrave;o nước cốt tr&agrave; đ&atilde; chuẩn bị trước rồi khuấy đều tất cả hỗn hợp n&agrave;y.</p>\r\n\r\n<p>V&agrave; b&acirc;y giờ bạn chỉ cần cho trần ch&acirc;u v&agrave;o ly đổ th&ecirc;m tr&agrave; sữa c&ugrave;ng đ&aacute; v&agrave;o l&agrave; đ&atilde; c&oacute; thể thưởng thức ngay rồi.</p>\r\n\r\n<h2>Lưu &yacute; khi pha tr&agrave; sữa bằng sữa tươi</h2>\r\n\r\n<p>Để c&oacute; một ly tr&agrave; sữa bằng sữa tươi đ&uacute;ng điệu bạn n&ecirc;n lưu &yacute; một số điều như sau :</p>\r\n\r\n<ul>\r\n	<li>Bạn kh&ocirc;ng n&ecirc;n nấu trực tiếp tr&agrave; tr&ecirc;n bếp. Như vậy sẽ g&acirc;y ra m&ugrave;i ch&aacute;y, kh&eacute;t nồng nặc. N&ecirc;n h&atilde;y nấu s&ocirc;i nước, tắt bếp v&agrave; tiếp tục pha tra.</li>\r\n	<li>N&ecirc;n chọn sữa tươi thanh tr&ugrave;ng để kh&ocirc;ng c&oacute; m&ugrave;i v&agrave; c&oacute; vị b&eacute;o. Nếu bạn kh&ocirc;ng c&oacute; sữa thanh tr&ugrave;ng th&igrave; c&oacute; thể d&ugrave;ng sữa tiệt tr&ugrave;ng để l&agrave;m.</li>\r\n	<li>Tuyệt đối kh&ocirc;ng nấu sữa tươi tr&ecirc;n bếp. Bởi điều n&agrave;y sẽ l&agrave;m mất m&ugrave;i v&agrave; vị b&eacute;o của sữa.</li>\r\n	<li>Tr&agrave; sữa thường rất dễ hỏng n&ecirc;n bạn h&atilde;y bảo quản trong tủ lạnh.</li>\r\n</ul>\r\n\r\n<p>Chỉ cần như vậy l&agrave; bạn đ&atilde; c&oacute; ngay ly tr&agrave; sữa bằng sữa tươi thơm ngon, hấp dẫn để thưởng thức mỗi ng&agrave;y.</p>\r\n\r\n<p>Hiện nay tr&agrave; sữa l&agrave; loại đồ uống được nhiều bạn trẻ y&ecirc;u th&iacute;ch. Tuy nhi&ecirc;n rất nhiều người lu&ocirc;n sợ b&eacute;o khi uống tr&agrave; sữa. V&igrave; thế h&ocirc;m nay Blog Ẩm Thực Việt Nam sẽ mang tới cho bạn c&aacute;ch uống tr&agrave; sữa kh&ocirc;ng bị mập.</p>\r\n\r\n<h2>C&aacute;ch uống tr&agrave; sữa kh&ocirc;ng bị mập</h2>\r\n\r\n<p>Uống tr&agrave; sữa bị b&eacute;o, bị thừa c&acirc;n l&agrave; trường hợp thường gặp của rất nhiều bạn hiện nay. Rất nhiều người cố gắng l&aacute;ch luật bằng c&aacute;ch t&igrave;m ra những&nbsp;<strong>c&aacute;ch uống tr&agrave; sữa kh&ocirc;ng b&eacute;o.</strong><strong>&nbsp;</strong></p>\r\n\r\n<p>Vậy c&aacute;ch uống tr&agrave; sữa kh&ocirc;ng tăng c&acirc;n l&agrave; g&igrave;, c&oacute; thật sự hiệu quả kh&ocirc;ng. Dưới đ&acirc;y sẽ l&agrave; một số tips về c&aacute;ch uống tr&agrave; sữa kh&ocirc;ng tăng c&acirc;n sẽ rất hữu &iacute;ch cho bạn:</p>\r\n\r\n<h3>Giảm bớt lượng đường trong tr&agrave; sữa</h3>\r\n\r\n<p>Giảm lượng đường trong tr&agrave; sữa l&agrave; c&aacute;ch l&agrave;m đầu ti&ecirc;n bạn cần phải l&agrave;m ngay. Nếu kh&ocirc;ng muốn uống loại đồ uống n&agrave;y m&agrave; kh&ocirc;ng b&eacute;o, v&agrave; an to&agrave;n với sức khỏe.</p>\r\n\r\n<p>Đường ch&iacute;nh l&agrave; nguy&ecirc;n nh&acirc;n h&agrave;ng đầu g&acirc;y tăng c&acirc;n v&agrave; l&atilde;o h&oacute;a da cũng như một số căn bệnh nguy hiểm như tiểu đường,&hellip;</p>\r\n\r\n<p>Hiện nay bạn c&oacute; thể &aacute;p dụng c&aacute;c mức đường 30%-50%-70%, h&atilde;y lưu &yacute; mỗi khi thực hiện hoặc gọi tr&agrave; sữa nh&eacute;!</p>\r\n\r\n<h3>Lựa chọn c&aacute;c loại tr&agrave; sữa &iacute;t b&eacute;o</h3>\r\n\r\n<p>Hiện nay c&aacute;c loại tr&agrave; sữa &iacute;t b&eacute;o rất nhiều như tr&agrave; xanh, việt quất, hạt dẻ,&hellip; m&agrave; bạn c&oacute; thể uống mối ng&agrave;y m&agrave; kh&ocirc;ng lo b&eacute;o. Bạn n&ecirc;n tr&aacute;nh c&aacute;c loại tr&agrave; sữa như socola, d&acirc;u, cacao.</p>\r\n\r\n<p><img alt=\"Cách uống trà sữa không béo \" height=\"169\" sizes=\"(max-width: 300px) 100vw, 300px\" src=\"https://amthucblog.com/wp-content/uploads/2020/04/C%C3%A1ch-l%C3%A0m-tr%C3%A0-s%E1%BB%AFa-b%E1%BA%B1ng-s%E1%BB%AFa-t%C6%B0%C6%A1i-t%E1%BA%A1i-nh%C3%A0-300x169.jpg\" srcset=\"https://amthucblog.com/wp-content/uploads/2020/04/Cách-làm-trà-sữa-bằng-sữa-tươi-tại-nhà-300x169.jpg 300w, https://amthucblog.com/wp-content/uploads/2020/04/Cách-làm-trà-sữa-bằng-sữa-tươi-tại-nhà.jpg 600w\" width=\"300\" /></p>\r\n\r\n<p>C&aacute;ch uống tr&agrave; sữa kh&ocirc;ng b&eacute;o</p>\r\n\r\n<p>Ngo&agrave;i ra bạn c&oacute; thể giảm tr&acirc;n ch&acirc;u, topping v&agrave; đặc biệt l&agrave; kem để giảm lượng chất b&eacute;o trong tr&agrave; sữa. &nbsp;Bởi c&aacute;c hạt tr&acirc;n ch&acirc;u c&oacute; th&agrave;nh phần chủ yếu l&agrave; tinh bột lọc, tinh bột sắn, đường c&ocirc; đặc,&hellip; V&igrave; thế bạn kh&ocirc;ng muốn b&eacute;o th&igrave; n&ecirc;n giảm xuống.</p>\r\n\r\n<h3>Thay đổi lựa chọn c&aacute;c loại topping &iacute;t b&eacute;o</h3>\r\n\r\n<p>Một trong những nguy&ecirc;n nh&acirc;n g&acirc;y b&eacute;o l&agrave; topping c&ugrave;ng kem trong tr&agrave; sữa. V&igrave; thế bạn h&atilde;y thay thế ch&uacute;ng bằng một số loại thạch &iacute;t đường như Jelly, tr&acirc;n ch&acirc;u trắng để việc uống tr&agrave; sữa kh&ocirc;ng c&ograve;n lo tăng c&acirc;n nữa.</p>\r\n\r\n<h3>Chọn tr&agrave; sữa size nhỏ thay v&igrave; size to</h3>\r\n\r\n<p>Nếu kh&ocirc;ng thể từ bỏ tr&agrave; sữa th&igrave; bạn h&atilde;y nu&ocirc;ng chiều bản th&acirc;n bằng 1 ly tr&agrave; sữa size b&eacute;.</p>\r\n\r\n<p>Hiện nay, rất nhiều tiệm tr&agrave; sữa đưa ra những ly tr&agrave; sữa &ldquo;size khổng lồ&rdquo;, size bự d&agrave;nh cho 2 người&hellip;. Nhưng bạn h&atilde;y tỉnh t&aacute;o, chọn những ly tr&agrave; sữa size b&eacute; cho bản th&acirc;n. Việc lựa chọn size nhỏ thay v&igrave; lớn sẽ gi&uacute;p bạn giảm lượng đường trong cơ thể. Hạn chế t&igrave;nh trạng dư thừa đường g&acirc;y hại sức khỏe. V&agrave; đặc biệt l&agrave; kh&ocirc;ng sợ b&eacute;o.</p>\r\n\r\n<h3>Kh&ocirc;ng uống tr&agrave; sữa trước khi đi ngủ</h3>\r\n\r\n<p>Uống tr&agrave; sữa buổi tối sẽ rất b&eacute;o, điều n&agrave;y th&igrave; chắc chắn ai cũng biết<strong>.&nbsp;</strong>&nbsp;Bởi việc ăn hay sử dụng đồ uống s&aacute;t giờ ngủ sẽ g&acirc;y t&iacute;ch tụ một lượng mỡ kh&aacute; lớn cho cơ thể, đặc biệt l&agrave; v&ugrave;ng bụng</p>\r\n\r\n<p>Ngo&agrave;i ra th&igrave; việc sử dụng đồ ăn, thức uống v&agrave;o khung giờ n&agrave;y c&ograve;n g&acirc;y tổn thương đến dạ dạy. Uống tr&agrave; sữa trước giờ đi ngủ c&ograve;n dễ g&acirc;y t&igrave;nh trạng đầy bụng, kh&oacute; ti&ecirc;u. L&agrave;m ảnh hưởng đến giấc ngủ.</p>\r\n\r\n<p>Đặc biệt kh&ocirc;ng &iacute;t người đ&atilde; bị &ldquo;say tr&agrave; sữa&rdquo; khi uống. V&agrave; &nbsp;thậm ch&iacute; c&ograve;n l&agrave;m bạn thấy mỏi mệt v&agrave; mất ngủ g&acirc;y ảnh hưởng đến sức khỏe. Bởi lượng đường trong tr&agrave; dung nạp v&agrave;o cơ thể rất lớn.</p>\r\n\r\n<p>Như vậy tr&ecirc;n đ&acirc;y l&agrave; chia sẻ về c&ocirc;ng thức l&agrave;m tr&agrave; sữa bằng sữa tươi d&agrave;nh cho mọi người tham khảo. B&ecirc;n cạnh đ&oacute; cũng l&agrave; bật m&iacute; về c&aacute;ch uống tr&agrave; sữa kh&ocirc;ng b&eacute;o m&agrave; kh&ocirc;ng phải ai cũng biết.</p>\r\n\r\n<p>Hy vọng những chia sẻ tr&ecirc;n đ&acirc;y sẽ gi&uacute;p bạn c&oacute; th&ecirc;m kinh nghiệm. V&agrave; cũng như c&ocirc;ng thức về tr&agrave; sữa để c&oacute; th&ecirc;m loại đồ uống hấp dẫn cho tủ đồ ăn của m&igrave;nh.</p>\r\n\r\n<p>Blog YUMMY ch&uacute;c bạn ngon miệng v&agrave; c&oacute; một sức khỏe tốt c&ugrave;ng với tr&agrave; sữa bằng sữa tươi. Để c&oacute; th&ecirc;m nhiều c&ocirc;ng thức về c&aacute;c m&oacute;n ăn cũng như c&aacute;c loại đồ uống th&igrave; bạn h&atilde;y thường xuy&ecirc;n theo d&otilde;i trang nh&eacute;.</p>', '2020-12-20 10:52:49', '2020-12-21 16:57:36'),
(14, 'Cách làm kim chi su hào Việt Nam tại nhà', '<p>C&aacute;ch l&agrave;m kim chi su h&agrave;o Việt Nam tại nh&agrave; được rất nhiều chị em nội trợ &aacute;p dụng th&agrave;nh c&ocirc;ng. Những miếng kim chi su h&agrave;o gi&ograve;n, ngon v&agrave; cay nồng chắc chắn sẽ khiến bữa cơm gia đ&igrave;nh trở n&ecirc;n ngon miệng hơn. Đặc biệt c&ocirc;ng thức thực hiện cũng đơn giản v&agrave; nhanh ch&oacute;ng, kh&ocirc;ng tốn nhiều thời gian.</p>', 'lp1l_Cách-làm-kim-chi-su-hào.jpg', '<h2>Nguy&ecirc;n liệu l&agrave;m kim chi su h&agrave;o Việt Nam tại nh&agrave;</h2>\r\n\r\n<p>1 kg su h&agrave;o</p>\r\n\r\n<p>Củ cải: Nửa củ</p>\r\n\r\n<p>C&agrave; rốt: Nửa củ</p>\r\n\r\n<p>H&agrave;nh t&acirc;y: Nửa củ</p>\r\n\r\n<p>T&aacute;o : Nửa quả</p>\r\n\r\n<p>H&agrave;nh củ: 3 củ</p>\r\n\r\n<p>Tỏi : 3 củ</p>\r\n\r\n<p>Gừng : 1 củ</p>\r\n\r\n<p>Hoa boa-r&ocirc;: 50g</p>\r\n\r\n<p>Hẹ: 50g</p>\r\n\r\n<p>Cơm nếp: 50g</p>\r\n\r\n<p>Đường trắng: 2 muỗng</p>\r\n\r\n<p>Muối biển th&ocirc;: 1/3 ch&eacute;n</p>\r\n\r\n<p>C&aacute; cơm kh&ocirc;: 30g</p>\r\n\r\n<p>Nước mắm ngon: 60ml</p>\r\n\r\n<p>Ớt bột H&agrave;n Quốc: 1/4 ch&eacute;n</p>\r\n\r\n<p>V&agrave; đặc biệt chị em ch&uacute;ng ta kh&ocirc;ng thể thiếu c&aacute;c dụng cụ l&agrave;m kim chi su h&agrave;o, đ&oacute; l&agrave; dao, b&aacute;t, m&aacute;y xay sinh tố, hũ&hellip;..</p>\r\n\r\n<h2><strong>C&aacute;ch l&agrave;m kim chi su h&agrave;o ngon tại nh&agrave;&nbsp;</strong></h2>\r\n\r\n<p>Kim chi su h&agrave;o sẽ được ho&agrave;n th&agrave;nh chỉ sau 3 bước thực hiện đơn giản như sau :</p>\r\n\r\n<h3>Bước 1: Sơ chế su h&agrave;o l&agrave;m kim chi</h3>\r\n\r\n<p>Bạn phải chọn những củ su h&agrave;o vừa, kh&ocirc;ng qu&aacute; lớn để vừa ngon vừa dễ sơ chế. Su h&agrave;o sẽ được rửa sạch, gọt vỏ v&agrave; cắt th&agrave;nh những miếng vu&ocirc;ng nhỏ v&agrave; để r&aacute;o nước. Tiếp tục cho muối v&agrave;o nước sạch để ng&acirc;m su h&agrave;o trong khoảng 30 ph&uacute;t. Sau khi ng&acirc;m xong. H&atilde;y vớt su h&agrave;o ra v&agrave; xả với nước sạch thật kỹ để loại bỏ muối cũng như tạp chất.</p>\r\n\r\n<p><img alt=\"Cách làm kim chi su hào ngon nhất\" height=\"300\" sizes=\"(max-width: 300px) 100vw, 300px\" src=\"https://amthucblog.com/wp-content/uploads/2020/05/C%C3%A1ch-l%C3%A0m-kim-chi-su-h%C3%A0o-ngon-nh%E1%BA%A5t-300x300.jpg\" srcset=\"https://amthucblog.com/wp-content/uploads/2020/05/Cách-làm-kim-chi-su-hào-ngon-nhất-300x300.jpg 300w, https://amthucblog.com/wp-content/uploads/2020/05/Cách-làm-kim-chi-su-hào-ngon-nhất-150x150.jpg 150w, https://amthucblog.com/wp-content/uploads/2020/05/Cách-làm-kim-chi-su-hào-ngon-nhất.jpg 498w\" width=\"300\" /></p>\r\n\r\n<p>C&aacute;ch l&agrave;m kim chi su h&agrave;o ngon nhất</p>\r\n\r\n<h3><strong>Bước 2: Sơ chế nguy&ecirc;n liệu l&agrave;m kim chi&nbsp;</strong></h3>\r\n\r\n<p>C&aacute;c nguy&ecirc;n liệu l&agrave;m kim chi sẽ được đem đi sửa sạch để loại bỏ bụi bẩn v&agrave; bắt đầu sơ chế:</p>\r\n\r\n<p>&ndash; C&agrave; rốt v&agrave; củ cải gọt vỏ v&agrave; mang đi b&agrave;o sợi.</p>\r\n\r\n<p>&ndash; Gừng, h&agrave;nh củ v&agrave; tỏi lột bỏ vỏ</p>\r\n\r\n<p>&ndash; T&aacute;o v&agrave; h&agrave;nh t&acirc;y gọt bỏ vỏ v&agrave; th&aacute;i miếng nhỏ.</p>\r\n\r\n<p>&ndash; T&ocirc;m tươi sẽ được hấp, &nbsp;v&agrave; &nbsp;loại bỏ vỏ, bạn chỉ lấy phần thịt</p>\r\n\r\n<p>-C&aacute; cơm, t&ocirc;m sẽ được cho v&agrave;o nồi c&ugrave;ng nước v&agrave; gừng để ninh chung trong khoảng 30 ph&uacute;t.</p>\r\n\r\n<p>Cuối c&ugrave;ng bạn cho tất cả c&aacute;c nguy&ecirc;n liệu n&agrave;y v&agrave;o m&aacute;y xay sinh tố c&ugrave;ng với cơm nếp, nước mắm, đường rồi xay nhuyễn.</p>\r\n\r\n<h3><strong>Bước 3: Muối kim chi su h&agrave;o&nbsp;</strong></h3>\r\n\r\n<p>Đầu ti&ecirc;n bạn h&atilde;y d&ugrave;ng 1 c&aacute;i t&ocirc; sạch, lớn, trộn đều củ cải, c&agrave; rốt b&agrave;o sợi c&ugrave;ng h&agrave;nh boa-r&ocirc; đ&atilde; cắt kh&uacute;c l&aacute; hẹ v&agrave; hỗn hợp gia vị tr&ecirc;n với nhau. Bạn trộn đều tay sau đ&oacute; dừng lại cho th&ecirc;m ớt bột v&agrave; tiếp tục trộn. L&uacute;c n&agrave;o thấy đ&atilde; đều th&igrave; nghỉ tay v&agrave; cho hỗn hợp tr&ecirc;n v&agrave;o lọ thủy tinh v&agrave; đậy k&iacute;n nắp. Kim chi củ cải sẽ sử dụng được sau 3 ng&agrave;y l&ecirc;n men.</p>\r\n\r\n<p>Hiện nay kim chi đang l&agrave; m&oacute;n ăn được rất nhiều người y&ecirc;u th&iacute;ch. V&agrave; đ&acirc;y cũng ch&iacute;nh l&agrave; một thứ h&agrave;ng h&oacute;a kinh doanh &ldquo;cực đắt&rdquo; của c&aacute;c b&agrave; mẹ bỉm sữa. Tuy nhi&ecirc;n nhiều người vẫn thắc mắc rằng kinh doanh kim chi c&oacute; mang lại lợi nhuận kh&ocirc;ng?. Để biết điều n&agrave;y, bạn h&atilde;y c&ugrave;ng Blog Ẩm Thực Việt Nam t&igrave;m hiểu &nbsp;qua chia sẻ sau nh&eacute;.</p>\r\n\r\n<h2>Kinh doanh kim chi su h&agrave;o c&oacute; lợi nhuận kh&ocirc;ng ?</h2>\r\n\r\n<p>Trong nhiều năm gần đ&acirc;y, ch&uacute;ng ta kh&ocirc;ng thể phủ nhận được &rdquo; sức hấp dẫn&rdquo; của kim chi đối với người d&acirc;n Việt Nam. Đặc biệt l&agrave; giới trẻ. Kim chi được b&agrave;y b&aacute;n rất phổ biến tại c&aacute;c si&ecirc;u thị, nh&agrave; h&agrave;ng. Tuy nhi&ecirc;n gi&aacute; th&agrave;nh cao. V&igrave; thế kim chi online giao h&agrave;ng tận nơi được xem l&agrave; sự chọn lựa của nhiều người.</p>\r\n\r\n<p>Vậy kinh doanh kim chi c&oacute; mang lại lợi nhuận lớn kh&ocirc;ng ?. C&acirc;u trả lời d&agrave;nh cho bạn l&agrave; c&oacute;. Bởi theo chia sẻ của một số bạn trẻ kinh doanh m&oacute;n ăn n&agrave;y th&igrave; : Một người &nbsp;trung b&igrave;nh b&aacute;n được 20 kg kim chi/ 1 ng&agrave;y, 1kg sẽ c&oacute; gi&aacute; l&agrave; 70.000 đồng. C&ograve;n những ng&agrave;y lễ tết th&igrave; c&oacute; thể l&ecirc;n đến gấp đ&ocirc;i. C&oacute; thể thấy nhu cầu sử dụng m&oacute;n ăn n&agrave;y rất lớn. V&agrave; nếu như vậy th&igrave; trừ chi ph&iacute; nguy&ecirc;n liệu th&igrave; bạn sẽ c&ograve;n được tầm 7 đến 8 triệu đồng / 1 th&aacute;ng.</p>\r\n\r\n<p><img alt=\"Cách làm kim chi su hào ngon nhất tại nhà\" height=\"210\" src=\"https://amthucblog.com/wp-content/uploads/2020/05/C%C3%A1ch-l%C3%A0m-kim-chi-su-h%C3%A0o-ngon-nh%E1%BA%A5t-t%E1%BA%A1i-nh%C3%A0.jpg\" width=\"240\" /></p>\r\n\r\n<p>C&aacute;ch l&agrave;m kim chi su h&agrave;o ngon nhất tại nh&agrave;</p>\r\n\r\n<p>Tuy nhi&ecirc;n bạn cũng cần lưu &yacute; như sau: H&atilde;y l&agrave;m kim chi bớt cay lại để ph&ugrave; hợp với khẩu vị của người Việt. Đồng thời l&agrave;m theo y&ecirc;u cầ của kh&aacute;ch h&agrave;ng nếu c&oacute; đơn h&agrave;ng lớn. Đặc biệt l&agrave; phải giao h&agrave;ng tận nơi nh&eacute;. V&agrave; c&ugrave;ng đừng qu&ecirc;n c&oacute; ưu đ&atilde;i d&agrave;nh cho c&aacute;c kh&aacute;ch h&agrave;ng quen thuộc hay mua số lượng nhiều.</p>\r\n\r\n<h2>Bật m&iacute; c&aacute;ch kinh doanh kim chi su h&agrave;o&nbsp; 100% th&agrave;nh c&ocirc;ng</h2>\r\n\r\n<p>Kh&ocirc;ng &iacute;t người khởi nghiệp kinh doanh kim chi thất bại. &nbsp;V&igrave; thế Blog Ẩm Thực Việt Nam sẽ chỉ cho bạn những b&iacute; quyết gi&uacute;p kinh doanh kim chi th&agrave;nh c&ocirc;ng 100%.</p>\r\n\r\n<h3>&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c định đối tượng kh&aacute;ch h&agrave;ng mua kim chi su h&agrave;o</h3>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng tiềm năng của bạn sẽ l&agrave; c&aacute;c bạn trẻ, từ học sinh, sinh vi&ecirc;n đến nh&acirc;n vi&ecirc;n văn ph&ograve;ng. V&agrave; b&ecirc;n cạnh đ&oacute; cũng đừng qu&ecirc;n những người từng thưởng thức m&oacute;n ăn H&agrave;n Quốc, y&ecirc;u th&iacute;ch đất nước n&agrave;y hay l&agrave; c&oacute; sự ảnh hưởng từ l&agrave;n s&oacute;ng Hallyu. Đ&acirc;y sẽ l&agrave; những vị kh&aacute;ch VIP của bạn đấy.</p>\r\n\r\n<h3>&ndash; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Quảng c&aacute;o kim chi su h&agrave;o</h3>\r\n\r\n<p>Nhiều người kinh doanh kim chi lựa chọn facebook, Zalo l&agrave; nơi tiếp thị sản phẩm đến với người ti&ecirc;u d&ugrave;ng. Tuy nhi&ecirc;n, để mọi người ch&uacute; &yacute; đến sản phẩm của bạn. Bạn n&ecirc;n đăng tải những h&igrave;nh ảnh, video đẹp mắt, hợp vệ sinh v&agrave; an to&agrave;n. Như thế kim chi của bạn sẽ l&agrave; lựa chọn tin cậy của rất nhiều người.</p>\r\n\r\n<h3>&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thu thập những phản hồi từ kh&aacute;ch h&agrave;ng</h3>\r\n\r\n<p>C&aacute;c phản hồi hay c&ograve;n gọi l&agrave; feedback từ kh&aacute;ch h&agrave;ng sẽ l&agrave; một trong những yếu tố tăng t&iacute;nh tin cậy cho sản phẩm của bạn. Bởi &nbsp;yếu tố n&agrave;y ảnh hưởng rất lớn đến t&acirc;m l&yacute; người mua h&agrave;ng. Bạn c&oacute; thể tiến h&agrave;nh thu thập v&agrave; đăng tải thường xuy&ecirc;n phản hồi của những người đ&atilde; mua sản phẩm của bạn để để tăng t&iacute;nh thuyết phục cho thương hiệu kim chi tự l&agrave;m.</p>\r\n\r\n<p>Như vậy tr&ecirc;n đ&acirc;y l&agrave; c&aacute;ch l&agrave;m kim chi h&agrave;nh l&aacute; v&agrave; chia sẻ b&iacute; quyết kinh doanh kim chi cho c&aacute;c chị em c&ugrave;ng t&igrave;m hiểu. Hy vọng b&agrave;i viết h&ocirc;m nay của Blog YUMMY kh&ocirc;ng chỉ mang tới cho cả nh&agrave; một m&oacute;n ăn ngon m&agrave; c&ograve;n gi&uacute;p chị em c&oacute; th&ecirc;m nguồn thu nhập mới.</p>\r\n\r\n<p>Ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng !</p>', '2020-12-20 10:57:12', '2020-12-20 10:57:12'),
(15, 'TOP 10 món ăn đặc sản ngon nhất ở Lạng Sơn, ngon lắm :)', '<p>Lạng Sơn được biết đến kh&ocirc;ng chỉ l&agrave; một v&ugrave;ng đất c&oacute; bề d&agrave;y truyền thống lịch sử, văn h&oacute;a, nhiều danh lam thắng cảnh m&agrave; n&oacute; c&ograve;n l&agrave; một v&ugrave;ng đất với rất nhiều m&oacute;n ăn ngon, đậm đ&agrave; hương vị qu&ecirc; hương.</p>', 'fYgF_Đêm_Lạng_Sơn.jpg', '<p>B&agrave;i viết n&agrave;y sẽ tổng hợp lại TOP 10 m&oacute;n ăn ngon nhất ở Lạng Sơn để c&aacute;c bạn c&oacute; những gợi &yacute; về ẩm thực khi đến với v&ugrave;ng đất n&agrave;y. Ok, let&rsquo;s go !</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>#1. B&aacute;nh Ngải</strong></h3>\r\n\r\n<p>B&aacute;nh ngải l&agrave; một trong những đặc sản của người T&agrave;y ở Lạng Sơn. B&aacute;nh Ngải được l&agrave;m từ ngải cứu, một loại thuốc v&agrave; cũng l&agrave; một loại thực phẩm gi&agrave;u gi&aacute; trị dinh dưỡng.</p>\r\n\r\n<p>L&aacute; ngải được kết hợp với c&aacute;c nguy&ecirc;n liệu đơn giản như m&egrave; đen, dầu ăn, dừa kh&ocirc;, gạo nếp nương, đường đỏ, đậu phộng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (2)\" height=\"339\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-2.jpg\" width=\"625\" /></p>\r\n\r\n<p>L&aacute; ngải cứu được cho v&agrave;o nồi nấu c&ugrave;ng nước tro bếp từ 2 &ndash; 3 giờ. Khi l&aacute; ngải nhừ sẽ được lấy ra v&agrave; rửa sạch nước tro, bỏ phần g&acirc;n v&agrave; cuống, sau đ&oacute; gi&atilde; nhỏ v&agrave; nặn th&agrave;nh từng vi&ecirc;n l&aacute; ngải.</p>\r\n\r\n<p>Gạo nếp được nấu th&agrave;nh x&ocirc;i dẻo v&agrave; gi&atilde; nhuyễn c&ugrave;ng với l&aacute; ngải khi x&ocirc;i c&ograve;n n&oacute;ng, rồi nặn th&agrave;nh b&aacute;nh l&aacute; ngải. Phần nh&acirc;n b&aacute;nh l&agrave; hỗn hợp của m&egrave; đen, đậu ph&ocirc;ng đ&atilde; rang ch&iacute;n, c&ugrave;ng với đường đỏ v&agrave; dừa kh&ocirc; trộn đều v&agrave;o nhau.</p>\r\n\r\n<p>Bước cuối c&ugrave;ng l&agrave; đem b&aacute;nh đi hấp c&aacute;ch thủy, chỉ cần hấp khoảng 5 ph&uacute;t tr&ecirc;n nước s&ocirc;i l&agrave; được. B&aacute;nh ngải được l&agrave;m từ gạo nếp nhưng rất dễ ăn, m&aacute;t, kh&ocirc;ng bị ngấy đ&acirc;u nha c&aacute;c bạn.</p>\r\n\r\n<p>B&aacute;nh c&oacute; m&ugrave;i thơm, dẻo của gạo nếp, vị đặc trưng của l&aacute; ngải cứu, vị ngọt của đường v&agrave; m&ugrave;i thơm của hạt vừng h&ograve;a quyện v&agrave;o nhau, tạo n&ecirc;n một m&oacute;n b&aacute;nh đặc sản của người T&agrave;y ở Lạng Sơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>#2. B&aacute;nh cuốn trứng</strong></h3>\r\n\r\n<p>B&aacute;nh cuốn trứng l&agrave; một trong những m&oacute;n ăn đặc sản kh&ocirc;ng thể bỏ qua khi đến với Lạng Sơn. N&oacute; c&oacute; sự kết hợp đặc biệt giữa b&aacute;nh cuốn c&ugrave;ng trứng m&agrave; kh&ocirc;ng ở nơi n&agrave;o c&oacute; được.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (1)\" height=\"443\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-1.png\" width=\"690\" /></p>\r\n\r\n<p>Về cơ bản th&igrave; m&oacute;n b&aacute;nh cuốn trứng n&agrave;y kh&aacute;c b&aacute;nh cuốn th&ocirc;ng thường ở điểm l&agrave; khi tr&aacute;ng b&aacute;nh th&igrave; người chế biến sẽ cho quả trứng v&agrave;o giữa v&agrave; gấp dần b&aacute;nh lại để &ocirc;m trọn lấy l&ograve;ng đỏ trứng ở b&ecirc;n trong.</p>\r\n\r\n<p>V&agrave; một điểm kh&aacute;c nữa l&agrave; ở nước d&ugrave;ng. Nước d&ugrave;ng của b&aacute;nh cuốn trứng kh&ocirc;ng phải nước mắm pha như th&ocirc;ng thường, m&agrave; n&oacute; bao gồm một ch&uacute;t thịt xay rang kh&ocirc; v&agrave; b&ocirc;ng l&ecirc;n, rắc th&ecirc;m ch&uacute;t rau m&ugrave;i th&aacute;i nhỏ rồi mới r&oacute;t th&ecirc;m nước mắm chấm, mỡ, h&agrave;nh pha vừa vị..</p>\r\n\r\n<p>B&aacute;nh cuốn trứng đặc trưng bởi nh&acirc;n trứng g&agrave; thơm ngậy b&ecirc;n trong b&aacute;nh, c&ugrave;ng với nước chấm lạ miệng rất thơm ngon.</p>\r\n\r\n<p>Khi ăn, phần nh&acirc;n trứng sẽ tan chảy trong miệng, cảm gi&aacute;c rất ngậy v&agrave; b&ugrave;i nhờ ăn k&egrave;m gia vị v&agrave; nước chấm đậm đ&agrave;. Đến với Lạng Sơn m&agrave; kh&ocirc;ng thưởng thức m&oacute;n b&aacute;nh cuốn trứng l&agrave; một thiếu x&oacute;t lớn đấy nha c&aacute;c bạn ◉◡◉</p>\r\n\r\n<h3><strong>#3. Kh&acirc;u nhục Lạng Sơn</strong></h3>\r\n\r\n<p>Kh&acirc;u nhục bắt nguồn từ Trung Quốc v&agrave; được du nhập v&agrave;o Việt Nam qua sự biết tấu của người d&acirc;n tộc T&agrave;u, N&ugrave;ng v&agrave; theo thời gian, n&oacute; đ&atilde; chiếm được cảm t&igrave;nh trong l&ograve;ng thực kh&aacute;ch v&agrave; trở th&agrave;nh m&oacute;n ăn đặc sản nổi tiếng của Lạng Sơn.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (9)\" height=\"390\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-9.jpg\" width=\"599\" /></p>\r\n\r\n<p>Kh&acirc;u nhục g&acirc;y ch&uacute; &yacute; ngay từ c&aacute;i t&ecirc;n lạ tai. N&oacute; xuất ph&aacute;t từ phi&ecirc;n &acirc;m tiếng Hoa: &ldquo;kh&acirc;u&rdquo; c&oacute; nghĩa l&agrave; hấp đến mềm gục, c&ograve;n &ldquo;nhục&rdquo; c&oacute; nghĩa l&agrave; thịt =&gt; &ldquo;kh&acirc;u nhục&rdquo; c&oacute; thể hiểu l&agrave; &ldquo;thịt được hấp nhừ&rdquo;.</p>\r\n\r\n<p>Nguy&ecirc;n liệu ch&iacute;nh để l&agrave;m n&ecirc;n m&oacute;n Kh&acirc;u nhục l&agrave; thịt ba chỉ được cắt th&agrave;nh miếng to khoảng 0.5kg.</p>\r\n\r\n<p>Thịt được luộc sơ qua cho vừa ch&iacute;n tới, rồi tẩm gia vị gồm giấm, x&igrave; dầu để thịt c&oacute; m&agrave;u b&oacute;ng mượt bắt mắt, rồi lấy tăm tre chọc s&acirc;u l&ecirc;n lớp b&igrave;, mục đ&iacute;ch l&agrave; để b&igrave; để tăng khả năng hấp thụ nước cho mềm.</p>\r\n\r\n<p>Sau đ&oacute; thịt được quay, vừa quay vừa qu&eacute;t mật ong rừng cho v&agrave;ng b&igrave;. B&ecirc;n cạnh thịt ba chỉ th&igrave; c&ograve;n c&oacute; th&ecirc;m khoai m&ocirc;n chi&ecirc;n gi&ograve;n, c&ugrave;ng với rau muối mặn băm nhỏ =&gt; trộn đều với tương đen, x&igrave; dầu v&agrave; h&uacute;ng l&igrave;u, tỏi.</p>\r\n\r\n<p>Cuối c&ugrave;ng, thịt được hấp c&aacute;ch thủy khoang 3 &ndash; 4 giờ cho thịt ch&iacute;n nhừ, mềm sụn l&agrave; được.</p>\r\n\r\n<p>Kh&acirc;u nhục ăn c&ugrave;ng cơm trắng hoặc x&ocirc;i l&agrave; ngon nhất. Thịt lợn ngọt mềm c&ugrave;ng lớp b&igrave; v&agrave;ng rộm ngon mắt, m&ugrave;i thơm ng&agrave;o ngạt của m&oacute;n ăn n&agrave;y đảm bảo sẽ đ&aacute;nh thức vị gi&aacute;c của mọi thực kh&aacute;ch.</p>\r\n\r\n<p>Kh&acirc;u nhục l&agrave;m ra cần một qu&aacute; tr&igrave;nh d&agrave;y c&ocirc;ng, v&igrave; vậy m&agrave; n&oacute; cũng đem đến một vị ngon xứng đ&aacute;ng với vị tr&iacute; đặc sản của Lạng Sơn.</p>\r\n\r\n<p>Nhược điểm duy nhất của m&oacute;n ăn n&agrave;y l&agrave; rất tốn cơm, ăn ch&eacute;n thứ 2 rồi lại muốn th&ecirc;m v&agrave;i ch&eacute;n nữa :)) mệt lắm ᵔᴥᵔ</p>\r\n\r\n<h3><strong>#4. Lợn quay</strong></h3>\r\n\r\n<p>Lợn quay l&agrave; một m&oacute;n ăn đặc sản của Lạng Sơn, kh&ocirc;ng chỉ ngon m&agrave; n&oacute; c&ograve;n m&agrave; mang hương vị rất ri&ecirc;ng của xứ Lạng, phải qua c&aacute;c bước chế biến kh&aacute; cầu kỳ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (7)\" height=\"350\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-7.jpg\" width=\"500\" /></p>\r\n\r\n<p>Hương vị ri&ecirc;ng ấy c&oacute; được l&agrave; do l&aacute; mắc mật được nhồi v&agrave;o bụng lợn, một b&iacute; quyết để l&aacute; mắc mật dậy m&ugrave;i thơm đ&oacute; l&agrave; sau khi rửa sạch v&agrave; để r&aacute;o nước, l&aacute; mắc mật sẽ được trụng sơ qua nước n&oacute;ng.</p>\r\n\r\n<p>Gia vị được s&aacute;t v&agrave;o bụng lợn gồm quả mắc mật đ&atilde; được ng&acirc;m, muối v&agrave; bột ngọt, sau đ&oacute; nhồi th&ecirc;m l&aacute; mắc mật rồi kh&acirc;u k&iacute;n lại. Trước khi quay, hỗn hợp giấm v&agrave; mật ong được pha theo tỉ lệ vừa phải sẽ được miết thật đều l&ecirc;n da lợn.</p>\r\n\r\n<p>Thịt lợn quay Lạng Sơn với m&agrave;u sắc rất bắt mắt, hương thơm hấp dẫn. Cắn một miếng thịt lợn quay (ngập răng), thực kh&aacute;ch c&oacute; thể cảm nhận đươc vị ngọt của thịt, vị thơm của l&aacute;, quả mắc mật.</p>\r\n\r\n<p>Miếng thịt được tẩm ướp đậm đ&agrave;, thơm ngon khiến mọi thực kh&aacute;ch phải cảm th&aacute;n khi thưởng thức. Nh&igrave;n th&ocirc;i đ&atilde; thấy th&egrave;m nhỏ d&atilde;i rồi ◔◡◔</p>\r\n\r\n<h3><strong>#5. B&aacute;nh cao sằng</strong></h3>\r\n\r\n<p>B&aacute;nh cao sằng l&agrave; một đặc sản xứ Lạng, rất được người Hoa ưa chuộng. N&oacute; mang đầy đủ tinh hoa của sự kết hợp giữa ẩm thực Trung Hoa (một nền ẩm thực c&oacute; bề d&agrave;y truyền thống) v&agrave; ẩm thực Việt Nam.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (1)\" height=\"400\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-1.jpg\" width=\"683\" /></p>\r\n\r\n<p>Gạo sau khi ng&acirc;m th&igrave; đem xay th&agrave;nh bột, cho th&ecirc;m &iacute;t bột lọc để tạo độ trong cho b&aacute;nh, rồi nh&agrave;o bột cho nhuyễn nhưng kh&ocirc;ng được để bột qu&aacute; nh&atilde;o.</p>\r\n\r\n<p>Sao đ&oacute;, bột được đổ v&agrave;o khu&ocirc;n v&agrave; hấp c&aacute;ch thủy, khi b&aacute;nh gần ch&iacute;n th&igrave; dưới nước thịt kho dừa đặc l&ecirc;n tr&ecirc;n để tạo vị b&eacute;o ngậy cho b&aacute;nh.</p>\r\n\r\n<p>Phần nh&acirc;n b&aacute;nh l&agrave; thịt lợn băm nhỏ, ướp gia vị, h&agrave;nh củ xắt nhuyễn rồi cho v&agrave;o chảo đến khi thơm rồi cho thịt&nbsp; x&agrave;o săn.</p>\r\n\r\n<p>Khi ăn, b&aacute;nh cao sằng thường được ăn k&egrave;m với rau sống, bạn c&oacute; thể th&ecirc;m ch&uacute;t ớt v&agrave; nước d&ugrave;ng ri&ecirc;ng nếu muốn.</p>\r\n\r\n<p>B&aacute;nh c&oacute; độ dai, dẻo, thơm ngon của thịt lợn c&ugrave;ng c&aacute;c gia vị đ&atilde; được tẩm ướp tạo n&ecirc;n một m&oacute;n b&aacute;nh v&ocirc; c&ugrave;ng ngon, bổ dưỡng, mang đến một hương vị ri&ecirc;ng của v&ugrave;ng đất Lạng Sơn.</p>\r\n\r\n<h3><strong>#6. Vịt quay</strong></h3>\r\n\r\n<p>N&oacute;i đến ẩm thực Lạng Sơn l&agrave; phải kể đến m&oacute;n vịt quay ngon nức tiếng. Vịt quay Lạng Sơn đ&ograve;i hỏi người đầu bếp phải tỉ mỉ trong c&aacute;c kh&acirc;u l&agrave;m vịt.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (6)\" height=\"465\" sizes=\"(max-width: 686px) 100vw, 686px\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-6.jpg\" srcset=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-6.jpg 686w, https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-6-110x75.jpg 110w\" width=\"686\" /></p>\r\n\r\n<p>Ban đầu, vịt sau khi được l&agrave;m sạch l&ocirc;ng sẽ được tẩm ướp hương liệu, h&agrave;nh, sả, hạt ti&ecirc;u, quả m&oacute;c mật, nhồi v&agrave;o trong bụng v&agrave; kh&acirc;u lại.</p>\r\n\r\n<p>Phần da b&ecirc;n ngo&agrave;i th&igrave; tẩm mật ong v&agrave; để khoảng 10 ph&uacute;t cho ngấm đều gia vị, rồi vịt sẽ được quay tr&ecirc;n bếp than hoa l&agrave; ngon nhất.</p>\r\n\r\n<p>Một phần rất quan trọng với m&oacute;n vịt quay Lạng Sơn n&agrave;y đ&oacute; l&agrave; phần nước chấm được l&agrave;m cũng rất cầu k&igrave;.</p>\r\n\r\n<p>Trước ti&ecirc;n, nước tương xay được cho ra b&aacute;t c&ugrave;ng một ch&uacute;t đường, nước lọc rồi khuấy đều tạo th&agrave;nh hỗn hợp đồng nhất.</p>\r\n\r\n<p>Bột năng được khuấy đều với nước để kh&ocirc;ng bị v&oacute;n cục. H&agrave;nh, tỏi được phi thơm, cho nước tương vừa sơ chế ở tr&ecirc;n v&agrave;o đun đến khi s&ocirc;i th&igrave; nhỏ lửa xuống.</p>\r\n\r\n<p>Đến khi nước tương chuyển m&agrave;u th&igrave; bột năng được cho từ từ v&agrave;o, đun đến khi hỗn&nbsp; sền sệt l&agrave; được. Để nước chấm c&oacute; độ ngậy, người ta cho th&ecirc;m mỡ vịt quay v&agrave;o v&agrave; khuấy đều, khi nguội cũng c&oacute; thể vắt th&ecirc;m nước cốt chanh.</p>\r\n\r\n<p>Vịt quay Lạng Sơn c&oacute; lớp da m&agrave;u v&agrave;ng ươm, nh&igrave;n rất bắt mắt, ăn k&egrave;m với một số loại rau thơm sẽ c&agrave;ng l&agrave;m m&oacute;n ăn th&ecirc;m hấp dẫn.</p>\r\n\r\n<p>Thịt vịt thơm ngon kết hợp với nước chấm đậm đ&agrave; được pha k&igrave; c&ocirc;ng như vậy tạo n&ecirc;n một m&oacute;n ăn l&agrave;m say đắm l&ograve;ng người. C&oacute; th&ecirc;m chai bia nữa th&igrave; đ&uacute;ng l&agrave;, qu&ecirc;n đường về lu&ocirc;n &nbsp;(&gt;‿◠)✌</p>\r\n\r\n<h3><strong>#7. Cơm lam Bắc Sơn</strong></h3>\r\n\r\n<p>Nhắc đến cơm lam, ch&uacute;ng ta thường nghĩ ngay tới một số nơi như H&ograve;a B&igrave;nh, Sơn La, Cao Bằng,&hellip; m&agrave; kh&ocirc;ng nhớ đến Bắc Sơn, Lạng Sơn. Cơm lam của d&acirc;n tộc T&agrave;y nơi đ&acirc;y c&oacute; c&aacute;i hương vị đậm đ&agrave; rất ri&ecirc;ng v&agrave; kh&oacute; qu&ecirc;n.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (5)\" height=\"489\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-5.jpg\" width=\"633\" /></p>\r\n\r\n<p>C&aacute;ch l&agrave;m th&igrave; cũng giống như cơm lam ở những khu vực kh&aacute;c th&ocirc;i: gạo được cho v&agrave;o ống tre c&ugrave;ng với nước v&agrave; đem đi nướng.</p>\r\n\r\n<p>Nhưng c&aacute;i hương vị ri&ecirc;ng của cơm lam Bắc Sơn đến từ việc họ trộn lạc với gạo nếp, sau đ&oacute; n&eacute;n v&agrave;o ống tre, sau khi n&eacute;n chặt gạo v&agrave; cho nước v&agrave;o, họ lấy l&aacute; mắc mật để n&uacute;t chặt đầu ống lại.</p>\r\n\r\n<p>V&igrave; vậy m&agrave; khi cơm ch&iacute;n sẽ c&oacute; m&ugrave;i ngầy ngậy của nếp c&ugrave;ng với m&ugrave;i b&eacute;o của lạc v&agrave; hương nồng của l&aacute; mắc mật. Cơm lam Bắc Sơn đem đến cho thực kh&aacute;ch hương vị của l&agrave;ng qu&ecirc;, một hương vị kh&oacute; qu&ecirc;n sau lần đầu thưởng thức.</p>\r\n\r\n<p>Đến với Bắc Sơn,&nbsp; bạn h&atilde;y d&agrave;nh ch&uacute;t thời gian để thưởng thức m&oacute;n cơm lam đặc biệt n&agrave;y nh&eacute;.</p>\r\n\r\n<h3><strong>#8. B&aacute;nh chưng đen</strong></h3>\r\n\r\n<p>B&aacute;nh chưng đen l&agrave; m&oacute;n ăn truyền thống kh&ocirc;ng thể thiếu của d&acirc;n tộc T&agrave;y trong dịp Tết. Gọi l&agrave; b&aacute;nh chưng nhưng n&oacute; kh&ocirc;ng c&oacute; h&igrave;nh vu&ocirc;ng như b&aacute;nh chưng th&ocirc;ng thường, m&agrave; n&oacute; c&oacute; h&igrave;nh tr&ograve;n giống như b&aacute;nh t&eacute;t hơn.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (8)\" height=\"390\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-8.jpg\" width=\"450\" /></p>\r\n\r\n<p>Phần nh&acirc;n của b&aacute;nh chưng đen gồm c&oacute; gạo nếp trộn với tro mịn để tạo m&agrave;u đen cho b&aacute;nh, thịt lợn th&aacute;i mỏng, ướp gia vị, đậm xanh được ng&acirc;m qua đ&ecirc;m, gi&atilde; nhuyễn, ướp c&ugrave;ng ti&ecirc;u, thảo quả kh&ocirc; được nướng cho thơm lừng rồi gi&atilde; nhỏ trộn v&agrave;o thịt c&ugrave;ng với ti&ecirc;u v&agrave; bột ớt.</p>\r\n\r\n<p>Sau đ&oacute;, b&aacute;nh được g&oacute;i v&agrave; luộc trong v&ograve;ng 8 &ndash; 10 tiếng đồng hồ. Sau khi luộc xong khoảng 4 &ndash; 5 tiếng th&igrave; b&aacute;nh được vớt ra v&agrave; để r&aacute;o nước.</p>\r\n\r\n<p>Khi b&oacute;c b&aacute;nh ra, b&aacute;nh c&oacute; m&agrave;u đen b&oacute;ng rất đẹp mắt, c&oacute; m&ugrave;i thơm của h&agrave;nh mỡ, hạt ti&ecirc;u v&agrave; m&ugrave;i l&aacute; dong.</p>\r\n\r\n<p>Ăn một miếng b&aacute;nh chưng đen, bạn sẽ cảm nhận được m&ugrave;i vị thơm nức của nh&acirc;n đậu xanh, thịt mỡ c&ugrave;ng với thảo quả v&agrave; phần gạo dai, dẻo.. tạo n&ecirc;n một hương vị ng&acirc;y ngất l&ograve;ng người.</p>\r\n\r\n<p>B&aacute;nh chưng đen thật xứng đ&aacute;ng khi l&agrave; m&oacute;n ăn truyền thống trong những ng&agrave;y Tết của d&acirc;n tộc T&agrave;y ở Lạng Sơn.</p>\r\n\r\n<h3><strong>#9. Phở chua</strong></h3>\r\n\r\n<p>Phở chua cũng l&agrave; m&oacute;n ăn đặc sản Lạng Sơn, được biết đến l&agrave; một m&oacute;n ăn kh&aacute; cầu k&igrave; trong kh&acirc;u chế biến. Gọi l&agrave; phở chua đơn giản l&agrave; v&igrave; nước d&ugrave;ng, nước sốt l&agrave;m từ giấm n&ecirc;n cho vị chua.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (4)\" height=\"447\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-4.jpg\" width=\"679\" /></p>\r\n\r\n<p>Phở chua gồm hai phần l&agrave; phần kh&ocirc; v&agrave; phần nước sốt. Phần kh&ocirc; l&agrave; hỗn hợp trộn đều của rất nhiều nguy&ecirc;n liệu được chế biến k&igrave; c&ocirc;ng như: b&aacute;nh phở được trần qua, khoai lang sợi chi&ecirc;n gi&ograve;n, thịt x&aacute; x&iacute;u, đậu phộng rang, th&ecirc;m một số loại rau ăn k&egrave;m.</p>\r\n\r\n<p>Thứ l&agrave;m b&ugrave;ng vị của m&oacute;n ăn n&agrave;y l&agrave; phần nước sốt, ban đầu, cho v&agrave;o chảo ch&uacute;t nước, đường, dầu h&agrave;o, nước tương, mắm, giấm v&agrave; đun l&ecirc;n. Đồng thời khuấy đều một b&aacute;t nước với bột năng rồi cho v&agrave;o chảo nước sốt vừa l&agrave;m.</p>\r\n\r\n<p>Phở chua được trang tr&iacute; rất đẹp mắt, k&iacute;ch th&iacute;ch vị gi&aacute;c của mọi thực kh&aacute;ch. Nước sốt đậm đ&agrave;, c&oacute; vị chua đặc trưng h&ograve;a quyện với vị ngọt của những l&aacute;t thịt &aacute;o chảo, độ gi&ograve;n của khoai lang chi&ecirc;n v&agrave; b&ugrave;i b&ugrave;i của đậu phộng rang khiến bạn sẽ phải cảm th&aacute;n m&agrave; th&ocirc;i.</p>\r\n\r\n<h3><strong>#10. B&aacute;nh &aacute;p chao</strong></h3>\r\n\r\n<p>B&aacute;nh &aacute;p chao l&agrave; một m&oacute;n b&aacute;nh c&oacute; c&aacute;i t&ecirc;n lạ lẫm với nhiều người, tuy nhi&ecirc;n đ&acirc;y l&agrave; một đặc sản của v&ugrave;ng đất xứ Lạng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"mon-an-dac-san-o-lang-son (3)\" height=\"438\" src=\"https://blogchiasekienthuc.com/wp-content/uploads/2020/11/mon-an-dac-san-o-lang-son-3.jpg\" width=\"730\" /></p>\r\n\r\n<p>Nguy&ecirc;n liệu ch&iacute;nh l&agrave;m n&ecirc;n m&oacute;n b&aacute;nh &aacute;p chao l&agrave; thịt vịt&nbsp; với c&aacute;ch chế biến&nbsp; kh&aacute; độc đ&aacute;o.</p>\r\n\r\n<p>Thịt vịt được ướp với gia vị bột canh, mỳ ch&iacute;nh, bột n&ecirc;m, h&uacute;ng l&igrave;u, muối ti&ecirc;u v&agrave; để khoảng 3 &ndash; 4 tiếng để thịt ngấm gia vị.</p>\r\n\r\n<p>Nh&acirc;n thịt vịt được &aacute;p v&agrave;o giữa một muỗng bột lớn rồi bọc một lớp bột ph&iacute;a tr&ecirc;n v&agrave; thả cả muỗng v&agrave;o chảo ngập dầu. B&aacute;nh dần dần phồng l&ecirc;n rất th&uacute; vị. Đến khi b&aacute;nh ch&iacute;n th&igrave; sẽ được vớt ra v&agrave; cắt th&agrave;nh những miếng nhỏ vừa ăn.</p>\r\n\r\n<p>B&aacute;nh &aacute;p chao được ăn k&egrave;m với nước mắm chua ngọt ng&acirc;m gỏi đu đủ xanh, th&ecirc;m ớt ti&ecirc;u cay v&agrave; rổ rau sống xanh mơn mởn, rất hấp dẫn.</p>\r\n\r\n<p>Những chiếc b&aacute;nh v&agrave;ng suộm thơm ngon, vỏ ngo&agrave;i th&igrave; gi&ograve;n tan, nh&acirc;n thịt vịt đậm đ&agrave;, c&ugrave;ng với nước chấm chua cay sẽ tạo n&ecirc;n một vị ngon kh&oacute; cưỡng, kh&ocirc;ng được tự m&igrave;nh thường thức th&igrave; kh&ocirc;ng thể cảm nhận được hết hương vị của b&aacute;nh &aacute;p chao n&agrave;y đ&acirc;u c&aacute;c bạn.</p>\r\n\r\n<h3><strong>#11. Lời kết</strong></h3>\r\n\r\n<p>V&acirc;ng ! Tr&ecirc;n đ&acirc;y l&agrave; TOP 10 m&oacute;n ăn ngon ở Lạng Sơn m&agrave; m&igrave;nh muốn giới thiệu với c&aacute;c bạn. C&ograve;n bạn th&igrave; sao, bạn đ&atilde; từng ăn m&oacute;n đặc sản n&agrave;o ở Lạng Sơn rồi? kể cả ngo&agrave;i danh s&aacute;ch b&ecirc;n tr&ecirc;n ra &ndash; bạn ấn tượng với m&oacute;n ăn n&agrave;o nhất? h&atilde;y chia sẻ lại với mọi người để c&oacute; th&ecirc;m kiến thức thực tế nh&eacute; 🙂</p>\r\n\r\n<p>Nếu thấy b&agrave;i viết n&agrave;y hay v&agrave; c&oacute; &iacute;ch th&igrave; đừng qu&ecirc;n chia sẻ n&oacute; cho mọi người c&ugrave;ng biết nha c&aacute;c bạn. Ch&uacute;c bạn c&oacute; một chuyến đi Lạng Sơn vui vẻ 🙂</p>', '2020-12-22 02:08:55', '2020-12-22 02:13:20');
INSERT INTO `blog` (`id`, `title`, `description`, `image`, `content`, `created_at`, `updated_at`) VALUES
(17, 'TOP 5 CÁCH CHẾ BIẾN MÓN ỐC BƯƠU VÀNG NGON NHẤT', '<p>Ốc bươu v&agrave;ng l&agrave; nguy&ecirc;n liệu mang lại những m&oacute;n ăn độc đ&aacute;o v&agrave; ngon hấp dẫn với con người. Với c&aacute;c phương ph&aacute;p chế biến kh&aacute;c nhau, Bobimsua sẽ m&aacute;ch bạn top 5 <strong>c&aacute;ch chế biến m&oacute;n ốc bươu v&agrave;ng</strong>&nbsp;ngon v&agrave; bổ dưỡng nhất.</p>', '5LlD_cach-che-bien-mon-oc-buou-vang-2-150x150.jpg', '<h2><strong>ĐẶC ĐIỂM NHẬN BIẾT ỐC BƯƠU V&Agrave;NG</strong></h2>\r\n\r\n<p>Ốc bươu v&agrave;ng l&agrave; lo&agrave;i được du nhập v&agrave;o thị trường Việt Nam những năm 80. Đ&oacute; l&agrave; nguy&ecirc;n liệu ch&iacute;nh cho c&aacute;c m&oacute;n ngon đặc biệt n&ecirc;n ốc bươu được nu&ocirc;i ở Việt Nam. Tuy nhi&ecirc;n, sau khi số lượng nhiều, n&oacute; x&acirc;m nhập ra c&aacute;c v&ugrave;ng l&uacute;a g&acirc;y hại n&ecirc;n đ&atilde; bị cấm nu&ocirc;i.</p>\r\n\r\n<p>Th&iacute;ch ứng mạnh n&ecirc;n ốc bươu v&agrave;ng ngo&agrave;i tự nhi&ecirc;n ph&aacute;t triển nhiều v&ocirc; kể. Chủ yếu c&aacute;c nguồn ốc bươu v&agrave;ng hiện nay đều từ tự nhi&ecirc;n kh&ocirc;ng h&oacute;a chất n&ecirc;n được coi l&agrave; nguồn thực phẩm bổ dưỡng.</p>\r\n\r\n<p>Ốc bươu v&agrave;ng gần giống ốc bươu. C&oacute; h&igrave;nh xoắn, c&oacute; th&acirc;n v&agrave; ch&acirc;n, hai x&uacute;c tu c&oacute; thể b&ecirc;n d&agrave;i b&ecirc;n ngắn. Phần bụng chứa ruột v&agrave; c&oacute; m&agrave;u kem, ốc c&oacute; nắp che lại, di chuyển bằng c&aacute;ch b&ograve; tr&ecirc;n c&aacute;c bề mặt.<br />\r\nPhần vỏ ốc c&oacute; m&agrave;u v&agrave;ng nhạt, k&iacute;ch thước kh&aacute; to hơn c&aacute;c lo&agrave;i ốc bản địa. V&acirc;n tr&ecirc;n vỏ ốc cũng kh&aacute; r&otilde; n&eacute;t v&agrave; nhiều.</p>\r\n\r\n<h2><strong>LỢI &Iacute;CH ĐỐI VỚI SỨC KHỎE KHI CHẾ BIẾN M&Oacute;N ỐC BƯƠU V&Agrave;NG</strong></h2>\r\n\r\n<p>Lo&agrave;i ốc lu&ocirc;n c&oacute; gi&aacute; trị dinh dưỡng cao, &iacute;t chất b&eacute;o v&agrave; lu&ocirc;n tạo ra những m&oacute;n ngon gi&uacute;p con người đ&aacute;nh thức được vị gi&aacute;c của bản th&acirc;n.</p>\r\n\r\n<p>Ốc bươu v&agrave;ng chứa rất nhiều protein c&oacute; thể biến đổi th&agrave;nh c&aacute;c protein c&oacute; lợi cho sức khỏe con người. Theo một nghi&ecirc;n cứu, cứ 100gr protein ốc sẽ c&oacute; 72,9 gr protein tạo ra cho con người.</p>\r\n\r\n<h3>BẢNG GI&Aacute; TRỊ DINH DƯỠNG CỦA ỐC BƯƠU V&Agrave;NG</h3>\r\n\r\n<p>Theo bản tin c&ocirc;ng nghệ l&uacute;a gạo 2001, số 33</p>\r\n\r\n<p>Bảng gi&aacute; trị dinh dưỡng ốc bươu v&agrave;ng (Gi&aacute; trị cho 100 g thịt tươi ốc bươu v&agrave;ng)</p>\r\n\r\n<ul>\r\n	<li>Năng lượng thực phẩm: 83 calo / 347 Joules</li>\r\n	<li>Chất đạm: 12,2 g</li>\r\n	<li>Chất b&eacute;o: 0,4 g</li>\r\n	<li>Carbohydrate: 6,6 g</li>\r\n	<li>Chất xơ: 0 g</li>\r\n	<li>Tro: 3,2 g</li>\r\n	<li>Phốt pho: 61 mg</li>\r\n	<li>Natri: 40 mg</li>\r\n	<li>Kali: 17 mg</li>\r\n	<li>Riboflavin: 12 mg</li>\r\n	<li>Niacin: 1,8 mg</li>\r\n	<li>Vit C., kẽm, đồng, mangan v&agrave; iốt: một lượng nhỏ</li>\r\n</ul>\r\n\r\n<h2><strong>LƯU &Yacute; QUAN TRỌNG KHI CHẾ BIẾN ỐC BƯƠU V&Agrave;NG</strong></h2>\r\n\r\n<p>Thận trọng phải được thực hiện để ti&ecirc;u diệt c&aacute;c k&yacute; sinh tr&ugrave;ng c&oacute; thể m&agrave; những con ốc n&agrave;y c&oacute; thể mang theo. Nấu kỹ ốc trước khi ăn v&igrave; đ&acirc;y l&agrave; c&aacute;ch đơn giản v&agrave; hiệu quả để loại bỏ nguy cơ nhiễm tr&ugrave;ng.<br />\r\nKH&Ocirc;NG BAO GIỜ ăn ốc sống hoặc nấu ch&iacute;n t&aacute;i!</p>\r\n\r\n<p><em><u><strong>Lưu &yacute; quan trọng khi chế biến ốc bươu v&agrave;ng</strong></u></em></p>\r\n\r\n<p><strong>Một số mẹo cơ bản để chuẩn bị ốc:</strong></p>\r\n\r\n<ol>\r\n	<li>Đặt ốc v&agrave;o bể kh&ocirc;ng c&oacute; thức ăn trong 2 ng&agrave;y để đảm bảo rằng ruột được l&agrave;m trống (c&oacute; thể l&agrave;m hoặc kh&ocirc;ng).</li>\r\n	<li>Luộc ốc nhẹ hoặc đ&ocirc;ng lạnh để diệt ốc.</li>\r\n	<li>Lấy ốc ra khỏi vỏ bằng m&oacute;c hoặc nh&iacute;p.</li>\r\n	<li>Loại bỏ cơ thể v&agrave; ruột của ốc (chỉ ăn ch&acirc;n). C&aacute;c cơ quan nội tạng kh&ocirc;ng ngon; đặc biệt l&agrave; tuyến albumen (l&ograve;ng đỏ) từ ốc bươu v&agrave;ng c&oacute; m&ugrave;i vị gắt (c&ugrave;ng m&ugrave;i vị với trứng, một cơ chế bảo vệ c&oacute; thể chống lại kẻ săn mồi ).</li>\r\n	<li>Th&aacute;o nắp vỏ ốc.</li>\r\n</ol>\r\n\r\n<h2><strong>TOP 5 C&Aacute;CH CHẾ BIẾN M&Oacute;N ỐC BƯƠU V&Agrave;NG</strong></h2>\r\n\r\n<p>C&oacute; rất nhiều c&aacute;ch chế biến m&oacute;n ốc bươu v&agrave;ng ngon v&agrave; bổ dưỡng, hấp dẫn. C&aacute;c m&oacute;n ngon từ ốc bươu v&agrave;ng thường được l&agrave;m kh&aacute; tỉ mỉ th&igrave; mới c&oacute; thể c&oacute; được vị như mong muốn. Theo d&otilde;i Top 5 c&aacute;ch chế biến m&oacute;n ốc bươu v&agrave;ng c&aacute;c m&oacute;n ốc ngon dễ l&agrave;m ngay:</p>\r\n\r\n<h3><strong>ỐC BƯƠU V&Agrave;NG X&Agrave;O L&Aacute; LỐT</strong></h3>\r\n\r\n<p><strong>Nguy&ecirc;n liệu:</strong><br />\r\n300 gr ốc bươu v&agrave;ng, l&aacute; lốt, h&agrave;nh tăm.<br />\r\nGia vị: muối, giấm, hạt n&ecirc;m, dầu ăn</p>\r\n\r\n<p><strong>C&aacute;ch chế biến:</strong></p>\r\n\r\n<ul>\r\n	<li>Ốc rửa sạch ( x&aacute;t muối v&agrave; giấm)</li>\r\n	<li>L&aacute; lốt th&aacute;i mỏng</li>\r\n	<li>Để r&aacute;o ốc. Phi h&agrave;nh thơm l&ecirc;n c&ugrave;ng với &iacute;t dầu ăn. Đổ ốc v&agrave;o khuấy đều</li>\r\n	<li>Khi ốc ch&iacute;n tới, n&ecirc;m nếm gia vị vừa</li>\r\n	<li>Th&ecirc;m l&aacute; lốt v&agrave; x&agrave;o đến khi cả hai h&ograve;a quyện v&agrave;o nhau.</li>\r\n</ul>\r\n\r\n<p>Một m&oacute;n ngon m&agrave; cực k&igrave; đơn giản</p>\r\n\r\n<h3><strong>ỐC BƯƠU X&Agrave;O KIỂU TH&Aacute;I</strong></h3>\r\n\r\n<p><strong>Nguy&ecirc;n liệu:</strong></p>\r\n\r\n<ul>\r\n	<li>550gr c bươu v&agrave;ng (Thịt ốc bươu)</li>\r\n	<li>3 c&acirc;y sả</li>\r\n	<li>1 &iacute;t l&aacute; chanh</li>\r\n	<li>Chanh 1 Tr&aacute;i</li>\r\n	<li>1 củ h&agrave;nh t&iacute;m</li>\r\n	<li>2 quả ớt tr&aacute;i</li>\r\n	<li>1 muỗng canh ớt bột</li>\r\n	<li>1 muỗng ti&ecirc;u</li>\r\n	<li>3 muỗng nước mắm</li>\r\n	<li>1 muỗng đường trắng</li>\r\n	<li>Một &iacute;t h&agrave;nh l&aacute;</li>\r\n</ul>\r\n\r\n<p><strong>C&aacute;ch chế biến:</strong></p>\r\n\r\n<ul>\r\n	<li>Thịt ốc bươu rửa sạch, nguy&ecirc;n liệu c&ograve;n lại cắt th&aacute;i nhỏ</li>\r\n	<li>Đập sả v&agrave; nước cốt chanh bỏ v&agrave;o nước đun s&ocirc;i, cho thịt ốc v&agrave;o luộc.<br />\r\n	vớt ốc ra, trộn đều với c&aacute;c gia vị ( sả, l&aacute; chanh, nước cốt chanh, hỗn hợp nước mắm, đường ti&ecirc;u ớt&hellip;)</li>\r\n</ul>\r\n\r\n<p>Thưởng thức ngay khi trộn để giữ được m&ugrave;i hương từ nguy&ecirc;n liệu v&agrave; độ gi&ograve;n dai của ốc bươu v&agrave;ng.</p>\r\n\r\n<h3><strong>ỐC BƯƠU V&Agrave;NG NẤU CHUỐI</strong></h3>\r\n\r\n<p><strong>Nguy&ecirc;n liệu:</strong></p>\r\n\r\n<ul>\r\n	<li>500 gr thịt ốc bươu v&agrave;ng ( đ&atilde; sơ chế v&agrave; bỏ ruột)</li>\r\n	<li>3 quả chuối xanh</li>\r\n	<li>Gia vị: muối, ti&ecirc;u, nghệ, tỏi, dầu ăn, đường</li>\r\n	<li>Nước dừa 1 quả</li>\r\n	<li>Chuẩn bị chảo</li>\r\n</ul>\r\n\r\n<p><strong>C&aacute;ch chế biến:</strong></p>\r\n\r\n<ul>\r\n	<li>Thịt ốc được rửa sạch sẽ bằng nước cốt chanh, sơ chế kĩ nếu c&ograve;n s&oacute;t trứng th&igrave; chắc chắn phải vứt đi.</li>\r\n	<li>Ướp với c&aacute;c gia vị, để lại một &iacute;t tỏi băm kh&ocirc;ng ướp</li>\r\n	<li>Phi tỏi, cho ốc đ&atilde; ướp v&agrave;o chảo, x&agrave;o ch&iacute;n</li>\r\n	<li>Cho chuối v&agrave;o x&agrave;o chung, thật ch&iacute;n</li>\r\n	<li>Cho nước cốt dừa v&agrave;o, đun um nhỏ lửa</li>\r\n	<li>10 ph&uacute;t sau quay lại, hỗn hợp đ&atilde; cạn bớt nước</li>\r\n</ul>\r\n\r\n<p>C&oacute; ngay dĩa ốc bươu v&agrave;ng nấu chuối thơm lừng</p>\r\n\r\n<h3>ỐC BƯƠU X&Agrave;O LĂN</h3>\r\n\r\n<p><strong>Nguy&ecirc;n liệu:</strong></p>\r\n\r\n<ul>\r\n	<li>2 ch&eacute;n ốc bươu v&agrave;ng xắt nhỏ</li>\r\n	<li>1 muỗng canh h&agrave;nh t&acirc;y nghiền</li>\r\n	<li>1 muỗng nước cốt chanh</li>\r\n	<li>1 muỗng c&agrave; ph&ecirc; ti&ecirc;u</li>\r\n	<li>2 muỗng c&agrave; ph&ecirc; sốt c&agrave; chua</li>\r\n	<li>1 muỗng c&agrave; ph&ecirc; rau m&ugrave;i t&acirc;y xắt nhỏ</li>\r\n	<li>1 ch&eacute;n dầu chi&ecirc;n</li>\r\n	<li>1 ch&eacute;n bột</li>\r\n	<li>1 muỗng c&agrave; ph&ecirc; muối</li>\r\n	<li>2 quả trứng</li>\r\n	<li>4 gr bơ</li>\r\n</ul>\r\n\r\n<p><strong>C&aacute;ch chế biến:</strong></p>\r\n\r\n<ul>\r\n	<li>Nấu ốc bươu v&agrave;ng trong chảo phủ trong 30 ph&uacute;t hoặc cho đến khi thịt mềm, sử dụng 1 muỗng dầu chi&ecirc;n với h&agrave;nh t&acirc;y, sốt c&agrave; chua, hạt ti&ecirc;u v&agrave; chanh.</li>\r\n	<li>L&agrave;m tan 4 gr bơ v&agrave; trộn với bột v&agrave; muối. Dần dần khuấy sữa v&agrave; nấu cho đến khi hỗn hợp đặc lại. Nấu tr&ecirc;n lửa nhỏ trong 5 ph&uacute;t v&agrave; để nguội. Khuấy cho ốc v&agrave; rau m&ugrave;i t&acirc;y cho đến khi trộn ho&agrave;n to&agrave;n.</li>\r\n	<li>Khu&ocirc;n hỗn hợp th&agrave;nh dạng b&aacute;nh v&agrave; nh&uacute;ng v&agrave;o vụn b&aacute;nh m&igrave;, sau đ&oacute; trong trứng đ&aacute;nh v&agrave; một lần nữa trong vụn b&aacute;nh m&igrave;. Chi&ecirc;n trong dầu n&oacute;ng cho đến khi nấu.</li>\r\n</ul>\r\n\r\n<h3><strong>ỐC BƯƠU C&Ugrave;NG RƯỢU VANG TRẮNG</strong></h3>\r\n\r\n<p><strong>Nguy&ecirc;n liệu:</strong></p>\r\n\r\n<ul>\r\n	<li>2 ch&eacute;n thịt ốc bươu xắt nhỏ</li>\r\n	<li>1 muỗng chanh</li>\r\n	<li>2 muỗng c&agrave; ph&ecirc; ti&ecirc;u</li>\r\n	<li>2 ch&eacute;n nước sốt c&agrave; chua</li>\r\n	<li>1 ly nước</li>\r\n	<li>1 muỗng c&agrave; ph&ecirc; muối</li>\r\n	<li>6 t&eacute;p tỏi</li>\r\n	<li>2 muỗng c&agrave; ph&ecirc; oregano</li>\r\n	<li>1 ch&eacute;n rượu trắng</li>\r\n	<li>1 củ h&agrave;nh t&acirc;y th&aacute;i l&aacute;t</li>\r\n	<li>2 muỗng canh dầu &ocirc; liu</li>\r\n</ul>\r\n\r\n<p><strong>C&aacute;ch chế biến:</strong></p>\r\n\r\n<p>Đun nhỏ ốc bươu trong một c&aacute;i chảo trong dầu ăn với tỏi, chanh, hạt ti&ecirc;u, muối, ớt ngọt v&agrave; sốt c&agrave; chua. Th&ecirc;m rượu vang trắng, nước v&agrave; h&agrave;nh t&acirc;y th&aacute;i l&aacute;t. Đậy nắp v&agrave; nấu trong 20 ph&uacute;t.<br />\r\nĂn với cơm hoặc khoai t&acirc;y.</p>\r\n\r\n<hr />\r\n<p>Ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng với top 5 c&aacute;ch chế biến m&oacute;n ốc bươu v&agrave;ng ngon nhất.</p>', '2020-12-25 14:01:19', '2020-12-25 14:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_product`, `title`, `content`, `number_star`, `created_at`, `updated_at`) VALUES
(26, 2, 26, 'Ngon hơn khi uống mùa hè', 'Tuyệt vời', 4, '2020-12-21 17:09:51', '2020-12-21 17:09:51'),
(28, 4, 25, 'Tạm được', 'ăn bình thg', 2, '2020-12-22 10:38:12', '2020-12-22 10:38:12'),
(30, 4, 31, 'Ngon phết', 'Chất lượng đảm nảo', 4, '2020-12-22 16:24:53', '2020-12-22 16:24:53'),
(31, 2, 40, 'Rất ngon', 'Bánh mềm, dẻo thơm', 4, '2020-12-25 09:43:15', '2020-12-25 09:43:15'),
(32, 2, 32, 'Ngon', 'Bánh rất mềm', 3, '2020-12-25 14:27:46', '2020-12-25 14:27:46'),
(35, 2, 11, 'Cũng được', '4 Sao thôi nhé', 4, '2023-04-04 16:46:10', '2023-04-04 16:46:10'),
(36, 2, 36, 'Món này rất ngon', 'Món này rất ngon tuy nhiên tôi không thích vị sốt lắm', 5, '2023-04-05 09:20:29', '2023-04-05 09:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `comment_blogs`
--

CREATE TABLE `comment_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_blog` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_blogs`
--

INSERT INTO `comment_blogs` (`id`, `id_blog`, `id_user`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'Cảnh đẹp nha', '2020-12-03 18:31:39', '2020-12-03 18:31:39'),
(2, 7, 3, 'Toán món ngon', '2020-12-04 01:44:00', '2020-12-04 01:44:00'),
(3, 11, 4, 'Ngon quá đi', '2020-12-17 03:27:46', '2020-12-17 03:27:46'),
(4, 14, 2, 'tuyệt vời', '2020-12-22 01:58:36', '2020-12-22 01:58:36'),
(5, 5, 4, 'Toàn cảnh đẹp', '2020-12-22 16:19:56', '2020-12-22 16:19:56'),
(8, 17, 2, 'Tuyệt vời luôn', '2020-12-25 14:09:13', '2020-12-25 14:09:13'),
(9, 15, 5, 'agaggaaga', '2020-12-26 03:51:06', '2020-12-26 03:51:06'),
(10, 17, 2, 'babab', '2021-01-18 10:41:21', '2021-01-18 10:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `messages`, `created_at`, `updated_at`) VALUES
(1, 'Trần Bình Trọng', 'tranbinhtrong937@gmail.com', 'Shop chất lượng!', '2023-03-17 17:00:00', '2023-03-18 09:31:33'),
(2, 'Mai Quỳnh Anh', 'mp753114@gmail.com', 'oke la', '2023-03-25 15:49:58', '2023-03-25 15:49:58'),
(3, 'Lê Văn Huy', 'mp753114@gmail.com', 'ădawdasd', '2023-03-26 03:51:27', '2023-03-26 03:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `address`, `tel`, `fax`, `email`, `created_at`, `updated_at`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7446.982624229566!2d105.73810386058695!3d21.053030473331955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454f9de2328cf%3A0xc5685fbea9808d8e!2zTmd1ecOqbiBYw6EsIE1pbmggS2hhaSwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1605000497757!5m2!1svi!2s', '(+84) 866 006 520', '(+84) 866 006 520', 'mp753114@gmail.com', '2020-12-10 06:22:24', '2020-12-10 06:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_nb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone_nb`, `created_at`, `updated_at`) VALUES
(1, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2020-12-25 16:28:58', '2020-12-25 16:28:58'),
(2, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2020-12-25 16:47:01', '2020-12-25 16:47:01'),
(3, 'Phương Hà', 'mp753116@gmail.com', 'Cẩm Văn - Cẩm Giàng', '0866006523', '2020-12-25 16:48:15', '2020-12-25 16:48:15'),
(4, 'Phương Hà', 'mp753116@gmail.com', 'Cẩm Văn - Cẩm Giàng', '0866006523', '2020-12-25 16:50:57', '2020-12-25 16:50:57'),
(5, 'Hà Minh Phương', 'mp753118@gmail.com', 'Cẩm Văn Cẩm Giàng', '0866006520', '2020-12-26 03:46:09', '2020-12-26 03:46:09'),
(6, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:11:42', '2021-01-08 03:11:42'),
(7, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:13:25', '2021-01-08 03:13:25'),
(8, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:13:32', '2021-01-08 03:13:32'),
(9, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:14:15', '2021-01-08 03:14:15'),
(10, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:17:20', '2021-01-08 03:17:20'),
(11, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-08 03:20:18', '2021-01-08 03:20:18'),
(12, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2021-01-27 12:54:44', '2021-01-27 12:54:44'),
(13, 'Nguyễn Khuyến', 'mp753119@gmail.com', 'Cẩm Văn - Cẩm Giàng', '+84866006520', '2021-01-27 13:08:59', '2021-01-27 13:08:59'),
(14, 'Hữu Luân', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2022-12-07 01:00:22', '2022-12-07 01:00:22'),
(15, 'Trần Trọng ', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2022-12-08 16:28:15', '2022-12-08 16:28:15'),
(16, 'Trần Trọng ', 'mp753115@gmail.com', 'Cẩm Văn Cẩm Giàng', '0888062201', '2022-12-08 17:11:53', '2022-12-08 17:11:53'),
(17, 'Trần Bình Trọng', 'trong.tran67@cd2.com', 'Nguyên Xá - Bắc Từ Liêm - Hà Nội', '0965814288', '2023-03-01 17:41:36', '2023-03-01 17:41:36'),
(18, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-02 16:13:55', '2023-04-02 16:13:55'),
(19, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-02 16:15:28', '2023-04-02 16:15:28'),
(20, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-04 16:45:13', '2023-04-04 16:45:13'),
(21, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-04 16:47:04', '2023-04-04 16:47:04'),
(22, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-23 07:05:14', '2023-04-23 07:05:14'),
(23, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-23 07:18:40', '2023-04-23 07:18:40'),
(24, 'Trần Trọng ', 'mp753115@gmail.com', 'Bắc Từ Liêm - Hà Nội', '0965814299', '2023-04-23 07:32:15', '2023-04-23 07:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `link`, `priority`, `created_at`, `updated_at`) VALUES
(10, 'JPQ5_banner-home-1.jpg', NULL, 'Vị trí 2', '2020-12-19 08:54:18', '2020-12-19 08:54:18'),
(11, 'o27z_1_3e7313a2-24ef-4dea-b4f4-19a75f8b51fa.png', NULL, 'Vị trí 1', '2020-12-19 08:56:26', '2020-12-19 08:56:26'),
(12, '7smc_bn1_53149ef0-f92a-4804-b600-02e903aa4559.png', NULL, 'Vị trí 3', '2020-12-19 08:56:40', '2020-12-19 08:57:09'),
(14, '0ilD_NXAd_collections_banner_top.jpg', NULL, 'Vị trí 4', '2020-12-22 16:15:45', '2020-12-22 16:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_customer`, `total`, `note`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(13, 17, 67500, 'Giao nhanh', 'Thanh toán khi nhận hàng', 1, '2023-03-01 17:41:36', '2023-03-01 17:43:48'),
(14, 18, 117500, 'Giao nhanh nhé', 'Thanh toán online', 1, '2023-04-02 16:13:55', '2023-04-02 16:14:29'),
(15, 19, 225200, 'Nhanh nào', 'Thanh toán khi nhận hàng', 1, '2023-04-02 16:15:28', '2023-04-03 16:57:09'),
(16, 20, 77000, NULL, 'Thanh toán khi nhận hàng', 0, '2023-04-04 16:45:13', '2023-04-04 16:45:13'),
(17, 21, 247750, 'Giao nhanh nha!', 'Thanh toán khi nhận hàng', 0, '2023-04-04 16:47:04', '2023-04-04 16:47:04'),
(19, 23, 86000, 'Giao hàng nhanh nhé, tip 10k hehe', 'Thanh toán online', 1, '2023-04-23 07:18:40', '2023-04-23 07:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
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
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `id_size`, `id_topping`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(25, 15, 11, 2, NULL, 4, 205200, '2023-04-02 16:15:28', '2023-04-02 16:15:28'),
(34, 19, 40, 2, NULL, 1, 66000, '2023-04-23 07:18:40', '2023-04-23 07:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `image`, `name`, `position`, `introduce`, `created_at`, `updated_at`) VALUES
(1, '9G3V_about_avatar_1.jpg', 'SARA BETHEL', 'Chef', '<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat</p>', '2020-12-10 05:38:00', '2020-12-10 05:38:00'),
(2, 'LPWA_about_avatar_2.jpg', 'ODIO PROCIA', 'CEO/Founder', '<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat</p>', '2020-12-21 17:05:33', '2020-12-22 15:54:28'),
(3, '2clm_about_avatar_3.jpg', 'BANICA TINCIDUNT', 'Chef', '<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat</p>', '2020-12-21 17:06:24', '2020-12-21 17:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` double NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rating` int(11) DEFAULT NULL,
  `number_star` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_type`, `name`, `description`, `unit_price`, `discount`, `image`, `unit`, `total_rating`, `number_star`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Gà Rán Mala', '<p><strong>G&agrave; r&aacute;n</strong>&nbsp;l&agrave; một m&oacute;n ăn xuất xứ từ miền Nam Hoa Kỳ, với nguy&ecirc;n liệu ch&iacute;nh l&agrave; những miếng thịt&nbsp;<strong>g&agrave;</strong>&nbsp;đ&atilde; được lăn bột rồi chi&ecirc;n tr&ecirc;n chảo, chi&ecirc;n ngập dầu, hoặc chi&ecirc;n &aacute;p suất. Ngo&agrave;i ra cũng c&oacute; thể tẩm một lớp bột chi&ecirc;n x&ugrave; l&ecirc;n để cho ra được một lớp vỏ ngo&agrave;i gi&ograve;n rụm v&agrave; giữ phần thịt b&ecirc;n trong mềm ngọt.</p>', 40000, 0, 'IaKE_z1.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:39:05', '2023-04-02 14:44:08'),
(3, 4, 'Gà Rán Thường', NULL, 25000, 0, 'whQT_z2.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:39:52', '2023-04-02 14:40:41'),
(4, 4, 'Gà Rán H&S', NULL, 40000, 10, 'eVUc_z3.png', 'Phần', 0, 0, 'Hiện', '2020-12-02 04:40:10', '2023-04-02 14:44:34'),
(5, 4, 'Gà Rán Sốt Đậu', NULL, 40000, 0, 'mSzv_z4.png', 'Phần', 0, 0, 'Hiện', '2020-12-02 04:40:31', '2023-04-02 14:44:52'),
(6, 4, 'Gà Rán Phô Mai', NULL, 40000, 10, 'Hh7Y_z5.png', 'Phần', 0, 0, 'Hiện', '2020-12-02 04:42:36', '2023-04-02 14:45:13'),
(7, 4, 'Gà Nướng', NULL, 38000, 5, '75bp_z8.png', 'Phần', 0, 0, 'Hiện', '2020-12-02 04:43:02', '2023-04-02 14:43:38'),
(10, 1, 'Pizza Gà Dứa', NULL, 50000, 5, 'TFmH_pizza1.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:45:23', '2023-04-02 16:09:37'),
(11, 1, 'Pizza Phô Mai', NULL, 45000, 5, 'acwv_pizza2.png', 'Cái', 2, 9, 'Hiện', '2020-12-02 04:45:45', '2023-04-04 16:46:10'),
(12, 1, 'Pizza Xúc Xích Ý', NULL, 50000, 0, '86Zf_pizza3.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:46:10', '2023-04-02 13:15:35'),
(13, 1, 'Pizza Thịt Nguội & Nấm', NULL, 50000, 0, '4FQ9_pizza4.png', 'Cái', 1, 5, 'Hiện', '2020-12-02 04:46:26', '2023-04-02 16:12:30'),
(14, 1, 'Pizza Hawaiian', NULL, 50000, 0, 'hsmN_pizza5.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:46:44', '2023-04-02 13:16:48'),
(15, 1, 'Pizza Rau Củ', NULL, 50000, 0, 'yHts_pizza6.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:47:03', '2023-04-02 13:17:10'),
(16, 1, 'Pizza 5 Loại Thịt', NULL, 50000, 0, 'vI9B_pizza7.png', 'Cái', 0, 0, 'Hiện', '2020-12-02 04:47:39', '2023-04-02 13:25:15'),
(17, 2, 'Khoai tây lắc', NULL, 45000, 0, 'R71M_x1.png', 'Phần', 0, 0, 'Hiện', '2020-12-02 04:49:02', '2023-04-02 14:53:55'),
(18, 5, 'Americano', NULL, 50000, 10, 'DmV8_zzz5.jpg', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:49:33', '2023-04-02 15:16:10'),
(19, 5, 'Cappucino', NULL, 50000, 10, 'd5NP_zzz3.jpg', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:50:04', '2023-04-02 15:16:34'),
(20, 5, 'Flatwhite', NULL, 50000, 0, 'l16N_zzz1.jpg', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:50:32', '2023-04-02 15:16:54'),
(21, 5, 'Hotchoco', NULL, 50000, 0, 'W1NF_zzz6.jpg', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:50:53', '2023-04-02 15:17:22'),
(22, 5, 'Hotmatcha', NULL, 50000, 0, 'nAFO_zzz2.jpg', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:51:23', '2023-04-02 15:17:43'),
(24, 5, 'Mocha', NULL, 50000, 10, 'dyvP_zzz4.jpg', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:52:44', '2023-04-02 15:17:58'),
(25, 6, '7 UP Dưa Lưới Đào', NULL, 25000, 0, 'tyZ0_zz1.png', 'Cốc', 1, 2, 'Hiện', '2020-12-02 04:54:33', '2023-04-02 15:03:17'),
(26, 6, '7 UP Dừa Dứa', NULL, 25000, 0, 'J9c1_zz2.png', 'Cốc', 1, 4, 'Hiện', '2020-12-02 04:55:20', '2023-04-02 15:03:52'),
(27, 6, 'Pepsi', NULL, 15000, 0, 'WeC8_zz3.png', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:55:47', '2023-04-02 15:04:19'),
(28, 6, 'Nước Cam', NULL, 30000, 0, 'sJRb_zz4.png', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:56:32', '2023-04-02 15:04:42'),
(29, 6, 'Trà Chanh', NULL, 25000, 0, '8hsr_zz5.png', 'Cốc', 0, 0, 'Hiện', '2020-12-02 04:57:18', '2023-04-02 15:05:02'),
(30, 3, 'Burger Gà Thượng Hạng', NULL, 45000, 0, 'Ts6D_b1.png', 'Cái', 0, 0, 'Hiện', '2020-12-15 09:15:22', '2023-04-02 14:20:35'),
(31, 3, 'Burger Bò', NULL, 55000, 0, 'llSy_b2.png', 'Cái', 1, 4, 'Hiện', '2020-12-15 09:16:40', '2023-04-02 14:23:39'),
(32, 3, 'Burger Double', NULL, 50000, 5, 'viKS_b3.png', 'Cái', 1, 3, 'Hiện', '2020-12-15 09:18:02', '2023-04-05 16:21:58'),
(33, 3, 'Burger Mozzarella', NULL, 50000, 5, '9PQt_b4.png', 'Cái', 0, 0, 'Hiện', '2020-12-15 09:18:37', '2023-04-02 14:25:34'),
(34, 3, 'Burger Tôm', NULL, 60000, 0, 'TQG2_b5.png', 'Cái', 0, 0, 'Hiện', '2020-12-15 09:19:26', '2023-04-02 14:26:20'),
(35, 3, 'Burger Cá', NULL, 60000, 0, 'v4w7_b7.png', 'Cái', 1, 5, 'Hiện', '2020-12-15 09:19:56', '2023-04-02 14:26:57'),
(36, 3, 'Burger Bulgogi', NULL, 50000, 0, 'NJPl_b6.png', 'Cái', 1, 5, 'Hiện', '2020-12-15 09:20:50', '2023-04-05 09:20:29'),
(37, 1, 'Pizza Thịt & Rau Củ', NULL, 55000, 0, 'qdKG_pizza8.png', 'Cái', 0, 0, 'Hiện', '2020-12-17 02:53:56', '2023-04-02 13:21:02'),
(38, 1, 'Pizza Aloha', NULL, 60000, 5, '91JQ_pizza9.png', 'Phần', 0, 0, 'Hiện', '2020-12-17 02:54:27', '2023-04-02 13:22:34'),
(39, 1, 'Pizza Thịt Xông Khói', NULL, 60000, 5, 'FCS8_pizza10.png', 'Phần', 0, 0, 'Hiện', '2020-12-17 02:54:42', '2023-04-02 13:22:57'),
(40, 1, 'Pizza Thịt Nguội Canada', NULL, 55000, 0, 'jOua_pizza11.png', 'Cái', 1, 4, 'Hiện', '2020-12-17 02:55:11', '2023-04-02 13:23:26'),
(41, 1, 'Pizza Gà 3 Vị', NULL, 65000, 0, 'RzMf_pizza13.png', 'Cái', 10, 50, 'Hiện', '2020-12-17 02:55:29', '2023-04-02 13:24:02'),
(44, 2, 'Khoai Tây Chiên', NULL, 27000, 0, 'LEfE_x2.png', 'Phần', 0, 0, 'Hiện', '2020-12-19 15:55:20', '2023-04-02 14:54:40'),
(45, 2, 'Phô Mai Que', NULL, 35000, 0, 'qrms_x3.png', 'Phần', 0, 0, 'Hiện', '2020-12-19 15:55:58', '2023-04-02 14:55:17'),
(46, 2, 'Gà Lắc', NULL, 45000, 0, '4mAS_x4.png', 'Phần', 0, 0, 'Hiện', '2020-12-19 15:56:19', '2023-04-02 14:56:41'),
(67, 3, 'Burger Phô Mai', NULL, 50000, 10, '9JHB_b8.png', 'Phần', 0, 0, 'Hiện', '2020-12-21 06:40:25', '2023-04-02 14:27:53'),
(68, 3, 'Bò Bò Teriyaki', NULL, 54000, 0, 'gesr_b9.png', 'Phần', 0, 0, 'Hiện', '2020-12-21 06:41:53', '2023-04-02 14:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Vừa (M)', 20, 'Hiện', '2023-03-09 23:50:01', '2023-04-05 08:30:43'),
(3, 'Lớn (L)', 50, 'Hiện', '2023-03-09 23:50:23', '2023-04-05 08:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Choco cokie', 5000, 'Hiện', '2023-03-09 23:51:59', '2023-04-05 08:28:57'),
(3, 'Thạch Nha Đam', 12000, 'Hiện', '2023-03-09 23:52:50', '2023-04-05 08:29:16'),
(4, 'Chân châu đen', 10000, 'Hiện', '2023-03-25 18:21:52', '2023-04-05 08:29:39'),
(6, 'Pudding caramel', 15000, 'Hiện', '2023-03-25 15:48:30', '2023-04-05 08:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `banner_type`, `new`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', 'banner_product_1.jpg', 1, 'Hiện', '2020-11-16 03:15:58', '2020-11-26 00:59:30'),
(2, 'Đồ ăn nhẹ', 'banner_product_1.jpg', 1, 'Hiện', '2020-11-16 03:16:12', '2020-11-19 02:28:30'),
(3, 'Bánh Burgers', 'banner_product_2.jpg', 1, 'Hiện', '2020-11-16 03:16:27', '2020-11-16 03:16:30'),
(4, 'Gà rán', 'banner_product_3.jpg', 1, 'Hiện', '2020-11-16 03:16:41', '2020-11-16 03:16:43'),
(5, 'Đồ uống nóng', 'banner_product_1.jpg', 2, 'Hiện', '2020-11-16 03:17:10', '2020-11-16 03:17:12'),
(6, 'Đồ uống đá', 'banner_product_3.jpg', 2, 'Hiện', '2020-11-16 03:17:37', '2020-11-16 03:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `SDT`, `address`, `gender`, `token`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '6oTY_Untitled.png', 'Admin', 'mp753114@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 1, NULL, NULL, NULL, '2023-04-03 16:56:36'),
(2, 'xxNC_Untitled.png', 'Trần Trọng ', 'mp753115@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 0, NULL, NULL, NULL, '2023-04-02 17:45:19'),
(3, 'y51r_face21.jpg', 'Trọng Trần', 'mp753116@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 0, NULL, NULL, '2020-12-03 18:28:56', '2020-12-14 02:04:43'),
(4, NULL, 'Tùng', 'mp753117@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', NULL, NULL, NULL, 0, NULL, NULL, '2020-12-16 16:05:43', '2020-12-16 16:05:43'),
(5, 'Likr_about_avatar_2.jpg', 'Quỳnh', 'mp753118@gmail.com', '$2y$10$SkO2qfEPgdiEEk44RoIVpeI/tuewmURrLy6PYiMaQf2Dxf3m4zxte', '0965814299', 'Bắc Từ Liêm - Hà Nội', 'nam', 0, NULL, NULL, '2020-12-26 03:44:22', '2020-12-26 03:45:14'),
(11, '1GNV_meo.JPG', 'Trần Bình Trọng', 'tbt@gmail.com', '$2y$10$gaKJuW4G1disGfBc5ohTqOR2LwGp.2P2T8Azr0l1zss...', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id_user_foreign` (`id_user`),
  ADD KEY `comment_id_product_foreign` (`id_product`);

--
-- Indexes for table `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_blogs_id_blog_foreign` (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_id_order_foreign` (`id_order`),
  ADD KEY `order_detail_id_product_foreign` (`id_product`),
  ADD KEY `order_detail_id_size_foreign` (`id_size`),
  ADD KEY `order_detail_id_topping_foreign` (`id_topping`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_type_foreign` (`id_type`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comment_blogs`
--
ALTER TABLE `comment_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD CONSTRAINT `comment_blogs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_blogs_id_blog_foreign` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_id_topping_foreign` FOREIGN KEY (`id_topping`) REFERENCES `topping` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
