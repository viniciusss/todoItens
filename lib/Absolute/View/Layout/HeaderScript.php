<?php

namespace Absolute\View\Layout;

use Absolute\View\Placeholder;

class HeaderScript extends Placeholder{
	
	public function __toString() {
		
		$scripts = "";
		
		foreach( $this->_holder as $script ) {
			$scripts .= "<script type='text/javascript' src='{$script}'></script>";
		}
		
		return $scripts;
	}
	
}