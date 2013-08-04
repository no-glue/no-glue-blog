<?php

namespace useful;

use premade;

class Redirect{
	public function __construct(){}

	public function redirect(
		$class,
		$action,
		$params=array(),
		$host=\premade\Constants::HOST
	){
		$query=http_build_query(
				array_merge(
					array(
						'class'=>$class,
						'action'=>$action
					),
				$params
			));

		$host.='?'.$query;

		header('Location:'.$host);
		
		exit();
	}
}
