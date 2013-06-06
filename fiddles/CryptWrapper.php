<?php

class CryptWrapper{
	public function crypt($username,$password,$type='2a$',$iterations='07$'){
	echo crypt($password,'$'.$type.$iterations.$username.'$')."\n";
}
}

class Index{
	public function __construct($argv,$object='CryptWrapper'){
		$argv=array_slice($argv,1);
		$function=array_shift($argv);
		print_r($argv);
		call_user_func_array(array(new $object,$function),$argv);
	}
}

new Index($argv);
