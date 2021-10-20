<?php

namespace Application\Model\Storage;

use Application\Model\Storage;
use Application\Model\Summe;
use Application\Model\Tour;
use PDO;

class Database extends Storage
{
    /** @var PDO */
    protected PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct( PDO $connection )
    {
        parent ::__construct ();

        $this -> connection = $connection;
    }

    /**
     * @return array
     */
    public function getAllTouren(): array
    {
        $sql = 'SELECT * FROM touren JOIN fahrrad
            ON touren.Rad = fahrrad.ID ORDER BY DatumUhrzeit';

        $statement = $this -> connection -> prepare ( $sql );
        $statement -> execute ();
        $rows = $statement -> fetchAll ( PDO::FETCH_ASSOC );
        $result = array();

        foreach ($rows as $row)
            $result[] = $this -> newTour ( $row );

        return $result;
    }

    /**
     * @param $row
     * @return Tour
     */
    protected function newTour( $row ): Tour
    {
        $result = new Tour();

        $result -> setDatumUhrzeit ( $row['DatumUhrzeit'] );
        $result -> setTitel ( $row['Titel'] );
        $result -> setKm ( $row['km'] );
        $result -> setHm ( $row['hm'] );
        $result -> setSchnitt ( $row['Schnitt'] );
        $result -> setRad ( $row['RadName'] );
        $result -> setPowerAvg ( $row['Power_Avg'] );
        $result -> setStrava ( $row['Activity_ID'] );
        return $result;
    }

    public function getTour( $tour ): array
    {
        $sql = 'SELECT * FROM touren JOIN fahrrad
            ON touren.Rad = fahrrad.ID WHERE DATE(DatumUhrzeit)= :Datum';
        $statement = $this -> connection -> prepare ( $sql );
        $statement -> execute ();
        $rows = $statement -> fetchAll ( PDO::FETCH_ASSOC );
        $result = array();
        foreach ($rows as $row)
            $result[] = $this -> newTour ( $row );

        return $result;
    }

    /**
     * @return array
     */
    public function getRadSummen(): array
    {
        $sql2 = 'SELECT fahrrad.RadName,SUM(touren.km),AVG(touren.Schnitt)
                  FROM touren
                  JOIN fahrrad ON touren.rad = fahrrad.ID
                  Group BY fahrrad.ID  ORDER BY SUM(touren.km) desc';
        $sql = 'SELECT Fahrrad,km,hm,Schnitt from radsummen';

        $statement = $this -> connection -> prepare ( $sql );
        $statement -> execute ();
        $rows = $statement -> fetchAll ( PDO::FETCH_ASSOC );
        $result = array();

        foreach ($rows as $row)
            $result[] = $this -> newRadSummen ( $row );

        return $result;
    }

    /**
     * @param $row
     * @return Summe
     */
    protected function newRadSummen( array $row ): Summe
    {
        $result = new Summe();

        $result -> setRad ( $row['Fahrrad'] );
        $result -> setGesamtKM ( $row['km'] );
        $result -> setGesamtHM ( $row['hm'] );
        $result -> setGesSchnitt ( $row['Schnitt'] );
        return $result;
    }

    /**
     * @return array
     */
    public function getJahrSummen(): array
    {
        $sql = 'SELECT * FROM jahressummen';

        $statement = $this -> connection -> prepare ( $sql );
        $statement -> execute ();
        $rows = $statement -> fetchAll ( PDO::FETCH_ASSOC );
        $result = array();

        foreach ($rows as $row)
            $result[] = $this -> newJahrSummen ( $row );

        return $result;
    }

    protected function newJahrSummen( array $row ): Summe
    {
        $result = new Summe();

        $result -> setJahr ( $row['Jahr'] );
        $result -> setGesamtKM ( $row['km'] );
        $result -> setGesamtHM ( $row['hm'] );
        $result -> setGesSchnitt ( $row['Schnitt'] );
        $result -> setGewicht ( $row['kg'] );
        return $result;
    }

    /**
     * @return array
     */
    public function getGesamtSumme(): array
    {
        $sql = 'SELECT ROUND(SUM(km)) AS km,
                ROUND(SUM(hm)) AS hm,
                COUNT(DISTINCT(DATE(DatumUhrzeit))) AS Tage,
                SUM(km) / COUNT(DISTINCT(DATE(DatumUhrzeit))) AS TagesKM
                FROM touren
                WHERE YEAR(DatumUhrzeit) > 2013';

        $statement = $this -> connection -> prepare ( $sql );
        $statement -> execute ();
        $row = $statement -> fetchAll ( PDO::FETCH_ASSOC );
        $result = array();
        $result[] = $this -> newJahrSummen ( $row );
        return $result;
    }

    protected function newGesamtSumme( $row ): Summe
    {
        $result = new Summe();

        $result -> setGesamtKM ( $row['km'] );
        $result -> setGesamtHM ( $row['hm'] );
        $result -> setTage ( $row['TagesKM'] );

        return $result;
    }
}