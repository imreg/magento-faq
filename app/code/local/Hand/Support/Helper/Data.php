<?php
/**
 * Helper Data
 *
 * @package    Hand_Support_Helper
 * @subpackage Hand_Support_Helper_Data
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
	 * Call all of records which are visible
	 */
	public function getItems()
	{
		$items = $this->_getItems();
		return $items->getVisibleItems();
	}
	
	protected function _getItems()
	{
		return Mage::getModel('support/support');
	}
}