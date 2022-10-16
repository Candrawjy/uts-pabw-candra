-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 08:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poodies_pabw`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kategori`
--

CREATE TABLE `jenis_kategori` (
  `id_jeniskategori` int(11) NOT NULL,
  `nama_jeniskategori` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `thumbnail_kategori` text DEFAULT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kategori`
--

INSERT INTO `jenis_kategori` (`id_jeniskategori`, `nama_jeniskategori`, `target`, `thumbnail_kategori`, `slug`, `created_at`) VALUES
(9, 'Minuman', 'UMKM', 'minuman_2.jpg', 'minuman', '2022-10-01 17:58:19'),
(10, 'Jajanan', 'UMKM', 'jajanan_2.jpeg', 'jajanan', '2022-10-01 17:58:34'),
(11, 'Cepat Saji', 'UMKM', 'cepatsaji_2.jpg', 'cepat-saji', '2022-10-01 17:58:58'),
(12, 'Seafood', 'UMKM', 'seafood_2.jpg', 'seafood', '2022-10-01 17:59:27'),
(13, 'Desain Grafis', 'Jasa Kreatif', 'grafis_2.jpg', 'desain-grafis', '2022-10-01 18:00:15'),
(14, 'Illustrasi', 'Jasa Kreatif', 'illust_2.jpg', 'illustrasi', '2022-10-01 18:00:27'),
(15, 'Video Editor', 'Jasa Kreatif', 'editor_2.jpg', 'video-editor', '2022-10-01 18:00:37'),
(16, 'Programmer', 'Jasa Kreatif', 'programmer_2.jpg', 'programmer', '2022-10-01 18:00:51'),
(17, 'Aneka Nasi', 'UMKM', 'louis-hansel-CvLZ6hbIemI-unsplash_7.jpg', 'aneka-nasi', '2022-10-01 18:01:43'),
(18, 'Aneka Mie', 'UMKM', 'chinese-noodles-with-chicken-2022-01-18-23-53-18-utc~1_7.jpg', 'aneka-mie', '2022-10-01 21:31:02'),
(19, 'Italia', 'UMKM', 'classic-lasagna-with-bolognese-sauce-2021-08-26-23-06-51-utc~1_7.jpg', 'italia', '2022-10-01 21:34:08'),
(20, 'Burger', 'UMKM', 'hamburger-with-beef-meat-2022-01-19-00-15-04-utc~1_7.jpg', 'burger', '2022-10-01 21:38:17'),
(21, 'Kebab', 'UMKM', 'kebabs-with-meat-and-pumpkin-2021-09-02-08-45-26-utc~1_7.jpg', 'kebab', '2022-10-01 21:56:42'),
(22, 'Dessert', 'UMKM', 'sweet-cake-tasty-chocolate-dessert-2021-12-16-00-22-54-utc~2_7.jpg', 'dessert', '2022-10-01 21:58:34'),
(23, 'Sushi', 'UMKM', 'sushi-2021-08-26-18-10-33-utc~1_7.jpg', 'sushi', '2022-10-01 21:59:52'),
(24, 'Ice Cream', 'UMKM', 'tasty-ice-cream-with-blueberries-flower-flavour-i-2022-03-31-18-26-58-utc~1_7.jpg', 'ice-cream', '2022-10-01 22:08:31'),
(25, 'Pizza', 'UMKM', 'top-view-of-tasty-italian-pizzas-on-wooden-tableto-2022-02-01-22-39-47-utc~2_7.jpg', 'pizza', '2022-10-01 22:10:04'),
(26, 'Makanan', 'UMKM', 'makanan_2.jpeg', 'makanan', '2022-10-03 14:12:57'),
(27, 'Poster', 'Jasa Kreatif', 'POSTER_7.png', 'poster', '2022-10-03 14:53:43'),
(28, 'Logo', 'Jasa Kreatif', 'Street-Food-Festival-logo_7.png', 'logo', '2022-10-03 14:54:02'),
(29, 'Music Production', 'Jasa Kreatif', 'matt-botsford-OKLqGsCT8qs-unsplash_7.jpg', 'music-production', '2022-10-05 15:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_umkm_jasa` int(11) NOT NULL,
  `id_jeniskategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_umkm_jasa`, `id_jeniskategori`, `nama_produk`, `deskripsi`, `harga`, `foto`, `created_at`) VALUES
(5, 13, 28, 'Desain Logo', 'Jasa desain logo dengan range harga Rp50.000 - Rp500.000 dan dengan ketentuan maksimal 3x revisi.', 200000, 'Street-Food-Festival-logo_11.png', '2022-10-01 18:30:54'),
(6, 13, 27, 'Desain Poster', 'Jasa desain logo dengan range harga Rp50.000 - Rp300.000 dan dengan ketentuan maksimal 3x revisi.', 50000, 'Poster-Produk_7.png', '2022-10-01 18:32:17'),
(7, 13, 15, 'Video Company Profile', 'Jasa edit video company profile dengan range harga Rp250.000 - Rp1.000.000 dan dengan ketentuan maksimal 3x revisi.', 250000, 'wahid-khene-iKdQCIiSMlQ-unsplash~1_7.jpg', '2022-10-01 18:35:00'),
(8, 13, 15, 'Motion Grafis', 'Jasa edit video motion grafis dengan range harga Rp150.000 - Rp700.000 dan dengan ketentuan maksimal 3x revisi.', 150000, 'sarath-p-raj-p8GmCEgSmmo-unsplash_7.jpg', '2022-10-01 18:36:17'),
(9, 13, 16, 'Jasa Pembuatan Website', 'Jasa pembuatan website dengan range harga Rp250.000 - Rp1.000.000 dan dengan ketentuan maksimal 3x revisi.', 250000, 'ilya-pavlov-OqtafYT5kTw-unsplash_7.jpg', '2022-10-01 18:37:22'),
(11, 14, 26, 'Ati & Ampela Goreng', 'Ati dan Ampela yang digoreng dengan tekstur yang renyah', 5000, 'Ati--Ampela-Goreng_2.jpg', '2022-10-03 14:06:39'),
(12, 14, 26, 'Ayam Bakar Blambangan', 'Ayam Bakar yang dibakar dengan bumbu khas blambangan', 15000, 'Ayam-Bakar-Blambangan_2.png', '2022-10-03 14:11:57'),
(13, 14, 26, 'Bumbu Rendang Daging Sapi', 'Bumbu Rendang yang dibuat dengan rasa yang khas Padang asli', 7000, 'Bumbu-Rendang-Daging-Sapi_2.jpg', '2022-10-03 14:14:38'),
(14, 14, 26, 'Perkedel Kentang', 'Perkedel yang dibuat dengan kentang yang ditumbuk halus', 2500, 'Perkedel-Kentang_2.jpg', '2022-10-03 14:15:27'),
(15, 14, 26, 'Soto Rendang', 'Soto yang dibuat dengan rasa Rendang yang khas', 20000, 'Soto-Ayam_7.png', '2022-10-03 14:16:22'),
(16, 18, 26, 'Cungkring', 'Makanan yang bikin banyak orang ketagihan ini merupakan paduan dari bibir, otot kaki sapi, dan lontong yang dilumuri bumbu kacang', 25000, 'Cungkring_7.png', '2022-10-03 14:18:49'),
(17, 17, 10, 'Lumpia Basah', 'Lumpia basah adalah camilan khas Jawa Barat yang rasanya lezat, bergizi, murah, dan juga mengenyangkan', 15000, 'Lumpia-Basah_7.png', '2022-10-03 14:20:00'),
(18, 16, 22, 'Martabak Coklat Keju', 'Martabak manis yang dipadukan dengan coklat dan keju asli', 30000, 'Martabak-Keju-Coklat-Encek_7.png', '2022-10-03 14:21:49'),
(19, 16, 22, 'Martabak Keju', 'Martabak manis yang dipadukan dengan keju asli yang berlimpah', 25000, 'Martabak-Keju-Encek_7.png', '2022-10-03 14:22:48'),
(20, 15, 10, 'Mie Ayam Asin', 'Mie ayam dengan rasa asin yang khas dan lezat', 15000, 'MIE-Asin-Bangka-_7.png', '2022-10-03 14:24:21'),
(21, 15, 10, 'Mie Ayam Yamin', 'Mie ayam yamin dengan rasa manis yang khas dan lezat', 16000, 'MIE-Yamin-Bangka_7.png', '2022-10-03 14:25:08'),
(22, 15, 17, 'Nasi Tim Ayam in Jakarta', 'Nasi tim yang dipadukan dengan Ayam dan bumbu yang khas nan lezat', 25000, 'NASI-TIM-NEW_7.png', '2022-10-03 14:26:12'),
(23, 19, 10, 'Sate Kambing', 'Sate dengan bumbu kacang yang kental, dan daging kambing yang lembut', 2000, 'Sate-Ayam_7.png', '2022-10-03 14:41:51'),
(24, 20, 21, 'Kebab Ayam', 'Kebab ayam dengan balutan tortila yang lembu dengan bumbu rempah kaya rasa dari timur.', 15000, 'KEBAB-JAY-NEW_7.png', '2022-10-03 14:44:59'),
(27, 21, 15, 'VIdeo Editor', 'Editing video cepat dengan waktu pengerjaan 2-3 Hari dengan kriteria. \r\nComplete Brief \r\nFootage yang tersusun', 100000, 'peter-stumpf-FhZEpxtTI_Y-unsplash_7.jpg', '2022-10-05 15:43:48'),
(28, 21, 29, 'Music Composer', 'Musik composer digital yang memberikan anda backsound dan soundtrack untuk video anda. Dengan waktu pengerjaan 5-7 Hari yaitu dengan kriteria .\r\n\r\nFull Creative Brief\r\nReference', 250000, 'james-stamler-k3heD_KwH0A-unsplash_7.jpg', '2022-10-05 16:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_umkm_jasa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jml_rating` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_umkm_jasa`, `id_user`, `jml_rating`, `judul`, `deskripsi`, `status`, `created_at`) VALUES
(7, 20, 11, 10, 'Rasa Kebab', 'Rasa kebabnya enak pooll', 1, '2022-10-14 22:57:31'),
(8, 21, 11, 9, 'Mantap', 'Musik komposernya okee', 1, '2022-10-14 23:00:53'),
(9, 20, 2, 8, 'Mantap', 'Recomended', 1, '2022-10-14 23:14:45'),
(10, 19, 2, 7, 'Mantap', 'Rasa satenya mantep, bumbunya pas', 1, '2022-10-15 00:06:47'),
(11, 0, 0, 0, 'Judul', 'Deskripsi', 0, '2022-10-15 00:56:31'),
(12, 13, 10, 9, 'Bagus', 'Digivoks sangat bagus', 0, '2022-10-15 00:56:31'),
(13, 14, 10, 7, 'Good Job', 'Rasanya enak', 0, '2022-10-15 00:56:31'),
(14, 13, 10, 9, 'Bagus', 'Digivoks sangat bagus', 0, '2022-10-15 00:56:31'),
(15, 14, 10, 7, 'Good Job', 'Rasanya enak', 0, '2022-10-15 00:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`, `created_at`) VALUES
(1, 'administrator', '2022-09-27 00:15:51'),
(2, 'user', '2022-09-27 00:16:16'),
(3, 'partner', '2022-09-27 00:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `umkm_jasa`
--

CREATE TABLE `umkm_jasa` (
  `id_umkm_jasa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jeniskategori` int(11) NOT NULL,
  `nama_umkmjasa` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jam_operasional` varchar(100) NOT NULL,
  `nohp_umkmjasa` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `jenis` int(11) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm_jasa`
--

INSERT INTO `umkm_jasa` (`id_umkm_jasa`, `id_user`, `id_jeniskategori`, `nama_umkmjasa`, `deskripsi`, `jam_operasional`, `nohp_umkmjasa`, `kota`, `lokasi`, `thumbnail`, `jenis`, `slug`, `created_at`) VALUES
(13, 1, 13, 'Digivoks', 'Digivoks adalah digital agensi yang memberikan jasa desain grafis, pembuatan website, dan editing video.', '08.00 - 20.00', '62895377562532', 'Kota Bogor', 'https://goo.gl/maps/TCkisqx5pQGHUesm6', 'Banner-Desain_7.PNG', 2, 'digivoks', '2022-10-01 18:18:36'),
(14, 9, 17, 'RM Makan Ayam Bakar Blambangan', 'Ayam Bakar Blambangan adalah ayam bakar khas Palembang yang memiliki ciri khas yaitu berupa marinasi ayam yang sangat nikmat dan penuh rempah rempah. Ditambah dengan bumbu sambal yang lumayan membuat ayam blambangan menggoyang lidah penikmatnya.', '10.00 – 22.00', '6285283884218', 'Kab. Bogor', 'https://goo.gl/maps/6LgyFAZRGymrZ52T6', 'Banner-Preview_7.jpg', 1, 'rm-makan-ayam-bakar-blambangan', '2022-10-01 21:22:35'),
(15, 9, 18, 'Mie Ayam Bangka AL', 'Mi kenyal yang dimasak dengan kecap ini cocok banget untuk memanjakan lidahmu malam ini.\r\nSelain itu, ada juga bakso dan tahu dengan kuah kaldu gurih yang bisa kamu campurkan sendiri.\r\nUntuk menikmati makan malam di warung Mie Ayam Bakso Bangka AL, kamu juga bisa pesan es campur yang menyegarkan.', '10.00 – 23.00', '628128145888', 'Kota Bogor', 'https://goo.gl/maps/gny2LHqr2a7xfBQy5', 'Banner-Preview_71.jpg', 1, 'mie-ayam-bangka-al', '2022-10-01 22:19:06'),
(16, 9, 10, 'Martabak Encek Suryakencana', 'Martabak Encek atau yang disebut juga dengan Martabak Suken ini merupakan salah satu yang kondang di Bogor. Keberadaanya meramaikan dunia kuliner sudah sejak puluhan tahun yang lalu.\r\nTepatnya berjualan sejak tahun 1975, dan tetap eksis samapi sekarang ini. Bahkan, saking larisnya, baru 3 jam saja sudah ludes diburu pembeli. Para pembeli datang bahkan sebelum buka, dan antre dengan sabarnya.', '10.00 – 18.00', '628567079427', 'Kota Bogor', 'https://g.page/martabak-bangka-legenda?share', 'Martabak-Banner_7.jpeg', 1, 'martabak-encek-suryakencana', '2022-10-01 22:20:42'),
(17, 9, 10, 'Lumpia Basah Suryakencana', 'Lumpia Gang aut ini termasuk satu di antara tempat makan lumpia basah yang cukup populer di Bogor.\r\nSudah ada sejak 1972, Lumpia Gang Aut ini bisa kamu kunjungi di Gang Aut, Jl Suryakencana.\r\nTidak sulit menemukan lumpia ini karena punya ciri khas gerobak warna hijau yang selalu mangkal di depan Ngo Hiang.\r\nSatu porsinya terdiri dari isian yang komplit yaitu ada tauge, bengkuang, tahu, ebi giling, dan telur.\r\nMeski sudah sangat terkenal dan legendaris, Lumpia Gang Aut hanya dibanderol sebesar Rp 15 ribu saja.', '09.00 – 18.00', '6289533919358', 'Kota Bogor', 'https://goo.gl/maps/D7X2MPGayetZ7suy5', 'Banner-Lumpia_7.png', 1, 'lumpia-basah-suryakencana', '2022-10-01 22:25:12'),
(18, 9, 10, 'Cungkring Pak Jumat Suryakencana', 'Dalam bahasa Sunda, Cungkring itu adalah potongan kikil dari bagian kepala sapi yang dimasak bumbu kuning. Kemudian diguyur bumbu kacang.\r\nPak Jumat sendiri sudah mulai berjualan sejak tahun 1975. Cungkring Pak Jumat terletak di ujung jalan Suryakencana lebih dekat ke Gang Aut. Lokasinya strategis karena persis di bahu jalan. Bisa take away atau makan di tempat.', '07.00 – 17.00', '628981636162', 'Kota Bogor', 'https://goo.gl/maps/4Fb9y4wPQbnYSSA46', 'Banner-Cungkring_7.png', 1, 'cungkring-pak-jumat-suryakencana', '2022-10-01 22:29:03'),
(19, 9, 17, 'Sate Anda Kali Abang', 'Sate Anda Kali Abang sudah ada sejak tahun 1978, yang merupakan milik Haji Thohir Murtado. Di sini, kamu bisa menikmati aneka menu oalahan daging. Ada tongseng, sop iga, gulai, hingga sate yang menjadi menu andalananya. Harga per porsi sate kambing berisikan 10 tusuk dibanderol Rp 40.000. Sementara untuk menu sop, tongseng, dan gulai dibanderol dengan harga mulai dari Rp 35.000-40.000.', '10.00 - 20.30', '0218877881', 'Bekasi', 'https://goo.gl/maps/cBYbu72kD5fWGkkj9', 'banner_7.jpg', 1, 'sate-anda-kali-abang', '2022-10-03 11:06:28'),
(20, 1, 10, 'Kebab Jay', 'Kebab Ayam & Sapi', '15.00 - 22.00', '6282112411808', 'Jakarta', 'https://www.google.com/maps/dir//kebab+jay/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e698ceec0cae95b:0x28d4', 'kbab_jay_9.jpg', 1, 'kebab-jay', '2022-10-03 14:06:22'),
(21, 1, 15, 'Hearman Studio', 'Hearman Studio merupakan sebuah production house yang bergerak di bidang Musik dan juga Videografi. Dengan style visual yang modern dan elegan membuat hearman studio memiliki kredibilitas dalam seni visual.', '07.00 - 19.00', '6285892878087', 'Kab.Bogor', '-', 'Preview-02-01_7.png', 2, 'hearman-studio', '2022-10-05 15:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nohp_user` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `nama_user`, `email_user`, `password`, `nohp_user`, `is_active`, `created_at`) VALUES
(1, 3, 'CANDRA WIJAYA', 'canderaw8@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '91806', 1, '2022-09-27 11:21:04'),
(2, 1, 'Candra Wijaya', 'candraw71@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0895377562532', 1, '2022-09-27 11:30:55'),
(7, 1, 'Farhan Hermansyah', 'farhankaldu@gmail.com', 'd1bbb2af69fd350b6d6bd88655757b47', '085892878087', 1, '2022-09-27 13:12:59'),
(9, 1, 'Dewa Satria', 'dewa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '081311293294', 1, '2022-10-01 17:56:58'),
(10, 2, 'Test User', 'zeroyproud@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0895377562532', 1, '2022-10-01 23:47:07'),
(11, 1, 'Admin', 'admin@gmail.com', '1844156d4166d94387f1a4ad031ca5fa', '91806', 1, '2022-10-11 21:38:49'),
(18, 3, 'Budi', 'budi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '78782579', 1, '2022-10-15 01:02:19'),
(19, 2, 'Santo', 'santo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827893798', 1, '2022-10-15 01:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email_user`, `token`, `created_at`) VALUES
(5, 'fsfds@dsgsgd', 'WTDNQqW9f8D9s/a/jH6b5ktV7rARBdzuOhLzWN7U4Ik=', 1665733773);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_umkm_jasa` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_umkm_jasa`, `created_at`) VALUES
(14, 2, 17, '2022-10-01 23:43:40'),
(15, 2, 15, '2022-10-01 23:43:48'),
(16, 2, 16, '2022-10-01 23:44:04'),
(17, 10, 14, '2022-10-01 23:49:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kategori`
--
ALTER TABLE `jenis_kategori`
  ADD PRIMARY KEY (`id_jeniskategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jeniskategori` (`id_jeniskategori`),
  ADD KEY `id_umkm_jasa` (`id_umkm_jasa`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_umkm_jasa` (`id_umkm_jasa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `jml_rating` (`jml_rating`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `umkm_jasa`
--
ALTER TABLE `umkm_jasa`
  ADD PRIMARY KEY (`id_umkm_jasa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jeniskategori` (`id_jeniskategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_umkm_jasa` (`id_umkm_jasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kategori`
--
ALTER TABLE `jenis_kategori`
  MODIFY `id_jeniskategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `umkm_jasa`
--
ALTER TABLE `umkm_jasa`
  MODIFY `id_umkm_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
