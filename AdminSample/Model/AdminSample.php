<?php

namespace OlapicIntegration\AdminSample\Model;

use OlapicIntegration\AdminSample\Api\Data\AdminSampleInterface;
use OlapicIntegration\AdminSample\Helper\ConfigHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use OlapicIntegration\AdminSample\Model\Constant\OlapicWidgetConfig;

class AdminSample extends \Magento\Framework\Model\AbstractModel implements AdminSampleInterface
{
    /** @var  ConfigHelper */
    protected $_config;

    private $scopeConfig;
    public function __construct(ConfigHelper $config, ScopeConfigInterface $scopeConfig)
    {
        $this->_config = $config;
        $this->scopeConfig = $scopeConfig;

    }
    public function getGreetings()
    {
        $clientId = $this->scopeConfig->getValue(OlapicWidgetConfig::CLIENT_ID); 
        $clientSecret = $this->scopeConfig->getValue(OlapicWidgetConfig::CLIENT_SECRET); 

        return 'Greetings!'. ' Id : '. $clientId. ' Secret : '. $clientSecret;
    }

    public function getSampleText()
    {
        return $this->_config->getConfig('txt/textsample');
    }
}