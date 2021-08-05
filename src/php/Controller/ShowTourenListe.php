<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\TourenListe;

class ShowTourenListe extends Controller
{
	public function handleRequest()
	{
        $touren = $this->modelTourenListe();
        $view = new TourenListe($touren);
        $view->render();
		$this->response = new Html($view->getHtml());
	}

	/**
	 * @return array
	 */
	protected function modelTourenListe(): array
    {
		$connection = $this->setup->databaseConnection();
		$storage = new Database($connection);
		$result = $storage->getAllTouren();
		return $result;
	}
}
