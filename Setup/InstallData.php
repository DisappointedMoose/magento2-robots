<?php

namespace DisappointedMoose\Robots\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Category;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    protected $eavSetupFactory;

    /**
     * InstallData constructor.
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // Add Product Attribute
        $eavSetup->addAttribute(
            Product::ENTITY,
            \DisappointedMoose\Robots\Helper\Data::ROBOTS_ATTRIBUTE_CODE,
            [
                'group'                   => 'Search Engine Optimization',
                'type'                    => 'int',
                'backend'                 => '',
                'frontend'                => '',
                'source'                  => 'DisappointedMoose\Robots\Model\Eav\Entity\Attribute\Source\Robots',
                'label'                   => 'Meta Robots',
                'input'                   => 'select',
                'class'                   => '',
                'global'                  => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'                 => true,
                'required'                => false,
                'user_defined'            => true,
                'searchable'              => false,
                'filterable'              => false,
                'comparable'              => false,
                'visible_on_front'        => false,
                'used_in_product_listing' => false,
                'unique'                  => false,
                'apply_to'                => '',
            ]
        );

        // Add Category Attribute
        $eavSetup->addAttribute(
            Category::ENTITY,
            \DisappointedMoose\Robots\Helper\Data::ROBOTS_ATTRIBUTE_CODE,
            [
                'group'                   => 'Search Engine Optimization',
                'type'                    => 'int',
                'backend'                 => '',
                'frontend'                => '',
                'source'                  => 'DisappointedMoose\Robots\Model\Eav\Entity\Attribute\Source\Robots',
                'label'                   => 'Meta Robots',
                'input'                   => 'select',
                'class'                   => '',
                'global'                  => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'                 => true,
                'required'                => false,
                'user_defined'            => true,
                'searchable'              => false,
                'filterable'              => false,
                'comparable'              => false,
                'visible_on_front'        => false,
                'used_in_product_listing' => false,
                'unique'                  => false,
                'apply_to'                => '',
            ]
        );

        $setup->endSetup();
    }
}