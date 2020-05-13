<?php


namespace Hitslab\RocketChatSDK\Request\Channels;

use Hitslab\RocketChatSDK\Request\AbstractRequest;

class ChannelsListRequest extends AbstractRequest
{
    public function path()
    {
        return '/api/v1/channels.list';
    }

    public function method()
    {
        return 'GET';
    }
}
