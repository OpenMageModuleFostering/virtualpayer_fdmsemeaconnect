<?php

class Virtualpayer_Fdmsconnectredirect_Model_Mysql4_Fdmsconnectredirect extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('fdmsconnectredirect/fdmsconnectredirect', 'fdmsconnectredirect_id');
    }
}