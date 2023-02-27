CREATE DATABASE IF NOT EXISTS db_wbapp;
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
  `user_date_updated` date NOT NULL default '0000-00-00',
  `user_time_updated` time NOT NULL default '00:00:00',
  `user_status` int(1) NOT NULL default '0',
   PRIMARY KEY  (`user_id`)
)ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `prod_id` int(8) unsigned NOT NULL auto_increment,
  `product_name` varchar(180) NOT NULL,
  `brand` varchar(180) NOT NULL,
  `product_type` varchar(180),
  `price` varchar(180) NOT NULL,
  `quantity` int(20) NOT NULL,
  PRIMARY KEY  (`prod_id`)
)ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_delivery_item`;
CREATE TABLE `tbl_delivery_item` (
  `del_id` int(8) unsigned NOT NULL auto_increment,
  `prod_id` int(8)  NOT NULL,
  `user_id` int(8)  NOT NULL,
   KEY (`prod_id`),
   KEY (`user_id`),
   PRIMARY KEY  (`del_id`)
);

DROP TABLE IF EXISTS `tbl_delivery`;
CREATE TABLE `tbl_delivery` (
  `delivery_id` int(8) unsigned NOT NULL auto_increment,
  `delivery_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY (`delivery_id`)
);

DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE `tbl_orders` (
  `order_id` int(8) unsigned NOT NULL auto_increment,
  `customer_id` int(8)  NOT NULL,
  `user_id` int(8)  NOT NULL,
   KEY (`customer_id`),
   KEY (`user_id`),
   PRIMARY KEY  (`order_id`)
);

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer` (
  `customer_id` int(8) unsigned NOT NULL auto_increment,
  `order_id` int(8) NOT NULL,
  `cus_fname`varchar(180) NOT NULL default'',
  `cust_lname` varchar(180) NOT NULL default'',
   KEY (`order_id`),
   PRIMARY KEY  (`customer_id`)
);

DROP TABLE IF EXISTS `tbl_order_item` ;
CREATE TABLE `tbl_order_item` (
  `item_id` int(8) unsigned NOT NULL auto_increment,
  `order_id` int(8) NOT NULL,
 `prod_id` int(8) NOT NULL,
  `order_quantity` varchar(180) NOT NULL default'',
   KEY (`order_id`),
   KEY (`prod_id`),
   PRIMARY KEY  (`item_id`)
 );