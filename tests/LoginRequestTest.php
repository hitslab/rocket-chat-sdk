<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\Entity\AuthData;
use Hitslab\RocketChatSDK\Entity\User;
use Hitslab\RocketChatSDK\Request\Authentication\LoginRequest;
use Hitslab\RocketChatSDK\Response\Authentication\LoginResponse;

class LoginRequestTest extends MockedResponseTestCase
{
    protected $response = <<<'EOD'
{
  "status": "success",
  "data": {
      "authToken": "9HqLlyZOugoStsXCUfD_0YdwnNnunAJF8V47U3QHXSq",
      "userId": "aobEdbYhXfu5hkeqG",
      "me": {
            "_id": "aYjNnig8BEAWeQzMh",
            "name": "Rocket Cat",
            "emails": [
                {
                  "address": "rocket.cat@rocket.chat",
                  "verified": false
                }
            ],
            "status": "offline",
            "statusConnection": "offline",
            "username": "rocket.cat",
            "utcOffset": -3,
            "active": true,
            "roles": [
                "admin"
            ],
            "settings": {
                "preferences": {}
              },
            "avatarUrl": "http://localhost:3000/avatar/test"
        }
   }
}
EOD;

    public function testLoginResponse()
    {
        $client = $this->createClient();

        $response = LoginRequest::create($client)
            ->request();

        $this->assertInstanceOf(LoginResponse::class, $response);
        $this->assertInstanceOf(AuthData::class, $response->data);
        $this->assertInstanceOf(User::class, $response->getUser());
    }
}
