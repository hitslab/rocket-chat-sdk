<?php

namespace Hitslab\RocketChatSDK\Entity;

use Hitslab\RocketChatSDK\Serialization\PropertyType;

class AuthData
{
    /**
     * @var string
     */
    public $authToken;

    /**
     * @var string
     */
    public $userId;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=User::class)
     * @var User
     */
    public $me;
}
