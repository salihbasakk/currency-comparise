<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 01.02.2019
 * Time: 16:11
 */

namespace App\Adapter;


use App\Entity\ExchangeRate;

class MockyOneAdapter extends AbstractAdapter
{
    public function parse(array $data): ExchangeRate
    {
        // TODO: Implement parse() method.
    }

    public function process(): ExchangeRate
    {
        // TODO: Implement process() method.
    }
}