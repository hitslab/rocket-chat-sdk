<?php

namespace Hitslab\RocketChatSDK\Entity;

use Hitslab\RocketChatSDK\Serialization\PropertyType;

class Channel
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $t;

    /**
     * @var array
     */
    public $usernames;

    /**
     * @var int
     */
    public $msgs;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=User::class)
     * @var User
     */
    public $u;

    /**
     * @var \DateTimeInterface
     */
    public $ts;

    /**
     * @var boolean
     */
    public $ro;

    /**
     * @var boolean
     */
    public $sysMes;

    /**
     * @var \DateTimeInterface
     */
    public $updatedAt;
}
