<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\RocketChatClient;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MockedResponseTestCase extends TestCase
{
    protected $response;

    /**
     * @return RocketChatClient|MockObject
     */
    protected function createClient()
    {
        $stub = $this->getMockBuilder(RocketChatClient::class)
            ->setConstructorArgs(["test"])
            ->setMethodsExcept(['getDeserializedResponse'])
            ->getMock();

        //$stub = $this->createMock(RocketChatClient::class);

        $stub->method('getResponse')
            ->willReturn($this->response);

        return $stub;
    }
}
