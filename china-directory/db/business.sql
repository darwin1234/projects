/*
SQLyog Community v13.0.0 (64 bit)
MySQL - 10.1.21-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `business` (
	`business_id` int (11),
	`business_name` varchar (765),
	`business_owner` text ,
	`business_latitude` double ,
	`business_longitude` double ,
	`business_address` varchar (300),
	`business_category` varchar (150),
	`business_status` varchar (30),
	`business_image` text ,
	`user_id` int (9),
	`publish_date` date 
); 
insert into `business` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`) values('1','','','0','0','','',NULL,'',NULL,'0000-00-00');
insert into `business` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`) values('4','asd','asd','0','0','asd','Dentistry',NULL,'',NULL,'0000-00-00');
