<?php 

namespace Absolute\Db;

class Connection {

	/**
	* Connection list
	* @var array
	*/
	private static $_connections;

	/**
	* The adapter of connectio
	* @var Absolute\Db\Adapter
	*/
	private $_adapter;

	/**
	* The query builder of the connection
	* @var Absolute\Db\QueryBuilder
	*/
	private $_queryBuilder;

	private static $_defaultQueryBuilder = 'Sql';

	public function __construct(Adapter $adapter, QueryBuilder $queryBuilder = null) {
		$this->_adapter = $adapter;

		if( is_null( $queryBuilder ) ){
			$queryBuilder = QueryBuilder::factory(self::$_defaultQueryBuilder);
		}

		$this->_queryBuilder = $queryBuilder;
	}

	/**
	* Insert a new row in a table
	* @param string $table The table name
	* @param array $data The cols to be inserted
	* @return int inserted id
	* @throws Absolute\Db\QueryBuilder\Exception When a param is empty
	*/
	public function insert($table, array $data) {
		
		$query = $this->getQueryBuilder()->makeInsert($table, $data);

		$this->getAdapter()->execute($query);

		return $this->getAdapter()->getLastInsertedId();
	}

	/**
	* Update a row in a table
	* @param string $table The table name
	* @param array $keys Primaries keys from table
	* @param array $data The cols to be updated
	* @throws Absolute\Db\QueryBuilder\Exception When a param is empty
	*/
	public function update($table, array $keys, array $data) {
		$query = $this->getQueryBuilder()->makeUpdate($table, $keys, $data);
		$this->getAdapter()->execute($query);
	}

	/**
	* DELETE a row in a table
	* @param string $table The table name
	* @param array $keys Primaries keys from table
	* @throws Absolute\Db\QueryBuilder\Exception When a param is empty
	*/
	public function delete($table, array $keys) {
		$query = $this->getQueryBuilder()->makeDelete($table, $keys);
		$this->getAdapter()->execute($query);
	}

	public function rollBack() {
		$this->getAdapter()->rollBack();
	}

	public function commit() {
		$this->getAdapter()->commit();
	}

	public function startTransaction() {
		$this->getAdapter()->startTransaction();
	}

	/**
	* @return Absolute\Db\QueryBuilder
	*/
	public function getQueryBuilder() {
		return $this->_queryBuilder;
	}

	public function getAdapter() {
		return $this->_adapter;
	}

	public static function getConnection($name, Adapter $adapter = null, QueryBuilder $queryBuilder = null) {
		if( isset( self::$_connections[$name] ) )
			return self::$_connections[$name];

		if( is_null($adapter) )
			throw new \RunTimeException("The apdater cant not be empty.");

		self::$_connections[$name] = new Connection($adapter, $queryBuilder);

		return self::$_connections[$name];
	}
}











