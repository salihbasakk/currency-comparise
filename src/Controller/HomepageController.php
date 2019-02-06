<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 28.01.2019
 * Time: 09:20
 */

namespace App\Controller;

use App\Entity\ExchangeRate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function lowestRates()
    {
        $em = $this->getDoctrine()->getManager();
        $eur = $em->getRepository(ExchangeRate::class)->findOneBy([], ['eur'=>'asc']);
        $usd = $em->getRepository(ExchangeRate::class)->findOneBy([], ['usd'=>'asc']);
        $gbp = $em->getRepository(ExchangeRate::class)->findOneBy([], ['gbp'=>'asc']);

        $eur = $eur->getEur();
        $usd = $usd->getUsd();
        $gbp = $gbp->getGbp();

        return $this->render('homepage/lowestRates.html.twig', [
            'eur' => $eur,
            'usd' => $usd,
            'gbp' => $gbp
        ]);
    }
}

