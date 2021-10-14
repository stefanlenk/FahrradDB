<?php

namespace Application\View\Html;

use Application\Model\Summe;
use Application\View\Html;

class JahreHtml extends Html
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
					<th>Jahr</th>
					<th>Km</th>
					<th>km/h</th>
					<th>Kg</th>
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

        foreach ($this->summen as $jahre)
            $result .= $this->htmlTableRow($jahre);

        return $result;
    }

    /**
     * @param Summe $summe
     * @return string
     */
    protected function htmlTableRow( Summe $summe)
    {
        return
            '<tr>
				<td>' . $summe->getJahr() . '</td>
				<td>' . number_format($summe->getGesamtKM(),0,',','.') . '</td>
				<td>' . number_format($summe->getGesSchnitt(),2,',','.') . '</td>
				<td>' . number_format($summe->getGewicht(),2,',','.') . '</td>
			</tr>';
    }
}
