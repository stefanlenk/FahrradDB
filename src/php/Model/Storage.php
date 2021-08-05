<?php

namespace Application\Model;

abstract class Storage
{
	/** @var mixed */
	protected $error;

	/**
	 */
	public function __construct()
	{
		$this->error = null;
	}

	/**
	 * @return mixed
	 */
	public function getError()
	{
		return $this->error;
	}

	/**
	 * @return array
	 */
	abstract public function getAllTouren();

	/**
	 * @return array
	 */
	abstract public function getSummen();

}
