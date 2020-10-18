<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\Entity\Message;
use Hitslab\RocketChatSDK\Request\Chat\PostMessageRequest;
use Hitslab\RocketChatSDK\Response\Chat\PostMessageResponse;

class PostMessageRequestTest extends MockedResponseTestCase
{
    protected $response = <<<'EOD'
{
  "ts": 1481748965123,
  "channel": "general",
  "message": {
    "alias": "",
    "msg": "This is a test!",
    "parseUrls": true,
    "groupable": false,
    "ts": "2016-12-14T20:56:05.117Z",
    "u": {
      "_id": "y65tAmHs93aDChMWu",
      "username": "graywolf336"
    },
    "rid": "GENERAL",
    "_updatedAt": "2016-12-14T20:56:05.119Z",
    "_id": "jC9chsFddTvsbFQG7"
  },
  "success": true
}
EOD;

    public function testPostMessageResponse()
    {
        $client = $this->createClient();

        $response = PostMessageRequest::create($client)
            ->request();

        $this->assertInstanceOf(PostMessageResponse::class, $response);
        $this->assertInstanceOf(Message::class, $response->message);
    }
}
