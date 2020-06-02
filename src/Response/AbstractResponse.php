<?php

namespace Hitslab\RocketChatSDK\Response;

abstract class AbstractResponse
{
    public function getDeserializationMetadata()
    {
        return [];
    }
}
