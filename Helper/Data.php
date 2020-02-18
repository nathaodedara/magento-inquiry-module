<?php
namespace Invigorate\Inquiry\Helper;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\App\Config\ScopeConfigInterface;
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_storeManager;
    protected $_serialize;
    protected $_scopeConfig;
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        Json $serialize,
        ScopeConfigInterface $scopeConfig
        )
    {
        parent::__construct($context);
        $this->_serialize = $serialize;
        $this->_scopeConfig = $scopeConfig;
    }
    /*public function getStatus()
    {
        return $this->scopeConfig->getValue(
            'inquiry/active_display/scope',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }*/
    public function getStoreConfig($config_path)
    {
        return $this->_serialize->unserialize($this->_scopeConfig->getValue(
            $config_path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
    }

    public function getNonSerializeData($config_path)
    {
        return $this->scopeConfig->getValue($config_path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
?>