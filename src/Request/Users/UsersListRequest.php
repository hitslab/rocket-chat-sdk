<?php

namespace Hitslab\RocketChatSDK\Request\Users;

use Hitslab\RocketChatSDK\Request\AbstractRequest;

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

    public function path()
    {
        return '/api/v1/users.list';
    }

    public function method()
    {
        return 'GET';
    }

    public function request()
    {
        if (!empty($this->fields)) {
            $this->requestData['fields'] = json_encode($this->fields);
        }

        return parent::request();
    }
}
