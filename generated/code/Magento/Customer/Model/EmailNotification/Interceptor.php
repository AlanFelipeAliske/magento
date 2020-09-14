<?php
namespace Magento\Customer\Model\EmailNotification;

/**
 * Interceptor class for @see \Magento\Customer\Model\EmailNotification
 */
class Interceptor extends \Magento\Customer\Model\EmailNotification implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Customer\Model\CustomerRegistry $customerRegistry, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, \Magento\Customer\Helper\View $customerViewHelper, \Magento\Framework\Reflection\DataObjectProcessor $dataProcessor, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, ?\Magento\Framework\Mail\Template\SenderResolverInterface $senderResolver = null)
    {
        $this->___init();
        parent::__construct($customerRegistry, $storeManager, $transportBuilder, $customerViewHelper, $dataProcessor, $scopeConfig, $senderResolver);
    }

    /**
     * {@inheritdoc}
     */
    public function credentialsChanged(\Magento\Customer\Api\Data\CustomerInterface $savedCustomer, $origCustomerEmail, $isPasswordChanged = false) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'credentialsChanged');
        if (!$pluginInfo) {
            parent::credentialsChanged($savedCustomer, $origCustomerEmail, $isPasswordChanged);
        } else {
            $this->___callPlugins('credentialsChanged', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function passwordReminder(\Magento\Customer\Api\Data\CustomerInterface $customer) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'passwordReminder');
        if (!$pluginInfo) {
            parent::passwordReminder($customer);
        } else {
            $this->___callPlugins('passwordReminder', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function passwordResetConfirmation(\Magento\Customer\Api\Data\CustomerInterface $customer) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'passwordResetConfirmation');
        if (!$pluginInfo) {
            parent::passwordResetConfirmation($customer);
        } else {
            $this->___callPlugins('passwordResetConfirmation', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function newAccount(\Magento\Customer\Api\Data\CustomerInterface $customer, $type = 'registered', $backUrl = '', $storeId = null, $sendemailStoreId = null) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'newAccount');
        if (!$pluginInfo) {
            parent::newAccount($customer, $type, $backUrl, $storeId, $sendemailStoreId);
        } else {
            $this->___callPlugins('newAccount', func_get_args(), $pluginInfo);
        }
    }
}
