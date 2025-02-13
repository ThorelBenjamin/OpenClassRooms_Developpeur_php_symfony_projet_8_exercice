<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $prix_mensuel = null;

    #[ORM\Column]
    private ?int $prix_journalier = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $nombre_de_place = null;

    #[ORM\Column(length: 255)]
    private ?string $boite_de_vitesse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixMensuel(): ?int
    {
        return $this->prix_mensuel;
    }

    public function setPrixMensuel(int $prix_mensuel): static
    {
        $this->prix_mensuel = $prix_mensuel;

        return $this;
    }

    public function getPrixJournalier(): ?int
    {
        return $this->prix_journalier;
    }

    public function setPrixJournalier(int $prix_journalier): static
    {
        $this->prix_journalier = $prix_journalier;

        return $this;
    }

    public function getNombreDePlace(): ?int
    {
        return $this->nombre_de_place;
    }

    public function setNombreDePlace(int $nombre_de_place): static
    {
        $this->nombre_de_place = $nombre_de_place;

        return $this;
    }

    public function getBoiteDeVitesse(): ?string
    {
        return $this->boite_de_vitesse;
    }

    public function setBoiteDeVitesse(string $boite_de_vitesse): static
    {
        $this->boite_de_vitesse = $boite_de_vitesse;

        return $this;
    }
}
