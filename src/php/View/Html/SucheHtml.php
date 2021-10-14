<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Tour;
use Application\View\Html;

class SucheHtml extends Html
{
    /** @var object */
    protected $tour;

    /**
     * @param object $tour
     */
    public function __construct(object $tour)
    {
        $this->Tour = $tour;
    }


    public function render()
    {
        $this->html =
            '<form method="post">
				<p>' . $this->htmlSuche() . '</p>			
		 </form>';
    }

    /**
     * @param Tour $tour
     * @return string
     */
    protected function htmlSuche()
    {
        return
            '<label for="datum">Datum eingeben:</label>
            <input type="date" name="'. Name::Datum .'">
            <button class="button" name="Task" value="' . Task::Suche . '"
             >suchen</button>';
    }
}