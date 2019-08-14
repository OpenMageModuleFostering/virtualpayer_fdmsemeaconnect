<?php
/**
 * VirtualPayer_FdmsEMEAconnect extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   VirtualPayer
 * @package    VirtualPayer_FdmsEMEAconnect
 * @copyright  Copyright (c) 2016 VirtualPayer
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class VirtualPayer_FdmsEMEAconnect_Model_Source_Currency
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'base',
                'label' => Mage::helper('fdmsemeaconnect')->__('Use Base Currency')
            ),
            array(
                'value' => 'display',
                'label' => Mage::helper('fdmsemeaconnect')->__('Use Display Currency')
            ),
        );
    }
}

?>
