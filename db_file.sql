CREATE DATABASE IF NOT EXISTS `db_wbapp`;
USE `db_wbapp`;
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(8) unsigned NOT NULL auto_increment, 
  `user_lastname` varchar(180) NOT NULL default '',
  `user_firstname` varchar(180) NOT NULL default '',
  `user_email` varchar(180) NOT NULL default '',
  `user_password` varchar(180) NOT NULL default '',
  `user_access` varchar(180) NOT NULL default '',
  `user_date_added` date NOT NULL default '0000-00-00',
  `user_time_added` time  NOT NULL default '00:00:00',
   PRIMARY KEY  (`user_id`)
);
DROP TABLE IF EXISTS `tbl_delivery_item`;
CREATE TABLE `tbl_delivery_item` (
  `del_id` int(8) unsigned NOT NULL auto_increment,
  `prod_id` int(8) unsigned NOT NULL auto_increment,
  `user_id` int(8) unsigned NOT NULL auto_increment,
   PRIMARY KEY  (`del_id`)
);

DROP TABLE IF EXISTS `tbl_delivery`;
CREATE TABLE `tbl_delivery` (
  `delivery_id` int(8) unsigned NOT NULL auto_increment,
  `delivery_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY (`delivery_id`)
);

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `prod_id` int unsigned NOT NULL auto_increment,
   PRIMARY KEY  (`prod_id`)
);

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_transactions` (
  `customer_id` int unsigned NOT NULL auto_increment,
  `order_id` int unsigned NOT NULL auto_increment,
  `cus_fname` varchar(180) NOT NULL default,
  `cust_lname` varchar=(180) NOT NULL default,
   PRIMARY KEY  (`customer_id`)

);
DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE `tbl_orders` (
  `order_id` int(8) unsigned NOT NULL auto_increment,
  `customer_id` int(8) unsigned NOT NULL auto_increment,
  `user_id` int(8) unsigned NOT NULL auto_increment
   PRIMARY KEY  (`order_id`)
);

DROP TABLE IF EXISTS `order_item` ;
CREATE TABLE `tbl_order_item` (
  `item_id` int(8) unsigned NOT NULL auto_increment,
  `order_id` int(8) unsigned NOT NULL auto_increment,
  `prod_id` int(8) unsigned NOT NULL auto_increment,
  `order_quantity` int(180) NOT NULL default,
   KEY (`order_id`),
   PRIMARY KEY (`item_id`)


 );