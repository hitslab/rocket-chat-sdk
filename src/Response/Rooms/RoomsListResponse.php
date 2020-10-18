<?php

namespace Hitslab\RocketChatSDK\Response\Rooms;

use Hitslab\RocketChatSDK\Entity\Room;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;
use Hitslab\RocketChatSDK\Serialization\PropertyType;

class RoomsListResponse
{
    use WithSuccessTrait;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECTS_ARRAY, class=Room::class)
     * @var Room[]
     */
    public $update;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECTS_ARRAY, class=Room::class)
     * @var Room[]
     */
    public $remove;
}
