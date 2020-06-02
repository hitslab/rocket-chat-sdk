<?php

namespace Hitslab\RocketChatSDK\Request\Rooms;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\Rooms\RoomsListResponse;

class RoomsListRequest extends AbstractRequest
{
    public function getPath()
    {
        return '/api/v1/rooms.get';
    }

    public function getMethod()
    {
        return 'GET';
    }

    public function getResponseClass()
    {
        return RoomsListResponse::class;
    }

    /**
     * @return object|RoomsListResponse
     * @throws SerializationException
     */
    public function request()
    {
        return parent::request();
    }
}
