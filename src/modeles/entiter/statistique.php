<?php

namespace modeles\entiter;

class Statistique
{
    private int $idStatistique; 
    private int $nbTentatives;
    private bool $reussi;
    private int $tempsPasse;
    private string $nomUtilisateur;
    private int $idEnquete;

    /**
     * Constructeur
     */
    public function __construct(int $idStatistique,int $nbTentatives,bool $reussi,int $tempsPasse,string $nomUtilisateur,int $idEnquete) {
        $this->idStatistique = $idStatistique;        
        $this->nbTentatives = $nbTentatives;
        $this->reussi = $reussi;
        $this->tempsPasse = $tempsPasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->idEnquete = $idEnquete;
    }

    /**
     * Getters et Setters
     */


    public function getIdStatistique(): int
    {
        return $this->idStatistique;
    }

    public function setIdStatistique(int $idStatistique): void
    {
        $this->idStatistique = $idStatistique;
    }

    public function getNbTentatives(): int
    {
        return $this->nbTentatives;
    }

    public function setNbTentatives(int $nbTentatives): void
    {
        $this->nbTentatives = $nbTentatives;
    }

    public function isReussi(): bool
    {
        return $this->reussi;
    }

    public function setReussi(bool $reussi): void
    {
        $this->reussi = $reussi;
    }

    public function getTempsPasse(): int
    {
        return $this->tempsPasse;
    }

    public function setTempsPasse(int $tempsPasse): void
    {
        $this->tempsPasse = $tempsPasse;
    }

    public function getNomUtilisateur(): string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): void
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    public function getIdEnquete(): int
    {
        return $this->idEnquete;
    }

    public function setIdEnquete(int $idEnquete): void
    {
        $this->idEnquete = $idEnquete;
    }
}
