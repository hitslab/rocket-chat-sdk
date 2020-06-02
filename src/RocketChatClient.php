<?php

namespace Hitslab\RocketChatSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Response\AbstractResponse;
use Hitslab\RocketChatSDK\Serialization\Serializer;
use Hitslab\RocketChatSDK\Serialization\SerializerInterface;

class RocketChatClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct($serverUrl, SerializerInterface $serializer = null)
    {
        $this->httpClient = new Client([
            'base_uri' => $serverUrl
        ]);

        if ($serializer === null) {
            $serializer = new Serializer();
        }

        $this->serializer = $serializer;
    }

    /**
     * @param AbstractRequest $request
     * @return object|AbstractResponse
     * @throws Exceptions\SerializationException
     */
    public function sendRequest(AbstractRequest $request)
    {
        $options = $this->prepareGuzzleOptions(
            $request->getMethod(),
            $request->getRequestData(),
            $request->getHeaders()
        );

        try {
            $res = $this->httpClient->request($request->getMethod(), $request->getPath(), $options);
        } catch (ClientException $e) {
            return $this->serializer->deserialize($e->getResponse()->getBody()->getContents(), $request);
        }

        return $this->serializer->deserialize($res->getBody()->getContents(), $request);
    }

    private function prepareGuzzleOptions($method, $requestData, $headers = [])
    {
        $guzzleOptions = [];
        if ($headers) {
            $guzzleOptions['headers'] = $headers;
        }

        if (!is_null($requestData)) {
            if (in_array($method, ['POST', 'PUT', 'PATCH'])) {
                if (!isset($guzzleOptions['headers']['content-type'])) {
                    $guzzleOptions['headers']['content-type'] = 'application/json';
                }
                if (is_array($requestData)) {
                    $guzzleOptions['json'] = $requestData;
                } else {
                    $guzzleOptions['body'] = $requestData;
                }
            } else {
                $guzzleOptions['query'] = $requestData;
            }
        }

        return $guzzleOptions;
    }
}
