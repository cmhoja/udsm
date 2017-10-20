-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2017 at 10:38 PM
-- Server version: 5.5.57-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udsm_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_administrative_unit`
--

CREATE TABLE `tbl_academic_administrative_unit` (
  `Id` int(11) NOT NULL,
  `UnitNameEn` varchar(255) NOT NULL,
  `UnitNameSw` varchar(255) DEFAULT NULL,
  `UnitAbreviationCode` varchar(20) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `UnitType` int(2) NOT NULL DEFAULT '0' COMMENT '0=Administrative,1=College,2=School,3=Institute,4=Centres',
  `ParentUnitId` int(11) NOT NULL DEFAULT '0' COMMENT 'Id of Parent Unit if Any',
  `TypeContentManagement` int(1) NOT NULL DEFAULT '1' COMMENT '1=CentrallyManaged(Within UDSM CMS), 2= External Website(Separate Website)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='keeps a list of academin and adminitrative units';

--
-- Dumping data for table `tbl_academic_administrative_unit`
--

INSERT INTO `tbl_academic_administrative_unit` (`Id`, `UnitNameEn`, `UnitNameSw`, `UnitAbreviationCode`, `Logo`, `UnitType`, `ParentUnitId`, `TypeContentManagement`) VALUES
(1, 'Computing Center', 'Kitengo cha Compyuta', 'ucc', NULL, 5, 0, 2),
(2, 'Directorate of Administration', 'Kurugenzi ya Utawala', 'admin', NULL, 0, 0, 1),
(3, 'Directorate of Undergraduate Studies', 'Kurugenzi ya  Mafunzo ya shahada ya kwanza', NULL, NULL, 0, 0, 1),
(4, 'College of Information and  Communication Technologies', 'Ndaki ya Teknolojia za Habari na Mawasiliano', 'coict', 'coict_logo.png', 2, 0, 1),
(5, 'College of Engineering and  Technology', 'Ndaki ya Uhandisi na Teknolojia', 'coet', NULL, 2, 0, 1),
(6, 'Directorate of Internationalization', 'Kurugenzi ya Umataifishaji', NULL, NULL, 0, 0, 1),
(7, 'University of Dar es Salaam  Business School', 'Shule Kuu ya Biashara, Chuo Kikuu cha Dar es  Salaam', 'udbs', NULL, 3, 0, 1),
(8, 'Department of Computer Science', 'Idara ya Sayansi ya Kompyuta', NULL, NULL, 5, 4, 1),
(9, 'Department of Civil & Construction Engineering ', 'Idara ya Uhandisi wa Ujenzi na Majengo', NULL, NULL, 5, 5, 1),
(10, ' College of Natural and Applied  Sciences', 'Ndaki ya Sayansi Asilia na Tumizi', 'CONAS', NULL, 2, 0, 1),
(11, 'College of Humanities', ' Ndaki ya Insia', NULL, NULL, 2, 0, 1),
(12, ' College of Social Sciences', 'Ndaki ya Sayansi za Jamii', NULL, NULL, 2, 0, 1),
(13, 'College of Agricultural Sciences  and Fisheries Technology', 'Ndaki ya Sayansi na Teknolojia za Kilimo na  Uvuvi', NULL, NULL, 2, 0, 1),
(14, 'Dar es Salaam University  College of Education', 'Chuo Kikuu Kishiriki cha Elimu, Dar es Salaam', NULL, NULL, 1, 0, 1),
(15, ' Mkwawa University College of  Education', 'Chuo Kikuu Kishiriki cha Elimu, Mkwawa', NULL, NULL, 2, 0, 1),
(16, 'University of Dar es Salaam School  of Law', 'Shule Kuu ya Sheria, Chuo Kikuu cha Dar es  Salaam', 'sol', NULL, 3, 0, 1),
(17, 'School of Journalism and Mass  Communication', 'Shule Kuu ya U', 'sjmc', NULL, 3, 0, 1),
(18, 'University of Dar es Salaam School  of Education', 'Shule Kuu ya Elimu, Chuo Kikuu cha Dar es  Salaam', 'soed', NULL, 3, 0, 1),
(19, ' University of Dar es Salaam School  of Health Sciences', 'Shule Kuu ya Sayansi za Afya', 'sohs', NULL, 3, 0, 1),
(20, 'Institute of Kiswahili Studies', ' Taasisi ya Taaluma za Kiswahili', 'iks', NULL, 4, 0, 1),
(21, 'Institute of Development Studies', ' Taasisi ya Taaluma za Maendeleo', 'ids', NULL, 4, 0, 1),
(22, 'Institute of Resource Assessment', ' Taasisi ya Tathmini ya Rasilimali', 'ira', NULL, 4, 0, 1),
(23, 'Institute of Marine Sciences', 'Taasisi ya Sayansi Bahari', 'ims', NULL, 4, 0, 1),
(24, ' Centre for Virtual Learning', 'Kituo cha Ujifunzaji Kitalifa', NULL, NULL, 5, 0, 2),
(25, 'Quality Assurance Bureau', ' Kitengo cha Udhibiti Ubora', NULL, NULL, 5, 0, 2),
(26, 'Directorate of Postgraduate Studies', 'Directorate of Postgraduate Studies', 'dpgs', NULL, 0, 0, 1),
(27, 'Dean of Students', 'Mshauri wa wanafunzi', 'dos', NULL, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `Id` int(11) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `TitleEn` varchar(255) NOT NULL,
  `TitleSw` varchar(255) NOT NULL,
  `DetailsEn` text NOT NULL,
  `DetailsSw` text NOT NULL,
  `Attachment` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `AnnouncementType` int(1) NOT NULL COMMENT '0=General Public,1=Student,2=Staff',
  `LinkUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`Id`, `UnitID`, `TitleEn`, `TitleSw`, `DetailsEn`, `DetailsSw`, `Attachment`, `DateCreated`, `DatePosted`, `Status`, `AnnouncementType`, `LinkUrl`) VALUES
(1, 5, 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj  kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', 'kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhjkjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj  kjhgfdghkl;hgfhklkjhcvnbvb nghjolkbn gyyfgkln  iydityg uytu      jhghjlln  gyh vfughm bvgyn  gfhj', '', '2017-06-15 19:22:57', '2017-06-17 16:44:11', 1, 0, 'kjhgfdghkl;hgfhklkjhcvnbvb-nghjolkbn-gyyfgkln-iydityg-uytu-jhghjlln-gyh-vfughm-bvgyn-gfhj'),
(2, NULL, 'employment opportunity', 'employment opportunity', 'Delivery of clean air strategies for mitigating household air pollution and associated respiratory illnesses in urban informal settlements in Dar es Salaam (Tanzania) and Lilongwe (Malawi) cities. ', 'Delivery of clean air strategies for mitigating household air pollution and associated respiratory illnesses in urban informal settlements in Dar es Salaam (Tanzania) and Lilongwe (Malawi) cities. ', '', '2017-06-15 19:41:31', '2017-06-18 14:34:43', 1, 0, 'employment-opportunity'),
(3, NULL, 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', '', '2017-07-13 22:33:56', '2017-07-13 22:33:56', 1, 0, 'second-season-china---tanzania-job-fair-opening-ceremony-held-at-udsm-on-17th-june-2017.'),
(4, 4, 'test announcement test announcement ', 'test announcement  test announcement ', 'test announcement  test announcement  test announcement  test announcement  test announcement  test announcement  ', 'test announcement  test announcement  test announcement  test announcement  test announcement  test announcement  test announcement ', '', '2017-08-05 20:31:33', '2017-08-05 00:00:00', 1, 0, ''),
(5, 4, 'jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd ', 'jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd ', 'jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd ', 'jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd ', '', '2017-08-05 20:45:56', '2017-08-05 00:00:00', 1, 0, 'adc-abd'),
(6, NULL, 'tstt ggg hhh  hhas d as d asdhad  asdhsahd  ashdsad  asdhasd sa ', 'tstt ggg hhh  hhas d as d asdhad  asdhsahd  ashdsad  asdhasd sa ', '<p>tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;</p>\r\n\r\n<p>tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;</p>\r\n', '<p>tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;</p>\r\n\r\n<p>tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa &nbsp;tstt ggg hhh &nbsp;hhas d as d asdhad &nbsp;asdhsahd &nbsp;ashdsad &nbsp;asdhasd sa&nbsp;</p>\r\n', 'UDSM_tstt ggg hhh  hhas d as d asdhad  asdhsahd  ashdsad  asdhasd sa .doc', '2017-08-19 10:56:18', NULL, 0, 0, 'tstt-ggg-hhh-hhas-d-as-d-asdhad-asdhsahd-ashdsad-asdhasd-sa'),
(7, 27, 'nhif cards', 'nhif cards', '<p>The following is the list of students required to collect their NHIF Cards</p>\r\n', '<p>The following is the list of students required to collect their NHIF Cards</p>\r\n', 'UNIT27_nhif cards.docx', '2017-10-19 13:25:33', '2017-10-19 13:25:33', 1, 0, 'nhif-cards');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basic_page`
--

CREATE TABLE `tbl_basic_page` (
  `PageId` int(11) NOT NULL,
  `PageTitleEn` varchar(200) NOT NULL,
  `PageTitleSw` varchar(200) NOT NULL,
  `DescriptionEn` text NOT NULL,
  `DescriptionSw` text NOT NULL,
  `Attachment` varchar(200) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `EmbededVideo` varchar(255) DEFAULT NULL,
  `PageSeoUrl` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `SectionLink` varchar(200) DEFAULT NULL COMMENT 'This indicated the ection Link group for all the contents relting to that page'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_basic_page`
--

INSERT INTO `tbl_basic_page` (`PageId`, `PageTitleEn`, `PageTitleSw`, `DescriptionEn`, `DescriptionSw`, `Attachment`, `Photo`, `EmbededVideo`, `PageSeoUrl`, `DateCreated`, `Status`, `UnitID`, `SectionLink`) VALUES
(2, 'Background', 'Utangulizi', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre.\r\nIt was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges. Prior to 1970, the university college, Dar es Salaam had started on 1st July 1961 as an affiliate college of the University of London. It had only one faculty- the faculty of Law, with 13 students.\r\nIn 1963 it became a constituent college of the university of East Africa together with Makerere University College in Uganda and Nairobi University College in Kenya. Since 1961, the University of Dar es Salaam has grown in terms of student intake, academic units and academic programmes.', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre.\r\nIt was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges. Prior to 1970, the university college, Dar es Salaam had started on 1st July 1961 as an affiliate college of the University of London. It had only one faculty- the faculty of Law, with 13 students.\r\nIn 1963 it became a constituent college of the university of East Africa together with Makerere University College in Uganda and Nairobi University College in Kenya. Since 1961, the University of Dar es Salaam has grown in terms of student intake, academic units and academic programmes.', '', NULL, '', '/about-us/background', '2017-07-24 22:38:16', 1, NULL, 'about-us'),
(3, 'Mission, Vision and Values', 'Mission, Vision and Values', 'UDSM Vision\r\n“to become a reputable world-class university that is responsive to national, regional and global development needs through engagement in dynamic knowledge creation and application.”\r\n\r\nUDSM Mission\r\n“the unrelenting pursuit of scholarly and strategic research, education, training and public service directed at attainment of equitable and sustainable socio-economic development of Tanzania and the rest of Africa.”\r\n\r\nGuiding Theme\r\nThe focus of the University of Dar es Salaam activities during the period 2006/ 07 - 2010/11, shall be guided by the following theme: \"Enhanced quality outputs in teaching, research and public service\"\r\n\r\nUDSM Values\r\nTowards achieving its Vision and fulfilling its Mission, the University of Dar es Salaam subscribes to the following Values:\r\n\r\nAcademic excellence by ensuring that the pursuit of academic excellence in teaching, research and service to the public is well recognised and forms an important part of the academic and organisational life of the institution.\r\n\r\nAcademic integrity by ensuring that all the academic outputs are produced in line with international standards of academic integrity.\r\n\r\nAcademic freedom by upholding the spirit of free and critical thought and enquiry, through the tolerance of a diversity of beliefs and understanding, as well as fostering open exchange of ideas and knowledge amongst the staff and/or students.\r\n\r\n“unrelenting pursuit of scholarly and strategic research, education, training and public service directed at the attainment of equitable and sustainable socio-economic developmentof Tanzania and the rest of Africa.”\r\n\r\nInternationalisation through participation in the regional and global world of scholarship, by being receptive and responsive to issues within the international environment, as well as enrolling an increasing number of international students.\r\n\r\nProfessional and ethical standards by upholding the highest professional standards and ethical behaviour, and through openness, honesty, tolerance and respect for the individual in all disciplines.\r\n\r\nSocial responsibility by promoting an awareness of, and providing leadership to respond to, the issues and problems facing society with a view to ultimately solving and alleviating them.\r\n\r\nDevelopmental responsibility by ensuring that most of the research conducted has an immediate or long-term impact. \r\n\r\nTeaching and learning by creating a holistic teaching and learning environment which is student centred, providing students with social, cultural and recreational opportunities that will facilitate the full realisation of their potential for academic and personal growth.\r\n\r\nInstitutional autonomy characterised by self-governing structures guided by the University’s Council and greater independence of action, while being responsive to societal and development needs or to what is prescribed by the relevant legal instruments.\r\n\r\nPublic accountability by ensuring transparent decision making and open review, as well as the full participation of stakeholders in the development of the institution and in major policy shifts.\r\n\r\nEquity and social justice by ensuring equal opportunity and non-discrimination on the basis of personal, ethnic, religious, gender or other social characteristics.\r\n\r\nStrategic planning culture by inculcating it at all levels in the University.\r\n\r\nResearch relevance by ensuring that research addresses relevant national or societal problems.\r\n\r\nICT use of ICT by application of ICT in the enhancement of academic delivery and management.\r\n', 'UDSM Vision\r\n“to become a reputable world-class university that is responsive to national, regional and global development needs through engagement in dynamic knowledge creation and application.”\r\n\r\nUDSM Mission\r\n“the unrelenting pursuit of scholarly and strategic research, education, training and public service directed at attainment of equitable and sustainable socio-economic development of Tanzania and the rest of Africa.”\r\n\r\nGuiding Theme\r\nThe focus of the University of Dar es Salaam activities during the period 2006/ 07 - 2010/11, shall be guided by the following theme: \"Enhanced quality outputs in teaching, research and public service\"\r\n\r\nUDSM Values\r\nTowards achieving its Vision and fulfilling its Mission, the University of Dar es Salaam subscribes to the following Values:\r\n\r\nAcademic excellence by ensuring that the pursuit of academic excellence in teaching, research and service to the public is well recognised and forms an important part of the academic and organisational life of the institution.\r\n\r\nAcademic integrity by ensuring that all the academic outputs are produced in line with international standards of academic integrity.\r\n\r\nAcademic freedom by upholding the spirit of free and critical thought and enquiry, through the tolerance of a diversity of beliefs and understanding, as well as fostering open exchange of ideas and knowledge amongst the staff and/or students.\r\n\r\n“unrelenting pursuit of scholarly and strategic research, education, training and public service directed at the attainment of equitable and sustainable socio-economic developmentof Tanzania and the rest of Africa.”\r\n\r\nInternationalisation through participation in the regional and global world of scholarship, by being receptive and responsive to issues within the international environment, as well as enrolling an increasing number of international students.\r\n\r\nProfessional and ethical standards by upholding the highest professional standards and ethical behaviour, and through openness, honesty, tolerance and respect for the individual in all disciplines.\r\n\r\nSocial responsibility by promoting an awareness of, and providing leadership to respond to, the issues and problems facing society with a view to ultimately solving and alleviating them.\r\n\r\nDevelopmental responsibility by ensuring that most of the research conducted has an immediate or long-term impact. \r\n\r\nTeaching and learning by creating a holistic teaching and learning environment which is student centred, providing students with social, cultural and recreational opportunities that will facilitate the full realisation of their potential for academic and personal growth.\r\n\r\nInstitutional autonomy characterised by self-governing structures guided by the University’s Council and greater independence of action, while being responsive to societal and development needs or to what is prescribed by the relevant legal instruments.\r\n\r\nPublic accountability by ensuring transparent decision making and open review, as well as the full participation of stakeholders in the development of the institution and in major policy shifts.\r\n\r\nEquity and social justice by ensuring equal opportunity and non-discrimination on the basis of personal, ethnic, religious, gender or other social characteristics.\r\n\r\nStrategic planning culture by inculcating it at all levels in the University.\r\n\r\nResearch relevance by ensuring that research addresses relevant national or societal problems.\r\n\r\nICT use of ICT by application of ICT in the enhancement of academic delivery and management.\r\n', '', NULL, '<div style=\"position:relative;height:0;padding-bottom:56.25%\"><iframe src=\"https://www.youtube.com/embed/hNMWa8e6WZI?ecver=2\" width=\"640\" height=\"360\" frameborder=\"0\" style=\"position:absolute;width:100%;height:100%;left:0\" allowfullscreen></iframe></div>', '/about-us/mission-vision', '2017-07-24 22:38:35', 1, NULL, 'about-us'),
(4, 'Message from the Vice Chancellor', 'Ujumbe kutoka kwa VC', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives', '', NULL, '', '/about-us/vc-message', '2017-07-24 22:38:44', 1, NULL, 'about-us'),
(5, 'undergraduate', 'Shahada ya Kwanza', 'The University of Dar es salaam offers various academic programmes leading to the award of certificates, diplomas, and degrees. A total of 4 Certificates, 3 Diplomas and 65 Undergraduate Degree Programmes are offered at various academic units of the University of Dar es Salaam these include Evening Study programmes designed to offer opportunities to mainly the working people although any interested person who have requisite entry qualifications can apply.\r\n\r\nOne undergraduate distance learning study programme (Bachelor of Business Administration) has been designed to benefit those who merit University education but for some reasons are unable to attend regular classes at the University. The number of students admitted at the University of Dar es Salaam has been increasing steadily, from 14 in 1961 to 21,502 (13,641 male and 7,861 female) undergraduate degree and non-degree in the 2011/2012 academic year. Female students constitute 36.5% of all undergraduate students at the University of Dar es Salaam.', 'The University of Dar es salaam offers various academic programmes leading to the award of certificates, diplomas, and degrees. A total of 4 Certificates, 3 Diplomas and 65 Undergraduate Degree Programmes are offered at various academic units of the University of Dar es Salaam these include Evening Study programmes designed to offer opportunities to mainly the working people although any interested person who have requisite entry qualifications can apply.\r\n\r\nOne undergraduate distance learning study programme (Bachelor of Business Administration) has been designed to benefit those who merit University education but for some reasons are unable to attend regular classes at the University. The number of students admitted at the University of Dar es Salaam has been increasing steadily, from 14 in 1961 to 21,502 (13,641 male and 7,861 female) undergraduate degree and non-degree in the 2011/2012 academic year. Female students constitute 36.5% of all undergraduate students at the University of Dar es Salaam.', '', NULL, '', '/study/undergraduate', '2017-07-24 22:11:24', 1, NULL, 'study'),
(6, 'Postgraduate', 'Postgraduate', 'The Directorate of Post Graduate Studies (DPGS) formally replaced the School of Graduate Studies (DPGS) in 2009.\r\n\r\nThe former School was established in 2006, with the main functions as administering and coordinating postgraduate studies at the University of the Dar es Salaam (UDSM). In the past fifteen years the postgraduate students’ population increased from about 100 in 1993/1994 to about 2,607 in 2006/07.\r\n\r\nDuring the same period, postgraduate programmes increased from 48 to over 74.\r\n\r\nIn view of the rapid expansion of postgraduate programmes, coupled with the University restructuring programme, the UDSM Council at its 69th meeting approved the re-establishment of the Directorate of Post Graduate Studies (DPGS) and subsequently de-established the School of graduate Studies (SGS).\r\n\r\nThe DPGS has taken over all the functions of the SGS but with more responsibilities including providing the requisite environment for postgraduate studies and activities.\r\n\r\nHigher Degrees\r\n\r\nDoctor of Laws (LL.D.), Doctor of Literature (D.Lit.) and Doctor of Science (D.Sc.).\r\n\r\nThese degrees are retained as higher doctorates to be awarded in accordance with regulations relating to higher doctorates at the University of Dar es Salaam.\r\n\r\nAnnouncement of Postgraduate Admissions for 2015/2016 Academic Year\r\n\r\nThe University of Dar es Salaam would like to announce that the following applicants have been selected to join various postgraduate programmes for the 2015/2016 academic year. The orientation week and registration processes for new students at UDSM Mwalimu J.K. Nyerere Main Campus will start on Monday12th October 2015 as stipulated in the admission letters.\r\n\r\nFor those applicants selected for admission into the Institute of Marine Sciences (IMS), Dar es Salaam University College of Education (DUCE) and Mkwawa University College of Education (MUCE) should report directly at the respective campuses in Zanzibar, Chang’ombe and Iringa on the same date. Joining instructions and admission letters should be collected at the UDSM Mwalimu J.K. Nyerere Main Campus, IMS, DUCE and MUCE depending on where one is admitted.\r\n\r\n***Please click the link below to view selected applicants to join various postgraduate programmes for the 2015/2016 academic year ***', 'The Directorate of Post Graduate Studies (DPGS) formally replaced the School of Graduate Studies (DPGS) in 2009.\r\n\r\nThe former School was established in 2006, with the main functions as administering and coordinating postgraduate studies at the University of the Dar es Salaam (UDSM). In the past fifteen years the postgraduate students’ population increased from about 100 in 1993/1994 to about 2,607 in 2006/07.\r\n\r\nDuring the same period, postgraduate programmes increased from 48 to over 74.\r\n\r\nIn view of the rapid expansion of postgraduate programmes, coupled with the University restructuring programme, the UDSM Council at its 69th meeting approved the re-establishment of the Directorate of Post Graduate Studies (DPGS) and subsequently de-established the School of graduate Studies (SGS).\r\n\r\nThe DPGS has taken over all the functions of the SGS but with more responsibilities including providing the requisite environment for postgraduate studies and activities.\r\n\r\nHigher Degrees\r\n\r\nDoctor of Laws (LL.D.), Doctor of Literature (D.Lit.) and Doctor of Science (D.Sc.).\r\n\r\nThese degrees are retained as higher doctorates to be awarded in accordance with regulations relating to higher doctorates at the University of Dar es Salaam.\r\n\r\nAnnouncement of Postgraduate Admissions for 2015/2016 Academic Year\r\n\r\nThe University of Dar es Salaam would like to announce that the following applicants have been selected to join various postgraduate programmes for the 2015/2016 academic year. The orientation week and registration processes for new students at UDSM Mwalimu J.K. Nyerere Main Campus will start on Monday12th October 2015 as stipulated in the admission letters.\r\n\r\nFor those applicants selected for admission into the Institute of Marine Sciences (IMS), Dar es Salaam University College of Education (DUCE) and Mkwawa University College of Education (MUCE) should report directly at the respective campuses in Zanzibar, Chang’ombe and Iringa on the same date. Joining instructions and admission letters should be collected at the UDSM Mwalimu J.K. Nyerere Main Campus, IMS, DUCE and MUCE depending on where one is admitted.\r\n\r\n***Please click the link below to view selected applicants to join various postgraduate programmes for the 2015/2016 academic year ***', '', NULL, '', '/study/postgraduate', '2017-07-24 22:11:32', 1, NULL, 'study'),
(7, 'international Studental', 'International Students', 'The Directorate of Post Graduate Studies (DPGS) formally replaced the School of Graduate Studies (DPGS) in 2009.\r\n\r\nThe former School was established in 2006, with the main functions as administering and coordinating postgraduate studies at the University of the Dar es Salaam (UDSM). In the past fifteen years the postgraduate students’ population increased from about 100 in 1993/1994 to about 2,607 in 2006/07.\r\n\r\nDuring the same period, postgraduate programmes increased from 48 to over 74.\r\n\r\nIn view of the rapid expansion of postgraduate programmes, coupled with the University restructuring programme, the UDSM Council at its 69th meeting approved the re-establishment of the Directorate of Post Graduate Studies (DPGS) and subsequently de-established the School of graduate Studies (SGS).\r\n\r\nThe DPGS has taken over all the functions of the SGS but with more responsibilities including providing the requisite environment for postgraduate studies and activities.\r\n\r\nHigher Degrees\r\n\r\nDoctor of Laws (LL.D.), Doctor of Literature (D.Lit.) and Doctor of Science (D.Sc.).\r\n\r\nThese degrees are retained as higher doctorates to be awarded in accordance with regulations relating to higher doctorates at the University of Dar es Salaam.', 'The Directorate of Post Graduate Studies (DPGS) formally replaced the School of Graduate Studies (DPGS) in 2009.\r\n\r\nThe former School was established in 2006, with the main functions as administering and coordinating postgraduate studies at the University of the Dar es Salaam (UDSM). In the past fifteen years the postgraduate students’ population increased from about 100 in 1993/1994 to about 2,607 in 2006/07.\r\n\r\nDuring the same period, postgraduate programmes increased from 48 to over 74.\r\n\r\nIn view of the rapid expansion of postgraduate programmes, coupled with the University restructuring programme, the UDSM Council at its 69th meeting approved the re-establishment of the Directorate of Post Graduate Studies (DPGS) and subsequently de-established the School of graduate Studies (SGS).\r\n\r\nThe DPGS has taken over all the functions of the SGS but with more responsibilities including providing the requisite environment for postgraduate studies and activities.\r\n\r\nHigher Degrees\r\n\r\nDoctor of Laws (LL.D.), Doctor of Literature (D.Lit.) and Doctor of Science (D.Sc.).\r\n\r\nThese degrees are retained as higher doctorates to be awarded in accordance with regulations relating to higher doctorates at the University of Dar es Salaam.', '', NULL, '', '/study/international', '2017-07-24 22:12:02', 1, NULL, 'study'),
(8, 'Research and Innovation', 'Research and Innovation', 'Directorate of Research is the key organ in coordination and publication of research activities at UDSM.\r\nRead more from the Directorates', 'Directorate of Research is the key organ in coordination and publication of research activities at UDSM.\r\nRead more from the Directorates', '', NULL, '', '/research', '2017-07-24 22:39:22', 1, NULL, ''),
(9, 'test Study Home page', 'Study Home ya Mfano', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', NULL, '', '/study', '2017-07-24 22:29:21', 1, NULL, '/study'),
(10, 'Exibitions', 'Maonyesho', 'The word event can have several meanings in different fields like:\r\n\r\nCulture and Social life\r\nScience and Mathematics\r\nIn technology\r\nIn philosophy  \r\nIn our case here, let us concentrate in the first field of Culture and Social Life where it refers to the following connotations as outlined below:\r\n\r\nFestival, for example a musical event\r\nCeremony, for example a marriage\r\nCompetition for example a sports competition\r\nParty for example a birthday party\r\nConvention meeting for example gaining convention.\r\nThe Office of the Dean of Students for this case tends to coordinate and organize some different events for UDSM community as follows:\r\n\r\nUDSM Sports Day:  This is an event which normally takes place around October each year\r\nWorkers’ sports and games; normally takes place around November each ear\r\nTUSA Games: starts from December\r\nInterfaculty sports and games competition: starts from May every year\r\nDARUSO General Elections:  This takes place every after 1 year, normally in March.\r\nDARUSO Leaders Induction Seminar; around April\r\nFirst Years Orientation week Programme; conducted every year from August - September.\r\nEXHIBITION:\r\nThe Dean of Students Office (DOSO) has only one Exhibition event which takes place normally from June to July every year in the Dar es Salaam International Trade Fair (DITF)  where DOSO  sells its day to day activities conducted by its units which are;\r\n\r\nCounseling Unit.\r\nGames and Sports unit.\r\nStudents Governance and Judicatory.\r\nCatering Health and Accommodation Unit.', 'The word event can have several meanings in different fields like:\r\n\r\nCulture and Social life\r\nScience and Mathematics\r\nIn technology\r\nIn philosophy  \r\nIn our case here, let us concentrate in the first field of Culture and Social Life where it refers to the following connotations as outlined below:\r\n\r\nFestival, for example a musical event\r\nCeremony, for example a marriage\r\nCompetition for example a sports competition\r\nParty for example a birthday party\r\nConvention meeting for example gaining convention.\r\nThe Office of the Dean of Students for this case tends to coordinate and organize some different events for UDSM community as follows:\r\n\r\nUDSM Sports Day:  This is an event which normally takes place around October each year\r\nWorkers’ sports and games; normally takes place around November each ear\r\nTUSA Games: starts from December\r\nInterfaculty sports and games competition: starts from May every year\r\nDARUSO General Elections:  This takes place every after 1 year, normally in March.\r\nDARUSO Leaders Induction Seminar; around April\r\nFirst Years Orientation week Programme; conducted every year from August - September.\r\nEXHIBITION:\r\nThe Dean of Students Office (DOSO) has only one Exhibition event which takes place normally from June to July every year in the Dar es Salaam International Trade Fair (DITF)  where DOSO  sells its day to day activities conducted by its units which are;\r\n\r\nCounseling Unit.\r\nGames and Sports unit.\r\nStudents Governance and Judicatory.\r\nCatering Health and Accommodation Unit.', '', NULL, '', '/public-service/exhibition', '2017-07-25 00:28:52', 1, NULL, '/public-service'),
(11, 'Campus Life', 'Maisha ya Kampasi', 'Dean of Students\' Office is incharge of all matters regarding students life at UDSM', 'Dean of Students\' Office is incharge of all matters regarding students life at UDSM', '', NULL, '', '/campus-life', '2017-07-25 00:34:05', 1, NULL, ''),
(12, 'Religious Life', 'Maisha ya Dini', 'Students and staff have complete freedom of worship. At present facilities are available for Christians and Moslems. Catholics have one Chaplain appointed by the Tanzania Episcopal Conference (TEC). They have Mass every Sunday at 6.15, 7.15 and 8.15 a.m. besides the daily Mass at 6.00 pm.\r\n\r\nLutherans and other Christian denominations have a Chaplain appointed by the Christian Council of Tanzania (CCT). Their services are held in the Chapel at 10.00 a.m. in Swahili. Also, they conduct Swahili services every Sunday at 7.00 a.m. in Lecture Theater2 and English services at 9.30 a.m.\r\n\r\nThe University Students Christian Fellowship (USCF) has meetings daily from 6.30 pm to 7.30 p.m. Monday to Friday and from 7.00 p.m. on Saturdays.\r\n\r\nActivities include Bible study, films, out-reach (to other colleges and places) and in reach i.e. room to room witnessing for Christ. There is also a staff and students Bible study group which meets in the Chapels seminar room at 6.00 p.m. every Tuesday. The Seventh Day Adventist meet every Saturday from 9.00 a.m. to 11.00 a.m. There are confirmation Classes for CCT on Saturdays at 10.00 a.m. and on Wednesdays at 4.00 p.m. in the Chapels seminar room.\r\n\r\nBaptisms and marriages are also arranged by the Chaplain, on request. Non-Catholics have Chapel Council for CCT which meets three times annually. A Joint Christian Committee (JCC) for TEC and CCT meets once a semester. A Joint Christian Chapel is situated opposite Hall No. 4 on Kilimahewa Road. It is administered by the Joint Chapel Committee composed of representatives of the TEC and CCT Councils. The University Christian Perspective which is the Christian voice or the campus is produced once a semester. This publication was initially a TEC initiative, but articles are now contributed by members of all Christian denominations. Religious articles and books are on sale every Sunday outside the chapel before and after mass.\r\n\r\nArticles sold include papers like Kiongozi and Mwenge; rosaries, medals and religious books. Other books dealing with social and psychological problems that students face in their everyday lives everywhere are among items that are also sold. There are Catechism classes for the children of the university staff and workers twice a week in the chapel.\r\n\r\nBaptisms are held on request every Sunday morning after the second Mass. Marriages are also arranged by Chaplains and celebrated either in the chapel or in one of the churches in town. The Chaplains are available for counseling in the Chaplains office No. 15 in the Faculty of Arts and Social Sciences or at the Chaplaincy, Kilimahewa House No. 4 for Catholics and Kilimahewa House No. 6 for non- Catholics. The Chaplains normally visit the sick in the University Health Centre. However, those who wish to see the Chaplain can request the nurse to contact him.', 'Students and staff have complete freedom of worship. At present facilities are available for Christians and Moslems. Catholics have one Chaplain appointed by the Tanzania Episcopal Conference (TEC). They have Mass every Sunday at 6.15, 7.15 and 8.15 a.m. besides the daily Mass at 6.00 pm.\r\n\r\nLutherans and other Christian denominations have a Chaplain appointed by the Christian Council of Tanzania (CCT). Their services are held in the Chapel at 10.00 a.m. in Swahili. Also, they conduct Swahili services every Sunday at 7.00 a.m. in Lecture Theater2 and English services at 9.30 a.m.\r\n\r\nThe University Students Christian Fellowship (USCF) has meetings daily from 6.30 pm to 7.30 p.m. Monday to Friday and from 7.00 p.m. on Saturdays.\r\n\r\nActivities include Bible study, films, out-reach (to other colleges and places) and in reach i.e. room to room witnessing for Christ. There is also a staff and students Bible study group which meets in the Chapels seminar room at 6.00 p.m. every Tuesday. The Seventh Day Adventist meet every Saturday from 9.00 a.m. to 11.00 a.m. There are confirmation Classes for CCT on Saturdays at 10.00 a.m. and on Wednesdays at 4.00 p.m. in the Chapels seminar room.\r\n\r\nBaptisms and marriages are also arranged by the Chaplain, on request. Non-Catholics have Chapel Council for CCT which meets three times annually. A Joint Christian Committee (JCC) for TEC and CCT meets once a semester. A Joint Christian Chapel is situated opposite Hall No. 4 on Kilimahewa Road. It is administered by the Joint Chapel Committee composed of representatives of the TEC and CCT Councils. The University Christian Perspective which is the Christian voice or the campus is produced once a semester. This publication was initially a TEC initiative, but articles are now contributed by members of all Christian denominations. Religious articles and books are on sale every Sunday outside the chapel before and after mass.\r\n\r\nArticles sold include papers like Kiongozi and Mwenge; rosaries, medals and religious books. Other books dealing with social and psychological problems that students face in their everyday lives everywhere are among items that are also sold. There are Catechism classes for the children of the university staff and workers twice a week in the chapel.\r\n\r\nBaptisms are held on request every Sunday morning after the second Mass. Marriages are also arranged by Chaplains and celebrated either in the chapel or in one of the churches in town. The Chaplains are available for counseling in the Chaplains office No. 15 in the Faculty of Arts and Social Sciences or at the Chaplaincy, Kilimahewa House No. 4 for Catholics and Kilimahewa House No. 6 for non- Catholics. The Chaplains normally visit the sick in the University Health Centre. However, those who wish to see the Chaplain can request the nurse to contact him.', '', NULL, '', '/campus-life/religious-life', '2017-07-25 00:36:15', 1, NULL, '/campus-life'),
(13, 'Student Organization', 'Student Organization', 'n order to up bring the students to be responsible for their own welfare and promote students governance it was necessary for the University of Dar es Salaam through its highest organ which is known as University Council to allow students to form various organizations for their own betterments.  This was also intended to teach students on social and political matters as well as economic and academic affairs practically by just being given advisory services or guidance from the Management through the Dean of Students Office.  Therefore, the Students’ Organizations of the University of Dar es Salaam are run by students themselves with high degrees of autonomy.The University Management can intervene only when it sees there is a situation which is endangering the peace and tranquility at the university.\r\nDefinition of Organization\r\nAn organization is defined as the group of people who form a business or a club together in order to achieve a particular aim.  From that point of view, any students’ organization at the University of Dar es Salaam should have a reasonable objectives and number of students who have common interests and goals to be achieved provided those interests and goals do not conflict with University Charter and Students By-Laws.  In this regard, for any students’ organization to operate in this University it should firstly present its constitution to the Dean of Students office for perusal and if it happens to have no any inconvenience, it should be officially registered, hence, legalized.\r\nTypes and Roles of Organizations at UDSM\r\nNormally there have been three main types of students’ organizations at UDSM\r\n\r\nGeneral Students Organization\r\nThis is known as Dar es Salaam University Students Organization and it is abbreviated as DARUSO.  Every student who is registered at this University is automatically a member of this organization.  DARUSO is structured by three main organs namely cabinet, University Students Representative Council (USRC) and DARUSO Board.\r\nThe cabinet comprises of President of DARUSO, His/her Vice President, Prime Minister and Ministers of various ministries.\r\nThe USRC comprises of all students representing their fellows from their classes, faculties and Halls or hostels.  Others are appointees by the USRC Speaker and the cabinet members are also included in USRC.\r\nDARUSO board is a quasi judicial organ which deals with disciplinary matters for DARUSO leaders.  It is formed by Faculty Chairpersons and Secretaries.\r\nThe role of the cabinet is to run the DARUSO government through its ministries which are formed by the President, Vice-president and Prime Minister.\r\nThe USRC has the roles of discussing matters concerning students and making final decisions and order the cabinet and DARUSO Board to implement.  But USRC decisions should not contradict with the prevailing documents such as University Charter and Students By-Laws.\r\nThe other types of organizations at UDSM are known as associations.  Most of these associations are academic oriented and are centred at faculty level.  For instance, there is DUPSA - Dar es Salaam University Political Science Association, DASUSO - Dar es Salaam University Sociology Organization just to mention a few.\r\nPreviously, there were regional associations for the University students who were hailing from a certain region or district or province.  But all those associations have been deregistered in order to discourage tribalism, regionalism and encourage nationalism.\r\n \r\n\r\nRules and By-Laws Governing the Organization at UDSM\r\nAll students’ organizations at UDSM have to adhere to the prevailing organs, Rules, and By-Laws.  The prevailing organs are such as University Council, University Senate, and Students Affairs Committee while the prevailing rules and By-Laws are University Acts, University Charter and University of Dar es Salaam Students By-Laws.\r\nDespite that, all students’ organizations are having their own Constitutions. Those constitutions should not violate neither prevailing organs nor rules and By-Laws.\r\nThrough students’ organizations at the University of Dar es Salaam, the students benefit from both practice of leadership, Democracy and Welfare.  The students also promote their knowledge on their specializations, hence, to become more competent theoretically and practically.\r\nAll students’ organizations at the University of Dar es Salaam should adhere to the rule of law and good governance by establishment and by running them.\r\nLastly, the action of abolishing the tribal, regional and provincial organizations shall enhance national unity and reduce nepotism.', 'n order to up bring the students to be responsible for their own welfare and promote students governance it was necessary for the University of Dar es Salaam through its highest organ which is known as University Council to allow students to form various organizations for their own betterments.  This was also intended to teach students on social and political matters as well as economic and academic affairs practically by just being given advisory services or guidance from the Management through the Dean of Students Office.  Therefore, the Students’ Organizations of the University of Dar es Salaam are run by students themselves with high degrees of autonomy.The University Management can intervene only when it sees there is a situation which is endangering the peace and tranquility at the university.\r\nDefinition of Organization\r\nAn organization is defined as the group of people who form a business or a club together in order to achieve a particular aim.  From that point of view, any students’ organization at the University of Dar es Salaam should have a reasonable objectives and number of students who have common interests and goals to be achieved provided those interests and goals do not conflict with University Charter and Students By-Laws.  In this regard, for any students’ organization to operate in this University it should firstly present its constitution to the Dean of Students office for perusal and if it happens to have no any inconvenience, it should be officially registered, hence, legalized.\r\nTypes and Roles of Organizations at UDSM\r\nNormally there have been three main types of students’ organizations at UDSM\r\n\r\nGeneral Students Organization\r\nThis is known as Dar es Salaam University Students Organization and it is abbreviated as DARUSO.  Every student who is registered at this University is automatically a member of this organization.  DARUSO is structured by three main organs namely cabinet, University Students Representative Council (USRC) and DARUSO Board.\r\nThe cabinet comprises of President of DARUSO, His/her Vice President, Prime Minister and Ministers of various ministries.\r\nThe USRC comprises of all students representing their fellows from their classes, faculties and Halls or hostels.  Others are appointees by the USRC Speaker and the cabinet members are also included in USRC.\r\nDARUSO board is a quasi judicial organ which deals with disciplinary matters for DARUSO leaders.  It is formed by Faculty Chairpersons and Secretaries.\r\nThe role of the cabinet is to run the DARUSO government through its ministries which are formed by the President, Vice-president and Prime Minister.\r\nThe USRC has the roles of discussing matters concerning students and making final decisions and order the cabinet and DARUSO Board to implement.  But USRC decisions should not contradict with the prevailing documents such as University Charter and Students By-Laws.\r\nThe other types of organizations at UDSM are known as associations.  Most of these associations are academic oriented and are centred at faculty level.  For instance, there is DUPSA - Dar es Salaam University Political Science Association, DASUSO - Dar es Salaam University Sociology Organization just to mention a few.\r\nPreviously, there were regional associations for the University students who were hailing from a certain region or district or province.  But all those associations have been deregistered in order to discourage tribalism, regionalism and encourage nationalism.\r\n \r\n\r\nRules and By-Laws Governing the Organization at UDSM\r\nAll students’ organizations at UDSM have to adhere to the prevailing organs, Rules, and By-Laws.  The prevailing organs are such as University Council, University Senate, and Students Affairs Committee while the prevailing rules and By-Laws are University Acts, University Charter and University of Dar es Salaam Students By-Laws.\r\nDespite that, all students’ organizations are having their own Constitutions. Those constitutions should not violate neither prevailing organs nor rules and By-Laws.\r\nThrough students’ organizations at the University of Dar es Salaam, the students benefit from both practice of leadership, Democracy and Welfare.  The students also promote their knowledge on their specializations, hence, to become more competent theoretically and practically.\r\nAll students’ organizations at the University of Dar es Salaam should adhere to the rule of law and good governance by establishment and by running them.\r\nLastly, the action of abolishing the tribal, regional and provincial organizations shall enhance national unity and reduce nepotism.', '', NULL, '', '/campus-life/student-organization', '2017-07-25 00:55:25', 1, NULL, '/campus-life'),
(14, 'Sporta & Games', 'Michezo Mbali mbali', 'One of the Greatest Greek Philosophers, Aristotle, argued that “means Sano en Corpore Sano”    Which he meant “Healthy mind in a health body”\r\nThe Games and Sports are the only paths which dominate in generating healthy minds which are very much required in academic Career.\r\nGames are those competitive sports or an activity which have rules and funny. Games e.g. Olympics Games, Commonwealth Games,  East Africa Challenge Cup, World University Games (FISU), All Africa University Games (FASU), East African University Games (EAUG), Tanzania University Sports Association Games(TUSA), Inter Faculty and University spots Day Games . Almost all the above mentioned Games/Competitions are mainly for University students.\r\nFOR WORKERS THESE ARE “MASHINDANO YA MASHIRIKA YA UMMA TANZANIA (SHIMMUTA), “MEI MOSI –“WORKERS DAY, Inter Department and University Games and Sports Day which aim at bringing together University Employees with their families.\r\nSPORTS are activities you do for pleasure using physical efforts or skill, this being done in a specified area following set rules.\r\nPLAYGROUNDS\r\nOur University being rich in playgrounds has six for Football, four for Netball,  four for Basketball, three for Volleyball, nine for Tennis, One Track & Field-Athletics, A  swimming pool and Indoor for Badminton, Table Tennis, Basketball and Aerobic training and a International Cricket ground. Most of them are located at the Main Campus\r\nUSE OF PLAY GROUNDS\r\nThey are meant for Students, University Employees and the Surrounding Community. They are also open for  hiring at low charges that are almost free.\r\nSPORTS, GAMES AND RECREATION UNIT.\r\nIf you want to play in an organized sports league or you just want to get away from the pressures of college life and social life\r\nGames and Sports Unit of our office is DEFINITELY for you. In collaboration with UDSM Academic Department of Physical Education, Sports and Culture (PESC), Dean of Students’ Office is committed to offering safe and quality recreational programs, facilities, and services to UDSM students, staff and family in order to foster personal growth. We are committed to promote healthy lifestyles in an environment that value, embrace, and enrich individual differences.\r\nADVANTAGES OF ONES INVOLVEMENT IN SPORTS ARE MANY.\r\nA few mentioned are:\r\n\r\n    Minimizing or eliminating completely chances of getting HIV-AIDS\r\n    Perpetuating Youth\r\n    Enabling one to spend economically\r\n    Eliminating or reducing chances of misbehaviour\r\n    Creating Friendship and Good relations\r\n    Enhancing Capability in academic affairs because practice makes perfect learning environment through Sports journeys/trips. Remember: A Healthy Mind in a Healthy Body!\r\nFor more information, contact Games Coach', 'One of the Greatest Greek Philosophers, Aristotle, argued that “means Sano en Corpore Sano”    Which he meant “Healthy mind in a health body”\r\nThe Games and Sports are the only paths which dominate in generating healthy minds which are very much required in academic Career.\r\nGames are those competitive sports or an activity which have rules and funny. Games e.g. Olympics Games, Commonwealth Games,  East Africa Challenge Cup, World University Games (FISU), All Africa University Games (FASU), East African University Games (EAUG), Tanzania University Sports Association Games(TUSA), Inter Faculty and University spots Day Games . Almost all the above mentioned Games/Competitions are mainly for University students.\r\nFOR WORKERS THESE ARE “MASHINDANO YA MASHIRIKA YA UMMA TANZANIA (SHIMMUTA), “MEI MOSI –“WORKERS DAY, Inter Department and University Games and Sports Day which aim at bringing together University Employees with their families.\r\nSPORTS are activities you do for pleasure using physical efforts or skill, this being done in a specified area following set rules.\r\nPLAYGROUNDS\r\nOur University being rich in playgrounds has six for Football, four for Netball,  four for Basketball, three for Volleyball, nine for Tennis, One Track & Field-Athletics, A  swimming pool and Indoor for Badminton, Table Tennis, Basketball and Aerobic training and a International Cricket ground. Most of them are located at the Main Campus\r\nUSE OF PLAY GROUNDS\r\nThey are meant for Students, University Employees and the Surrounding Community. They are also open for  hiring at low charges that are almost free.\r\nSPORTS, GAMES AND RECREATION UNIT.\r\nIf you want to play in an organized sports league or you just want to get away from the pressures of college life and social life\r\nGames and Sports Unit of our office is DEFINITELY for you. In collaboration with UDSM Academic Department of Physical Education, Sports and Culture (PESC), Dean of Students’ Office is committed to offering safe and quality recreational programs, facilities, and services to UDSM students, staff and family in order to foster personal growth. We are committed to promote healthy lifestyles in an environment that value, embrace, and enrich individual differences.\r\nADVANTAGES OF ONES INVOLVEMENT IN SPORTS ARE MANY.\r\nA few mentioned are:\r\n\r\n    Minimizing or eliminating completely chances of getting HIV-AIDS\r\n    Perpetuating Youth\r\n    Enabling one to spend economically\r\n    Eliminating or reducing chances of misbehaviour\r\n    Creating Friendship and Good relations\r\n    Enhancing Capability in academic affairs because practice makes perfect learning environment through Sports journeys/trips. Remember: A Healthy Mind in a Healthy Body!\r\nFor more information, contact Games Coach', '', NULL, '', '/campus-life/sports-and-games', '2017-07-25 00:56:13', 1, NULL, '/campus-life');
INSERT INTO `tbl_basic_page` (`PageId`, `PageTitleEn`, `PageTitleSw`, `DescriptionEn`, `DescriptionSw`, `Attachment`, `Photo`, `EmbededVideo`, `PageSeoUrl`, `DateCreated`, `Status`, `UnitID`, `SectionLink`) VALUES
(15, 'Convocation', 'convocation', 'The Convocation of the University of Dar es Salaam was established under the University of Dar es Salaam Act No. 12 of 1970, charged with functions as summarized below: Maintaining a Convocation roll of the names of all persons who are members of the Convocation, namely senior officers of the University past and present, all academic staff - past and present - , current senior administrative staff, and all alumni of the University, including those of its predecessor University of East Africa as long as those graduates of the former University of East Africa are residents in Tanzania; Discussing any matter within the sphere and competence of the University; and Maintaining dialogue with the government on matters of social, economic and other concern to the welfare of the public.\r\n\r\nComposition\r\nThe University of Dar es salaam Convocation comprises the\r\n\r\nVice-Chancellor,\r\nthe Deputy Vice Chancellor (Academics),\r\nall members of the academic staff,\r\nall persons who are graduates of the University of East Africa,\r\nall persons who become graduates of the University of Dar es Salaam , and\r\nany such persons as the Chancellor may appoint as members of the Convocation.\r\nThe Deputy Vice Chancellor (Administration) is the Secretary to the Convocation. The Convocation is led by a President, who is elected by the members.\r\n\r\nThe Convocation has an Executive Committee which is the Executive Organ Chaired by the President. This committee is responsible for carrying out the main functions of the Convocation. The Vice-Chancellor, the Chief Academic Officer and the Chief Administrative Officer of the University are ex-officio members of the Executive Committee. Other members of the Executive Committee are elected every triennium, at an Annual General Meeting (AGM) or nominated in between the election years, by the President of the Convocation where the situation demands. The Executive Committee’s work is supported by sub-committees, precisely embodying an Activities Sub-Committee and a Publications Sub-Committee.\r\n\r\nThe Convocation Activities Committee acts as the think tank of the Convocation. It conceives the activities and programmes which the Convocation should undertake and reports to the Executive Committee.\r\n\r\nThe Convocation Publications Committee on the other hand, oversees all activities pertinent to publication and dissemination of the Convocation Newsletter, the Journal called Dar Graduate Journal, books arising from proceedings of workshops, symposia, etc.\r\n\r\nUniversity of Dar es Salaam Academic Staff Assembly is another Committee under the Convocation (UDASA). UDASA was established in August 1980 to provide a forum for members of the academic staff of the University of Dar es Salaam to collectively influence how the University of Dar es Salaam is governed as well as to act as the collective voice of the members of the academic staff on matters which impinged on their lives and work as academicians and as citizens and/or residents of Tanzania.\r\n \r\nThe Convocation has a full-time Liaison Officer employed by the University of Dar es salaam . The officer is responsible for the day to day affairs of the Convocation, ensuring that Convocation lives to the expectations of the members.\r\n', 'The Convocation of the University of Dar es Salaam was established under the University of Dar es Salaam Act No. 12 of 1970, charged with functions as summarized below: Maintaining a Convocation roll of the names of all persons who are members of the Convocation, namely senior officers of the University past and present, all academic staff - past and present - , current senior administrative staff, and all alumni of the University, including those of its predecessor University of East Africa as long as those graduates of the former University of East Africa are residents in Tanzania; Discussing any matter within the sphere and competence of the University; and Maintaining dialogue with the government on matters of social, economic and other concern to the welfare of the public.\r\n\r\nComposition\r\nThe University of Dar es salaam Convocation comprises the\r\n\r\nVice-Chancellor,\r\nthe Deputy Vice Chancellor (Academics),\r\nall members of the academic staff,\r\nall persons who are graduates of the University of East Africa,\r\nall persons who become graduates of the University of Dar es Salaam , and\r\nany such persons as the Chancellor may appoint as members of the Convocation.\r\nThe Deputy Vice Chancellor (Administration) is the Secretary to the Convocation. The Convocation is led by a President, who is elected by the members.\r\n\r\nThe Convocation has an Executive Committee which is the Executive Organ Chaired by the President. This committee is responsible for carrying out the main functions of the Convocation. The Vice-Chancellor, the Chief Academic Officer and the Chief Administrative Officer of the University are ex-officio members of the Executive Committee. Other members of the Executive Committee are elected every triennium, at an Annual General Meeting (AGM) or nominated in between the election years, by the President of the Convocation where the situation demands. The Executive Committee’s work is supported by sub-committees, precisely embodying an Activities Sub-Committee and a Publications Sub-Committee.\r\n\r\nThe Convocation Activities Committee acts as the think tank of the Convocation. It conceives the activities and programmes which the Convocation should undertake and reports to the Executive Committee.\r\n\r\nThe Convocation Publications Committee on the other hand, oversees all activities pertinent to publication and dissemination of the Convocation Newsletter, the Journal called Dar Graduate Journal, books arising from proceedings of workshops, symposia, etc.\r\n\r\nUniversity of Dar es Salaam Academic Staff Assembly is another Committee under the Convocation (UDASA). UDASA was established in August 1980 to provide a forum for members of the academic staff of the University of Dar es Salaam to collectively influence how the University of Dar es Salaam is governed as well as to act as the collective voice of the members of the academic staff on matters which impinged on their lives and work as academicians and as citizens and/or residents of Tanzania.\r\n \r\nThe Convocation has a full-time Liaison Officer employed by the University of Dar es salaam . The officer is responsible for the day to day affairs of the Convocation, ensuring that Convocation lives to the expectations of the members.\r\n', '', NULL, '', '/convocation', '2017-07-25 01:01:15', 1, NULL, ''),
(16, 'About COICT', 'Kuhusu COICT', 'The College of Information and Communication Technologies (CoICT) is amongst the core academic units of the University of Dar es Salaam (UDSM) main campus. CoICT was established by the council of the University of Dar es Salaam on January 27th 2011 by merging the former School of Informatics and Communication Technologies (SICT) with the Department of Electrical and Computer System Engineering (ECSE) which was under the College of Engineering and Technology (COET).', 'The College of Information and Communication Technologies (CoICT) is amongst the core academic units of the University of Dar es Salaam (UDSM) main campus. CoICT was established by the council of the University of Dar es Salaam on January 27th 2011 by merging the former School of Informatics and Communication Technologies (SICT) with the Department of Electrical and Computer System Engineering (ECSE) which was under the College of Engineering and Technology (COET).', NULL, 'UNIT3_asdsadasdas.png', NULL, '/college/coict/aboutus', '2017-09-19 22:30:35', 1, 4, '/college/coict'),
(17, 'ADMISSION', 'UDAHILI', 'ahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasd ahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasd ahas dasjd as nasdsa d as dsad sa d sa \r\n\r\ndsa as mdsa dasd sadsadasdahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasdahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasd', 'ahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasd ahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasd ahas \r\ndasjd as nasdsa d as dsad sa d sa \r\n\r\ndsa as mdsa dasd sadsadasdahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasdahas dasjd as nasdsa d as dsad sa d sa dsa as mdsa dasd sadsadasd', NULL, NULL, NULL, '/colleges/coict/admission', '2017-09-23 06:59:59', 1, 4, '/college/coict'),
(18, 'about us', 'About us', '<p>Web 2.0+ technology</p>\r\n\r\n<p>YII2 framework</p>\r\n\r\n<p>MVC design pattern (model View controller)</p>\r\n\r\n<p>Css,Js,Html</p>\r\n\r\n<p>MySQL</p>\r\n\r\n<p>&nbsp;Responsive content display design</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4 Major configuration areas in a wbsite</p>\r\n\r\n<p>DB (Location , webroot/config/db.php)</p>\r\n\r\n<p>Parameters (Location Webroot/config/params.php)</p>\r\n\r\n<p>Static content1</p>\r\n\r\n<p>Static content2</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Password 755</p>\r\n\r\n<p>Choose authentication type</p>\r\n\r\n<p>Configuration.php hili liko ndani ta fiked ofstudy ndilo upokea all thr changes</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Requirement</p>\r\n\r\n<p>Php 5.6, Apache webserver</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CONTENT MANAGEMENT</p>\r\n\r\n<p>www.udsm.ac.tz/new/web/index.php/backend</p>\r\n\r\n<p>Site configuration</p>\r\n\r\n<p>Manage users</p>\r\n\r\n<p>Academic units</p>\r\n\r\n<p>Custom block</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Web 2.0+ technology</p>\r\n\r\n<p>YII2 framework</p>\r\n\r\n<p>MVC design pattern (model View controller)</p>\r\n\r\n<p>Css,Js,Html</p>\r\n\r\n<p>MySQL</p>\r\n\r\n<p>&nbsp;Responsive content display design</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4 Major configuration areas in a wbsite</p>\r\n\r\n<p>DB (Location , webroot/config/db.php)</p>\r\n\r\n<p>Parameters (Location Webroot/config/params.php)</p>\r\n\r\n<p>Static content1</p>\r\n\r\n<p>Static content2</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Password 755</p>\r\n\r\n<p>Choose authentication type</p>\r\n\r\n<p>Configuration.php hili liko ndani ta fiked ofstudy ndilo upokea all thr changes</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Requirement</p>\r\n\r\n<p>Php 5.6, Apache webserver</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CONTENT MANAGEMENT</p>\r\n\r\n<p>www.udsm.ac.tz/new/web/index.php/backend</p>\r\n\r\n<p>Site configuration</p>\r\n\r\n<p>Manage users</p>\r\n\r\n<p>Academic units</p>\r\n\r\n<p>Custom block</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', NULL, '', 'https://www2.udsm.ac.tz/web/index.php/colleges/coet', '2017-10-19 12:59:14', 1, 5, 'http://www.coet.udsm.ac.tz/'),
(19, 'IT Services', 'IT Services', '<p>IT Services</p>\r\n', '<p>IT Services</p>\r\n', '', NULL, '', 'campus-life/itservices', '2017-10-19 14:07:58', 1, NULL, '/campus-life'),
(20, 'Trial', 'Jaribu', '<p>Let us now see</p>\r\n', '<p>Haya sasa ngoja tuone</p>\r\n', '', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ldOFSOt2RTA\" frameborder=\"0\" allowfullscreen></iframe>', 'test-page', '2017-10-19 14:02:07', 1, 2, ''),
(21, 'Institute of Kiswahili Studies', 'Taasisi ya Taaluma za Kiswahili', '<p>hjdaflahsdlfha</p>\r\n', '<p>jklasdhkfjha</p>\r\n', '', NULL, '', '/home', '2017-10-19 14:02:44', 1, 20, 'Institutes'),
(22, 'Contacts', 'Contacts', '<p>Postal Address&nbsp;<br />\r\nPO Box 35091&nbsp;<br />\r\nDar Es Salaam,</p>\r\n\r\n<p>Phone:&nbsp;</p>\r\n\r\n<p>email:</p>\r\n\r\n<p>website:</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Postal Address&nbsp;<br />\r\nPO Box 35091&nbsp;<br />\r\nDar Es Salaam,</p>\r\n\r\n<p>Phone:&nbsp;</p>\r\n\r\n<p>email:</p>\r\n\r\n<p>website:</p>\r\n', '', NULL, '', 'https://www.google.com/maps?q=dean+of+students+office+udsm&um=1&ie=UTF-8&sa=X&ved=0ahUKEwja57mO7fzWAhXIKMAKHYtADnEQ_AUICygC', '2017-10-19 14:04:30', 1, 27, '/'),
(23, 'About Us', 'About Us', '<p>The College of Natural and Applied Sciences was established in April, 2009, formally known as Faculty of Science established in 1965 and was among the oldest Faculties at the University of Dar es Salaam.</p>\r\n\r\n<p>Initially the Faculty comprised the Departments of Botany, Chemistry, Geology, Mathematics, Physics, and Zoology. After its establishment the main function of the Faculty of Science was to train science teachers for secondary schools and colleges, civil servants with a basic scientific knowledge and researchers for research institutes, most of which were at that time under the East African Community.</p>\r\n\r\n<p>The Faculty was also involved in training of staff for the University&#39;s staff development programme, although to a great extent advance training for this category of staff was mainly done abroad. During the academic Year 1999/2000, the Faculty has established the new Department of Computer Science.</p>\r\n\r\n<p>During the early 1970, a need was identified to train science graduates in water resource management and therefore a Hydrology Unit was established within the Faculty which started to produce graduates with B.Sc.(Hydrology) degrees. In no time, however, this programme was transferred to the new Faculty of Engineering.</p>\r\n\r\n<p>In the mid 1970s the Chemistry Department initiated an M.Sc. Programme in Applied Chemistry which ultimately gave birth to the Department of Chemical and Process Engineering in the Faculty of Engineering.</p>\r\n\r\n<p>Another degree programme which was established in early 1970s was a B.Sc. in Geology, this being offered by the newly established Department of Geology which was housed in the Department of Chemistry. In the same period various undergraduate and postgraduate teaching programmes were established by the faculty, with the aim to diversify the scientific training offered by the Faculty in relation to the national manpower requirements.</p>\r\n\r\n<p>The economic hardships which started to face Tanzania during the 1980s seriously affected the development of the Faculty of Science. Thus, beside the establishment of the Applied Microbiology Unit in the Department of Botany, no other major scientific programs were initiated during this period. In the fields of research and consultancies the Faculty has been experiencing an unfavourable situation.</p>\r\n\r\n<p>The high financial resource inputs required for establishing research laboratories in science and the corresponding requirements for research student funding and consumable serially affects the development of scientific research in the Faculty of Science, especially geared towards research and development. Furthermore, the generally weak university/industry relations which are brought about by, among other things, the general weakness of the Tanzanian industrial sector and therefore lack of vision towards research and development. This situation also makes the capability of the Faculty in offering consultancy services to the Tanzanian socio-economic sector not to be fully utilized, especially in the fields of contracted research and R and D.</p>\r\n', '<p>The College of Natural and Applied Sciences was established in April, 2009, formally known as Faculty of Science established in 1965 and was among the oldest Faculties at the University of Dar es Salaam.</p>\r\n\r\n<p>Initially the Faculty comprised the Departments of Botany, Chemistry, Geology, Mathematics, Physics, and Zoology. After its establishment the main function of the Faculty of Science was to train science teachers for secondary schools and colleges, civil servants with a basic scientific knowledge and researchers for research institutes, most of which were at that time under the East African Community.</p>\r\n\r\n<p>The Faculty was also involved in training of staff for the University&#39;s staff development programme, although to a great extent advance training for this category of staff was mainly done abroad. During the academic Year 1999/2000, the Faculty has established the new Department of Computer Science.</p>\r\n\r\n<p>During the early 1970, a need was identified to train science graduates in water resource management and therefore a Hydrology Unit was established within the Faculty which started to produce graduates with B.Sc.(Hydrology) degrees. In no time, however, this programme was transferred to the new Faculty of Engineering.</p>\r\n\r\n<p>In the mid 1970s the Chemistry Department initiated an M.Sc. Programme in Applied Chemistry which ultimately gave birth to the Department of Chemical and Process Engineering in the Faculty of Engineering.</p>\r\n\r\n<p>Another degree programme which was established in early 1970s was a B.Sc. in Geology, this being offered by the newly established Department of Geology which was housed in the Department of Chemistry. In the same period various undergraduate and postgraduate teaching programmes were established by the faculty, with the aim to diversify the scientific training offered by the Faculty in relation to the national manpower requirements.</p>\r\n\r\n<p>The economic hardships which started to face Tanzania during the 1980s seriously affected the development of the Faculty of Science. Thus, beside the establishment of the Applied Microbiology Unit in the Department of Botany, no other major scientific programs were initiated during this period. In the fields of research and consultancies the Faculty has been experiencing an unfavourable situation.</p>\r\n\r\n<p>The high financial resource inputs required for establishing research laboratories in science and the corresponding requirements for research student funding and consumable serially affects the development of scientific research in the Faculty of Science, especially geared towards research and development. Furthermore, the generally weak university/industry relations which are brought about by, among other things, the general weakness of the Tanzanian industrial sector and therefore lack of vision towards research and development. This situation also makes the capability of the Faculty in offering consultancy services to the Tanzanian socio-economic sector not to be fully utilized, especially in the fields of contracted research and R and D.</p>\r\n', '', NULL, '', '/colleges/conas/about-us', '2017-10-19 14:10:10', 1, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `Id` int(11) NOT NULL,
  `ContactTitle` varchar(25) NOT NULL,
  `ContactTitleSw` varchar(25) NOT NULL,
  `Descriptions` text,
  `DescriptionsSw` text,
  `PhoneNo` varchar(255) NOT NULL,
  `FaxNo` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL,
  `PoBox` varchar(100) DEFAULT NULL,
  `StreetRegion` varchar(255) DEFAULT NULL,
  `GoogleMapCode` text,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all the contact information for all areas of the site';

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`Id`, `ContactTitle`, `ContactTitleSw`, `Descriptions`, `DescriptionsSw`, `PhoneNo`, `FaxNo`, `EmailAddress`, `PoBox`, `StreetRegion`, `GoogleMapCode`, `UnitID`, `Status`) VALUES
(3, 'Main Campus', '', 'UDSM directions Information here from Airport, City centre etc', NULL, '+255-22-2410509, +255-22-2410628', '+255-22-2410023', '', 'P.O. Box 35091, DAR ES SALAAM', 'Kinondoni', '                    <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15847.74214833829!2d39.20151466722825!3d-6.777700563404738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc5f6f7842c141a00!2sUniversity+of+Dar+Es+Salaam!5e0!3m2!1ssv!2sse!4v1483784775632\" width=\"100%\" height=\"330\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>\r\n', NULL, 1),
(4, 'Contact Information - CON', '', NULL, NULL, '+255787665443', '+255787665400', 'dvc@maanuzo', NULL, NULL, NULL, 4, 1),
(5, 'Institute of Marine Scien', 'Taasisi ya Sayansi Bahari', '', '', '255-24-2232128, 255-24-2230741', '255-24-2233050', 'director@ims.udsm.ac.tz', '668', 'Mizingani Road, Zanzibar', '', 23, 1),
(6, 'Our Contacts', 'Our Contacts', 'dds', 'sd', '+255', '+255', 'doso@udsm.ac.tz', '35091', 'Dar es salaam', 'https://www.google.com/maps/place/Dean+of+Students+Office,+Kilimahewa+Rd,+Dar+es+Salaam,+Tanzania/@-6.7769989,39.1999885,17z/data=!3m1!4b1!4m5!3m4!1s0x185c4ee4667f50af:0xef59f3c62cc51a8!8m2!3d-6.777046!4d39.2021869', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_blocks`
--

CREATE TABLE `tbl_custom_blocks` (
  `Id` int(11) NOT NULL,
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
  `BlockPlacementAreaRegion` varchar(10) NOT NULL COMMENT 'A place of the Page where the Block will be shown',
  `ShowOnPage` varchar(255) DEFAULT NULL COMMENT 'List of Pages Where this block will be shown at a specified region',
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_custom_blocks`
--

INSERT INTO `tbl_custom_blocks` (`Id`, `BlockUnitID`, `BlockType`, `BlockName`, `BlockTitleEn`, `BlockTitleSw`, `BlockDetailsEn`, `BlockDetailsSw`, `BlockIconPicture`, `BlockIconCSSClass`, `BlockIconVideo`, `LinkToPage`, `BlockPlacementAreaRegion`, `ShowOnPage`, `Status`) VALUES
(2, NULL, 1, 'ABOUT US BLOCK', 'ABOUT US', 'KUHUSU SIS', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre.\r\nIt was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges. ', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre.\r\nIt was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges. ', '', '', '', 'background', 'MT_FBC1', '0', 1),
(3, NULL, 1, 'CONTACT US BLOCK', 'CONTACT US', 'WASILIANA NASI', 'Postal Address <br/>\r\nPO Box 35091 <br/>\r\nDar Es Salaam,<br/> Tanzania\r\nCall Us: +255-22-2410509 or <br/>\r\n+255-22-2410628<br/>', 'Postal Address <br/>\r\nPO Box 35091 <br/>\r\nDar Es Salaam,<br/> Tanzania<br/>\r\nCall Us: +255-22-2410509 or <br/>\r\n+255-22-2410628', '', '', '', '', 'MT_FBC4', '0', 1),
(4, NULL, 1, 'Home Page Welcome Note Block', 'Welcome Note', 'Karibu UDSM', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.', '', NULL, '', NULL, '9', '', 0),
(5, NULL, 1, 'Welcome Note', 'Welcome Note', 'Ukaribisho', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.\r\n \r\nThe University has taken all reasonable steps to make sure that the information on this website about course content, structure, teaching facilities and staffing are accurate and up-to-date. Students are however warned that the demand for certain courses and the availability of staff and resources means that the University cannot guarantee that all courses featured in this website will necessarily be offered. Some courses may have to be withdrawn, or combined with others, or their content changed as resources dictate or permit.\r\n \r\nStudents and/or prospective students must therefore understand the needs or pressures for change and must also understand when the University expressly states that it shall not be held liable for any claim for damages (including economic damage) or costs(including legal costs) to any student who complains or takes legal action because the course s/he expected or wished to pursue has become unavailable or changed in content.\r\nHaving made this disclaimer, I hope you will find this website helpful and interesting. Should you not find what you are looking for, please let us know and we will try to help.\r\nWe warmly welcome you, if you are already here, and look forward to hearing from you if you have not yet decided.\r\n \r\nProf. Rwekaza S. Mukandala\r\nVice-Chancellor', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses.\r\n \r\nThe University of Dar es Salaam is a unique community of students and staff dedicated to bringing out the best in all its members. Our aim is to provide the best possible environment for teaching, learning research and public services, and our track record of success is well known in East Africa, Africa and the rest of the world. We will continue to ensure that your years at this University will be filled with excitement and experiences that you can treasure for a lifetime. We also recognize that the quality of student experiences derives from more than academic study. That is why the University encourages students to join and actively participate in activities of the Students. Union and use the various sports and recreational facilities available, e.g. swimming pool,cricket, athletics and soccer fields. The University of Dar es Salaam is also at the interface of national and international higher education innovations and initiatives.\r\n \r\nThe University has taken all reasonable steps to make sure that the information on this website about course content, structure, teaching facilities and staffing are accurate and up-to-date. Students are however warned that the demand for certain courses and the availability of staff and resources means that the University cannot guarantee that all courses featured in this website will necessarily be offered. Some courses may have to be withdrawn, or combined with others, or their content changed as resources dictate or permit.\r\n \r\nStudents and/or prospective students must therefore understand the needs or pressures for change and must also understand when the University expressly states that it shall not be held liable for any claim for damages (including economic damage) or costs(including legal costs) to any student who complains or takes legal action because the course s/he expected or wished to pursue has become unavailable or changed in content.\r\nHaving made this disclaimer, I hope you will find this website helpful and interesting. Should you not find what you are looking for, please let us know and we will try to help.\r\nWe warmly welcome you, if you are already here, and look forward to hearing from you if you have not yet decided.\r\n \r\nProf. Rwekaza S. Mukandala\r\nVice-Chancellor', NULL, 'fa  fa-graduation-cap   fa-5x', '', 'welcome', 'MT_CTR', '0', 1),
(6, NULL, 1, 'UNDERGRADUATE', 'UNDERGRADUATE', 'UNDERGRADUATE', 'enean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', 'enean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', '', '', '', 'study/undergraduate', 'MT_CBC1', '0', 1),
(7, NULL, 1, 'POSTGRADUATE', 'POSTGRADUATE', 'POSTGRADUATE', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', 'UDSM_BLOCK_POSTGRADUATE.jpg', '', '', 'study/postgraduate', 'MT_CBC2', '0', 1),
(8, NULL, 1, 'INTERNATIONAL STUDENTS', 'INTERNATIONAL STUDENTS', 'INTERNATIONAL STUDENTS', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus', 'ud5.jpg', '', '', 'study/international', 'MT_CBC3', '0', 1),
(9, NULL, 1, 'CONTINUING EDUCATION', 'CONTINUING EDUCATION', 'CONTINUING EDUCATION', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', 'ud2.jpg', '', '', 'study/continuing-education', 'MT_CBC4', '0', 1),
(10, NULL, 1, 'FiNANCIAL AIDS & SCHOLARSHIPS', 'FiNANCIAL AIDS/SCHOLARSHIPS', 'FiNANCIAL AIDS/SCHOLARSHIPS', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.', '', 'fa fa-graduation-cap fa-5x', '', 'study/financial-aid', 'MT_CBC1', '', 1),
(11, NULL, 1, 'Quality Assurance', 'Quality Assurance', 'Quality Assurance', 'Quality Assurance', 'Quality Assurance', '', 'fa-certificate', '', 'about/quality-assurance', 'MT_FTA', '0', 1),
(12, NULL, 1, 'Block Link to Alumni Portal', 'Alumni Portal', 'Alumni Portal', 'Alumni Portal', 'Alumni Portal', '', 'fa-graduation-cap', '', 'www.alumni.udsm.ac.tz', 'MT_FTA', '', 1),
(13, NULL, 1, 'Block Link to Library services', 'Library Services', 'Library Services', 'Libray services', 'Library Service', '', 'fa-book', '', 'library', 'MT_FTA', '', 1),
(14, 4, 1, 'ABOUT COLLEGE - COICT', 'ABOUT COICT', 'KUHUSU COICT', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus. Donec sollicitudin metus sit amet volutpat posuere. Vestibulum lacinia ex ut ex ultrices, ut malesuada erat accumsan. Vestibulum ut euismod orci. Phasellus elementum accumsan nunc sit amet vestibulum.', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus. Donec sollicitudin metus sit amet volutpat posuere. Vestibulum lacinia ex ut ex ultrices, ut malesuada erat accumsan. Vestibulum ut euismod orci. Phasellus elementum accumsan nunc sit amet vestibulum.', '', '', '', 'college/coict/aboutus', '141', '0', 1),
(15, 4, 1, 'Test Block College Footer', 'Test Block', 'Test Block', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre. It was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges.', 'The University of Dar es salaam is the oldest and biggest public university in Tanzania. It is situated on the western side of the city of Dar es salaam, occupying 1,625 acres on the observation hill, 13 kilometers from the city centre. It was established on 1st July 1970, through parliament act no. 12 of 1970 and all the enabling legal instruments of the constituent colleges.', '', '', '', '', '181', '', 1),
(16, 4, 1, 'tst custom block for college', 'About  COICT', 'Kuhusu COICT', 'jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd ', 'jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd  jasd asdjas asda  sadnas dsad  adsad  sad sad sad as d a da sd  asd ad  asd a sdnnmasd   asndas d asdmas d adsasd ', '', 'fa  fa-graduation-cap   fa-5x', '', '', '71', '0', 1),
(17, 4, 1, 'WELCOM COIST BLOCK FOR SLIDESHOW AREA', 'Welcome COICT', 'Karibu COICT', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses. ..', 'We are delighted that you have decided to undertake your tertiary studies at the University of Dar es Salaam or are considering to do so. This website describes the range of our courses and different activities done at the University which will give you a flavour of life in our various campuses. ..', '', '', '', 'college/coict/welcome', '61', '0', 1),
(18, 4, 1, 'COICT Undergraduate Custome Block', 'Undergraduate', 'Undergraduate', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectusAenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus', 'Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus', '', '', '', 'college/coict/undergraduate', '131', '0', 1),
(19, 4, 1, 'Postgraduate Block  for Home page', 'Postgraduate', 'Postgraduate', 'Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  herePostgraduate summary information  herePostgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  herePostgraduate summary information  herePostgraduate summary information  here', 'Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  herePostgraduate summary information  herePostgraduate summary information  herePostgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  here Postgraduate summary information  herePostgraduate summary information  herePostgraduate summary information  here', '', '', '', 'college/coict/postgraduate', '151', '0', 1),
(20, NULL, 2, 'tes block', '', '', 'asdsadasdasd', 'adasdasdasdsad', 'UDSM_BLOCK_.png', '', '', '', '112', '', 1),
(21, 5, 1, 'COET', 'COET NEWS', 'COET NEWS TO BE DISPLAYED', 'SDSGSDHHKJ4W6EYRR55TUJYVWEWRDTFGYHJWERTYUIASDFGHJ', 'SAAAAAAAAADF', 'UNIT_BLOCK_COET NEWS.jpg', '', '', '', 'CT_HCTR', '', 1),
(22, 5, 1, 'About us home page', 'Connect', 'Connect here', 'sdcs', 'rerd', 'UNIT_BLOCK_Connect.jpg', '', 'safi', '', 'CT_HSR', '', 1),
(23, 4, 1, 'COICT HOME PAGE ABOUT US BLOCK', 'WELCOME TO COICT', 'WELCOME TO COICT', 'The University of Dar es Salaam offers Bachelors, Masters, and Doctoral degrees, as well as Certification Programmes, to students from Tanzania and throughout the world . Our Programmes will enable you to rise to the top of your chosen profession.', 'The University of Dar es Salaam offers Bachelors, Masters, and Doctoral degrees, as well as Certification Programmes, to students from Tanzania and throughout the world . Our Programmes will enable you to rise to the top of your chosen profession.', NULL, 'fa-superpowers', '<div style=\"position:relative;height:0;padding-bottom:56.25%\"><iframe src=\"https://www.youtube.com/embed/TMY0iTcspNA?ecver=2\" width=\"640\" height=\"360\" frameborder=\"0\" style=\"position:absolute;width:100%;height:100%;left:0\" allowfullscreen></iframe></div>', '', 'CT_HSR', '', 1),
(24, 2, 1, 'Welcome', 'Welcome to DHRA', 'Welcome to DHRA', 'Bw Chebukati amesema anatarajia kukutana na mgombea wa chama tawala cha Jubilee Uhuru Kenyatta baadaye.\r\n\"Mkutano huo utafuatwa na mkutano wa pamoja wa wawili hao,\" ameandika kwenye Twitter.', 'Bw Chebukati amesema anatarajia kukutana na mgombea wa chama tawala cha Jubilee Uhuru Kenyatta baadaye.\r\n\"Mkutano huo utafuatwa na mkutano wa pamoja wa wawili hao,\" ameandika kwenye Twitter.', 'UNIT_BLOCK_Welcome to DHRA.jpg', 'fa-address-book', '', '', 'CT_HSR', '', 1),
(25, 22, 1, 'IRA HOME PAGE BLOCK', 'WELCOME TO IRA', 'WELCOME TO IRA', 'The Institute of Resource Assessment (IRA) is a multidisciplinary/interdisciplinary research institute dealing with issues related to natural resource assessment and environmental management in general including climate change adaptation and vulnerability assessments. During the last fifty years, the Institute of Resource Assessment, formerly Bureau of Resource Assessment and Land Use Planning (BRALUP) established in 1967, has acquired vast experience in developing integrated methodologies and techniques involving local communities in planning and management of natural resources for sustainable development.', 'The Institute of Resource Assessment (IRA) is a multidisciplinary/interdisciplinary research institute dealing with issues related to natural resource assessment and environmental management in general including climate change adaptation and vulnerability assessments. During the last fifty years, the Institute of Resource Assessment, formerly Bureau of Resource Assessment and Land Use Planning (BRALUP) established in 1967, has acquired vast experience in developing integrated methodologies and techniques involving local communities in planning and management of natural resources for sustainable development.', NULL, '', '', '', 'CT_HSR', '', 1),
(27, 27, 1, 'About us home page', 'Welcome to the Dean of Students Office', 'Welcome to the Dean of Students Office', 'ggh', 'gz', 'UNIT_BLOCK_Welcome to the Dean of Students Office.png', 'fa-arrows', '', 'http://www2.udsm.ac.tz/web/index.php/colleges/sohs', 'CT_HMM', '/', 1),
(28, 5, 2, 'Latest news', 'Latest news', 'Habari mpya', 'aroooooooooooooooooooooooooooooooooooooo', 'arooooooooooooooooooooooooooooooooooooooooooooo', NULL, '', '', '', 'CP_CTL', '', 1),
(29, 20, 1, 'tataki-mainWeb', 'Contents', 'Yaliyomo', 'jhsagDL', 'jdffy', NULL, '', '', '', 'CT_HSR', '', 2),
(30, 16, 1, 'aboutus manage block', 'welcome', 'karibu', 'The University of Dar es salaam offers various academic programmes leading to the award of certificates, diplomas, and degrees. A total of 4 Certificates, 3 Diplomas and 65 Undergraduate Degree Programmes are offered at various academic units of the University of Dar es Salaam these include Evening Study programmes designed to offer opportunities to mainly the working people although any interested person who have requisite entry qualifications can apply. One undergraduate distance learning study programme (Bachelor of Business Administration) has been designed to benefit those who merit University education but for some reasons are unable to attend regular classes at the University. The number of students admitted at the University of Dar es Salaam has been increasing steadily, from 14 in 1961 to 21,502 (13,641 male and 7,861 female) undergraduate degree and non-degree in the 2011/2012 academic year. Female students constitute 36.5% of all undergraduate students at the University of Dar es Salaam.', 'The University of Dar es salaam offers various academic programmes leading to the award of certificates, diplomas, and degrees. A total of 4 Certificates, 3 Diplomas and 65 Undergraduate Degree Programmes are offered at various academic units of the University of Dar es Salaam these include Evening Study programmes designed to offer opportunities to mainly the working people although any interested person who have requisite entry qualifications can apply. One undergraduate distance learning study programme (Bachelor of Business Administration) has been designed to benefit those who merit University education but for some reasons are unable to attend regular classes at the University. The number of students admitted at the University of Dar es Salaam has been increasing steadily, from 14 in 1961 to 21,502 (13,641 male and 7,861 female) undergraduate degree and non-degree in the 2011/2012 academic year. Female students constitute 36.5% of all undergraduate students at the University of Dar es Salaam.', 'UNIT_BLOCK_welcome.jpg', 'http://www2.udsm.ac.tz/web/index.php/campus/accomodation', '', '', 'CT_HSR', '', 1),
(31, 7, 1, 'UDBSMainRightSideBarBlock', 'About Us sisi UDBS', 'Maelezo yetu sisi UDBS', 'University of Dar es Salaam Business School (UDBS) is located at the University of Dar es Salaam (UDSM) main campus, about 13 km from City Centre. UDBS came into existence in 2008 as a result of transformation of the then Faculty of Commerce and Management (FCM) which was established in 1979. Measured by the strength of its staff in teaching, research and consultancy, plus the breadth and quality of undergraduate and postgraduate programmes and extensive training and consultancy programs in business, entrepreneurship and management, UDBS is one of the leading institutions in business and management research, teaching and consultancy in the Sub-Saharan region.\r\nThe UDBS manages four approved teaching and research departments, which are Accounting, Finance, General Management and Marketing.', 'Kiswahili chake ', 'UNIT_BLOCK_About Us sisi UDBS.jpg', '', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VlUtvYG9Ong\" frameborder=\"0\" allowfullscreen></iframe>', '', 'CT_HSR', '', 1),
(32, 17, 1, 'ABOUT US MAIN PAGE', 'About Us', 'About Us', 'The School of Journalism and Mass Communication is a teaching, and research School of the University of Dar es Salaam. it conducts training and offers consultancy on issues concerning Journalism and Mass Communication.', 'www.fontawesome.io/icons', NULL, '<i class=\"fa fa-envelope-open\" aria-hidden=\"true\"></i>', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/KP4iOCvtclU\" frameborder=\"0\" allowfullscreen></iframe>', '', 'CT_HSR', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `Id` int(11) NOT NULL,
  `DocumentType` int(1) NOT NULL COMMENT '1=Report,2=Books,3=Research Guideline',
  `DocumentNameEn` varchar(255) NOT NULL,
  `DocumentNameSw` varchar(255) NOT NULL,
  `DatePublished` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Attachment` varchar(255) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`Id`, `DocumentType`, `DocumentNameEn`, `DocumentNameSw`, `DatePublished`, `Attachment`, `UnitID`, `Status`) VALUES
(1, 4, 'Annual Report 2013/14', 'Ripoti ya Mwaka ya 2013/14', '2017-09-15 21:48:55', 'report_2013_14.pdf', NULL, 1),
(2, 4, 'Test Document', 'Test Document', '2017-09-15 21:49:55', 'aaaa.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EventUrl` varchar(255) NOT NULL,
  `EventTitleEn` varchar(255) NOT NULL,
  `EventTitleSw` varchar(255) NOT NULL,
  `DescriptionEn` text NOT NULL,
  `DescriptionSw` text NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime DEFAULT NULL,
  `Id` int(11) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Attachment` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `EventType` int(1) NOT NULL DEFAULT '0' COMMENT '0=General Public,1=Student,2=Staff',
  `DatePosted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`DateCreated`, `EventUrl`, `EventTitleEn`, `EventTitleSw`, `DescriptionEn`, `DescriptionSw`, `StartDate`, `EndDate`, `Id`, `UnitID`, `Attachment`, `Status`, `EventType`, `DatePosted`) VALUES
('2017-06-14 19:41:37', 'summer-school-training-for-postgraduate-students-(udiec)', 'summer school training for postgraduate students (udiec)', 'summer school training for postgraduate students (udiec)', 'The University of Dar es Salaam Innovation and Entrepreneurship Centre (UDIEC) in Collaboration with Trinity College Dublin (TCD), Ireland, will conduct a Three Weeks Training on Innovation and Entrepreneurship at the University of Dar es Salaam. The training will bring together 15 students from UDSM and 10 students from Ireland to provide interdisciplinary/ multidisciplinary platform for sharing expertise and experience in solving societal problem. ', 'The University of Dar es Salaam Innovation and Entrepreneurship Centre (UDIEC) in Collaboration with Trinity College Dublin (TCD), Ireland, will conduct a Three Weeks Training on Innovation and Entrepreneurship at the University of Dar es Salaam. The training will bring together 15 students from UDSM and 10 students from Ireland to provide interdisciplinary/ multidisciplinary platform for sharing expertise and experience in solving societal problem. ', '2017-06-14 22:41:37', NULL, 3, 4, '', 1, 0, '2017-06-18 14:29:42'),
('2017-07-13 21:07:16', 'university-of-dar-es-salaam-successfully-participated-in-the-\'41st-dar-es-salaam-international-trade-fair\'-july-2017-at-sabasaba-grounds.', 'university of dar es salaam successfully participated in the \'41st dar es salaam international trade fair\' july 2017 at sabasaba grounds.', 'university of dar es salaam successfully participated in the \'41st dar es salaam international trade fair\' july 2017 at sabasaba grounds.', 'University of Dar es Salaam (UDSM) successfully participated in the \'2017 Dar es Salaam International Trade Fair\' which was officially opened on 1st July 2017 at Sabasaba grounds. UDSM emerged the Overall Winners in this 41st Trade Fair owing to its innovative technology, and notably excelled in the categories of Research, Training, and Consultancy.', 'University of Dar es Salaam (UDSM) successfully participated in the \'2017 Dar es Salaam International Trade Fair\' which was officially opened on 1st July 2017 at Sabasaba grounds. UDSM emerged the Overall Winners in this 41st Trade Fair owing to its innovative technology, and notably excelled in the categories of Research, Training, and Consultancy.', '2017-07-01 00:00:00', NULL, 4, 4, '', 1, 0, '2017-07-13 21:08:05'),
('2017-07-13 22:34:33', 'second-season-china---tanzania-job-fair-opening-ceremony-held-at-udsm-on-17th-june-2017.', 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'second season china - tanzania job fair opening ceremony held at udsm on 17th june 2017.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', 'Second Season China - Tanzania Job Fair opening ceremony held at UDSM on 17th June 2017. The Guest of Honour was The Vice President of the United Republic of Tanzania, Hon. Samia Suluhu.', '2017-07-18 00:00:00', NULL, 5, 4, '', 1, 0, '2017-07-13 22:36:44'),
('2017-08-05 22:11:52', 'sadasdasd sa dsad asd asd as sa ad as d asd', 'sadasdasd sa dsad asd asd as sa ad as d asd', 'sadasdasd sa dsad asd asd as sa ad as d asd', 'sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd', 'sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd sadasdasd sa dsad asd asd as sa ad as d asd', '2017-08-06 00:00:00', NULL, 6, 4, NULL, 1, 0, '2017-08-06 00:00:00'),
('2017-08-12 13:58:36', 'asdasdsadsadsad', 'asdasdsadsadsad', 'asdsadasd', '<p>asdsadsadsadsad d a das dsadsa &nbsp;dasdsadsadsa dsa</p>\r\n', '<p>a sdsa dasdsadas &nbsp;sad sadasdasd</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 5, '', 1, 0, '2017-08-12 13:58:36'),
('2017-08-17 00:38:14', 'asdasdsadas-d-sd-asdd-d-asd-asd', 'asdasdsadas d sd asdd d asd asd', 'asdasdsadas d sd asdd d asd asd', '<p>asdasdsadas d sd asdd d asd asd&nbsp;asdasdsadas d sd asdd d asd asd&nbsp;asdasdsadas d sd asdd d asd asd&nbsp;asdasdsadas d sd asdd d asd asd&nbsp;</p>\r\n', '<p>asdasdsadas d sd asdd d asd asd&nbsp;asdasdsadas d sd asdd d asd asd&nbsp;asdasdsadas d sd asdd d asd asd&nbsp;asdasdsadas d sd asdd d asd asd&nbsp;</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, NULL, NULL, 1, 0, '2017-08-17 00:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `Id` int(11) NOT NULL,
  `QuestionEN` text NOT NULL,
  `QuestionSw` text NOT NULL,
  `AnswerEn` text NOT NULL,
  `AnswerSw` text NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_photo`
--

CREATE TABLE `tbl_gallery_photo` (
  `Id` int(11) NOT NULL,
  `PhotoDetails` varchar(255) DEFAULT NULL,
  `PhotoLink` varchar(255) NOT NULL,
  `ParentGroupID` int(11) NOT NULL,
  `ParentType` int(11) NOT NULL COMMENT '0=>PhotoGallery,1=>News,2=>Events'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadership`
--

CREATE TABLE `tbl_leadership` (
  `Id` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `LNames` varchar(255) NOT NULL,
  `PositionEn` varchar(100) NOT NULL,
  `PositionSw` varchar(100) NOT NULL,
  `SummaryEn` text,
  `SummarySw` text,
  `ListOrder` int(3) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all staffs';

--
-- Dumping data for table `tbl_leadership`
--

INSERT INTO `tbl_leadership` (`Id`, `Photo`, `FName`, `LNames`, `PositionEn`, `PositionSw`, `SummaryEn`, `SummarySw`, `ListOrder`, `Status`) VALUES
(1, '', 'Amani', 'Jumanne Amani', 'Seniour Lecturer, Dept Compu Science', '', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '4', 6, 1),
(3, 'chancellor.jpg', 'Jakaya', 'Mrisho Kikwete', 'Chancelor', 'Mkuu wa Chuo', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.', 1, 1),
(4, 'vc.jpg', 'Rwekaza', 'Mkandara', 'Deputy Vice Chancellor', 'Mkuu wa Chuo Msaidizi ', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE `tbl_logins` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IpAddress` varchar(100) NOT NULL,
  `Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_logins`
--

INSERT INTO `tbl_logins` (`Id`, `UserId`, `DateCreated`, `IpAddress`, `Details`) VALUES
(1, 6, '2017-07-24 23:44:25', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(2, 6, '2017-07-24 23:44:56', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(3, 6, '2017-07-24 23:52:50', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(4, 6, '2017-07-24 23:53:44', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(5, 6, '2017-07-24 23:54:22', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(6, 6, '2017-07-24 23:54:56', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(7, 1, '2017-07-24 23:55:15', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(8, 1, '2017-07-24 23:57:24', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(9, 1, '2017-07-24 23:57:36', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(10, 6, '2017-07-25 00:26:50', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(11, 1, '2017-07-25 00:40:59', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(12, 1, '2017-07-25 00:54:05', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(13, 1, '2017-07-25 01:12:34', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(14, 1, '2017-07-25 01:14:24', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(15, 1, '2017-07-25 01:17:22', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(16, 1, '2017-07-25 01:39:10', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(17, 1, '2017-07-31 13:16:45', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(18, 1, '2017-08-02 16:03:29', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(19, 1, '2017-08-02 16:04:19', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(20, 1, '2017-08-02 16:07:54', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(21, 1, '2017-08-02 16:08:06', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(22, 1, '2017-08-02 16:36:53', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(23, 1, '2017-08-02 16:37:03', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(24, 1, '2017-08-02 16:37:22', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(25, 1, '2017-08-02 16:40:28', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(26, 1, '2017-08-02 16:52:06', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(27, 1, '2017-08-02 16:52:26', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(28, 1, '2017-08-02 16:53:46', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(29, 1, '2017-08-02 18:37:32', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(30, 1, '2017-08-03 16:24:46', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(31, 1, '2017-08-03 16:25:05', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(32, 6, '2017-08-03 16:37:55', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(33, 6, '2017-08-03 16:41:04', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(34, 6, '2017-08-03 16:42:33', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(35, 6, '2017-08-03 16:42:53', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(36, 6, '2017-08-03 16:49:46', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(37, 6, '2017-08-03 17:00:11', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(38, 1, '2017-08-03 23:35:32', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(39, 1, '2017-08-03 23:36:05', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(40, 1, '2017-08-03 23:38:18', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(41, 1, '2017-08-03 23:38:53', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(42, 1, '2017-08-04 00:02:23', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(43, 6, '2017-08-05 20:24:52', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(44, 1, '2017-08-05 20:25:21', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(45, 1, '2017-08-06 06:09:29', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(46, 1, '2017-08-06 06:48:38', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(47, 1, '2017-08-08 08:25:25', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(48, 1, '2017-08-08 17:15:35', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(49, 1, '2017-08-08 17:42:01', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(50, 1, '2017-08-08 17:42:17', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(51, 1, '2017-08-08 17:54:21', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(52, 1, '2017-08-08 17:54:33', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(53, 6, '2017-08-08 17:54:50', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(54, 6, '2017-08-08 17:55:13', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(55, 6, '2017-08-08 17:59:58', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(56, 6, '2017-08-08 19:29:45', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(57, 1, '2017-08-08 19:30:05', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(58, 6, '2017-08-08 19:54:30', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(59, 7, '2017-08-08 21:12:19', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(60, 7, '2017-08-08 21:12:39', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(61, 7, '2017-08-08 21:13:42', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(62, 7, '2017-08-08 21:23:18', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(63, 1, '2017-08-12 09:06:04', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(64, 1, '2017-08-12 13:41:25', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(65, 6, '2017-08-12 13:51:41', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(66, 1, '2017-08-12 14:20:41', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(67, 1, '2017-08-12 14:51:43', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(68, 1, '2017-08-12 14:58:15', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(69, 1, '2017-08-12 14:58:23', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(70, 1, '2017-08-12 15:00:02', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(71, 1, '2017-08-12 15:00:46', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(72, 1, '2017-08-12 15:01:02', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(73, 6, '2017-08-12 15:01:09', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(74, 6, '2017-08-12 15:01:34', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(75, 1, '2017-08-12 15:01:41', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(76, 1, '2017-08-12 15:02:20', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(77, 1, '2017-08-12 15:02:27', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(78, 1, '2017-08-12 15:04:36', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(79, 1, '2017-08-12 15:04:51', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(80, 1, '2017-08-12 15:06:18', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(81, 1, '2017-08-12 15:06:26', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(82, 1, '2017-08-12 15:19:36', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(83, 1, '2017-08-12 15:19:45', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(84, 1, '2017-08-12 15:20:27', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(85, 1, '2017-08-12 15:20:35', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(86, 1, '2017-08-12 15:20:47', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(87, 1, '2017-08-12 15:21:07', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(88, 1, '2017-08-12 15:24:23', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(89, 1, '2017-08-12 15:24:32', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(90, 1, '2017-08-12 15:25:47', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(91, 1, '2017-08-12 15:25:53', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(92, 1, '2017-08-12 15:34:03', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(93, 1, '2017-08-12 15:34:13', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(94, 1, '2017-08-12 15:34:32', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(95, 1, '2017-08-12 15:35:20', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(96, 6, '2017-08-12 15:42:42', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(97, 1, '2017-08-12 15:44:06', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(98, 1, '2017-08-12 15:48:49', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(99, 1, '2017-08-12 15:49:07', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(100, 1, '2017-08-12 15:49:27', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(101, 1, '2017-08-14 18:59:54', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(102, 1, '2017-08-14 19:40:56', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(103, 1, '2017-08-14 19:41:37', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(104, 1, '2017-08-14 19:43:24', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(105, 1, '2017-08-14 20:23:08', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(106, 1, '2017-08-16 19:34:40', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(107, 1, '2017-08-16 22:31:39', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(108, 1, '2017-08-19 08:09:40', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(109, 1, '2017-08-19 08:24:47', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(110, 1, '2017-08-19 08:25:29', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(111, 6, '2017-08-19 08:38:17', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(112, 6, '2017-08-19 08:39:12', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(113, 1, '2017-08-19 08:41:49', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(114, 6, '2017-08-19 08:55:09', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(115, 6, '2017-08-19 08:55:26', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(116, 8, '2017-08-19 08:56:03', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(117, 8, '2017-08-19 08:57:28', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(118, 1, '2017-08-19 09:40:03', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(119, 1, '2017-08-19 09:42:26', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(120, 1, '2017-08-19 09:43:02', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(121, 1, '2017-08-19 09:43:58', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(122, 1, '2017-08-19 09:44:09', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(123, 1, '2017-08-19 09:46:00', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(124, 1, '2017-08-19 09:46:10', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(125, 1, '2017-09-01 08:20:18', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(126, 1, '2017-09-01 08:21:07', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(127, 1, '2017-09-17 19:50:48', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(128, 1, '2017-09-17 19:57:28', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(129, 1, '2017-09-17 19:57:40', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(130, 1, '2017-09-17 19:58:19', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(131, 1, '2017-09-17 20:00:37', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(132, 1, '2017-09-17 20:08:37', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(133, 1, '2017-09-17 20:09:06', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(134, 1, '2017-09-17 20:18:38', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(135, 1, '2017-09-17 20:18:57', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(136, 1, '2017-09-17 20:19:06', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(137, 1, '2017-09-17 20:19:30', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(138, 1, '2017-09-17 20:19:44', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(139, 1, '2017-09-17 20:19:59', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(140, 1, '2017-09-17 20:40:11', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(141, 1, '2017-09-17 20:40:28', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(142, 1, '2017-09-17 20:41:27', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(143, 1, '2017-09-17 20:52:37', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(144, 1, '2017-09-17 20:52:53', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(145, 1, '2017-09-23 07:13:06', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(146, 1, '2017-09-23 07:17:53', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(147, 1, '2017-09-24 11:13:32', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(148, 9, '2017-09-24 11:14:22', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(149, 9, '2017-09-24 11:47:25', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(150, 10, '2017-09-24 11:48:56', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(151, 10, '2017-09-24 11:51:58', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(152, 10, '2017-09-24 11:53:17', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(153, 10, '2017-09-24 11:53:46', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(154, 10, '2017-09-24 11:59:03', '127.0.0.1', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(155, 1, '2017-09-24 12:01:24', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(156, 1, '2017-09-24 12:02:03', '127.0.0.1', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(157, 10, '2017-09-24 12:02:23', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(158, 10, '2017-09-24 12:02:51', '127.0.0.1', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(159, 1, '2017-09-24 12:03:00', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(160, 1, '2017-09-24 12:11:57', '127.0.0.1', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(161, 1, '2017-09-24 12:38:58', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(162, 1, '2017-09-24 12:54:28', '127.0.0.1', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(163, 1, '2017-09-24 12:54:37', '127.0.0.1', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(164, 1, '2017-09-24 12:54:43', '127.0.0.1', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(165, 1, '2017-10-11 22:08:34', '197.250.224.67', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(166, 1, '2017-10-11 22:09:16', '197.250.224.67', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(167, 9, '2017-10-11 22:09:21', '197.250.224.67', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(168, 9, '2017-10-11 22:09:23', '197.250.224.67', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(169, 9, '2017-10-11 22:10:42', '197.250.224.67', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(170, 9, '2017-10-11 22:12:04', '197.250.224.67', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(171, 10, '2017-10-11 22:12:08', '197.250.224.67', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(172, 10, '2017-10-11 22:12:10', '197.250.224.67', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(173, 1, '2017-10-12 19:13:00', '197.250.224.24', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(174, 1, '2017-10-12 19:22:04', '197.250.224.24', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(175, 1, '2017-10-12 19:46:01', '197.250.224.24', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(176, 1, '2017-10-12 20:58:30', '197.250.224.24', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(177, 32, '2017-10-12 20:58:33', '197.250.224.24', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(178, 32, '2017-10-12 21:00:30', '197.250.224.24', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(179, 1, '2017-10-13 06:56:55', '196.44.161.107', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(180, 1, '2017-10-13 06:58:41', '196.44.161.107', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(181, 1, '2017-10-13 09:05:48', '196.44.161.107', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(182, 11, '2017-10-14 10:46:38', '197.250.97.197', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(183, 11, '2017-10-14 10:47:34', '197.250.97.197', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(184, 1, '2017-10-15 22:45:13', '197.250.97.197', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(185, 1, '2017-10-15 22:45:41', '197.250.97.197', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(186, 12, '2017-10-15 22:45:45', '197.250.97.197', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(187, 12, '2017-10-15 22:45:59', '197.250.97.197', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(188, 15, '2017-10-15 22:46:02', '197.250.97.197', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(189, 15, '2017-10-15 22:47:16', '197.250.97.197', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(190, 1, '2017-10-15 22:47:22', '197.250.97.197', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(203, 1, '2017-10-15 23:21:54', '197.250.97.197', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(204, 1, '2017-10-16 07:08:40', '196.44.162.32', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(205, 1, '2017-10-16 07:16:21', '196.44.162.32', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(206, 1, '2017-10-16 10:29:21', '197.250.225.38', 'User logged into the system successful using browser :-Mozilla/5.0 (Linux; Android 7.0; TECNO Camon CX Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mobile Safari/537.36'),
(207, 1, '2017-10-16 10:33:19', '66.249.93.205', 'User logged out the system successful using browser :- Mozilla/5.0 (Linux; Android 7.0; TECNO Camon CX Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mobile Safari/537.36'),
(208, 1, '2017-10-16 12:32:38', '41.86.164.177', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(209, 1, '2017-10-16 12:38:18', '196.44.162.32', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(210, 1, '2017-10-16 12:38:24', '196.44.162.32', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(211, 1, '2017-10-16 12:38:37', '196.44.162.32', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(212, 1, '2017-10-16 12:38:44', '196.44.162.32', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(213, 1, '2017-10-16 12:38:53', '196.44.162.32', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(214, 1, '2017-10-16 12:38:55', '196.44.162.32', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(215, 1, '2017-10-16 17:48:31', '197.186.153.115', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(216, 1, '2017-10-17 06:44:25', '41.86.164.15', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(217, 1, '2017-10-17 06:47:13', '41.86.164.15', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(218, 1, '2017-10-17 14:52:27', '41.86.164.15', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(219, 1, '2017-10-17 14:58:39', '41.86.166.51', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(220, 1, '2017-10-17 19:09:40', '197.250.225.158', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(221, 1, '2017-10-17 19:09:45', '197.250.225.158', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(222, 1, '2017-10-17 19:18:14', '197.250.225.158', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(223, 1, '2017-10-17 19:19:28', '197.250.225.158', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(224, 1, '2017-10-18 04:20:42', '197.250.227.201', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(225, 1, '2017-10-18 04:29:02', '197.250.227.201', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(226, 1, '2017-10-19 07:27:58', '197.250.100.75', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(227, 1, '2017-10-19 08:07:29', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36');
INSERT INTO `tbl_logins` (`Id`, `UserId`, `DateCreated`, `IpAddress`, `Details`) VALUES
(228, 1, '2017-10-19 08:11:32', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(229, 1, '2017-10-19 09:06:01', '197.250.100.75', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(230, 23, '2017-10-19 09:08:22', '41.59.81.31', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3086.0 Safari/537.36'),
(231, 13, '2017-10-19 09:08:23', '41.86.172.174', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(232, 1, '2017-10-19 09:08:26', '197.250.100.75', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(233, 34, '2017-10-19 09:08:28', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(234, 35, '2017-10-19 09:08:54', '197.250.228.34', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(235, 22, '2017-10-19 09:11:17', '41.86.172.200', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(236, 30, '2017-10-19 09:12:00', '41.86.172.211', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(237, 21, '2017-10-19 09:12:13', '41.86.172.214', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0'),
(238, 24, '2017-10-19 09:12:38', '41.86.172.242', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(239, 18, '2017-10-19 09:13:12', '41.86.172.172', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0'),
(240, 11, '2017-10-19 09:13:18', '197.250.99.204', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(241, 16, '2017-10-19 09:17:44', '41.86.175.192', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'),
(242, 29, '2017-10-19 09:22:48', '197.250.228.139', 'User logged into the system successful using browser :-Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.2.5 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.5'),
(243, 15, '2017-10-19 09:25:04', '41.86.172.176', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(244, 30, '2017-10-19 09:26:25', '197.250.100.75', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(245, 1, '2017-10-19 09:39:08', '41.86.172.251', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(246, 1, '2017-10-19 10:00:46', '41.86.172.251', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(247, 1, '2017-10-19 10:01:27', '41.86.172.251', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(248, 34, '2017-10-19 10:10:54', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(249, 34, '2017-10-19 10:10:59', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(250, 34, '2017-10-19 10:11:18', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(251, 16, '2017-10-19 10:11:31', '41.86.173.9', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'),
(252, 34, '2017-10-19 10:11:43', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(253, 34, '2017-10-19 10:11:54', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(254, 1, '2017-10-19 10:14:21', '197.250.100.75', 'User logged out the system successful using browser :- Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(255, 30, '2017-10-19 10:14:51', '197.250.100.75', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(256, 11, '2017-10-19 10:15:31', '197.250.99.204', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(257, 11, '2017-10-19 10:15:37', '197.250.99.204', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(258, 34, '2017-10-19 11:07:14', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(259, 34, '2017-10-19 11:07:48', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(260, 21, '2017-10-19 11:08:07', '41.86.172.214', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0'),
(261, 13, '2017-10-19 11:08:53', '41.222.180.179', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(262, 13, '2017-10-19 11:08:54', '41.222.180.179', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(263, 11, '2017-10-19 11:09:25', '41.86.173.28', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(264, 15, '2017-10-19 11:09:36', '41.86.172.176', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(265, 1, '2017-10-19 11:14:04', '41.86.172.251', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(266, 23, '2017-10-19 11:15:17', '41.59.81.10', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3086.0 Safari/537.36'),
(267, 1, '2017-10-19 11:17:15', '197.250.100.75', 'User logged into the system successful using browser :-Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36'),
(268, 24, '2017-10-19 11:17:51', '41.86.172.242', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(269, 35, '2017-10-19 11:19:00', '41.86.172.204', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(270, 34, '2017-10-19 11:19:20', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(271, 34, '2017-10-19 11:19:41', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(272, 30, '2017-10-19 11:20:07', '41.86.172.211', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:57.0) Gecko/20100101 Firefox/57.0'),
(273, 18, '2017-10-19 11:20:50', '197.250.100.75', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0'),
(274, 22, '2017-10-19 11:21:09', '41.86.172.200', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(275, 29, '2017-10-19 11:24:17', '41.86.173.3', 'User logged into the system successful using browser :-Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.2.5 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.5'),
(276, 16, '2017-10-19 11:27:58', '41.86.173.9', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'),
(277, 34, '2017-10-19 11:32:47', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(278, 1, '2017-10-19 11:32:56', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(279, 1, '2017-10-19 11:40:14', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(280, 34, '2017-10-19 11:40:25', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(281, 23, '2017-10-19 12:20:55', '41.59.81.10', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3086.0 Safari/537.36'),
(282, 30, '2017-10-19 12:22:11', '41.86.172.211', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; WOW64; rv:57.0) Gecko/20100101 Firefox/57.0'),
(283, 1, '2017-10-19 13:02:22', '41.86.172.251', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(284, 34, '2017-10-19 13:05:24', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(285, 1, '2017-10-19 13:05:32', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(286, 1, '2017-10-19 13:07:25', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(287, 34, '2017-10-19 13:07:41', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(288, 1, '2017-10-19 13:17:51', '41.86.172.251', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(289, 34, '2017-10-19 13:26:22', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(290, 1, '2017-10-19 13:26:31', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(291, 1, '2017-10-19 13:29:35', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(292, 34, '2017-10-19 13:29:51', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(293, 34, '2017-10-19 13:38:10', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(294, 1, '2017-10-19 13:38:19', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(295, 1, '2017-10-19 13:42:25', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(296, 34, '2017-10-19 13:42:38', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(297, 1, '2017-10-19 13:53:20', '41.86.172.251', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(298, 1, '2017-10-19 13:55:35', '41.86.172.251', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(299, 34, '2017-10-19 14:17:06', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(300, 1, '2017-10-19 14:17:13', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(301, 1, '2017-10-19 14:17:37', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(302, 34, '2017-10-19 14:17:45', '41.86.172.187', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(303, 34, '2017-10-19 14:19:14', '41.86.172.187', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.109 Safari/537.36'),
(304, 1, '2017-10-19 14:22:57', '41.86.172.251', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(305, 16, '2017-10-19 14:23:27', '41.86.173.9', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'),
(306, 16, '2017-10-19 16:19:55', '41.86.167.199', 'User logged into the system successful using browser :-Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0'),
(307, 16, '2017-10-19 16:23:26', '41.86.167.199', 'User logged out the system successful using browser :- Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `Id` int(11) NOT NULL,
  `MenuName` varchar(50) NOT NULL,
  `DisplayNameEn` varchar(100) DEFAULT NULL,
  `DisplayNameSw` varchar(100) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `MenuType` int(2) NOT NULL COMMENT '0=Main Menu,1=Side menu, 2=Other Menu',
  `UnitID` int(11) DEFAULT NULL,
  `ShowOnPage` varchar(300) DEFAULT '0' COMMENT '0=All Pages, >0 specific Page Of',
  `MenuPlacementAreaRegion` varchar(10) NOT NULL,
  `MenuCSSClass` varchar(100) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all the menus names in the website';

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`Id`, `MenuName`, `DisplayNameEn`, `DisplayNameSw`, `Description`, `MenuType`, `UnitID`, `ShowOnPage`, `MenuPlacementAreaRegion`, `MenuCSSClass`, `Status`) VALUES
(1, 'Website Main Menu', '', '', 'This is menu that contains all the Menu Items in the UDSM main site', 0, NULL, '0', 'MT_HMN', '', 1),
(2, 'Main Website  Top Right Menu', '', '', 'This menu is for the main Website  Top Right  area that shows the key areas about the UDSm struture', 2, NULL, '0', 'MT_HTR', '', 1),
(3, 'Quick Links', '', '', 'These are Quicklinks shown at the bottom of the Main website Footer columns', 2, NULL, '0', 'MT_FBC2', '', 1),
(4, 'Campus Life Items Menu', 'Campus Life', 'Maisha Ya Chuo', 'Campus Life Items Menu', 2, NULL, '0', 'MT_CHBR', 'fa fa-binoculars', 1),
(5, 'Main Website Home  Slide show Right  Menu Items', '', '', '', 2, NULL, '0', 'MT_HSR', '', 1),
(6, 'About Us Pages Side Menu', 'About US', 'Kuhusu sis', 'This menu represents the about us', 1, NULL, '/about-us/background, /about-us/vc-message', 'CP_CSM', '', 1),
(7, 'Study Pages Side Menu', 'Study Pages Side Menu', 'Study Pages Side Menu', '', 1, NULL, 'study,study/postgraduate', '112', '', 1),
(8, 'Main Menu - COICT', '', '', 'This is the mAin menu for the COICT website section', 0, 4, '0', 'CT_HMM', '', 1),
(9, 'COICT - QUICK LINKS MENU', 'QUICK LINKS', 'QUICK LINKS', '', 2, 4, '', '201', '', 1),
(10, 'COICT Home Page Quick Links', 'Quick Links', 'Kursa nyingine', 'test quick links', 2, 4, '0', '91', '', 1),
(11, 'COICT IMPORTANT AREA - SLIDESHOW', 'Quick Quide', 'Quick Quide', 'This is menu group that provide quick acccess to important information', 2, 4, '0', '61', '', 1),
(12, 'Main Menu', 'Main', 'Main', 'The main menu for the IMS homepage', 0, 23, '', 'CT_HMM', '', 1),
(13, 'About us', 'About us', 'Kuhusu sisi', 'About college', 0, 5, '', 'CT_HMM', '', 1),
(14, 'IDSmainmenu', 'Home', 'Home', '', 0, 21, '', 'CT_HMM', 'fa-home', 1),
(15, 'School of law main menu', 'menu', 'menu', '', 0, 16, 'about-us/background', 'MT_HMN', '', 0),
(17, 'SJMC Main Menu', 'Menus', 'Menu kuu', '', 0, 17, '', 'CT_HMM', '', 1),
(18, 'CoNAS Main Menu', 'Main Menu', 'Main Menu', '', 2, 8, '', 'CT_HMM', 'fa-bars', 1),
(19, 'DoS Main Menu', 'Menu', 'Menu', 'This is my main menu', 0, 27, '', 'CT_HMM', 'fa-home ', 1),
(20, 'IRA-MAIN-MENU', 'Home', 'Mwanzo', '', 0, 22, '', 'CT_HMM', '', 1),
(22, 'UdbsMainMenu', 'Main Menu', 'MenuMwanzo', 'Main home page link', 0, 7, '', 'CT_HMM', '<i class=\"fa fa-home\" aria-hidden=\"true\"></i>', 1),
(23, 'About', 'About us', '', '', 0, 5, '0', 'CT_HMM', '', 1),
(25, 'School of law menu', 'menu', 'law', '', 0, 16, '', 'MT_HMN', '', 0),
(26, 'Staff', 'Staff', 'Staff wety', 'Our staff', 0, 5, '1', 'CT_HMM', '', 1),
(27, 'Academic Programes', 'ccccc', 'Academic Programes', '', 0, 21, '', 'CT_HMM', '', 1),
(28, 'tataki1', 'Institute of Kiswahili Studies', 'Taasisi ya Taaluma za Kiswahili', 'Ni Taasisi iliyopo chini ya Chuo Kikuu cha Dar es salaam', 0, 20, '0', 'CT_HMM', 'tataki', 1),
(29, 'Main', 'Home', 'Home', 'The home for Administration', 0, 2, '0', 'CT_HMM', '', 1),
(30, 'Contact', 'Contacts', 'Anuani', '', 0, 5, '', 'CT_HMM', '', 1),
(31, 'Side Menu', 'Left Menu', 'Menu ya Kushoto', '', 1, 17, '', 'CT_HCTL', '', 1),
(32, 'law', 'quick links', 'quick links', '', 0, 16, '', 'MT_HMN', '', 1),
(33, 'Main2', 'About Us', 'About Us', 'About page', 0, 2, 'Home', 'CT_HMM', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_item`
--

CREATE TABLE `tbl_menu_item` (
  `Id` int(11) NOT NULL,
  `menuClasses` varchar(255) DEFAULT NULL,
  `MenuID` int(11) NOT NULL,
  `ItemNameEn` varchar(50) NOT NULL,
  `ItemNameSw` varchar(50) DEFAULT NULL,
  `LinkUrl` varchar(200) NOT NULL,
  `ParentItemID` int(2) NOT NULL DEFAULT '0' COMMENT '0= Parent Menu, >0 Child Menu',
  `ListOrder` int(2) NOT NULL COMMENT 'Order of the Menu Item In the list',
  `SectionID` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all links for a particular menu item';

--
-- Dumping data for table `tbl_menu_item`
--

INSERT INTO `tbl_menu_item` (`Id`, `menuClasses`, `MenuID`, `ItemNameEn`, `ItemNameSw`, `LinkUrl`, `ParentItemID`, `ListOrder`, `SectionID`, `Status`) VALUES
(2, NULL, 1, 'Home', 'Mwanzo', 'web/index.php', 0, 1, NULL, 1),
(3, NULL, 1, 'About UDSM', 'Kuhusu UDSM', 'about-us/background', 0, 2, NULL, 1),
(4, NULL, 1, 'Background', 'Utangulizi', 'about-us/background', 3, 1, NULL, 1),
(5, NULL, 1, 'Mission & Vision', 'Dhima & Dira', 'mission-vision', 3, 2, NULL, 1),
(6, NULL, 1, 'Academic Units', 'Vitengo vya Elimu', '/academic-units', 0, 3, NULL, 1),
(7, NULL, 1, 'Study', 'Soma', '/study', 0, 4, NULL, 1),
(8, NULL, 1, 'Research & Innovation', 'Tafiti na Ubunifu', '/research', 0, 5, NULL, 1),
(9, NULL, 1, 'Public Service', 'Huduma Kwa umma', '/public-service', 0, 6, NULL, 1),
(10, NULL, 1, 'Campus Life', 'Maisha ya Campus', '/campus-life', 0, 7, NULL, 1),
(11, NULL, 1, 'Convocation', 'Mkutano', '/convocation', 0, 8, NULL, 1),
(12, NULL, 1, 'Alumni Portal', ' Portal ya Alumni', 'http://alumni.udsm.ac.tz/', 0, 10, NULL, 1),
(15, NULL, 2, 'About Us', 'Kuhusu Sisi', 'about-us/background', 0, 1, NULL, 1),
(16, NULL, 2, 'Library', 'Maktaba', 'library', 0, 2, NULL, 1),
(17, NULL, 2, 'Contact Us', 'Wasiliana Nasi', 'contact-us', 0, 3, NULL, 1),
(18, NULL, 2, 'UDSM Directory', 'UDSM Saraka', 'udsm-directory', 0, 4, NULL, 0),
(19, NULL, 3, 'Guide to Visitor', 'Melekezo ya Wateja', '', 0, 0, NULL, 1),
(20, NULL, 3, '', 'Adminission', 'Usajili', 0, 2, NULL, 1),
(23, NULL, 3, 'Entry Requirements', 'Entry Requirements', '', 1, 11, NULL, 0),
(24, NULL, 3, 'Entry Requirements', 'Vigezzo vya Kujiunga', 'entry-requirement', 0, 3, NULL, 1),
(25, NULL, 3, 'Almanac 2017/2018', 'Almanac 2017/2018', 'almanac', 0, 4, NULL, 1),
(26, NULL, 3, 'Colleges & Schools', 'Vitivo & Shule', 'colleges', 0, 5, NULL, 1),
(27, NULL, 3, 'Undergraduate Programmes', 'Programu za shahada ya kwanza', 'study/programmes/undergraduate', 0, 7, NULL, 1),
(28, NULL, 3, 'Postgraduate Programmes', 'Progame za udhamili', 'study/programmes/undegraduate', 0, 8, NULL, 1),
(29, NULL, 3, 'IT Support', 'Msaada wa TEHAMA', 'ict-support', 0, 11, NULL, 1),
(30, NULL, 1, 'Leadership & Management', 'Uongozi & Utawala ', 'leadership', 3, 3, NULL, 1),
(31, NULL, 1, 'Quality Assurance', 'Udhibiti wa Ubora', 'quality-assurance', 3, 5, NULL, 1),
(34, NULL, 1, 'Annual Reports', 'Ripoti za mwaka', 'annual-reports', 3, 8, NULL, 1),
(35, NULL, 1, 'Corporate Social Responsibility', 'Ushiriki katika Mambo ya Jamii', 'csr', 3, 9, NULL, 1),
(36, '', 1, 'Fact and Figure', 'Ukweli na Taarifa', 'about-us/background/facts-and-figure', 3, 10, NULL, 1),
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
(51, NULL, 1, 'University Of Dar es Salaam Computing Centre (UCC)', 'University Of Dar es Salaam Computing Centre (UCC)', 'http://www.ucc.co.tz', 41, 2, NULL, 1),
(52, NULL, 1, 'Undergraduate', 'Undergraduate', 'study/undergraduate', 7, 1, NULL, 1),
(53, NULL, 1, 'Postgraduate', 'Postgraduate', 'study/postgraduate', 7, 2, NULL, 1),
(54, NULL, 1, 'International Students', 'International Students', 'study/international', 7, 3, NULL, 1),
(55, NULL, 1, 'Continuing Education', 'Continuing Education', 'study/continuing-education', 7, 4, NULL, 1),
(56, 'fa-home', 4, 'Accomodation', 'Malazi', 'campus/accomodation', 0, 1, NULL, 1),
(57, 'fa-lightbulb-o', 4, 'Clubs & Social', 'Clubs & Social', 'campus/clubs-and-social', 0, 2, NULL, 1),
(58, 'fa-medkit', 4, 'Halth Services', 'Huduma za Matibabu', 'campus/health-services', 0, 3, NULL, 1),
(59, 'fa-book', 5, 'Course Catalogue', 'Orodha ya Kozi', 'study/catalogue', 0, 1, NULL, 1),
(60, 'fa-globe', 5, 'International Programmes', 'Programu za Kimataifa', 'international', 0, 3, NULL, 1),
(61, 'fa-plug', 5, 'Connect with Us', 'Jiunge nasi', 'connect', 0, 2, NULL, 1),
(62, 'fa-graduation-cap', 5, 'Student\'s Corner', 'Corner ya Mwanafunzi', 'student-corner', 0, 5, NULL, 1),
(63, 'fa-user ', 5, 'Staff\'s corner', 'Kwa Wafanyakazi', 'staff-corner', 0, 6, NULL, 1),
(64, 'fa-info-circle', 5, 'Facts & Figures', 'Takwimu Mbalimbali', 'site/facts-and-figures', 0, 4, NULL, 1),
(65, '', 6, 'Background', 'Utangulizi', 'about-us/background', 0, 1, NULL, 1),
(66, '', 6, 'Mission & Vision', 'Dira & Dhima', 'about-us/mission-vision', 0, 2, NULL, 1),
(67, '', 6, 'Leadership & Administration', 'Uongozi na Utawala', 'about-us/leadership', 0, 3, NULL, 1),
(69, '', 6, 'Collaboration', 'Ushirikiano', 'about-us/collaboration', 0, 4, NULL, 1),
(70, '', 1, 'Collaborations', 'Ushirikiano', 'about-us/collaboration', 3, 6, NULL, 1),
(71, '', 1, 'Message From VC', 'Ujumbe kutoka kwa VC', 'about-us/vc-message', 3, 2, NULL, 1),
(72, '', 7, 'Undergraduate', 'Shahada ya kwanza', 'study/undergraduate', 0, 1, NULL, 1),
(73, '', 7, 'Postgraduate', 'Postgraduate', 'study/postgraduate', 0, 2, NULL, 1),
(74, '', 7, 'International Students', 'International Stuents', 'study/international', 0, 3, NULL, 1),
(75, '', 7, 'Financial Aid & Scholarships', 'Financial Aid & Scholarships', 'study/financial-aid', 0, 4, NULL, 1),
(76, '', 7, 'Continuing Education', 'Continuing Education', 'study/continuing-education', 0, 5, NULL, 1),
(77, '', 7, 'Non-Degree Programmes', 'Non-Degree Programmes', 'study/non-degree-programmes', 0, 7, NULL, 1),
(78, '', 7, 'Programmes', 'Programmes', '/study/programmes', 0, 6, NULL, 1),
(81, '', 1, 'Programmes', 'Programmes', 'study/programmes/undergraduate', 52, 4, NULL, 1),
(82, '', 1, 'Programmes', 'Programmes', 'study/programmes/postgraduate', 53, 4, NULL, 1),
(83, '', 1, 'Research', 'Utafiti', '/research', 8, 1, NULL, 1),
(84, '', 1, 'Publications', 'Machapisho', '/research/publications', 8, 2, NULL, 1),
(85, '', 1, 'Research Labs & Centers', 'Research Labs & Centers', '/research/labs', 8, 3, NULL, 1),
(86, '', 1, 'Research Repositories', 'Research Repositories', '/research/repositories', 8, 4, NULL, 1),
(87, '', 1, 'Our research', 'Tafiti zetu', '/research/our-reseach', 83, 1, NULL, 1),
(88, '', 1, 'Research Policies & Guidelines', 'Research Policies & Guidelines', '/research/policies', 83, 2, NULL, 1),
(89, '', 1, 'Publication Policies & Guidelines', 'Publication Policies & Guidelines', '/research/publications/policies', 84, 1, NULL, 1),
(90, '', 1, 'Journals', 'Journals', 'http://journals.udsm.ac.tz/', 84, 2, NULL, 1),
(91, '', 1, 'Books', 'Vitabu', '/research/publications/books', 84, 3, NULL, 1),
(92, '', 1, 'Consultancy', 'Consultancy', '/public-service/consultancy', 9, 1, NULL, 1),
(93, '', 1, 'Consultancy Bureau', 'Consultancy Bureau', '/public-service/consultancy/consultancy-bureau', 92, 1, NULL, 1),
(94, '', 1, 'Consultancy Policy & Guidelines', 'Consultancy Policy & Guidelines', '/public-service/consultancy/consultancy-policy-and-guidelines', 92, 2, NULL, 1),
(96, '', 1, 'Enteprenuership', 'Enteprenuership', '/public-service/enteprenuership', 9, 3, NULL, 1),
(97, '', 1, 'Exhibition', 'Exhibition', '/public-service/exhibition', 9, 3, NULL, 1),
(98, '', 1, 'Religious Life', 'Maisha ya Dini', '/campus-life/religious-life', 10, 1, NULL, 1),
(99, '', 1, 'Accomodation', 'Malazi', '/campus-life/accomodation', 10, 2, NULL, 1),
(100, '', 1, 'Health Services', 'Huduma za Afya', '/campus-life/health-services', 10, 3, NULL, 1),
(101, '', 1, 'Student Organization', 'Jumuiya ya Wanafunzi', '/campus-life/student-organization', 10, 4, NULL, 1),
(102, '', 1, 'Sports & Games', 'Michezo Mbali Mbali', '/campus-life/sports-and-games', 10, 5, NULL, 1),
(103, '', 1, 'Social Media', 'Mitandao ya Kijamii', '/connect/social-media', 13, 1, NULL, 1),
(108, '', 8, 'About College', 'Kuhusu CONAS', 'college/coict/aboutus', 0, 18, NULL, 1),
(109, '', 8, 'Programmes', 'Kozi Mbali mbali', 'college/coict/programmes', 0, 2, NULL, 1),
(110, '', 8, 'Department & Units', 'Idara &  Vitengo', 'college/connas/department-and-units', 0, 3, NULL, 1),
(111, '', 8, 'Research & Publications', 'Utafiti & Machapisho', 'college/coict/research-publication', 0, 4, NULL, 1),
(112, '', 8, 'Connect with Us', 'Jiunge Nasi', 'college/coict/connect', 0, 6, NULL, 1),
(114, '', 8, 'Undergraduate', 'Masomo ya Udhamivu', 'college/coict/programmes/undergraduate', 109, 1, NULL, 1),
(115, '', 8, 'Postgraduate', 'Masomo ya Shahada ya Udhamiri', 'college/coict/programmes/postgraduate', 109, 2, NULL, 1),
(116, '', 1, 'College of Natual and Applied Science', 'KItivo cha Sayansi Asilia', 'colleges/conas', 38, 3, NULL, 1),
(117, '', 9, 'Adminission', 'Udahiri', 'college/coict/adminsion', 0, 1, NULL, 1),
(118, '', 9, 'Entry Requirements', 'Vigezo vy Udahiri', 'college/coict/entry-requirements', 0, 2, NULL, 1),
(119, '', 9, 'Almanac 2017/18', 'Almanac 2017/18', 'almanac', 0, 3, NULL, 1),
(120, '', 9, 'Programmes', 'Kozi Mbali mbali', 'college/coict/programmes', 0, 4, NULL, 1),
(121, '', 10, 'Test link1', 'Link Jaribio 1', 'sdf', 0, 1, NULL, 1),
(122, '', 10, 'Test link 2', 'Test link 2', 'Test link 2', 0, 2, NULL, 1),
(123, '', 11, 'Admission Requirements', 'Taratibu za Kujiunga', 'colleges/coict/adminission', 0, 1, NULL, 1),
(124, '', 11, 'ARIS', 'ARIS', 'https://aris.udsm.ac.tz', 0, 3, NULL, 1),
(125, '', 11, 'Almanac', 'Almanac', 'almanac', 0, 2, NULL, 1),
(126, '', 1, 'AAAAABBa', 'AAAAABBa', 'about-us/background/about-us/background/', 3, 11, NULL, 1),
(128, '', 12, 'About IMS', 'Kuhusu TSB', 'http://ims.udsm.ac.tz/about', 0, 1, NULL, 1),
(129, '', 19, 'Home', 'Home', '/', 0, 1, NULL, 1),
(130, '', 18, 'Home', 'Nyumbani', '/', 0, 1, NULL, 1),
(132, '', 19, 'About Us', 'About Us', '/', 0, 2, NULL, 1),
(133, '', 1, 'Directorates', 'Directorates', 'http://undergraduate.udsm.ac.tz', 0, 3, NULL, 1),
(134, '', 17, 'Home', 'Nyumbani', '/', 0, 1, NULL, 1),
(135, 'fa-home', 20, 'Home', 'Mwanzo', '/', 0, 1, NULL, 1),
(136, '', 23, 'Home', 'Nyumbani', '/', 0, 1, NULL, 1),
(137, '', 22, 'Home', 'Mwanzo', '/', 0, 1, NULL, 1),
(139, '', 25, 'home', 'home', '/', 0, 1, NULL, 1),
(140, '', 14, 'Home', 'Home', '///', 140, 1, NULL, 1),
(141, '', 18, 'About Us', 'About Us', 'about-us', 0, 2, NULL, 1),
(142, '', 19, 'Counseling Services', 'Counseling Services', '/', 0, 3, NULL, 1),
(143, '', 19, 'Students Government ', 'Students Government ', '/', 0, 4, NULL, 1),
(144, '', 13, 'About coet', '', 'http://www.coet.udsm.ac.tz/', 0, 2, NULL, 1),
(145, '', 18, 'Staff Mail', 'Staff Mail', 'http://41.86.168.45/webmail', 0, 8, NULL, 1),
(146, '', 19, 'Health and Catering services', 'Health and Catering services', '/', 0, 5, NULL, 1),
(147, '', 19, 'Accommodation Services', 'Accommodation Services', 'http://www2.udsm.ac.tz/web/index.php/campus-life/accomodation', 0, 6, NULL, 1),
(148, '', 19, 'Staff', 'Staff', '/', 0, 7, NULL, 1),
(149, '', 19, 'Contact Us', 'Contact Us', '/', 0, 8, NULL, 1),
(150, '', 12, 'Sections', 'Sections', 'sections', 0, 2, NULL, 1),
(151, '', 1, 'Directorate of Undergraduate Studies', 'Directorate of Undergraduate Studies', 'http://undergraduate.udsm.ac.tz/http://undergraduate.udsm.ac.tz', 133, 5, NULL, 1),
(152, '', 12, 'Academics ', 'Taaluma', 'taaluma', 0, 3, NULL, 1),
(153, '', 20, 'About Us', 'About Us', 'About', 0, 2, NULL, 1),
(154, '', 17, 'Administration', 'Utawala', 'utawala', 0, 2, NULL, 1),
(155, '', 20, 'Academic', 'Academic', 'Academic', 0, 3, NULL, 1),
(156, '', 26, 'The staff', '', 'https://www2.udsm.ac.tz/web/index.php/colleges/coet', 0, 2, NULL, 1),
(157, '', 20, 'Research and Consultancy ', 'Research and Consultancy ', 'Research-and-Consultancy ', 0, 4, NULL, 1),
(158, '', 20, 'Reports', 'Reports', 'Reports', 0, 5, NULL, 1),
(159, '', 20, 'GIS laboratory ', 'GIS laboratory ', 'GIS laboratory ', 0, 6, NULL, 1),
(160, '', 20, 'Rufiji Basin', 'Rufiji Basin', 'http://ira.udsm.ac.tz/rufijibasin/', 0, 7, NULL, 1),
(161, '', 28, 'Home', 'Nyumbani', 'Institutes', 0, 3, NULL, 1),
(162, '', 4, 'ICT Services', 'Huduma Za TEHAMA', '#http://support.udsm.ac.tz/#http://support.udsm.ac.tz', 162, 6, NULL, 1),
(163, '', 17, 'Academic Staff', 'Waalim', 'utawala/academic', 154, 1, NULL, 1),
(164, '', 1, 'Directorate of Postgraduate Studies', 'Directorate of Postgraduate Studies', 'http://undergraduate.udsm.ac.tz/https://postgraduate.udsm.ac.tz', 133, 4, NULL, 1),
(165, '', 17, 'Administrative Staff', 'Watumishi wa utawala', 'utawala/administrative', 154, 2, NULL, 1),
(166, '', 1, 'Prospectus', 'Prospectus', 'http://undergraduate.udsm.ac.tz/http://undergraduate.udsm.ac.tz/#', 151, 1, NULL, 1),
(167, 'fa-desktop ', 4, 'IT Services', 'Huduma za TEHAMA', 'campus-life/itservices', 0, 5, NULL, 1),
(168, '', 12, 'Visitors', 'Wageni', 'wageni', 0, 4, NULL, 1),
(169, '', 12, 'Web Mail', 'Barua pepe', 'mail', 0, 5, NULL, 1),
(170, '', 22, 'Admission', 'Kujiunga', '#', 0, 2, NULL, 1),
(171, '', 30, 'Contacts', '', 'https://www2.udsm.ac.tz/web/index.php/colleges/coet', 0, 8, NULL, 1),
(172, '', 31, 'Mlimani Tv', 'Mlimani Tv', 'Mlimani', 0, 1, NULL, 1),
(173, '', 8, 'Department of Computer Science', 'Department of Computer Science', 'college/connas/department-and-units/#', 110, 1, NULL, 1),
(174, '', 8, 'Department of Electronics Science Communication', 'Department of Electronics Science Communication', 'college/connas/department-and-units/#', 110, 2, NULL, 1),
(175, '', 32, 'School of  Law', 'School of  Law', '#', 0, 1, NULL, 1),
(176, '', 8, 'Home', 'Home', '/', 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `Id` int(11) NOT NULL,
  `LinkUrl` varchar(255) NOT NULL,
  `TitleEn` varchar(255) NOT NULL,
  `TitleSw` varchar(255) DEFAULT NULL,
  `DetailsEn` text NOT NULL,
  `DetailsSw` text,
  `Attachment` varchar(200) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL COMMENT '0=>Saved, 1=Published, 2=>unpublished',
  `NewsType` int(1) NOT NULL DEFAULT '0' COMMENT '0=General Public,1=>Student,2=Staff',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`Id`, `LinkUrl`, `TitleEn`, `TitleSw`, `DetailsEn`, `DetailsSw`, `Attachment`, `Photo`, `UnitID`, `Status`, `NewsType`, `DateCreated`, `DatePosted`) VALUES
(1, 'test-test', 'test test', 'jaribu jaribu', '<p>wsf sjsa dsdasd a d asdkasd ad</p>\r\n', '<p>wsf sjsa dsdasd a d asdkasd ad</p>\r\n', NULL, NULL, 5, 1, 0, '0000-00-00 00:00:00', '2017-08-08 20:53:43'),
(5, 'test-new-2', 'test new 2', 'habari ya jaribio na 2', 'Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, NULL, NULL, 1, 2, '0000-00-00 00:00:00', '2017-07-13 23:50:50'),
(8, 'the-9th-mwalimu-nyerere-intellectual-festival,-held-at-the-university-of-dar-es-salaam,-nkrumah-hall,-13th---15th-june-2017', 'the 9th mwalimu nyerere intellectual festival, held at the university of dar es salaam, nkrumah hall, 13th - 15th june 2017', 'the 9th mwalimu nyerere intellectual festival, held at the university of dar es salaam, nkrumah hall, 13th - 15th june 2017', 'The 9th Mwalimu Nyerere Intellectual Festival, held at the University of Dar es Salaam, Nkrumah Hall, 13th - 15th June 2017. Theme: \"The POLITICIAN in the Rise and Fall of Africa\"', 'The 9th Mwalimu Nyerere Intellectual Festival, held at the University of Dar es Salaam, Nkrumah Hall, 13th - 15th June 2017. Theme: \"The POLITICIAN in the Rise and Fall of Africa\"', NULL, 'international', NULL, 1, 0, '2017-06-14 16:43:18', '2017-07-13 23:51:50'),
(9, 'asdshd-ashdahsd-kasdasd-sadsad-sadsad', 'asdshd           ashdahsd         kasdasd sadsad sadsad', 'asdshd           ashdahsd         kasdasd sadsad sadsad', '<p>asdshd ashdahsd kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd ashdahsd kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd ashdahsd kasdasd sadsad sadsad asdsa dsa d sad sa d s ad</p>\r\n\r\n<ul>\r\n	<li>asdasd asda das d &nbsp;d adn &nbsp; d sad &nbsp;asdsa d a d a d</li>\r\n	<li>sadsa &nbsp;asjdsa &nbsp;asjdsa &nbsp; asdj &nbsp;a sdjsajdsad</li>\r\n	<li>djasdj asjdsa &nbsp;asdj &nbsp;asdsadsadkd &nbsp;asd</li>\r\n</ul>\r\n', '<p>asdshd ashdahsd kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd ashdahsd kasdasd sadsad sadsad asdsa dsa d sad sa d s ad asdshd ashdahsd kasdasd sadsad sadsad asdsa dsa d sad sa d s ad</p>\r\n\r\n<ul>\r\n	<li>asdasd asda das d &nbsp;d adn &nbsp; d sad &nbsp;asdsa d a d a d</li>\r\n	<li>sadsa &nbsp;asjdsa &nbsp;asjdsa &nbsp; asdj &nbsp;a sdjsajdsad</li>\r\n	<li>djasdj asjdsa &nbsp;asdj &nbsp;asdsadsadkd &nbsp;asd</li>\r\n</ul>\r\n', NULL, NULL, 5, 1, 0, '2017-06-14 16:55:03', '2017-08-08 20:55:00'),
(10, 'what-is-lorem-ipsum?', 'what is lorem ipsum?', 'what is lorem ipsum?', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c', NULL, NULL, 4, 1, 0, '2017-06-17 13:42:55', NULL),
(11, 'asdasdasdsadsadsad-asdsadsadsa', 'asdasdasdsadsadsad  asdsadsadsa', 'asdasdasdsadsadsad  asdsadsadsa', '<p>umbea ulizidi</p>\r\n', '<p>umbea ulizidi</p>\r\n', 'UNIT2_asdasdasdsadsadsad  asdsadsadsa.xlsx', 'UNIT2_asdasdasdsadsadsad  asdsadsadsa.jpg', 2, 1, 0, '2017-08-14 22:07:01', '2017-10-19 14:16:58'),
(12, 'udsm-participated-in-the-12th-tanzania-commission-for-universities-(tcu)-exhibition', 'UDSM Participated in the 12th Tanzania Commission for Universities (TCU) Exhibition', 'UDSM Participated in the 12th Tanzania Commission for Universities (TCU) Exhibition', '<p>UDSM Participated in the 12th Tanzania Commission for Universities (TCU) ExhibitionUDSM Participated in the 12th Tanzania Commission for Universities (TCU) ExhibitionUDSM Participated in the 12th Tanzania Commission for Universities (TCU) ExhibitionUDSM Participated in the 12th Tanzania Commission for Universities (TCU) Exhibition</p>\r\n', '<p>UDSM Participated in the 12th Tanzania Commission for Universities (TCU) ExhibitionUDSM Participated in the 12th Tanzania Commission for Universities (TCU) ExhibitionUDSM Participated in the 12th Tanzania Commission for Universities (TCU) ExhibitionUDSM Participated in the 12th Tanzania Commission for Universities (TCU) Exhibition</p>\r\n', NULL, 'UDSM_UDSM Participated in the 12th Tanzania Commission for Universities (TCU) Exhibition.jpg', NULL, 1, 0, '2017-08-16 22:43:39', '2017-08-16 22:44:42'),
(13, 'aaa-bb-cc-dd-news', 'aaa bb cc dd news ', 'aaa bb cc dd news ', '<p>aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd</p>\r\n\r\n<p>news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;</p>\r\n\r\n<p>aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;</p>\r\n', '<p>aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd</p>\r\n\r\n<p>news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;</p>\r\n\r\n<p>aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>aaa bb cc dd news &nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news &nbsp;aaa bb cc dd news&nbsp;aaa bb cc dd news&nbsp;</p>\r\n', 'UNIT5_aaa bb cc dd news .docx', 'UNIT5_aaa bb cc dd news .jpg', 5, 1, 0, '2017-08-19 09:02:30', '2017-08-19 09:02:41'),
(14, 'launching-the-new-website', 'Launching the new website', 'Uzinduzi wa website', '<p>rgegrtuj7t8i</p>\r\n', '<p>ghnujkyujkygj</p>\r\n', NULL, 'UNIT5_Launching the new website.jpg', 5, 1, 0, '2017-10-19 10:05:21', '2017-10-19 10:05:21'),
(15, 'opeming', 'Opeming', 'Opening', '<p>We Open our University</p>\r\n', '<p>We Open our University</p>\r\n', NULL, 'UNIT2_Opeming.jpg', 2, 1, 0, '2017-10-19 14:06:34', '2017-10-19 14:06:34'),
(16, 'orientation-week', 'Orientation Week', 'Orientation Week', '<p>ssssssssssssssssssss</p>\r\n', '<p>eeeeeeeeeeeeeeee</p>\r\n', 'UNIT27_Orientation Week.doc', 'UNIT27_Orientation Week.png', 27, 1, 0, '2017-10-19 14:08:32', '2017-10-19 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programmes`
--

CREATE TABLE `tbl_programmes` (
  `Id` int(11) NOT NULL,
  `ProgrammeNameEn` varchar(100) NOT NULL,
  `ProgrammeNameSw` varchar(100) DEFAULT NULL,
  `ProgrammeUrl` varchar(100) DEFAULT NULL,
  `Duration` varchar(255) NOT NULL,
  `DurationSw` varchar(255) DEFAULT NULL,
  `DescriptionEn` text NOT NULL,
  `DescriptionSw` text,
  `UnitID` int(11) NOT NULL,
  `EntryRequirements` text,
  `EntryRequirementsSw` text,
  `ProgrammeType` int(2) NOT NULL,
  `FieldOfStudy` int(1) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all programes offers by different units/colleges';

--
-- Dumping data for table `tbl_programmes`
--

INSERT INTO `tbl_programmes` (`Id`, `ProgrammeNameEn`, `ProgrammeNameSw`, `ProgrammeUrl`, `Duration`, `DurationSw`, `DescriptionEn`, `DescriptionSw`, `UnitID`, `EntryRequirements`, `EntryRequirementsSw`, `ProgrammeType`, `FieldOfStudy`, `Status`, `DateCreated`) VALUES
(1, 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printin', 'asdasdsad', 'asdasdsad', '3 Years', 'Miaka 3', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nI', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nI', 3, 'Lorem Ipsum is simply dummy text of the printing a...	Lorem Ipsum is simply dummy text of the printing a...	', '', 3, 2, 1, '0000-00-00 00:00:00'),
(7, 'AA does it come from?', 'AA does it come from?', 'where-does-it-come-from', '3 years', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled ', '', 1, 0, 1, '2017-06-18 15:20:18'),
(9, 'df fsddddd', 'df fsddddd', 'dffsddddd', '', NULL, 'df fsddddddf fsddddddf fsddddddf fsddddddf fsddddd', 'df fsddddddf fsddddddf fsddddd', 3, 'df fsddddddf fsddddd', '', 1, 2, 1, '2017-07-21 21:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_research_projects`
--

CREATE TABLE `tbl_research_projects` (
  `Id` int(11) NOT NULL,
  `ProjectNameEn` varchar(255) NOT NULL,
  `ProjectNameSw` varchar(255) DEFAULT NULL,
  `ProjectLinkUrl` varchar(255) NOT NULL,
  `UnitID` int(11) NOT NULL,
  `DetailsEn` text NOT NULL,
  `DetailsSw` text,
  `Principal` varchar(50) DEFAULT NULL,
  `OtherResearcher` varchar(45) DEFAULT NULL,
  `FundingEn` varchar(255) DEFAULT NULL,
  `FundingSw` varchar(255) DEFAULT NULL,
  `StartYear` varchar(12) DEFAULT NULL,
  `EndYear` varchar(12) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `PageLinkUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps all the research Projects for a particular unit';

--
-- Dumping data for table `tbl_research_projects`
--

INSERT INTO `tbl_research_projects` (`Id`, `ProjectNameEn`, `ProjectNameSw`, `ProjectLinkUrl`, `UnitID`, `DetailsEn`, `DetailsSw`, `Principal`, `OtherResearcher`, `FundingEn`, `FundingSw`, `StartYear`, `EndYear`, `Status`, `PageLinkUrl`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industr', 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '', '', NULL, '', NULL, NULL, 1, 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industr'),
(2, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'the-standard-chunk-of-lorem-ipsum-used-since-the-1500s-is-reproduced-below-for-those-interested', 7, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Mr Charles Mhoka', 'The standard chunk of Lorem Ipsum used since ', NULL, '', '2011', '2019', 1, 'the-standard-chunk-of-lorem-ipsum-used-since-the-1500s-is-reproduced-below-for-those-interested');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `Id` int(11) NOT NULL,
  `SectionName` varchar(50) NOT NULL,
  `SectionPlacement` int(2) DEFAULT '0' COMMENT '0=Main website, 1=Collge,schools etc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of  content sections on the website';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide_shows`
--

CREATE TABLE `tbl_slide_shows` (
  `Id` int(11) NOT NULL,
  `TitleEn` varchar(120) NOT NULL,
  `TitleSw` varchar(120) DEFAULT NULL,
  `DetailsEn` varchar(400) DEFAULT NULL,
  `DetailsSw` varchar(400) DEFAULT NULL,
  `LinkToPage` varchar(100) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps information about different home page slide shows';

--
-- Dumping data for table `tbl_slide_shows`
--

INSERT INTO `tbl_slide_shows` (`Id`, `TitleEn`, `TitleSw`, `DetailsEn`, `DetailsSw`, `LinkToPage`, `Image`, `UnitID`, `DateCreated`, `DatePosted`, `Status`) VALUES
(1, 'werfwer vw wer werewrewr ewr', 'werfwer vw wer werewrewr ewr', '<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page</p>\r\n', '<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page</p>\r\n', '', 'UNIT4_werfwer vw wer werewrewr ewr.jpg', 4, '2017-08-14 21:29:39', NULL, 0),
(3, 't is a long established fact that a rea', 't is a long established fact that a rea', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page ', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page ', 'http://postgraduate.udsm.ac.tz/', 'img2.png', 4, '2017-08-04 01:43:09', '2017-06-18 14:19:17', 1),
(4, 'New UDSM library under construction', 'slide 3', 'Slide 3 Slide 3 Slide 3 Slide 3 Slide 3', 'Slide 3 Slide 3 Slide 3 Slide 3 Slide 3', 'study/international', 'ud6.jpg', NULL, '2017-07-16 12:49:05', '2017-07-16 12:03:55', 1),
(5, 'slide 1', 'slide 1', 'Slide 1 Slide 1 Slide 1Slide 1', 'Slide 1 Slide 1 Slide 1Slide 1', 'news', 'ud1.jpg', NULL, '2017-07-16 12:07:50', '2017-07-16 12:04:44', 1),
(6, 'international students at udsm', 'slide 2 slide 2 slide 2', 'Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2Slide 2 Slide 2 Slide 2', 'Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2', 'study/internalational', 'ud4.jpg', NULL, '2017-07-16 12:48:14', '2017-07-16 12:05:49', 1),
(7, 'university of dar es salaam successfully participated in the \'41st dar es salaam international trade fair\' july 2017 at ', 'university of dar es salaam successfully participated in the \'41st dar es salaam international trade fair\' july 2017 at ', 'University of Dar es Salaam (UDSM) successfully participated in the \'2017 Dar es Salaam International Trade Fair\' which was officially opened on 1st July 2017 at Sabasaba grounds. UDSM emerged the Overall Winners in this 41st Trade Fair owing to its innovative technology, and notably excelled in the categories of Research, Training, and Consultancy.', 'University of Dar es Salaam (UDSM) successfully participated in the \'2017 Dar es Salaam International Trade Fair\' which was officially opened on 1st July 2017 at Sabasaba grounds. UDSM emerged the Overall Winners in this 41st Trade Fair owing to its innovative technology, and notably excelled in the categories of Research, Training, and Consultancy.', 'test link', 'Photo11.jpg', NULL, '2017-07-16 13:11:32', '2017-07-16 13:09:16', 1),
(8, 'university of dar es salaam graduation ceremony 2017', 'sherehe za mahafali ya chuo kikuu cha dar-es-salaam 2017', 'wfww wrwer ewr', 'we rew rewr ewr', 'page/udsm-graduation', 'Graduation.jpg', NULL, '2017-07-16 13:22:17', '2017-07-16 13:22:05', 1),
(15, 'kiswahilikiswahili kiswahilikiswahili', 'kiswahilikiswahili kiswahilikiswahili', '', '', '', 'UDSM_kiswahilikiswahili kiswahilikiswahili.jpg', NULL, '2017-08-14 20:07:21', '2017-08-14 20:07:21', 1),
(17, 'charles mhoja', 'charles mhoja', '', '', '', 'UDSM_charles mhoja.jpg', NULL, '2017-08-14 21:01:41', '2017-08-14 21:01:41', 1),
(18, 'workshop events', 'matukio ya mkutano', '<p>This comes from our big meeting at Silver Sands</p>\r\n', '<p>Haya ni ya mkutano wetu mkubwa wa Silver Sands</p>\r\n', '', 'UNIT2_workshop events.png', 2, '2017-10-18 04:26:53', '2017-10-18 04:26:52', 1),
(19, 'students leadership', 'students leadership', '<p><img alt=\"\" src=\"E:\\Photoz\" style=\"float:left; height:600px; width:900px\" /></p>\r\n', '', '/', 'UNIT27_students leadership.png', 27, '2017-10-19 13:18:18', '2017-10-19 13:18:18', 1),
(20, 'main slide', 'slaidi kuu', '', '', '', 'UNIT23_main slide.png', 23, '2017-10-19 13:18:33', '2017-10-19 13:18:33', 1),
(21, 'mabibo hostel', 'mabibo hostel', '', '', '/', 'UNIT27_mabibo hostel.png', 27, '2017-10-19 13:19:34', '2017-10-19 13:19:34', 1),
(22, 'magufuli hostels', 'magufuli hostels', '', '', '/', 'UNIT27_magufuli hostels.png', 27, '2017-10-19 13:20:11', NULL, 0),
(23, 'magufuli hostels', 'magufuli hostels', '', '', '/', 'UNIT27_magufuli hostels.png', 27, '2017-10-19 13:20:11', NULL, 0),
(24, 'magufuli hostels', 'magufuli hostels', '', '', '/', 'UNIT27_magufuli hostels.png', 27, '2017-10-19 13:20:18', '2017-10-19 13:20:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_media_accounts`
--

CREATE TABLE `tbl_social_media_accounts` (
  `Id` int(11) NOT NULL,
  `AccountType` int(2) NOT NULL COMMENT '1=Fbook,2=tritter,3=LinkedIn,4=Youtube',
  `AccountName` varchar(200) NOT NULL,
  `AccountAddress` varchar(255) NOT NULL,
  `AccountLogoClass` varchar(20) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of social media accounts';

--
-- Dumping data for table `tbl_social_media_accounts`
--

INSERT INTO `tbl_social_media_accounts` (`Id`, `AccountType`, `AccountName`, `AccountAddress`, `AccountLogoClass`, `UnitID`, `Status`) VALUES
(1, 1, 'Facebook', 'https://www.facebook.com/udsm.alumni', 'fa fa-facebook', NULL, 1),
(2, 2, 'Twitter', 'https://twitter.com/UdsmAlumni', 'fa fa-twitter', NULL, 1),
(3, 3, 'LinkedIn', 'https://www.linkedin.com/edu/school?id=17507', 'fa fa-linkedin', NULL, 1),
(4, 4, 'Youtube', 'https://www.youtube.com/results?search_query=udsm', 'fa fa-youtube', NULL, 1),
(5, 5, 'Instagram', '', 'fa fa-instagram', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_list`
--

CREATE TABLE `tbl_staff_list` (
  `Id` int(11) NOT NULL,
  `FName` varchar(45) NOT NULL,
  `LName` varchar(45) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `EducationSw` varchar(255) NOT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `PositionSw` varchar(100) DEFAULT NULL,
  `Summary` text,
  `SummarySw` text,
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of all staffs';

--
-- Dumping data for table `tbl_staff_list`
--

INSERT INTO `tbl_staff_list` (`Id`, `FName`, `LName`, `Education`, `EducationSw`, `Position`, `PositionSw`, `Summary`, `SummarySw`, `UnitID`, `Status`) VALUES
(1, 'Ng\'eno', 'Kissambu', 'Bachelors of Technology in Computer Engineering', 'Bachelors of Technology in Computer Engineering', 'Systems Adminisitrator I', 'Systems Adminisitrator I', '', '', 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` int(2) NOT NULL COMMENT '1=Adminstrator, 2=Content Admin',
  `UnitID` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps a list of users';

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id`, `FName`, `LName`, `EmailAddress`, `UserName`, `Password`, `UserType`, `UnitID`, `Status`) VALUES
(1, 'Charles', 'Mhoja', NULL, 'admin', 'a55568307a801f7df4339742f728a508f8338a7d', 1, NULL, 1),
(6, 'Amani', 'Amani', NULL, 'amani', '43a03e2d84df4ee1491f6ec2150e8c16d540efd6', 2, 5, 1),
(11, 'Bakari ', 'Rashid', 'rashid@admin.udsm.ac.tz', 'rashid@admin.udsm.ac.tz', '3fac30803ce236ff6c4b93ca66d9b66538617056', 1, NULL, 1),
(12, 'Aklan ', 'M. Majalliwa', 'majaliwa@admin.udsm.ac.tz', 'majaliwa@admin.udsm.ac.tz', '02201be67ddf4a141ab2ed48c558fe295402862b', 1, NULL, 1),
(13, 'Charles ', 'N. Tarimo', 'charles@udsm.ac.tz', 'charles@udsm.ac.tz', '68f3772487359cbc21dd762b8224b3c9bea885dd', 1, NULL, 1),
(14, 'Bugota', 'Saganda', 'bugotas@udsm.ac.tz', 'bugotas@udsm.ac.tz', 'f02b97851620613ca52021c6db3a1246a08434c4', 1, 4, 1),
(15, 'Fanuel', 'Hume', 'fanuelhume@udsm.ac.tz', 'fanuelhume@udsm.ac.tz', '6f57fc3f5ab85061120f0f4ca19f95c0265157ef', 1, 17, 1),
(16, 'Hilal ', 'Seif', 'seifh@udsm.ac.tz', 'seifh@udsm.ac.tz', 'f5250363455d9f68440b09b3d19b7f1eb627a9b3', 1, 10, 1),
(17, 'Maximillian ', 'Makungu', 'maxmakungu@udsm.ac.tz', 'maxmakungu@udsm.ac.tz', 'c7f954a1db448fe6d74927dc8333f63bafd39a1f', 1, 4, 1),
(18, 'Perpetua ', 'John', 'pjohn@udsm.ac.tz', 'pjohn@udsm.ac.tz', '839c30fb7f2c103205c1b940e0652511dd54f796', 1, 5, 1),
(19, 'Godfrey', 'Kayumbo', 'kayumbo@udsm.ac.tz', 'kayumbo@udsm.ac.tz', '9fe4eecdd5e089f4f9a29a136e4826ba9676b326', 1, 5, 1),
(20, 'Deogratius', 'Fuli', 'fuli@science.udsm.ac.tz', 'fuli@science.udsm.ac.tz', '4066095da42f0db112ed6559fedabfdae6f1ed99', 1, 5, 1),
(21, 'Geofrey', 'Itebuka', 'mitebuka@udsm.ac.tz', 'mitebuka@udsm.ac.tz', '29942a3feb460c9163f7e8e66fda4176a10d9c91', 1, NULL, 1),
(22, 'Captain', 'Patrick', 'captain@udsm.ac.tz', 'captain@udsm.ac.tz', '11f4e78fd007fa5a109e753d1b1bc49853e2e291', 1, 22, 1),
(23, 'Justine', 'Mwengele', 'mwengele@udsm.ac.tz', 'mwengele@udsm.ac.tz', '79cc71ff568065f12ae407e8088169a9748b8cf4', 1, 21, 1),
(24, 'Christopher', 'Mhagama', 'mhagama@ims.udsm.ac.tz', 'mhagama@ims.udsm.ac.tz', '2309ddc18e27e48b06a65c42de5c8bd4eca04c9a', 1, 23, 1),
(25, 'Ally', 'Bitebo', 'allybitebo@udsm.ac.tz', 'allybitebo@udsm.ac.tz', '259d3470e279854aee6eafba48b1bf29f16ebed5', 1, 7, 1),
(26, 'Nathan ', 'Itemba', 'itemba@udsm.ac.tz', 'itemba@udsm.ac.tz', 'c0d2006d0e8e9c5e9d23d4afdf9d6dcc55842977', 1, NULL, 1),
(27, 'Restituta ', 'William', 'restwilly@uccmail.co.tz', 'restwilly@uccmail.co.tz', '513837818fb42261bce049dde6b8b1d05af0787c', 1, NULL, 1),
(28, 'Daniel ', 'Elihuruma', 'edmosi@udsm.ac.tz', 'edmosi@udsm.ac.tz', '7f5df355eecc715bc1b25c0d6bcf292cf5d6d803', 1, NULL, 1),
(29, 'Lucina ', 'Lawi', 'luceinlaw@udsm.ac.tz', 'luceinlaw@udsm.ac.tz', '0f7755a2ce8f5715dbaeb9c10a5f435fe331ef8c', 1, NULL, 1),
(30, 'Mgungule ', 'C. Mwa-mnyenyelwa', 'mgungule3102@udsm.ac.tz', 'mgungule3102@udsm.ac.tz', 'f906888dbdf1154f1fb0d26c60973a7c0ee2ad63', 1, 20, 1),
(31, 'Teyana', 'Sepula', 'teyana@udsm.ac.tz', 'teyana@udsm.ac.tz', 'bc8d32599a6a3bc838503ed9b03ebef8da91476b', 1, 4, 1),
(32, 'Fredrick ', 'Kaspar', 'bondfred@yahoo.com', 'bondfred@yahoo.com', 'e64b9ea72db1fcaf0dae390b4e20785a7ba96062', 1, 18, 1),
(33, 'Ali', 'Kombo', 'kombo@ims.udsm.ac.tz', 'kombo@ims.udsm.ac.tz', '2aa7c26d15cdd2fa1ecab66462ab4c5196622e73', 1, 23, 1),
(34, 'Ng\'eno ', 'M Kissambu', 'nmathias@udsm.ac.tz', 'nmathias@udsm.ac.tz', '0c8d658c4741d1ed8b309c83f2d63d79335dd946', 1, 27, 1),
(35, 'Daniel', 'Livingstone', 'livingstone@udsm.ac.tz', 'livingstone@udsm.ac.tz', '6906dbf5214a0e898d0efba171b9c540e107ac75', 1, 7, 1),
(36, 'Saidi', ' M Mchomvu', 'mchomvu@udsm.ac.tz', 'mchomvu@udsm.ac.tz', 'b154d35d2ded7913c8ad4d5b2a5b4917645ce750', 1, NULL, 1),
(37, 'Japhet', 'Kululya', 'kululya@udsm.ac.tz', 'kululya@udsm.ac.tz', 'f90502847d8733354779dbd5babddcb9f704a961', 1, NULL, 1),
(38, 'Daniel', 'Elihuruma', 'edmosi@udsm.ac.tz', 'edmosi', '35555e39ab91bd3653bd32abace0a9c817395fe0', 1, NULL, 1),
(39, 'Perpe', 'John', 'pjohn@udsm.ac.tz', 'pjohn', '7e7f03d8455d5e35c7b3e75762662f6885b5761d', 1, 5, 1),
(40, 'Olipa', 'Simon', 'osimon@ira.udsm.ac.tz', 'olipa', '3884dc210dcf3e2dddf5303fd6a258bce8b60821', 2, 22, 1),
(41, 'Swaumu', 'Manengelo', 'swaumu@yahoo.com', 'swaumumanengelo', 'eb805f810b12f4fec9f513d87ee607390db53c55', 2, 17, 1),
(42, 'Aklan', 'Majaliwa', 'brpango@gmail.com', 'brpango@gmail.com', 'f933cb25b550c877bef6b30089078782c038846c', 2, 2, 1),
(43, 'Rukia ', 'Kitula', 'rkitula@ims.udsm.ac.tz', 'kitula', '836c7aa0687bf8c43bdb485e3f9d0612939cb621', 2, 23, 1),
(44, 'Ng\'eno', 'Kissambu', 'nmathias@udsm.ac.tz', 'nmathias@udsm.ac.tz', '0c8d658c4741d1ed8b309c83f2d63d79335dd946', 2, 27, 1),
(45, 'Olipa', 'Simon', 'osimon@ira.udsm.ac.tz', 'olipa', '3884dc210dcf3e2dddf5303fd6a258bce8b60821', 1, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `Id` int(11) NOT NULL,
  `VideoNameEn` varchar(255) NOT NULL,
  `VideoNameSw` varchar(255) NOT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `VideoLink` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePosted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`Id`, `VideoNameEn`, `VideoNameSw`, `UnitID`, `VideoLink`, `Status`, `DateCreated`, `DatePosted`) VALUES
(1, 'University of Dar-es-salaam', 'Chuo kikuu cha Dar-es-salaam', NULL, 'https://www.youtube.com/watch?v=J_14oQTGixE', 1, '0000-00-00 00:00:00', '2017-06-18 14:41:55'),
(2, 'aa bb sss', 'aa bb sss', NULL, 'https://www.youtube.com/watch?v=XPV5ZViSC0o', 1, '2017-09-06 20:15:59', NULL),
(3, 'asdsds', 'sdsdsadsd', NULL, 'https://www.youtube.com/watch?v=nbl6yRYOzvY', 1, '2017-09-06 20:16:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_academic_administrative_unit`
--
ALTER TABLE `tbl_academic_administrative_unit`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_basic_page`
--
ALTER TABLE `tbl_basic_page`
  ADD PRIMARY KEY (`PageId`),
  ADD UNIQUE KEY `PageSeoUrl` (`PageSeoUrl`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_contacts_tbl_academic_administrative_unit1_idx` (`UnitID`);

--
-- Indexes for table `tbl_custom_blocks`
--
ALTER TABLE `tbl_custom_blocks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_gallery_photo`
--
ALTER TABLE `tbl_gallery_photo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_leadership`
--
ALTER TABLE `tbl_leadership`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `MenuName_UNIQUE` (`MenuName`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_menu_academic_administrative_unit_idx` (`UnitID`);

--
-- Indexes for table `tbl_menu_item`
--
ALTER TABLE `tbl_menu_item`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_menu_item_tbl_menu1_idx` (`MenuID`),
  ADD KEY `fk_tbl_menu_item_tbl_sections1_idx` (`SectionID`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_news_tbl_academic_administrative_unit1_idx` (`UnitID`);

--
-- Indexes for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD UNIQUE KEY `ProgrammeNameEn_UNIQUE` (`ProgrammeNameEn`),
  ADD KEY `fk_tbl_programmes_tbl_academic_administrative_unit1_idx` (`UnitID`);

--
-- Indexes for table `tbl_research_projects`
--
ALTER TABLE `tbl_research_projects`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_research_projects_tbl_academic_administrative_unit1_idx` (`UnitID`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`);

--
-- Indexes for table `tbl_slide_shows`
--
ALTER TABLE `tbl_slide_shows`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_slide_shows_tbl_academic_administrative_unit1_idx` (`UnitID`);

--
-- Indexes for table `tbl_social_media_accounts`
--
ALTER TABLE `tbl_social_media_accounts`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `AccountName_UNIQUE` (`AccountName`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD UNIQUE KEY `AccountAddress_UNIQUE` (`AccountAddress`),
  ADD KEY `fk_tbl_social_media_accounts_tbl_academic_administrative_un_idx` (`UnitID`);

--
-- Indexes for table `tbl_staff_list`
--
ALTER TABLE `tbl_staff_list`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_UNIQUE` (`Id`),
  ADD KEY `fk_tbl_staff_list_tbl_academic_administrative_unit1_idx` (`UnitID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_tbl_user_tbl_acdm_admin_unit_id` (`UnitID`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_academic_administrative_unit`
--
ALTER TABLE `tbl_academic_administrative_unit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_basic_page`
--
ALTER TABLE `tbl_basic_page`
  MODIFY `PageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_custom_blocks`
--
ALTER TABLE `tbl_custom_blocks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_gallery_photo`
--
ALTER TABLE `tbl_gallery_photo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_leadership`
--
ALTER TABLE `tbl_leadership`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_menu_item`
--
ALTER TABLE `tbl_menu_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_research_projects`
--
ALTER TABLE `tbl_research_projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_slide_shows`
--
ALTER TABLE `tbl_slide_shows`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_social_media_accounts`
--
ALTER TABLE `tbl_social_media_accounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_staff_list`
--
ALTER TABLE `tbl_staff_list`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
