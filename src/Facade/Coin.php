<?php
namespace cointrunk\LaravelCoin\Facade;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: lee
 * Date: 11/12/2017
 * Time: 3:31 PM
 */
class Coin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \cointrunk\LaravelCoin\Lib\Ethereum::class;
    }
}
