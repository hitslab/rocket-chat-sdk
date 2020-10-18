<?php

namespace Hitslab\RocketChatSDK\Response\Channels;

use Hitslab\RocketChatSDK\Entity\Channel;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;
use Hitslab\RocketChatSDK\Serialization\PropertyType;

class ChannelsListResponse
{
    use WithSuccessTrait;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECTS_ARRAY, class=Channel::class)
     * @var Channel[]
     */
    public $channels;
}
