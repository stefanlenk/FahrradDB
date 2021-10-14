<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\TourenListeHtml;

class TourenListe extends Page
{
	/** @var array */
	protected array $touren;

	/**
	 * @param array $touren
	 */
	public function __construct($touren)
	{
		$this->touren = $touren;
	}

	protected function htmlPageTitle()
	{
		return 'TourenListe';
	}

	/**
	 * @inheritDoc
	 */
	protected function htmlBody()
	{
		return $this->htmlTourenTabelle();
	}

	protected function htmlTourenTabelle()
	{
		$view = new TourenListeHtml($this->touren);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
