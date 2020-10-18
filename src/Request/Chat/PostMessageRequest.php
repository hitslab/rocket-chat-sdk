<?php

namespace Hitslab\RocketChatSDK\Request\Chat;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\Chat\PostMessageResponse;

class PostMessageRequest extends AbstractRequest
{
    /**
     * @param string $channel The channel name with the prefix in front of it.
     * @return $this
     */
    public function channel($channel)
    {
        $this->requestData['channel'] = $channel;

        return $this;
    }

    /**
     * @param string $text The text of the message to send
     * @return $this
     */
    public function text($text)
    {
        $this->requestData['text'] = $text;

        return $this;
    }

    public function getPath()
    {
        return '/api/v1/chat.postMessage';
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getResponseClass()
    {
        return PostMessageResponse::class;
    }

    /**
     * @return object|PostMessageResponse
     * @throws SerializationException
     */
    public function request()
    {
        return parent::request();
    }
}
