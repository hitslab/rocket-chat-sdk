<?php

namespace Hitslab\RocketChatSDK\Serialization;

/**
 * @Annotation
 */
class PropertyType
{
    const TYPE_OBJECT = "object";

    const TYPE_OBJECTS_ARRAY = "objects_array";

    const TYPE_OTHER = "other";

    public $type;

    public $class;
}
