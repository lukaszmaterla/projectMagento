<?php
namespace MMAcademy\Hello\Controller\Index;
use Magento\Framework\App\ResponseInterface;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $result */
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        return $result;
    }
}