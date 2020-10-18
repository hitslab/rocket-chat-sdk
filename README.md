# PHP SDK for Rocket.Chat REST API

Documentation for Rocket.Chat REST API available here - [Rocket.Chat API](https://rocket.chat/docs/developer-guides/rest-api/)

## Install

`composer require hitslab/rocket-chat-sdk`

## Example

```php
use Hitslab\RocketChatSDK\RocketChatClient;
use Hitslab\RocketChatSDK\Request\Authentication\LoginRequest;
use Hitslab\RocketChatSDK\Request\Users\UsersListRequest;

// Creating client
$client = new RocketChatClient("https://rocket.my-company.org");

// Auth with login (or email) and password
$loginResponse = LoginRequest::create($client)
    ->user('username')
    ->password('password')
    ->request();

// Get list of users
$users = UsersListRequest::create($client)
    ->auth($loginResponse->data->authToken, $loginResponse->data->userId)
    ->request();
```
