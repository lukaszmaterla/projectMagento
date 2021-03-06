<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Contact\Controller;

/**
 * Contact Index controller test
 */
class IndexTest extends \Magento\TestFramework\TestCase\AbstractController
{
    public function testPostAction()
    {
        $params = [
            'name' => 'customer name',
            'comment' => 'comment',
            'email' => 'user@example.com',
            'hideit' => '',
        ];
        $this->getRequest()->setPostValue($params);

        $this->dispatch('contact/Index/post');
        $this->assertSessionMessages(
            $this->contains(
                "Thanks for contacting us with your comments and questions. We'll respond to you very soon."
            ),
            \Magento\Framework\Message\MessageInterface::TYPE_SUCCESS
        );
    }
}
