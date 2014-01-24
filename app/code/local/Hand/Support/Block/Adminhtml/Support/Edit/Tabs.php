<?php
/**
 * Adminhtml Edit tabs
 *
 * @package    Hand_Support_Block_Adminhtml_Support_Edit
 * @subpackage Hand_Support_Block_Adminhtml_Support_Edit_Tabs
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Adminhtml_Support_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('support_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('support')->__('Help and Support'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('support')->__('Item Information'),
          'title'     => Mage::helper('support')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('support/adminhtml_support_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}