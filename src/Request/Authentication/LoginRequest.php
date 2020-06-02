<?php

namespace Hitslab\RocketChatSDK\Request\Authentication;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\Authentication\LoginResponse;

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

    public function getPath()
    {
        return '/api/v1/login';
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getResponseClass()
    {
        return LoginResponse::class;
    }

    /**
     * @return object|LoginResponse
     * @throws SerializationException
     */
    public function request()
    {
        return parent::request();
    }
}
