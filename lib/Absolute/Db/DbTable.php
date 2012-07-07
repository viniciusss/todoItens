<?php

namespace Absolute\Db;

abstract class DbTable {

	public abstract function save(Entity $entity);

	public abstract function delete(Entity $entity);

	public abstract function findId();
}