<?php
/**
 * Support Block
 *
 * @package    Hand_Support_Block
 * @subpackage Hand_Support_Block_Support
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Support extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
    public function getSupport()     
    { 
    	if (!$this->hasData('support')) {
        	$this->setData('support', Mage::registry('support'));
        }
        return $this->getData('support');        
    }
    
    public function getItems(){
    	return Mage::helper('support')->getItems();
    }
}