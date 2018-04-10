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

class SolutionExcel_BannerSlider_Block_Adminhtml_Banner extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_banner";
	$this->_blockGroup = "bannerslider";
	$this->_headerText = Mage::helper("bannerslider")->__("Banner Manager");
	$this->_addButtonLabel = Mage::helper("bannerslider")->__("Add New Item");
	parent::__construct();
	
	}

}