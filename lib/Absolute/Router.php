<?php

namespace Absolute;

use Absolute\Controller\DI\Container;

use Absolute\Router\Route;

class Router {
	
	/**
	 * 
	 * @var \ArrayObject
	 */
	private $_routeList;
	
	public function __construct() {
		$this->_routeList = new \ArrayObject();
	}
	
	public function addRoute(Route $route) {
		$this->checkRouteExists($route->getName());
		
		$this->getRouteList()->offsetSet($route->getName(),$route);
		
		return $this;
	}
	
	/**
	 * 
	 * @return \ArrayObject
	 */
	private function getRouteList() {
		return $this->_routeList;
	}
	
	private function checkRouteExists($name) {
		
		if( $this->getRouteList()->offsetExists($name) )
			throw new \RuntimeException("The role {$name} already exists.");
		
	}
	
	private function getUrl() {
		return trim(urldecode($_SERVER['REQUEST_URI']), '/');
	}
	
	public function run() {
		foreach( $this->getRouteList() as $route ) {
			
			if( $route->match( $this->getUrl(), $_SERVER['REQUEST_METHOD']  ) ) {
				
				$controller = Container::getController($route->getController(), $route->getParams())
					->setAction( $route->getAction() );
				return;
			}
		}
		
		echo 'pagina nao encontrada';
	}
}
