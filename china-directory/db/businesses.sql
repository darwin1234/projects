/*
SQLyog Trial v13.0.1 (64 bit)
MySQL - 10.1.24-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `business` (
	`business_id` int (11),
	`business_name` varchar (2295),
	`business_owner` text ,
	`business_latitude` double ,
	`business_longitude` double ,
	`business_address` varchar (900),
	`business_category` varchar (450),
	`business_status` varchar (90),
	`business_image` text ,
	`user_id` int (9),
	`publish_date` date ,
	`street_number` varchar (60),
	`route` varchar (60),
	`locality` varchar (66),
	`administrative_area_level_1` varchar (765),
	`country` varchar (66),
	`dslat` varchar (60),
	`dslong` varchar (60)
); 
insert into `business` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `country`, `dslat`, `dslong`) values('1','','','0','0','','',NULL,'',NULL,'0000-00-00','','','','','','','');
insert into `business` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `country`, `dslat`, `dslong`) values('4','asd','asd','0','0','asd','Dentistry',NULL,'',NULL,'0000-00-00','','','','','','','');
