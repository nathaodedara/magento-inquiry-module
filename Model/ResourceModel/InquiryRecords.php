<?php
namespace Invigorate\Inquiry\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class InquiryRecords extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('inquiry_form_records', 'inquiry_id');
    }
}