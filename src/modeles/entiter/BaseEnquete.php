<?php

namespace modeles\entiter;

abstract class BaseEnquete
{
    protected ?int $id;
    protected string $titre;
    protected string $description;
    protected int $nivInter;
    protected int $nivDiff;
    protected string $solution;
    protected string $indice;

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
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->nivInter = $nivInter;
        $this->nivDiff = $nivDiff;
        $this->solution = $solution;
        $this->indice = $indice;
    }
}