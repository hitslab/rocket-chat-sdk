<?php

namespace Hitslab\RocketChatSDK\Request;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\RocketChatClient;

abstract class AbstractRequest
{
    protected $client;

    protected $requestData = [];

    protected $authToken;

    protected $userId;

    public function __construct(RocketChatClient $client)
    {
        $this->client = $client;
    }

    static public function create(RocketChatClient $client)
    {
        return new static($client);
    }

    public function auth($authToken, $userId)
    {
        $this->authToken = $authToken;
        $this->userId = $userId;

        return $this;
    }

    abstract public function getPath();

    abstract public function getMethod();

    abstract public function getResponseClass();

    public function getHeaders()
    {
        $headers = [];

        if ($this->authToken || $this->userId) {
            $headers = [
                'X-Auth-Token' => $this->authToken,
                'X-User-Id' => $this->userId
            ];
        }

        return $headers;
    }

    public function getRequestData()
    {
        return $this->requestData;
    }

    /**
     * @return object
     * @throws SerializationException
     */
    public function request()
    {
        return $this->client->getDeserializedResponse($this);
    }
}
