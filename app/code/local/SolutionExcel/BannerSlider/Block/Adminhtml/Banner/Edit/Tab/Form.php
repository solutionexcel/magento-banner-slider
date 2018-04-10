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

class SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

			$form = new Varien_Data_Form();
			$this->setForm($form);
			$fieldset = $form->addFieldset("bannerslider_form", array("legend"=>Mage::helper("bannerslider")->__("Item information")));

			
			$fieldset->addField("title", "text", array(
				"label" => Mage::helper("bannerslider")->__("Title"),					
				"class" => "required-entry",
				"required" => true,
				"name" => "title",
			));
		
			$fieldset->addField('filename', 'image', array(
				'label' => Mage::helper('bannerslider')->__('Image'),
				'name' => 'filename',
				'note' => '(*.jpg, *.png, *.gif)',
			));
			
			$fieldset->addField("url", "text", array(
				"label" => Mage::helper("bannerslider")->__("Banner Url"),					
				"required" => false,
				"name" => "url",
			));
			
			$fieldset->addField("description", "textarea", array(
				"label" => Mage::helper("bannerslider")->__("Description"),					
				"required" => false,
				"name" => "description",
			));
			
					
			 $fieldset->addField('status', 'select', array(
				'label'     => Mage::helper('bannerslider')->__('Enable/Disable'),
				'values'   => SolutionExcel_BannerSlider_Block_Adminhtml_Banner_Grid::getValueArray5(),
				'name' => 'status',
			));
			$fieldset->addField("order", "text", array(
				"label" => Mage::helper("bannerslider")->__("Order"),
				"name" => "order",
			));
				

			if (Mage::getSingleton("adminhtml/session")->getBannerData())
			{
				$form->setValues(Mage::getSingleton("adminhtml/session")->getBannerData());
				Mage::getSingleton("adminhtml/session")->setBannerData(null);
			} 
			elseif(Mage::registry("banner_data")) {
				$form->setValues(Mage::registry("banner_data")->getData());
			}
			return parent::_prepareForm();
		}
}
