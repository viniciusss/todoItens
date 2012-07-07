<?php

namespace Absolute\Db;

class Entity{
	
	private $_keys;

	final public function __construct() {
		$this->init();
	}

	protected function init() {

	}

	public abstract function getKeys();

	public abstract function getData();
}