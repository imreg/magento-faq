<?php
/**
 * Support index controller
 *
 * @package    Hand_Support
 * @subpackage Hand_Support_IndexController
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_IndexController extends Mage_Core_Controller_Front_Action
{	
    public function indexAction()
    {    				
		$this->loadLayout();     
		$this->renderLayout();
    }    
}