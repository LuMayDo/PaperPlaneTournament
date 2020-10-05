<?php

namespace App\Entity;

use App\Repository\TournamentEntryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TournamentEntryRepository::class)
 */
class TournamentEntry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $traveldistance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $planemodel = "";

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $flightduration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $participant;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraveldistance(): ?float
    {
        return $this->traveldistance;
    }

    public function setTraveldistance(float $traveldistance): self
    {
        $this->traveldistance = $traveldistance;

        return $this;
    }

    public function getPlanemodel(): ?string
    {
        return $this->planemodel;
    }

    public function setPlanemodel(string $planemodel): self
    {
        $this->planemodel = $planemodel;

        return $this;
    }

    public function getFlightduration(): ?float
    {
        return $this->flightduration;
    }

    public function setFlightduration(?float $flightduration): self
    {
        $this->flightduration = $flightduration;

        return $this;
    }

    public function getParticipant(): ?string
    {
        return $this->participant;
    }

    public function setParticipant(string $participant): self
    {
        $this->participant = $participant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
