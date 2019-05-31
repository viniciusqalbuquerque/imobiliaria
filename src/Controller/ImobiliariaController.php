<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ImobiliariaController
 * @package App\Controller
 */
class ImobiliariaController extends AbstractController
{
    /**
     * @Route("index", name="index")
     */
    public function index()
    {

        return $this->render('imobiliaria.html.twig');

    }
}