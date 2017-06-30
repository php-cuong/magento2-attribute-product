<?php

/**
 * @Author: Ngo Quang Cuong
 * @Date:   2017-06-30 14:44:42
 * @Last Modified by:   nquangcuong
 * @Last Modified time: 2017-06-30 14:44:58
 * @website: http://giaphugroup.com
 */

namespace PHPCuong\ProductAttributes\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '2.1.1') < 0) {
            /** @var EavSetup $eavSetup */
            $eavSetup= $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->updateAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'clothing_brand',
                [
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => true,
                    'is_filterable_in_grid' => true
                ]
            );
        }

        $setup->endSetup();
    }
}
