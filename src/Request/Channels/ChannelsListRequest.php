<?php

namespace Hitslab\RocketChatSDK\Request\Channels;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\Channels\ChannelsListResponse;

class ChannelsListRequest extends AbstractRequest
{
    public function getPath()
    {
        return '/api/v1/channels.list';
    }

    public function getMethod()
    {
        return 'GET';
    }

    public function getResponseClass()
    {
        return ChannelsListResponse::class;
    }

    /**
     * @return object|ChannelsListResponse
     * @throws SerializationException
     */
    public function request()
    {
        return parent::request();
    }
}
