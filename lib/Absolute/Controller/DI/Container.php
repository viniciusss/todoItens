<?php

namespace Absolute\Controller\DI;

class Container {
	
	/**
	 * 
	 * @param string $name
	 * @param array $options
	 * @return \Absolute\Controller\Action
	 */
	public static function getController($name, array $options = null) {
		
		$className = "\\App\\Controller\\" . ucfirst($name);
		
		$instance = new $className($options);
		
		return $instance;
	}
}