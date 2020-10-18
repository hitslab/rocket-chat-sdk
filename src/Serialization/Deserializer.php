<?php

namespace Hitslab\RocketChatSDK\Serialization;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\Reader;
use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;

class Deserializer
{
    /**
     * @var Reader
     */
    private $reader;

    public function __construct(Reader $reader = null)
    {
        if ($reader === null) {
            $reader = new AnnotationReader();
        }

        $this->reader = $reader;
    }

    /**
     * @param string $responseBody
     * @param AbstractRequest $request
     * @return object
     * @throws SerializationException
     */
    public function deserialize($responseBody, AbstractRequest $request)
    {
        $responseBodyArray = json_decode($responseBody, true);

        $responseClass = $request->getResponseClass();

        return $this->deserializeObject($responseBodyArray, $responseClass);
    }

    /**
     * @param array $data
     * @param string $class
     * @return object
     * @throws SerializationException
     */
    private function deserializeObject(array $data, $class)
    {
        $object = new $class();

        try {
            $refObject = new \ReflectionClass($object);
        } catch (\ReflectionException $e) {
            throw new SerializationException('Cannot create ReflectionClass for response object', 0, $e);
        }

        foreach ($refObject->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();

            $dataKey = $this->getArrayDataKeyFromPropertyName($propertyName);

            $propertyValue = null;

            if (!isset($data[$dataKey])) {
                if (!isset($data[$propertyName])) {
                    continue;
                } else {
                    $propertyValue = $data[$propertyName];
                }
            } else {
                $propertyValue = $data[$dataKey];
            }

            /** @var PropertyType|null $propertyType */
            $propertyType = $this->reader->getPropertyAnnotation($property, PropertyType::class);

            if ($propertyType === null || $propertyType->type === PropertyType::TYPE_OTHER) {
                $object->{$propertyName} = $propertyValue;
                continue;
            }

            if ($propertyType->type === PropertyType::TYPE_OBJECTS_ARRAY) {
                $object->{$propertyName} = $this->deserializeArrayOfObjects(
                    $propertyValue,
                    $propertyType->class
                );
            } elseif ($propertyType->type === PropertyType::TYPE_OBJECT) {
                $object->{$property->getName()} = $this->deserializeObject(
                    $propertyValue,
                    $propertyType->class
                );
            }
        }

        return $object;
    }

    /**
     * @param array $array
     * @param string $class
     * @return array
     * @throws SerializationException
     */
    private function deserializeArrayOfObjects(array $array, $class)
    {
        foreach ($array as $key => $value) {
            $array[$key] = $this->deserializeObject($value, $class);
        }

        return $array;
    }

    private function getArrayDataKeyFromPropertyName($propertyName)
    {
        switch ($propertyName) {
            case 'id':
                return '_id';
            case 'updatedAt':
                return '_updatedAt';
            default:
                return $propertyName;
        }
    }
}
