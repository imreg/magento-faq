<?php
/**
 * Mysql Collection
 *
 * @package    Hand_Support_Model_Mysql4
 * @subpackage Hand_Support_Model_Mysql4_Support_Collection
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Model_Mysql4_Support_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('support/support');
    }
}