<?php

namespace Absolute\View\Layout;

use Absolute\View\Placeholder;

class HeaderStyle extends Placeholder{
	
	public function __toString() {
		$styles = "";
		
		foreach( $this->_holder as $style ) {
			$styles .= "<link rel='stylesheet' type='text/css' href='{$style}' />";
		}
		
		return $styles;
	}
	
}