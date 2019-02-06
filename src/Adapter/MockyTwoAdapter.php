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

class MockyTwoAdapter extends AbstractAdapter
{
    /**
     * @var Provider $provider
     */
    protected $provider;

    public function parse(array $data): ExchangeRate
    {
        $exchangeRate = new ExchangeRate();
        $exchangeRate->setProviderId($this->provider->getId());
        $exchangeRate->setUsd($data[0]["oran"]);
        $exchangeRate->setEur($data[1]["oran"]);
        $exchangeRate->setGbp($data[2]["oran"]);

        return $exchangeRate;
    }

    public function process(): ExchangeRate
    {
        $body = $this->requester->fetchData($this->provider->getUrl());
        $data = json_decode($body,true);

        return $this->parse($data);
    }
}