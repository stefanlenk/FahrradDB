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
    public function setRad(string $Rad)
    {
        $this->Rad = $Rad;
    }

    /**
     * @return float
     */
    public function getGesamtKM(): float
    {
        return $this->GesamtKM;
    }

    /**
     * @param float $GesamtKM
     */
    public function setGesamtKM(float $GesamtKM)
    {
        $this->GesamtKM = $GesamtKM;
    }

    /**
     * @return float
     */
    public function getGesSchnitt(): float
    {
        return $this->GesSchnitt;
    }

    /**
     * @param float $GesSchnitt
     */
    public function setGesSchnitt(float $GesSchnitt)
    {
        $this->GesSchnitt = $GesSchnitt;
    }
}
