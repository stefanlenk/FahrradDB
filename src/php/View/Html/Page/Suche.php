<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\SucheHtml;

class Suche extends Page
{
	/** @var array */
	protected $touren;

	/**
	 * @param array $touren
	 */
	public function __construct($touren)
	{
		$this->touren = $touren;
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
		$view = new SucheHtml($this->touren);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
