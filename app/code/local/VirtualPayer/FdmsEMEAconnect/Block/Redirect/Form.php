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
class VirtualPayer_FdmsEMEAconnect_Block_Redirect_Form extends Mage_Payment_Block_Form
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->setTemplate('fdmsemeaconnect/redirect/form.phtml');
        parent::_construct();
    }
}