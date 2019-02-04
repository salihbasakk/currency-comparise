<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 04.02.2019
 * Time: 13:30
 */

namespace App\Service;

use App\Entity\Provider;
use Curl\Curl;

class AdapterFactory
{
    public $provider = Provider::class;
    public $adapterClass;

    public static function create(Provider $provider)
    {
        $prov = new Provider();
        $adapterClass = $prov->getAdapterClass();

        if(is_subclass_of($adapterClass, ProviderAdapterInterface::class))
        {
            $providerClass = $prov->getAdapterClass();
            $adapter = new $providerClass();
            $curl = new Curl();
            $curl->get($prov->getUrl());
            $data =  json_decode($curl->response);

            $adapter->setUrl($prov->getUrl());
            $adapter->setData($data);
        }

    }

}