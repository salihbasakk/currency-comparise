<?php
/**
 * User: ahmetgunes - ahmet.gunes@enuygun.com
 * Date: 2019-02-04
 * Time: 18:28
 */

namespace App\Requester;


use Curl\Curl;

class HTTPRequester implements RequesterInterface
{
    /**
     * @var Curl
     */
    protected $curlRequester;

    /**
     * HTTPRequester constructor.
     * @throws \ErrorException
     */
    public function __construct()
    {
        $this->curlRequester = new Curl();
    }

    public function fetchData(string $baseUrl): string
    {
        $this->curlRequester->get($baseUrl);
        return '';
    }
}
