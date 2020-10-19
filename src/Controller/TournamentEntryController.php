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
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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
     * @Route("/tournament/show/{id}.{_format}",
     *     format="html",
     *     name="show_tournamententry",
     *     requirements = {
     *         "_format": "html|json",
     *     }
     * )
     */
    public function show(TournamentEntry $tournamentEntry, string $_format, SerializerInterface $serializer): Response {
        if ($_format === "json") return new Response($serializer->serialize($tournamentEntry,'json'));

        return $this->render('detailed-entry.html.twig',[
            'tournamentEntry' => $tournamentEntry
        ]);
    }

    /**
     * @Route("/tournament/delete/{id}.{format}",
     *    format="html",
     *     name="delete_tournamententry",
     *     requirements = {
     *          "_format": "html|json",
     *     }
     *)
     */
    public function delete(TournamentEntry $tournamentEntry, string $_format, SerializerInterface $serializer): Response {
        $entityManager = $this->getDoctrine()->getManager();

        $tmpID = $tournamentEntry->getId();

        $entityManager->remove($tournamentEntry);
        $entityManager->flush();

        if ($_format === "json") return new Response($serializer->serialize(null,'json'));

        return $this->render('deleted-entry.html.twig', [
            'id' => $tmpID
        ]);
    }
}
