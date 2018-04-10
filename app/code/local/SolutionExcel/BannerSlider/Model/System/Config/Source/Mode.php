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

class SolutionExcel_BannerSlider_Model_System_Config_Source_Mode 
{
	/**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'horizontal', 'label' => Mage::helper('adminhtml')->__('horizontal')),
            array('value' => 'vertical', 'label' => Mage::helper('adminhtml')->__('vertical')),
            array('value' => 'fade', 'label' => Mage::helper('adminhtml')->__('fade')),
        );
    }
	
}