<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Input\Task;

class Front extends Controller
{
	public function handleRequest()
	{
		$task = $this->request->valueOfParameter(Name::Task);

		switch($task)
		{
			case Task::ShowTourenListe:
				$controllerClassName = ShowTourenListe::class;
				break;
            case Task::Räder:
                $controllerClassName = ShowRäder::class;
                break;
            case Task::Jahre:
                $controllerClassName = ShowJahre::class;
                break;
			default:
				$controllerClassName = ShowHome::class;
				break;
            case task::Suche:
                $controllerClassName = ShowSuche::class;
                break;
		}

		/** @var Controller $controller */
		$controller = new $controllerClassName($this->setup, $this->request);
		$controller->handleRequest();
		$this->response = $controller->getResponse();
	}
}
