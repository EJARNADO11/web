CREATE DATABASE IF NOT EXISTS db_wbapp;
USE `db_file`;
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


DROP TABLE IF EXISTS `tbl_type`;
CREATE TABLE `tbl_type` (
  `type_id` int(3) unsigned NOT NULL auto_increment, 
  `type_name` varchar(180) NOT NULL default '',
  `type_date_added` date NOT NULL default '0000-00-00',
  `type_time_added` time NOT NULL default '00:00:00',	
  `type_date_updated` date NOT NULL default '0000-00-00',
  `type_time_updated` time NOT NULL default '00:00:00',	
  `type_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=301;

INSERT INTO tbl_type(type_name,type_date_added,type_time_added,type_status) 
VALUES ("Instant Noodles",NOW(),NOW(),'1');
INSERT INTO tbl_type(type_name,type_date_added,type_time_added,type_status) 
VALUES ("Canned Goods",NOW(),NOW(),'1');
INSERT INTO tbl_type(type_name,type_date_added,type_time_added,type_status) 
VALUES ("Frozen Goods",NOW(),NOW(),'1');
INSERT INTO tbl_type(type_name,type_date_added,type_time_added,type_status) 
VALUES ("Bread and Pastries",NOW(),NOW(),'1');

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `prod_id` int(8) unsigned NOT NULL auto_increment, 
  `prod_name` varchar(180) NOT NULL default '',
  `prod_description` varchar(180) NOT NULL default '',
  `prod_price` int(20) NOT NULL default '0.00',
  `prod_image` varchar(180) NOT NULL default '',
  `prod_date_added` date NOT NULL default '0000-00-00',
  `prod_time_added` time NOT NULL default '00:00:00',	
  `prod_date_updated` date NOT NULL default '0000-00-00',
  `prod_time_updated` time NOT NULL default '00:00:00',	
  `prod_status` int(1) NOT NULL default '0',
  `type_id` int(3) NOT NULL default '0',
  PRIMARY KEY  (`prod_id`),
  KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_product_pricing`;
CREATE TABLE `tbl_product_pricing` (
  `prod_id` int(8) NOT NULL default '0',
  `prod_retail_price` decimal(10,2) NOT NULL default '0.00',
  KEY  (`prod_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_product_inv`;
CREATE TABLE `tbl_product_inv` (
  `rec_id` int(8) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `prod_qty` int(8) NOT NULL default '0',
  KEY  (`prod_id`),
  KEY (`rec_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_product_qty`;
CREATE TABLE `tbl_product_qty` (
  `prodqty_id` int(8) unsigned NOT NULL auto_increment, 
  `prodqty_date_added` date NOT NULL default '0000-00-00',
  `prodqty_time_added` time NOT NULL default '00:00:00',	
  `prodqty_date_updated` date NOT NULL default '0000-00-00',
  `prodqty_time_updated` time NOT NULL default '00:00:00',	
  `prodqty_quantity` int(10) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  PRIMARY KEY  (`prodqty_id`),
  KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_receive`;
CREATE TABLE `tbl_receive` (
  `rec_id` int(8) unsigned NOT NULL auto_increment, 
  `rec_supplier` varchar(180) NOT NULL default '',
  `rec_description` varchar(180) NOT NULL default '',
  `rec_amount` int(10) NOT NULL default '0',
  `rec_date_added` date NOT NULL default '0000-00-00',
  `rec_time_added` time NOT NULL default '00:00:00',
  `rec_saved` int(1) NOT NULL default '0',	
  `rec_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`rec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_receive_items`;
CREATE TABLE `tbl_receive_items` (
  `rec_id` int(8) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `rec_qty` int(8) NOT NULL default '0',
  KEY  (`rec_id`),
  KEY  (`prod_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_release`;
CREATE TABLE `tbl_release` (
  `rel_id` int(8) unsigned NOT NULL auto_increment, 
  `rel_customer` varchar(180) NOT NULL default '',
  `rel_description` varchar(180) NOT NULL default '',
  `rel_amount` int(10) NOT NULL default '0',
  `rel_date_added` date NOT NULL default '0000-00-00',
  `rel_time_added` time NOT NULL default '00:00:00',
  `rel_saved` int(1) NOT NULL default '0',	
  `rel_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`rel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_release_items`;
CREATE TABLE `tbl_release_items` (
  `rel_id` int(8) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `rel_qty` int(8) NOT NULL default '0',
  KEY  (`rel_id`),
  KEY  (`prod_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_release_inv`;
CREATE TABLE `tbl_release_inv` (
  `rel_id` int(8) NOT NULL default '0',
  `prod_id` int(8) NOT NULL default '0',
  `prod_qty` int(8) NOT NULL default '0',
  KEY  (`prod_id`),
  KEY (`rel_id`)
) ENGINE=MyISAM;