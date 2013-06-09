<?php

namespace application\classes;

class Scramble{
	public function scramble(
		$username,
		$password,
		$type='2a$',
		$iterations='12$'
	){
		$scrambled=crypt(
			$password,
			'$'.$type.$iterations.$username.'$'
		);
	
		return $scrambled;
	}
}
