<?php


namespace Hitslab\RocketChatSDK\Request\Rooms;


use Hitslab\RocketChatSDK\Request\AbstractRequest;

class RoomsListRequest extends AbstractRequest
{
    public function path()
    {
        return '/api/v1/rooms.get';
    }

    public function method()
    {
        return 'GET';
    }
}
