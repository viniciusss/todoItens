<?php
namespace Absolute;

class View{
	
	private $_variables = null;
	
	public function __construct() {
		$this->_variables = new \stdClass();
	}
	
	public function __get($key) {
		return $this->_variables->{$key};
	}
	
	public function __set($key, $value) {
		$this->_variables->{$key} = $value;
	}
	
}