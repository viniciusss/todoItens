<?php

namespace Absolute\Db;

abstract class QueryBuilder {
	

	/**
	* Factory method to queries builders
	* @param string $name The of the query builder
	* @return Absolute\Db\QueryBuilder
	*/
	public static function factory($name) {
		$name = __NAMESPACE__ . "\\QueryBuilder\\" . ucfirst($name);
		return new $name;
	}

	/**
	* Return a insert
	* @param string $table Table name
	* @param array $data Fields
	* @return string INSERT STEATEMENT
	*/
	public abstract function makeInsert($table, array $data);

	/**
	* Return a update
	* @param string $table Table name
	* @param array $keys Primary keys
	* @param array $data Fiels
	* @return string UPDATE STEATEMENT
	*/
	public abstract function makeUpdate($table, array $keys, array $data);

	/**
	* Return a delete steatement
	* @param string $table Table name
	* @param array $keys Primary keys
	* @return string DELETE STEATEMENT
	*/
	public abstract function makeDelete($table, array $keys);

	/**
	* Return a WHERE clausule
	* @param array $keys Fields to where
	* @return string WHERE clausule
	*/
	protected abstract function _makeWhere(array $keys);

	/**
	* Return a data fields body
	* @param array $data A key value array
	* @return string col = value
	*/
	protected abstract function _makeDataFields(array $data);
}