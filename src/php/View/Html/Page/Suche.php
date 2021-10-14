<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\SucheHtml;

class Suche extends Page
{
	/** @var array */
	protected $tour;

	/**
	 * @param array $tour
	 */
	public function __construct($tour)
	{
		$this->tour = $tour;
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
		$view = new SucheHtml($this->tour);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
