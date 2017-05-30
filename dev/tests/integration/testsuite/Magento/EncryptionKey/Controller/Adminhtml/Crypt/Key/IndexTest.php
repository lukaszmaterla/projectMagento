<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\EncryptionKey\Controller\Adminhtml\Crypt\Key;

class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Test Index action
     */
    public function testIndexAction()
    {
        $this->dispatch('backend/admin/crypt_key/Index');

        $body = $this->getResponse()->getBody();
        $this->assertContains('<h1 class="page-title">Encryption Key</h1>', $body);
    }
}
