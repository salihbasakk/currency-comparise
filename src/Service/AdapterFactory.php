<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 04.02.2019
 * Time: 13:30
 */

namespace App\Service;

use App\Adapter\AbstractAdapter;
use App\Entity\Provider;
use App\Requester\RequesterInterface;

class AdapterFactory
{
    public static function create(Provider $provider): AbstractAdapter
    {
        $adapterClass   = $provider->getAdapterClass();
        $requesterClass = $provider->getRequesterClass();

        if (is_subclass_of($requesterClass, RequesterInterface::class)) {
            $requesterClass = new $requesterClass();
        }

        if (is_subclass_of($adapterClass, AbstractAdapter::class)) {
            /**
             * @var AbstractAdapter $adapter
             */
            return new $adapterClass($requesterClass, $provider);
        } else {
            throw new \Exception('Adapter class must extend AbstractAdapter');
        }

    }

}