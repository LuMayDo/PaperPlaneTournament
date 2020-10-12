<?php

namespace App\Controller;

use App\Entity\TournamentEntry;
use App\Form\Type\TournamentEntryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TournamentEntryController extends AbstractController
{
    /**
     * @Route("/tournament/entry", name="tournament_entry")
     */
    public function index()
    {
        return $this->render('tournament_entry/index.html.twig', [
            'controller_name' => 'TournamentEntryController',
        ]);
    }

    /**
     * @Route("/tournament/new", name="create_tournamententry")
     */
    public function createTournamentEntry(Request $request): Response
    {
        $tournamententry = new TournamentEntry();
        $tournamententry->setTraveldistance(0.0);
        $tournamententry->setPlanemodel("Default");
        $tournamententry->setFlightduration(0.0);
        $tournamententry->setParticipant("Name");
        $tournamententry->setDate(new \DateTime("01.01.2020"));

        $form = $this->createForm(TournamentEntryType::class, $tournamententry);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $tournamententry = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tournamententry);
            $entityManager->flush();

            return $this->redirectToRoute('tournament_result');
        }

        return $this->render('create-entry.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/tournament/show/{id}", name="show_tournamententry")
     */
    public function show(TournamentEntry $tournamentEntry): Response {
        return $this->render('detailed-entry.html.twig',[
            'tournamentEntry' => $tournamentEntry
        ]);
    }


}
