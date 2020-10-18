<?php

namespace Tests\Hitslab\RocketChatSDK;

use Hitslab\RocketChatSDK\Entity\Room;
use Hitslab\RocketChatSDK\Request\Rooms\RoomsListRequest;
use Hitslab\RocketChatSDK\Response\Rooms\RoomsListResponse;

class RoomsListRequestTest extends MockedResponseTestCase
{
    protected $response = <<<'EOD'
{
   "update": [
      {
         "_id": "GENERAL",
         "name": "general",
         "t": "c",
         "_updatedAt": "2018-01-21T21:03:43.736Z",
         "default": true
      },
      {
         "_id": "3WpJQkDHhrWPBvXuWhw5DThnhQmxDWnavu",
         "t": "d",
         "_updatedAt": "2018-01-21T21:07:16.123Z"
      },
      {
         "_id": "hw5DThnhQmxDWnavurocket.cat",
         "t": "d",
         "_updatedAt": "2018-01-21T21:07:18.510Z"
      }
   ],
   "remove": [
      {
         "_id": "EAemRsye7khfr9Stt",
         "name": "123",
         "fname": "123",
         "t": "p",
         "u":          {
            "_id": "hw5DThnhQmxDWnavu",
            "username": "user2"
         },
         "_updatedAt": "2018-01-24T21:02:04.318Z",
         "customFields": {},
         "ro": false
      }
   ],
   "success": true
}
EOD;

    public function testRoomsListResponse()
    {
        $client = $this->createClient();

        $response = RoomsListRequest::create($client)
            ->request();

        $this->assertInstanceOf(RoomsListResponse::class, $response);

        $this->assertIsArray($response->update);
        $this->assertEquals(count($response->update), 3);
        $this->assertInstanceOf(Room::class, $response->update[0]);

        $this->assertIsArray($response->remove);
        $this->assertEquals(count($response->remove), 1);
        $this->assertInstanceOf(Room::class, $response->remove[0]);
    }
}
