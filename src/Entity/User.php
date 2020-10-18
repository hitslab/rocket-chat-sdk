<?php

namespace Hitslab\RocketChatSDK\Entity;

use Hitslab\RocketChatSDK\Serialization\PropertyType;

class User
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
     * @var array
     */
    public $emails;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $statusConnection;

    /**
     * @var string
     */
    public $username;

    /**
     * @var int
     */
    public $utcOffset;

    /**
     * @var bool
     */
    public $active;

    /**
     * @var array
     */
    public $roles;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=UserSettings::class)
     * @var UserSettings
     */
    public $settings;

    /**
     * @var array
     */
    public $customFields;

    /**
     * @var string
     */
    public $avatarUrl;
}
