<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'hotel:item']),
        new GetCollection(normalizationContext: ['groups' => 'hotel:list'])
    ],
)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['hotel:list', 'hotel:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['hotel:list', 'hotel:item'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['hotel:list', 'hotel:item'])]
    private ?string $adresse = null;

    #[ORM\Column]
    #[Groups(['hotel:list', 'hotel:item'])]
    private ?int $nombre_etoile = null;

    #[ORM\ManyToOne]
    #[Groups(['hotel:list', 'hotel:item'])]
    private ?GroupeHotelier $groupe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNombreEtoile(): ?int
    {
        return $this->nombre_etoile;
    }

    public function setNombreEtoile(int $nombre_etoile): self
    {
        $this->nombre_etoile = $nombre_etoile;

        return $this;
    }

    public function getGroupe(): ?GroupeHotelier
    {
        return $this->groupe;
    }

    public function setGroupe(?GroupeHotelier $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }
}
