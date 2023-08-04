/*
 Navicat Premium Data Transfer

 Source Server         : Server
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost:3306
 Source Schema         : anisa

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : 65001

 Date: 16/06/2023 13:03:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for normalisasi_kombinasi
-- ----------------------------
DROP TABLE IF EXISTS `normalisasi_kombinasi`;
CREATE TABLE `normalisasi_kombinasi`  (
  `kd_alternatif` bigint(20) NULL DEFAULT NULL,
  `kd_kriteria` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_bobot` double NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of normalisasi_kombinasi
-- ----------------------------
INSERT INTO `normalisasi_kombinasi` VALUES (1, '2', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (1, '3', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (1, '4', 0.1);
INSERT INTO `normalisasi_kombinasi` VALUES (1, '5', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (2, '2', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (2, '3', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (2, '4', 0.1);
INSERT INTO `normalisasi_kombinasi` VALUES (2, '5', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (3, '2', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (3, '3', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (3, '4', 0.1);
INSERT INTO `normalisasi_kombinasi` VALUES (3, '5', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (4, '2', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (4, '3', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (4, '4', 0.1);
INSERT INTO `normalisasi_kombinasi` VALUES (4, '5', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (5, '2', 0.3);
INSERT INTO `normalisasi_kombinasi` VALUES (5, '3', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (5, '4', 0.05);
INSERT INTO `normalisasi_kombinasi` VALUES (5, '5', 0.15);
INSERT INTO `normalisasi_kombinasi` VALUES (1, '2', 0.3);

-- ----------------------------
-- Table structure for tb_alternatif
-- ----------------------------
DROP TABLE IF EXISTS `tb_alternatif`;
CREATE TABLE `tb_alternatif`  (
  `kd_alternatif` bigint(20) NOT NULL AUTO_INCREMENT,
  `kd_pegawai` bigint(20) NULL DEFAULT NULL,
  `tgl_alternatif` date NULL DEFAULT NULL,
  `kd_user` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`kd_alternatif`) USING BTREE,
  INDEX `pegawai`(`kd_pegawai`) USING BTREE,
  INDEX `kd_user`(`kd_user`) USING BTREE,
  CONSTRAINT `pegawai` FOREIGN KEY (`kd_pegawai`) REFERENCES `tb_pegawai` (`kd_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_alternatif_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `tb_user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_alternatif
-- ----------------------------
INSERT INTO `tb_alternatif` VALUES (1, 1, '2022-06-22', 1);
INSERT INTO `tb_alternatif` VALUES (2, 2, '2022-06-22', 1);
INSERT INTO `tb_alternatif` VALUES (3, 3, '2022-06-22', 1);
INSERT INTO `tb_alternatif` VALUES (4, 4, '2022-06-22', 1);
INSERT INTO `tb_alternatif` VALUES (5, 5, '2022-06-22', 1);

-- ----------------------------
-- Table structure for tb_d_alternatif
-- ----------------------------
DROP TABLE IF EXISTS `tb_d_alternatif`;
CREATE TABLE `tb_d_alternatif`  (
  `kd_alternatif` bigint(20) NOT NULL,
  `kd_kriteria` bigint(20) NULL DEFAULT NULL,
  `status_kriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_kriteria` int(20) NULL DEFAULT NULL,
  `tgl_buat` date NULL DEFAULT NULL,
  INDEX `kriteria`(`kd_kriteria`) USING BTREE,
  INDEX `sub_kriteria`(`status_kriteria`) USING BTREE,
  CONSTRAINT `kriteria` FOREIGN KEY (`kd_kriteria`) REFERENCES `tb_kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_d_alternatif
-- ----------------------------
INSERT INTO `tb_d_alternatif` VALUES (1, 2, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (1, 3, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (1, 4, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (1, 5, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (2, 2, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (2, 3, 'Belum Tuntas', 5, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (2, 4, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (2, 5, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (3, 2, 'Belum Tuntas', 5, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (3, 3, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (3, 4, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (3, 5, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (4, 2, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (4, 3, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (4, 4, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (4, 5, 'Belum Tuntas', 5, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (5, 2, 'Belum Tuntas', 10, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (5, 3, 'Belum Tuntas', 5, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (5, 4, 'Belum Tuntas', 5, '2022-06-22');
INSERT INTO `tb_d_alternatif` VALUES (5, 5, 'Belum Tuntas', 10, '2022-06-22');

-- ----------------------------
-- Table structure for tb_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tb_kriteria`;
CREATE TABLE `tb_kriteria`  (
  `kd_kriteria` bigint(20) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bobot_persen` float(20, 0) NULL DEFAULT NULL,
  `bobot_desimal` decimal(20, 1) NULL DEFAULT NULL,
  `atribut` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_kriteria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kriteria
-- ----------------------------
INSERT INTO `tb_kriteria` VALUES (2, 'Kelengkapan Berkas', 30, 0.3, 'Benefit');
INSERT INTO `tb_kriteria` VALUES (3, 'SKP 2 Tahun Terakhir', 30, 0.3, 'Benefit');
INSERT INTO `tb_kriteria` VALUES (4, 'Pendidikan Terakhir', 10, 0.1, 'Benefit');
INSERT INTO `tb_kriteria` VALUES (5, 'Masa Kerja 4 Tahun', 30, 0.3, 'Cost');

-- ----------------------------
-- Table structure for tb_nilai_akhir
-- ----------------------------
DROP TABLE IF EXISTS `tb_nilai_akhir`;
CREATE TABLE `tb_nilai_akhir`  (
  `kd_nilai` bigint(20) NOT NULL AUTO_INCREMENT,
  `kd_alternatif` bigint(20) NULL DEFAULT NULL,
  `total_nilai` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_nilai` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_nilai`) USING BTREE,
  INDEX `alternatif2`(`kd_alternatif`) USING BTREE,
  CONSTRAINT `alternatif2` FOREIGN KEY (`kd_alternatif`) REFERENCES `tb_alternatif` (`kd_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_nilai_akhir
-- ----------------------------
INSERT INTO `tb_nilai_akhir` VALUES (1, 1, '1', 'Penilaian Data Akhir', 'Lulus');
INSERT INTO `tb_nilai_akhir` VALUES (2, 2, '0.592330317', 'Penilaian Data Akhir', 'Lulus');
INSERT INTO `tb_nilai_akhir` VALUES (3, 3, '0.592330317', 'Penilaian Data Akhir', 'Lulus');
INSERT INTO `tb_nilai_akhir` VALUES (4, 4, '0.592330317', 'Penilaian Data Akhir', 'Lulus');
INSERT INTO `tb_nilai_akhir` VALUES (5, 5, '0.572949016', 'Penilaian Data Akhir', 'Lulus');

-- ----------------------------
-- Table structure for tb_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai`  (
  `kd_pegawai` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_pegawai` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `masa_kerja` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidikan_akhir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usia` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `tmpt_lhr` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmt` date NULL DEFAULT NULL,
  PRIMARY KEY (`kd_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pegawai
-- ----------------------------
INSERT INTO `tb_pegawai` VALUES (1, 'Kurniawan Wibowo', '198607222004121001', '5', 'S1', '29', '1993-02-10', 'Luwuk Bunter', 'Laki-laki', 'islam', '2022-01-01');
INSERT INTO `tb_pegawai` VALUES (2, 'Idris Sugiono', '197104152001031001', '4', 'S1', '25', '1997-01-16', 'jl.', 'Laki-laki', 'islam', '2022-01-16');
INSERT INTO `tb_pegawai` VALUES (3, 'Nuringsih Sujati', '197406022006042031', '4', 'S1', '25', '1997-01-16', 'jl. Terbaru', 'Perempuan', 'islam', '2022-01-16');
INSERT INTO `tb_pegawai` VALUES (4, 'Meuthia Rakhmasari', '198402232010011009', '5', 'S1', '32', '1989-07-24', 'Sampit', 'Perempuan', 'islam', '2022-04-01');
INSERT INTO `tb_pegawai` VALUES (5, 'Maulana', '196402232010011009', '5', 'S1', '28', '1994-01-23', 'Sampit', 'Laki-laki', 'islam', '2022-06-15');

-- ----------------------------
-- Table structure for tb_sub_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tb_sub_kriteria`;
CREATE TABLE `tb_sub_kriteria`  (
  `kd_sub_kriteria` bigint(20) NOT NULL AUTO_INCREMENT,
  `kd_kriteria` bigint(20) NULL DEFAULT NULL,
  `sub_kriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bobot` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket_sub` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_sub_kriteria`) USING BTREE,
  INDEX `kriteria2`(`kd_kriteria`) USING BTREE,
  CONSTRAINT `kriteria2` FOREIGN KEY (`kd_kriteria`) REFERENCES `tb_kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_sub_kriteria
-- ----------------------------
INSERT INTO `tb_sub_kriteria` VALUES (1, 2, 'Lengkap', '10', 'Lengkap');
INSERT INTO `tb_sub_kriteria` VALUES (2, 2, 'Tidak Lengkap', '5', 'Tidak Lengkap');
INSERT INTO `tb_sub_kriteria` VALUES (3, 3, '>=80', '10', 'Lebih Dari');
INSERT INTO `tb_sub_kriteria` VALUES (4, 3, '>80', '5', 'Kurang Dari');
INSERT INTO `tb_sub_kriteria` VALUES (5, 4, 'S1-S2', '10', 'S1-S2');
INSERT INTO `tb_sub_kriteria` VALUES (6, 4, 'SMA/K-D3', '5', 'SMA/K-D3');
INSERT INTO `tb_sub_kriteria` VALUES (7, 5, '4 Tahun', '10', '4 Tahun');
INSERT INTO `tb_sub_kriteria` VALUES (8, 5, ' > 4 Tahun', '5', '> 4 Tahun');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `kd_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'Admin', 'master', 'anisa@gmail.com', '12345');
INSERT INTO `tb_user` VALUES (3, 'kepala subbagian', 'kasubag', 'baru@gmail.com', '12345');

-- ----------------------------
-- View structure for nilai_kriteria
-- ----------------------------
DROP VIEW IF EXISTS `nilai_kriteria`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `nilai_kriteria` AS select d.kd_alternatif, p.nm_pegawai,
                                                                 pow((select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif ),2) as kri2,
                                                                  pow((select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif ),2) as kri3,
                                                                  pow((select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif ),2) as kri4,
                                                                  pow((select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif ),2) as kri5
                                                                

                                                                from tb_d_alternatif d
                                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                                GROUP BY a.kd_pegawai ;

-- ----------------------------
-- View structure for view_tess
-- ----------------------------
DROP VIEW IF EXISTS `view_tess`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_tess` AS select a.kd_alternatif, p.nm_pegawai,
                                                                 ((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif )/10)) as kri2,
                                                                  ((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif )/10)) as kri3,
                                                                  ((0.1*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif )/10)) as kri4,
                                                                  (0.3*(5/(select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif ))) as kri5,
                                                           
																																	pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif )/10))-0.3),2) +
                                                                  pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif )/10))-0.3),2) +
                                                                  pow((((0.1*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif )/10))-0.1),2) +
                                                                  pow(((0.3*(5/(select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif )))-0.15),2) as Positif ,  

																																	pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif )/10))-0.15),2) +
                                                                  pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif )/10))-0.15),2) +
                                                                  pow((((0.1*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif )/10))-0.05),2) +
                                                                  pow(((0.3*(5/(select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif )))-0.3),2) as Negatif,

																																	ROUND(SQRT (pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif )/10))-0.3),2) +
                                                                  pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif )/10))-0.3),2) +
                                                                  pow((((0.1*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif )/10))-0.1),2) +
                                                                  pow(((0.3*(5/(select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif )))-0.15),2) ),9) as Akar_Positif ,


																																	ROUND(SQRT( pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=2 and kd_alternatif=a.kd_alternatif )/10))-0.15),2) +
                                                                  pow((((0.3*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=3 and kd_alternatif=a.kd_alternatif )/10))-0.15),2) +
                                                                  pow((((0.1*(select nilai_kriteria from tb_d_alternatif where kd_kriteria=4 and kd_alternatif=a.kd_alternatif )/10))-0.05),2) +
                                                                  pow(((0.3*(5/(select nilai_kriteria from tb_d_alternatif where kd_kriteria=5 and kd_alternatif=a.kd_alternatif )))-0.3),2) ),9) as Akar_Negatif 


																																	
                                                                from tb_d_alternatif d
                                                                INNER JOIN tb_alternatif a on a.kd_alternatif=d.kd_alternatif
                                                                INNER JOIN tb_kriteria k on k.kd_kriteria=d.kd_kriteria
                                                                INNER JOIN tb_pegawai p on p.kd_pegawai=a.kd_pegawai
                                                                GROUP BY a.kd_pegawai ;

SET FOREIGN_KEY_CHECKS = 1;
