<?php
namespace Invigorate\Inquiry\Model;
use Magento\Framework\Model\AbstractModel;
use Invigorate\Inquiry\Model\ResourceModel\InquiryRecords as ResourceModel;
class InquiryRecords extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}