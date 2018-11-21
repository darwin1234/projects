/*
SQLyog Community v13.0.0 (64 bit)
MySQL - 10.1.21-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `businesses` (
	`business_id` int (11),
	`business_name` varchar (6885),
	`business_owner` text ,
	`business_latitude` double ,
	`business_longitude` double ,
	`business_address` varchar (2700),
	`business_category` varchar (1350),
	`business_status` varchar (270),
	`business_image` text ,
	`user_id` int (9),
	`publish_date` date ,
	`street_number` varchar (180),
	`route` varchar (180),
	`locality` varchar (198),
	`administrative_area_level_1` varchar (2295),
	`postal_code` varchar (765),
	`country` varchar (198),
	`dslat` varchar (180),
	`dslong` varchar (180)
); 
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values(NULL,'Resort 1','Business Owner 1','0','0','Guangdong, China','Dentistry','0',NULL,NULL,NULL,'','','','Guangdong','','China','23.3790333','113.76328280000007');
