<?php
/**
 * Setup script create a table
 *
 * @package    
 * @subpackage 
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
$installer = $this;

$installer->startSetup();

$installer->run("

CREATE TABLE {$this->getTable('support')} (
  `support_id` INT(11) unsigned NOT NULL auto_increment,
  `sort_id` INT(10) UNSIGNED NOT NULL default '0',
  `question` VARCHAR(255) NOT NULL default '',
  `answer` TEXT NOT NULL default '',
  `helpful` INT(10) UNSIGNED NOT NULL,
  `unhelpful` INT(10) UNSIGNED NOT NULL,
  `status` SMALLINT(6) NOT NULL default '0',
  `created_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 