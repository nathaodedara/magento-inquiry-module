<?php
namespace Invigorate\Inquiry\Model\ResourceModel\InterestedField;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Invigorate\Inquiry\Model\InterestedField as Model;
use Invigorate\Inquiry\Model\ResourceModel\InterestedField as ResourceModel;
class Collection extends AbstractCollection
{
	protected $_idFieldName = 'interested_id';
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}