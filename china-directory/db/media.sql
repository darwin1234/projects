/*
SQLyog Trial v13.0.1 (64 bit)
MySQL - 10.1.24-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `media` (
	`image_id` int (50),
	`id_no` int (11),
	`image_name` varchar (2295),
	`image_path` varchar (2295),
	`publish_date` date 
); 
insert into `media` (`image_id`, `id_no`, `image_name`, `image_path`, `publish_date`) values('1','263','seven-stars-resort-spa.jpg','http://media.local/2018/11/263/images/seven-stars-resort-spa.jpg','2018-11-22');
insert into `media` (`image_id`, `id_no`, `image_name`, `image_path`, `publish_date`) values('14','263','sanrst-omni-la-costa-resort-aerial-pool-1.jpg','http://media.local/2018/11/263/images/sanrst-omni-la-costa-resort-aerial-pool-1.jpg','2018-11-22');
insert into `media` (`image_id`, `id_no`, `image_name`, `image_path`, `publish_date`) values('15','263','tmg-facebook_social.jpg','http://media.local/2018/11/263/images/tmg-facebook_social.jpg','2018-11-22');
insert into `media` (`image_id`, `id_no`, `image_name`, `image_path`, `publish_date`) values('16','263','view.jpg','http://media.local/2018/11/263/images/view.jpg','2018-11-22');
insert into `media` (`image_id`, `id_no`, `image_name`, `image_path`, `publish_date`) values('17','263','welcome-in-paradise-on.jpg','http://media.local/2018/11/263/images/welcome-in-paradise-on.jpg','2018-11-22');
