<?php

namespace Absolute\Controller;

use Absolute\View,
	Absolute\View\Layout;

class Action {
	
	protected $view;
	protected $action;
	private $_params;
	private $_layout;
	
	public function __construct(array $params = array()) {
		$this->view = new View();
		$this->_params = $params;
		$this->_layout = Layout::getInstance();
	}
	
	public function setAction($action) {
		$this->action = $action;
		
		$this->{$action . 'Action'}();
	}
	
	public function getParams() {
		return $this->_params;
	}
	
	public function getParam($key) {
		return $this->_params[$key];
	}
	
	/**
	 * 
	 * @return \Absolute\View\Layout
	 */
	public function getLayout() {
		return $this->_layout;
	}
	
	public function render($useLayout = true) {
		if($useLayout==true && file_exists("../App/_views/layout.phtml"))
			include_once '../App/_views/layout.phtml';
		else
			$this->content();
	}
	
	protected function content() {
		$atual = get_class($this);
		$singleClassName = strtolower(str_replace("App\\Controller\\", "", $atual));
		include_once '../App/_views/' . $singleClassName . '/' . $this->action . '.phtml';
	}
}