<?php


namespace Hitslab\RocketChatSDK\Serialization;


use Hitslab\RocketChatSDK\Request\AbstractRequest;

interface SerializerInterface
{
    public function deserialize($responseBody, AbstractRequest $request);
}
