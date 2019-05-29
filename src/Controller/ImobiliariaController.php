<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ImobiliariaController
 * @package App\Controller
 */
class ImobiliariaController extends AbstractController
{
    /**
     * @Route("index")
     */
    public function index()
    {

        return $this->render('imobiliaria.html.twig');

    }
}