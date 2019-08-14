<?php

class Virtualpayer_Fdmsconnectredirect_Block_Adminhtml_Fdmsconnectredirect_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('fdmsconnectGrid');
      $this->setDefaultSort('timestamp');
      $this->setDefaultDir('DESC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('fdmsconnectredirect/fdmsconnectredirect')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }
  
     /**
     * Return Current work store
     *
     * @return Mage_Core_Model_Store
     */
    protected function _getStore()
    {
        return Mage::app()->getStore();
    }

  protected function _prepareColumns()
  {

     $this->addColumn('order_id', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Order ID'),
          'index'     => 'order_id',
     ));

      $this->addColumn('timestamp', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Timestamp'),
          'type'        => 'datetime',
          'index'     => 'timestamp',
     ));


      $this->addColumn('oid', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('fdmsconnectredirect Order ID'),
          'index'     => 'oid',
     ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Status'),
          'index'     => 'status',
          'width'     => '50px',

     ));

      $this->addColumn('fail_reason', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Fail Reason'),
          'index'     => 'fail_reason',
     ));

      $this->addColumn('cardnumber', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Card Number'),
          'index'     => 'cardnumber',
     ));

      $this->addColumn('currency', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Currency'),
          'index'     => 'currency',
          'width'     => '50px',
     ));

      $this->addColumn('refnumber', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Referance Number'),
          'index'     => 'refnumber',
     ));

      $this->addColumn('chargetotal', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Amount'),
          'index'     => 'chargetotal',
     ));

      $this->addColumn('paymentMethod', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Payment Method'),
          'index'     => 'paymentMethod',
     ));

      $this->addColumn('processor_response_code', array(
          'header'    => Mage::helper('fdmsconnectredirect')->__('Response Code'),
          'index'     => 'processor_response_code',
     ));

    
	
		$this->addExportType('*/*/exportCsv', Mage::helper('fdmsconnectredirect')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('fdmsconnectredirect')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('fdmsconnectredirect_id');
        $this->getMassactionBlock()->setFormFieldName('fdmsconnectredirect');
        
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}