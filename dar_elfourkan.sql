-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 02:31 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dar_elfourkan`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `address`, `isdeleted`) VALUES
(1, 'مدينة نصر', 0),
(2, 'مصر الجديدة', 0),
(3, 'العبور', 0),
(4, 'المعادي', 1);

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supervisor_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`id`, `created_at`, `supervisor_id`, `child_id`, `updated_at`, `isdeleted`) VALUES
(26, '2019-06-29 01:14:47', 169, 180, '0000-00-00 00:00:00', 0),
(27, '2019-06-29 01:17:38', 169, 181, '0000-00-00 00:00:00', 0),
(28, '2019-06-29 01:21:30', 169, 182, '0000-00-00 00:00:00', 0),
(29, '2019-06-29 01:23:57', 168, 183, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_details`
--

INSERT INTO `case_details` (`id`, `document_id`, `case_id`, `createddate`, `updateddate`, `isdeleted`) VALUES
(23, 40, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `child_donation`
--

CREATE TABLE `child_donation` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `child_donation`
--

INSERT INTO `child_donation` (`id`, `receipt_id`, `child_id`) VALUES
(2, 38, 171),
(3, 39, 171),
(4, 40, 111),
(5, 41, 145),
(6, 43, 111),
(7, 45, 144),
(8, 47, 111);

-- --------------------------------------------------------

--
-- Table structure for table `child_talents`
--

CREATE TABLE `child_talents` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `talent_id` int(11) NOT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `child_talents`
--

INSERT INTO `child_talents` (`id`, `child_id`, `talent_id`, `isdeleted`) VALUES
(1, 1, 1, 1),
(2, 2, 3, 0),
(11, 10, 3, 0),
(12, 11, 2, 0),
(13, 11, 3, 0),
(14, 12, 1, 0),
(15, 13, 2, 1),
(16, 14, 1, 0),
(17, 14, 2, 0),
(18, 15, 1, 0),
(19, 15, 2, 0),
(20, 13, 2, 1),
(21, 13, 2, 1),
(22, 13, 4, 1),
(23, 13, 6, 1),
(24, 13, 4, 0),
(25, 13, 6, 0),
(26, 16, 2, 0),
(27, 16, 4, 0),
(28, 17, 4, 0),
(29, 17, 6, 0),
(30, 18, 6, 0),
(31, 19, 2, 0),
(32, 20, 1, 0),
(33, 1, 2, 0),
(34, 21, 6, 0),
(35, 22, 1, 0),
(36, 23, 2, 0),
(37, 24, 1, 0),
(38, 25, 4, 0),
(39, 26, 4, 0),
(40, 27, 2, 0),
(41, 28, 2, 0),
(42, 29, 2, 1),
(43, 29, 2, 1),
(44, 29, 2, 1),
(45, 29, 2, 1),
(46, 29, 2, 1),
(47, 29, 2, 1),
(48, 29, 2, 1),
(49, 29, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `gov_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `city_name_en` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `gov_id`, `city_name`, `city_name_en`) VALUES
(252, 1, 'مدينه نصر', 'Nasr City'),
(3, 2, 'السادس من أكتوبر', 'Sixth of October'),
(4, 2, 'الشيخ زايد\n', 'Cheikh Zayed'),
(5, 2, 'الحوامدية', 'Hawamdiyah'),
(6, 2, 'البدرشين', 'Al Badrasheen'),
(7, 2, 'الصف', 'Saf'),
(8, 2, 'أطفيح', 'Atfih'),
(9, 2, 'العياط', 'Al Ayat'),
(10, 2, 'الباويطي', 'Al-Bawaiti'),
(11, 2, 'منشأة القناطر', 'ManshiyetAl Qanater'),
(12, 2, 'أوسيم', 'Oaseem'),
(13, 2, 'كرداسة', 'Kerdasa'),
(14, 2, 'أبو النمرس', 'Abu Nomros'),
(15, 2, 'كفر غطاطي', 'Kafr Ghati'),
(16, 2, 'منشأة البكاري', 'Manshiyet Al Bakari'),
(251, 1, 'المعادي', 'Maadi'),
(18, 3, 'برج العرب', 'Burj Al Arab'),
(19, 3, 'برج العرب الجديدة', 'New Burj Al Arab'),
(20, 12, 'بنها', 'Banha'),
(21, 12, 'قليوب', 'Qalyub'),
(22, 12, 'شبرا الخيمة', 'Shubra Al Khaimah'),
(23, 12, 'القناطر الخيرية', 'Al Qanater Charity'),
(24, 12, 'الخانكة', 'Khanka'),
(25, 12, 'كفر شكر', 'Kafr Shukr'),
(26, 12, 'طوخ', 'Tukh'),
(27, 12, 'قها', 'Qaha'),
(28, 12, 'العبور', 'Obour'),
(29, 12, 'الخصوص', 'Khosous'),
(30, 12, 'شبين القناطر', 'Shibin Al Qanater'),
(31, 6, 'دمنهور', 'Damanhour'),
(32, 6, 'كفر الدوار', 'Kafr El Dawar'),
(33, 6, 'رشيد', 'Rashid'),
(34, 6, 'إدكو', 'Edco'),
(35, 6, 'أبو المطامير', 'Abu al-Matamir'),
(36, 6, 'أبو حمص', 'Abu Homs'),
(37, 6, 'الدلنجات', 'Delengat'),
(38, 6, 'المحمودية', 'Mahmoudiyah'),
(39, 6, 'الرحمانية', 'Rahmaniyah'),
(40, 6, 'إيتاي البارود', 'Itai Baroud'),
(41, 6, 'حوش عيسى', 'Housh Eissa'),
(42, 6, 'شبراخيت', 'Shubrakhit'),
(43, 6, 'كوم حمادة', 'Kom Hamada'),
(44, 6, 'بدر', 'Badr'),
(45, 6, 'وادي النطرون', 'Wadi Natrun'),
(46, 6, 'النوبارية الجديدة', 'New Nubaria'),
(47, 23, 'مرسى مطروح', 'Marsa Matrouh'),
(48, 23, 'الحمام', 'El Hamam'),
(49, 23, 'العلمين', 'Alamein'),
(50, 23, 'الضبعة', 'Dabaa'),
(51, 23, 'النجيلة', 'Al-Nagila'),
(52, 23, 'سيدي براني', 'Sidi Brani'),
(53, 23, 'السلوم', 'Salloum'),
(54, 23, 'سيوة', 'Siwa'),
(55, 19, 'دمياط', 'Damietta'),
(56, 19, 'دمياط الجديدة', 'New Damietta'),
(57, 19, 'رأس البر', 'Ras El Bar'),
(58, 19, 'فارسكور', 'Faraskour'),
(59, 19, 'الزرقا', 'Zarqa'),
(60, 19, 'السرو', 'alsaru'),
(61, 19, 'الروضة', 'alruwda'),
(62, 19, 'كفر البطيخ', 'Kafr El-Batikh'),
(63, 19, 'عزبة البرج', 'Azbet Al Burg'),
(64, 19, 'ميت أبو غالب', 'Meet Abou Ghalib'),
(65, 19, 'كفر سعد', 'Kafr Saad'),
(66, 4, 'المنصورة', 'Mansoura'),
(67, 4, 'طلخا', 'Talkha'),
(68, 4, 'ميت غمر', 'Mitt Ghamr'),
(69, 4, 'دكرنس', 'Dekernes'),
(70, 4, 'أجا', 'Aga'),
(71, 4, 'منية النصر', 'Menia El Nasr'),
(72, 4, 'السنبلاوين', 'Sinbillawin'),
(73, 4, 'الكردي', 'El Kurdi'),
(74, 4, 'بني عبيد', 'Bani Ubaid'),
(75, 4, 'المنزلة', 'Al Manzala'),
(76, 4, 'تمي الأمديد', 'tami al\'amdid'),
(77, 4, 'الجمالية', 'aljamalia'),
(78, 4, 'شربين', 'Sherbin'),
(79, 4, 'المطرية', 'Mataria'),
(80, 4, 'بلقاس', 'Belqas'),
(81, 4, 'ميت سلسيل', 'Meet Salsil'),
(82, 4, 'جمصة', 'Gamasa'),
(83, 4, 'محلة دمنة', 'Mahalat Damana'),
(84, 4, 'نبروه', 'Nabroh'),
(85, 22, 'كفر الشيخ', 'Kafr El Sheikh'),
(86, 22, 'دسوق', 'Desouq'),
(87, 22, 'فوه', 'Fooh'),
(88, 22, 'مطوبس', 'Metobas'),
(89, 22, 'برج البرلس', 'Burg Al Burullus'),
(90, 22, 'بلطيم', 'Baltim'),
(91, 22, 'مصيف بلطيم', 'Masief Baltim'),
(92, 22, 'الحامول', 'Hamol'),
(93, 22, 'بيلا', 'Bella'),
(94, 22, 'الرياض', 'Riyadh'),
(95, 22, 'سيدي سالم', 'Sidi Salm'),
(96, 22, 'قلين', 'Qellen'),
(97, 22, 'سيدي غازي', 'Sidi Ghazi'),
(98, 8, 'طنطا', 'Tanta'),
(99, 8, 'المحلة الكبرى', 'Al Mahalla Al Kobra'),
(100, 8, 'كفر الزيات', 'Kafr El Zayat'),
(101, 8, 'زفتى', 'Zefta'),
(102, 8, 'السنطة', 'El Santa'),
(103, 8, 'قطور', 'Qutour'),
(104, 8, 'بسيون', 'Basion'),
(105, 8, 'سمنود', 'Samannoud'),
(106, 10, 'شبين الكوم', 'Shbeen El Koom'),
(107, 10, 'مدينة السادات', 'Sadat City'),
(108, 10, 'منوف', 'Menouf'),
(109, 10, 'سرس الليان', 'Sars El-Layan'),
(110, 10, 'أشمون', 'Ashmon'),
(111, 10, 'الباجور', 'Al Bagor'),
(112, 10, 'قويسنا', 'Quesna'),
(113, 10, 'بركة السبع', 'Berkat El Saba'),
(114, 10, 'تلا', 'Tala'),
(115, 10, 'الشهداء', 'Al Shohada'),
(116, 20, 'الزقازيق', 'Zagazig'),
(117, 20, 'العاشر من رمضان', 'Al Ashr Men Ramadan'),
(118, 20, 'منيا القمح', 'Minya Al Qamh'),
(119, 20, 'بلبيس', 'Belbeis'),
(120, 20, 'مشتول السوق', 'Mashtoul El Souq'),
(121, 20, 'القنايات', 'Qenaiat'),
(122, 20, 'أبو حماد', 'Abu Hammad'),
(123, 20, 'القرين', 'El Qurain'),
(124, 20, 'ههيا', 'Hehia'),
(125, 20, 'أبو كبير', 'Abu Kabir'),
(126, 20, 'فاقوس', 'Faccus'),
(127, 20, 'الصالحية الجديدة', 'El Salihia El Gedida'),
(128, 20, 'الإبراهيمية', 'Al Ibrahimiyah'),
(129, 20, 'ديرب نجم', 'Deirb Negm'),
(130, 20, 'كفر صقر', 'Kafr Saqr'),
(131, 20, 'أولاد صقر', 'Awlad Saqr'),
(132, 20, 'الحسينية', 'Husseiniya'),
(133, 20, 'صان الحجر القبلية', 'san alhajar alqablia'),
(134, 20, 'منشأة أبو عمر', 'Manshayat Abu Omar'),
(135, 18, 'بورسعيد', 'PorSaid'),
(136, 18, 'بورفؤاد', 'PorFouad'),
(137, 9, 'الإسماعيلية', 'Ismailia'),
(138, 9, 'فايد', 'Fayed'),
(139, 9, 'القنطرة شرق', 'Qantara Sharq'),
(140, 9, 'القنطرة غرب', 'Qantara Gharb'),
(141, 9, 'التل الكبير', 'El Tal El Kabier'),
(142, 9, 'أبو صوير', 'Abu Sawir'),
(143, 9, 'القصاصين الجديدة', 'Kasasien El Gedida'),
(144, 14, 'السويس', 'Suez'),
(145, 26, 'العريش', 'Arish'),
(146, 26, 'الشيخ زويد', 'Sheikh Zowaid'),
(147, 26, 'نخل', 'Nakhl'),
(148, 26, 'رفح', 'Rafah'),
(149, 26, 'بئر العبد', 'Bir al-Abed'),
(150, 26, 'الحسنة', 'Al Hasana'),
(151, 21, 'الطور', 'Al Toor'),
(152, 21, 'شرم الشيخ', 'Sharm El-Shaikh'),
(153, 21, 'دهب', 'Dahab'),
(154, 21, 'نويبع', 'Nuweiba'),
(155, 21, 'طابا', 'Taba'),
(156, 21, 'سانت كاترين', 'Saint Catherine'),
(157, 21, 'أبو رديس', 'Abu Redis'),
(158, 21, 'أبو زنيمة', 'Abu Zenaima'),
(159, 21, 'رأس سدر', 'Ras Sidr'),
(160, 17, 'بني سويف', 'Bani Sweif'),
(161, 17, 'بني سويف الجديدة', 'Beni Suef El Gedida'),
(162, 17, 'الواسطى', 'Al Wasta'),
(163, 17, 'ناصر', 'Naser'),
(164, 17, 'إهناسيا', 'Ehnasia'),
(165, 17, 'ببا', 'beba'),
(166, 17, 'الفشن', 'Fashn'),
(167, 17, 'سمسطا', 'Somasta'),
(168, 7, 'الفيوم', 'Fayoum'),
(169, 7, 'الفيوم الجديدة', 'Fayoum El Gedida'),
(170, 7, 'طامية', 'Tamiya'),
(171, 7, 'سنورس', 'Snores'),
(172, 7, 'إطسا', 'Etsa'),
(173, 7, 'إبشواي', 'Epschway'),
(174, 7, 'يوسف الصديق', 'Yusuf El Sediaq'),
(175, 11, 'المنيا', 'Minya'),
(176, 11, 'المنيا الجديدة', 'Minya El Gedida'),
(177, 11, 'العدوة', 'El Adwa'),
(178, 11, 'مغاغة', 'Magagha'),
(179, 11, 'بني مزار', 'Bani Mazar'),
(180, 11, 'مطاي', 'Mattay'),
(181, 11, 'سمالوط', 'Samalut'),
(182, 11, 'المدينة الفكرية', 'Madinat El Fekria'),
(183, 11, 'ملوي', 'Meloy'),
(184, 11, 'دير مواس', 'Deir Mawas'),
(185, 16, 'أسيوط', 'Assiut'),
(186, 16, 'أسيوط الجديدة', 'Assiut El Gedida'),
(187, 16, 'ديروط', 'Dayrout'),
(188, 16, 'منفلوط', 'Manfalut'),
(189, 16, 'القوصية', 'Qusiya'),
(190, 16, 'أبنوب', 'Abnoub'),
(191, 16, 'أبو تيج', 'Abu Tig'),
(192, 16, 'الغنايم', 'El Ghanaim'),
(193, 16, 'ساحل سليم', 'Sahel Selim'),
(194, 16, 'البداري', 'El Badari'),
(195, 16, 'صدفا', 'Sidfa'),
(196, 13, 'الخارجة', 'El Kharga'),
(197, 13, 'باريس', 'Paris'),
(198, 13, 'موط', 'Mout'),
(199, 13, 'الفرافرة', 'Farafra'),
(200, 13, 'بلاط', 'Balat'),
(201, 5, 'الغردقة', 'Hurghada'),
(202, 5, 'رأس غارب', 'Ras Ghareb'),
(203, 5, 'سفاجا', 'Safaga'),
(204, 5, 'القصير', 'El Qusiar'),
(205, 5, 'مرسى علم', 'Marsa Alam'),
(206, 5, 'الشلاتين', 'Shalatin'),
(207, 5, 'حلايب', 'Halaib'),
(208, 27, 'سوهاج', 'Sohag'),
(209, 27, 'سوهاج الجديدة', 'Sohag El Gedida'),
(210, 27, 'أخميم', 'Akhmeem'),
(211, 27, 'أخميم الجديدة', 'Akhmim El Gedida'),
(212, 27, 'البلينا', 'Albalina'),
(213, 27, 'المراغة', 'El Maragha'),
(214, 27, 'المنشأة', 'almunsha\'a'),
(215, 27, 'دار السلام', 'Dar AISalaam'),
(216, 27, 'جرجا', 'Gerga'),
(217, 27, 'جهينة الغربية', 'Jahina Al Gharbia'),
(218, 27, 'ساقلته', 'Saqilatuh'),
(219, 27, 'طما', 'Tama'),
(220, 27, 'طهطا', 'Tahta'),
(221, 25, 'قنا', 'Qena'),
(222, 25, 'قنا الجديدة', 'New Qena'),
(223, 25, 'أبو تشت', 'Abu Tesht'),
(224, 25, 'نجع حمادي', 'Nag Hammadi'),
(225, 25, 'دشنا', 'Deshna'),
(226, 25, 'الوقف', 'Alwaqf'),
(227, 25, 'قفط', 'Qaft'),
(228, 25, 'نقادة', 'Naqada'),
(229, 25, 'فرشوط', 'Farshout'),
(230, 25, 'قوص', 'Quos'),
(231, 24, 'الأقصر', 'Luxor'),
(232, 24, 'الأقصر الجديدة', 'New Luxor'),
(233, 24, 'إسنا', 'Esna'),
(234, 24, 'طيبة الجديدة', 'New Tiba'),
(235, 24, 'الزينية', 'Al ziynia'),
(236, 24, 'البياضية', 'Al Bayadieh'),
(237, 24, 'القرنة', 'Al Qarna'),
(238, 24, 'أرمنت', 'Armant'),
(239, 24, 'الطود', 'Al Tud'),
(240, 15, 'أسوان', 'Aswan'),
(241, 15, 'أسوان الجديدة', 'Aswan El Gedida'),
(242, 15, 'دراو', 'Drau'),
(243, 15, 'كوم أمبو', 'Kom Ombo'),
(244, 15, 'نصر النوبة', 'Nasr Al Nuba'),
(245, 15, 'كلابشة', 'Kalabsha'),
(246, 15, 'إدفو', 'Edfu'),
(247, 15, 'الرديسية', 'Al-Radisiyah'),
(248, 15, 'البصيلية', 'Al Basilia'),
(249, 15, 'السباعية', 'Al Sibaeia'),
(250, 15, 'ابوسمبل السياحية', 'Abo Simbl Al Siyahia');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `relative` text NOT NULL,
  `gov_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `report_number` text NOT NULL,
  `report_date` date NOT NULL,
  `decision_number` bigint(20) NOT NULL,
  `decision_date` date NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL,
  `shoe_size` int(11) NOT NULL,
  `clothes_size` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `school_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `relative`, `gov_id`, `city_id`, `station_id`, `report_number`, `report_date`, `decision_number`, `decision_date`, `createddate`, `updateddate`, `isdeleted`, `shoe_size`, `clothes_size`, `school_year_id`, `school_name`) VALUES
(40, 'مجهول', 1, 251, 1, '2224', '2019-06-07', 2221, '2019-06-08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 22, 11, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `document_history`
--

CREATE TABLE `document_history` (
  `id` int(11) NOT NULL,
  `documentId` int(11) NOT NULL,
  `relative` text NOT NULL,
  `gov_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `report_number` text NOT NULL,
  `report_date` date NOT NULL,
  `decision_number` bigint(20) NOT NULL,
  `decision_date` date NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL,
  `shoe_size` int(11) NOT NULL,
  `clothes_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `donation_options`
--

CREATE TABLE `donation_options` (
  `id` int(11) NOT NULL,
  `donation_types_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_options`
--

INSERT INTO `donation_options` (`id`, `donation_types_id`, `options_id`, `createddate`, `updateddate`, `isdeleted`) VALUES
(58, 2, 9, '2019-05-02 17:33:21', '0000-00-00 00:00:00', 0),
(59, 2, 8, '2019-05-02 17:33:24', '0000-00-00 00:00:00', 0),
(60, 2, 23, '2019-05-02 17:39:11', '0000-00-00 00:00:00', 0),
(61, 3, 8, '2019-05-10 11:11:58', '0000-00-00 00:00:00', 0),
(62, 3, 9, '2019-05-10 11:11:58', '0000-00-00 00:00:00', 0),
(63, 3, 24, '2019-05-10 11:11:58', '0000-00-00 00:00:00', 0),
(64, 2, 24, '2019-05-18 15:38:20', '0000-00-00 00:00:00', 0),
(65, 4, 8, '2019-05-24 00:01:50', '0000-00-00 00:00:00', 0),
(66, 4, 9, '2019-05-24 00:01:50', '0000-00-00 00:00:00', 0),
(67, 4, 24, '2019-05-24 00:01:50', '0000-00-00 00:00:00', 0),
(68, 5, 8, '2019-05-25 01:13:29', '0000-00-00 00:00:00', 0),
(69, 5, 9, '2019-05-25 01:13:29', '0000-00-00 00:00:00', 0),
(70, 5, 24, '2019-05-25 01:13:29', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation_types`
--

CREATE TABLE `donation_types` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_types`
--

INSERT INTO `donation_types` (`id`, `name`, `createddate`, `updateddate`, `isdeleted`) VALUES
(2, 'كفاله خاصه', '2019-02-27 00:00:00', '2019-02-27 00:00:00', 0),
(3, 'كفاله عامه', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation_values`
--

CREATE TABLE `donation_values` (
  `id` int(11) NOT NULL,
  `donation_options_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_values`
--

INSERT INTO `donation_values` (`id`, `donation_options_id`, `value`, `receipt_id`, `createddate`, `updateddate`, `isdeleted`) VALUES
(113, 59, 'عادل امام', 38, '2019-05-23 15:18:10', '0000-00-00 00:00:00', 0),
(114, 58, '600', 38, '2019-05-23 15:18:10', '0000-00-00 00:00:00', 0),
(115, 60, '171', 38, '2019-05-23 15:18:10', '0000-00-00 00:00:00', 0),
(116, 64, '29805230101775', 38, '2019-05-23 15:18:10', '0000-00-00 00:00:00', 0),
(117, 59, 'حازم علام', 39, '2019-05-23 15:31:27', '0000-00-00 00:00:00', 0),
(118, 58, '300', 39, '2019-05-23 15:31:27', '0000-00-00 00:00:00', 0),
(119, 60, '171', 39, '2019-05-23 15:31:27', '0000-00-00 00:00:00', 0),
(120, 64, '29643194298524', 39, '2019-05-23 15:31:27', '0000-00-00 00:00:00', 0),
(121, 59, 'عبير السيد حجازي', 40, '2019-05-23 23:00:44', '0000-00-00 00:00:00', 0),
(122, 58, '200', 40, '2019-05-23 23:00:44', '0000-00-00 00:00:00', 0),
(123, 60, '111', 40, '2019-05-23 23:00:44', '0000-00-00 00:00:00', 0),
(124, 64, '27808311110837', 40, '2019-05-23 23:00:44', '0000-00-00 00:00:00', 0),
(125, 59, 'محسن عدنان', 41, '2019-05-23 23:24:25', '0000-00-00 00:00:00', 0),
(126, 58, '450', 41, '2019-05-23 23:24:25', '0000-00-00 00:00:00', 0),
(127, 60, '145', 41, '2019-05-23 23:24:25', '0000-00-00 00:00:00', 0),
(128, 64, '27811011500153', 41, '2019-05-23 23:24:25', '0000-00-00 00:00:00', 0),
(129, 61, 'احمد محمد', 42, '2019-05-23 23:27:35', '0000-00-00 00:00:00', 0),
(130, 62, '400', 42, '2019-05-23 23:27:35', '0000-00-00 00:00:00', 0),
(131, 63, '27702170100000', 42, '2019-05-23 23:27:35', '0000-00-00 00:00:00', 0),
(132, 59, 'حازم علام', 43, '2019-05-23 23:48:13', '0000-00-00 00:00:00', 0),
(133, 58, '700', 43, '2019-05-23 23:48:13', '0000-00-00 00:00:00', 0),
(134, 60, '111', 43, '2019-05-23 23:48:13', '0000-00-00 00:00:00', 0),
(135, 64, '2147483647', 43, '2019-05-23 23:48:13', '0000-00-00 00:00:00', 0),
(136, 65, 'حازم علام', 44, '2019-05-24 00:03:01', '0000-00-00 00:00:00', 0),
(137, 66, '200', 44, '2019-05-24 00:03:01', '0000-00-00 00:00:00', 0),
(138, 67, '2147483647', 44, '2019-05-24 00:03:01', '0000-00-00 00:00:00', 0),
(139, 59, 'احمد محمد', 45, '2019-05-24 00:36:03', '0000-00-00 00:00:00', 0),
(140, 58, '180', 45, '2019-05-24 00:36:03', '0000-00-00 00:00:00', 0),
(141, 60, '144', 45, '2019-05-24 00:36:03', '0000-00-00 00:00:00', 0),
(142, 64, '21497461976418', 45, '2019-05-24 00:36:03', '0000-00-00 00:00:00', 0),
(143, 61, 'عادل امام', 46, '2019-05-25 01:08:40', '0000-00-00 00:00:00', 0),
(144, 62, '400', 46, '2019-05-25 01:08:40', '0000-00-00 00:00:00', 0),
(145, 63, '2147483647', 46, '2019-05-25 01:08:40', '0000-00-00 00:00:00', 0),
(146, 59, 'حسن علي', 47, '2019-06-24 15:56:56', '0000-00-00 00:00:00', 0),
(147, 58, '3000', 47, '2019-06-24 15:56:56', '0000-00-00 00:00:00', 0),
(148, 60, '111', 47, '2019-06-24 15:56:56', '0000-00-00 00:00:00', 0),
(149, 64, '2985625625233', 47, '2019-06-24 15:56:56', '0000-00-00 00:00:00', 0),
(150, 61, 'خليل ', 48, '2019-06-24 15:57:36', '0000-00-00 00:00:00', 0),
(151, 62, '500', 48, '2019-06-24 15:57:37', '0000-00-00 00:00:00', 0),
(152, 63, '29856859982', 48, '2019-06-24 15:57:37', '0000-00-00 00:00:00', 0),
(153, 61, 'حميده', 49, '2019-06-28 22:56:58', '0000-00-00 00:00:00', 0),
(154, 62, '500', 49, '2019-06-28 22:56:58', '0000-00-00 00:00:00', 0),
(155, 63, '29886555332255', 49, '2019-06-28 22:56:58', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `national_id` text NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `national_id`, `isdeleted`) VALUES
(58, 'عادل امام', '2147483647', 0),
(59, 'حازم علام', '2147483647', 0),
(60, 'عبير السيد حجازي', '2147483647', 0),
(61, 'محسن عدنان', '2147483647', 0),
(62, 'احمد محمد', '2147483647', 0),
(63, 'احمد محمد', '21497461976418', 0),
(64, 'حسن علي', '2985625625233', 0),
(65, 'خليل ', '29856859982', 0),
(66, 'حميده', '29886555332255', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `mobile` text NOT NULL,
  `date_of_work` date NOT NULL,
  `salary` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `person_id`, `mobile`, `date_of_work`, `salary`, `createddate`, `updateddate`, `isdeleted`) VALUES
(61, 165, '1001578476', '2019-04-18', 6000, '2019-06-29 00:17:31', '0000-00-00 00:00:00', 1),
(62, 166, '1004065544', '2019-05-21', 2500, '2019-05-23 14:37:10', '0000-00-00 00:00:00', 0),
(63, 167, '1116425983', '2019-05-16', 1200, '2019-06-29 00:15:33', '0000-00-00 00:00:00', 0),
(64, 168, '01001578476', '2019-05-16', 2244, '2019-05-23 00:11:30', '0000-00-00 00:00:00', 0),
(65, 169, '1001574978', '2019-05-16', 3500, '2019-06-29 00:15:35', '0000-00-00 00:00:00', 0),
(66, 170, '01223467982', '2018-07-14', 1800, '2019-05-23 14:46:23', '0000-00-00 00:00:00', 0),
(67, 172, '01113678412', '2018-06-01', 2000, '2019-06-29 00:15:38', '0000-00-00 00:00:00', 0),
(68, 173, '1003691287', '2019-04-29', 1800, '2019-05-23 15:11:18', '0000-00-00 00:00:00', 0),
(69, 175, '01001462211', '2019-04-17', 1200, '2019-05-23 23:54:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(11) NOT NULL,
  `governorate_name` varchar(50) NOT NULL,
  `governorate_name_en` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `governorate_name`, `governorate_name_en`) VALUES
(1, 'القاهرة', 'Cairo'),
(2, 'الجيزة', 'Giza'),
(3, 'الأسكندرية', 'Alexandria'),
(4, 'الدقهلية', 'Dakahlia'),
(5, 'البحر الأحمر', 'Red Sea'),
(6, 'البحيرة', 'Beheira'),
(7, 'الفيوم', 'Fayoum'),
(8, 'الغربية', 'Gharbiya'),
(9, 'الإسماعلية', 'Ismailia'),
(10, 'المنوفية', 'Monofia'),
(11, 'المنيا', 'Minya'),
(12, 'القليوبية', 'Qaliubiya'),
(13, 'الوادي الجديد', 'New Valley'),
(14, 'السويس', 'Suez'),
(15, 'اسوان', 'Aswan'),
(16, 'اسيوط', 'Assiut'),
(17, 'بني سويف', 'Beni Suef'),
(18, 'بورسعيد', 'Port Said'),
(19, 'دمياط', 'Damietta'),
(20, 'الشرقية', 'Sharkia'),
(21, 'جنوب سيناء', 'South Sinai'),
(22, 'كفر الشيخ', 'Kafr Al sheikh'),
(23, 'مطروح', 'Matrouh'),
(24, 'الأقصر', 'Luxor'),
(25, 'قنا', 'Qena'),
(26, 'شمال سيناء', 'North Sinai'),
(27, 'سوهاج', 'Sohag');

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`id`, `name`, `content`, `isdeleted`) VALUES
(1, 'body', 'مرحبا بكم في دار الفرقن', 0),
(2, 'تهئه عيد ', 'كل عام و أنتم بخير', 0),
(3, 'اجازه', 'اجازه في يوم', 0),
(4, 'اجازه 2', 'اليوم 2/5', 1),
(5, 'sara', 'aaa', 1),
(6, 'sara', '', 1),
(7, 'sara', '', 1),
(8, 'sara', '', 1),
(9, '', '', 1),
(10, '', '', 1),
(11, '', '', 1),
(12, 'ahmed', '', 1),
(13, 'رمضان', 'رمضان كريم', 0),
(14, 'عيد الاضحى', 'عيد اضحى سعيد', 0),
(15, 'اكتوبر', 'كل عام و انتم بخير', 0),
(16, '  ', 'مشس', 0),
(17, ' عيد الشرطة', 'عيد الشرطة', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `option_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `option_type_id`, `created_at`, `updated_at`) VALUES
(8, 'الاسم', 1, '2019-05-18 19:13:10', '0000-00-00 00:00:00'),
(9, 'المبلغ', 2, '2019-05-18 19:13:10', '0000-00-00 00:00:00'),
(22, 'الرقم', 2, '2019-05-18 19:13:10', '0000-00-00 00:00:00'),
(23, 'اسماء الاطفال', 5, '2019-05-18 19:13:10', '0000-00-00 00:00:00'),
(24, 'الرقم القومي', 2, '2019-05-18 19:13:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `options_types`
--

CREATE TABLE `options_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options_types`
--

INSERT INTO `options_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'text', '2019-05-18 19:11:51', '0000-00-00 00:00:00'),
(2, 'number', '2019-05-18 19:11:51', '0000-00-00 00:00:00'),
(3, 'date', '2019-05-18 19:11:51', '0000-00-00 00:00:00'),
(4, 'email', '2019-05-18 19:11:51', '0000-00-00 00:00:00'),
(5, 'childNamesOption', '2019-05-18 19:11:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `physical_address` text NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `physical_address`, `createddate`, `updateddate`, `isdeleted`) VALUES
(1, 'index.php', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Rheader.html', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Aheader.html', '2019-05-22 00:49:03', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `past_emp`
--

CREATE TABLE `past_emp` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `past_emp`
--

INSERT INTO `past_emp` (`id`, `person_id`, `reason`) VALUES
(1, 169, 'سارق'),
(2, 165, 'سارق');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `birth_date` date NOT NULL,
  `national_id` text NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `birth_date`, `national_id`, `gender`, `role_id`, `branch_id`, `created_at`, `updated_at`, `isdeleted`) VALUES
(155, 'عمرو احمد', '1998-04-28', '12111111111111', 0, 7, 2, '2019-05-21 13:16:20', '0000-00-00 00:00:00', 0),
(156, 'عمار خالد', '1987-07-15', '29805230101775', 0, 7, 1, '2019-05-21 15:38:58', '0000-00-00 00:00:00', 0),
(165, 'احمد سمير', '1996-05-21', '12345678901234', 0, 4, 1, '2019-06-29 00:17:30', '0000-00-00 00:00:00', 1),
(166, 'عمر اشرف', '1996-05-10', '29605101647985', 0, 7, 1, '2019-06-24 15:53:45', '0000-00-00 00:00:00', 0),
(167, 'فيروز خالد', '1998-05-14', '29805141346952', 1, 8, 1, '2019-06-29 00:14:55', '0000-00-00 00:00:00', 0),
(168, 'عمر احمد', '1995-05-25', '12345678901238', 0, 8, 1, '2019-06-24 15:54:06', '0000-00-00 00:00:00', 0),
(169, 'احمد عوض السيد', '1994-05-05', '12345678901239', 0, 8, 2, '2019-06-29 00:14:58', '0000-00-00 00:00:00', 0),
(170, 'ايمان عبد الحي سرور', '1967-04-03', '26704031649851', 1, 8, 3, '2019-05-23 14:46:23', '0000-00-00 00:00:00', 0),
(172, 'احمد سليمان', '1994-02-16', '29402161549876', 0, 5, 1, '2019-06-29 00:15:02', '0000-00-00 00:00:00', 0),
(173, 'تامر السيد', '1990-05-16', '29005167429757', 0, 3, 1, '2019-06-24 17:17:32', '0000-00-00 00:00:00', 0),
(175, 'غسان سامي', '1962-02-20', '26202200639932', 0, 7, 2, '2019-06-24 15:52:47', '0000-00-00 00:00:00', 0),
(183, 'امال حسنين السيد', '2019-06-01', '29645712356025', 1, 6, 1, '2019-06-28 23:23:57', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL,
  `donation_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `parent_id`, `createddate`, `updateddate`, `isdeleted`) VALUES
(1, 'system_user\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'non_system_user', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'receptionist', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'accountant', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'child', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'سائق', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'مشرف اطقال', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'ؤ', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'طباخ', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `name`) VALUES
(1, 'KG1'),
(2, 'KG2'),
(3, 'الاول الابتدائي'),
(4, 'الثاني الابتدائي'),
(5, 'الثالث الابتدائي'),
(6, 'الرابع الابتدائي'),
(7, 'الخامس الابتدائي'),
(8, 'السادس الابتدائي'),
(9, 'الاول الاعدادي'),
(10, 'الثاني الاعدادي'),
(11, 'الثالث الاعدادي'),
(12, 'الاول الثانوي'),
(13, 'الثاني الثانوي'),
(14, 'الثالث الثانوي');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `station_name` text NOT NULL,
  `station_name_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `city_id`, `station_name`, `station_name_en`) VALUES
(1, 251, 'قسم صقر قريش', 'Saqr Koreish Station'),
(2, 251, 'قسم ثكانات المعادي', 'Thakanat El Maadi Station'),
(3, 252, 'قسم اول مدينه نصر', 'First Station Nasr City'),
(4, 252, 'قسم ثاني مدينه نصر', 'Second Station Nasr City'),
(5, 3, 'سته اكتوبر', ''),
(6, 4, 'الشيخ زايد', '');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `id` int(11) NOT NULL,
  `talent_name` text NOT NULL,
  `isdeleted` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id`, `talent_name`, `isdeleted`, `created_at`, `updated_at`) VALUES
(1, 'العزف', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'الغناء', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'الخياطه', 1, '2019-05-21 11:27:48', '0000-00-00 00:00:00'),
(4, 'الكروشيه', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'العدو', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'الرسم', 0, '2019-05-21 11:26:03', '0000-00-00 00:00:00'),
(7, 'التطريز', 0, '2019-05-23 23:43:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `person_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `person_id`, `created_at`, `updated_at`, `isdeleted`) VALUES
(17, 'sara', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 101, '2019-05-15 13:24:02', '0000-00-00 00:00:00', 0),
(34, 'ahmeed', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 165, '2019-06-29 00:17:31', '0000-00-00 00:00:00', 1),
(36, 'ahmeeds', '8cb2237d0679ca88db6464eac60da96345513964', 166, '2019-06-24 17:13:20', '0000-00-00 00:00:00', 0),
(37, 'fezo', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 167, '2019-06-29 00:15:14', '0000-00-00 00:00:00', 0),
(39, 'solly', '7c4a8d09ca3762af61e59520943dc26494f8941b\r\n\r\n\r\n', 172, '2019-06-29 00:15:17', '0000-00-00 00:00:00', 0),
(40, 'tamer', '8cb2237d0679ca88db6464eac60da96345513964', 173, '2019-06-18 09:33:30', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `page_id`, `createddate`, `updateddate`, `isdeleted`) VALUES
(1, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 4, 2, '2019-05-22 00:23:23', '0000-00-00 00:00:00', 0),
(3, 5, 3, '2019-05-22 00:49:25', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`supervisor_id`),
  ADD KEY `case_ibfk_2` (`child_id`);

--
-- Indexes for table `case_details`
--
ALTER TABLE `case_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_id` (`document_id`,`case_id`),
  ADD KEY `case_details_ibfk_1` (`case_id`);

--
-- Indexes for table `child_donation`
--
ALTER TABLE `child_donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_id` (`receipt_id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `child_talents`
--
ALTER TABLE `child_talents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`,`talent_id`),
  ADD KEY `talent_id` (`talent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gov_id` (`gov_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gov_id` (`gov_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `document_history`
--
ALTER TABLE `document_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_options`
--
ALTER TABLE `donation_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_values_id` (`donation_types_id`),
  ADD KEY `options_id` (`options_id`);

--
-- Indexes for table `donation_types`
--
ALTER TABLE `donation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_values`
--
ALTER TABLE `donation_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_options_id` (`donation_options_id`,`receipt_id`),
  ADD KEY `receipt_id` (`receipt_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_type_id` (`option_type_id`);

--
-- Indexes for table `options_types`
--
ALTER TABLE `options_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `past_emp`
--
ALTER TABLE `past_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_ibfk_1` (`role_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient_id` (`user_id`),
  ADD KEY `receipt_ibfk_2` (`donation_type_id`),
  ADD KEY `donar_id` (`donor_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `password_2` (`password`),
  ADD KEY `password_3` (`password`),
  ADD KEY `password` (`password`) USING BTREE,
  ADD KEY `password_4` (`password`) USING BTREE;

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`role_id`),
  ADD KEY `page_id` (`page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `case_details`
--
ALTER TABLE `case_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `child_donation`
--
ALTER TABLE `child_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `child_talents`
--
ALTER TABLE `child_talents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `document_history`
--
ALTER TABLE `document_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_options`
--
ALTER TABLE `donation_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `donation_types`
--
ALTER TABLE `donation_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation_values`
--
ALTER TABLE `donation_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `options_types`
--
ALTER TABLE `options_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `past_emp`
--
ALTER TABLE `past_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_details`
--
ALTER TABLE `case_details`
  ADD CONSTRAINT `case_details_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `case` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `case_details_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
