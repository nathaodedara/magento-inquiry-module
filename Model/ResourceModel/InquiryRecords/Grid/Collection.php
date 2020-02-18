<?php
namespace Invigorate\Inquiry\Model\ResourceModel\InquiryRecords\Grid;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Invigorate\Inquiry\Model\InquiryRecords as Model;
use Invigorate\Inquiry\Model\ResourceModel\InquiryRecords as ResourceModel;
class Collection extends AbstractCollection
{
	protected $_idFieldName = 'inquiry_id';

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}