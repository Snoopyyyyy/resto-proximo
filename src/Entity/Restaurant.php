<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $street_number;

    #[ORM\Column(type: 'string', length: 255)]
    private $street_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\ManyToOne(targetEntity: Ville::class, inversedBy: 'restaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $ville_id;

    #[ORM\ManyToOne(targetEntity: Proprietaire::class, inversedBy: 'restaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $proprietaire_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStreetNumber(): ?string
    {
        return $this->street_number;
    }

    public function setStreetNumber(string $street_number): self
    {
        $this->street_number = $street_number;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->street_name;
    }

    public function setStreetName(string $street_name): self
    {
        $this->street_name = $street_name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getVilleId(): ?Ville
    {
        return $this->ville_id;
    }

    public function setVilleId(?Ville $ville_id): self
    {
        $this->ville_id = $ville_id;

        return $this;
    }

    public function getProprietaireId(): ?Proprietaire
    {
        return $this->proprietaire_id;
    }

    public function setProprietaireId(?Proprietaire $proprietaire_id): self
    {
        $this->proprietaire_id = $proprietaire_id;

        return $this;
    }
}
