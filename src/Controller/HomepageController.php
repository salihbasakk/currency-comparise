<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 28.01.2019
 * Time: 09:20
 */

namespace App\Controller;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function lowestRates()
    {
        return $this->render('homepage/lowestRates.html.twig');
    }
}

