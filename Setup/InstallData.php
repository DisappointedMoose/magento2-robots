<?php
/**
 * Created by PhpStorm.
 * User: benny
 * Date: 17.07.18
 * Time: 13:07
 */

namespace DisappointedMoose\Robots\Setup;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    /**
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();

        //     $setup->getConnection()->query( SOME QUERY);

        $setup->endSetup();
    }
}