<?php

namespace Hitslab\RocketChatSDK\Response\Authentication;

use Hitslab\RocketChatSDK\Entity\AuthData;
use Hitslab\RocketChatSDK\Serialization\PropertyType;

class LoginResponse
{
    const STATUS_SUCCESS = 'success';
    const STATUS_ERROR = 'error';

    /**
     * @var string Auth status
     * @see LoginResponse::STATUS_SUCCESS, LoginResponse::STATUS_ERROR
     */
    public $status;

    /**
     * @PropertyType(type=PropertyType::TYPE_OBJECT, class=AuthData::class)
     * @var AuthData
     */
    public $data;

    /**
     * @var string
     */
    public $error;

    /**
     * @var string
     */
    public $message;

    public function isSuccess()
    {
        return $this->status === self::STATUS_SUCCESS;
    }

    public function getUser()
    {
        if (!$this->isSuccess()) {
            return null;
        }

        return $this->data->me;
    }
}
