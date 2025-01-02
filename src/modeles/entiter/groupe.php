<?php

namespace modeles\entiter;

class groupe
{
    private string $nom;
    private string $code;
    private string $createur;
    private int $nbMembre;

    /**
     * @param string $nom
     * @param string $code
     * @param string $createur
     */
    public function __construct(string $nom, string $code, string $createur, int $nbMembre = 1)
    {
        $this->nom = $nom;
        $this->code = $code;
        $this->createur = $createur;
        $this->nbMembre = $nbMembre;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * @param string $createur
     */
    public function setCreateur($createur)
    {
        $this->createur = $createur;
    }

    /**
     * @return int
     */
    public function getNbMembre()
    {
        return $this->nbMembre;
    }

    /**
     * @param int $nbMembre
     */
    public function setNbMembre()
    {
        $this->nbMembre += 1;
    }


}