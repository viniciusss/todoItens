<?php

namespace Absolute\Router\Exception;

class UnauthorizedMethod extends \Exception {
	
	public function __construct() {
		parent::__construct('This page cant not be accessed using this URI method.');
		header('HTTP/1.0 501 Not Implemented');
	}
	
}