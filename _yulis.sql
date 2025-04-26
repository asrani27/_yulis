/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : _yulis

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 26/04/2025 11:54:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of barang
-- ----------------------------
BEGIN;
INSERT INTO `barang` (`id`, `kode`, `nama`, `jenis`, `satuan`, `fungsi`, `keterangan`, `created_at`, `updated_at`) VALUES (1, '001', 'Meja Kerja', 'kayu', 'pcs', '- buat kerja', '- bekas', '2025-04-19 07:03:06', '2025-04-20 06:38:37');
COMMIT;

-- ----------------------------
-- Table structure for inventaris
-- ----------------------------
DROP TABLE IF EXISTS `inventaris`;
CREATE TABLE `inventaris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inventaris
-- ----------------------------
BEGIN;
INSERT INTO `inventaris` (`id`, `nomor`, `tanggal_masuk`, `barang_id`, `ruangan_id`, `pegawai_id`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'INVEN1', '2025-04-20', 1, 1, 1, '-', '2025-04-20 06:38:52', '2025-04-20 07:06:43');
COMMIT;

-- ----------------------------
-- Table structure for mutasi
-- ----------------------------
DROP TABLE IF EXISTS `mutasi`;
CREATE TABLE `mutasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `inventaris_id` int(11) DEFAULT NULL,
  `ke_ruangan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `dari_ruangan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mutasi
-- ----------------------------
BEGIN;
INSERT INTO `mutasi` (`id`, `tanggal`, `inventaris_id`, `ke_ruangan_id`, `created_at`, `updated_at`, `nomor`, `dari_ruangan_id`) VALUES (1, '2025-04-20', 1, 1, '2025-04-20 07:00:47', '2025-04-20 07:06:43', 'edsf', 2);
COMMIT;

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
BEGIN;
INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jkel`, `tgl_lahir`, `jabatan`, `created_at`, `updated_at`, `ruangan_id`) VALUES (1, '1231232143', 'Udin', 'L', '2025-04-02', 'dfgdfg', '2025-04-19 08:30:47', '2025-04-20 06:41:11', 2);
COMMIT;

-- ----------------------------
-- Table structure for pemeliharaan
-- ----------------------------
DROP TABLE IF EXISTS `pemeliharaan`;
CREATE TABLE `pemeliharaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jenis` text,
  `kondisi` text,
  `pegawai_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pemeliharaan
-- ----------------------------
BEGIN;
INSERT INTO `pemeliharaan` (`id`, `tanggal`, `barang_id`, `jenis`, `kondisi`, `pegawai_id`, `created_at`, `updated_at`, `nomor`) VALUES (1, '2025-04-20', 1, 'service.', 'bagus', NULL, '2025-04-20 07:12:25', '2025-04-20 07:12:56', 'P01');
COMMIT;

-- ----------------------------
-- Table structure for ruangan
-- ----------------------------
DROP TABLE IF EXISTS `ruangan`;
CREATE TABLE `ruangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ruangan
-- ----------------------------
BEGIN;
INSERT INTO `ruangan` (`id`, `nama`, `luas`, `pegawai_id`, `created_at`, `updated_at`) VALUES (1, 'Ruangan 1', '6x5 meter', NULL, '2025-04-19 08:03:29', '2025-04-19 08:03:29');
INSERT INTO `ruangan` (`id`, `nama`, `luas`, `pegawai_id`, `created_at`, `updated_at`) VALUES (2, 'Ruangan 2', '3x4 meter', NULL, '2025-04-19 08:03:36', '2025-04-19 08:03:44');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (1, 'superadmin', 'superadmin', '$2y$12$r0HAFQIZdiAabhk3HwCdVub716cax1jMnmwKnv76nJz8sJx0M3TB6', NULL, NULL, '2024-12-20 02:49:44', 'superadmin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
