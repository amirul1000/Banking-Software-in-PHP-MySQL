-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 06:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', NULL, NULL, NULL, 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D\'Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People\'s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(10) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `code`, `name`, `symbol`) VALUES
(1, 'ALL', 'Leke', 'Lek'),
(2, 'USD', 'Dollars', '$'),
(3, 'AFN', 'Afghanis', '?'),
(4, 'ARS', 'Pesos', '$'),
(5, 'AWG', 'Guilders', 'ƒ'),
(6, 'AUD', 'Dollars', '$'),
(7, 'AZN', 'New Manats', '???'),
(8, 'BSD', 'Dollars', '$'),
(9, 'BBD', 'Dollars', '$'),
(10, 'BYR', 'Rubles', 'p.'),
(11, 'EUR', 'Euro', '€'),
(12, 'BZD', 'Dollars', 'BZ$'),
(13, 'BMD', 'Dollars', '$'),
(14, 'BOB', 'Bolivianos', '$b'),
(15, 'BAM', 'Convertible Marka', 'KM'),
(16, 'BWP', 'Pula', 'P'),
(17, 'BGN', 'Leva', '??'),
(18, 'BRL', 'Reais', 'R$'),
(19, 'GBP', 'Pounds', '£'),
(20, 'BND', 'Dollars', '$'),
(21, 'KHR', 'Riels', '?'),
(22, 'CAD', 'Dollars', '$'),
(23, 'KYD', 'Dollars', '$'),
(24, 'CLP', 'Pesos', '$'),
(25, 'CNY', 'Yuan Renminbi', '¥'),
(26, 'COP', 'Pesos', '$'),
(27, 'CRC', 'Colón', '?'),
(28, 'HRK', 'Kuna', 'kn'),
(29, 'CUP', 'Pesos', '?'),
(30, 'CZK', 'Koruny', 'K?'),
(31, 'DKK', 'Kroner', 'kr'),
(32, 'DOP ', 'Pesos', 'RD$'),
(33, 'XCD', 'Dollars', '$'),
(34, 'EGP', 'Pounds', '£'),
(35, 'SVC', 'Colones', '$'),
(36, 'FKP', 'Pounds', '£'),
(37, 'FJD', 'Dollars', '$'),
(38, 'GHC', 'Cedis', '¢'),
(39, 'GIP', 'Pounds', '£'),
(40, 'GTQ', 'Quetzales', 'Q'),
(41, 'GGP', 'Pounds', '£'),
(42, 'GYD', 'Dollars', '$'),
(43, 'HNL', 'Lempiras', 'L'),
(44, 'HKD', 'Dollars', '$'),
(45, 'HUF', 'Forint', 'Ft'),
(46, 'ISK', 'Kronur', 'kr'),
(47, 'INR', 'Rupees', 'Rp'),
(48, 'IDR', 'Rupiahs', 'Rp'),
(49, 'IRR', 'Rials', '?'),
(50, 'IMP', 'Pounds', '£'),
(51, 'ILS', 'New Shekels', '?'),
(52, 'JMD', 'Dollars', 'J$'),
(53, 'JPY', 'Yen', '¥'),
(54, 'JEP', 'Pounds', '£'),
(55, 'KZT', 'Tenge', '??'),
(56, 'KPW', 'Won', '?'),
(57, 'KRW', 'Won', '?'),
(58, 'KGS', 'Soms', '??'),
(59, 'LAK', 'Kips', '?'),
(60, 'LVL', 'Lati', 'Ls'),
(61, 'LBP', 'Pounds', '£'),
(62, 'LRD', 'Dollars', '$'),
(63, 'CHF', 'Switzerland Francs', 'CHF'),
(64, 'LTL', 'Litai', 'Lt'),
(65, 'MKD', 'Denars', '???'),
(66, 'MYR', 'Ringgits', 'RM'),
(67, 'MUR', 'Rupees', '?'),
(68, 'MXN', 'Pesos', '$'),
(69, 'MNT', 'Tugriks', '?'),
(70, 'MZN', 'Meticais', 'MT'),
(71, 'NAD', 'Dollars', '$'),
(72, 'NPR', 'Rupees', '?'),
(73, 'ANG', 'Guilders', 'ƒ'),
(74, 'NZD', 'Dollars', '$'),
(75, 'NIO', 'Cordobas', 'C$'),
(76, 'NGN', 'Nairas', '?'),
(77, 'NOK', 'Krone', 'kr'),
(78, 'OMR', 'Rials', '?'),
(79, 'PKR', 'Rupees', '?'),
(80, 'PAB', 'Balboa', 'B/.'),
(81, 'PYG', 'Guarani', 'Gs'),
(82, 'PEN', 'Nuevos Soles', 'S/.'),
(83, 'PHP', 'Pesos', 'Php'),
(84, 'PLN', 'Zlotych', 'z?'),
(85, 'QAR', 'Rials', '?'),
(86, 'RON', 'New Lei', 'lei'),
(87, 'RUB', 'Rubles', '???'),
(88, 'SHP', 'Pounds', '£'),
(89, 'SAR', 'Riyals', '?'),
(90, 'RSD', 'Dinars', '???.'),
(91, 'SCR', 'Rupees', '?'),
(92, 'SGD', 'Dollars', '$'),
(93, 'SBD', 'Dollars', '$'),
(94, 'SOS', 'Shillings', 'S'),
(95, 'ZAR', 'Rand', 'R'),
(96, 'LKR', 'Rupees', '?'),
(97, 'SEK', 'Kronor', 'kr'),
(98, 'SRD', 'Dollars', '$'),
(99, 'SYP', 'Pounds', '£'),
(100, 'TWD', 'New Dollars', 'NT$'),
(101, 'THB', 'Baht', '?'),
(102, 'TTD', 'Dollars', 'TT$'),
(103, 'TRY', 'Lira', 'TL'),
(104, 'TRL', 'Liras', '£'),
(105, 'TVD', 'Dollars', '$'),
(106, 'UAH', 'Hryvnia', '?'),
(107, 'UYU', 'Pesos', '$U'),
(108, 'UZS', 'Sums', '??'),
(109, 'VEF', 'Bolivares Fuertes', 'Bs'),
(110, 'VND', 'Dong', '?'),
(111, 'YER', 'Rials', '?'),
(112, 'ZWD', 'Zimbabwe Dollars', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `ACC_No` varchar(64) DEFAULT NULL,
  `first_name` varchar(127) DEFAULT NULL,
  `last_name` varchar(127) DEFAULT NULL,
  `email` varchar(127) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `ACC_No`, `first_name`, `last_name`, `email`, `phone`, `file_picture`, `dob`, `address`, `created_at`, `updated_at`) VALUES
(1, '454545', 'John', 'Smith', 'jon@gmail.com', '355454545', 'uploads/images/customer/20210701201757.png', '2021-09-23', 'C-20,JAkir Hossain Road,Block-E\r\nMd-pur', '2021-09-02 17:53:16', '2021-09-02 17:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `debit` double(10,2) DEFAULT 0.00,
  `credit` double(10,2) DEFAULT 0.00,
  `reference` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `subject`, `description`, `currency_id`, `debit`, `credit`, `reference`, `created_at`, `updated_at`) VALUES
(1, 1, '557776', '77676', 2, 0.00, 100.00, '', '2021-09-02 17:56:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('super','staff','client','visitor') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `file_picture`, `phone_no`, `dob`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 'xx@xx.com', 'xx', 'Mr.', 'John', 'Smith', NULL, NULL, NULL, '', '', '', '', '', '231', '2011-10-19 00:00:00', '2011-10-19 00:00:00', 'super', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
