<?php

namespace Hitslab\RocketChatSDK\Response\Chat;

use Hitslab\RocketChatSDK\Entity\Message;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;
use Hitslab\RocketChatSDK\Serialization\PropertyType;

class SendMessageResponse
{
    use WithSuccessTrait;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=Message::class)
     * @var Message
     */
    public $message;
}
