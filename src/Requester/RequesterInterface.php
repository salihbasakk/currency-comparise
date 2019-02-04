<?php
/**
 * User: ahmetgunes - ahmet.gunes@enuygun.com
 * Date: 2019-02-04
 * Time: 18:27
 */

namespace App\Requester;


interface RequesterInterface
{
    public function fetchData(string $url): string;
}