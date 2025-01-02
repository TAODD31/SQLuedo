<?php

namespace modeles\entiter;
class utilisateur
{
    private string $nom;
    private string $mdp;

    /**
     * @param string $nom
     * @param string $mdp
     */
    public function __construct(string $nom, string $mdp)
    {
        $this->nom = $nom;
        $this->mdp = $mdp;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getMdp(): string
    {
        return $this->mdp;
    }

    public function isAdmin(): ?utilisateur
    {

        return null;
    }
}