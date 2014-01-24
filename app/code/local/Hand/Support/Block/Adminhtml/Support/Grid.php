<?php
/**
 * Adminhtml Grid
 *
 * @package    Hand_Support_Block_Adminhtml_Support
 * @subpackage Hand_Support_Block_Adminhtml_Support_Grid
 * @author     Imre von Geczy <imre.geczy@yahoo.co.uk>
 */
class Hand_Support_Block_Adminhtml_Support_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('supportGrid');
      $this->setDefaultSort('support_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('support/support')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  /**
   * Prepare columns
   * 
   * @see Mage_Adminhtml_Block_Widget_Grid::_prepareColumns()
   */
  protected function _prepareColumns()
  {
      $this->addColumn('support_id', array(
          'header'    => Mage::helper('support')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'support_id',
      ));
      $this->addColumn('sort_id', array(
      		'header'    => Mage::helper('support')->__('Sort'),
      		'align'     =>'right',
      		'width'     => '50px',
      		'index'     => 'sort_id',
      ));		
      $this->addColumn('question', array(
          'header'    => Mage::helper('support')->__('Qestion'),
          'align'     =>'left',
          'index'     => 'question',
      ));
      $this->addColumn('helpful', array(
      		'header'    => Mage::helper('support')->__('Helpful'),
      		'align'     =>'right',
      		'width'     => '10px',
      		'index'     => 'helpful',
      ));
      $this->addColumn('unhelpful', array(
      		'header'    => Mage::helper('support')->__('Unhelpful'),
      		'align'     =>'right',
      		'width'     => '10px',
      		'index'     => 'unhelpful',
      ));    
      $this->addColumn('feedback', array(
      		'header'    => Mage::helper('support')->__('Feedback'),
      		'align'     =>'right',
      		'width'     => '10px',
      		'renderer'     => new Hand_Support_Block_Adminhtml_Widget_Grid_Column_Renderer_Interested(),
      ));
      $this->addColumn('visible', array(
          'header'    => Mage::helper('support')->__('Visible'),
          'align'     => 'left',
          'width'     => '10px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              0 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('support')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('support')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
			  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('support_id');
        $this->getMassactionBlock()->setFormFieldName('support');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('support')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('support')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('support/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('support')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('support')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}