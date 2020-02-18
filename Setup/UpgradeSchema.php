<?php
namespace Invigorate\Inquiry\Setup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		$setup->getConnection()->dropTable('inquiry_budget_limits');
		$setup->getConnection()->dropTable('inquiry_interested_fields');
		$setup->endSetup();
	}
}