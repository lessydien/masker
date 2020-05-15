-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2020 at 03:51 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  AUTOCOMMIT = 0;
START TRANSACTION;
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `sidak`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `detail_perkara`
  --
  CREATE TABLE `detail_perkara` (
    `idk` int(10) NOT NULL,
    `nik` varchar(255) COLLATE utf8_bin NOT NULL,
    `tkp` varchar(255) COLLATE utf8_bin NOT NULL,
    `foto` varchar(255) COLLATE utf8_bin NOT NULL,
    `waktu` datetime NOT NULL,
    `pelanggaran_ke` int(2) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
-- --------------------------------------------------------
  --
  -- Table structure for table `groups`
  --
  CREATE TABLE `groups` (
    `id` mediumint(8) UNSIGNED NOT NULL,
    `name` varchar(20) NOT NULL,
    `description` varchar(100) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `groups`
  --
INSERT INTO
  `groups` (`id`, `name`, `description`)
VALUES
  (1, 'root', 'Root'),
  (2, 'operator', 'Operator');
-- --------------------------------------------------------
  --
  -- Table structure for table `groups_menus`
  --
  CREATE TABLE `groups_menus` (
    `id` int(10) UNSIGNED NOT NULL,
    `group_id` mediumint(8) UNSIGNED NOT NULL,
    `menu_id` int(10) UNSIGNED NOT NULL,
    `akses` tinyint(1) UNSIGNED DEFAULT '1',
    `tambah` tinyint(1) UNSIGNED DEFAULT '0',
    `ubah` tinyint(1) UNSIGNED DEFAULT '0',
    `hapus` tinyint(1) UNSIGNED DEFAULT '0'
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `groups_menus`
  --
INSERT INTO
  `groups_menus` (
    `id`,
    `group_id`,
    `menu_id`,
    `akses`,
    `tambah`,
    `ubah`,
    `hapus`
  )
VALUES
  (1, 1, 1, 1, 1, 1, 1),
  (3, 1, 2, 1, 1, 1, 1),
  (4, 1, 3, 1, 1, 1, 1),
  (5, 1, 4, 1, 1, 1, 1),
  (6, 1, 5, 1, 1, 1, 1),
  (7, 2, 2, 1, 1, 1, 1),
  (13, 2, 5, 1, 1, 1, 1),
  (96, 2, 6, 1, 1, 1, 1),
  (97, 2, 7, 1, 1, 1, 1),
  (99, 1, 6, 1, 1, 1, 1),
  (101, 1, 7, 1, 1, 1, 1);
-- --------------------------------------------------------
  --
  -- Table structure for table `menus`
  --
  CREATE TABLE `menus` (
    `id` int(10) UNSIGNED NOT NULL COMMENT 'this is ID for menus',
    `parent_id` int(10) UNSIGNED DEFAULT '0',
    `path` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `icon` varchar(255) DEFAULT 'glyphicon glyphicon-tasks',
    `list_order` int(3) DEFAULT '0',
    `remark` text,
    `flag` enum('draft', 'publish') DEFAULT 'draft'
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `menus`
  --
INSERT INTO
  `menus` (
    `id`,
    `parent_id`,
    `path`,
    `name`,
    `icon`,
    `list_order`,
    `remark`,
    `flag`
  )
VALUES
  (
    1,
    0,
    '#',
    'SETTINGS',
    'fas fa-fw fa-cogs',
    18,
    'Auth. Control List',
    'publish'
  ),
  (
    3,
    1,
    'acl/groups/',
    'GROUPS',
    'fas fa-fw fa-tags',
    3,
    'Groups Authentifications',
    'publish'
  ),
  (
    4,
    1,
    'acl/users/',
    'USERS',
    'fas fa-fw fa-users',
    6,
    'Users Application',
    'publish'
  ),
  (
    7,
    0,
    '#',
    'Data Pelanggaran ',
    'fas fa-fw fa-clipboard-list',
    3,
    'Data Pelanggaran ',
    'publish'
  ),
  (
    2,
    0,
    'dashboard/',
    'DASHBOARD',
    'fas fa-fw fa-tachometer-alt',
    1,
    'Panel Dashboard',
    'publish'
  ),
  (
    6,
    0,
    '#',
    'Data Pelanggar',
    'fas fa-fw fa-user-times',
    2,
    'Data Pelanggar',
    'publish'
  ),
  (
    5,
    0,
    'report/',
    'REPORT',
    'fas fa-fw fa-book',
    21,
    'Laporan arsip surat',
    'draft'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `m_config`
  --
  CREATE TABLE `m_config` (
    `id` tinyint(3) UNSIGNED NOT NULL,
    `config_var` text NOT NULL,
    `config_val` text NOT NULL,
    `config_group` varchar(255) DEFAULT NULL,
    `config_type` varchar(255) DEFAULT 'text'
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `m_config`
  --
INSERT INTO
  `m_config` (
    `id`,
    `config_var`,
    `config_val`,
    `config_group`,
    `config_type`
  )
VALUES
  (27, 'APP_NAME_LOGO', '-', 'GENERAL', 'text'),
  (9, 'NAME', 'Diskominfotik', 'OFFICE', 'text'),
  (10, 'ADDRESS', '-Banda Aceh', 'OFFICE', 'text'),
  (11, 'PHONE', '', 'OFFICE', 'text'),
  (12, 'FAX', '', 'OFFICE', 'text'),
  (13, 'CITY', 'Banda Aceh', 'OFFICE', 'text'),
  (14, 'POST_CODE', '23115', 'OFFICE', 'text'),
  (15, 'MAIL', '', 'OFFICE', 'text'),
  (16, 'URL', '-', 'OFFICE', 'text'),
  (28, 'DISCLAIMER', '', 'GENERAL', 'text'),
  (23, 'PENGUMUMAN', '', 'GENERAL', 'text'),
  (24, 'APP_NAME', 'E-Masker', 'GENERAL', 'text'),
  (
    25,
    'APP_NAME_LONG',
    'Sistem Informasi Sidak Masker Banda Aceh',
    'GENERAL',
    'text'
  ),
  (
    26,
    'APP_NAME_CITY',
    'Banda Aceh',
    'GENERAL',
    'text'
  ),
  (29, 'VERSION', '1.0', 'GENERAL', 'text'),
  (
    30,
    'APP_NAME_ICON',
    'fa fa-newspaper-o',
    'GENERAL',
    'text'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `pelanggar`
  --
  CREATE TABLE `pelanggar` (
    `nik` varchar(255) COLLATE utf8_bin NOT NULL,
    `nama` varchar(255) COLLATE utf8_bin NOT NULL,
    `ttl` date NOT NULL,
    `alamat` varchar(255) COLLATE utf8_bin NOT NULL,
    `jml_pelanggaran` int(1) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
-- --------------------------------------------------------
  --
  -- Table structure for table `users`
  --
  CREATE TABLE `users` (
    `id` int(11) UNSIGNED NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `username` varchar(100) DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `email` varchar(100) NOT NULL,
    `activation_code` varchar(40) DEFAULT NULL,
    `forgotten_password_code` varchar(40) DEFAULT NULL,
    `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
    `remember_code` varchar(40) DEFAULT NULL,
    `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
    `last_login` int(11) UNSIGNED DEFAULT NULL,
    `active` tinyint(1) UNSIGNED DEFAULT NULL,
    `first_name` varchar(50) DEFAULT NULL,
    `last_name` varchar(50) DEFAULT NULL,
    `company` varchar(100) DEFAULT NULL,
    `phone` varchar(20) DEFAULT NULL,
    `instansi_id` varchar(100) NOT NULL,
    `golongan_id` varchar(255) DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `users`
  --
INSERT INTO
  `users` (
    `id`,
    `ip_address`,
    `username`,
    `password`,
    `salt`,
    `email`,
    `activation_code`,
    `forgotten_password_code`,
    `forgotten_password_time`,
    `remember_code`,
    `created_on`,
    `last_login`,
    `active`,
    `first_name`,
    `last_name`,
    `company`,
    `phone`,
    `instansi_id`,
    `golongan_id`
  )
VALUES
  (
    703,
    '',
    'admin',
    '$2y$08$TU40ppT0845itWOkSaVU3O9D9SlPBKzzy49nbuVV9mSnusBWO2R1i',
    NULL,
    'admin@gmail.com',
    '',
    NULL,
    NULL,
    NULL,
    NULL,
    1589387759,
    1,
    'Adminis',
    'trator',
    '',
    '',
    '',
    NULL
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `users_groups`
  --
  CREATE TABLE `users_groups` (
    `id` int(11) UNSIGNED NOT NULL,
    `user_id` int(11) UNSIGNED NOT NULL,
    `group_id` mediumint(8) UNSIGNED NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `users_groups`
  --
INSERT INTO
  `users_groups` (`id`, `user_id`, `group_id`)
VALUES
  (1, 1, 6),
  (3, 3, 6),
  (4, 4, 6),
  (5, 5, 6),
  (6, 6, 6),
  (7, 7, 6),
  (8, 8, 6),
  (9, 9, 6),
  (10, 10, 6),
  (11, 11, 6),
  (12, 12, 6),
  (13, 13, 8),
  (14, 14, 6),
  (15, 15, 6),
  (16, 16, 6),
  (17, 17, 6),
  (18, 18, 6),
  (19, 19, 6),
  (20, 20, 6),
  (21, 21, 6),
  (22, 22, 6),
  (24, 24, 6),
  (25, 25, 6),
  (26, 26, 6),
  (27, 27, 6),
  (28, 28, 6),
  (29, 29, 6),
  (30, 30, 6),
  (31, 31, 6),
  (32, 32, 6),
  (33, 33, 6),
  (34, 34, 6),
  (35, 35, 6),
  (36, 36, 6),
  (37, 37, 6),
  (38, 38, 9),
  (39, 39, 6),
  (40, 40, 6),
  (41, 41, 6),
  (42, 42, 6),
  (43, 43, 6),
  (44, 44, 9),
  (45, 45, 9),
  (46, 46, 9),
  (47, 47, 9),
  (48, 48, 9),
  (49, 49, 9),
  (50, 50, 9),
  (51, 51, 9),
  (52, 52, 9),
  (53, 53, 9),
  (54, 54, 9),
  (55, 55, 9),
  (56, 56, 9),
  (57, 57, 9),
  (58, 58, 9),
  (59, 59, 9),
  (60, 60, 9),
  (61, 61, 9),
  (62, 62, 9),
  (63, 63, 9),
  (64, 64, 9),
  (66, 66, 9),
  (67, 67, 9),
  (68, 68, 9),
  (69, 69, 9),
  (70, 70, 9),
  (72, 72, 9),
  (73, 73, 9),
  (74, 74, 6),
  (75, 75, 9),
  (76, 76, 9),
  (77, 77, 6),
  (78, 78, 9),
  (79, 79, 9),
  (80, 80, 9),
  (81, 81, 8),
  (82, 82, 8),
  (83, 83, 8),
  (84, 84, 8),
  (85, 85, 8),
  (86, 86, 8),
  (87, 87, 8),
  (88, 88, 6),
  (89, 89, 8),
  (90, 90, 8),
  (91, 91, 8),
  (92, 92, 8),
  (93, 93, 8),
  (94, 94, 8),
  (95, 95, 8),
  (96, 96, 8),
  (97, 97, 8),
  (98, 98, 8),
  (99, 99, 8),
  (100, 100, 8),
  (101, 101, 8),
  (102, 102, 8),
  (103, 103, 8),
  (104, 104, 8),
  (105, 105, 8),
  (106, 106, 8),
  (107, 107, 8),
  (108, 108, 8),
  (109, 109, 8),
  (110, 110, 8),
  (112, 112, 8),
  (113, 113, 8),
  (114, 114, 8),
  (115, 115, 8),
  (116, 116, 8),
  (117, 117, 8),
  (118, 118, 8),
  (119, 119, 8),
  (120, 120, 8),
  (121, 121, 8),
  (122, 122, 8),
  (123, 123, 8),
  (124, 124, 8),
  (125, 125, 8),
  (126, 126, 8),
  (127, 127, 8),
  (128, 128, 8),
  (129, 129, 8),
  (130, 130, 8),
  (131, 131, 8),
  (132, 132, 8),
  (133, 133, 8),
  (134, 134, 8),
  (135, 135, 8),
  (136, 136, 8),
  (137, 137, 8),
  (138, 138, 8),
  (139, 139, 8),
  (140, 140, 9),
  (141, 141, 8),
  (142, 142, 8),
  (143, 143, 8),
  (144, 144, 8),
  (145, 145, 8),
  (146, 146, 8),
  (147, 147, 8),
  (148, 148, 8),
  (149, 149, 8),
  (150, 150, 8),
  (151, 151, 8),
  (152, 152, 8),
  (153, 153, 8),
  (154, 154, 8),
  (155, 155, 8),
  (156, 156, 8),
  (157, 157, 8),
  (158, 158, 8),
  (159, 159, 8),
  (164, 164, 8),
  (165, 165, 8),
  (166, 166, 8),
  (167, 167, 9),
  (168, 168, 8),
  (169, 169, 8),
  (170, 170, 8),
  (171, 171, 8),
  (172, 172, 8),
  (173, 173, 8),
  (174, 174, 8),
  (175, 175, 8),
  (176, 176, 7),
  (177, 177, 8),
  (178, 178, 8),
  (179, 179, 8),
  (180, 180, 8),
  (181, 181, 8),
  (182, 182, 8),
  (183, 183, 8),
  (184, 184, 8),
  (185, 185, 8),
  (186, 186, 8),
  (187, 187, 8),
  (188, 188, 8),
  (189, 189, 8),
  (190, 190, 8),
  (191, 191, 8),
  (192, 192, 8),
  (193, 193, 8),
  (194, 194, 8),
  (195, 195, 8),
  (196, 196, 8),
  (197, 197, 8),
  (198, 198, 8),
  (199, 199, 8),
  (200, 200, 8),
  (201, 201, 8),
  (202, 202, 8),
  (203, 203, 8),
  (204, 204, 8),
  (205, 205, 8),
  (206, 206, 8),
  (207, 207, 8),
  (208, 208, 8),
  (209, 209, 8),
  (210, 210, 8),
  (211, 211, 8),
  (212, 212, 8),
  (213, 213, 8),
  (214, 214, 8),
  (215, 215, 8),
  (216, 216, 8),
  (217, 217, 8),
  (218, 218, 8),
  (219, 219, 8),
  (220, 220, 8),
  (221, 221, 8),
  (222, 222, 8),
  (223, 223, 8),
  (224, 224, 8),
  (225, 225, 7),
  (226, 226, 8),
  (227, 227, 8),
  (228, 228, 7),
  (229, 229, 8),
  (230, 230, 8),
  (231, 231, 7),
  (232, 232, 8),
  (233, 233, 8),
  (234, 234, 7),
  (235, 235, 8),
  (236, 236, 8),
  (237, 237, 8),
  (238, 238, 8),
  (239, 239, 8),
  (240, 240, 8),
  (241, 241, 8),
  (242, 242, 8),
  (243, 243, 8),
  (244, 244, 8),
  (245, 245, 8),
  (246, 246, 8),
  (247, 247, 8),
  (248, 248, 8),
  (249, 249, 8),
  (250, 250, 8),
  (251, 251, 8),
  (252, 252, 8),
  (253, 253, 8),
  (254, 254, 8),
  (255, 255, 8),
  (256, 256, 8),
  (257, 257, 8),
  (258, 258, 8),
  (259, 259, 8),
  (260, 260, 8),
  (261, 261, 8),
  (262, 262, 8),
  (263, 263, 8),
  (264, 264, 8),
  (265, 265, 8),
  (266, 266, 8),
  (267, 267, 8),
  (268, 268, 8),
  (269, 269, 8),
  (270, 270, 8),
  (271, 271, 8),
  (272, 272, 8),
  (273, 273, 8),
  (274, 274, 8),
  (275, 275, 8),
  (276, 276, 8),
  (277, 277, 8),
  (278, 278, 8),
  (279, 279, 8),
  (280, 280, 8),
  (281, 281, 8),
  (282, 282, 8),
  (283, 283, 8),
  (284, 284, 8),
  (285, 285, 8),
  (286, 286, 8),
  (287, 287, 8),
  (288, 288, 8),
  (289, 289, 8),
  (290, 290, 8),
  (291, 291, 8),
  (292, 292, 8),
  (293, 293, 8),
  (294, 294, 8),
  (295, 295, 8),
  (299, 299, 8),
  (300, 300, 8),
  (301, 301, 8),
  (302, 302, 8),
  (303, 303, 8),
  (304, 304, 8),
  (305, 305, 8),
  (306, 306, 8),
  (307, 307, 8),
  (308, 308, 8),
  (309, 309, 8),
  (310, 310, 8),
  (311, 311, 8),
  (312, 312, 8),
  (313, 313, 8),
  (314, 314, 8),
  (315, 315, 8),
  (316, 316, 8),
  (317, 317, 8),
  (318, 318, 8),
  (319, 319, 8),
  (320, 320, 8),
  (321, 321, 8),
  (322, 322, 8),
  (323, 323, 8),
  (324, 324, 8),
  (325, 325, 8),
  (326, 326, 8),
  (327, 327, 8),
  (328, 328, 8),
  (329, 329, 8),
  (330, 330, 8),
  (331, 331, 8),
  (332, 332, 8),
  (333, 333, 8),
  (334, 334, 8),
  (335, 335, 8),
  (336, 336, 8),
  (337, 337, 8),
  (338, 338, 9),
  (339, 339, 8),
  (340, 340, 8),
  (341, 341, 8),
  (342, 342, 8),
  (343, 343, 8),
  (344, 344, 8),
  (345, 345, 8),
  (346, 346, 8),
  (347, 347, 8),
  (348, 348, 8),
  (349, 349, 8),
  (350, 350, 8),
  (351, 351, 8),
  (352, 352, 8),
  (353, 353, 8),
  (354, 354, 8),
  (355, 355, 8),
  (356, 356, 8),
  (357, 357, 8),
  (358, 358, 8),
  (359, 359, 8),
  (360, 360, 8),
  (361, 361, 8),
  (362, 362, 8),
  (363, 363, 8),
  (364, 364, 8),
  (365, 365, 8),
  (366, 366, 8),
  (367, 367, 8),
  (368, 368, 8),
  (369, 369, 8),
  (370, 370, 8),
  (371, 371, 8),
  (372, 372, 8),
  (373, 373, 8),
  (374, 374, 8),
  (375, 375, 8),
  (376, 376, 8),
  (377, 377, 8),
  (378, 378, 8),
  (379, 379, 8),
  (380, 380, 8),
  (381, 381, 8),
  (382, 382, 8),
  (383, 383, 8),
  (384, 384, 8),
  (385, 385, 8),
  (386, 386, 8),
  (387, 387, 8),
  (388, 388, 8),
  (389, 389, 8),
  (390, 390, 8),
  (391, 391, 8),
  (392, 392, 8),
  (393, 393, 8),
  (394, 394, 8),
  (395, 395, 8),
  (396, 396, 8),
  (397, 397, 8),
  (398, 398, 8),
  (399, 399, 8),
  (400, 400, 8),
  (401, 401, 8),
  (402, 402, 8),
  (403, 403, 8),
  (404, 404, 8),
  (405, 405, 8),
  (406, 406, 8),
  (407, 407, 8),
  (408, 408, 8),
  (409, 409, 8),
  (410, 410, 8),
  (411, 411, 8),
  (412, 412, 8),
  (413, 413, 8),
  (414, 414, 8),
  (415, 415, 8),
  (416, 416, 8),
  (417, 417, 8),
  (418, 418, 8),
  (419, 419, 8),
  (420, 420, 8),
  (421, 421, 8),
  (422, 422, 8),
  (423, 423, 8),
  (424, 424, 8),
  (425, 425, 8),
  (426, 426, 8),
  (427, 427, 8),
  (428, 428, 8),
  (429, 429, 8),
  (430, 430, 8),
  (431, 431, 8),
  (432, 432, 8),
  (433, 433, 8),
  (434, 434, 8),
  (435, 435, 8),
  (436, 436, 8),
  (437, 437, 8),
  (438, 438, 8),
  (439, 439, 8),
  (440, 440, 8),
  (441, 441, 8),
  (442, 442, 8),
  (443, 443, 8),
  (444, 444, 8),
  (445, 445, 8),
  (446, 446, 8),
  (447, 447, 8),
  (448, 448, 8),
  (449, 449, 8),
  (450, 450, 8),
  (451, 451, 8),
  (452, 452, 8),
  (453, 453, 8),
  (454, 454, 8),
  (455, 455, 8),
  (456, 456, 8),
  (457, 457, 8),
  (458, 458, 8),
  (459, 459, 8),
  (460, 460, 8),
  (461, 461, 8),
  (462, 462, 8),
  (463, 463, 8),
  (464, 464, 8),
  (465, 465, 8),
  (466, 466, 8),
  (467, 467, 8),
  (468, 468, 8),
  (469, 469, 8),
  (470, 470, 8),
  (471, 471, 8),
  (472, 472, 8),
  (473, 473, 8),
  (474, 474, 8),
  (475, 475, 8),
  (476, 476, 8),
  (477, 477, 8),
  (478, 478, 8),
  (479, 479, 8),
  (480, 480, 8),
  (481, 481, 8),
  (482, 482, 8),
  (483, 483, 8),
  (484, 484, 8),
  (485, 485, 8),
  (486, 486, 8),
  (487, 487, 8),
  (488, 488, 8),
  (489, 489, 8),
  (490, 490, 8),
  (491, 491, 8),
  (492, 492, 8),
  (493, 493, 8),
  (494, 494, 8),
  (495, 495, 8),
  (496, 496, 8),
  (497, 497, 8),
  (498, 498, 8),
  (499, 499, 8),
  (500, 500, 8),
  (501, 501, 8),
  (502, 502, 8),
  (503, 503, 8),
  (504, 504, 8),
  (505, 505, 8),
  (506, 506, 8),
  (507, 507, 8),
  (508, 508, 8),
  (509, 509, 8),
  (510, 510, 8),
  (511, 511, 8),
  (512, 512, 8),
  (513, 513, 8),
  (514, 514, 8),
  (515, 515, 8),
  (516, 516, 8),
  (517, 517, 8),
  (518, 518, 8),
  (519, 519, 8),
  (520, 520, 8),
  (521, 521, 8),
  (522, 522, 8),
  (523, 523, 8),
  (524, 524, 9),
  (525, 525, 8),
  (526, 526, 8),
  (527, 527, 8),
  (528, 528, 8),
  (529, 529, 8),
  (536, 536, 8),
  (538, 538, 8),
  (539, 539, 8),
  (540, 540, 8),
  (541, 541, 8),
  (542, 542, 8),
  (543, 543, 8),
  (544, 544, 8),
  (545, 545, 8),
  (546, 546, 8),
  (547, 547, 8),
  (548, 548, 8),
  (549, 549, 8),
  (550, 550, 8),
  (551, 551, 8),
  (552, 552, 8),
  (553, 553, 8),
  (554, 554, 8),
  (555, 555, 8),
  (556, 556, 8),
  (557, 557, 8),
  (558, 558, 8),
  (559, 559, 8),
  (560, 560, 8),
  (561, 561, 8),
  (562, 562, 8),
  (563, 563, 8),
  (564, 564, 8),
  (565, 565, 8),
  (566, 566, 8),
  (567, 567, 8),
  (568, 568, 8),
  (569, 569, 8),
  (570, 570, 8),
  (571, 571, 8),
  (572, 572, 8),
  (573, 573, 8),
  (574, 574, 8),
  (575, 575, 8),
  (576, 576, 8),
  (577, 577, 8),
  (578, 578, 8),
  (579, 579, 8),
  (580, 580, 8),
  (581, 581, 8),
  (582, 582, 8),
  (583, 583, 8),
  (584, 584, 8),
  (585, 585, 8),
  (586, 586, 8),
  (587, 587, 8),
  (588, 588, 8),
  (589, 589, 4),
  (590, 590, 4),
  (591, 591, 4),
  (592, 592, 4),
  (593, 593, 4),
  (594, 594, 4),
  (595, 595, 4),
  (596, 596, 4),
  (597, 597, 4),
  (598, 598, 4),
  (599, 599, 4),
  (600, 600, 4),
  (601, 601, 4),
  (602, 602, 4),
  (604, 604, 4),
  (605, 605, 4),
  (606, 606, 4),
  (607, 607, 4),
  (608, 608, 4),
  (609, 609, 4),
  (610, 610, 4),
  (611, 611, 4),
  (612, 612, 4),
  (613, 613, 4),
  (614, 614, 4),
  (615, 615, 4),
  (616, 616, 4),
  (617, 617, 4),
  (618, 618, 4),
  (619, 619, 4),
  (620, 620, 4),
  (621, 621, 4),
  (622, 622, 4),
  (623, 623, 4),
  (624, 624, 4),
  (625, 625, 4),
  (626, 626, 4),
  (627, 627, 6),
  (628, 628, 6),
  (629, 629, 6),
  (631, 631, 8),
  (632, 632, 8),
  (633, 633, 8),
  (634, 634, 6),
  (635, 635, 6),
  (637, 637, 7),
  (638, 638, 8),
  (639, 639, 8),
  (640, 640, 8),
  (641, 641, 8),
  (642, 642, 8),
  (643, 643, 8),
  (644, 644, 8),
  (645, 645, 8),
  (646, 646, 8),
  (647, 647, 8),
  (648, 648, 8),
  (649, 649, 8),
  (650, 650, 8),
  (651, 651, 8),
  (652, 652, 8),
  (653, 653, 8),
  (654, 654, 8),
  (655, 655, 8),
  (656, 656, 8),
  (657, 657, 8),
  (658, 658, 8),
  (659, 659, 8),
  (660, 660, 8),
  (661, 661, 8),
  (662, 662, 9),
  (663, 663, 8),
  (664, 664, 8),
  (665, 665, 8),
  (666, 666, 8),
  (667, 667, 8),
  (668, 668, 8),
  (669, 669, 8),
  (670, 670, 8),
  (671, 671, 8),
  (672, 672, 8),
  (673, 673, 8),
  (674, 674, 8),
  (675, 675, 8),
  (676, 676, 8),
  (677, 677, 8),
  (678, 678, 8),
  (679, 679, 7),
  (680, 680, 8),
  (681, 681, 8),
  (682, 682, 8),
  (683, 683, 8),
  (684, 684, 8),
  (685, 685, 8),
  (686, 686, 8),
  (687, 687, 8),
  (688, 688, 8),
  (689, 689, 8),
  (690, 690, 8),
  (691, 691, 8),
  (692, 692, 8),
  (693, 693, 8),
  (694, 694, 8),
  (695, 695, 8),
  (697, 697, 4),
  (698, 698, 4),
  (699, 699, 4),
  (700, 700, 4),
  (701, 701, 4),
  (702, 702, 4),
  (704, 703, 1),
  (706, 65, 9),
  (707, 23, 6),
  (708, 160, 8),
  (709, 161, 8),
  (710, 162, 8),
  (711, 163, 8),
  (712, 296, 8),
  (713, 297, 8),
  (714, 298, 8),
  (715, 530, 8),
  (716, 531, 8),
  (717, 532, 8),
  (718, 533, 8),
  (719, 534, 8),
  (721, 537, 8),
  (722, 704, 4),
  (723, 704, 6),
  (724, 705, 6),
  (725, 706, 6),
  (726, 707, 9),
  (727, 630, 6),
  (728, 535, 8),
  (729, 708, 9),
  (730, 709, 8),
  (731, 710, 8),
  (732, 111, 8),
  (735, 711, 8),
  (737, 712, 6),
  (738, 603, 4),
  (739, 713, 8),
  (740, 714, 8),
  (741, 715, 8),
  (742, 716, 8),
  (743, 717, 8),
  (744, 718, 8),
  (745, 719, 8),
  (746, 720, 8),
  (747, 721, 8),
  (748, 722, 8),
  (749, 723, 8),
  (750, 724, 8),
  (751, 725, 8),
  (752, 726, 8),
  (753, 727, 8),
  (754, 728, 8),
  (755, 729, 8),
  (756, 730, 8),
  (757, 731, 8),
  (758, 732, 8),
  (759, 733, 8),
  (760, 734, 8),
  (766, 740, 8),
  (767, 735, 8),
  (768, 736, 8),
  (769, 737, 8),
  (770, 738, 8),
  (771, 739, 8),
  (772, 741, 8),
  (773, 742, 8),
  (774, 743, 8),
  (775, 744, 9),
  (776, 745, 9),
  (777, 746, 8),
  (778, 747, 8),
  (779, 748, 8),
  (780, 749, 8),
  (781, 750, 8),
  (782, 751, 8),
  (783, 752, 8),
  (784, 753, 8),
  (785, 754, 8),
  (786, 755, 8),
  (787, 756, 8),
  (788, 757, 8),
  (789, 758, 8),
  (790, 759, 8),
  (791, 636, 6),
  (792, 2, 6);
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `detail_perkara`
  --
ALTER TABLE
  `detail_perkara`
ADD
  PRIMARY KEY (`idk`),
ADD
  KEY `nik` (`nik`);
--
  -- Indexes for table `groups`
  --
ALTER TABLE
  `groups`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `groups_menus`
  --
ALTER TABLE
  `groups_menus`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `group_id` (`group_id`),
ADD
  KEY `menu_id` (`menu_id`);
--
  -- Indexes for table `menus`
  --
ALTER TABLE
  `menus`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `m_config`
  --
ALTER TABLE
  `m_config`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `pelanggar`
  --
ALTER TABLE
  `pelanggar`
ADD
  PRIMARY KEY (`nik`);
--
  -- Indexes for table `users`
  --
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `users_groups`
  --
ALTER TABLE
  `users_groups`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `fk_users_groups_users1_idx` (`user_id`),
ADD
  KEY `fk_users_groups_groups1_idx` (`group_id`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `detail_perkara`
  --
ALTER TABLE
  `detail_perkara`
MODIFY
  `idk` int(10) NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `groups`
  --
ALTER TABLE
  `groups`
MODIFY
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
  -- AUTO_INCREMENT for table `groups_menus`
  --
ALTER TABLE
  `groups_menus`
MODIFY
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 220;
--
  -- AUTO_INCREMENT for table `menus`
  --
ALTER TABLE
  `menus`
MODIFY
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'this is ID for menus',
  AUTO_INCREMENT = 89;
--
  -- AUTO_INCREMENT for table `m_config`
  --
ALTER TABLE
  `m_config`
MODIFY
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 31;
--
  -- AUTO_INCREMENT for table `users`
  --
ALTER TABLE
  `users`
MODIFY
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 704;
--
  -- AUTO_INCREMENT for table `users_groups`
  --
ALTER TABLE
  `users_groups`
MODIFY
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 793;
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;