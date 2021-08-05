<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\HomeHtml;

class Home extends Page
{
	/** @var array */
	protected $summen;

	/**
	 * @param array $summen
	 */
	public function __construct($summen)
	{
		$this->summen = $summen;
	}

	protected function htmlPageTitle()
	{
		return 'Stefans';
	}

	/**
	 * @inheritDoc
	 */
	protected function htmlBody()
	{
		return $this->htmlSummenTabelle();
	}

	protected function htmlSummenTabelle()
	{
		$view = new HomeHtml($this->summen);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
