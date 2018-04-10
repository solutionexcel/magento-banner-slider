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
 
class SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

	public function render(Varien_Object $row)
	{
		$value =  $row->getData($this->getColumn()->getIndex());
		$mediaUrl =  Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
		if($value!=""){
			return '<img width="150" src="'. $mediaUrl.$value .'" alt="" />';
		} else {
			return "";	
		}
	
	}
		

}