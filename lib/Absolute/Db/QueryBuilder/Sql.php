<?php

namespace Absolute\Db\QueryBuilder;

use Absolute\Db\QueryBuilder;

class Sql extends QueryBuilder {
	
	/**
	* Return a insert
	* @param string $table Table name
	* @param array $data Fields
	* @return string INSERT STEATEMENT
	*/
	public function makeInsert($table, array $data) {
		if( empty($table) )
			Exception::emptyTableNameException();

		if( empty( $data ) )
			Exception::emptyDataFieldsException();

		$query = " INSERT INTO " . $table . " SET " ;

		$query .= $this->_makeDataFields($data);

		return $query;
	}

	/**
	* Return a update
	* @param string $table Table name
	* @param array $keys Primary keys
	* @param array $data Fiels
	* @return string UPDATE STEATEMENT
	*/
	public function makeUpdate($table, array $keys, array $data) {
		if( empty($table) )
			Exception::emptyTableNameException();

		if( empty( $keys ) )
			Exception::emptyKeysException();

		if( empty( $data ) )
			Exception::emptyDataFieldsException();

		$query = "UPDATE " . $table . " SET " ;
		$query .= $this->_makeDataFields($data);
		$query .= $this->_makeWhere($keys);

		return $query;
	}

	/**
	* Return a delete steatement
	* @param string $table Table name
	* @param array $keys Primary keys
	* @return string DELETE STEATEMENT
	*/
	public function makeDelete($table, array $keys) {
		if( empty($table) )
			Exception::emptyTableNameException();

		if( empty( $keys ) )
			Exception::emptyKeysException();

		$query = "DELETE FROM " . $table . "  " ;
		$query .= $this->_makeWhere($keys);

		return $query;
	}

	/**
	* Return a WHERE clausule
	* @param array $keys Fields to where
	* @return string WHERE clausule
	*/
	protected function _makeWhere(array $keys) {
		$query = " WHERE ";

		foreach($keys as $col => $val){
			$query .= " `{$col}` = '{$val}' AND ";
		}

		return substr( $query, 0, -4 );
	}

	/**
	* Return a data fields body
	* @param array $data A key value array
	* @return string col = value
	*/
	protected function _makeDataFields(array $data) {
		$query = "";
		foreach( $data as $col => $val )
			$query .= " `{$col}` = '{$val}', ";

		return substr( $query, 0, -2 );
	}
}