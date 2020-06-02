<?php

namespace Hitslab\RocketChatSDK\Response\Channels;

use Hitslab\RocketChatSDK\Entity\Channel;
use Hitslab\RocketChatSDK\Response\AbstractListResponse;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;

class ChannelsListResponse extends AbstractListResponse
{
    use WithSuccessTrait;

    /**
     * @var Channel[]
     */
    public $channels;

    public function getDeserializationMetadata()
    {
        return [
            'channels' => Metadata::listOfEntities(Channel::class)
        ];
    }
}
