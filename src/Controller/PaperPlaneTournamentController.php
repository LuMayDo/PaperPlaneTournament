<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 14.09.2020
 * Time: 11:33
 */

namespace App\Controller;

use App\Entity\TournamentEntry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaperPlaneTournamentController extends AbstractController{

    /**
     * @Route("/tournament/results/1", name="tournament_result")
     */
    public function stats(Request $request): Response{
        $tournamentEntryRepository = $this->getDoctrine()->getRepository(TournamentEntry::class);
        $tournamentEntries = $tournamentEntryRepository->findAll();

        return $this->render('results.html.twig', [
            'tournamentEntries' => $tournamentEntries,
            'admin' => ($request->query->get('key') === '123')
        ]);

    }

}
