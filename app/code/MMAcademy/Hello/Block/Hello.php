<?php
namespace MMAcademy\Hello\Block;
use Magento\Framework\View\Element\Template;
class Hello extends Template
{
    protected $_template = 'MMAcademy_Hello::hello.phtml';
    const CONFIG_CAN_ASK = 'customer/hello/can_ask_name';
    const CONFIG_MESSAGE = 'customer/hello/message';
    const CONFIG_MESSAGE_WITH_NAME = 'customer/hello/message_with_name';
    const NAME_PLACEHOLDER = '{name}';
    public function getHelloText()
    {
        $name = $this->getRequest()->getParam('name');
        if (empty($name)) {
            return $this->_scopeConfig->getValue(self::CONFIG_MESSAGE);
        } else {
            $message = $this->_scopeConfig->getValue(self::CONFIG_MESSAGE_WITH_NAME);
            $message = str_replace(self::NAME_PLACEHOLDER, $name, $message);
            return $message;
        }
    }
    public function getFormUrl()
    {
        return $this->getUrl('hello/index/index');
    }
    public function canShowForm()
    {
        return $this->_scopeConfig->isSetFlag(self::CONFIG_CAN_ASK);
    }
}