-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2015 at 12:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spa_procedures`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `types` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_procedure` int(11) NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `types`, `id_procedure`, `photo`) VALUES
(1, 'Класически масажи', 1, 'img27.png'),
(2, 'Терапии за тяло', 2, 'terT.jpg'),
(3, 'Хаммам', 3, 'hammam.jpg'),
(4, 'Фризьорски услуги', 4, 'friz.jpg'),
(5, 'Маникюр и педикюр', 5, 'manPed.jpg'),
(6, 'Козметик', 6, 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(255) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_team` int(255) NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `id_user`, `id_team`, `date_comment`) VALUES
(1, 'Страхотна си', 1, 1, '2015-06-11 20:42:41'),
(2, 'Супер сте', 2, 2, '2015-06-14 20:43:17'),
(3, 'Всичко беше страхотно', 3, 3, '2015-06-14 20:43:34'),
(4, 'Страхотни сте', 4, 4, '2015-06-14 20:43:52'),
(5, 'Уникално преживяване', 5, 5, '2015-06-14 20:44:08'),
(6, 'Суууууууууупер', 6, 6, '2015-06-14 20:44:26'),
(7, 'Прекрасно обслужване', 2, 2, '2015-06-14 21:00:00'),
(8, 'Много професионално отношение и обслужване', 4, 4, '2015-06-03 07:00:00'),
(10, 'asdf3e', 36, 6, '2015-06-25 21:00:00'),
(11, 'asdasdasd', 36, 3, '2015-06-25 21:08:54'),
(12, '4tgefd', 36, 2, '2015-06-25 21:16:10'),
(13, '4ti komentar', 36, 2, '2015-06-25 21:17:57'),
(14, '3t', 36, 6, '2015-06-25 21:22:12'),
(15, '4t', 36, 6, '2015-06-25 21:22:29'),
(16, 'dsfdfssdsfsfsd', 36, 10, '2015-06-29 11:10:10'),
(19, 'test comment', 36, 2, '2015-06-29 15:44:02'),
(20, 'mariqq\n', 36, 1, '2015-06-29 20:43:59'),
(21, ':*:*:*:*:', 1, 4, '2015-06-29 21:17:12'),
(22, 'fgdfgdgdfgdfgdfgd', 1, 8, '2015-06-29 21:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id` int(255) NOT NULL,
  `name_position` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_team` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name_position`, `id_team`) VALUES
(1, 'масажист', 1),
(2, 'маникюрист', 2),
(3, 'фризьор', 3),
(4, 'козметик', 4);

-- --------------------------------------------------------

--
-- Table structure for table `possibility`
--

CREATE TABLE IF NOT EXISTS `possibility` (
`id` int(11) NOT NULL,
  `id_procedures` int(11) NOT NULL,
  `id_team` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possibility`
--

INSERT INTO `possibility` (`id`, `id_procedures`, `id_team`) VALUES
(1, 1, 1),
(2, 1, 8),
(3, 1, 9),
(4, 1, 10),
(5, 4, 1),
(6, 4, 8),
(7, 4, 9),
(8, 4, 10),
(9, 6, 1),
(10, 6, 8),
(11, 2, 1),
(12, 2, 8),
(13, 2, 9),
(14, 2, 10),
(15, 3, 1),
(16, 3, 8),
(17, 3, 9),
(18, 3, 10),
(23, 5, 1),
(24, 5, 8),
(25, 5, 9),
(26, 5, 10),
(27, 7, 2),
(28, 7, 6),
(29, 8, 2),
(30, 8, 6),
(31, 8, 6),
(32, 9, 3),
(33, 9, 7),
(34, 10, 3),
(35, 10, 7),
(36, 11, 4),
(37, 11, 5),
(38, 12, 4),
(39, 12, 5),
(40, 13, 1),
(41, 13, 8),
(42, 13, 9),
(43, 13, 10),
(44, 14, 1),
(45, 14, 8),
(46, 14, 9),
(47, 14, 10),
(48, 16, 1),
(49, 16, 8),
(50, 16, 9),
(51, 16, 10),
(52, 17, 1),
(53, 17, 8),
(54, 17, 9),
(55, 17, 10),
(56, 18, 1),
(57, 18, 8),
(58, 18, 9),
(59, 18, 10),
(60, 19, 1),
(61, 19, 8),
(62, 19, 9),
(63, 19, 10),
(64, 22, 4),
(65, 22, 5),
(66, 23, 1),
(67, 23, 8),
(68, 23, 9),
(69, 23, 10),
(70, 24, 1),
(71, 24, 8),
(72, 24, 9),
(73, 24, 10),
(74, 25, 1),
(75, 25, 8),
(76, 25, 9),
(77, 25, 10),
(78, 26, 3),
(79, 26, 7),
(80, 27, 3),
(81, 27, 7),
(82, 28, 3),
(83, 28, 7),
(84, 31, 3),
(85, 31, 7),
(86, 32, 3),
(87, 32, 7),
(88, 33, 3),
(89, 33, 7),
(90, 34, 3),
(91, 34, 7),
(92, 35, 3),
(93, 35, 7),
(94, 36, 3),
(95, 36, 7),
(96, 37, 4),
(97, 37, 5),
(98, 38, 2),
(99, 38, 6),
(100, 39, 2),
(101, 39, 6),
(102, 40, 2),
(103, 40, 6),
(104, 41, 4),
(105, 41, 5),
(106, 42, 4),
(107, 42, 5),
(108, 44, 4),
(109, 44, 5),
(110, 45, 4),
(111, 45, 5),
(112, 47, 4),
(113, 47, 5),
(114, 48, 4),
(115, 48, 5),
(116, 49, 4),
(117, 49, 5),
(118, 6, 9),
(119, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE IF NOT EXISTS `procedures` (
`id` int(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_procedure` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `time_procedure` time NOT NULL,
  `photo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`id`, `id_category`, `name_procedure`, `description`, `price`, `time_procedure`, `photo`, `video`) VALUES
(1, 1, 'Класически масаж- цяло тяло', 'Класическият масаж е в основата на повечето масажи. Работи се върху цялото тяло (гръб, врат, глава, ръце, крака, корем и лице) за стимулиране на кръвообращението, отделяне на токсините и нормалното протичане на природните процеси в организма. Използват се много и различни техники, съобразени с моментното състояние и тонус на тялото. Класическият масаж може да бъде както релаксиращ, така и тонизиращ.', 30, '00:50:00', 'img14_.png', 'https://www.youtube.com/embed/gFE8UGMIht4'),
(2, 1, 'Частичен масаж', '\r\nЧастичния масаж е насочен към най-уязвимите части на нашето тяло-гръб, врат, кръст, ръце и глава .Всеки подложен на стреса на нашето ежедневие усеща болки и скованост именно в тези части. В 90% от случаите частичния масаж се прилага върху най- голямото рефлекторно поле в човешкото тяло – Гърба. Масажът на гръб се прилага, за да повиши общия тонус на организма и съдейства за отстраняване на определени функционални смущения. Гарантира релаксация на проблемните зони при: плексит, радикулит, дископатия и напрежение и болки в гърба. Процедурата е много ефикасна и спомага за „изхвърлянето” на натрупания стрес от нервните центрове по гръбнака, подпомага възстановяването на мускулите след преумора, релаксира цялото ви тяло, докосвайки и душата ви.', 15, '00:30:00', 'img18_.jpg', 'https://www.youtube.com/embed/gcMDwyMc8vo'),
(3, 2, 'Шоколадова терапия-Цяло тяло', 'Спа терапия със шоколад, която овлажнява, омекотява и подмладява кожата, придава й блясък и гладкост. Тази вкусна процедура повишава настроението и намалява раздразнителността и нивото на стреса, успокоява, създава вътрешното усещане за хармония и комфорт, дори помага за преодоляване на депресията.\r\nТерапията включва пилинг с шоколад, масаж, боди репинг с шоколад и билково масло, хидратация с крем шоколад. Терапията може да бъде изпълнена с ексфолиация или без ексфолиация.\r\n', 35, '00:55:00', 'img56_.jpg', 'https://www.youtube.com/embed/SFCMG7-iMZA'),
(4, 2, 'Арома терапия- Цяло тяло', 'Лечебната сила на растенията е позната на множество култури и цивилизации. Етеричните масла са се използвали още в древната източна медицина в Индия, Китай, Египет и др. Лечението с аромати или т.нар. ароматерапия, през последните години се развива все повече като един от най-ефикасните природосъобразни методи. Модерната наука потвърди антисептичното и бактерицидното им действие върху човека. Хората отговарят на усещането за мирис на емоционално ниво много по-активно, отколкото на всяко друго усещане. За разлика от нервите на другите сетива, обонятелните нерви, предаващи сигнала за даден аромат към мозъка, са директно свързани с онази  част от централната нервна система, която контролира ендокринната система, отделя хормони. Тези хормони оказват влияние върху растежа и несъзнателните жизнени функции като сърдечен ритъм, дишане, храносмилане, телесна температура и глад. Чрез аромамасаж могат да се постигнат отлични резултати в борбата за запазване и укрепване на физическото и психическо здраве на хората.\r\n \r\n', 35, '00:55:00', 'img7_.jpg', 'https://www.youtube.com/embed/wzapw4yr374'),
(5, 3, 'Традиционен хаммам', 'Кесе и масаж с пяна', 50, '00:55:00', 'hammam.jpg', 'https://www.youtube.com/embed/JJSJIe0yTwg'),
(6, 3, 'Хаммам с аромати', 'кесе + пилин от истинско кафе, кокосови стърготини, рози или просто аромати от мента, портокал, евкалипт + маска за тяло и масаж с пяна + измиване и нанасяне на лосион за тяло', 90, '00:55:00', 'img5_.jpg', 'https://www.youtube.com/embed/WhEoo9kzVu0'),
(7, 4, 'Мъжко подстригване', 'Измиване с шампоан, балсам, маска за коса + подстригване + кристали + сешоар + по избор гел или вакса', 10, '00:30:00', 'majkoPodstrigvane.jpg', 'https://www.youtube.com/embed/tAeDCiVTzsc'),
(8, 4, 'Измиване + сешоар', 'прав или къдрав', 25, '00:45:00', 'img51_.jpg', 'https://www.youtube.com/embed/mEEz3KzojeE'),
(9, 5, 'Маникюр', 'с декорации', 20, '00:55:00', 'img20_.jpg', 'https://www.youtube.com/embed/weJlc6MhuKc'),
(10, 5, 'Педикюр', 'Спа терапия', 25, '00:40:00', 'img3_.jpg', 'https://www.youtube.com/embed/jwHsNWg-X_M'),
(11, 6, 'Терапия против бръчки', 'почистване, пилинг, капки, масаж, крем', 60, '00:50:00', 'img32_.jpg', 'https://www.youtube.com/embed/lyRjp5U1MK8'),
(12, 6, 'Боядисване на мигли и вежди', 'традиционно с пинсета', 5, '00:30:00', 'img53_.jpg', 'https://www.youtube.com/embed/k3X9FYSu-mI'),
(13, 2, 'Юмейхо терапия', 'Иумейхо е мануална терапия, основана на японски и китайски методи за безмедикаментозно лечение. Тя се състои от три основни техники и над сто манипулации: притискащо-разтриващ масаж, акупресура, наместване на стави. Въздействия на иумейхо терапията: стимулира се функцията на вътрешните органи и се подобрява тяхното кръвоснабдяване, постига се пълно отпускане на мускулатурата чрез специални разтриващи техники след което се прилага наместваща терапия, стопяват се наднормените килограми, възстановяват се възпалените стави и се премахва болката, повишава имунитета и премахва умствената и физическа умора, постига се регенерация на клетките, в следствие на което се наблюдават следните видими органични промени: заздравяване, порозовяване и втвърдяване на ноктите, изглаждане на бръчките, подобряване еластичността на кожата, общо тонизиране.\r\nДо сега няма по-добра методика създадена от човека, която да действа така бързо и ефикасно за увеличаване и балансиране на жизнените сили на организма чрез завръщане към природата.\r\n', 45, '00:45:00', 'iumejho.jpg', 'https://www.youtube.com/embed/Qzwr6aLtbmE'),
(14, 2, 'Хидратираща терапия', 'Релаксиращото въздействие на масажа се подсилва и от използването също на троен хидратиращ концентрат, който включва няколко продукта:\r\n– масло, което подхранва и релаксира кожата благодарение на маслото от соя, осигурява усещане за благоденствие чрез етеричните масла от лавандула, бергамот и върбина и действа срещу свободните радикали;\r\n– мляко за тяло с хидратиращи, омекотяващи и възстановяващи екстракти от жен-шен и зарасличе и успокояващ и подхранващ ефект, дължащ се на маслото от сладък бадем;\r\n– уникален стягащ серум за тяло и бюст от градински чай, розмарин, коприва, подбел, хмел, както и хвощ, богат на реструктуриращ кожата силиций. Хидратира и видимо стяга кожата, предотвратява образуването на стрии и има ободряващ и енергизиращ ефект.\r\n', 40, '00:50:00', 'hidratirashtM.jpg', 'https://www.youtube.com/embed/y6unBqSwPgI'),
(16, 2, 'Рефлексотерапия на стъпала', 'Масаж на рефлексогенните зони на стъпалата с профилактично и общоукрепващо действие\r\nНай – ефективният от терапевтична гледна точка масаж на ходилата. Там са разположени рефлекторни точки, който кореспондират с всеки орган и жлеза в тялото. Чрез стъпалата се повлиява автономната нервна система, лимфната циркулация и енергийните канали, което стимулира имунната система на човешкото тяло.\r\n', 25, '00:30:00', 'img42_.jpg', 'https://www.youtube.com/embed/_Tm8o9ZPgCk'),
(17, 1, 'Антицелулитен масаж', 'Служи за премахване на подкожния слой мазнини, натрупани под формата на портокалови целулитни образувания. Методът има подчертан козметичен ефект. Извършва се с помощта на специални техники и етерични масла. С негова помощ се осигурява кръвоснабдяването на тъканите. Новодошлата кръв подпомага изгарянето на мазнините, носи свежи хранителни съставки, а от друга страна осигурява разнасяне на лимфните задържания.\r\nОт голямо значение е честотата на процедурите. Те трябва да се правят всеки ден или през ден. Най-добрият вариант за постигане на успех е, когато масажът се комбинира с някои от другите съвременни методи за третиране на целулита. Това са т.нар. апаратни техники. Освен, че предизвикват разграждане на мастните клетки, те допринасят за доброто моделиране на силуета. По принцип масажът подсилва действието на всеки един от другите методи и когато е в комбинация с тях, резултатът е повече от добър.\r\n*Антицелулитният масаж може да бъде изпълнен с мед.\r\n', 30, '00:40:00', 'anticeluliten.jpg', 'https://www.youtube.com/embed/rw55jR1l2V0'),
(18, 2, 'Лимфен дренаж', 'Масаж за елеминиране на токсините\r\nИзползват се техники за активизиране на лимфния поток и на защитните сили на организма, както и укрепване на имунната система. Този масаж е препоръчителен и при оттичане на крайниците за предотвратяване на застойните лимфни процеси.\r\n', 20, '00:30:00', 'img17_.jpg', 'https://www.youtube.com/embed/NQIfjVy-6iE'),
(19, 2, 'Моделираща терапия', 'Вашата процедура започва с детоксикиращ пилинг със соли от червено грозде. Изпълнява се специална техника за лимфен дренаж, използвайки бленд от извайващи и детоксикиращи етерични масла. Преживявате върховно морско удоволствие докато сте обгърнати от нашата извайваща маска от морски водорасли, богата на минерали, микроелементи и алгинова киселина. Оставете Вашия дух да лети и релаксира, докато получавате отпускащ точков масаж на скалпа. Процедурата Ви завършва с нанасяне на извайващ и стягащ крем за тяло. Напрежението е отлетяло надалеч, токсините са елиминирани и тялото Ви е изпълнено с нова енергия!', 55, '00:50:00', 'modelirashtaT.jpg', 'https://www.youtube.com/embed/AzcOh3eRh-A'),
(22, 6, 'Безиглена мезотерапия – Дермопорация', 'Дермопорацията е разновидност на мезотерапията и се състои във вкарването на специфичните активни вещества в най-дълбоките слоеве на кожата чрез действието на нискочестотен ток, т.е. неинвазивна мезотерапия.\r\nПриложения:\r\n•	Целулит\r\n•	Локални мастни натрупвания \r\n•	Стрии\r\n•	Белези\r\n•	Отпусната кожа на лицето и тялото\r\n•	Хиперпигментация\r\n•	Акне\r\n•	Стареене на кожата (бръчки)\r\n•	Антиоксидантни терапии\r\n', 50, '00:40:00', 'dermop.jpg', 'https://www.youtube.com/embed/_Ha3n7N7JC4'),
(23, 1, 'Султан масаж на четири ръце', 'Изживейте едно впечетляващо усещане. От древни времена този вид масаж е бил достъпен само за най–великите владетели. Невероятната техника на работещите едновременно терапевти ще Ви откъсне от настоящето и ще Ви помогне да се почувствате великолепно.', 80, '00:55:00', '4ryce.jpg', 'https://www.youtube.com/embed/nO4lX3Vu5JU'),
(24, 2, 'Hot – stone масаж ', 'Терапията с вулканични камъни е базирана върху връзката на човека с природата. Геотермалната терапия въздейства естествено върху всяко човешко сетиво и поддържа Вашия енергиен баланс. Първоначалният контакт със затоплените камъни предизвиква изключително приятни усещания за комфорт и спокойствие. Хармонизиране на чакрите, с помощта на маслата за хромотерапия, приложението на цветове по време на самата терапия, музиката и арома-терапевтичните масла превръщат Hot Stone терапията в истинска наслада за сетивата. Hot Stone терапията се препоръчва при хора подложени на стрес, умствена и физическа умора, безсъние, напрежение, мускулни и ставни болки, както и циркулаторни нарушения.', 60, '00:45:00', 'img55_.jpg', 'https://www.youtube.com/embed/fcInMEl_idU'),
(25, 2, 'Тайландски масаж', ' Класическите масажи от Тайланд използват умело йога пози, масажиране в дълбочина, разтягане и работа върху енергийните линии, за да облекчат напрежението в мускулите и да позволят на жизнената сила и енергия да циркулират свободно в тялото.\r\nКогато те са блокирани, се появяват физически и емоционални проблеми. Затова и основната цел на традиционни тайландски масаж е да отблокира всички пътища в тялото и да помогне на масажирания да постигне вътрешна хармония – събиране на тялото, ума и духа в едно.\r\nНякои от тях се прилагат без да се ползват никакви етерични масла и след като масажираният се облече в подходящи за целта широки, светли и удобни дрехи.\r\nНезависимо на какъв тайландски масаж се спрете важно е да знаете, че той е бавен, нежен, неинвазивен, подходящ дори за най-крехката личност и никога не е болезнен.', 70, '00:55:00', 'img13_.jpg', 'https://www.youtube.com/embed/9e9WZzTbm10'),
(26, 4, 'Женско подстригване', 'Измиване с шампоан, балсам, маска за коса + подстригване + кристали + сешоар + по избор обем с преса или топиране ', 20, '00:40:00', 'damsko_podstrigvane_lit.jpg', 'https://www.youtube.com/embed/b30KlFxciLo'),
(27, 4, 'Протеинова терапия за коса', 'В състава на нашата коса има 87% протеин. В следствие на химически обработки (боядисване, къдрене) и външни влияния косъмът губи своите блясък и жизненост. Протеиновата терапия ще възвърне силата на вашата коса. Тя е дълбоко подхранваща и хидратираща. За по-доброто проникване на възстановяващите продукти в косъма се използва ултразвукова, инфраред преса без нагряване.\r\n\r\nТерапията включва:\r\n\r\nМасажно измиване с протеинов шампоан;\r\nНанасяне на протеиновата маска с ултразвукова преса (без нагряване), ултразвука и инфраред лъчите на пресата улесняват проникването на молекулите протеин в косъма, възстановяват еластичността му и затварят кутикулата му.\r\nИзплакване без шампоан', 25, '00:50:00', 'protein_lit.jpg', 'https://www.youtube.com/embed/r2J5IYaOrhw'),
(28, 4, 'Лечебна терапия против косопад', 'Балансира състоянието на косата, благодарение на наносверите с витамини,стимулира метаболизма на корена с действието на енергизиращия комплекс. Съдържа плодови киселини за нежен пилинг на скалпа,освобождава фоликулите на косата от мъртви клетки, позволявайки им да дишат.', 25, '00:50:00', 'mat_ther_lit.jpg', 'https://www.youtube.com/embed/CZMK2IoXE2w'),
(31, 4, 'КЕРАТИНОВА ТЕРАПИЯ', 'РЕВОЛЮЦИННА РЕКОНСТРУКТИРАЩА КЕРАТИНОВА ТЕРАПИЯ ЗА СТРУКТУРНО ВЪЗСТАНОВЯВАНЕ НА ХИМИЧЕСКИ ИЛИ ФИЗИЧЕСКИ УВРЕДЕНА КОСА!\r\n\r\nКератиновата терапия професионално възстановява и реконструира влакната на косата, революционна система, която използва принципите на ензимна хидролиза. Богатата формула съдържа кератин и морски колаген с ниско молекулно тегло, защитните и овлажняващи свойства позволяват реконструкция на кората (вътрешната част на фибрите) на косъма и епидермиса (за външната част на фибрите). В края на процеса на възстановяване, кората на фибрите и епидермиса се подсилва, косата възвръща естествената си здравина, мекота и блясък.\r\n\r\nКЕРАТИНОВА ТЕРАПИЯ ЗА КОСА „RECONSTRUCT„ В ТРИ ФАЗИ:\r\n\r\nФАЗА 1 – Кератин RRECONSTRUCTOR – подготвя увредената коса за възстановяване, прониква за времето на престоя през фибрите на косата и поправя повредения дял от кутикулата на косъма.\r\nФАЗА 2 - Възстановяващо олио RINFON – хидратира обилно косата, премахва електростатичния ефект и помага за разресването на косата.\r\nФАЗА 3 - Окисляваща маска ACIDIFI – придава блясък, отстранява натрупаните химически отлагания по косъма, придава сила и плътност на косата.', 25, '00:55:00', 'kherat_ther_lit.jpg', 'https://www.youtube.com/embed/9gFU_2yUxSY'),
(32, 4, 'БОЯДИСВАНЕ', 'Потопи се в магията на цветовете на Alfaparf Milano в Център за красота Милано!\r\n\r\nБоята за коса Evolution на Alfaparf Milano e истинска революция!\r\n\r\nАбсолютна иновация: Първата боя с хиалуронова киселина и 3D Технология, гарантираща перфектен резултат.\r\n\r\nХиалуроновата киселина е естествена съставка на тялото, която е ключова за поддържане точното ниво на хидратация на тъканите. Прониквайки, чрез боята тя създава един вид обвивка на косъма, гарантирайки перфектно разпределение и максимално равномерно покритие. Спомага също за поддържане точното ниво на хидратация на фибрите на косъма.\r\n\r\nEvolution ви гарантира перфектна коса и цвят с 3D ефект. Изключителен блясък! Мекота и лесно разресване! Сила и еластичност на косата! Дълготраен цвят!', 40, '00:55:00', '565.jpg', 'https://www.youtube.com/embed/CF_eL5vNurE'),
(33, 4, 'Удължаване на косата с естествен косъм', 'Прикачване на косата към кичури коса чрез специално лепило', 700, '00:50:00', 'udaljavane.jpg', 'https://www.youtube.com/embed/BU6IbqDi92k'),
(34, 4, 'Плитка', 'Сплитане на косата  в най - различни форми и брой плитки.\r\n* Както видовете оформяне така и цената е различна', 10, '00:00:00', 'plitka.jpg', 'https://www.youtube.com/embed/EGbUXBi7DHk'),
(35, 4, 'Официални прически', '', 60, '00:00:00', '3.jpeg', 'https://www.youtube.com/embed/IASbpK4d4to'),
(36, 4, 'Кок', '', 20, '00:30:00', 'kok.jpg', 'https://www.youtube.com/embed/RK0pZxcQn60'),
(37, 6, 'Грим', '', 30, '00:50:00', 'grim.jpg', 'https://www.youtube.com/embed/d6dEh-1LR2A'),
(38, 5, 'Ноктопластика', '', 40, '00:55:00', 'noktoplastika.jpg', 'https://www.youtube.com/embed/_tWOUnS9sdI'),
(39, 5, 'Ноктопластика с удължители', '', 30, '00:35:00', 'udaljiteli.jpg', 'https://www.youtube.com/embed/GZ8H5dJQqB0'),
(40, 5, 'Сваляне и поддръжка на ноктопластика', '', 15, '00:20:00', 'svalqne_noktoplastika.jpg', 'https://www.youtube.com/embed/gL39ixDtuPY'),
(41, 6, 'Почистване на лице с изтискване', '', 25, '00:55:00', 'iztiskwane.jpg', 'https://www.youtube.com/embed/n8X3iFZZRq8'),
(42, 6, 'Почистване на лице без изтискване', '', 20, '00:30:00', 'pochistvane.jpg', 'https://www.youtube.com/embed/3dtqZfWTDxM'),
(44, 6, 'Оформяне на вежди с конец', '', 8, '00:20:00', 'konec.jpg', 'https://www.youtube.com/embed/Su7wv7QYbw4'),
(45, 6, 'Уголемяване на устни с хиалуронова киселина', '', 150, '00:45:00', 'ugolemqvaneUstni.jpg', 'https://www.youtube.com/embed/pK8p1JxMvMg'),
(47, 6, 'Терапия Вечна младост + Ботокс', 'Подобрявайки еластичността тази луксозна маска насища кожата Ви с кислород, чист екстракт от Хайвер, Екстракт от Перла и революционна комбинация от фито екстракти и Escutox. Видимо я подмладява и изглажда фините линии и бръчки по лицето. \r\n\r\nЛуксозна и изключително ефективна терапия. Резултатите са видими веднага след процедурата. ', 600, '00:55:00', 'mladost.jpg', 'https://www.youtube.com/embed/GF5Ol_CHVFE'),
(48, 6, 'Лазерна епилация', 'Цените варират спрямо зоната от 20 до 200 лв', 100, '00:00:00', 'img45_.jpg', 'https://www.youtube.com/embed/FABVlce_iJQ'),
(49, 6, 'Кола маска', 'Цените варират спрямо зоната от 10 до 100 лв', 50, '00:40:00', 'kola-maska.jpg', 'https://www.youtube.com/embed/vQN5sWBPJnc');

-- --------------------------------------------------------

--
-- Table structure for table `rezervation`
--

CREATE TABLE IF NOT EXISTS `rezervation` (
`id` int(255) NOT NULL,
  `id_procedure` int(255) NOT NULL,
  `id_team` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervation`
--

INSERT INTO `rezervation` (`id`, `id_procedure`, `id_team`, `id_user`, `date`, `time`) VALUES
(1, 1, 1, 1, '2015-06-23', '09:00:00'),
(2, 2, 10, 2, '2015-06-23', '10:00:00'),
(3, 8, 6, 2, '2015-06-23', '10:00:00'),
(4, 11, 5, 3, '2015-06-23', '15:00:00'),
(10, 6, 7, 4, '2015-06-30', '11:00:00'),
(14, 1, 1, 4, '2015-06-27', '15:00:00'),
(15, 12, 4, 1, '2015-06-26', '12:00:00'),
(40, 1, 1, 36, '2015-06-29', '11:00:00'),
(41, 8, 6, 36, '2015-06-30', '14:00:00'),
(42, 1, 1, 37, '2015-07-03', '09:00:00'),
(44, 1, 1, 36, '2015-06-30', '10:00:00'),
(45, 1, 1, 1, '2015-06-30', '11:00:00'),
(46, 4, 1, 1, '2015-06-30', '12:00:00'),
(47, 37, 0, 1, '2015-07-01', '14:00:00'),
(48, 26, 0, 1, '2015-07-02', '18:00:00'),
(49, 45, 1, 1, '2015-07-04', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
`id` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_procedure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`id` int(255) NOT NULL,
  `name_t` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_position` int(255) NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(5) NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name_t`, `phone`, `e_mail`, `facebook`, `id_position`, `photo`, `rating`, `sex`) VALUES
(1, 'Мария', '0883555555', 'mariq@abv.bg', 'Мария Иванова', 1, 'team1.png', 0, 'female'),
(2, 'Дидо', '0888888888', 'dido@gmail.com', 'Дидо Даниелов', 2, 'team2.jpg', 0, 'male'),
(3, 'Жулиета', '0899999999', 'juli@abv.bg', 'Жулиета Николова', 3, 'team3.jpg', 0, 'female'),
(4, 'Ивета', '0877777777', 'iveta@abv.bg', 'Ивета Илчева', 4, 'team4.jpg', 0, 'female'),
(5, 'Георги', '0898777777', 'gosho@abv.bg', 'Георги Иванов', 4, 'team5.jpg', 0, 'male'),
(6, 'Жани', '0877666666', 'jani@abv.bg', 'Жани Николова', 2, 'team6.jpg', 0, 'female'),
(7, 'Жужу', '0766666666', 'juju@abv.bg', 'Жужу Тихомиров', 3, 'team7.jpg', 5, 'male'),
(8, 'Марин', '0755555555', 'marin@abv.bg', 'Марин Маринов', 1, 'team8.png', 4, 'male'),
(9, 'Сиси', '0787888888', 'sisi@abv.bg', 'Сиси Симеонова', 1, 'team9.jpg', 3, 'female'),
(10, 'Нели', '0879666666', 'neli@abv.bg', 'Нели Николова', 1, 'team10.jpg', 5, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(255) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `birthday`, `photo`, `phone`, `facebook`) VALUES
(1, 'madlen.iordanova@abv.bg', '9661d26c0f7379387e98245bab555f80f958b9d2e9aaf7403f6c9f4d1e04b0b427770bd2bd4fb9cdba962ec450e3c84bded174bad4fe0a9d7427448fa4f2f53d', 'Мадлен', 'Йорданова', '1992-12-29', 'me.png', '0883533575', 'madi'),
(2, 'geshaaa91@gmail.com', '1234', 'Георги', 'Иванов', '1991-04-30', 'me.png', '', NULL),
(4, 'test@abv.bg', 'test', 'Мади', 'yordanova', '0000-00-00', 'me.png', '', NULL),
(5, 'didi@abv.bg', '9661d26c0f7379387e98245bab555f80f958b9d2e9aaf7403f6c9f4d1e04b0b427770bd2bd4fb9cdba962ec450e3c84bded174bad4fe0a9d7427448fa4f2f53d', 'Dido', 'Grigorov', '1970-06-01', 'me.png', '', NULL),
(6, 'misho@abv.bg', '1234', 'Misho', 'Mihailov', '1990-03-03', 'me.png', '', NULL),
(36, 'gesh@abv.bg', '9661d26c0f7379387e98245bab555f80f958b9d2e9aaf7403f6c9f4d1e04b0b427770bd2bd4fb9cdba962ec450e3c84bded174bad4fe0a9d7427448fa4f2f53d', 'gesh', 'gesh', '2015-06-27', 'me.png', '3324234', NULL),
(37, 'testt@abv.bg', 'ebf07e18ca898ca9ae84993a353e7713107c35c8a10d8431f4a63ba017e48987093c704c92152f75bbe6830fb8e5c6bdd24e337f4ad65d5d7ed08d3e09639efa', 'saasass', 'asasas', '2015-06-02', 'me.png', '', NULL),
(38, 'ivan@ivan.bg', '9661d26c0f7379387e98245bab555f80f958b9d2e9aaf7403f6c9f4d1e04b0b427770bd2bd4fb9cdba962ec450e3c84bded174bad4fe0a9d7427448fa4f2f53d', 'gesh test', 'ivanov', '2015-06-30', 'me.png', '', NULL),
(40, 'phoneface@abv.bg', '9661d26c0f7379387e98245bab555f80f958b9d2e9aaf7403f6c9f4d1e04b0b427770bd2bd4fb9cdba962ec450e3c84bded174bad4fe0a9d7427448fa4f2f53d', 'test', 'test', '2015-06-26', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_2` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `possibility`
--
ALTER TABLE `possibility`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`);

--
-- Indexes for table `rezervation`
--
ALTER TABLE `rezervation`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_2` (`id`), ADD UNIQUE KEY `name_t` (`name_t`), ADD UNIQUE KEY `phone` (`phone`), ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `possibility`
--
ALTER TABLE `possibility`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `rezervation`
--
ALTER TABLE `rezervation`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
