<?php

namespace fiddles;

use application\models;
use application\classes;

class CryptWrapper{
	public function getUsername($username,$padLength){
		if(($strlen=strlen($username))<$padLength){
			$difference=$padLength-$strlen;
			
			while($difference>$strlen){
				$username.=$username;
				$difference-=$strlen;
			}

			$remaining=substr($username,0,$difference);

			$username.=$remaining;
		}

		return $username;
	}

	public function crypt(
		$username,
		$password,
		$type='2a$',
		$iterations='07$',
		$padLength=22
	){
		$crypted=crypt(
			$password,
			'$'.
			$type.
			$iterations.
			$this->getUsername($username,$padLength).
			'$'
		);
	
		echo $crypted."\n";

		return $crypted;
	}
}
