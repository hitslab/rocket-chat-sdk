<?php

namespace Hitslab\RocketChatSDK\Request\Users;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\Users\UsersListResponse;

class UsersListRequest extends AbstractRequest
{
    private $fields = [];

    /**
     * @param array $fieldsArray Field to include in response, format: ['emails', 'status', ...]
     * @return $this
     */
    public function fields($fieldsArray)
    {
        foreach ($fieldsArray as $field) {
            $this->fields[$field] = 1;
        }

        return $this;
    }

    public function getPath()
    {
        return '/api/v1/users.list';
    }

    public function getMethod()
    {
        return 'GET';
    }

    public function getResponseClass()
    {
        return UsersListResponse::class;
    }

    /**
     * @return object|UsersListResponse
     * @throws SerializationException
     */
    public function request()
    {
        if (!empty($this->fields)) {
            $this->requestData['fields'] = json_encode($this->fields);
        }

        return parent::request();
    }
}
