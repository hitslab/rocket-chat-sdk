<?php

namespace Hitslab\RocketChatSDK\Serialization;

use Hitslab\RocketChatSDK\Exceptions\SerializationException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\AbstractResponse;

class Serializer implements SerializerInterface
{
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
        /** @var AbstractResponse $object */
        $object = new $class();

        $metadata = $object->getDeserializationMetadata();

        try {
            $refObject = new \ReflectionClass($object);
        } catch (\ReflectionException $e) {
            throw new SerializationException('Cannot create ReflectionClass for response object', 0, $e);
        }

        foreach ($refObject->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $dataKey = $this->getKeyFromPropertyName($property->getName());

            $propertyValue = null;

            if (!isset($data[$dataKey])) {
                if (!isset($data[$property->getName()])) {
                    continue;
                } else {
                    $propertyValue = $data[$property->getName()];
                }
            } else {
                $propertyValue = $data[$dataKey];
            }

            /** @var Metadata|null $propertyMetadata */
            $propertyMetadata = isset($metadata[$dataKey]) ? $metadata[$dataKey] : null;

            if (!$propertyMetadata->entityClass) {
                $object->{$property->getName()} = $propertyValue;
            } else {
                if ($propertyMetadata->list) {
                    $object->{$property->getName()} = $this->deserializeArrayOfObjects(
                        $propertyValue,
                        $propertyMetadata->entityClass
                    );
                } else {
                    $object->{$property->getName()} = $this->deserializeObject(
                        $propertyValue,
                        $propertyMetadata->entityClass
                    );
                }
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

    private function getKeyFromPropertyName($propertyName)
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
