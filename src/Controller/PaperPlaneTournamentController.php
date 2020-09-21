<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 14.09.2020
 * Time: 11:33
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaperPlaneTournamentController extends AbstractController{

    /**
     * @Route("/results/1")
     */

    public function stats(): Response{

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
