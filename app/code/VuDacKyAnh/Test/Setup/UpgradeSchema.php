<?php
namespace VuDacKyAnh\Test\Setup;
use Magento\Framework\DB\Ddl\Table;
use	Magento\Framework\Setup\UpgradeSchemaInterface;
use	Magento\Framework\Setup\ModuleContextInterface;
use	Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema	implements	UpgradeSchemaInterface	{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.8') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();

            //Install	new	database	table
            $table = $installer->getConnection()->newTable($installer->getTable('magenest_part_time')
            )->addColumn(
                'member_id',
                Table::TYPE_INTEGER,
                null,
                ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
            )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable'=>false]
                )
                ->addColumn(
                    'address',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable'=>false]
                )
                ->addColumn(
                    'phone',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable'=>false]
                )
                ->addColumn(
                    'created_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null, [
                    'nullable' => false,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
                ],
                    'Created	at'
                )
                ->addColumn(
                    'updated_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null, [
                    'nullable' => false,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
                ],
                    'Updated	at'
                )
                ->addColumn(
                    'customer_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null, [
                    'nullable' => false,
                ]
                )->addIndex(
                $installer->getIdxName('magenest_part_time',
                    ['member_id']),
                ['member_id']
            )->setComment(
                'Cron	Schedule'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }
}