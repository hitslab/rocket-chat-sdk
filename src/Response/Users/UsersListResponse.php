<?php

namespace Hitslab\RocketChatSDK\Response\Users;

use Hitslab\RocketChatSDK\Entity\User;
use Hitslab\RocketChatSDK\Response\AbstractListResponse;
use Hitslab\RocketChatSDK\Response\WithSuccessTrait;
use Hitslab\RocketChatSDK\Serialization\Metadata;

class UsersListResponse extends AbstractListResponse
{
    use WithSuccessTrait;

    /**
     * @var User[]
     */
    public $users;

    public function getDeserializationMetadata()
    {
        return [
            'users' => Metadata::listOfEntities(User::class)
        ];
    }
}
