<?php

namespace Hitslab\RocketChatSDK\Serialization;

class Metadata
{
    public $list = false;

    public $entityClass;

    public function __construct($list = false, $entityClass = null)
    {
        $this->list = $list;
        $this->entityClass = $entityClass;
    }

    public static function entity($entityClass)
    {
        return new self(false, $entityClass);
    }

    public static function listOfEntities($entityClass)
    {
        return new self(true, $entityClass);
    }
}
