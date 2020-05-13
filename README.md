# PHP SDK for Rocket.Chat REST API

Documentation for Rocket.Chat REST API available here - [Rocket.Chat API](https://rocket.chat/docs/developer-guides/rest-api/)

### Creating client

```php
use Hitslab\RocketChatSDK\RocketChatClient;

$client = new RocketChatClient("https://rocket.my-company.org");
```

### Auth with login (or email) and password 

Endpoint `/api/v1/login` - [Documentation](https://rocket.chat/docs/developer-guides/rest-api/authentication/login/)

```php
use Hitslab\RocketChatSDK\Request\Authentication\LoginRequest;

$loginRequest = LoginRequest::create($client)
    ->user('username')
    ->password('password');

$response = $loginRequest->request();
```
now you got `authToken` and `userId` for next requests

### Get available rooms and channels for user

Endpoint `/api/v1/rooms.get` - [Documentation](https://rocket.chat/docs/developer-guides/rest-api/rooms/get/)

```php
use Hitslab\RocketChatSDK\Request\Rooms\RoomsListRequest;

$roomsList = RoomsListRequest::create($client)
    ->auth('authToken', 'userId');

$response = $roomsList->request();
```

### Sending message to channel

Endpoint `/api/v1/chat.postMessage` - [Documentation](https://rocket.chat/docs/developer-guides/rest-api/chat/postmessage/)

```php
use Hitslab\RocketChatSDK\Request\Chat\PostMessageRequest;

$messageRequest = PostMessageRequest::create($client)
    ->auth('authToken', 'userId')
    ->channel('#channel-name')
    ->text('Hello World');

$response = $messageRequest->request();
```
