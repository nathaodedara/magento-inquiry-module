<?php
namespace Invigorate\Inquiry\Block;
use Magento\Directory\Model\Country;
use Magento\Directory\Model\CountryFactory;
use Magento\Framework\View\Element\Template\Context;
/*use Invigorate\Inquiry\Model\InterestedFieldFactory;
use Invigorate\Inquiry\Model\BudgetRangeFactory;*/
class InquiryForm extends \Magento\Framework\View\Element\Template
{
    public $countryFactory;
    protected $_countryCollectionFactory;
    public function __construct(
        CountryFactory $countryFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        /*InterestedFieldFactory $interestedField,
        BudgetRangeFactory $budgetRange,*/
        \Magento\Directory\Model\ResourceModel\Country\CollectionFactory $countryCollectionFactory,
        array $data = []
    ) {
        $this->_countryCollectionFactory = $countryCollectionFactory;
        /*$this->_interestedField = $interestedField;
        $this->_budgetRange = $budgetRange;*/
        $this->countryFactory = $countryFactory;
        parent::__construct($context, $data);
    }
    public function getCountryCollection()
    {
        $collection = $this->_countryCollectionFactory->create()->loadByStore();
        return $collection;
    }
    public function getCountryName($countryId)
    {
        $country = $this->countryFactory->create()->loadByCode($countryId);
        $countryName = $country->getName();
        return $countryName;
    }
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    /*public function getInterestedFieldsList()
    {
        $interestedField = $this->_interestedField->create();
        $collection = $interestedField->getCollection();
        return $collection;
    }
    public function getBudgetRangeList()
    {
        $budgetRange = $this->_budgetRange->create();
        $collection = $budgetRange->getCollection();
        return $collection;
    }*/
}