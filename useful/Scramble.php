<?php

namespace application\classes;

class Scramble{
	public function scramble(
		$username,
		$password,
		$type='2a$',
		$iterations='12$',
		$padLength=22
	){
		$scrambled=crypt(
			$password,
			'$'.
			$type.
			$iterations.
			$this->getUsername($username,$padLength).
			'$'
		);
	
		return $scrambled;
	}

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
}
