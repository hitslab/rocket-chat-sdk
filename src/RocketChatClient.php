<?php


namespace Hitslab\RocketChatSDK;

use GuzzleHttp\Client;

class RocketChatClient
{
    /**
     * @var Client
     */
    private $httpClient;

    public function __construct($serverUrl)
    {
        $this->httpClient = new Client([
            'base_uri' => $serverUrl
        ]);
    }

    public function rawRequest($path, $method, $requestData = [], $headers = [])
    {
        $options = $this->prepareGuzzleOptions(
            $method,
            $requestData,
            $headers
        );

        $res = $this->httpClient->request($method, $path, $options);

        return $res->getBody()->getContents();
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
