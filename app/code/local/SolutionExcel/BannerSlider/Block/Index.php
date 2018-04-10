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

class SolutionExcel_BannerSlider_Block_Index extends Mage_Core_Block_Template{   
	
	public function getBanners(){
		$helper = Mage::helper('bannerslider'); 
		$collection = Mage::getModel('bannerslider/banner')->getCollection();
		$collection->addFieldToFilter('status', array('eq' => 1));
		
		if($helper->getOrderBy()==1){
			$collection->getSelect()->order('id ASC');
		}
		
		if($helper->getOrderBy()==2){
			$collection->getSelect()->order('id DESC');
		}
		
		if($helper->getOrderBy()==3){
			$collection->getSelect()->order('order ASC');
		}
		
		if($helper->getOrderBy()==4){
			$collection->getSelect()->order('order DESC');
		}
		
		
		return $collection;
    }
	

}