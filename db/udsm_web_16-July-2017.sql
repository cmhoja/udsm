-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2017 at 12:07 AM
-- Server version: 5.5.54
-- PHP Version: 5.4.45-4+deprecated+dontuse+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `udsm_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_administrative_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_academic_administrative_unit` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UnitNameEn` varchar(255) NOT NULL,
  `UnitNameSw` varchar(255) DEFAULT NULL,
  `UnitType` int(2) NOT NULL DEFAULT '0' COMMENT '0=Administrative,1=College,2=School,3=Institute,4=Centres',
  `ParentUnitId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id of Parent Unit if Any',
  `TypeContentManagement` int(1) NOT NULL DEFAULT '1' COMMENT '1=CentrallyManaged(Within UDSM CMS), 2= External Website(Separate Website)',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='keeps a list of academin and adminitrative units' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_academic_administrative_unit`
--

INSERT INTO `tbl_academic_administrative_unit` (`Id`, `UnitNameEn`, `UnitNameSw`, `UnitType`, `ParentUnitId`, `TypeContentManagement`) VALUES
(1, 'UDSM Computing Center', 'Kitengo cha TEHAMA cha UDSM', 4, 0, 2),
(2, 'Directorate of Administration', 'Kurugenzi ya Utawala', 0, 0, 1),
(3, 'Directorate of Undergraduate Studies', 'Kurugenzi ya  Mafunzo ya shahada ya kwanza', 0, 0, 1),
(4, 'College of Information and Communication Technology', 'Chuo cha Technolojia ya Habari na Mawasiliano', 1, 0, 1),
(5, 'College of Engineering', 'Chuo cha Uhandisi', 1, 0, 1),
(6, 'Directorate of Internationalization', 'Kurugenzi ya Umataifishaji', 0, 0, 1),
(7, 'UDSM School of Business Studies', 'Shule ya Biashara ya UDSM', 2, 0, 1),
(8, 'Department of Computer Science', 'Idara ya Sayansi ya Kompyuta', 5, 4, 1),
(9, 'Department of Civil & Construction Engineering ', 'Idara ya Uhandisi wa Ujenzi na Majengo', 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE IF NOT EXISTS `tbl_announcement` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UnitID` int(11) DEFAULT NULL,
  `TitleEn` varchar(255) NOT NULL,
  `TitleSw` varchar(255) NOT NULL,
  `DetailsEn` text NOT NULL,
  `DetailsSw` text NOT NULL,
  `Attachment` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `LinkUrl` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`Id`, `UnitID`, `TitleEn`, `TitleSw`, `DetailsEn`, `DetailsSw`, `Attachment`, `DateCreated`, `DatePosted`, `Status`, `LinkUrl`) VALUES
(1, 5, 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj  kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj  kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', '', '2017-06-15 19:22:57', '2017-06-17 16:44:11', 1, 'kjhgfdghkl;hgfhklkjhcvnbvb-nghjolkbn-gyyfgkln-iydityg-uytu-jhghjlln-gyh-vfughm-bvgyn-gfhj'),
(2, NULL, 'employment opportunity', 'employment opportunity', 'Delivery of clean air strategies for mitigating household air pollution and associated respiratory illnesses in urban informal settlements in Dar es Salaam (Tanzania) and Lilongwe (Malawi) cities. ', 'Delivery of clean air strategies for mitigating household air pollution and associated respiratory illnesses in urban informal settlements in Dar es Salaam (Tanzania) and Lilongwe (Malawi) cities. ', '', '2017-06-15 19:41:31', '2017-06-18 14:34:43', 1, 'employment-opportunity'),
(3, NULL, 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', '', '2017-07-13 22:33:56', '2017-07-13 22:33:56', 1, 'second-season-china---tanzania-job-fair-opening-ceremony-held-at-udsm-on-17th-june-2017.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basic_page`
--

CREATE TABLE IF NOT EXISTS `tbl_basic_page` (
  `PageId` int(11) NOT NULL AUTO_INCREMENT,
  `PageTitleEn` varchar(200) NOT NULL,
  `PageTitleSw` varchar(200) NOT NULL,
  `DescriptionEn` text NOT NULL,
  `DescriptionSw` text NOT NULL,
  `Attachment` varchar(200) DEFAULT NULL,
  `EmbededVideo` varchar(255) DEFAULT NULL,
  `PageSeoUrl` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PageId`),
  UNIQUE KEY `PageSeoUrl` (`PageSeoUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_basic_page`
--

INSERT INTO `tbl_basic_page` (`PageId`, `PageTitleEn`, `PageTitleSw`, `DescriptionEn`, `DescriptionSw`, `Attachment`, `EmbededVideo`, `PageSeoUrl`, `DateCreated`, `Status`, `UnitID`) VALUES
(2, 'asdas ds asd asd as', 'as dasd asasdsa  a d', 'as dsa dasdsa ds', 'as asdsadsad', '', '', 'asdas-ds-asd-asd-as', '2017-06-20 22:34:05', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ContactTitle` varchar(25) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `FaxNo` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL,
  `PoBox` varchar(100) DEFAULT NULL,
  `StreetRegion` varchar(255) DEFAULT NULL,
  `GoogleMapCode` text,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_contacts_tbl_academic_administrative_unit1_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Stores all the contact information for all areas of the site' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`Id`, `ContactTitle`, `PhoneNo`, `FaxNo`, `EmailAddress`, `PoBox`, `StreetRegion`, `GoogleMapCode`, `UnitID`, `Status`) VALUES
(1, 'Test contacts', '0787787655,989099999', '', 'dvc@udsm.ac.tz, pmu@udsm.co.tz', NULL, NULL, '', 2, 1),
(2, 'sdsfsdf', '342423423423, 32434 234324324,234324', '2424,2342342,234234', 'test@gmail.com', NULL, NULL, '', 2, 1),
(3, 'UNIVERSITY OF DAR ES SALA', '+255-22-2410509, +255-22-2410628', '+255-22-2410023', '', 'P.O. Box 35091, DAR ES SALAAM', 'Kinondoni', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d126781.22498906385!2d39.13527340594265!3d-6.780408180988582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1497991630357" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_blocks`
--

CREATE TABLE IF NOT EXISTS `tbl_custom_blocks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BlockUnitID` int(11) DEFAULT NULL COMMENT 'The Unit/College etc where the Block belong',
  `BlockType` int(2) NOT NULL COMMENT '1=Main/Home Page Block, 2= Custom Page Block',
  `BlockName` varchar(255) NOT NULL,
  `BlockTitleEn` varchar(255) DEFAULT NULL,
  `BlockTitleSw` varchar(255) DEFAULT NULL,
  `BlockDetailsEn` text NOT NULL,
  `BlockDetailsSw` text NOT NULL,
  `BlockIconPicture` varchar(255) DEFAULT NULL,
  `BlockIconCSSClass` varchar(100) DEFAULT NULL,
  `BlockIconVideo` varchar(255) DEFAULT NULL,
  `LinkToPage` varchar(255) DEFAULT NULL,
  `BlockPlacementAreaRegion` int(11) NOT NULL COMMENT 'A place of the Page where the Block will be shown',
  `ShowOnPage` varchar(255) DEFAULT NULL COMMENT 'List of Pages Where this block will be shown at a specified region',
  `Status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_custom_blocks`
--

INSERT INTO `tbl_custom_blocks` (`Id`, `BlockUnitID`, `BlockType`, `BlockName`, `BlockTitleEn`, `BlockTitleSw`, `BlockDetailsEn`, `BlockDetailsSw`, `BlockIconPicture`, `BlockIconCSSClass`, `BlockIconVideo`, `LinkToPage`, `BlockPlacementAreaRegion`, `ShowOnPage`, `Status`) VALUES
(2, NULL, 1, 'ABOUT US BLOCK', 'ABOUT US', 'KUHUSU SIS', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre.\r\nIt was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges. ', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre.\r\nIt was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges. ', '', NULL, '', 'background', 18, NULL, 1),
(3, NULL, 1, 'CONTACT US BLOCK', 'CONTACT US', 'WASILIANA NASI', 'Postal Address <br/>\r\nPO Box 35091 <br/>\r\nDar Es Salaam,<br/> Tanzania\r\nCall Us: +255-22-2410509 or <br/>\r\n+255-22-2410628<br/>', 'Postal Address <br/>\r\nPO Box 35091 <br/>\r\nDar Es Salaam,<br/> Tanzania<br/>\r\nCall Us: +255-22-2410509 or <br/>\r\n+255-22-2410628', '', NULL, '', NULL, 21, '0', 1),
(4, NULL, 1, 'Home Page Welcome Note Block', 'Welcome Note', 'Karibu UDSM', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.', '', NULL, '', NULL, 9, '', 0),
(5, NULL, 1, 'Welcome Note', 'Welcome Note', 'Ukaribisho', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.\r\n \r\nThe University has taken all reasonable steps to make sure that the information on this website about course content, structure, teaching facilities and staffing are accurate and up-to-date. Students are however warned that the demand for certain courses and the availability of staff and resources means that the University cannot guarantee that all courses featured in this website will necessarily be offered. Some courses may have to be withdrawn, or combined with others, or their content changed as resources dictate or permit.\r\n \r\nStudents and/or prospective students must therefore understand the needs or pressures for change and must also understand when the University expressly states that it shall not be held liable for any claim for damages (including economic damage) or costs(including legal costs) to any student who complains or takes legal action because the course s/he expected or wished to pursue has become unavailable or changed in content.\r\nHaving made this disclaimer, I hope you will find this website helpful and interesting. Should you not find what you are looking for, please let us know and we will try to help.\r\nWe warmly welcome you, if you are already here, and look forward to hearing from you if you have not yet decided.\r\n \r\nProf. Rwekaza S. Mukandala\r\nVice-Chancellor', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.\r\n \r\nThe University has taken all reasonable steps to make sure that the information on this website about course content, structure, teaching facilities and staffing are accurate and up-to-date. Students are however warned that the demand for certain courses and the availability of staff and resources means that the University cannot guarantee that all courses featured in this website will necessarily be offered. Some courses may have to be withdrawn, or combined with others, or their content changed as resources dictate or permit.\r\n \r\nStudents and/or prospective students must therefore understand the needs or pressures for change and must also understand when the University expressly states that it shall not be held liable for any claim for damages (including economic damage) or costs(including legal costs) to any student who complains or takes legal action because the course s/he expected or wished to pursue has become unavailable or changed in content.\r\nHaving made this disclaimer, I hope you will find this website helpful and interesting. Should you not find what you are looking for, please let us know and we will try to help.\r\nWe warmly welcome you, if you are already here, and look forward to hearing from you if you have not yet decided.\r\n \r\nProf. Rwekaza S. Mukandala\r\nVice-Chancellor', NULL, 'fa  fa-graduation-cap   fa-5x', '', 'welcome', 9, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EventUrl` varchar(255) NOT NULL,
  `EventTitleEn` varchar(255) NOT NULL,
  `EventTitleSw` varchar(255) NOT NULL,
  `DescriptionEn` text NOT NULL,
  `DescriptionSw` text NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UnitID` int(11) DEFAULT NULL,
  `Attachment` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `DatePosted` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`DateCreated`, `EventUrl`, `EventTitleEn`, `EventTitleSw`, `DescriptionEn`, `DescriptionSw`, `StartDate`, `EndDate`, `Id`, `UnitID`, `Attachment`, `Status`, `DatePosted`) VALUES
('2017-06-14 19:41:37', 'summer-school-training-for-postgraduate-students-(udiec)', 'summer school training for postgraduate students (udiec)', 'summer school training for postgraduate students (udiec)', 'The University of Dar es Salaam Innovation and Entrepreneurship Centre (UDIEC) in Collaboration with Trinity College Dublin (TCD), Ireland, will conduct a Three Weeks Training on Innovation and Entrepreneurship at the University of Dar es Salaam. The training will bring together 15 students from UDSM and 10 students from Ireland to provide interdisciplinary/ multidisciplinary platform for sharing expertise and experience in solving societal problem. ', 'The University of Dar es Salaam Innovation and Entrepreneurship Centre (UDIEC) in Collaboration with Trinity College Dublin (TCD), Ireland, will conduct a Three Weeks Training on Innovation and Entrepreneurship at the University of Dar es Salaam. The training will bring together 15 students from UDSM and 10 students from Ireland to provide interdisciplinary/ multidisciplinary platform for sharing expertise and experience in solving societal problem. ', '2017-06-14 22:41:37', NULL, 3, NULL, '', 1, '2017-06-18 14:29:42'),
('2017-07-13 21:07:16', 'university-of-dar-es-salaam-successfully-participated-in-the-''41st-dar-es-salaam-international-trade-fair''-july-2017-at-sabasaba-grounds.', 'university of dar es salaam successfully participated in the ''41st dar es salaam international trade fair'' july 2017 at sabasaba grounds.', 'university of dar es salaam successfully participated in the ''41st dar es salaam international trade fair'' july 2017 at sabasaba grounds.', 'University of Dar es Salaam (UDSM) successfully participated in the ''2017 Dar es Salaam International Trade Fair'' which was officially opened on 1st July 2017 at Sabasaba grounds. UDSM emerged the Overall Winners in this 41st Trade Fair owing to its innovative technology, and notably excelled in the categories of Research, Training, and Consultancy.', 'University of Dar es Salaam (UDSM) successfully participated in the ''2017 Dar es Salaam International Trade Fair'' which was officially opened on 1st July 2017 at Sabasaba grounds. UDSM emerged the Overall Winners in this 41st Trade Fair owing to its innovative technology, and notably excelled in the categories of Research, Training, and Consultancy.', '2017-07-01 00:00:00', NULL, 4, NULL, '', 1, '2017-07-13 21:08:05'),
('2017-07-13 22:34:33', 'second-season-china---tanzania-job-fair-opening-ceremony-held-at-udsm-on-17th-june-2017.', 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', '2017-07-18 00:00:00', NULL, 5, NULL, '', 1, '2017-07-13 22:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE IF NOT EXISTS `tbl_logins` (
  `UserId` int(11) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IpAddress` varchar(100) NOT NULL,
  `Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `MenuType` int(2) NOT NULL COMMENT '0=Main Site,1=Academic Unit,2=Side Menu',
  `UnitID` int(11) DEFAULT NULL,
  `ShowOnPage` varchar(50) DEFAULT '0' COMMENT '0=All Pages, >0 specific Page Of',
  `MenuPlacementAreaRegion` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `MenuName_UNIQUE` (`MenuName`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_menu_academic_administrative_unit_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all the menus names in the website' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`Id`, `MenuName`, `Description`, `MenuType`, `UnitID`, `ShowOnPage`, `MenuPlacementAreaRegion`, `Status`) VALUES
(1, 'Website Main Menu', 'This is menu that contains all the Menu Items in the UDSM main site', 0, NULL, '0', 4, 1),
(2, 'Main Website  Top Right Menu', 'This menu is for the main Website  Top Right  area that shows the key areas about the UDSm struture', 2, NULL, '0', 2, 1),
(3, 'Quick Links', 'dsfsfsdf', 2, NULL, '0', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_item`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `menuClasses` varchar(255) DEFAULT NULL,
  `MenuID` int(11) NOT NULL,
  `ItemNameEn` varchar(50) NOT NULL,
  `ItemNameSw` varchar(50) DEFAULT NULL,
  `LinkUrl` varchar(50) NOT NULL,
  `ParentItemID` int(2) NOT NULL DEFAULT '0' COMMENT '0= Parent Menu, >0 Child Menu',
  `ListOrder` int(2) NOT NULL COMMENT 'Order of the Menu Item In the list',
  `SectionID` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_menu_item_tbl_menu1_idx` (`MenuID`),
  KEY `fk_tbl_menu_item_tbl_sections1_idx` (`SectionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all links for a particular menu item' AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbl_menu_item`
--

INSERT INTO `tbl_menu_item` (`Id`, `menuClasses`, `MenuID`, `ItemNameEn`, `ItemNameSw`, `LinkUrl`, `ParentItemID`, `ListOrder`, `SectionID`, `Status`) VALUES
(2, NULL, 1, 'Home', 'Mwanzo', '<front>', 0, 1, NULL, 1),
(3, NULL, 1, 'About UDSM', 'Kuhusu UDSM', 'background', 0, 2, NULL, 1),
(4, NULL, 1, 'Background', 'Utangulizi', 'background', 3, 1, NULL, 1),
(5, NULL, 1, 'Mission & Vision', 'Dhima & Dira', 'mission-vision', 3, 2, NULL, 1),
(6, NULL, 1, 'Academic Units', 'Vitengo vya Elimu', '#', 0, 3, NULL, 1),
(7, NULL, 1, 'Study', 'Soma', '<front>', 0, 4, NULL, 1),
(8, NULL, 1, 'Research & Innovation', 'Tafiti na Ubunifu', 'reach-innovation', 0, 5, NULL, 1),
(9, NULL, 1, 'Public Service', 'Huduma Kwa umma', 'public-service', 0, 6, NULL, 1),
(10, NULL, 1, 'Campus Life', 'Maisha ya Campus', 'campus-life', 0, 7, NULL, 1),
(11, NULL, 1, 'Convocation', 'Mkutano', 'convocation', 0, 8, NULL, 1),
(12, NULL, 1, 'Alumni Portal', ' Portal ya Alumni', 'alumni-portal', 0, 10, NULL, 1),
(13, NULL, 1, 'Connect', 'Ungana nasi', 'connect', 0, 11, NULL, 1),
(15, NULL, 2, 'About Us', 'Kuhusu Sisi', 'about-us', 0, 1, NULL, 1),
(16, NULL, 2, 'Library', 'Maktaba', 'library', 0, 2, NULL, 1),
(17, NULL, 2, 'Contact Us', 'Wasiliana Nasi', 'contact-us', 0, 3, NULL, 1),
(18, NULL, 2, 'UDSM Directory', 'UDSM Saraka', 'udsm-directory', 0, 4, NULL, 1),
(19, NULL, 3, 'Guide to Visitor', 'Melekezo ya Wateja', '', 0, 0, NULL, 1),
(20, NULL, 3, '', 'Adminission', 'Usajili', 0, 2, NULL, 1),
(23, NULL, 3, 'Entry Requirements', 'Entry Requirements', '', 1, 11, NULL, 0),
(24, NULL, 3, 'Entry Requirements', 'Vigezzo vya Kujiunga', 'entry-requirement', 0, 3, NULL, 1),
(25, NULL, 3, 'Almanac 2017/2018', 'Almanac 2017/2018', 'almanac', 0, 4, NULL, 1),
(26, NULL, 3, 'Colleges & Schools', 'Vitivo & Shule', 'colleges', 0, 5, NULL, 1),
(27, NULL, 3, 'Undergraduate Programmes', 'Programu za shahada ya kwanza', 'under-graduate-programes', 0, 7, NULL, 1),
(28, NULL, 3, 'Postgraduate Programmes', 'Progame za udhamili', 'under-graduate-programe', 0, 8, NULL, 1),
(29, NULL, 3, 'IT Support', 'Msaada wa TEHAMA', 'ict-support', 0, 11, NULL, 1),
(30, NULL, 1, 'Leadership & Management', 'Uongozi & Utawala ', 'leadership', 3, 3, NULL, 1),
(31, NULL, 1, 'Quality Assurance', 'Udhibiti wa Ubora', 'quality-assurance', 3, 5, NULL, 1),
(32, NULL, 1, 'Message from VC', 'Ujumbe kutoka kwa VC', 'vc-message', 3, 5, NULL, 1),
(33, NULL, 1, 'Collaborations', 'Ushirikiano', 'collaborations', 3, 6, NULL, 1),
(34, NULL, 1, 'Annual Reports', 'Ripoti za mwaka', 'annual-reports', 3, 8, NULL, 1),
(35, NULL, 1, 'Corporate Social Responsibility', 'Ushiriki katika Mambo ya Jamii', 'csr', 3, 9, NULL, 1),
(36, NULL, 1, 'Fact and Figure', 'Ukweli na Taarifa', 'facts-and-figure', 3, 10, NULL, 1),
(37, NULL, 1, 'Consituent College', 'Vyuo Shirikishi', '#', 6, 1, NULL, 1),
(38, NULL, 1, 'Colleges', 'Vitivo', '#', 6, 2, NULL, 1),
(39, NULL, 1, 'schools', 'Skuli', '#', 6, 4, NULL, 1),
(40, NULL, 1, 'Institutes', 'Taasisi', '#', 6, 5, NULL, 1),
(41, NULL, 1, 'Centres', 'Centres', '#', 6, 6, NULL, 1),
(42, NULL, 1, 'DUCE', 'DUCE', 'college/duce', 37, 1, NULL, 1),
(43, NULL, 1, 'MUCE', 'MUCE', 'colleges/muce', 37, 2, NULL, 1),
(44, NULL, 1, 'COET', 'COET', 'colleges/coet', 38, 1, NULL, 1),
(45, NULL, 1, 'COICT', 'COICT', 'colleges/coict', 38, 2, NULL, 1),
(46, NULL, 1, 'UDBS', 'UDBS', 'schools/udbs', 39, 1, NULL, 1),
(47, NULL, 1, 'School of Education (SoED)', 'Shule a Elimu (SoED)', 'schools/soed', 39, 2, NULL, 1),
(48, NULL, 1, ' Institute of Development Studies (IDS)', ' Institute of Development Studies (IDS)', 'institute/ids', 40, 1, NULL, 1),
(49, NULL, 1, 'Confucius Institutes', 'Confucius Institutes', 'institute/ci', 40, 2, NULL, 1),
(50, NULL, 1, 'Centre for Entreprenuership Development (CED)', 'Centre for Entreprenuership Development (CED)', 'centres/udec', 41, 1, NULL, 1),
(51, NULL, 1, 'University Of Dar es Salaam Computing Centre (UCC)', 'University Of Dar es Salaam Computing Centre (UCC)', 'www.ucc.co.tz', 41, 2, NULL, 1),
(52, NULL, 1, 'Undergraduate', 'Undergraduate', 'study/undergraduate', 7, 1, NULL, 1),
(53, NULL, 1, 'Postgraduate', 'Postgraduate', 'study/postgraduate', 7, 2, NULL, 1),
(54, NULL, 1, 'International Students', 'International Students', 'study/international', 7, 3, NULL, 1),
(55, NULL, 1, 'Continuing Education', 'Continuing Education', 'study/continuing-education', 7, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LinkUrl` varchar(255) NOT NULL,
  `TitleEn` varchar(255) NOT NULL,
  `TitleSw` varchar(255) DEFAULT NULL,
  `DetailsEn` text NOT NULL,
  `DetailsSw` text,
  `Attachment` varchar(200) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL COMMENT '0=>Saved, 1=Published, 2=>unpublished',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_news_tbl_academic_administrative_unit1_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`Id`, `LinkUrl`, `TitleEn`, `TitleSw`, `DetailsEn`, `DetailsSw`, `Attachment`, `Photo`, `UnitID`, `Status`, `DateCreated`, `DatePosted`) VALUES
(1, 'test-test', 'test test', 'jaribu jaribu', 'wsf sjsa dsdasd a d asdkasd ad', 'wsf sjsa dsdasd a d asdkasd ad', NULL, NULL, 5, 1, '0000-00-00 00:00:00', '2017-06-17 16:40:24'),
(2, '', 'test news 1', 'Habari ya Majaribio 1', 'saksad asdkas  asdnsa d', 'saksad asdkas  asdnsa d', '', '', 2, 1, '0000-00-00 00:00:00', NULL),
(3, '', 'Test new 2', 'Habari ya jaribio Na 2', 'Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'international', NULL, 1, '0000-00-00 00:00:00', NULL),
(5, 'test-new-2', 'test new 2', 'habari ya jaribio na 2', 'Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '2017-07-13 23:50:50'),
(6, '', 'Test new 2', 'Habari ya jaribio Na 2', 'Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL),
(7, '', 'sdhhjas  ashda  asdhas d sa d sa', 'sdhfnsdf  sdfns df sd fsdfuhk f', 'ut the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t an', 'ut the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t an', NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL),
(8, 'the-9th-mwalimu-nyerere-intellectual-festival,-held-at-the-university-of-dar-es-salaam,-nkrumah-hall,-13th---15th-june-2017', 'the 9th mwalimu nyerere intellectual festival, held at the university of dar es salaam, nkrumah hall, 13th - 15th june 2017', 'the 9th mwalimu nyerere intellectual festival, held at the university of dar es salaam, nkrumah hall, 13th - 15th june 2017', 'The 9th Mwalimu Nyerere Intellectual Festival, held at the University of Dar es Salaam, Nkrumah Hall, 13th - 15th June 2017. Theme: "The POLITICIAN in the Rise and Fall of Africa"', 'The 9th Mwalimu Nyerere Intellectual Festival, held at the University of Dar es Salaam, Nkrumah Hall, 13th - 15th June 2017. Theme: "The POLITICIAN in the Rise and Fall of Africa"', NULL, 'international', NULL, 1, '2017-06-14 16:43:18', '2017-07-13 23:51:50'),
(9, 'asdshd-ashdahsd-kasdasd-sadsad-sadsad-&-?-$-%', 'asdshd           ashdahsd         kasdasd sadsad sadsad & ? $ %', 'asdshd           ashdahsd         kasdasd sadsad sadsad & ? $ %', 'asdshd           ashdahsd         kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd           ashdahsd         kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd           ashdahsd         kasdasd sadsad sadsad asdsa dsa d sad sa d s ad', 'asdshd           ashdahsd         kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd           ashdahsd         kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd           ashdahsd         kasdasd sadsad sadsad asdsa dsa d sad sa d s ad', NULL, NULL, 5, 2, '2017-06-14 16:55:03', NULL),
(10, 'what-is-lorem-ipsum?', 'what is lorem ipsum?', 'what is lorem ipsum?', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c', NULL, NULL, 5, 1, '2017-06-17 13:42:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programmes`
--

CREATE TABLE IF NOT EXISTS `tbl_programmes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProgrammeNameEn` varchar(100) NOT NULL,
  `ProgrammeNameSw` varchar(100) DEFAULT NULL,
  `ProgrammeUrl` varchar(100) DEFAULT NULL,
  `Duration` varchar(45) NOT NULL,
  `DescriptionEn` text NOT NULL,
  `DescriptionSw` text,
  `UnitID` int(11) NOT NULL,
  `EntryRequirements` text,
  `ProgrammeType` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `ProgrammeNameEn_UNIQUE` (`ProgrammeNameEn`),
  KEY `fk_tbl_programmes_tbl_academic_administrative_unit1_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all programes offers by different units/colleges' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_programmes`
--

INSERT INTO `tbl_programmes` (`Id`, `ProgrammeNameEn`, `ProgrammeNameSw`, `ProgrammeUrl`, `Duration`, `DescriptionEn`, `DescriptionSw`, `UnitID`, `EntryRequirements`, `ProgrammeType`, `Status`, `DateCreated`) VALUES
(1, 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printin', 'asdasdsad', 'what-is-lorem-ipsum?-lorem-ipsum-is-simply-dummy-text-of-the-printin', 'asdsad', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nI', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nI', 3, '', '3', 1, '0000-00-00 00:00:00'),
(7, 'Where does it come from?', 'Where does it come from?', 'where-does-it-come-from?', '3 years', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled ', '1', 1, '2017-06-18 15:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_research_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_research_projects` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectNameEn` varchar(255) NOT NULL,
  `ProjectNameSw` varchar(255) DEFAULT NULL,
  `ProjectLinkUrl` varchar(255) NOT NULL,
  `UnitID` int(11) NOT NULL,
  `DetailsEn` text NOT NULL,
  `DetailsSw` text,
  `Principal` varchar(50) DEFAULT NULL,
  `OtherResearcher` varchar(45) DEFAULT NULL,
  `Funding` varchar(255) DEFAULT NULL,
  `StartYear` varchar(12) DEFAULT NULL,
  `EndYear` varchar(12) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `PageLinkUrl` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_research_projects_tbl_academic_administrative_unit1_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps all the research Projects for a particular unit' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_research_projects`
--

INSERT INTO `tbl_research_projects` (`Id`, `ProjectNameEn`, `ProjectNameSw`, `ProjectLinkUrl`, `UnitID`, `DetailsEn`, `DetailsSw`, `Principal`, `OtherResearcher`, `Funding`, `StartYear`, `EndYear`, `Status`, `PageLinkUrl`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industr', 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '', '', NULL, NULL, NULL, 1, 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industr'),
(2, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'the-standard-chunk-of-lorem-ipsum-used-since-the-1500s-is-reproduced-below-for-those-interested', 7, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Mr Charles Mhoka', 'The standard chunk of Lorem Ipsum used since ', NULL, '2011', '2019', 1, 'the-standard-chunk-of-lorem-ipsum-used-since-the-1500s-is-reproduced-below-for-those-interested');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE IF NOT EXISTS `tbl_sections` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SectionName` varchar(50) NOT NULL,
  `SectionPlacement` int(2) DEFAULT '0' COMMENT '0=Main website, 1=Collge,schools etc',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of  content sections on the website' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide_shows`
--

CREATE TABLE IF NOT EXISTS `tbl_slide_shows` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TitleEn` varchar(100) NOT NULL,
  `TitleSw` varchar(100) DEFAULT NULL,
  `DetailsEn` varchar(400) DEFAULT NULL,
  `DetailsSw` varchar(400) DEFAULT NULL,
  `LinkToPage` varchar(100) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_slide_shows_tbl_academic_administrative_unit1_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps information about different home page slide shows' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_slide_shows`
--

INSERT INTO `tbl_slide_shows` (`Id`, `TitleEn`, `TitleSw`, `DetailsEn`, `DetailsSw`, `LinkToPage`, `Image`, `UnitID`, `DateCreated`, `DatePosted`, `Status`) VALUES
(1, 'werfwer vw wer werewrewr ewr', 'werfwer vw wer werewrewr ewr', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page ', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page ', '', '', 4, '2017-06-18 14:39:10', '2017-06-18 14:39:10', 1),
(3, 't is a long established fact that a rea', 't is a long established fact that a rea', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page ', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page ', 'http://postgraduate.udsm.ac.tz/', '', 7, '2017-06-18 14:19:17', '2017-06-18 14:19:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_media_accounts`
--

CREATE TABLE IF NOT EXISTS `tbl_social_media_accounts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccountType` int(2) NOT NULL COMMENT '1=Fbook,2=tritter,3=LinkedIn,4=Youtube',
  `AccountName` varchar(200) NOT NULL,
  `AccountAddress` varchar(255) NOT NULL,
  `AccountLogoClass` varchar(20) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `AccountName_UNIQUE` (`AccountName`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `AccountAddress_UNIQUE` (`AccountAddress`),
  KEY `fk_tbl_social_media_accounts_tbl_academic_administrative_un_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps a list of social media accounts' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_social_media_accounts`
--

INSERT INTO `tbl_social_media_accounts` (`Id`, `AccountType`, `AccountName`, `AccountAddress`, `AccountLogoClass`, `UnitID`, `Status`) VALUES
(1, 1, 'UDSM ALumni', 'https://facebook.com/udsm.alumni/?_rdc=1&_rdr', 'fa fa-facebook', NULL, 1),
(2, 2, 'UDSM Twitter Account', 'https://twitter.com/udsm', 'fa fa-twitter', NULL, 1),
(3, 3, 'UDSM LinkedIN account', 'https://www.linkedin.com/edu/school?id=17507', 'fa fa-linkedin', NULL, 1),
(4, 4, 'UDSM Youtube Account', 'https://www.youtube.com/results?search_query=udsm', 'fa fa-youtube', NULL, 1),
(5, 5, 'UDSM Instagram Account', '', 'fa fa-instagram', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_list`
--

CREATE TABLE IF NOT EXISTS `tbl_staff_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) NOT NULL,
  `LName` varchar(45) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Summary` text,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `fk_tbl_staff_list_tbl_academic_administrative_unit1_idx` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all staffs' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_staff_list`
--

INSERT INTO `tbl_staff_list` (`Id`, `FName`, `LName`, `Education`, `Position`, `Summary`, `UnitID`, `Status`) VALUES
(1, 'Amani', 'Jumanne Amani', 'PHD, Comp. Science Olso Norway', 'Seniour Lecturer, Dept Compu Science', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 4, 1),
(2, 'sadsad', 'sadsad', 'sadsadsd', 'sadsad', 'dsadsad', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` int(2) NOT NULL COMMENT '1=Adminstrator, 2=Content Admin',
  `UnitID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_tbl_user_tbl_acdm_admin_unit_id` (`UnitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps a list of users' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id`, `FName`, `LName`, `UserName`, `Password`, `UserType`, `UnitID`) VALUES
(1, 'Charles', 'Mhoja', 'admin', '0a8b02ee069cab3ee1f2c4580f8cc341d86f1c6b', 1, NULL),
(4, 'martha', 'mhoja', 'marth', '$2y$13$ly0jHXR0ts0VrmA3HGXknO7nScE2Fv2YxN8erFhko9Z/pfSCYp.rW', 2, 1),
(5, 'Peter', 'Mhoja', 'peter', '$2y$13$WaigHDcT08/iDYqUIADcwOcWk6fMc1Mhn3iKGJPbJHKUKcxWuUQy.', 2, 1),
(6, 'Amani', 'Amani', 'amani', '$2y$13$qwKPIh3YG22gSOEtjasfjOwS9FxewM5xQemaDVIywHRkwW1JO3prm', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `VideoNameEn` varchar(255) NOT NULL,
  `VideoNameSw` varchar(255) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `VideoLink` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`Id`, `VideoNameEn`, `VideoNameSw`, `UnitID`, `VideoLink`, `Status`, `DateCreated`, `DatePosted`) VALUES
(1, 'Test video 1', 'Video ya Majaribio', NULL, '<iframe width="560" height="315" src="https://www.youtube.com/embed/qyVbxUW_aXY?ecver=1" frameborder="0" allowfullscreen></iframe>', 1, '0000-00-00 00:00:00', '2017-06-18 14:41:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD CONSTRAINT `fk_tbl_contacts_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `fk_tbl_menu_academic_administrative_unit` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu_item`
--
ALTER TABLE `tbl_menu_item`
  ADD CONSTRAINT `fk_tbl_menu_item_tbl_menu1` FOREIGN KEY (`MenuID`) REFERENCES `tbl_menu` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_menu_item_tbl_sections1` FOREIGN KEY (`SectionID`) REFERENCES `tbl_sections` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD CONSTRAINT `fk_tbl_news_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  ADD CONSTRAINT `fk_tbl_programmes_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_research_projects`
--
ALTER TABLE `tbl_research_projects`
  ADD CONSTRAINT `fk_tbl_research_projects_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_slide_shows`
--
ALTER TABLE `tbl_slide_shows`
  ADD CONSTRAINT `fk_tbl_slide_shows_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_social_media_accounts`
--
ALTER TABLE `tbl_social_media_accounts`
  ADD CONSTRAINT `fk_tbl_social_media_accounts_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staff_list`
--
ALTER TABLE `tbl_staff_list`
  ADD CONSTRAINT `fk_tbl_staff_list_tbl_academic_administrative_unit1` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_academic_admin_unit` FOREIGN KEY (`UnitID`) REFERENCES `tbl_academic_administrative_unit` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
