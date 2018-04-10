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

class SolutionExcel_BannerSlider_Model_System_Config_Source_Order 
{
	/**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('adminhtml')->__('ID - ASC')),
            array('value' => 2, 'label' => Mage::helper('adminhtml')->__('ID - DESC')),
			array('value' => 3, 'label' => Mage::helper('adminhtml')->__('Order - ASC')),
			array('value' => 4, 'label' => Mage::helper('adminhtml')->__('Order - DESC')),
        );
    }
	
}