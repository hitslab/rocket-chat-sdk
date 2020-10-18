<?php

namespace Hitslab\RocketChatSDK\Response\Users;

use Hitslab\RocketChatSDK\Entity\User;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\PropertyType;

class UsersListResponse
{
    use WithSuccessTrait;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECTS_ARRAY, class=User::class)
     * @var User[]
     */
    public $users;
}
