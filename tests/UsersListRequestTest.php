<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\Entity\User;
use Hitslab\RocketChatSDK\Request\Users\UsersListRequest;
use Hitslab\RocketChatSDK\Response\Users\UsersListResponse;

class UsersListRequestTest extends MockedResponseTestCase
{
    protected $response = <<<'EOD'
{
  "users": [
    {
      "_id": "nSYqWzZ4GsKTX4dyK",
      "type": "user",
      "status": "offline",
      "active": true,
      "name": "Example User",
      "utcOffset": 0,
      "username": "example"
    },
    {
      "_id": "a2dqWzZ4fa2TX45S2",
      "type": "user",
      "status": "online",
      "active": true,
      "name": "Example User 2",
      "utcOffset": 0,
      "username": "example2"
    }
  ],
  "count": 10,
  "offset": 0,
  "total": 10,
  "success": true
}
EOD;

    public function testUsersListResponse()
    {
        $client = $this->createClient();

        $response = UsersListRequest::create($client)
            ->request();

        $this->assertInstanceOf(UsersListResponse::class, $response);

        $this->assertIsArray($response->users);
        $this->assertEquals(count($response->users), 2);
        $this->assertInstanceOf(User::class, $response->users[0]);
    }
}
