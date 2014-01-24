<?php
/**
 * Render Column value
 *
 * @package    Hand_Support_Block_Adminhtml_Widget_Grid_Column_Renderer
 * @subpackage Hand_Support_Block_Adminhtml_Widget_Grid_Column_Renderer_Interested
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Adminhtml_Widget_Grid_Column_Renderer_Interested extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	/**
	 * Render a summarized value where these values come from helpful and unhelpful columns
	 * 
	 * @see Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract::render()
	 */
	public function render(Varien_Object $row)
	{
		$summary = $row->getHelpful() + $row->getUnhelpful();
		return (string) $summary;
	}
}