<?php

namespace Hitslab\RocketChatSDK\Request\Chat;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\Chat\SendMessageResponse;

class SendMessageRequest extends AbstractRequest
{
    /**
     * @param string $rid Room id
     * @return $this
     */
    public function roomId($rid)
    {
        $this->requestData['message']['rid'] = $rid;

        return $this;
    }

    /**
     * @param string $msg Message
     * @return $this
     */
    public function message($msg)
    {
        $this->requestData['message']['msg'] = $msg;

        return $this;
    }

    public function getPath()
    {
        return '/api/v1/chat.sendMessage';
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getResponseClass()
    {
        return SendMessageResponse::class;
    }

    /**
     * @return object|SendMessageResponse
     * @throws SerializationException
     */
    public function request()
    {
        return parent::request();
    }
}
