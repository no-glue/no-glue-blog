<?php

class Mcrypt{
	public function crypt($username,$password,$type='2a$',$iterations='07$'){
	echo crypt($password,'$'.$type.$iterations.$username.'$')."\n";
}
}

class Index{
	public function __construct($argv){
		$argv=array_slice($argv,1);
		print_r($argv);
		call_user_func_array(array(new Mcrypt(),'crypt'),$argv);
	}
}

new Index($argv);
