<?php

namespace Hitslab\RocketChatSDK\Entity;

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
