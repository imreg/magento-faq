<?php
/**
 * Update table
 *
 * @package    
 * @subpackage 
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
$installer = $this;
$installer->startSetup ();

$data = array (
		array (
				'support_id' => 1,
				'sort_id' => 1,
				'question' => 'What is The Answer to The Ultimate Question of Life, the Universe, and Everything?',
				'answer' => 'Six by nine. Forty two. I always thought something was fundamentally wrong with the universe',
				'helpful' => 3,
				'unhelpful' => 2,
				'status' => 1,
				'created_time' => '2014-01-19 14:05:00',
				'update_time' => '2014-01-19 14:05:00' 
		),
		array (
				'support_id' => 2,
				'sort_id' => 2,
				'question' => 'Last message from dolphins?',
				'answer' => 'So Long, and Thanks for All the Fish.',
				'helpful' => 1,
				'unhelpful' => 6,
				'status' => 1,
				'created_time' => '2014-01-19 14:05:00',
				'update_time' => '2014-01-19 14:05:00' 
		),
		array (
				'support_id' => 3,
				'sort_id' => 3,
				'question' => 'How to begin the Encyclopedia Galactica?',
				'answer' => 'DON`T PANIC!',
				'helpful' => 9,
				'unhelpful' => 1,
				'status' => 1,
				'created_time' => '2014-01-19 14:05:00',
				'update_time' => '2014-01-19 14:05:00' 
		) 
);
foreach ( $data as $record ) {
	$installer->getConnection()->insert($installer->getTable('support'), $record);
}

$installer->endSetup (); 
