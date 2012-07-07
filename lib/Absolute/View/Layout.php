<?php

namespace Absolute\View;

use Absolute\View\Layout\HeaderStyle,
	Absolute\View\Layout\HeaderScript;

class Layout {
	
	/**
	 * @var \Absolute\View\Layout\HeaderScript
	 */
	private $_headerScript = null;
	
	/**
	 * @var \Absolute\View\Layout\HeaderStyle
	 */
	private $_headerStyle = null;
	
	private static $_instance;
	
	public function __construct() {
		$this->_headerScript = new HeaderScript();
		$this->_headerStyle = new HeaderStyle();
	}
	
	/**
	 * @return \Absolute\View\Layout\HeaderScript
	 */
	public function getHeaderScript() {
		return $this->_headerScript;
	}
	
	/**
	 * @return \Absolute\View\Layout\HeaderStyle
	 */
	public function getHeaderStyle() {
		return $this->_headerStyle;
	}
	
	/**
	 * @return \Absolute\View\Layout
	 */
	public static function getInstance() {
		if( is_null(self::$_instance) )
			self::$_instance = new Layout();
		
		return self::$_instance;
	}
}