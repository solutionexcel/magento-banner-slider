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

class SolutionExcel_BannerSlider_Model_Mysql4_Banner_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

	public function _construct(){
		$this->_init("bannerslider/banner");
	}

	

}
	 