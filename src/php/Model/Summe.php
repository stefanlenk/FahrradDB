<?php

namespace Application\Model;

class Summe
{
    /** @var string */
    protected string $Rad;

    /** @var string */
    protected string $GesamtKM;

    /** @var string */
    protected string $GesSchnitt;

    /** @var string */
    protected string $Jahr;

    /** @var string */
    protected string $Gewicht;

    /**
     * @return string
     */
    public function getRad(): string
    {
        return $this->Rad;
    }

    /**
     * @param string $Rad
     */
    public function setRad( string $Rad)
    {
        $this->Rad = $Rad;
    }

    /**
     * @return string
     */
    public function getGesamtKM(): string
    {
        return $this->GesamtKM;
    }

    /**
     * @param string $GesamtKM
     */
    public function setGesamtKM(string $GesamtKM)
    {
        $this->GesamtKM = $GesamtKM;
    }

    /**
     * @return string
     */
    public function getGesSchnitt(): string
    {
        return $this->GesSchnitt;
    }

    /**
     * @param string $GesSchnitt
     */
    public function setGesSchnitt(string $GesSchnitt)
    {
        $this->GesSchnitt = $GesSchnitt;
    }

    /**
     * @return string
     */
    public function getJahr(): string
    {
        return $this -> Jahr;
    }

    /**
     * @param string $Jahr
     */
    public function setJahr( string $Jahr)
    {
        $this -> Jahr = $Jahr;
    }

    /**
     * @return string
     */
    public function getGewicht(): string
    {
        return $this -> Gewicht;
    }

    /**
     * @param string $Gewicht
     */
    public function setGewicht( string $Gewicht )
    {
        $this -> Gewicht = $Gewicht;
    }
}
