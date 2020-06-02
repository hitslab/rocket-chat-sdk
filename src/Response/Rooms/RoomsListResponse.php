<?php

namespace Hitslab\RocketChatSDK\Response\Rooms;

use Hitslab\RocketChatSDK\Entity\Room;
use Hitslab\RocketChatSDK\Response\AbstractResponse;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;

class RoomsListResponse extends AbstractResponse
{
    use WithSuccessTrait;

    /**
     * @var Room[]
     */
    public $update;

    /**
     * @var Room[]
     */
    public $remove;

    public function getDeserializationMetadata()
    {
        return [
            'update' => Metadata::listOfEntities(Room::class),
            'remove' => Metadata::listOfEntities(Room::class)
        ];
    }
}
