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
        $entities[0] = ['name' => 'Simon'];
        $entities[1] = ['name' => 'Luiz'];
        $entities[2] = ['name' => 'Lukas'];


        return $this->render('home.html.twig', [
            'entities' => $entities
        ]);
    }
}