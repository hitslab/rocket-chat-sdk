<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\Entity\Message;
use Hitslab\RocketChatSDK\Request\Chat\SendMessageRequest;
use Hitslab\RocketChatSDK\Response\Chat\SendMessageResponse;

class SendMessageRequestTest extends MockedResponseTestCase
{
    protected $response = <<<'EOD'
{
    "message": {
        "rid": "GENERAL",
        "msg": "123456789",
        "ts": "2018-03-01T18:02:26.825Z",
        "u": {
            "_id": "i5FdM4ssFgAcQP62k",
            "username": "rocket.cat",
            "name": "test"
        },
        "unread": true,
        "mentions": [],
        "channels": [],
        "_updatedAt": "2018-03-01T18:02:26.828Z",
        "_id": "LnCSJxxNkCy6K9X8X"
    },
    "success": true
}
EOD;

    public function testSendMessageResponse()
    {
        $client = $this->createClient();

        $response = SendMessageRequest::create($client)
            ->request();

        $this->assertInstanceOf(SendMessageResponse::class, $response);
        $this->assertInstanceOf(Message::class, $response->message);
    }
}
