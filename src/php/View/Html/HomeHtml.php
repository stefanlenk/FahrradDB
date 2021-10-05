<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
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
					<th>Rad</th>
					<th>Gesamt Km</th>
					<th>km/h</th>
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

        foreach ($this->summen as $summe)
            $result .= $this->htmlTableRow($summe);

        return $result;
    }

    /**
     * @param Summe $summe
     * @return string
     */
    protected function htmlTableRow(Summe $summe)
    {
        return
            '<tr>
				<td>' . $summe->getRad() . '</td>
				<td>' . number_format($summe->getGesamtKM(),0,',','.') . '</td>
				<td>' . number_format($summe->getGesSchnitt(),1,',','.') . '</td>
			</tr>';
    }
}
