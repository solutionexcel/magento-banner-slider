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
 
class SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("bannerGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("bannerslider/banner")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("bannerslider")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                $this->addColumn("filename", array(
				"header" => Mage::helper("bannerslider")->__("Image"),
				"width" => "150px",
				"index" => "filename",
				"renderer"  => "SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Grid_Renderer_Image",
				'filter'    => false,
      			'sortable'  => false
				));
				$this->addColumn("title", array(
				"header" => Mage::helper("bannerslider")->__("Title"),
				"index" => "title",
				));
				$this->addColumn("url", array(
				"header" => Mage::helper("bannerslider")->__("Banner Url"),
				"index" => "url",
				));
				$this->addColumn('status', array(
				'header' => Mage::helper('bannerslider')->__('Enable/Disable'),
				"width" => "100px",
				'index' => 'status',
				'type' => 'options',
				'options'=>SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Grid::getOptionArray5(),				
				));
						
				$this->addColumn("order", array(
				"header" => Mage::helper("bannerslider")->__("Order"),
				"width" => "50px",
				"index" => "order",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_banner', array(
					 'label'=> Mage::helper('bannerslider')->__('Remove Banner'),
					 'url'  => $this->getUrl('*/adminhtml_banner/massRemove'),
					 'confirm' => Mage::helper('bannerslider')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='No';
            $data_array[1]='Yes';
			return($data_array);
		}
		static public function getValueArray5()
		{
            $data_array=array();
			foreach(SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}