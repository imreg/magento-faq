<?php
/**
 * Support Status
 *
 * @package    Hand_Support_Model
 * @subpackage Hand_Support_Model_Status
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 0;
    const FEEDBACK_YES		= 'yes';
    const FEEDBACK_NO		= 'no';
	const HELP_YES			= 1;
	const HELP_NO			= 2;
    
	/**
	 * Status options
	 * @return array
	 */
    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('support')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('support')->__('Disabled')
        );
    }
}