<?php

class VirtualPayer_FdmsEMEAconnect_Block_Adminhtml_FdmsEMEAconnect_Grid extends Mage_Adminhtml_Block_Widget_Grid
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
      $collection = Mage::getModel('fdsmemeaconnect/fdsmemeaconnect')->getCollection();
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
          'header'    => Mage::helper('fdsmemeaconnect')->__('Order ID'),
          'index'     => 'order_id',
     ));

      $this->addColumn('timestamp', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Timestamp'),
          'type'        => 'datetime',
          'index'     => 'timestamp',
     ));


      $this->addColumn('oid', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('fdsmemeaconnect Order ID'),
          'index'     => 'oid',
     ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Status'),
          'index'     => 'status',
          'width'     => '50px',

     ));

      $this->addColumn('fail_reason', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Fail Reason'),
          'index'     => 'fail_reason',
     ));

      $this->addColumn('cardnumber', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Card Number'),
          'index'     => 'cardnumber',
     ));

      $this->addColumn('currency', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Currency'),
          'index'     => 'currency',
          'width'     => '50px',
     ));

      $this->addColumn('refnumber', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Referance Number'),
          'index'     => 'refnumber',
     ));

      $this->addColumn('chargetotal', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Amount'),
          'index'     => 'chargetotal',
     ));

      $this->addColumn('paymentMethod', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Payment Method'),
          'index'     => 'paymentMethod',
     ));

      $this->addColumn('processor_response_code', array(
          'header'    => Mage::helper('fdsmemeaconnect')->__('Response Code'),
          'index'     => 'processor_response_code',
     ));

    
	
		$this->addExportType('*/*/exportCsv', Mage::helper('fdsmemeaconnect')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('fdsmemeaconnect')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('fdsmemeaconnect_id');
        $this->getMassactionBlock()->setFormFieldName('fdsmemeaconnect');
        
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}