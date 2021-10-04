<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Tour;
use Application\View\Html;

class TourenListeHtml extends Html
{
    /** @var array */
    protected array $touren;

    /**
     * @param array $touren
     */
    public function __construct(array $touren)
    {
        $this->touren = $touren;
    }

    public function render()
    {
        $this->html =
            '<table>
                <thead>
				<tr>
					<th>Datum</th>
					<th>Titel</th>
					<th>Km</th>
					<th>km/h</th>
					<th>Rad</th>
					<th>Power avg</th>
					<th></th>
					<th></th>
				</tr>
			    </thead>
			    <tbody>
				    ' . $this->htmlTableRows() . '					
                </tbody>
			</table>';
    }

    /**
     * @return string|null
     */
    protected function htmlTableRows()
    {
        $result = NULL;

        foreach ($this->touren as $tour)
           $result .= $this->htmlTableRow($tour);

        return $result;
    }

    /**
     * @param Tour $tour
     * @return string
     */
    protected function htmlTableRow(Tour $tour)
    {
        return
            '<tr>
				<td>' . $this->datum($tour) . '</td>
				<td>' . $tour->getTitel() . '</td>
				<td>' . number_format($tour->getKm(),2,',', '.') . '</td>
				<td>' . number_format($tour->getSchnitt(),1,',', '.') . '</td>
				<td>' . $tour->getRad() . '</td>
				<td>' . $tour->getPowerAvg() . '</td>
				<td>' . $this->htmlAktionStrava($tour). '</td>
				<td>' . $this->htmlAktionVeloviewer($tour) . '</td>
			</tr>';
    }

    protected function datum($tour)
    {
        $datum = strtotime($tour->getDatumUhrzeit());
        return strftime("%d. %b %G",$datum);
    }

    protected function htmlAktionStrava($tour): ?string
    {
        if ($tour->getStrava() != NULL) {
            $query = $tour->getStrava();

            $result = '<a href="https://www.strava.com/activities/'
                . $query . '" target="_blank">Strava</a>';

            return $result;
        }
        else return NULL;
    }


    protected function htmlAktionVeloviewer($tour): ?string
    {
        if ($tour->getStrava() != NULL) {
            $query = $tour->getStrava();

            $result = '<a href="https://www.veloviewer.com/athletes/'
                . Name::veloviewer . '/activities/'
                . $query . '" target="_blank">Veloviewer</a>';

            return $result;
        }
        else return NULL;
    }
}
