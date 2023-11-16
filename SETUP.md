# Set Up the Project

- Clone the Repository onto your local machine
- Run the following commands

```bash
composer update
cp .env.example .env
php artisan key:generate
npm install
```

- To run the Project run these two commands on different Terminals

```bash
npm run dev
```

```bash
php artisan serve
```

## Setting up the Chat Functionality

- Ensure you have all the required packages installed before testing

> 1. beyondcode/laravel-websockets (composer)
> 2. pusher.js (node)

- Open `config/app.php` and ensure `'App\Providers\BroadcastServiceProvider'` is added to the providers array
- Open `config/broadcasting.php` and ensure your configuration looks like this:

```php
'pusher' => [
    'driver' => 'pusher',
    'key' => env('PUSHER_APP_KEY'),
    'secret' => env('PUSHER_APP_SECRET'),
    'app_id' => env('PUSHER_APP_ID'),
    'options' => [
        // 'cluster' => env('PUSHER_APP_CLUSTER'),
        'host' => env('PUSHER_HOST'),
        // 'host' => env('PUSHER_HOST') ?: 'api-'.env('PUSHER_APP_CLUSTER', 'mt1').'.pusher.com',
        'port' => env('PUSHER_PORT', 443),
        'scheme' => env('PUSHER_SCHEME', 'https'),
        // 'encrypted' => true,
        'useTLS' => env('PUSHER_SCHEME', 'https') === 'https',
    ],
],
```

- In `.env`, set the value for BROADCAST_DRIVER to `pusher`
- In `.env`, set the value for LOG_CHANNEL to `stack`
- In `.env`, set the value for PUSHER_APP_CLUSTER to `mt1`
- Set the following values in your `.env` file. You can put any values in, so long as they are a string. For instance:

> - In `.env`, set the value for PUSHER_APP_KEY to `CHATIFYEIUFHWICBCSBSJ`
> - In `.env`, set the value for PUSHER_APP_SECRET to `cei39edw0md7w3uj2m`
> - In `.env`, set the value for PUSHER_APP_ID to `CHATIFY`

- Run the following command to add the necessary fields to your database

- Run the following command to run the chat websockets server

```bash
php artisan websockets:serve
```

- To test the chat functionality, open two different browsers and login with different users. Create 2 users and and test.
