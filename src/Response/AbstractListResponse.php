<?php

namespace Hitslab\RocketChatSDK\Response;

abstract class AbstractListResponse extends AbstractResponse
{
    public $count;

    public $offset;

    public $total;
}
