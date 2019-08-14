<?php
class VirtualPayer_FdmsEMEAconnect_Block_Adminhtml_FdmsEMEAconnect extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_fdmsemeaconnect';
    $this->_blockGroup = 'fdmsemeaconnect';
    $this->_headerText = Mage::helper('fdmsemeaconnect')->__('First Data Merchant Solution Transactions');
    parent::__construct();
    $this->_removeButton('add');
  }
}