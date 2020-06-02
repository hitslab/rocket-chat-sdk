<?php

namespace Hitslab\RocketChatSDK\Response\Chat;

use Hitslab\RocketChatSDK\Entity\Message;
use Hitslab\RocketChatSDK\Response\AbstractResponse;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;

class SendMessageResponse extends AbstractResponse
{
    use WithSuccessTrait;

    /**
     * @var Message
     */
    public $message;

    public function getDeserializationMetadata()
    {
        return [
            'message' => Metadata::entity(Message::class)
        ];
    }
}
