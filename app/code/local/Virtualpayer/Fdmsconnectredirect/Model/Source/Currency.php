<?php
/**
 * Virtualpayer_Fdmsconnectredirect Plugin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Virtualpayer
 * @package    Virtualpayer_Fdmsconnectredirect
 * @copyright  Copyright (c) 2013 VirtualPayer
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
 class Virtualpayer_Fdmsconnectredirect_Model_Source_Currency
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'base',
                'label' => Mage::helper('fdmsconnectredirect')->__('Use Base Currency')
            ),
            array(
                'value' => 'display',
                'label' => Mage::helper('fdmsconnectredirect')->__('Use Display Currency')
            ),
        );
    }
}

?>
