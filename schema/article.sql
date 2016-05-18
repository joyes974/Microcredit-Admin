-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2011 at 09:23 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `article`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@localhost.com'),
(3, 'kiash', 'ef72562d64d9a3987959b60c3b6830de', 'kiash@yhaoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `writer_id` int(11) NOT NULL DEFAULT '0',
  `article_body` text NOT NULL,
  `post_time` varchar(20) NOT NULL DEFAULT '',
  `document` varchar(50) NOT NULL DEFAULT '',
  `status` enum('Pending','Rejected','Approved') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `topic_id`, `writer_id`, `article_body`, `post_time`, `document`, `status`) VALUES
(5, 1, 2, 'dsd sdsdsd s sdsadsd', '1295468222', '', 'Pending'),
(10, 1, 0, 'I would like for you to start on a new project.\r\n\r\nA article submission managment site.  I will have a number of writers who will be selecting a articles to write\r\nfrom a list I provide, and then submit these articles to the system once they have written them. \r\n\r\nThere will be two sides to this system, the admin, and the writers.\r\n\r\n\r\nThe admin will conrol\r\n\r\n\r\nThe Writers section should allow writers to submit their topics for approval, select topics to write about from a \r\nlist provided by the admin, submit/upload completed articles, and show stats on how many pages of articles were written.\r\nEach page is made up of 250 words.  An article should be rounded up to the next page if there are more then 100 addittional\r\nwords, i.e. 350 words or more = 2 pages.  349 words or less = 1 page.\r\n\r\n\r\nThe admin section should allow the admin to post topics, approve or reject topics, approve or reject completed/uploaded articles, and show stats\r\nof what the writers have done on a weekly, monthly, and yearly basis.\r\n\r\n\r\n\r\n\r\nWriter Section:\r\nA writer should be able to submit one or more topics for approval.  If the topic is approved, it should be added \r\nto the list of topics provided by the admin that they are allowed to write about.\r\n\r\nWhen a writer wants to write on a topic, they should go to a page with the list of topics so that they can choose \r\na topic to write about.  This topics would then be removed from the list so that it can not be selected by another writer.\r\n\r\nWhen the writer is done writing the article, there should be a way for them to upload the article for approval or rejection by the admin\r\n\r\nThere should be a page with a list of approved and rejected articles.  If an article is rejected, they should be able to read comments\r\nleft by the admin and edit the article and resubmit it for approval.\r\n\r\n\r\n\r\n\r\n\r\nAdmin Section\r\nThe admin section should allow the admin to post topics for the writers to wrie about.  The admin may choose to assign a specific topic\r\nto a specific writer, or to allow any writer to choose this topic.  The admin should be able to select the number of aritcles to be\r\nwriten on this topic.  Once the quantity of articles selected by the admin has been selected, no other writer should be able to select\r\nthis topic to write about.\r\n\r\nIf a writer submits a topic to be writen about, they should automaticly be able to write about it once approved by the admin, and the admin\r\nshould have the option to add an addional request to the main list that all writers have access to.\r\n\r\nIf the admin recjects either a topic or article, there should be a comment box so that the admin can say why they rejected it.  This comment\r\nbox should have a drop down list with common reasons the article was rejected, along with a way of typiing in a reason not found in the list.\r\n\r\nThe admin should be able to see stats on the number of pages 250words per page, that have been written by each writer and all of the writers.\r\nThese stats should be displayed in various ways.\r\n\r\n\r\n', '1295648381', '', 'Approved'),
(11, 2, 0, 'I would like for you to start on a new project.\r\n\r\nA article submission managment site.  I will have a number of writers who will be selecting a articles to write\r\nfrom a list I provide, and then submit these articles to the system once they have written them. \r\n\r\nThere will be two sides to this system, the admin, and the writers.\r\n\r\n\r\nThe admin will conrol\r\n\r\n\r\nThe Writers section should allow writers to submit their topics for approval, select topics to write about from a \r\nlist provided by the admin, submit/upload completed articles, and show stats on how many pages of articles were written.\r\nEach page is made up of 250 words.  An article should be rounded up to the next page if there are more then 100 addittional\r\nwords, i.e. 350 words or more = 2 pages.  349 words or less = 1 page.\r\n\r\n\r\nThe admin section should allow the admin to post topics, approve or reject topics, approve or reject completed/uploaded articles, and show stats\r\nof what the writers have done on a weekly, monthly, and yearly basis.\r\n\r\n\r\n\r\n\r\nWriter Section:\r\nA writer should be able to submit one or more topics for approval.  If the topic is approved, it should be added \r\nto the list of topics provided by the admin that they are allowed to write about.\r\n\r\nWhen a writer wants to write on a topic, they should go to a page with the list of topics so that they can choose \r\na topic to write about.  This topics would then be removed from the list so that it can not be selected by another writer.\r\n\r\nWhen the writer is done writing the article, there should be a way for them to upload the article for approval or rejection by the admin\r\n\r\nThere should be a page with a list of approved and rejected articles.  If an article is rejected, they should be able to read comments\r\nleft by the admin and edit the article and resubmit it for approval.\r\n\r\n\r\n\r\n\r\n\r\nAdmin Section\r\nThe admin section should allow the admin to post topics for the writers to wrie about.  The admin may choose to assign a specific topic\r\nto a specific writer, or to allow any writer to choose this topic.  The admin should be able to select the number of aritcles to be\r\nwriten on this topic.  Once the quantity of articles selected by the admin has been selected, no other writer should be able to select\r\nthis topic to write about.\r\n\r\nIf a writer submits a topic to be writen about, they should automaticly be able to write about it once approved by the admin, and the admin\r\nshould have the option to add an addional request to the main list that all writers have access to.\r\n\r\nIf the admin recjects either a topic or article, there should be a comment box so that the admin can say why they rejected it.  This comment\r\nbox should have a drop down list with common reasons the article was rejected, along with a way of typiing in a reason not found in the list.\r\n\r\nThe admin should be able to see stats on the number of pages 250words per page, that have been written by each writer and all of the writers.\r\nThese stats should be displayed in various ways.\r\n\r\n\r\n', '1295648397', '', 'Approved'),
(12, 3, 2, 'tset', '1295798254', '', 'Pending'),
(14, 4, 2, 'I would like for you to start on a new project.\r\n\r\nA article submission managment site.  I will have a number of writers who will be selecting a articles to write\r\nfrom a list I provide, and then submit these articles to the system once they have written them. \r\n\r\nThere will be two sides to this system, the admin, and the writers.\r\n\r\n\r\nThe admin will conrol\r\n\r\n\r\nThe Writers section should allow writers to submit their topics for approval, select topics to write about from a \r\nlist provided by the admin, submit/upload completed articles, and show stats on how many pages of articles were written.\r\nEach page is made up of 250 words.  An article should be rounded up to the next page if there are more then 100 addittional\r\nwords, i.e. 350 words or more = 2 pages.  349 words or less = 1 page.\r\n\r\n\r\nThe admin section should allow the admin to post topics, approve or reject topics, approve or reject completed/uploaded articles, and show stats\r\nof what the writers have done on a weekly, monthly, and yearly basis.\r\n\r\n\r\n\r\n\r\nWriter Section:\r\nA writer should be able to submit one or more topics for approval.  If the topic is approved, it should be added \r\nto the list of topics provided by the admin that they are allowed to write about.\r\n\r\nWhen a writer wants to write on a topic, they should go to a page with the list of topics so that they can choose \r\na topic to write about.  This topics would then be removed from the list so that it can not be selected by another writer.\r\n\r\nWhen the writer is done writing the article, there should be a way for them to upload the article for approval or rejection by the admin\r\n\r\nThere should be a page with a list of approved and rejected articles.  If an article is rejected, they should be able to read comments\r\nleft by the admin and edit the article and resubmit it for approval.\r\n\r\n\r\n\r\n\r\n\r\nAdmin Section\r\nThe admin section should allow the admin to post topics for the writers to wrie about.  The admin may choose to assign a specific topic\r\nto a specific writer, or to allow any writer to choose this topic.  The admin should be able to select the number of aritcles to be\r\nwriten on this topic.  Once the quantity of articles selected by the admin has been selected, no other writer should be able to select\r\nthis topic to write about.\r\n\r\nIf a writer submits a topic to be writen about, they should automaticly be able to write about it once approved by the admin, and the admin\r\nshould have the option to add an addional request to the main list that all writers have access to.\r\n\r\nIf the admin recjects either a topic or article, there should be a comment box so that the admin can say why they rejected it.  This comment\r\nbox should have a drop down list with common reasons the article was rejected, along with a way of typiing in a reason not found in the list.\r\n\r\nThe admin should be able to see stats on the number of pages 250words per page, that have been written by each writer and all of the writers.\r\nThese stats should be displayed in various ways.', '1295807738', '', 'Approved'),
(15, 21, 2, 'sdfdsf sdfsdfsd fsd sd f khjhkjh', '1295998837', '', 'Pending'),
(16, 19, 2, 'dfdfs df', '1295998861', '', 'Pending'),
(17, 22, 2, 'sdfsdfsdf', '1295998870', '', 'Pending'),
(29, 43, 2, 'khkjh kh kh', '1296158041', '', 'Pending'),
(27, 41, 2, 'sdfs', '1296157928', '', 'Pending'),
(28, 42, 2, 'jgjhg gjgj hgjgjgj gjhgjg', '1296158030', '', 'Pending'),
(30, 44, 2, 'hfhgfh h gfh', '1296158275', '', 'Pending'),
(31, 46, 2, 'gjgjg', '1296158378', '', 'Pending'),
(32, 18, 2, 'asdfasdf', '1296172192', 'integrationJuly1911.doc', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

DROP TABLE IF EXISTS `emp_details`;
CREATE TABLE IF NOT EXISTS `emp_details` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(33) NOT NULL DEFAULT '',
  `fathersname` varchar(33) NOT NULL DEFAULT '',
  `motthersname` varchar(33) NOT NULL DEFAULT '',
  `pres_address` varchar(50) NOT NULL DEFAULT '',
  `pst_address` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(33) NOT NULL DEFAULT '',
  `dist` varchar(15) NOT NULL DEFAULT '',
  `salary` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `status` enum('Active','Pending','Deleted') NOT NULL DEFAULT 'Active',
  `register_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `fullname`, `fathersname`, `motthersname`, `pres_address`, `pst_address`, `phone`, `email`, `dist`, `salary`, `password`, `status`, `register_date`) VALUES
(1, 'Fateul hossain kiash', '', '', 'Tilaghore,sylhet.', '', '01737748237', 'kiash@yhaoo.com', 'Dhak', '20000', '', 'Active', '2011-04-05 02:53:00'),
(2, 'Manash sir', 'aaaaaa', 'aaaaaa', 'Tilaghore,sylhet.', 'sylhet', '01920384', 'manas_sust@yahoo.com', 'sylhet', '200000', '', 'Pending', '0000-00-00 00:00:00'),
(3, 'uasdhuias', 'dasjdadsa', 'jkksad', 'klslkdjasd', 'jkasdsa', '012123233', 'jsajkasdjk@yahoo.com', 'Dhaka', '1234567', '', 'Active', '2011-03-01 00:00:00'),
(5, 'hossain kiash', 'kasdsad', 'sdasdsad', 'sadas', 'dasdasd', '01920384', 'kiash@gmsi', '', '', '', 'Active', '0000-00-00 00:00:00'),
(6, 'hossain kiash', 'Hadayet ullah', 'sdasdsad', 'Tilaghore,sylhet.', 'mymensingh', '012123233', 'manas_sust@yahoo.com', 'sylhet', '20000', 'kiash', 'Active', '0000-00-00 00:00:00'),
(7, 'kiash', 'hadayer', '', 'aopdkasd', 'jkasdopas', '01928238', 'jksdnsd@yahoo.com', 'dssdsad', '2232', '12345', 'Active', '2011-03-28 01:58:52'),
(8, 'omi', 'sadasd', 'jhkasjdjkhsak', 'iasoidasio', 'sadasda', '423536', 'leoneo71@yahoo.com', 'dssdsad', '2232', '13579', 'Active', '2011-03-28 02:01:59'),
(9, 'sami', '', '', 'sadasd', '', '0123243', 'sami@yahoo.com', 'Dhaka', '2232', '', 'Active', '0000-00-00 00:00:00'),
(10, 'omi', 'omi', 'omi', 'dfsdfsdf', 'asdasda', '0123243', 'asdas@yahoo.com', 'dssdsad', '2232', '12345', 'Active', '0000-00-00 00:00:00'),
(11, 'ovi', 'moyon', 'sdfs', 'kljasf', 'jsdf', '01223414', 'geneticmercury@yahoo.com', 'sd', '3242', '12345', 'Deleted', '0000-00-00 00:00:00'),
(12, 'arif', 'hayat', 'sakdas', 'klskaskl', 'kaskldlk', '11213', 'admin@localhost.com', 'Sylhet', '2232', '111111', 'Deleted', '2011-04-01 00:37:09'),
(13, 'ovi', '', '', 'dfsdfsdf', '', '01223414', 'geneticmercury@yahoo.com', 'Mymensingh', '3242', '', 'Active', '2011-04-01 00:40:12'),
(14, 'tannnnnim', '', '', 'mymensingh,bangladesh', '', '01223414', 'tarak.thakarar@gmail.com', 'Mymensingh', '121212', '', 'Active', '2011-04-05 10:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_collection`
--

DROP TABLE IF EXISTS `m_collection`;
CREATE TABLE IF NOT EXISTS `m_collection` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `m_number` int(11) DEFAULT NULL,
  `m_rate` int(11) DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `book` int(11) DEFAULT NULL,
  `t_deposit` int(11) DEFAULT NULL,
  `t_pay` float DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `m_collection`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL DEFAULT '',
  `page_url` varchar(50) NOT NULL DEFAULT '',
  `page_title` varchar(255) NOT NULL DEFAULT '',
  `page_header` varchar(250) NOT NULL DEFAULT '',
  `page_content` text NOT NULL,
  `page_image` varchar(100) NOT NULL DEFAULT '',
  `update_time` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category`, `page_url`, `page_title`, `page_header`, `page_content`, `page_image`, `update_time`) VALUES
(26, 'cata', 'chemotherapy-technician.php', 'ChemotherapyTechnician kiash', 'Help Cancer Patients Get Treatments with a Quick Healthcare Degree as a Chemotherapy Technician', 'Working with cancer patients can be very rewarding. Knowing that you''re helping patients with their treatments means knowing you could be lengthening or even saving their lives. Fortunately, it can be easy to start working on patients'' treatments. All you need is a quick healthcare degree as a Chemotherapy Technician.', '', '1301771853'),
(16, 'degrees', 'medical-assistant.php', 'Medical Assistant', 'Administrative Tasks get Done with a Quick Healthcare Degree and a Career as a Medical Assistant', 'Like it or not, medical offices have administrative duties, as well. Beyond patient care, there are phones to be answered, charts to be filed, and appointments to be set. In order to help medical offices run smoothly with these administrative tasks, you can earn a quick healthcare degree and work as a Medical Assistant.', '', '1297439090'),
(13, 'degrees', 'certified-nursing-assistant.php', 'Certified Nursing Assistant (CNA)', 'Certified Nursing Assistants Provide Patient Comforts with Only a Quick Healthcare Degree', 'Many people go into healthcare because they want to help people. One way to help patients after earning a quick healthcare degree is to work as a Certified Nursing Assistant. In this career, you help keep patients comfortable in a hospital or nursing home setting, ensuring that while they''re in your care, they are as happy as they can be.', '', '1297439261'),
(14, 'degrees', 'licensed-practical-nurse.php', 'Licensed Practical Nurse (LPN)', 'A Quick Healthcare Degree Offers Careers in Nursing', 'Many people want to become nurses and work in the healthcare field, but what scares them away is finding out that to become a Registered Nurse, you need a minimum of three years'' education. However, you can work as a Licensed Practical Nurse with a quick healthcare degree that can be earned in one year. And before you know it, you''re working with patients and making a difference.', '', '1297439269'),
(32, 'degrees', 'radiologic-technologist.php', 'Radiologic Technologist (RT)', 'Radiologic Technologists can Perform Patient Tests after a Quick Healthcare Degree', 'One important part of working with patients in the healthcare field is the tests needed to come up with the diagnoses. And one area of testing is in diagnostic imaging, such as x-rays, mammograms, and CT scans. If you want to be directly involved in patient care through these important tests with only a quick healthcare degree, working as a Radiologic Technologist could be a good fit for you.', '', '1297439293'),
(3, 'degrees', 'medical-transcriptionist.php', 'Medical Transcriptionist (MT)', 'Start Work Right Away as a Medical Transcriptionist (MT) with a Quick Healthcare Degree', 'In addition to all the hard work of doctors and nurses in the healthcare field, there are often people working just as hard behind the scenes to ensure that things go smoothly. If you would like a quick healthcare degree, but might prefer to work behind the scenes in a hospital or clinic, becoming a Medical Transcriptionist may be just right for you.', '', '1297439308'),
(5, 'degrees', 'phlebotomist.php', 'Phlebotomist', 'Get a Quick Healthcare Degree as a Phlebotomist', 'One way to start working in the healthcare field right away is with a quick healthcare degree as a phlebotomist. Phlebotomists are often necessary to make sure that the diagnosis and treatment of patients goes smoothly, and the career offers hands-on experience from day one.', '', '1297441626'),
(6, 'degrees', 'pharmacy-technician.php', 'Pharmacy Technician', 'Pharmacy Technicians Offer Quick Healthcare Degrees and Chance for Advancement', 'Once patients have been seen and diagnoses been made, treatments begin. Often, this means prescriptions. Working in a pharmacy as a Pharmacist Technician is a good way to work directly with patients, but since you can begin work with a quick healthcare degree, you don''t have to worry about spending six or eight years studying first.', '', '1297439342'),
(7, 'degrees', 'medical-coding-billing.php', 'Medical coding and billing', 'Quick Healthcare Degrees Mean Smooth Office Operations', 'Even with a quick healthcare degree, you can find lots of opportunities to work “behind the scenes” to help make sure a physician''s office or hospital is running smoothly. One opportunity is to work in Medical Coding and Billing, which is essential for any office.', '', '1297439358'),
(8, 'degrees', 'dental-hygienist.php', 'Dental Hygienist', 'Work Behind the Dentist''s Chair with a Quick Healthcare Degree in Dental Hygiene', 'Dental health is just as important as heart or bone health, so if you''d like to earn a quick healthcare degree in the dental field, you could do a lot of good as a Dental Hygienist. You work directly with patients, and with the variety of tasks and responsibilities given, a day in the office is never repetitive!', '', ''),
(9, 'cata', 'licensed-massage-therapist.php', 'Licensed Massage Therapist', 'Healing Hands are a Quick Healthcare Degree Away', 'Many people want to earn a quick healthcare degree because they want to help people. One career that reveals just how much you''re helping people right away is as a Licensed Massage Therapist. Every appointment with a patient has immediate results, so you''re never left wondering if you really are helping or not.', '', '1302169466'),
(27, 'degrees', 'home-health-aide.php', 'Home Health Aide', 'Provide Patient Comfort with a Quick Healthcare Degree as a Home Health Aide', 'Knowing that you''re providing valuable help to patients is one reason you may want to go into the healthcare field. Direct contact with patients and helping them to be comfortable is important. Some patients only need a little help with running errands or bathing, while others may need help with eating, getting dressed, and other daily tasks others take for granted. With a quick healthcare degree as a Home Health Aide, you can provide help directly to patients to make sure they''re comfortable.', '', ''),
(12, 'degrees', 'medical-lab-technician.php', 'Medical Lab Technician', 'Have a Hand in Diagnosis with a Quick Healthcare Degree as a Medical Lab Technician', 'In helping patients, diagnosis is important, and in order to find a diagnosis, physicians usually run tests. When a doctor orders tests, they''re usually evaluated in a medical lab by a Medical Lab Technician. Because of this, a quick healthcare degree as a Medical Lab Technician means that you could be key in diagnosing patients, and saving lives.', '', ''),
(31, 'degrees', 'medical-receptionist.php', 'Medical Receptionist', 'Be the Face of a Doctor''s Office with a Quick Healthcare Degree as a Medical Receptionist', 'First impressions are important, and even in the healthcare field, first impressions are made. In doctor''s offices, the first impression a patient gets is usually from the Medical Receptionist, whether in person or on the phone. People who are friendly, approachable, and have good customer service skills can be great at the front desk of an office, and if that''s you, a quick healthcare degree as a Medical Receptionist means you can be the face of a doctor''s office.', '', ''),
(20, 'degrees', 'midwife.php', 'Midwife', 'A Quick Healthcare Degree as a Midwife Provides Women with Natural Childbirth Options', 'More and more women are seeking more natural paths for their lives, and their health care during pregnancy and delivery is no exception. Midwives offer an alternative to traditional doctors for pregnant women, often with less interventions and a more natural experience. If you want to help women have this natural pregnancy and childbirth experience, a quick healthcare degree and certification as a Midwife can provide the opportunity.', '', ''),
(25, 'degrees', 'orderly.php', 'Orderly', 'Help Keep Patients Comfortable with a Quick Healthcare Degree as an Orderly', 'Patient comfort is very important, especially in hospitals and live-in facilities. However, many people in medical facilities need help with day-to-day tasks, and that''s why an Orderly can be so beneficial to the life of a patient. By earning your quick healthcare degree as an Orderly, you can help make sure your patients'' daily needs are being met, and that they''re as comfortable as possible.', '', ''),
(21, 'cata', 'personal-fitness-trainer.php', 'Personal FitnessTrainer', 'A Quick Healthcare Degree as a Personal Fitness Trainer Helps You Keep People Healthy', 'One way to get into the healthcare field is to help other people get and stay healthy. Preventative care, such as an exercise program, can be key to keeping people out of the hospital. By earning your quick healthcare degree as a Personal Fitness Trainer, you can be instrumental in getting and keeping people healthy.', '', '1301989246'),
(15, 'degrees', 'radiation-therapist.php', 'Radiation Therapist', 'A Radiation Therapist Can Help Treat Cancer After a Quick Healthcare Degree', 'One of the most common reasons for going into the healthcare field is to help people. People want to work with patients, and feel like they''re making a difference in their lives. One way to do that is to be involved in patients'' treatment programs. As a Radiation Therapist, you can work directly with patients to help treat their cancer, and all you need is a quick healthcare degree.', '', ''),
(18, 'degrees', 'surgical-technician.php', 'Surgical Technician', 'A Quick Healthcare Degree Means You Can Make a Difference in the Operating Room as a Surgical Technologist', 'Though sometimes the surgeon is one of the few people to get “credit” for operating, there is always a whole team of doctors, nurses, and other technicians working in an operating room to help ensure a patient is taken care of and that everything goes smoothly. Every person in the operating room is important to the procedure, and with a quick healthcare degree as a Surgical Technologist, you can be on a surgical team.', '', ''),
(34, 'degrees', 'lpn-to-rn-programs.php', 'LPN to RN Programs', 'Furthering Your Education: LPN to RN Programs', 'Many people who want to go into the nursing field start out as a Licensed Practical Nurse, or LPN. Since less schooling is required, it''s a way to start working sooner. However, once in nursing, many LPNs decide they want to go on to become Registered Nurses (RNs), so they start looking into LPN to RN programs.\r\n\r\nLPN to RN programs are in place to help people who are already licensed as LPNs. Usually the programs give you credits for lower-level courses, allowing you to move through the RN program faster.\r\n\r\nThe specifics of LPN to RN bridge programs vary, but some schools will credit students two years'' worth of courses toward their RN degree with an active LPN license.\r\n\r\nIf you are working toward your LPN license, or already have it, there are ways you can maximize the benefits of LPN to RN programs now.', '', ''),
(17, 'degrees', 'sonographer.php', 'Sonographer', 'Work in Patient Testing as a Sonographer with a Quick Healthcare Degree', 'Patient-testing is an important part of patient care. One form of patient testing is through ultrasound imaging, and after a quick healthcare degree, you can work as a Sonographer, helping to diagnose patients'' illnesses and diseases, as well as bring the joy of seeing a baby for the first time to a pregnant woman.', '', ''),
(10, 'degrees', 'cytotechnologist.php', 'Cytotechnologist', 'Help Catch Cancer Early with a Quick Healthcare Degree as a Cytotechnologist', 'Often catching cancer early is key in treating cancer patients and saving their lives. In order to diagnose cancer, along with many other diseases and illnesses, a sample of cells is taken from the patient and examined under a microscope for abnormalities. When those abnormalities are spotted, a treatment plan can be developed. By earning your quick healthcare degree as a Cytotechnologist, you can be a part of diagnosing patients with cancer to help ensure they get the treatment they need.', '', ''),
(30, 'cata', 'doula.php', 'Doula', 'Participate in the Miracle of Birth with a Quick Healthcare Degree as a Doula', 'Many people who want to go into the healthcare field want to work with pregnant women and babies. The promise of new life is encouraging and rewarding, and the career is often full of joy. One way to start work right away is with a quick healthcare degree and certification as a Doula. This way, you can get into the healthcare field right away, and work in a very rewarding career.', '', '1301989232'),
(28, 'degrees', 'ekg-technician.php', 'EKGTechnician', 'Earn a Quick Healthcare Degree as an EKG Technician to Start Your Career in Heart Health', 'It''s a great feeling to know what you want to do. Unfortunately, knowing what you want to do and getting there can be two very different things. If you want a career in heart health, you may feel discouraged about how long it takes to learn all you need to do it. The good news is that with a quick healthcare degree as an EKG Technician, you can start your heart health career sooner, working directly with patients along the way.', '', ''),
(19, 'degrees', 'emergency-medical-technician.php', 'Emergency Medical Technician', 'A Quick Healthcare Degree Can Make You a First-Responder as an Emergency Medical Technician', 'When an emergency or accident occurs, the people who arrive first on the scene are the ones who make a difference in saving lives. By earning your quick healthcare degree as an Emergency Medical Technician, you can be a first-responder in a variety of emergencies, and the work you do every day can save lives.', '', ''),
(23, 'degrees', 'anesthesia-technician.php', 'Anesthesia Technician', 'A Quick Healthcare Degree Gets You Work in an Operating Room as an Anesthesia Technician', 'When someone has to have surgery, one important aspect of the process is the anesthesia, which keeps the patient from feeling pain. And while the Anesthesiologist is in charge of the anesthesia, an Anesthesia Technician is someone whose work in the operating room is just as important to make sure the surgery goes smoothly. Fortunately, you can pursue a career as an Anesthesia Technician with just a quick healthcare degree.', '', ''),
(24, 'degrees', 'cardiovascular-technician.php', 'Cardiovascular Technician', 'CARDIOVASCULAR TECHNICIAN (quick healthcare degrees)', 'Heart health is important, and like any area of healthcare, cardiologists rely on the help provided to them by their employees to make sure that patients are treated quickly and properly to diagnose any heart and blood vessel problems they may have. That''s why Cardiovascular Technicians are key to the efficiency of a cardiologist''s practice. And if you''re interested in helping people''s heart health, a quick healthcare degree as a Cardiovascular Technician may be for you.', '', '1297697340'),
(35, 'degrees', 'asf.php', 'asdasdas', 'Coming Soon ...', 'Coming Soon ...', '', '1297881444'),
(36, 'degrees', 'sonographer.php', 'qwqweqweqwe', 'qweqweqw', 'dasdasd', '', '1297881413');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `setting_key`, `value`) VALUES
(1, 'cookie', 'ARTICLE_WRITER'),
(2, 'admin_email', 'admin@test.com'),
(3, 'site_name', 'Online Microcredit Management'),
(4, 'support_email', 'support@test.com'),
(5, 'domain_name', 'test.org');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `fathername` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `dist` varchar(32) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(32) NOT NULL DEFAULT '',
  `status` enum('Active','Pending','Deleted') NOT NULL DEFAULT 'Active',
  `register_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fathername`, `username`, `password`, `address`, `dist`, `phone`, `email`, `status`, `register_date`) VALUES
(1, 'Hadayet ullah', 'kiash hossain', '12345', 'sylhet', 'Mymensingh', '01717364720', 'hadayet@gmail.com', 'Active', '2011-04-05 11:09:54'),
(2, 'Hadayet ullah', 'kkkk', '12345', 'Aquq morol para mymensingh', 'Dhaka', '01737748237', 'kiash@gmail.com', 'Pending', '2011-04-06 22:59:27'),
(3, 'fdfsfs', 'fsdfd', 'aaaaa', 'mnklndf nknklnklfg klnkljsf', 'Dhaka', '2342424', 'palash_cse529@yahoo.com', 'Active', '2011-06-16 11:27:19'),
(4, 'lasdasda', 'fnnnmc', 'ooooo', 'knklnsdklfnklsd', 'Dhaka', '3423423423', 'kiashcse505@gmail.com', 'Active', '2011-06-16 11:28:00'),
(5, 'asdasdas', 'mllmnmn', 'mmmmm', 'sdfsdf', 'Dhaka', '343443', 'kiashcse50512@gmail.com', 'Active', '2011-06-16 11:29:10'),
(6, 'wwwww', 'kiashcse', 'wwwww', 'wqeqwe wee', 'Dhaka', '232232', 'leoneo7112@yahoo.com', 'Active', '2011-06-16 11:29:42');
