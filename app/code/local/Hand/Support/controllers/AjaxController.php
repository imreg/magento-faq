<?php
/**
 * Support Ajax controller
 *
 * @package    Hand_Support
 * @subpackage Hand_Support_AjaxController
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_AjaxController extends Mage_Core_Controller_Front_Action
{
	/**
	 * @var Hand_Support_Model_Support
	 */
	protected $_support;
	
	/**
	 * Constructor of the class
	 */
	public function _construct()
	{
		$this->_support = Mage::getModel('support/support');
	}
	
	/**
	 * Ajax index page controller which response a result of database process 
	 */
    public function indexAction()
    {		
    	$result = null;    	    	    
    		 
    	if ($this->_isValidRequest()) {
    		$result = $this->_saveFeedback();
    	}
    	
		switch ($result)
		{
			case Hand_Support_Model_Status::HELP_YES:
				$response['result'] = 'OK';
				$response['message'] = 'We appreciate your feedback';
				break;
			case Hand_Support_Model_Status::HELP_NO:
				$response['result'] = 'OK';
				$response['message'] = 'Sorry to hear';
				break;
			default:
				$response['result'] = 'Error';
				$response['message'] = 'Error in transmission of feedback';
				break;			
		}
     	$this->getResponse()->setHeader('Content-type', 'application/json');
     	$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
    }    
    
    /**
     * Save post feedback in database
     * 
     * @return string
     */
    protected function _saveFeedback()
    {
    	$postRequest = $this->getRequest()->getPost();		
		$result = $this->_support->saveFeedback($postRequest);
		return $result;
    }
    
    /**
     * Validate the resultAction request
     *
     * @return bool
     */
    protected function _isValidRequest()
    {
    	return $this->getRequest()->isAjax() &&
    	$this->getRequest()->isPost();
    }
        
}