<?php
class Virtualpayer_Fdmsconnectredirect_Block_Adminhtml_Fdmsconnectredirect extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_fdmsconnectredirect';
    $this->_blockGroup = 'fdmsconnectredirect';
    $this->_headerText = Mage::helper('fdmsconnectredirect')->__('First Data Merchant Solution Transactions');
    parent::__construct();
    $this->_removeButton('add');
  }
}