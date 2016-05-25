# php[tek] tweeps

This is a very small, intentionally terribly written demo site written for my
phpdbg talk at [php[tek]](http://tek.phparch.com).

Notes on standing this up, simply so I don't forget:

## Installation

```sh
docker-compose start
composer install
```

Add these variables to `.env`:

* `TWITTER_CONSUMER_KEY`
* `TWITTER_CONSUMER_SECRET`
* `TWITTER_ACCESS_TOKEN`
* `TWITTER_ACCESS_TOKEN_SECRET`

```sh
php artisan vendor:publish
php artisan migrate:install
php artisan migrate
```

## Usage

### Updating

```
php artisan tweeps:update
```

The default search is `#phptek`. To use a different search, give it as a
parameter.

### Web Interface

Haven't written it yet. I'll write instructions when I have.

## Contributing

This is intentionally bad. I don't really want contributions, but think you're
awesome for wanting to.
