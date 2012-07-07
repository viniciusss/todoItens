<?php

namespace Absolute\Db;

abstract class Adapter{
	

	public abstract function getLastInsertedId();

	public abstract function execute($query);

	public abstract function fetchOne($query);

	public abstract function fetchAll($query);

	public abstract function fetchRow($query);

	public abstract function rollBack();
	
	public abstract function commit();

	public abstract function startTransaction();
}