-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 04:57 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `file_gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`, `file_gambar`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'file_1603532098.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama`) VALUES
(1, 'Teknologi'),
(2, 'Kesehatan'),
(3, 'Otomotif'),
(4, 'ngasal');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `idpenulis` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idpost`, `idpenulis`, `isi`, `tgl_update`) VALUES
(1, 2, 4, 'biasa aja', '2020-10-22 06:39:27'),
(2, 1, 5, 'waaaaa', '2020-10-23 07:29:16'),
(3, 2, 5, 'kskskskssk', '2020-10-23 07:29:56'),
(5, 2, 4, 'mantul', '2020-10-23 12:21:34'),
(6, 2, 4, 'terimakasih informasinya', '2020-10-23 12:22:28'),
(7, 2, 7, 'fixxx bagus banget :)', '2020-10-23 12:23:30'),
(9, 3, 7, 'samlekom', '2020-10-23 12:45:43'),
(10, 1, 7, 'mantap jiwaaa', '2020-10-23 12:46:08'),
(13, 2, 4, 'LOL', '2020-10-23 15:02:27'),
(14, 2, 4, 'weke weke', '2020-10-24 00:05:03'),
(15, 8, 4, 'first', '2020-10-24 05:49:43'),
(16, 7, 4, 'first ye :V', '2020-10-24 05:50:07'),
(17, 8, 4, 'ini sample komen', '2020-10-24 09:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `idpenulis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `file_gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`idpenulis`, `nama`, `password`, `alamat`, `kota`, `email`, `no_telp`, `file_gambar`) VALUES
(4, 'Faridi Yr', '81dc9bdb52d04dc20036dbd8313ed055', 'Tembalang', 'Semarang', 'faridiyr@gmail.com', '1234567890', 'file_1603352068.jpeg'),
(5, 'cathrine', 'de3709b8e6f81a4ef5a858b7a2d28883', 'semarang', 'semarang kota', 'cath@gmail.com', '123412341234', 'file_1603439425.png'),
(7, 'dessy', 'de3709b8e6f81a4ef5a858b7a2d28883', 'mana hayo', 'wkwkwk', 'des@gmail.com', '12345654321', 'default_penulis.png'),
(8, 'indah', 'de3709b8e6f81a4ef5a858b7a2d28883', 'rumah', 'smrg', 'ndah@gmail.com', '333444555666', 'default_penulis.png'),
(9, 'Julie Smith', '81dc9bdb52d04dc20036dbd8313ed055', 'alamat', 'semarang', 'email@gmail.com', '1234567890', 'default_penulis.png');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `isi_post` text NOT NULL,
  `file_gambar` varchar(250) NOT NULL,
  `tgl_insert` date NOT NULL,
  `tgl_update` date NOT NULL,
  `idpenulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `judul`, `idkategori`, `isi_post`, `file_gambar`, `tgl_insert`, `tgl_update`, `idpenulis`) VALUES
(1, 'HTML', 1, '<p style=\"text-align:justify\">HTML adalah singkatan dari HyperText Markup Language yaitu bahasa pemrograman standar yang digunakan untuk membuat sebuah halaman web, yang kemudian dapat diakses untuk menampilkan berbagai informasi di dalam sebuah penjelajah web Internet (Browser). HTML dapat juga digunakan sebagai link link antara file-file dalam situs atau dalam komputer dengan menggunakan localhost, atau link yang menghubungkan antar situs dalam dunia internet. Supaya dapat menghasilkan tampilan wujud yang terintegerasi Pemformatan hiperteks sederhana ditulis dalam berkas format ASCII sehingga menjadi halaman web dengan perintah-perintah HTML. HTML merupakan sebuah bahasa yang bermula bahasa yang sebelumnya banyak dipakai di dunia percetakan dan penerbirtan yang disebut Standard Generalized Markup Language (SGML).</p>\r\n', 'html.jpg', '2020-10-07', '2020-10-08', 4),
(2, 'Manfaat Tanaman Kaktus', 2, '<p style=\"text-align:justify\">Manfaat tanaman kaktus di dalam ruangan tentunya dapat mempercantik ruangan dengan bentuknya yang unik dan indah. Tidak jarang sekarang ini cukup banyak yang memelihara kaktus di rumah. Namun, tidak hanya berfungsi untuk memperindah ruangan, kaktus ternyata juga baik untuk kesehatan. Ada berbagai macam kaktus dengan beragam variasi bentuk, ukuran, hingga warna yang perlu dipertimbangkan dalam memeliharanya. Berapa jenis kaktus seperti kaktus Parodia, Haworthia (Zebra Cactus), Beaver Tail, Chepalocereus senilis, Pincushion, Fairy Castle dan Kaktus hias Gymnocalycium bisa jadi pilihan untuk pemula karena memiliki daya tahan ekstra dan tidak perlu perawatan yang sulit. Manfaat tanaman kaktus di dalam ruangan terutama berkaitan dengan kebersihan udara. Tidak heran tanaman kaktus menjadi banyak digemari, hal ini karena manfaatnya yang dapat membantu pernapasan dan membersihkan udara di dalam ruangan sangat baik untuk kesehatan.</p>\r\n', 'file_1603368239.jpg', '2020-10-15', '2020-10-20', 4),
(3, 'New Honda CBR250RR SP Vs Kawasaki Ninja ZX25R 4 Cylinder', 3, '<p style=\"text-align:justify\">Akhir akhir ini Dunia otomotif di gegerkan dengan launching nya produk baru dari Kawasaki ya itu ZX25R yang bekapasitas mesin 4 cylinder. PT Kawasaki Motor Indonesia (KMI) merilis motor yang juga disebut Ninja ZX-25R ini secara virtual melalui channel YouTube KMI pada Jumat (10/7/2020). Indonesia dipilih sebagai tempat debut Kawasaki Ninja 250 ZX25R 4 silinder terbaru ini untuk pasar global. Maka dari itu hal ini membuat para perusahaan otomotif terkenal tidak akan tinggal diam melihat saingan nya rilis produk terbarunya. Honda dalam kubu yang panas pada kali ini,Oleh sebab itu Honda tidak mau kalah dan menciptakan sebuah karya yang sangat luar biasa yaitu All New Honda CBR 250RR SP yang tentunya siap untuk saingi si hijau ZX25R.</p>\r\n', 'motor.jpg', '2020-10-11', '2020-10-12', 4),
(6, 'tes tes', 1, '<p>ini contoh</p>\r\n', 'file_1603437975.jpg', '2020-10-20', '2020-10-20', 5),
(7, 'wawww', 1, '<p>wkwkwwk</p>\r\n', 'file_1603517545.jpg', '2020-10-21', '2020-10-21', 4),
(8, 'apa yaaa', 4, '<p>gagagagaaga</p>\r\n', 'file_1603518069.jpg', '2020-10-29', '2020-10-29', 7),
(9, 'first', 4, '<p>22222222</p>\r\n', 'file_1603518951.jpg', '2020-10-29', '2020-10-29', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`),
  ADD KEY `idpost` (`idpost`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`idpenulis`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `idpenulis` (`idpenulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `idpenulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `idpost` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `idpenulis` FOREIGN KEY (`idpenulis`) REFERENCES `penulis` (`idpenulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
