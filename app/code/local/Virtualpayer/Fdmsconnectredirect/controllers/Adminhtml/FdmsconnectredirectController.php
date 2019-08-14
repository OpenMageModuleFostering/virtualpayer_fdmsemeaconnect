<?php

class Virtualpayer_Fdmsconnectredirect_Adminhtml_FdmsconnectredirectController extends Mage_Adminhtml_Controller_Action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('fdmsconnectredirect/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Fdmsconnect Transactions Manager'), Mage::helper('adminhtml')->__('Fdmsconnect Transactions Manager'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('fdmsconnectredirect/fdmsconnectredirect')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('fdmsconnectredirect_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('fdmsconnectredirect/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('fdmsconnectredirect Manager'), Mage::helper('adminhtml')->__('fdmsconnectredirect Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Code News'), Mage::helper('adminhtml')->__('Code News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('fdmsconnectredirect/adminhtml_fdmsconnectredirect_edit'))
				->_addLeft($this->getLayout()->createBlock('fdmsconnectredirect/adminhtml_fdmsconnectredirect_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('fdmsconnectredirect')->__('Code does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
	
	public function uploadAction() {
			$this->loadLayout();
			$this->_setActiveMenu('fdmsconnectredirect/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('fdmsconnectredirect Manager'), Mage::helper('adminhtml')->__('fdmsconnectredirect Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Code Import'), Mage::helper('adminhtml')->__('Code Import'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('fdmsconnectredirect/adminhtml_fdmsconnectredirect_import'))
				->_addLeft($this->getLayout()->createBlock('fdmsconnectredirect/adminhtml_fdmsconnectredirect_import_tabs'));

			$this->renderLayout();
	}
	
	public function importCSV(){
		try {	
			$uploader = new Varien_File_Uploader('filename');
       		$uploader->setAllowedExtensions(array('csv'));
			$uploader->setAllowRenameFiles(false);
			$uploader->setFilesDispersion(false);
					
			$path = Mage::getBaseDir('media') . DS ;
			$uploader->save($path, $_FILES['filename']['name'] );

			$row = 1;
			if (($handle = fopen($path . $_FILES['filename']['name'], "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			    	if($row == 1){
				        $num = count($data);				        
				        $headings = array();
				        for ($c=0; $c < $num; $c++) {
							$headings[$c] = $data[$c];
						}
				    	$row++;
				    	continue;
			    	}else{
    					$model = Mage::getModel('fdmsconnectredirect/fdmsconnectredirect');
				        $row++;
				        $num = count($data);				        
				        for ($c=0; $c < $num; $c++) {
		            		$model->setData($headings[$c], $data[$c]);
		            	}
						$model->save();
				    }
			    }
			    fclose($handle);
			}else{
		        Mage::throwException('File Not Found');
			}
			
		} catch (Exception $e) {
      		Mage::throwException($e->getMessage());
        }
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
			if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
				$this->importCSV();
				$this->_redirect('*/*/');
				return;
			}
	  			
			$model = Mage::getModel('fdmsconnectredirect/fdmsconnectredirect');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('fdmsconnectredirect')->__('Code was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('fdmsconnectredirect')->__('Unable to find code to save'));
        $this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('fdmsconnectredirect/fdmsconnectredirect');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Code was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction() {
        $fdmsconnectredirectIds = $this->getRequest()->getParam('fdmsconnectredirect');
        if(!is_array($fdmsconnectredirectIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select code(s)'));
        } else {
            try {
                foreach ($fdmsconnectredirectIds as $fdmsconnectredirectId) {
                    $fdmsconnectredirect = Mage::getModel('fdmsconnectredirect/fdmsconnectredirect')->load($fdmsconnectredirectId);
                    $fdmsconnectredirect->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d code(s) were successfully deleted', count($fdmsconnectredirectIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
    public function massStatusAction()
    {
        $fdmsconnectredirectIds = $this->getRequest()->getParam('fdmsconnectredirect');
        if(!is_array($fdmsconnectredirectIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select code(s)'));
        } else {
            try {
                foreach ($fdmsconnectredirectIds as $fdmsconnectredirectId) {
                    $fdmsconnectredirect = Mage::getSingleton('fdmsconnectredirect/fdmsconnectredirect')
                        ->load($fdmsconnectredirectId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d code(s) were successfully updated', count($fdmsconnectredirectIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
    
    public function massAssignAction(){
    	$fdmsconnectredirectIds = $this->getRequest()->getParam('fdmsconnectredirect');
        if(!is_array($fdmsconnectredirectIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select code(s)'));
        } else {
            try {
                foreach ($fdmsconnectredirectIds as $fdmsconnectredirectId) {
                    $fdmsconnectredirect = Mage::getSingleton('fdmsconnectredirect/fdmsconnectredirect')
                        ->load($fdmsconnectredirectId)
                        ->setAgentId($this->getRequest()->getParam('agent_id'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d code(s) were successfully updated', count($fdmsconnectredirectIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'fdmsconnectredirect.csv';
        $content    = $this->getLayout()->createBlock('fdmsconnectredirect/adminhtml_fdmsconnectredirect_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'fdmsconnectredirect.xml';
        $content    = $this->getLayout()->createBlock('fdmsconnectredirect/adminhtml_fdmsconnectredirect_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}