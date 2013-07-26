<?php

namespace premade;

class PdoDatabaseConnection{
	protected static $_instance;

	public static function getInstance(
		$driver='mysql',
		$host='localhost',
		$dbname='noglue_blog',
		$username='root',
		$password='root',
		$real='\\premade\\PdoDatabaseConnectionOne'
	){
		if(!self::$_instance){
			self::$_instance=new $real(
				$driver,
				$host,
				$dbname,
				$username,
				$password
			);
		}

		return self::$_instance;
	}
}
