-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2015 г., 21:01
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `Store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` char(38) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `Telefon` char(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `PasswordSalt` varbinary(30) NOT NULL,
  `PasswordKey` varbinary(30) NOT NULL,
  `IsApproved` bit(1) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `Telefon`, `email`, `PasswordSalt`, `PasswordKey`, `IsApproved`) VALUES
('{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', 'krasaler', '+380962000872', 'krasaler@gmail.com', '׍ُ۶}Ћȹ\r󙆻', '1a7196d8ba164a884cf8', b'1'),
('{EE2BA503-158F-5C3C-FF8E-EDF69023CD52}', 'alexkrasnij', '+380962000872', 'alexkrasnij@yandex.ru', 'L䙺1Չ̰>ÿ:Ƨ, '23d2629627750c0d0921', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attributegroup_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`attribute_id`),
  KEY `unit_id` (`unit_id`),
  KEY `FK_attribute_attributegroup` (`attributegroup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `attributegroup_id`, `name`, `type`, `unit_id`, `status`) VALUES
(1, 2, 'Производитель СPU', 2, NULL, 1),
(2, 2, 'Количество ядер', 1, 7, 1),
(3, 2, 'Модель процессора', 1, NULL, 1),
(4, 1, 'Тип ОЗУ', 2, NULL, 1),
(5, 1, 'Частота ОЗУ', 1, 8, 1),
(6, 1, 'Объем ОЗУ', 1, 3, 1),
(7, 1, 'Максимальный объем ОЗУ', 1, 3, 1),
(8, 1, 'Количество модулей ОЗУ', 1, 7, 1),
(9, 1, 'Количество слотов ОЗУ', 1, 7, 1),
(10, 4, 'SSD', 1, 3, 1),
(11, 4, 'Объем HDD', 1, 3, 1),
(12, 4, 'Интерфейс HDD', 2, NULL, 1),
(13, 4, 'Скорость вращения шпинделя', 1, NULL, 1),
(14, 3, 'Производитель GPU', 2, NULL, 1),
(15, 3, 'Тип видеокарты', 1, NULL, 1),
(16, 3, 'Модель видеокарты', 1, NULL, 1),
(17, 5, 'Звуковая система', 1, NULL, 1),
(18, 4, 'Тип оптического привода	', 1, NULL, 1),
(19, 4, 'Тип Blu-Ray', 1, NULL, 1),
(20, 5, 'Сетевой адаптер', 1, NULL, 1),
(21, 5, 'Wi-Fi', 1, NULL, 1),
(22, 5, 'Bluetooth', 1, NULL, 1),
(23, 5, 'USB 3.0', 1, 7, 1),
(24, 5, 'USB 2.0', 1, 7, 1),
(25, 5, 'HDMI', 1, NULL, 1),
(26, 5, 'DVI', 1, NULL, 1),
(27, 5, 'DisplayPort', 1, NULL, 1),
(28, 5, 'Кард-ридер', 1, NULL, 1),
(29, 5, 'Другие интерфейсы', 1, NULL, 1),
(41, 1, 'Операционная система', 1, NULL, 1),
(42, 15, 'Вес', 1, 5, 1),
(43, 15, 'Размер(ШхВхД)', 1, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `attributegroup`
--

CREATE TABLE IF NOT EXISTS `attributegroup` (
  `attributegroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`attributegroup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `attributegroup`
--

INSERT INTO `attributegroup` (`attributegroup_id`, `name`) VALUES
(1, 'Оперативная память'),
(2, 'Процессор'),
(3, 'Видеокарта'),
(4, 'Хранение данных'),
(5, 'Интерфейс'),
(15, 'Прочее');

-- --------------------------------------------------------

--
-- Структура таблицы `attributelist`
--

CREATE TABLE IF NOT EXISTS `attributelist` (
  `attributelist_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`attributelist_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `attributelist`
--

INSERT INTO `attributelist` (`attributelist_id`, `attribute_id`, `name`) VALUES
(4, 1, 'Intel'),
(5, 1, 'AMD'),
(6, 4, 'DDR1'),
(7, 4, 'DDR2'),
(8, 4, 'DDR3'),
(9, 4, 'DDR4'),
(10, 12, 'IDE'),
(11, 12, 'SATA I'),
(12, 12, 'SATA II'),
(13, 12, 'SATA III'),
(14, 12, 'eSATA'),
(15, 12, 'USB'),
(16, 12, 'Thunderbolt'),
(18, 12, 'SCSI'),
(19, 12, 'SAS'),
(20, 12, 'NAS'),
(21, 14, 'Nvidia'),
(22, 14, 'AMD'),
(23, 14, 'Intel');

-- --------------------------------------------------------

--
-- Структура таблицы `attributevaluefloat`
--

CREATE TABLE IF NOT EXISTS `attributevaluefloat` (
  `attributevaluefloat_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`attributevaluefloat_id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `FK_attributevaluefloat_product` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `attributevaluefloat`
--

INSERT INTO `attributevaluefloat` (`attributevaluefloat_id`, `product_id`, `attribute_id`, `value`) VALUES
(1, 1, 2, '2'),
(2, 1, 3, '0'),
(3, 1, 5, '1600'),
(4, 1, 6, '6'),
(5, 1, 7, '32'),
(6, 1, 8, '1'),
(7, 1, 9, '4'),
(8, 1, 11, '1000'),
(9, 1, 13, '7200'),
(14, 20, 11, '82'),
(15, 20, 13, '7200'),
(28, 30, 5, '1333'),
(29, 30, 6, '2'),
(30, 31, 5, '1600'),
(31, 31, 6, '4');

-- --------------------------------------------------------

--
-- Структура таблицы `attributevaluelist`
--

CREATE TABLE IF NOT EXISTS `attributevaluelist` (
  `attributevaluelist_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`attributevaluelist_id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `FK_attributevaluelist_attributelist` (`value`),
  KEY `FK_attributevaluelist_product` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `attributevaluelist`
--

INSERT INTO `attributevaluelist` (`attributevaluelist_id`, `product_id`, `attribute_id`, `value`) VALUES
(2, 1, 4, 8),
(4, 1, 1, 4),
(6, 20, 12, 10),
(13, 30, 4, 8),
(14, 31, 4, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `Branch`
--

CREATE TABLE IF NOT EXISTS `Branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `Address` varchar(200) NOT NULL,
  `name` varchar(45) NOT NULL,
  `Telephone` varchar(45) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `Branch`
--

INSERT INTO `Branch` (`branch_id`, `Address`, `name`, `Telephone`) VALUES
(1, 'проспект Ленина 49б', 'г. Харьков, магазин на пр. Ленина', '(057) 777-77-77'),
(2, 'улица Блюхера 11', 'г. Харьков магазин на улице Блюхера', '(057) 766-66-66');

-- --------------------------------------------------------

--
-- Структура таблицы `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `catalogue_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`catalogue_id`),
  KEY `FK_catalogue_section` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `catalogue`
--

INSERT INTO `catalogue` (`catalogue_id`, `section_id`, `name`) VALUES
(1, 1, 'Компьютеры'),
(2, 1, 'Мониторы'),
(3, 2, 'iMac'),
(4, 2, 'iPad'),
(6, 2, 'iPhone'),
(7, 2, 'iPod'),
(9, 2, 'Mac mini'),
(12, 2, 'Mac Pro'),
(13, 2, 'MacBook'),
(14, 2, 'Аксессуары для iPad'),
(15, 2, 'Аксессуары для iPhone'),
(16, 2, 'Аксессуары для MacBook'),
(17, 3, 'Кондиционеры'),
(19, 3, 'Плиты'),
(23, 1, 'Оперативная память'),
(28, 1, 'Процессоры'),
(29, 1, 'Жесткие диски'),
(30, 1, 'Утюг');

-- --------------------------------------------------------

--
-- Структура таблицы `catalogueattribute`
--

CREATE TABLE IF NOT EXISTS `catalogueattribute` (
  `catalogueattribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `catalogue_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `vis_mode` int(11) NOT NULL,
  PRIMARY KEY (`catalogueattribute_id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `FK_catalogueattribute_catalogue` (`catalogue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;

--
-- Дамп данных таблицы `catalogueattribute`
--

INSERT INTO `catalogueattribute` (`catalogueattribute_id`, `catalogue_id`, `attribute_id`, `vis_mode`) VALUES
(18, 28, 1, 1),
(19, 28, 2, 1),
(20, 28, 3, 1),
(21, 29, 11, 1),
(22, 29, 12, 1),
(23, 29, 13, 1),
(140, 23, 4, 1),
(141, 23, 5, 1),
(142, 23, 6, 1),
(143, 30, 17, 1),
(144, 1, 4, 1),
(145, 1, 5, 1),
(146, 1, 6, 1),
(147, 1, 7, 1),
(148, 1, 8, 1),
(149, 1, 1, 1),
(150, 1, 2, 1),
(151, 1, 3, 1),
(152, 1, 14, 1),
(153, 1, 15, 1),
(154, 1, 16, 1),
(155, 1, 10, 1),
(156, 1, 12, 1),
(157, 1, 13, 1),
(158, 1, 18, 1),
(159, 1, 19, 1),
(160, 1, 17, 1),
(161, 1, 20, 1),
(162, 1, 21, 1),
(163, 1, 22, 1),
(164, 1, 23, 1),
(165, 1, 24, 1),
(166, 1, 25, 1),
(167, 1, 26, 1),
(168, 1, 27, 1),
(169, 1, 28, 1),
(170, 1, 29, 1),
(171, 1, 42, 1),
(172, 1, 43, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orderlist`
--

CREATE TABLE IF NOT EXISTS `orderlist` (
  `orderlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`orderlist_id`),
  KEY `order_id` (`order_id`),
  KEY `item_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `orderlist`
--

INSERT INTO `orderlist` (`orderlist_id`, `order_id`, `product_id`) VALUES
(15, 7, 11),
(16, 8, 1),
(17, 8, 4),
(18, 8, 16),
(19, 9, 4),
(20, 9, 1),
(21, 10, 4),
(22, 11, 4),
(23, 12, 4),
(24, 12, 1),
(25, 13, 4),
(26, 13, 1),
(27, 14, 4),
(28, 14, 1),
(29, 15, 4),
(30, 16, 1),
(31, 17, 1),
(32, 18, 1),
(33, 19, 1),
(38, 21, 4),
(39, 18, 1),
(41, 22, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` char(38) NOT NULL,
  `date_order` datetime NOT NULL,
  `statusorder_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `status_id` (`statusorder_id`),
  KEY `account_id` (`account_id`),
  KEY `fgh_idx` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `account_id`, `date_order`, `statusorder_id`, `branch_id`) VALUES
(6, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-24 19:58:16', 2, 1),
(7, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 12:25:08', 5, 1),
(8, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 14:36:51', 2, 2),
(9, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 14:40:34', 5, 1),
(10, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 16:55:51', 2, 1),
(11, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 16:56:43', 2, 1),
(12, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 16:58:24', 5, 1),
(13, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-25 16:59:24', 2, 2),
(14, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-27 13:42:12', 1, 1),
(15, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-27 13:43:42', 1, 2),
(16, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-09-29 21:49:53', 1, 2),
(17, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-10-02 14:41:27', 1, 2),
(18, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-10-02 14:44:15', 1, 2),
(19, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-10-02 14:45:22', 1, 1),
(20, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-10-02 14:45:46', 2, 1),
(21, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-10-02 14:48:07', 1, 2),
(22, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2015-10-02 14:51:43', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `Permission`
--

INSERT INTO `Permission` (`permission_id`, `name`) VALUES
(1, 'Viewer'),
(2, 'Editor');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `Price` double NOT NULL,
  `catalogue_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `catalogue_id` (`catalogue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `Name`, `description`, `Price`, `catalogue_id`) VALUES
(1, 'Компьютер Lenovo IdeaCentre K450 (57-330280)', '<div class="tabbedBrowse-features-mediatext"><h2 class="tabbedBrowse-features-featureHeading">Трьохпозиційний перемикач живлення</h2><p class="tabbedBrowse-features-featureText">IdeaCentre K450 настільки потужний, що ми забезпечили його трьохпозиційним перемикачем живлення. У червоному положенні комп''ютер швидко працює і споживає багато енергії, в синьому - працює в нормальному режимі, в зеленому функціонує тихо та зі зниженим енергоспоживанням.</p><h2 class="tabbedBrowse-features-featureHeading">Графічна система, створена для ігор</h2><p class="tabbedBrowse-features-featureText">Завдяки підтримці відеокарт аж до NVIDIA® GeForce® GTX660 1,5 ГБ і AMD Radeon ™ HD 8670 2 ГБ найсучасніші 3D-ігри працюють без жодних затримок.</p><h2 class="tabbedBrowse-features-featureHeading">Система просторового звуку 7.1</h2><p class="tabbedBrowse-features-featureText">Звукова система, аналогічна використовуваним в домашніх кінотеатрах, забезпечить найяскравіші враження від фільмів і комп''ютерних ігор.</p><h2 class="tabbedBrowse-features-featureHeading">Запам''ятовуючі пристрої і оперативна пам''ять</h2><p class="tabbedBrowse-features-featureText">Оперативна пам''ять DDR3 об''ємом до 32 ГБ дозволить максимально збільшити продуктивність вашого ПК і рівень багатозадачності. Жорсткий диск ємністю до 4 ТБ забезпечить зберігання всіх ваших даних. Використовуючи портативний жорсткий диск SATA Universal Storage Module (USM) 500 ГБ, ви отримаєте додатковий дисковий простір для зберігання даних і можливість підключення до інших ПК за допомогою кабелю USB 3.0.</p><h2 class="tabbedBrowse-features-featureHeading">Простота модернізації - без використання спеціальних інструментів</h2><p class="tabbedBrowse-features-featureText">Якщо вам недостатньо найвищої продуктивності IdeaCentre K450 - ви можете збільшити її! Розширюваність, зручність доступу до жорсткого диску, велика кількість портів і слотів, а також широкі можливості підключення додаткових компонентів забезпечують простоту модернізації ПК. Усередині корпусу достатньо простору для двох оптичних і двох жорстких дисків. Є всі необхідні порти і роз''єми. Інноваційна конструкція K450 дозволяє модернізувати настільний ПК без спеціальних інструментів.</p><h2 class="tabbedBrowse-features-featureHeading">Підтримка роз''єму SuperSpeed USB 3.0</h2><p class="tabbedBrowse-features-featureText">Підвищення швидкості передачі даних в 10 разів дає можливість миттєво копіювати мультимедійні файли великого розміру. Інтерфейс USB 3.0 можна використовувати також для підключення периферійного аудіо-і відеоустаткування. Зворотна сумісність з пристроями USB 2.0.</p><h2 class="tabbedBrowse-features-featureHeading">Вбудований DVD-привод з функцією читання/запису або привод Blu-Ray ™</h2><p class="tabbedBrowse-features-featureText">Переглядайте фільми, слухайте музику і записуйте диски, використовуючи вбудований в K450 DVD-привод з функцією читання / запису або привод Blu-Ray ™.</p></div>', 13800, 1),
(4, ' Компьютер Acer Aspire XC-603 (DT.SULME.003)', '', 6075, 1),
(5, 'Монитор LCD 22" LG 22MP47A-P', '', 2799, 2),
(9, ' Монитор LCD 22" Philips 224E5QSB/01', '', 3475, 2),
(11, 'Монитор LCD 22" Philips 226V4LAB/01', '', 2953, 2),
(12, 'Монитор LCD 23" Philips 237E4QSD/01', '', 3954, 2),
(15, 'Монитор LCD 24" Samsung S24D590PL ', '', 4699, 2),
(16, 'Компьютер Apple Mac Mini A1347 (MGEN2GU/A)', '', 21799, 9),
(20, 'Hitachi Deskstar 7K160 HDS721680PLAT80 82 Гб', '<p><b>Highlights</b></p>\n<ul class="standard_text">\n<li>Award-winning, 7200 RPM performance for better throughput in a variety of applications, backed by industry-leading benchmark performance \n</li><li>Fast ATA - 133\n</li><li>Low power design reduces system costs and drives high reliability in ATA-RAID and other multiple drive systems \n</li><li>Quiet operating modes for easy integration into noise sensitive environments </li></ul>\n			<p>\n				<br>\n				<strong>Compatibility</strong>\n			</p> <p>This drive is compatible with any computer that accepts 3.5" form factor&nbsp;IDE / EIDE / PATA drives.</p>', 1000, 29),
(30, 'Модуль памяти DDR3 2Gb 1333MHz GoodRam (GR1333D364L9/2G)', 'Модуль памяти DDR3 2Gb 1333MHz GoodRam (GR1333D364L9/2G)', 386, 23),
(31, 'Модуль памяти DDR3 4Gb 1600MHz GoodRam (GR1600D364L11S/4G)', 'Модуль памяти DDR3 4Gb 1600MHz GoodRam (GR1600D364L11S/4G)', 636, 23);

-- --------------------------------------------------------

--
-- Структура таблицы `Review`
--

CREATE TABLE IF NOT EXISTS `Review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `account_id` char(38) NOT NULL DEFAULT '0',
  `value` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`review_id`),
  KEY `FK__account` (`account_id`),
  KEY `FK__product` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `Review`
--

INSERT INTO `Review` (`review_id`, `product_id`, `account_id`, `value`) VALUES
(32, 1, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', 'Приветик'),
(43, 4, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL DEFAULT '0',
  `Description` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `Role`
--

INSERT INTO `Role` (`role_id`, `role_name`, `Description`) VALUES
(1, 'Admin', 'Администратор'),
(2, 'Manager', 'Менеджер'),
(3, 'Пользователь', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `RolePermission`
--

CREATE TABLE IF NOT EXISTS `RolePermission` (
  `rolepermission_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `CanCreate` bit(1) NOT NULL DEFAULT b'0',
  `CanRead` bit(1) NOT NULL DEFAULT b'0',
  `CanUpdate` bit(1) NOT NULL DEFAULT b'0',
  `CanRemove` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`rolepermission_id`),
  KEY `FK_RolePermission_Permission` (`permission_id`),
  KEY `FK_RolePermission_Role` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `RolePermission`
--

INSERT INTO `RolePermission` (`rolepermission_id`, `role_id`, `permission_id`, `CanCreate`, `CanRead`, `CanUpdate`, `CanRemove`) VALUES
(1, 1, 2, b'1', b'1', b'1', b'1'),
(2, 2, 1, b'1', b'1', b'0', b'0'),
(4, 2, 2, b'1', b'1', b'1', b'0'),
(5, 3, 1, b'0', b'1', b'0', b'0'),
(6, 1, 1, b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(100) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`section_id`, `section_name`) VALUES
(1, 'Компьютерная техника, комплектующие'),
(2, 'Apple'),
(3, 'Бытовая техника');

-- --------------------------------------------------------

--
-- Структура таблицы `statusorder`
--

CREATE TABLE IF NOT EXISTS `statusorder` (
  `statusorder_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`statusorder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `statusorder`
--

INSERT INTO `statusorder` (`statusorder_id`, `name`) VALUES
(1, 'Ожидание подтверждения'),
(2, 'Отменен'),
(3, 'Ожидание доставки'),
(4, 'Доступен к получения'),
(5, 'Получен');

-- --------------------------------------------------------

--
-- Структура таблицы `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `unit`
--

INSERT INTO `unit` (`unit_id`, `name`) VALUES
(1, 'КБ'),
(2, 'МБ'),
(3, 'ГБ'),
(4, 'ТБ'),
(5, 'кг.'),
(6, 'мм.'),
(7, 'шт.'),
(8, 'МГц'),
(9, 'ГГц'),
(10, 'ВТ'),
(12, 'inch');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` char(38) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_name`) VALUES
('{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', 'krasaler'),
('{EE2BA503-158F-5C3C-FF8E-EDF69023CD52}', 'alexkrasnij');

-- --------------------------------------------------------

--
-- Структура таблицы `UserRole`
--

CREATE TABLE IF NOT EXISTS `UserRole` (
  `userrole_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(38) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`userrole_id`),
  KEY `FK_UserRole_user` (`user_id`),
  KEY `FK_UserRole_Role` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `UserRole`
--

INSERT INTO `UserRole` (`userrole_id`, `user_id`, `role_id`) VALUES
(1, '{E6B1CC3C-4AB2-4958-CA84-E3DBA9192624}', 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `attribute_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_attribute_attributegroup` FOREIGN KEY (`attributegroup_id`) REFERENCES `attributegroup` (`attributegroup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attributelist`
--
ALTER TABLE `attributelist`
  ADD CONSTRAINT `attributelist_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attributevaluefloat`
--
ALTER TABLE `attributevaluefloat`
  ADD CONSTRAINT `FK_attributevaluefloat_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_attributevaluefloat_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attributevaluelist`
--
ALTER TABLE `attributevaluelist`
  ADD CONSTRAINT `FK_attributevaluelist_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_attributevaluelist_attributelist` FOREIGN KEY (`value`) REFERENCES `attributelist` (`attributelist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_attributevaluelist_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `catalogue`
--
ALTER TABLE `catalogue`
  ADD CONSTRAINT `FK_catalogue_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `catalogueattribute`
--
ALTER TABLE `catalogueattribute`
  ADD CONSTRAINT `FK_catalogueattribute_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_catalogueattribute_catalogue` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue` (`catalogue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `FK_orderlist_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_Branch` FOREIGN KEY (`branch_id`) REFERENCES `Branch` (`branch_id`),
  ADD CONSTRAINT `FK_orders_statusorder` FOREIGN KEY (`statusorder_id`) REFERENCES `statusorder` (`statusorder_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue` (`catalogue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `RolePermission`
--
ALTER TABLE `RolePermission`
  ADD CONSTRAINT `FK_RolePermission_Permission` FOREIGN KEY (`permission_id`) REFERENCES `Permission` (`permission_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RolePermission_Role` FOREIGN KEY (`role_id`) REFERENCES `Role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `UserRole`
--
ALTER TABLE `UserRole`
  ADD CONSTRAINT `FK_UserRole_Role` FOREIGN KEY (`role_id`) REFERENCES `Role` (`role_id`),
  ADD CONSTRAINT `FK_UserRole_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
