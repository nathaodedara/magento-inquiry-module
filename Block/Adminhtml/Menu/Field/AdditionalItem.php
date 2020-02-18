<?php 
namespace Invigorate\Inquiry\Block\Adminhtml\Menu\Field;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
class AdditionalItem extends AbstractFieldArray
{
    protected $_typeblockOptions;
    protected $_cmsblockOptions;
    protected function _prepareToRender()
    {
        $this->addColumn(
            'interested_fields',
            [
                'label' => __('Interested Fields List'),
                'class' => 'required-entry' //remove this class if the field is not required
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}