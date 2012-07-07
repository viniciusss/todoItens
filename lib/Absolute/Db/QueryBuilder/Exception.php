<?php

namespace Absolute\Db\QueryBuilder;

class Exception extends \Exception {
	
	public static function emptyTableNameException(){
		throw new \RunTimeException("The table cant not be empty.");
	}

	public static function emptyKeysException() {
		throw new \RunTimeException("The keys cant not be empty.");
	}

	public static function emptyDataFieldsException() {
		throw new \RunTimeException("The data cant not be empty.");
	}

}