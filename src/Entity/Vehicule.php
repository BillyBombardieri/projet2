<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroserie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plaqueimmatriculation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbkilometre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateachat;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixachat;

    /**
     * @ORM\Column(type="integer")
     */
    private $dureelocation;

     /**
     * @ORM\Column(type="integer")
     */
    private $disponible;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNumeroserie(): ?string
    {
        return $this->numeroserie;
    }

    public function setNumeroserie(string $numeroserie): self
    {
        $this->numeroserie = $numeroserie;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPlaqueImmatriculation(): ?string
    {
        return $this->plaqueimmatriculation;
    }

    public function setPlaqueImmatriculation(string $plaqueimmatriculation): self
    {
        $this->plaqueimmatriculation = $plaqueimmatriculation;

        return $this;
    }

    public function getNbKilometre(): ?int
    {
        return $this->nbkilometre;
    }

    public function setNbKilometre(int $nbkilometre): self
    {
        $this->nbkilometre = $nbkilometre;

        return $this;
    }

    public function getDateAchat(): ?string
    {
        return $this->dateachat;
    }

    public function setDateAchat(string $dateachat): self
    {
        $this->dateachat = $dateachat;

        return $this;
    }

    public function getDisponible(): ?string
    {
        return $this->disponible;
    }

    public function setDisponible(string $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    

    public function getPrixAchat(): ?int
    {
        return $this->prixachat;
    }

    public function setPrixAchat(int $prixachat): self
    {
        $this->prixachat = $prixachat;

        return $this;
    }

    public function getDureeLocation(): ?int
    {
        return $this->dureelocation;
    }

    public function setDureeLocation(int $dureelocation): self
    {
        $this->dureelocation = $dureelocation;

        return $this;
    }


}
