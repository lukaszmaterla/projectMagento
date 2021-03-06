<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CurrencySymbol\Controller\Adminhtml\System\Currencysymbol;

class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Test Index action
     *
     * @magentoConfigFixture               currency/options/allow USD
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     */
    public function testIndexAction()
    {
        $this->dispatch('backend/admin/system_currencysymbol/Index');

        $body = $this->getResponse()->getBody();
        $this->assertContains('id="currency-symbols-form"', $body);
        $this->assertContains('<input id="custom_currency_symbolUSD"', $body);
        $this->assertContains('save primary save-currency-symbols', $body);
    }
}
