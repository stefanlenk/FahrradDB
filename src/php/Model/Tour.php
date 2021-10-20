<?php

namespace Application\Model;

class Tour
{
	/** @var int */
	protected int $tourId;

    /** @var string */
    protected string $datumUhrzeit;

    /** @var string */
	protected string $titel;

    /** @var string */
    protected string $hm;

    /** @var string */
    protected string $km;

    /** @var string */
    protected string $Schnitt;

    /** @var string */
    protected string $Rad;

    /** @var string */
    protected $Strava;

    /** @var int */
    protected $PowerAvg;

	/**
	 * @param int $tourId
	 */
	public function setTourId(int $tourId)
	{
		$this->tourId = $tourId;
	}

    /**
     * @return int
     */
    public function getTourId(): int
    {
        return $this->tourId;
    }

	/**
	 * @param string $titel
	 */
	public function setTitel(string $titel)
	{
		$this->titel = $titel;
	}

	/**
	 * @return string
	 */
	public function getTitel(): string
    {
		return $this->titel;
	}

    /**
     * @return string
     */
    public function getHm(): string
    {
        return $this -> hm;
    }

    /**
     * @param string $hm
     */
    public function setHm( string $hm )
    {
        $this -> hm = $hm;
    }

    /**
     * @return string
     */
    public function getKm(): string
    {
        return $this->km;
    }

    /**
     * @param string $km
     */
    public function setKm(string $km)
    {
        $this->km = $km;
    }

    /**
     * @return string
     */
    public function getSchnitt(): string
    {
        return $this->Schnitt;
    }

    /**
     * @param string $Schnitt
     */
    public function setSchnitt(string $Schnitt)
    {
        $this->Schnitt = $Schnitt;
    }

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
     * @return string
     */
    public function getStrava()
    {
        return $this->Strava;
    }

    /**
     * @param string $Strava
     */
    public function setStrava($Strava)
    {
        $this->Strava = $Strava;
    }

    /**
     * @return string
     */
    public function getDatumUhrzeit(): string
    {
        return $this->datumUhrzeit;
    }

    /**
     * @param string $datumUhrzeit
     */
    public function setDatumUhrzeit(string $datumUhrzeit)
    {
        $this->datumUhrzeit = $datumUhrzeit;
    }

    /**
     * @return string
     */
    public function getPowerAvg()
    {
        return $this->PowerAvg;
    }

    /**
     * @param string $PowerAvg
     */
    public function setPowerAvg($PowerAvg)
    {
        $this->PowerAvg = $PowerAvg;
    }
}
