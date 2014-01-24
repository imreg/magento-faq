<?php
/**
 * Adminhtml Edit Form
 *
 * @package    Hand_Support_Block_Adminhtml_Support_Edit
 * @subpackage Hand_Support_Block_Adminhtml_Support_Edit_Tab_Form
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Adminhtml_Support_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{

	protected function _prepareForm()
  	{
    	$form = new Varien_Data_Form();
      	$this->setForm($form);
      	$fieldset = $form->addFieldset('support_form', array('legend'=>Mage::helper('support')->__('Item information')));
     
      	$fieldset->addField('question', 'text', array(
        	'label'     => Mage::helper('support')->__('Question'),
          	'class'     => 'required-entry',
          	'required'  => true,
          	'name'      => 'question',
      	));
      	$fieldset->addField('helpful', 'label', array(
          	'label'     => Mage::helper('support')->__('Helpful'),
          	'class'     => 'required-entry',
          	'name'      => 'helpful',
      	));
      	$fieldset->addField('unhelpful', 'label', array(
      		'label'     => Mage::helper('support')->__('Unhelpful'),
      		'class'     => 'required-entry',
      		'name'      => 'unhelpful',
      	));
      	$fieldset->addField('sort_id', 'text', array(
      		'label'     => Mage::helper('support')->__('Sort'),
      		'class'     => 'required-entry',
      		'style'   	=> 'width:20px',
      		'name'      => 'sort_id',
      	));
      	$fieldset->addField('status', 'select', array(
          	'label'     => Mage::helper('support')->__('Visible'),
          	'name'      => 'status',
          	'values'    => array(
            	array(
                	'value'     => 1,
                  	'label'     => Mage::helper('support')->__('Enabled'),
              	),

              	array(
                  	'value'     => 0,
                  	'label'     => Mage::helper('support')->__('Disabled'),
              	),
          	),
      	));
     
      	$fieldset->addField('answer', 'editor', array(
          	'name'      => 'answer',
          	'label'     => Mage::helper('support')->__('Answer'),
          	'title'     => Mage::helper('support')->__('Answer'),
          	'style'     => 'width:700px; height:200px;',
          	'wysiwyg'   => false,
          	'required'  => true,
      	));
     
      	if ( Mage::getSingleton('adminhtml/session')->getSupportData() )
      	{
          	$form->setValues(Mage::getSingleton('adminhtml/session')->getSupportData());
          	Mage::getSingleton('adminhtml/session')->setSupportData(null);
      	} elseif ( Mage::registry('support_data') ) {
          	$form->setValues(Mage::registry('support_data')->getData());
      	}
      	return parent::_prepareForm();
  	}
}