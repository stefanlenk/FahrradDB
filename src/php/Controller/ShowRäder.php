<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\Räder;

class ShowRäder extends Controller
{
	public function handleRequest()
	{
        $summen = $this->modelSumme();
        $view = new Räder($summen);
        $view->render();
		$this->response = new Html($view->getHtml());
	}

	/**
	 * @return array
	 */
	protected function modelSumme(): array
    {
		$connection = $this->setup->databaseConnection();
		$storage = new Database($connection);
		$result = $storage->getRadSummen ();
		return $result;
	}
}
