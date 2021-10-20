<?php

namespace Application\View\Html;

use Application\Model\Summe;
use Application\View\Html;

class HomeHtml extends Html
{
    /** @var array */
    protected array $summen;

    /**
     * @param array $summen
     */
    public function __construct(array $summen)
    {
        $this->summen = $summen;
    }

    public function render()
    {
        $this->html =
            '<table>
                <thead>
				<tr>
					<th>Gesamt Km</th>
					<th>Gesamt Hm</th>
					<th>Km pro Tag</th>
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
    protected function htmlTableRows(): ?string
    {
        $result = NULL;

        foreach ($this->summen as $summe)
            $result .= $this->htmlTableRow($summe);

        return $result;
    }

    protected function SummenBerechnung(Summe $summe)
    {
        $km = $summe->getGesamtKM();
        $tage = $summe->getTage();
        $proTag = $km / $tage;
        return $proTag;
    }

    /**
     * @param Summe $summe
     * @return string
     */
    protected function htmlTableRow(Summe $summe)
    {
        return
            '<tr>
				<td>' . number_format($summe->getGesamtKM(),0,',','.') . '</td>
				<td>' . number_format($summe->getGesamtHM(),0,',','.') . '</td>
				<td>' . number_format($this->SummenBerechnung (),0,',','.') . '</td>
			</tr>';
    }
}
