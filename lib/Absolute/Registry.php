<?php

namespace Absolute;

abstract class Registry {
	
	private static $_registry;
	
	/**
	 * 
	 * @return \ArrayObject
	 */
	private static function getRegistry() {
		if( !self::$_registry instanceof \ArrayObject )
			self::$_registry = new \ArrayObject();
		
		return self::$_registry;
	}
	
	/**
	 * 
	 * @param string $name
	 * @return mixed
	 */
	public static function get($name) {
		settype($name, 'string');
		
		self::checkKeyDontExists($name);
		
		return self::getRegistry()->offsetGet($name);
	}
	
	/**
	 * 
	 * @param string $name
	 * @param mixed $value
	 */
	public static function set($name, $value) {
		settype($name, 'string');
		
		if( self::exists($name) )
			throw new \RuntimeException("The key {$name} exists in the registry.");
		
		self::getRegistry()->offsetSet($name, $value);
	}
	
	/**
	 * Remove the key from the registry
	 * @param string $name
	 */
	public static function remove($name) {
		settype($name, 'string');
		
		self::checkKeyDontExists($name);
		
		self::getRegistry()->offsetUnset($name);
	}
	
	/**
	 * 
	 * @param string $name
	 * @return boolean
	 */
	public static function exists($name) {
		settype($name, 'string');
		
		return self::getRegistry()->offsetExists($name);
	}
	
	/**
	 * @param string $name
	 * @throws \RuntimeException When the key dont exists in the registry
	 */
	protected static function checkKeyDontExists($name) {
		if( !self::exists($name) )
			throw new \RuntimeException("The key {$name} don't exists in the registry.");
	}
}