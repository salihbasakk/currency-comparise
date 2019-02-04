<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 01.02.2019
 * Time: 16:11
 */

namespace App\Service;


use App\Entity\ExchangeRate;

class MockyOneAdapter implements ProviderAdapterInterface
{
    public $data;
    public $url;

    public function parse(array $data): ExchangeRate
    {

    }

    public function getData($data)
    {
        $this->data = $data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getUrl($url)
    {
        $this->url = $url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}