<?php

namespace Hitslab\RocketChatSDK\Request;

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

    abstract public function path();

    abstract public function method();

    public function auth($authToken, $userId)
    {
        $this->authToken = $authToken;
        $this->userId = $userId;

        return $this;
    }

    public function request()
    {
        $headers = [];

        if ($this->authToken || $this->userId) {
            $headers = [
                'X-Auth-Token' => $this->authToken,
                'X-User-Id' => $this->userId
            ];
        }

        $rawResponse = $this->client->rawRequest(
            $this->path(),
            $this->method(),
            $this->requestData,
            $headers
        );

        return json_decode($rawResponse, true);
    }
}
