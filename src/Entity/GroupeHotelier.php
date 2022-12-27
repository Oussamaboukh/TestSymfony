<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\GroupeHotelierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GroupeHotelierRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'groupe:item']),
        new GetCollection(normalizationContext: ['groups' => 'groupe:list'])
    ],
)]
class GroupeHotelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['groupe:list', 'groupe:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['groupe:list', 'groupe:item'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['groupe:list', 'groupe:item'])]
    private ?string $description = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    
    public function __toString()
    {
        return $this->getNom();
    }

}