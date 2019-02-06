<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 01.02.2019
 * Time: 16:11
 */

namespace App\Adapter;


use App\Entity\ExchangeRate;
use App\Entity\Provider;

class MockyOneAdapter extends AbstractAdapter
{
    /**
     * @var Provider $provider
     */
    protected $provider;

    public function parse(array $data): ExchangeRate
    {
        $exchangeRate = new ExchangeRate();
        $exchangeRate->setProviderId($this->provider->getId());
        $exchangeRate->setUsd($data["result"][0]["amount"]);
        $exchangeRate->setEur($data["result"][1]["amount"]);
        $exchangeRate->setGbp($data["result"][2]["amount"]);

        return $exchangeRate;
    }

    public function process(): ExchangeRate
    {
        $body = $this->requester->fetchData($this->provider->getUrl());
        $data = json_decode($body,true);

        return $this->parse($data);
    }
}