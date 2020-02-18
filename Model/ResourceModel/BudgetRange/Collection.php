<?php
namespace Invigorate\Inquiry\Model\ResourceModel\BudgetRange;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Invigorate\Inquiry\Model\BudgetRange as Model;
use Invigorate\Inquiry\Model\ResourceModel\BudgetRange as ResourceModel;
class Collection extends AbstractCollection
{
	protected $_idFieldName = 'budget_id';
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}