<?php
namespace Invigorate\Inquiry\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class BudgetRange extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('inquiry_budget_limits', 'budget_id');
    }
}