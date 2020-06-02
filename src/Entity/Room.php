<?php

namespace Hitslab\RocketChatSDK\Entity;

class Room
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
    public $fname;

    /**
     * @var string
     */
    public $t;

    /**
     * @var User
     */
    public $u;

    /**
     * @var boolean
     */
    public $ro;

    /**
     * @var boolean
     */
    public $default;

    /**
     * @var array
     */
    public $customFields;

    /**
     * @var \DateTimeInterface
     */
    public $updatedAt;
}
