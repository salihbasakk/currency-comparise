<?php
/**
 * User: ahmetgunes - ahmet.gunes@enuygun.com
 * Date: 2019-02-04
 * Time: 18:26
 */

namespace App\Adapter;


use App\Entity\Provider;
use App\Requester\RequesterInterface;

abstract class AbstractAdapter implements ProviderAdapterInterface
{
    /**
     * @var RequesterInterface
     */
    protected $requester;

    /**
     * @var string
     */
    protected $provider;

    /**
     * AbstractAdapter constructor.
     *
     * @param RequesterInterface $requester
     * @param string             $url
     */
    public function __construct(RequesterInterface $requester, Provider $provider)
    {
        $this->requester = $requester;
        $this->provider  = $provider;
    }
}
