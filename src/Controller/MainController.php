<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/");
     */
    public function index()
    {
        $entities = [0];
        $entities[0] =
            array(
                'id' => 0,
                'name' => 'Luiz',
                'plane model' => 'xyz',
                'travelled distance' => 10,
                'flight duration' => '5s',
                'date' => '2020-09-20');


        return $this->render('home.html.twig', [
            'entities' => $entities
        ]);
    }
}