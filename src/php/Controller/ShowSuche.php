<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\Model\Tour;
use Application\View\Html\Page\Suche;

class ShowSuche extends Controller
{
	public function handleRequest()
	{
        $requestMethod = $this->request->methodLowercased();
        $tour = new Tour();

        switch ($requestMethod) {
            case 'get':
                $this->response = $this->responseShowForm($tour);
                break;
            case 'post':
                $this->assignrequestToTour($tour);
                $this->response = $this->handleValidInput($tour);
        }
	}

    protected function responseShowForm($tour): html
    {
        $view = new Suche($tour);
        $view->render();
        return new Html($view->getHtml());
    }

    protected function assignrequestToTour(Tour $tour)
    {
        $datum = $this->request->valueOfParameter (Name::Datum);

        $tour->setDatumUhrzeit ($datum);
    }
	/**
	 * @return array
	 */
	protected function handleValidInput(Tour $tour)
    {
		$connection = $this->setup->databaseConnection();
		$storage = new Database($connection);
		$result = $storage->getTour();
		return $result;
	}
}
