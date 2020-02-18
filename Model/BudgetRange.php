<?php
namespace Invigorate\Inquiry\Model;
use Magento\Framework\Model\AbstractModel;
use Invigorate\Inquiry\Model\ResourceModel\BudgetRange as ResourceModel;
class BudgetRange extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}