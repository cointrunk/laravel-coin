<h2 align="center">
    Ethereum Package for Laravel
</h2>

<p align="center">
    <a href="https://packagist.org/packages/cointrunk/laravel-coin"><img src="https://poser.pugx.org/cointrunk/laravel-coin/v/stable?format=flat-square" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/cointrunk/laravel-coin"><img src="https://poser.pugx.org/cointrunk/laravel-coin/v/unstable?format=flat-square" alt="Latest Unstable Version"></a>    
    <a href="https://packagist.org/packages/cointrunk/laravel-coin"><img src="https://poser.pugx.org/cointrunk/laravel-coin/license?format=flat-square" alt="License"></a>
    <a href="https://packagist.org/packages/cointrunk/laravel-coin"><img src="https://poser.pugx.org/cointrunk/laravel-coin/downloads" alt="Total Downloads"></a>
</p>

## Introduction

This is a simple Laravel Service Provider providing for <a href="https://github.com/ethereum/wiki/wiki/JSON-RPC">Generic JSON RPC</a>

and <a href="https://github.com/ethereum/go-ethereum/wiki/Management-APIs">Management API</a>

Installation
------------

To install the PHP client library using Composer:

```bash
composer require cointrunk/laravel-coin
```

Alternatively, add these two lines to your composer require section:

```json
{
    "require": {
        "cointrunk/laravel-coin": "dev-master"
    }
}
```

### Laravel 5.5+

If you're using Laravel 5.5 or above, the package will automatically register the `Ethereum` provider and facade.

### Laravel 5.4 and below

Add `cointrunk\LaravelCoin\CoinServiceProvider` to the `providers` array in your `config/app.php`:

```php
'providers' => [
    // Other service providers...

    cointrunk\LaravelCoin\CoinServiceProvider::class,
],
```

If you want to use the facade interface, you can `use` the facade class when needed:

```php
use cointrunk\LaravelCoin\Facade\Ethereum;
```

Or add an alias in your `config/app.php`:

```php
'aliases' => [
    ...
    'Ethereum' => cointrunk\LaravelCoin\Facade\Ethereum::class,
],
```

### Using laravel-coin with Lumen

laravel-coin works with Lumen too! You'll need to do a little work by hand
to get it up and running. First, install the package using composer:


```bash
composer require cointrunk/laravel-coin
```

Next, we have to tell Lumen that our library exists. Update `bootstrap/app.php`
and register the `CoinServiceProvider`:

```php
$app->register(cointrunk\LaravelCoin\CoinServiceProvider::class);
```

Finally, we need to configure the library. Unfortunately Lumen doesn't support
auto-publishing files so you'll have to create the config file yourself by creating
a config directory and copying the config file out of the package in to your project:

```bash
mkdir config
cp vendor/cointrunk/laravel-coin/config/ethereum.php config/ethereum.php
```

At this point, set `ETH_HOST` and `ETH_PORT` in your `.env` file and it should
be working for you. You can test this with the following route:

```php
try{
        $ret = \cointrunk\LaravelCoin\Facade\Ethereum::eth_protocolVersion();
        print_r($ret);
    }catch (Exception $e){
        echo $e->getMessage();
    }
```

Configuration
-------------

You can use `artisan vendor:publish` to copy the distribution configuration file to your app's config directory:

```bash
php artisan vendor:publish
```

Then update `config/ethereum.php` with your credentials. Alternatively, you can update your `.env` file with the following:

```dotenv
ETH_HOST=http://localhost
ETH_PORT=8545
```

Usage
-----

To use the Ethereum Client Library you can use the facade, or request the instance from the service container:

```php
try{
        $ret = \cointrunk\LaravelCoin\Facade\Ethereum::eth_protocolVersion();
        print_r($ret);
    }catch (Exception $e){
        echo $e->getMessage();
    }
```

Or

```php
$thereum = app('Ethereum');

$result=$thereum->eth_protocolVersion();
```
