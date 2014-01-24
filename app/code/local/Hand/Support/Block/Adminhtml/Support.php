<?php
/**
 * Support Block Adminhtml
 *
 * @package    Hand_Support_Block_Adminhtml
 * @subpackage Hand_Support_Block_Adminhtml_Support
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Adminhtml_Support extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_support';
    $this->_blockGroup = 'support';
    $this->_headerText = Mage::helper('support')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('support')->__('Add Item');
    parent::__construct();
  }
}