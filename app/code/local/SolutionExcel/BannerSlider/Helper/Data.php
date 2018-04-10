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
 
class SolutionExcel_BannerSlider_Helper_Data extends Mage_Core_Helper_Abstract
{
	protected function getStoreId(){
		return Mage::app()->getStore()->getStoreId();
	}
	public function isEnable(){
		return Mage::getStoreConfig('bannerslider/general/enable', $this->getStoreId());	
	}
	
	public function isResponsive(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/responsive', $this->getStoreId());	
	}
	
	public function getSliderMode(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/mode', $this->getStoreId());	
	}
	
	public function getSliderSpeed(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/speed', $this->getStoreId());	
	}
	
	public function isAuto(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/auto', $this->getStoreId());	
	}
	
	public function getAutoPause(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/pause', $this->getStoreId());	
	}
	
	public function isAutoHover(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/autoHover', $this->getStoreId());	
	}
	
	public function isPager(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/pager', $this->getStoreId());	
	}
	
	public function isControls(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/controls', $this->getStoreId());	
	}
	
	public function isCaptions(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/captions', $this->getStoreId());	
	}
	
	public function getOrderBy(){
		return Mage::getStoreConfig('bannerslider/sliderconfig/orderby', $this->getStoreId());	
	}
	
}
	 