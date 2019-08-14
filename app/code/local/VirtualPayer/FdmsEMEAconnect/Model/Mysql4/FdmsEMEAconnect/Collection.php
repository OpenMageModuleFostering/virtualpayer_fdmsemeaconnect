<?php

class VirtualPayer_FdmsEMEAconnect_Model_Mysql4_FdmsEMEAconnect_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fdmsemeaconnect/fdmsemeaconnect');
    }
}