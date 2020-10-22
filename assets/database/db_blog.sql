-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 06:19 AM
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
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'default_admin.png');

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
(3, 'Otomotif');

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
(4, 'Faridi Yr', '81dc9bdb52d04dc20036dbd8313ed055', 'Tembalang', 'Semarang', 'faridiyr@gmail.com', '1234567890', 'file_1603337294.jpeg'),
(5, 'cathrine', '81dc9bdb52d04dc20036dbd8313ed055', 'semarang', 'semarang kota', 'cath@gmail.com', '123412341234', 'file_1603340354.jpg');

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
(1, 'HTML', 1, 'HTML adalah singkatan dari HyperText Markup Language yaitu bahasa pemrograman standar yang digunakan untuk membuat sebuah halaman web, yang kemudian dapat diakses untuk menampilkan berbagai informasi di dalam sebuah penjelajah web Internet (Browser). HTML dapat juga digunakan sebagai link link antara file-file dalam situs atau dalam komputer dengan menggunakan localhost, atau link yang menghubungkan antar situs dalam dunia internet.\r\nSupaya dapat menghasilkan tampilan wujud yang terintegerasi Pemformatan hiperteks sederhana ditulis dalam berkas format ASCII sehingga menjadi halaman web dengan perintah-perintah HTML.\r\nHTML merupakan sebuah bahasa yang bermula bahasa yang sebelumnya banyak dipakai di dunia percetakan dan penerbirtan yang disebut Standard Generalized Markup Language (SGML).', 'html.jpg', '2020-10-07', '2020-10-08', 4),
(2, 'Manfaat Tanaman Kaktus', 2, 'Manfaat tanaman kaktus di dalam ruangan tentunya dapat mempercantik ruangan dengan bentuknya yang unik dan indah. Tidak jarang sekarang ini cukup banyak yang memelihara kaktus di rumah. Namun, tidak hanya berfungsi untuk memperindah ruangan, kaktus ternyata juga baik untuk kesehatan.\r\nAda berbagai macam kaktus dengan beragam variasi bentuk, ukuran, hingga warna yang perlu dipertimbangkan dalam memeliharanya. Berapa jenis kaktus seperti kaktus Parodia, Haworthia (Zebra Cactus), Beaver Tail, Chepalocereus senilis, Pincushion, Fairy Castle dan Kaktus hias Gymnocalycium bisa jadi pilihan untuk pemula karena memiliki daya tahan ekstra dan tidak perlu perawatan yang sulit.\r\nManfaat tanaman kaktus di dalam ruangan terutama berkaitan dengan kebersihan udara. Tidak heran tanaman kaktus menjadi banyak digemari, hal ini karena manfaatnya yang dapat membantu pernapasan dan membersihkan udara di dalam ruangan sangat baik untuk kesehatan.', 'kaktus.jpg', '2020-10-15', '2020-10-16', 4),
(3, 'New Honda CBR250RR SP Vs Kawasaki Ninja ZX25R 4 Cylinder', 3, 'Akhir akhir ini Dunia otomotif di gegerkan dengan launching nya produk baru dari Kawasaki ya itu ZX25R yang bekapasitas mesin 4 cylinder.\r\nPT Kawasaki Motor Indonesia (KMI) merilis motor yang juga disebut Ninja ZX-25R ini secara virtual melalui channel YouTube KMI pada Jumat (10/7/2020). Indonesia dipilih sebagai tempat debut Kawasaki Ninja 250 ZX25R 4 silinder terbaru ini untuk pasar global.\r\nMaka dari itu hal ini membuat para perusahaan otomotif terkenal tidak akan tinggal diam melihat saingan nya rilis produk terbarunya.\r\nHonda dalam kubu yang panas pada kali ini,Oleh sebab itu Honda tidak mau kalah dan menciptakan sebuah karya yang sangat luar biasa yaitu All New Honda CBR 250RR SP yang tentunya siap untuk saingi si hijau ZX25R.', 'motor.jpg', '2020-10-11', '2020-10-12', 4);

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
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `idpenulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
