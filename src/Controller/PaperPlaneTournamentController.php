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

        $model = "Standard";
        $distance = "5m";
        $duration = "3s";
        $name = "Bruno";
        $date = "19/09/20";

        return $this->render('index.html.twig', [
            'model' => $model,
            'distance' => $distance,
            'duration' => $duration,
            'name' => $name,
            'date' => $date
        ]);

    }

}
