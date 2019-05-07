<?php
namespace VuDacKyAnh\Test\Setup;
use Magento\Framework\DB\Ddl\Table;
use	Magento\Framework\Setup\UpgradeSchemaInterface;
use	Magento\Framework\Setup\ModuleContextInterface;
use	Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema	implements	UpgradeSchemaInterface	{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.1.0') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();

            //Install	new	database	table
            $table = $installer->getConnection()->newTable($installer->getTable('manufacturer_entity')
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
            )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255
                )
                ->addColumn(
                    'enabled',
                    Table::TYPE_SMALLINT,
                    1
                )
                ->addColumn(
                    'address_street',
                    Table::TYPE_TEXT,
                    255
                )
                ->addColumn(
                    'address_city',
                    Table::TYPE_TEXT,
                    100
                )
                ->addColumn(
                    'address_country',
                    Table::TYPE_TEXT,
                    5
                )
                ->addColumn(
                    'contact_name',
                    Table::TYPE_TEXT,
                    100
                )
                ->addColumn(
                    'contact_phone',
                    Table::TYPE_TEXT,
                    20
                )
                ->addIndex(
                $installer->getIdxName('manufacturer_entity',
                    ['entity_id']),
                ['entity_id']
            )->setComment(
                'Cron	Schedule'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }
}