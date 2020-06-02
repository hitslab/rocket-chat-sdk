<?php

namespace Hitslab\RocketChatSDK\Response\Chat;

use Hitslab\RocketChatSDK\Entity\Message;
use Hitslab\RocketChatSDK\Response\AbstractResponse;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;

class PostMessageResponse extends AbstractResponse
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
     * @var Message
     */
    public $message;

    public function getDeserializationMetadata()
    {
        return [
            'update' => Metadata::entity(Message::class)
        ];
    }
}
