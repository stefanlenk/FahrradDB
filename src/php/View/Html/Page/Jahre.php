<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\JahreHtml;

class Jahre extends Page
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
		return 'Jahresübersicht';
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
		$view = new JahreHtml($this->summen);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
