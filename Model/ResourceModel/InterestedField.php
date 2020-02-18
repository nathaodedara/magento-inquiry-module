<?php
namespace Invigorate\Inquiry\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class InterestedField extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('inquiry_interested_fields', 'interested_id');
    }
}