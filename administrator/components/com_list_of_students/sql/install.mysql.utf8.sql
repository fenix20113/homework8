CREATE TABLE IF NOT EXISTS `#__list_of_students_` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`surename` VARCHAR(20)  NOT NULL ,
`firstname` VARCHAR(10)  NOT NULL ,
`lastname` VARCHAR(15)  NOT NULL ,
`info` TEXT NOT NULL ,
`year` DATE NOT NULL ,
`photo` VARCHAR(255)  NOT NULL ,
`group` VARCHAR(10)  NOT NULL ,
`phone` VARCHAR(11)  NOT NULL ,
`sex` VARCHAR(255)  NOT NULL ,
`gradebook` VARCHAR(15)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;

