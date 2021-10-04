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
    public function __construct(PDO $connection)
    {
        parent::__construct();

        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function getAllTouren(): array
    {
        $sql = 'SELECT * FROM touren JOIN fahrrad
            ON touren.Rad = fahrrad.ID ORDER BY DatumUhrzeit';

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $result = array();

        foreach($rows as $row)
            $result[] = $this->newTour($row);

        return $result;
    }

    /**
     * @param $row
     * @return Tour
     */
    protected function newTour($row): Tour
    {
        $result = new Tour();

        $result->setDatumUhrzeit($row['DatumUhrzeit']);
        $result->setTitel($row['Titel']);
        $result->setKm($row['km']);
        $result->setSchnitt($row['Schnitt']);
        $result->setRad($row['RadName']);
        $result->setPowerAvg($row['Power_Avg']);
        $result->setStrava($row['Activity_ID']);
        return $result;
    }

    /**
     * @return array
     */
    public function getSummen()
    {
        $sql2 = 'SELECT fahrrad.Name,SUM(touren.km),AVG(touren.Schnitt)
                  FROM touren
                  JOIN fahrrad ON touren.rad = fahrrad.ID
                  Group BY fahrrad.ID  ORDER BY SUM(touren.km) desc';
        $sql  = 'SELECT * from radsummen';

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        $result = array();

        foreach($rows as $row)
            $result[] = $this->newSumme($row);

        return $result;
    }

    /**
     * @param $row
     * @return Summe
     */
    protected function newSumme($row): Summe
    {
        $result = new Summe();

        $result->setRad($row['Fahrrad']);
        $result->setGesamtKM($row['km']);
        $result->setGesSchnitt($row['Schnitt']);
        return $result;
    }
}