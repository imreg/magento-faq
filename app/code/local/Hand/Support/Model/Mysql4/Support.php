<?php
/**
 * Support Mysql
 *
 * @package    Hand_Support_Model_Mysql4
 * @subpackage Hand_Support_Model_Mysql4_Support
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Model_Mysql4_Support extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the support_id refers to the key field in your database table.
        $this->_init('support/support', 'support_id');
    }
}