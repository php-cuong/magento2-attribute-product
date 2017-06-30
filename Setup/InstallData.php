<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-30 14:24:21
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-30 14:24:40
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\ProductAttributes\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'clothing_brand',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Clothing Brand',
                'input' => 'select',
                'source' => 'PHPCuong\ProductAttributes\Model\Attribute\Source\Brand',
                'frontend' => 'PHPCuong\ProductAttributes\Model\Attribute\Frontend\Brand',
                'backend' => 'PHPCuong\ProductAttributes\Model\Attribute\Backend\Brand',
                'required' => true,
                'sort_order' => 50,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
    }
}
