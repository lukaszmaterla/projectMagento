<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Backend\Controller\Adminhtml;

/**
 * @magentoAppArea adminhtml
 * @magentoDbIsolation enabled
 */
class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Check not logged state
     * @covers \Magento\Backend\Controller\Adminhtml\Index\Index::execute
     */
    public function testNotLoggedIndexAction()
    {
        $this->_auth->logout();
        $this->dispatch('backend/admin/Index/Index');
        /** @var $backendUrlModel \Magento\Backend\Model\UrlInterface */
        $backendUrlModel = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Backend\Model\UrlInterface'
        );
        $backendUrlModel->turnOffSecretKey();
        $url = $backendUrlModel->getUrl('admin');
        $this->assertRedirect($this->stringStartsWith($url));
    }

    /**
     * Check logged state
     * @covers \Magento\Backend\Controller\Adminhtml\Index\Index::execute
     *
     */
    public function testLoggedIndexAction()
    {
        $this->dispatch('backend/admin/Index/Index');
        $this->assertRedirect();
    }

    /**
     * @covers \Magento\Backend\Controller\Adminhtml\Index\GlobalSearch::execute
     */
    public function testGlobalSearchAction()
    {
        $this->getRequest()->setParam('isAjax', 'true');
        $this->getRequest()->setPostValue('query', 'dummy');
        $this->dispatch('backend/admin/Index/globalSearch');

        $actual = $this->getResponse()->getBody();
        $this->assertEquals([], json_decode($actual));
    }
}
