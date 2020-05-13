<?php


namespace Hitslab\RocketChatSDK\Request\Chat;

use Hitslab\RocketChatSDK\Request\AbstractRequest;

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

    public function path()
    {
        return '/api/v1/chat.sendMessage';
    }

    public function method()
    {
        return 'POST';
    }
}
