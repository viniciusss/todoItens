<?php

namespace Absolute\Db\Adapter;

use Absolute\Db\Adapter;

class PDO extends Adapter{
	
	private $_pdo;

	public function __construct(array $options) {
		if( empty($options) ) 
			throw new \RunTimeException("The options cant not be empty.");

		$dsn = $options['database'] . ":" . "host=" . $options['host'] . ";dbname=" . 
			$options['dbname'];

		$this->_pdo = new \PDO($dsn, $options['username'], $options['password'], $options['extras']);
		$this->_pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}

	public function getLastInsertedId() {
		return $this->_pdo->lastInsertId();
	}

	public function execute($query) {
		return $this->_pdo->exec($query);
	}

	public function fetchOne($query) {
		$sth = $this->_pdo->prepare($query);
		$sth->execute();
		return $sth->fetchColumn();
	}

	public function fetchAll($query) {
		$sth = $this->_pdo->prepare($query);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function fetchRow($query) {
		$sth = $this->_pdo->prepare($query);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function rollBack() {
		$this->_pdo->rollBack();
	}
	
	public function commit() {
		$this->_pdo->commmit();
	}

	public function startTransaction(){
		$this->_pdo->beginTransaction();
	}
}