<?php
/**
 * Support Model
 *
 * @package    Hand_Support_Model
 * @subpackage Hand_Support_Model_Support
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Model_Support extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('support/support');
    }
    
    /**
     * Query only the visible items
     *  
     * @return Hand_Support_Model_Mysql4_Support_Collection
     */
    public function getVisibleItems()
    {
    	$collection = $this->getCollection()    		
    		->addFilter('status',Hand_Support_Model_Status::STATUS_ENABLED)
    		->addOrder('sort_id', 'ASC');

    	return $collection;
    } 
    
    /**
     * Save feedback
     * @param array $post
     * @return integer
     */
    public function saveFeedback($post)
    {
    	$result = 0;
    	$method = strtolower($post['method']);
    	$id = $post['id'];
    	        	
    	if($method != null && is_numeric($id) )
    	{
    		$object = $this->load($id);    		    		
    		switch ($method)
    		{
    			case Hand_Support_Model_Status::FEEDBACK_YES:
    				$score = $object->getHelpful()+1;
    				$object->setHelpful($score);
    				$result = Hand_Support_Model_Status::HELP_YES;
    				break;
    			case Hand_Support_Model_Status::FEEDBACK_NO:
    				$score = $object->getUnhelpful()+1;
    				$object->setUnhelpful($score);
    				$result = Hand_Support_Model_Status::HELP_NO;
    				break;    				
    		}
    		$object->save();
    	}
    	return $result;
    }
}






