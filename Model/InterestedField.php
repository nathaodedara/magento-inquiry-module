<?php
namespace Invigorate\Inquiry\Model;
use Magento\Framework\Model\AbstractModel;
use Invigorate\Inquiry\Model\ResourceModel\InterestedField as ResourceModel;
class InterestedField extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}