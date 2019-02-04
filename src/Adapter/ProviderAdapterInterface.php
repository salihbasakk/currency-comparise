<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 01.02.2019
 * Time: 11:19
 */

namespace App\Adapter;


use App\Entity\ExchangeRate;

interface ProviderAdapterInterface
{
    public function parse(array $data): ExchangeRate;

    public function process(): ExchangeRate;
}