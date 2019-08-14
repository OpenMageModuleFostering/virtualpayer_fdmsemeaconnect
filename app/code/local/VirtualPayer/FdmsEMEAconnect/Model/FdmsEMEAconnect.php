<?php

class VirtualPayer_FdmsEMEAconnect_Model_FdmsEMEAconnect extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fdmsemeaconnect/fdmsemeaconnect');
    }    
}