<?php

namespace Hitslab\RocketChatSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Hitslab\RocketChatSDK\Request\AbstractRequest;
use Hitslab\RocketChatSDK\Serialization\Deserializer;

class RocketChatClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var Deserializer
     */
    private $deserializer;

    public function __construct($serverUrl, Deserializer $deserializer = null)
    {
        $this->httpClient = new Client([
            'base_uri' => $serverUrl
        ]);

        if ($deserializer === null) {
            $deserializer = new Deserializer();
        }

        $this->deserializer = $deserializer;
    }

    /**
     * @param AbstractRequest $request
     * @return object
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
            return $this->deserializer->deserialize($e->getResponse()->getBody()->getContents(), $request);
        }

        return $this->deserializer->deserialize($res->getBody()->getContents(), $request);
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
