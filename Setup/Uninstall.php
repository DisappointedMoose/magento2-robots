<?php

namespace DisappointedMoose\Robots\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Category;

class Uninstall implements \Magento\Framework\Setup\UninstallInterface
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
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // Remove Product Attribute
        $eavSetup->removeAttribute(Product::ENTITY, \DisappointedMoose\Robots\Helper\Data::ROBOTS_ATTRIBUTE_CODE);

        // Remove Category Attribute
        $eavSetup->removeAttribute(Category::ENTITY, \DisappointedMoose\Robots\Helper\Data::ROBOTS_ATTRIBUTE_CODE);

        // Remove CMS Attribute
        $installer->getConnection()->dropColumn(
            $installer->getTable('cms_page'),
            \DisappointedMoose\Robots\Helper\Data::ROBOTS_ATTRIBUTE_CODE
        );

        $installer->endSetup();
    }
}