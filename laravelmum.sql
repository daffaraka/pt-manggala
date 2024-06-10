-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2024 at 01:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id_agm` bigint(20) UNSIGNED NOT NULL,
  `nmagama` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id_agm`, `nmagama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(2, 'Kristen', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(3, 'Katolik', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(4, 'Hindu', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(5, 'Budha', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(6, 'Konghucu', '2024-05-31 01:24:58', '2024-05-31 01:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', NULL, NULL),
(2, 'Produksi', NULL, NULL),
(3, 'Logistik', NULL, NULL),
(4, 'HSE', NULL, NULL),
(5, 'HCGA', NULL, NULL),
(6, 'Plant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'I', NULL, NULL),
(2, 'II', NULL, NULL),
(3, 'III', NULL, NULL),
(4, 'IV', NULL, NULL),
(5, 'V', NULL, NULL),
(6, 'VI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darahs`
--

CREATE TABLE `golongan_darahs` (
  `id_darah` bigint(20) UNSIGNED NOT NULL,
  `nama_gol_darah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan_darahs`
--

INSERT INTO `golongan_darahs` (`id_darah`, `nama_gol_darah`, `created_at`, `updated_at`) VALUES
(1, 'A', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(2, 'B', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(3, 'AB', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(4, 'O', '2024-05-31 01:24:58', '2024-05-31 01:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keluars`
--

CREATE TABLE `jenis_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_keluars`
--

INSERT INTO `jenis_keluars` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Karyawan/ti Meninggal Dunia', NULL, NULL),
(2, 'Karyawan/ti Menundurkan Diri', NULL, NULL),
(3, 'Karyawan/ti Masa Perjanjian Kerja Untuk Waktu Tertentu', NULL, NULL),
(4, 'Reorganisasi Perusahaan', NULL, NULL),
(5, 'Karyawan/ti Tidak Memenuhi Syarat Pada Waktu Percobaan', NULL, NULL),
(6, 'Karyawan/ti Tidak Memenuhi Prestasi Kerja Yang Ditetapkan Perusahaan', NULL, NULL),
(7, 'Karyawan/ti Tidak Mampu Bekerja Karena Alasan Kesehatan', NULL, NULL),
(8, 'Karyawan/ti Melakukan Kesalahan Berat atau Berulang ', NULL, NULL),
(9, 'Karyawan/ti Ditahan Pihak Yang Berwajib', NULL, NULL),
(10, 'Karyawan/ti Memasuki Masa Pensiun/Lanjut Usia', NULL, NULL),
(11, 'Pemberi Pekerjaan Mengurangi Sebagian Volume Pekerjaan dan Atau Seluruh Pekerjaan Kepada Perusahaan Lain', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
  `kdstatusk` bigint(20) UNSIGNED NOT NULL,
  `nmstatusk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO `keluargas` (`kdstatusk`, `nmstatusk`, `created_at`, `updated_at`) VALUES
(1, 'Kawin', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(2, 'Belum Kawin', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(3, 'Cerai', '2024-05-31 01:24:58', '2024-05-31 01:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_12_28_004829_create_pegawais_table', 1),
(10, '2022_12_28_042637_create_agamas_table', 1),
(11, '2022_12_28_042703_create_negaras_table', 1),
(12, '2022_12_28_042746_create_golongan_darahs_table', 1),
(13, '2022_12_28_042813_create_keluargas_table', 1),
(14, '2022_12_28_042931_create_pendidikans_table', 1),
(15, '2022_12_28_042944_create_pelatihans_table', 1),
(16, '2022_12_28_042959_create_pengalamen_table', 1),
(17, '2024_05_31_090603_add_new_column_to_pegawais_table', 2),
(18, '2024_06_01_025239_create_penempatans_table', 3),
(19, '2024_06_01_033339_create_penempatans_table', 4),
(20, '2024_06_01_071335_create_penempatans_table', 5),
(21, '2024_06_01_071740_add_penempatan_to_pegawais_table', 6),
(22, '2024_06_01_082703_create_penempatans_table', 7),
(23, '2024_06_02_024402_create_pohs_table', 8),
(24, '2024_06_02_025037_add_tambahandata_to_pegawais_table', 9),
(25, '2024_06_02_031304_add_tambahandatabaru_to_pegawais_table', 10),
(26, '2024_06_02_033109_create_departments_table', 11),
(27, '2024_06_02_034250_create_golongans_table', 12),
(28, '2024_06_02_035328_create_jenis_keluars_table', 13),
(29, '2024_06_02_041250_create_status_aktivs_table', 14),
(30, '2024_06_03_065144_add_role_to_users_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `negaras`
--

CREATE TABLE `negaras` (
  `id_ngr` bigint(20) UNSIGNED NOT NULL,
  `nm_negara` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `negaras`
--

INSERT INTO `negaras` (`id_ngr`, `nm_negara`, `created_at`, `updated_at`) VALUES
(3, 'Indonesia', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(5, 'Malaysia', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(9, 'Singapura', '2024-05-31 01:24:58', '2024-05-31 01:24:58'),
(10, 'Thailand', '2024-05-31 01:24:58', '2024-05-31 01:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `nohp` varchar(40) NOT NULL,
  `agama_id` smallint(6) DEFAULT NULL,
  `negara_id` smallint(6) DEFAULT NULL,
  `gol_darah_id` smallint(6) DEFAULT NULL,
  `skeluarga_id` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `note_keluar` varchar(255) DEFAULT NULL,
  `dokumen_satu` varchar(100) DEFAULT NULL,
  `dokumen_dua` varchar(100) DEFAULT NULL,
  `dokumen_tiga` varchar(100) DEFAULT NULL,
  `norek` bigint(20) DEFAULT NULL,
  `namabank` varchar(100) DEFAULT NULL,
  `id_penempatans` int(11) DEFAULT NULL,
  `id_poh` bigint(20) DEFAULT NULL,
  `id_dept` bigint(20) DEFAULT NULL,
  `id_golongan` bigint(20) DEFAULT NULL,
  `id_jeniskeluar` bigint(20) DEFAULT NULL,
  `id_statusaktiv` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nip`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `foto`, `nohp`, `agama_id`, `negara_id`, `gol_darah_id`, `skeluarga_id`, `created_at`, `updated_at`, `nik`, `desa`, `kecamatan`, `kabupaten`, `tgl_masuk`, `tgl_keluar`, `note_keluar`, `dokumen_satu`, `dokumen_dua`, `dokumen_tiga`, `norek`, `namabank`, `id_penempatans`, `id_poh`, `id_dept`, `id_golongan`, `id_jeniskeluar`, `id_statusaktiv`) VALUES
(1, '773468430426', 'Najam Samosir', 'Palembang', '2012-07-13', 'Laki-laki', 'JL. Diponegoro No. 40 B, Kec. Trenggalek, Kab. Trenggalek, Prov. Jawa Timur', NULL, '(+62) 513 1334 3652', 1, 3, 4, 2, '2024-05-31 01:24:58', '2024-06-02 03:27:40', '234234523542', 'Sumbergedong', 'titik', 'TRENGGALEK', '2024-06-13', '2024-06-06', 'mag', NULL, NULL, NULL, 231434435, 'CINTA', 1, 2, 2, 2, 3, 1),
(2, '990004547674', 'Cornelia Hastuti S.E.', 'Sawahlunto', '2016-10-19', 'Laki-laki', 'RT 06 RW 02, Ds. Dongko, Kec. Dongko, Kab. Trenggalek', NULL, '085331200472', 3, 3, 2, 3, '2024-05-31 01:24:58', '2024-06-02 01:54:23', '111111111111', 'Dongko', 'Dongko', 'KAB. TRENGGALEK', '2024-06-07', '2024-06-13', 'SAKIT HATI', NULL, NULL, NULL, 111121111, 'BNI', 2, 1, 4, 4, NULL, 1),
(3, '616588361558', 'Gasti Rini Wahyuni M.Ak', 'Bontang', '2016-08-18', 'Perempuan', 'Ds. Flores No. 464, Tanjungbalai 66686, Kalteng', NULL, '(+62) 345 1787 340', 1, 3, 1, 3, '2024-05-31 01:24:58', '2024-06-02 01:10:48', '3503042907000003', 'Sumbergedong', 'koma', 'dededee', '2024-06-12', '2024-06-13', 'SAKIT HATI', NULL, NULL, NULL, 5343234123, 'BCA', 4, 2, 2, 4, 1, 2),
(4, '620112491627', 'Marsito Prayoga', 'Kediri', '1993-01-31', 'Perempuan', 'Gg. Rajawali Timur No. 428, Administrasi Jakarta Timur 93986, Malut', NULL, '(+62) 762 9871 9002', 4, 4, 4, 1, '2024-05-31 01:24:58', '2024-05-31 01:24:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '066072711988', 'Shakila Maryati S.T.', 'Batu', '1984-07-18', 'Laki-laki', 'Kpg. Dipatiukur No. 223, Jambi 53132, Kepri', NULL, '(+62) 989 8840 2001', 4, 1, 1, 2, '2024-05-31 01:24:58', '2024-05-31 01:24:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '715132597895', 'Ellis Anggraini', 'Bogor', '2022-08-28', 'Laki-laki', 'Dk. Sutami No. 865, Sorong 88956, Aceh', NULL, '0221 4276 867', 4, NULL, 2, 1, '2024-05-31 01:24:58', '2024-06-02 01:42:12', '12213123', 'sdfdsf', 'sdfsdf', 'sdfsdf', '2024-06-11', '2024-06-21', 'dsfsdfsdf', NULL, NULL, NULL, 213123123, 'dsfdsfsdf', NULL, NULL, NULL, NULL, NULL, 2),
(7, '090966082199', 'Juli Maryati', 'Sibolga', '1999-01-28', 'Laki-laki', 'Kpg. Acordion No. 756, Sibolga 76228, Sumbar', NULL, '(+62) 804 4030 2104', 5, 5, 2, 3, '2024-05-31 01:24:58', '2024-06-02 01:11:46', '333333333', 'Sumbergedong', 'Trenggalek', 'tulungagung', '2024-06-19', '2024-06-13', 'sadasdasd', NULL, NULL, NULL, 435984352, 'BCA', 4, 3, 3, 4, 9, 2),
(8, '290515605236', 'Slamet Winarno', 'Bengkulu', '2013-11-01', 'Perempuan', 'Gg. Yos No. 352, Bengkulu 17281, DKI', NULL, '0698 8316 860', 1, 2, 4, 1, '2024-05-31 01:24:58', '2024-05-31 01:24:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '974415011496', 'Lala Umi Kusmawati M.Ak', 'Sukabumi', '1991-10-30', 'Perempuan', 'Psr. Jend. A. Yani No. 528, Administrasi Jakarta Pusat 93592, NTT', NULL, '(+62) 753 5207 4265', 4, 9, 4, 3, '2024-05-31 01:24:58', '2024-06-03 02:34:53', '324723647', 'Muara', 'Danau', 'Toba', '2024-06-29', '2024-06-30', 'sakit perut', NULL, NULL, NULL, 2136127213, 'Mandiri', 5, 2, 5, 6, 4, 1),
(10, '908880359972', 'Warsita Manullang', 'Administrasi Jakarta Timur', '1998-08-13', 'Perempuan', 'Jr. Lumban Tobing No. 371, Bau-Bau 78213, Bali', NULL, '0766 5986 879', 1, 3, 3, 2, '2024-05-31 01:24:58', '2024-05-31 01:24:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '1212131313', 'Sugeng Riyono', 'Condet', '2000-07-04', 'Laki-laki', 'JL. Diponegoro No. 40 B, Kel. Sumbergedong, Kec. Trenggalek, Kab. Trenggalek, Jawa Timur', NULL, '085331200472', 1, 3, 4, 2, '2024-06-02 01:06:26', '2024-06-02 01:06:26', '213214234234', 'titik', 'prigi', 'Trenggalek', '2024-06-20', '2024-06-20', 'mag', NULL, NULL, NULL, 214234345345, 'BCA', 1, 1, 3, 6, 1, 1),
(54, '350403628344', 'Alfaridzi Kimi', 'Semarang', '2015-01-10', 'Laki-laki', 'RT 06 RW 02, Ds. Dongko, Kec. Dongko, Kab. Trenggalek', NULL, '085331200111', 5, 9, 3, 3, '2024-06-02 17:14:38', '2024-06-02 21:38:51', '112343244322', 'Lahat', 'Kikim', 'Kab. Muara Enim', '2024-06-01', '2024-06-04', 'SAKIT HATI', NULL, NULL, NULL, 3343234432112, 'MANDIRI', 1, 3, 5, 3, 2, 1),
(55, '979795854', 'Komang Jois', 'Trenggalek', '2024-06-06', 'Laki-laki', 'RT 06 RW 02, Ds. Dongko, Kec. Dongko, Kab. Trenggalek', NULL, '085331200472', NULL, 3, 2, 1, '2024-06-03 02:14:36', '2024-06-03 02:14:36', '0658569340', 'Dongko', 'Trenggalek', 'KAB. TRENGGALEK', '2024-06-04', '2024-06-13', 'adssd', NULL, NULL, NULL, 4353464352, 'BRI', NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pelatihan` date NOT NULL,
  `topik_pelatihan` varchar(255) NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `t_pdk` varchar(20) NOT NULL,
  `d_pdk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penempatans`
--

CREATE TABLE `penempatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penempatans`
--

INSERT INTO `penempatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'BAS', NULL, NULL),
(2, 'SLR', NULL, NULL),
(3, 'BP', NULL, NULL),
(4, 'GAM', NULL, NULL),
(5, 'PWK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengalamen`
--

CREATE TABLE `pengalamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `nm_pekerjaan` varchar(255) NOT NULL,
  `d_pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pohs`
--

CREATE TABLE `pohs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pohs`
--

INSERT INTO `pohs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Palembang', NULL, NULL),
(2, 'Tangerang', NULL, NULL),
(3, 'Muara Enim', NULL, NULL),
(4, 'Lahat', NULL, NULL),
(5, 'Jakarta', NULL, NULL),
(6, 'Jakarta', NULL, NULL),
(7, 'Samarinda', NULL, NULL),
(8, 'Serpong', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_aktivs`
--

CREATE TABLE `status_aktivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_aktivs`
--

INSERT INTO `status_aktivs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Aktiv', NULL, NULL),
(2, 'Tidak Aktiv', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin', 'admin@adm.id', NULL, '$2y$10$Em8zss8pVsYyr6zGqOyTfeLTxyaajeuPYivgvQwVZH8moeM5YTH2.', NULL, '2024-05-31 01:24:58', '2024-05-31 01:24:58', 'user'),
(2, 'hilmy', 'supervising', 'supervising@gmail.com', NULL, '111111', NULL, NULL, NULL, 'spv'),
(3, 'naufal', 'karyawan', 'karyawan@gmail.com', NULL, '654321', NULL, NULL, NULL, 'kar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id_agm`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
  ADD PRIMARY KEY (`id_darah`);

--
-- Indexes for table `jenis_keluars`
--
ALTER TABLE `jenis_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`kdstatusk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negaras`
--
ALTER TABLE `negaras`
  ADD PRIMARY KEY (`id_ngr`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`);

--
-- Indexes for table `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihans_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikans_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `penempatans`
--
ALTER TABLE `penempatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengalamen`
--
ALTER TABLE `pengalamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengalamen_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pohs`
--
ALTER TABLE `pohs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_aktivs`
--
ALTER TABLE `status_aktivs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id_agm` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
  MODIFY `id_darah` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_keluars`
--
ALTER TABLE `jenis_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `kdstatusk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `negaras`
--
ALTER TABLE `negaras`
  MODIFY `id_ngr` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penempatans`
--
ALTER TABLE `penempatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengalamen`
--
ALTER TABLE `pengalamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pohs`
--
ALTER TABLE `pohs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_aktivs`
--
ALTER TABLE `status_aktivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD CONSTRAINT `pelatihans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD CONSTRAINT `pendidikans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `pengalamen`
--
ALTER TABLE `pengalamen`
  ADD CONSTRAINT `pengalamen_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
