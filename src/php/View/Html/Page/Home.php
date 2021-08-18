<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\HomeHtml;

class Home extends Page
{
	/** @var array */
	protected $ID;

	/**
	 * @param array $summen
	 */
	public function __construct($ID)
	{
		$this->ID = $ID;
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
		$view = new HomeHtml($this->ID);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
