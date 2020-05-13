<?php

namespace Hitslab\RocketChatSDK\Request\Authentication;

use Hitslab\RocketChatSDK\Request\AbstractRequest;

class LoginRequest extends AbstractRequest
{
    /**
     * @param string $user Account username or email
     * @return $this
     */
    public function user($user)
    {
        $this->requestData['user'] = $user;

        return $this;
    }

    /**
     * @param string $password Account password
     * @return $this
     */
    public function password($password)
    {
        $this->requestData['password'] = $password;

        return $this;
    }

    public function path()
    {
        return '/api/v1/login';
    }

    public function method()
    {
        return 'POST';
    }
}
