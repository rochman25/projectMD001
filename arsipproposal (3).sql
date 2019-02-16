-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 16 Feb 2019 pada 15.56
-- Versi Server: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsipproposal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` char(2) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nidn`, `password`, `level`, `lastlogin`) VALUES
(1, '1234567', 'd738d68e5d6956f017bcb5baf9f59c72', 'OP', '2019-02-13 16:14:06'),
(2, '1234567', 'd738d68e5d6956f017bcb5baf9f59c72', 'AD', '2019-02-13 16:14:06'),
(10, '06123456', '7192c8469454c8bf70aa7ce08de27392', 'PE', '2019-02-13 21:07:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `idAnggota` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idUsulan` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `idAnggota`, `nama`, `idUsulan`, `status`) VALUES
(7, '06123456', 'Ramadani Firdaus, S.Kom., M.Si.', '13-02-19IN-pdma-12345671', 'Anggota'),
(8, '16.11.0068', 'Zaenurrochman', '13-02-19IN-pdma-12345671', 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jk` char(1) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `prodi` char(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `jp` varchar(30) NOT NULL,
  `ja` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `alamat`, `jk`, `tempat`, `tanggal_lahir`, `prodi`, `email`, `nohp`, `jp`, `ja`, `foto`) VALUES
('06123456', 'Ramadani Firdaus, M.Kom', 'Ajibarang', 'L', 'Banyumas', '2019-02-01', 'TI', 'ramdanifdrs@gmail.com', '081578988248', 'S2', 'tidak ada', '06123456_photo.png'),
('1234567', 'Zaenurrochman, S.Kom.', 'jln pramuka desa kalisari kecamatan cilongok rt07 / rw02', 'L', 'Banyumas', '1998-05-05', 'TI', 'zaenur.rochman98@gmail.com', '081578988248', 'S1', 'tidak ada', '1234567_photo.png'),
('12345678', 'Ramadani Firdaus', 'Jl. Letjen Pol Sumarto Watumas Purwanegara Purwokerto, Banyumas', '', 'Purwokerto', '2019-02-03', 'TI', 'zaenur.rochman98@gmail.com', '081578988248', '', '', '12345678_photo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`) VALUES
(1, 'Analisis Situasi (Kondisi Mitra saat ini, Persoalan umum yang dihadapi mitra)', '20'),
(2, 'Permasalahan prioritas Mitra dan Solusi yang ditawarkan (Kecocokan permasalahan, solusi dan kompetensi tim)', '15'),
(3, 'Target Luaran (Jenis Luaran dan spesifikasinya sesuai kegiatan yang diusulkan)', '15'),
(4, 'Ketepatan Metode pendekatan untuk mengatasi permasalahan , Rencana kegiatan, kontribusi partisipasi mitra', '20'),
(5, 'Kelayakan PT (Kualifikasi Tim Pelaksana, Relevansi Skill TIm, Sinergisme Tim, Pengalaman Kemasyarakatan, Organisasi Tim, Jadwal Kegiatan, Kelengkapan Lampiran)', '10'),
(6, 'Biaya Pekerjaan Kelayakan Usulan Biaya (Honorarium (maksimum 30%), Bahan Habis, Peralatan , Perjalanan, Lain-Lain pengeluaran)', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `idUsulan` varchar(30) NOT NULL,
  `rekomendasibiaya` float NOT NULL,
  `komentar` text NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `tgl_buka` datetime NOT NULL,
  `tgl_tutup` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `nama`, `status`) VALUES
(1, '2018/2019', 'deactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `abstrak` text NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `latbel` text NOT NULL,
  `tujuan` text NOT NULL,
  `manfaat` text NOT NULL,
  `tinjauan_pustaka` text NOT NULL,
  `biaya` float NOT NULL,
  `luaran` text NOT NULL,
  `analisa` text NOT NULL,
  `permasalahan` text NOT NULL,
  `solusi` text NOT NULL,
  `rab` varchar(60) NOT NULL,
  `metopel` varchar(60) NOT NULL,
  `jadwal` varchar(60) NOT NULL,
  `pendukung` varchar(60) NOT NULL,
  `usulan` varchar(60) NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edited` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id`, `judul`, `tema`, `abstrak`, `keyword`, `latbel`, `tujuan`, `manfaat`, `tinjauan_pustaka`, `biaya`, `luaran`, `analisa`, `permasalahan`, `solusi`, `rab`, `metopel`, `jadwal`, `pendukung`, `usulan`, `uploaded`, `edited`) VALUES
('IN-amm-061234561', 'testing judul pengabdian', '', '', '', '', '', '', '', 0, 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'IN-amm-061234561_RAB_amikom.xls.', '', 'IN-amm-061234561_JADWAL_amikom.png.', 'IN-amm-061234561_Pendukung_amikom.zip.', 'IN-amm-061234561_Usulan_amikom.pdf.', '2019-02-16 04:48:06', '2019-02-16 04:48:06'),
('IN-pdma-12345671', 'Testing edit', 'Pengembangan sistem berbasis Kecerdasan buatan', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren,ipsum,dolor,sit,amet', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 900000, 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', '', '', '', 'IN-pdma-12345671_RAB_amikomxls', 'IN-pdma-12345671_METOPEL_amikom.png', 'IN-pdma-12345671_JADWAL_amikom.png', 'IN-pdma-12345671_Pendukung_amikom.zip', 'IN-pdma-12345671_Usulan_amikom.pdf', '2019-02-16 03:13:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nidn`, `password`, `lastlogin`) VALUES
(1, '1234567', '33ea3de1b981559db72236688cefd493', '2019-02-13 11:56:17'),
(2, '12345678', 'd738d68e5d6956f017bcb5baf9f59c72', '2019-02-13 11:55:02'),
(6, '06123456', 'ee11cbb19052e40b07aac0ca060c23ee', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id` varchar(30) NOT NULL,
  `idProposal` varchar(30) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `kelengkapan` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `stat` varchar(15) NOT NULL,
  `idPeriode` int(11) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `sumberdana` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id`, `idProposal`, `nidn`, `kelengkapan`, `keterangan`, `stat`, `idPeriode`, `jenis`, `sumberdana`) VALUES
('13-02-19IN-pdma-12345671', 'IN-pdma-12345671', '1234567', '', '', 'Menunggu', 1, 'pdma', 'Internal'),
('14-02-19IN-amm-061234561', 'IN-amm-061234561', '06123456', '', '', 'Menunggu', 1, 'amm', 'Internal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admindosen` (`nidn`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggotaUsulan` (`idUsulan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilaiUsulan` (`idUsulan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userdosen` (`nidn`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usulanproposal` (`idProposal`),
  ADD KEY `fk_usulandosen` (`nidn`),
  ADD KEY `fk_usulanperiode` (`idPeriode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admindosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilaiUsulan` FOREIGN KEY (`idUsulan`) REFERENCES `usulan` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_userdosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);

--
-- Ketidakleluasaan untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `fk_usulandosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `fk_usulanperiode` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `fk_usulanproposal` FOREIGN KEY (`idProposal`) REFERENCES `proposal` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
