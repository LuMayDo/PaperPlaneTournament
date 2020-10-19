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
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class PaperPlaneTournamentController extends AbstractController {

    /**
     * @Route("/tournament/results/1.{_format}",
     *     format="html",
     *     name="tournament_result",
     *     requirements = {
     *          "_format" = "html|json",
     *     }
     *)
     */
    public function stats(Request $request, string $_format, SerializerInterface $serializer): Response{
        $tournamentEntryRepository = $this->getDoctrine()->getRepository(TournamentEntry::class);
        $tournamentEntries = $tournamentEntryRepository->findAll();

        if ($_format === 'json') return new Response($serializer->serialize($tournamentEntries,'json'));

        return $this->render('results.html.twig', [
            'tournamentEntries' => $tournamentEntries,
            'admin' => ($request->query->get('key') === '123')
        ]);

    }

}
