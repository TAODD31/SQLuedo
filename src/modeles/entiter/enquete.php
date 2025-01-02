<?php

namespace modeles\entiter;

class enquete extends BaseEnquete
{

    /**
     * @param int $id
     * @param string $titre
     * @param string $description
     * @param int $nivInter
     * @param int $nivDiff
     * @param string $solution
     * @param string $indice
     */
    public function __construct(int $id, string $titre, string $description, int $nivInter, int $nivDiff, string $solution, string $indice)
    {
        BaseEnquete::__construct($id, $titre, $description, $nivInter, $nivDiff, $solution, $indice);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getNivInter(): int
    {
        return $this->nivInter;
    }

    public function setNivInter(int $nivInter): void
    {
        $this->nivInter = $nivInter;
    }

    public function getNivDiff(): int
    {
        return $this->nivDiff;
    }

    public function setNivDiff(int $nivDiff): void
    {
        $this->nivDiff = $nivDiff;
    }

    public function getSolution(): string
    {
        return $this->solution;
    }

    public function setSolution(string $solution): void
    {
        $this->solution = $solution;
    }

    public function getIndice(): string
    {
        return $this->indice;
    }

    public function setIndice(string $indice): void
    {
        $this->indice = $indice;
    }

}