<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 28.01.2019
 * Time: 09:20
 */

namespace App\Controller;


use App\Entity\Company;
use Curl\Curl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends AbstractController
{
    public function request()
    {
        $curl = new Curl();
        $curl->get('http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0');

        $result1 = json_decode($curl->response)->result;

        $curl->get('http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3');

        $result2 = json_decode($curl->response);

        var_dump($result1);
        var_dump($result2);

        $entityManager = $this->getDoctrine()->getManager();

        $company = new Company();
        $company->setCompanyName('mocky1');0
        $company->setUsd($result1[0]->amount);
        $company->setEur($result1[1]->amount);
        $company->setGbp($result1[2]->amount);

        $company2 = new Company();
        $company2->setCompanyName('mocky2');
        $company2->setUsd($result2[0]->oran);
        $company2->setEur($result2[1]->oran);
        $company2->setGbp($result2[2]->oran);

        var_dump($company, $company2);

        $entityManager->persist($company);
        $entityManager->persist($company2);
        $entityManager->flush();

        return new Response();
    }

}