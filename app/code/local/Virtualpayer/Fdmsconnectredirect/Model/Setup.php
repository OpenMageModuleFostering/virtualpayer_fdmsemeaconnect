<?php

class Virtualpayer_Fdmsconnectredirect_Model_Setup extends Mage_Eav_Model_Entity_Setup
{

	public function createStaticBlocks(){
		$error = Mage::getModel('cms/block');
		$error->setTitle('Fdmsconnectredirect Error Message')
				->setIdentifier('fdmsconnectredirect_error')
				->setContent('{{var response.message}}')
				->setCreationTime(date('Y-m-d H:i:s'))
				->setUpdateTime(date('Y-m-d H:i:s'))
				->setIsActive(1)
				->setStores(0)
				->save();
						
		$success = Mage::getModel('cms/block');
		$success->setTitle('Fdmsconnectredirect Success Message')
				->setIdentifier('fdmsconnectredirect_success')
				->setContent('{{var response.message}}')
				->setCreationTime(date('Y-m-d H:i:s'))
				->setUpdateTime(date('Y-m-d H:i:s'))
				->setIsActive(1)
				->setStores(0)
				->save();
		
		$redirect = Mage::getModel('cms/block');
		$redirect->setTitle('Fdmsconnectredirect Redirect Message')
				->setIdentifier('fdmsconnectredirect_redirect')
				->setContent('You will be redirected to First Data in a few seconds.')
				->setCreationTime(date('Y-m-d H:i:s'))
				->setUpdateTime(date('Y-m-d H:i:s'))
				->setIsActive(1)
				->setStores(0)
				->save();
	}

}