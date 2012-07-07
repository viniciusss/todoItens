<?php

namespace Absolute;

trait Singleton{
	
	private static $_instance;
	
	public static function getInstance() {
		
		 $className = __CLASS__;
		 
		 if ( !self::$_instance instanceof $className )
		 	self::$_instance = new $className;
		 
	 	return self::$_instance;
	}
	
}