<?php

class VirtualPayer_Fdmsconnectredirect_Model_Fdmsconnectredirect extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fdmsconnectredirect/fdmsconnectredirect');
    }    
}