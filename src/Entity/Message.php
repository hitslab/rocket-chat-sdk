<?php

namespace Hitslab\RocketChatSDK\Entity;

use Hitslab\RocketChatSDK\Serialization\PropertyType;

class Message
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $alias;

    /**
     * @var string
     */
    public $msg;

    /**
     * @var boolean
     */
    public $parseUrls;

    /**
     * @var boolean
     */
    public $groupable;

    /**
     * @var boolean
     */
    public $unread;

    /**
     * @var array
     */
    public $mentions;

    /**
     * @var array
     */
    public $channels;

    /**
     * @var \DateTimeInterface
     */
    public $ts;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=User::class)
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $rid;

    /**
     * @var \DateTimeInterface
     */
    public $updatedAt;
}
