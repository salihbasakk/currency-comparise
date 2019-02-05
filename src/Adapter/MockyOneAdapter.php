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
use App\Requester\HTTPRequester;

class MockyOneAdapter extends AbstractAdapter
{
    /**
     * @var Provider $provider
     */
    protected $provider;

    /**
     * @var array $data
     */
    protected $data;

    public function parse(array $data): ExchangeRate
    {
        $exchangeRate = new ExchangeRate();
        $exchangeRate->setProviderId($this->provider->getId());
        $exchangeRate->setUsd($this->data[0]->amount);
        $exchangeRate->setEur($this->data[1]->amount);
        $exchangeRate->setGbp($this->data[2]->amount);

        return $exchangeRate;
    }

    public function process(): ExchangeRate
    {
        $body = $this->requester->fetchData($this->provider->getUrl());

        $this->data = json_decode($body, true);

        return $this->parse($this->data);
    }
}