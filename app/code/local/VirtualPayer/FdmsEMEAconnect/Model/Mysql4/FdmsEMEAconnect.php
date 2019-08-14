<?php

class VirtualPayer_FdmsEMEAconnect_Model_Mysql4_FdmsEMEAconnect extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('fdmsemeaconnect/fdmsemeaconnect', 'fdmsemeaconnect_id');
    }
}