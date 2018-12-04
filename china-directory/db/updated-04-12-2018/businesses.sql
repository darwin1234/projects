/*
SQLyog Trial v13.0.1 (64 bit)
MySQL - 10.1.24-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `businesses` (
	`business_id` int (11),
	`business_name` varchar (20655),
	`business_owner` text ,
	`business_latitude` double ,
	`business_longitude` double ,
	`business_address` varchar (8100),
	`business_category` varchar (4050),
	`business_status` varchar (810),
	`business_image` text ,
	`user_id` int (9),
	`publish_date` date ,
	`street_number` varchar (540),
	`route` varchar (540),
	`locality` varchar (594),
	`administrative_area_level_1` varchar (6885),
	`postal_code` varchar (2295),
	`country` varchar (594),
	`dslat` varchar (540),
	`dslong` varchar (540)
); 
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('1','Happy Smile Dentist Clinic1','Business Owner 1','0','0','','Dentistry',NULL,NULL,'263',NULL,'','','','Beijing Shi','100096','China','39.913818','116.363625');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('3','China food','Tlabang','39.982464','116.49695059999999','',NULL,'1','http://192.168.0.186/2018/11/263/images/view.jpg','264',NULL,'','','','Beijing Shi','100096','China','39.982464','116.49695059999999');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('4','Marlon Dentist Clinic','asdasdasdasdasdasd','0','0','','Dentistry',NULL,'http://192.168.0.186/2018/11/263/images/dentistclinic.gif','263',NULL,'','','Beijing','Beijing','','China','39.90419989999999','116.40739630000007');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('5','Shanxi Beauty Salon','Garry Moore','0','0','','Beauty Salon',NULL,'http://192.168.0.186/2018/11/263/images/neatsalon.jpg','263',NULL,'','','','Shanxi','','China','37.2425649','111.85685860000001');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('6','Doctor Nam Clinic','Nam Pen','0','0','','Dentistry',NULL,'http://192.168.0.186/2018/11/263/images/download.jpg','263',NULL,'','','Guangzhou','Guangdong','','China','23.12911','113.26438499999995');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('7','Sanders Floral','Major Sanders','0','0','','Flower Shop',NULL,'http://192.168.0.186/2018/11/263/images/floralshop.jpg','263',NULL,'','','','Shanghai','','China','31.2646','121.505132');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('9','XF Flower Shop','Xander Ford','0','0','','Flower Shop',NULL,'http://192.168.0.186/2018/11/263/images/flowershopagain.jpg','263',NULL,'','','','Beijing Shi','','China','39.8937675','116.32499000000007');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('10','Labang Salon','Felix Labang','0','0','','Beauty Salon',NULL,'http://192.168.0.186/2018/11/263/images/prestigesalon.jpg','263',NULL,'','','Foshan','Guangdong','','China','23.021478','113.12143500000002');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('11','Pretty Salon','Betty Lafea','0','0','','Beauty Salon',NULL,'http://192.168.0.186/2018/11/263/images/beautysalonagain.jpg','263',NULL,'','','Qingdao','Shandong','','China','36.06710799999999','120.382609');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('12','Vito Dental Clinic','Doctor Vito','0','0','','Dentistry',NULL,'http://192.168.0.186/2018/11/263/images/dentistclinic.jpg','263',NULL,'','','Shenzhen','Guangdong','','China','22.543096','114.05786499999999');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('13','Tia Flower Shop','Shen Tia','0','0','','Flower Shop',NULL,'http://192.168.0.186/2018/11/263/images/paradise.jpg','263',NULL,'','','Jiangmen','','','China','22.450622','112.73408599999993');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('14','Feng Dentist Clinic','Feng Chan','0','0','','Dentistry',NULL,'http://192.168.0.186/2018/11/263/images/dentistry.jpg','263',NULL,'','','','Jiangxi','','China','27.0874564','114.90422080000008');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('15','Obito Flower Shop','Doctor Felix Obito','0','0','','Flower Shop',NULL,'http://192.168.0.186/2018/11/263/images/images(2).jpg',NULL,NULL,'','','Hangzhou','Zhejiang','','China','30.183806','120.26425300000005');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('16','Chulangkorn Beauty Salon','Tiu Mei','0','0','','Beauty Salon',NULL,'http://192.168.0.186/2018/11/263/images/chinabeautysalon.jpg',NULL,NULL,'','','Chengdu','Sichuan','','China','30.57281499999999','104.06680099999994');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('18','Tiu Tak Salon','Tak Tiu','0','0','','Beauty Salon','1','http://192.168.0.186/2018/11/263/images/download(1).jpg',NULL,NULL,'','','','Zhejiang','','China','29.1416432','119.78892480000002');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('19','Kung Lao Flower Shop','Kung Lao','0','0','','Flower Shop','1','http://192.168.0.186/2018/11/263/images/images(3).jpg',NULL,NULL,'','Zuan Shi Da Dao','Xiangyang Shi','Hubei Sheng','','China','32.1030534','112.21938750000004');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('20','Fei Hong Flower Shop','Wong Fei Hong','0','0','','Flower Shop','1','http://192.168.0.186/2018/11/263/images/images(4).jpg',NULL,NULL,'','','','Kaohsiung City','812','Taiwan','22.5553185','120.36084549999998');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('24','Darwin Salon','Darwin Sese','0','0','','Beauty Salon','1','http://192.168.0.186/2018/11/263/images/welcome-in-paradise-on.jpg',NULL,NULL,'','','Xi\'an','Shaanxi','','China','34.230769','108.93423499999994');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('26','asdasd','asdasdasdasd','0','0','','Dentistry','0','',NULL,NULL,'','','San Francisco','CA','','United States','37.7749295','-122.41941550000001');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('29','Howie','Greg Howe','39.3433574','117.36164759999997','',NULL,NULL,'http://192.168.0.186/2018/11/263/images/sanrst-omni-la-costa-resort-aerial-pool-1.jpg',NULL,NULL,'','','Tianjin','Tianjin','','China','39.3433574','117.36164759999997');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('30','Kayosahan','Kayosahan','39.53804700000001','116.68375200000003','',NULL,NULL,'http://192.168.0.186/2018/11/263/images/seven-stars-resort-spa.jpg',NULL,NULL,'','','Langfang','Hebei','','China','39.53804700000001','116.68375200000003');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('31','David Salon','David','0','0','','Beauty Salon','1','',NULL,NULL,'','Gov. Ortega Street','San Fernando','Ilocos Region','','Philippines','16.6156277','120.31672379999998');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('32','Galvez Dental Clinic','Elijah Abc Galvez','0','0','','Dentistry','1','',NULL,NULL,'','','San Fernando','Ilocos Region','','Philippines','16.60669649999999','120.31327920000001');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('33','Bobby Barbers','Bobby Ortega','0','0','','Dentistry','1','',NULL,NULL,'','Gualberto Street','San Fernando','Ilocos Region','','Philippines','16.6132243','120.3136088');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('34','Hapi Barbers','Ken Chan','0','0','','Beauty Salon','1','',NULL,NULL,'','','','','','','','');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('38','Makai Bowls Restaurant','Makai Bowls','0','0','','Food','1','http://192.168.0.186/2018/11/263/images/makaibowls.jpg','264',NULL,'','','San Juan','Ilocos Region','','Philippines','16.6719671','120.36275780000005');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('39','Nisce Skin and Face','Doctor Nisce','0','0','','Beauty Salon','1','http://192.168.0.186/2018/11/263/images/nisceskinandface.jpg','264',NULL,'','','San Fernando','Ilocos Region','','Philippines','16.60669649999999','120.31327920000001');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('40','Go To Me ','Go To','16.60669649999999','120.31327920000001','','Food','1','http://192.168.0.186/2018/11/263/images/gotome.jpg','264',NULL,'','','San Fernando','Ilocos Region','','Philippines','16.60669649999999','120.31327920000001');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('41','Surf Shack','Shacker Surfer','16.669989','120.33787499999994','','Food','1','http://192.168.0.186/2018/11/263/images/surfshack.jpg','264',NULL,'','','San Juan','Ilocos Region','','Philippines','16.669989','120.33787499999994');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('42','Kahuna Beach Resort','Kahuna ','16.6719671','120.36275780000005','','Enjoyment','1','http://192.168.0.186/2018/11/263/images/kahuna.jpg','264',NULL,'','','San Juan','Ilocos Region','','Philippines','16.6719671','120.36275780000005');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('43','Bobby Barbers','Bobby','16.60669649999999','120.31327920000001','','Salon','1','http://192.168.0.186/2018/11/263/images/bobby-barbers.jpg','264',NULL,'','','San Fernando','Ilocos Region','','Philippines','16.60669649999999','120.31327920000001');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('44','The Food Project','Makato Hisashi','0','0','','Food','1','http://192.168.0.199/2018/11/263/images/thefoodproject.jpg','329',NULL,'','','','Ilocos Region','','Philippines','16.6158906','120.32093729999997');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('45','Jollibee','Urameshi','0','0','','Food','1','http://192.168.0.199/2018/11/263/images/jollibee.jpg','329',NULL,'','','San Fernando','Ilocos Region','','Philippines','16.6073769','120.36660989999996');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('46','Coffee Library','La Union Government Enc.','16.6158906','120.32093729999997','',NULL,NULL,'http://192.168.0.199/2018/11/263/images/coffeelibrary.jpg','329',NULL,'','','','Ilocos Region','','Philippines','16.6158906','120.32093729999997');
insert into `businesses` (`business_id`, `business_name`, `business_owner`, `business_latitude`, `business_longitude`, `business_address`, `business_category`, `business_status`, `business_image`, `user_id`, `publish_date`, `street_number`, `route`, `locality`, `administrative_area_level_1`, `postal_code`, `country`, `dslat`, `dslong`) values('47','Maxx\'s','Max','27.949217','116.35818100000006','',NULL,NULL,'','329',NULL,'','','','Shanghai','','China','31.220367','121.424624');