<?php

namespace Absolute\Router;

use Absolute\Router\Exception\UnauthorizedMethod;

class Route{
	
	/**
	 * The name of route
	 * @var string
	 */
	private $_name;
	
	/**
	 * The controller name
	 * @var string
	 */
	private $_controller;
	
	/**
	 * The action name
	 * @var string
	 */
	private $_action = 'index';
	
	/**
	 * Pattern to be use on match
	 * @var string
	 */
	private $_pattern = null;
	
	/**
	 * Methods allowed to use the route
	 * 	POST, PUT, GET, DELETE
	 * @var array
	 */
	private $_methodsRestriction = array();
	
	private $_params = array();
	
	public function __construct($name, $controller, $action = 'index', $pattern = null) {
		
		$this->_name = (string) $name;
		$this->_controller = (string) $controller;
		$this->_action = (string) $action;
		
		if( is_null( $pattern ) ) {
			$pattern = '#^' . $name . '$#i';
		}
		
		$this->_pattern = $pattern;
	}
	
	public function getName() {
		return $this->_name;
	}
	
	public function getController() {
		return $this->_controller;
	}
	
	public function getAction() {
		return $this->_action;
	}
	
	public function getParams() {
		return $this->_params;
	}
	
	public function addMethodRestriction($method) {
		$this->_methodsRestriction[] = $method;
	}
	
	public function unsetMethodsRestriction() {
		unset($this->_methodsRestriction);
	}
	
	private function checkMethodRestriction($method) {
		if( empty($this->_methodsRestriction) )
			return;
		
		if( !in_array($method, $this->_methodsRestriction ) )
			throw new UnauthorizedMethod();
	}
	
	public function match($uri, $method) {
		
		 $rel = (boolean) preg_match($this->_pattern, $uri, $values);
		 
		 if( !$rel )
		 	return false;
		 
		 $this->checkMethodRestriction($method);
		 
		 if( isset($values[1]) )
		 	$this->extractParams($values[1]);
		 
		 return true;
	}
	
	private function extractParams($params) {
		$this->_params = explode('/', $params);
	}
}