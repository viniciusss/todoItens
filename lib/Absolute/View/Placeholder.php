<?php

namespace Absolute\View;

abstract class Placeholder{
	
	/**
	 * List of holders to be converted to string
	 * @var \ArrayObject 
	 */
	protected $_holder;
	
	public function __construct() {
		$this->_holder = new \ArrayObject();
	}
	
	/**
	 * 
	 * @param mixed $content
	 * @return \Absolute\View\Placeholder
	 */
	public function append($content) {
		$this->_holder->append($content);
		
		return $this;
	}
	
	public abstract function __toString();
}