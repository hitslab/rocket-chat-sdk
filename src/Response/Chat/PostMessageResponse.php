<?php

namespace Hitslab\RocketChatSDK\Response\Chat;

use Hitslab\RocketChatSDK\Entity\Message;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\PropertyType;

class PostMessageResponse
{
    use WithSuccessTrait;

    /**
     * @var int
     */
    public $ts;

    /**
     * @var string
     */
    public $channel;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=Message::class)
     * @var Message
     */
    public $message;
}
