<?php
namespace Selfd515\TestCase\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Selfd515\TestCase\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * Creates sample tasklist
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

//        if ($context->getVersion()
//            && version_compare($context->getVersion(),'1.1.0') < 0
//        ) {
            $tableName = $setup->getTable('selfd_testcase_tasks');

            $data = [
                [
                    'taskcontent' => 'First tasks in the tasklist.',
                ],
                [
                    'taskcontent' => 'Second tasks in the tasklist.',
                ],
            ];

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
//        }

        $setup->endSetup();
    }
}
