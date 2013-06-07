<?php

namespace fiddles;

use application\models;
use application\classes;

class CryptWrapper{
	public function crypt(
		$username,
		$password,
		$type='2a$',
		$iterations='07$'
	){
		$crypted=crypt(
			$password,
			'$'.$type.$iterations.$username.'$'
		);
	
		echo $crypted."\n";

		return $crypted;
	}
}

class Index{
	public function __construct($argv,$object='\fiddles\CryptWrapper'){
		$argv=array_slice($argv,1);
		$function=array_shift($argv);
		print_r($argv);
		call_user_func_array(array(new $object,$function),$argv);
	}
}

new \fiddles\Index($argv);
