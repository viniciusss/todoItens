<?php

namespace Absolute\Application;

use Absolute\Router;

abstract class Bootstrap {
	
	/**
	 * The default router of application
	 * @var \Absolute\Router
	 */
	private $_router;
	
	public function __construct() {
		
		$this->_router = new Router();
		
		foreach(get_class_methods($this) as $method) {
			if( 'init' == substr($method, 0, 4) )
				$this->$method();
		}
		
		$this->getRouter()
			->run();
	}
	
	protected abstract function initRouter();
	
	/**
	 * 
	 * @return \Absolute\Router
	 */
	public function getRouter() {
		return $this->_router;
	}
}