<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 01.02.2019
 * Time: 11:19
 */

namespace App\Service;


interface ProviderAdopterInterface
{
    public function parse(array $data):ExchangeRate;
}