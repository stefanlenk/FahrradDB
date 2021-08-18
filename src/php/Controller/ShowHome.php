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
        $ID = $this->modelID();
        $view = new Home($ID);
        $view->render();
		$this->response = new Html($view->getHtml());
	}

	/**
	 * @return array
	 */
	protected function modelID(): array
    {
		$connection = $this->setup->databaseConnection();
		$storage = new Database($connection);
		$result = $storage->getStravaID();
		return $result;
	}
}
