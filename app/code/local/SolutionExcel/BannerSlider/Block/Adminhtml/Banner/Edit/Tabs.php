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

class SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
			parent::__construct();
			$this->setId("banner_tabs");
			$this->setDestElementId("edit_form");
			$this->setTitle(Mage::helper("bannerslider")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
			$this->addTab("form_section", array(
				"label" => Mage::helper("bannerslider")->__("Item Information"),
				"title" => Mage::helper("bannerslider")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("bannerslider/adminhtml_banner_edit_tab_form")->toHtml(),
			));
			return parent::_beforeToHtml();
		}

}
