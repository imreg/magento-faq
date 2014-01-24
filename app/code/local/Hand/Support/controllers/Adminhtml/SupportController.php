<?php
/**
 * Support Admin controller
 *
 * @package    Hand_Support_Adminhtml
 * @subpackage Hand_Support_Adminhtml_SupportController
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Adminhtml_SupportController extends Mage_Adminhtml_Controller_action
{
	/**
	 *	Initial action
	 *	@return Hand_Support_Adminhtml_SupportController  
	 */
	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('support/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
		
		return $this;
	}   
 
	/**
	 * Index controller
	 * 
	 */
	public function indexAction() {
		$this->_initAction()
			->_addContent($this->getLayout()->createBlock('support/adminhtml_support'))
			->renderLayout();
	}

	/**
	 * Edit controller
	 * 
	 */
	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('support/support')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('support_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('support/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('support/adminhtml_support_edit'))
				->_addLeft($this->getLayout()->createBlock('support/adminhtml_support_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('support')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 	
	/**
	 * New record controller
	 * 
	 */
	public function newAction() {
		$this->_forward('edit');
	}
 
	/**
	 * Save a record controller
	 * 
	 */
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
				
			$model = Mage::getModel('support/support');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('support')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('support')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}
 
	/**
	 * Delete a record by id 
	 * 
	 */
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('support/support');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
}