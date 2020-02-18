<?php
namespace Invigorate\Inquiry\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /* Interested Fields Table*/
        $tableName = $installer->getTable('inquiry_interested_fields');
        if ($installer->getConnection()->isTableExists($tableName) != true){
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'interested_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'interested_field_name',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Interested Field Name'
                )
                ->setComment('Inquiry Interested Fields Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
        /* Budget Limits Table*/
        $tableName = $installer->getTable('inquiry_budget_limits');
        if ($installer->getConnection()->isTableExists($tableName) != true){
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'budget_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'budget_range_field',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Budget Range Field'
                )
                ->setComment('Inquiry Budget Range Fields Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
        /* Inquiry Form Record Store Table */
        $tableName = $installer->getTable('inquiry_form_records');
        if ($installer->getConnection()->isTableExists($tableName) != true){
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'inquiry_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Inquiry Record ID'
                )
                ->addColumn(
                    'first_name',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'First Name'
                )
                ->addColumn(
                    'country',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Country'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Email address'
                )
                ->addColumn(
                    'phone',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Phone number'
                )
                ->addColumn(
                    'interested_in',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Interested In'
                )
                ->addColumn(
                    'budget_limit',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Budget Limit Range'
                )
                ->addColumn(
                    'inquiry_message',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Message Description'
                )
                ->setComment('Inquiry Record Store Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}