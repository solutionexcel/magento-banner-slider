<?php
/**
 * SolutionExcel BannerSlider Module.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the SolutionExcel Team
 * that is bundled with this package of SolutionExcel Inc.
 * This package developed for Magento COMMUNITY edition.
 * =================================================================
 *
 * @category    SolutionExcel
 * @package     SolutionExcel_BannerSlider
 * @copyright   Copyright (c) 2016 SolutionExcel (http://www.solutionexcel.com/)
 *
 */

class SolutionExcel_BannerSlider_Adminhtml_BannerController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("bannerslider/banner")->_addBreadcrumb(Mage::helper("adminhtml")->__("Banner  Manager"),Mage::helper("adminhtml")->__("Banner Manager"));
				return $this;
		}
		
		/**
		 * Check for is allowed
		 *
		 * @return boolean
		 */
		 protected function _isAllowed() {
			return true;
		}
		
		public function indexAction() 
		{
			    $this->_title($this->__("BannerSlider"));
			    $this->_title($this->__("Manager Banner"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("BannerSlider"));
				$this->_title($this->__("Banner"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("bannerslider/banner")->load($id);
				if ($model->getId()) {
					Mage::register("banner_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("bannerslider/banner");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banner Manager"), Mage::helper("adminhtml")->__("Banner Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banner Description"), Mage::helper("adminhtml")->__("Banner Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("bannerslider/adminhtml_banner_edit"))->_addLeft($this->getLayout()->createBlock("bannerslider/adminhtml_banner_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("bannerslider")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

			$this->_title($this->__("Banner Slider"));
			$this->_title($this->__("Banner"));
			$this->_title($this->__("New Item"));
	
			$id   = $this->getRequest()->getParam("id");
			$model  = Mage::getModel("bannerslider/banner")->load($id);
	
			$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}
	
			Mage::register("banner_data", $model);
	
			$this->loadLayout();
			$this->_setActiveMenu("bannerslider/banner");
	
			$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
	
			$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banner Manager"), Mage::helper("adminhtml")->__("Banner Manager"));
			$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banner Description"), Mage::helper("adminhtml")->__("Banner Description"));
	
	
			$this->_addContent($this->getLayout()->createBlock("bannerslider/adminhtml_banner_edit"))->_addLeft($this->getLayout()->createBlock("bannerslider/adminhtml_banner_edit_tabs"));
	
			$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						
				 //save image
					try{
			
						if((bool)$post_data['filename']['delete']==1) {
						
									$post_data['filename']='';
						
						}
						else {
						
							unset($post_data['filename']);
						
							if (isset($_FILES)){
						
								if ($_FILES['filename']['name']) {
						
									if($this->getRequest()->getParam("id")){
										$model = Mage::getModel("bannerslider/banner")->load($this->getRequest()->getParam("id"));
										if($model->getData('filename')){
											$io = new Varien_Io_File();
											$io->rm(Mage::getBaseDir('media').DS.implode(DS,explode('/',$model->getData('filename'))));	
										}
									}
										$path = Mage::getBaseDir('media') . DS . 'bannerslider' . DS .'banner'.DS;
										$uploader = new Varien_File_Uploader('filename');
										$uploader->setAllowedExtensions(array('jpg','png','gif'));
										$uploader->setAllowRenameFiles(false);
										$uploader->setFilesDispersion(false);
										$destFile = $path.$_FILES['filename']['name'];
										$filename = $uploader->getNewFileName($destFile);
										$uploader->save($path, $filename);
				
										$post_data['filename']='bannerslider/banner/'.$filename;
								}
							}
						}
			
					} catch (Exception $e) {
							Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
							$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
							return;
					}
					//save image

						
						$currentTime = date('Y-m-d H:m:s', time());
						$post_data['created_time'] = $currentTime;
						$post_data['update_time'] = $currentTime;
						
						$model = Mage::getModel("bannerslider/banner")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Banner was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setBannerData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setBannerData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("bannerslider/banner");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("bannerslider/banner");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'banner.csv';
			$grid       = $this->getLayout()->createBlock('bannerslider/adminhtml_banner_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'banner.xml';
			$grid       = $this->getLayout()->createBlock('bannerslider/adminhtml_banner_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
