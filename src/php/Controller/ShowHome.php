<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\Home;

class ShowHome extends Controller
{
	public function handleRequest()
	{
        $summen = $this->modelSumme();
        $view = new Home($summen);
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
		$result = $storage->getSummen();
		return $result;
	}
}
