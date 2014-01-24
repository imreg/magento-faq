<?php
/**
 * Adminhtml Edit Form
 *
 * @package    Hand_Support_Block_Adminhtml_Support_Edit
 * @subpackage Hand_Support_Block_Adminhtml_Support_Edit_Form
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Adminhtml_Support_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                                      'id' => 'edit_form',
                                      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                                      'method' => 'post',
        							  'enctype' => 'multipart/form-data'
                                   )
      );

      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
  }
}