<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\Entity\Channel;
use Hitslab\RocketChatSDK\Request\Channels\ChannelsListRequest;
use Hitslab\RocketChatSDK\Response\Channels\ChannelsListResponse;

class ChannelsListRequestTest extends MockedResponseTestCase
{
    protected $response = <<<'EOD'
{
    "channels": [
        {
            "_id": "ByehQjC44FwMeiLbX",
            "name": "test-test",
            "t": "c",
            "usernames": [
                "testing1"
            ],
            "msgs": 0,
            "u": {
                "_id": "aobEdbYhXfu5hkeqG",
                "username": "testing1"
            },
            "ts": "2016-12-09T15:08:58.042Z",
            "ro": false,
            "sysMes": true,
            "_updatedAt": "2016-12-09T15:22:40.656Z"
        },
        {
            "_id": "t7qapfhZjANMRAi5w",
            "name": "testing",
            "t": "c",
            "usernames": [
                "testing2"
            ],
            "msgs": 0,
            "u": {
                "_id": "y65tAmHs93aDChMWu",
                "username": "testing2"
            },
            "ts": "2016-12-01T15:08:58.042Z",
            "ro": false,
            "sysMes": true,
            "_updatedAt": "2016-12-09T15:22:40.656Z"
        }
    ],
    "offset": 0,
    "count": 1,
    "total": 1,
    "success": true
}
EOD;

    public function testChannelsListResponse()
    {
        $client = $this->createClient();

        $response = ChannelsListRequest::create($client)
            ->request();

        $this->assertInstanceOf(ChannelsListResponse::class, $response);
        $this->assertIsArray($response->channels);
        $this->assertEquals(count($response->channels), 2);
        $this->assertInstanceOf(Channel::class, $response->channels[0]);
    }
}
