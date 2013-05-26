<?php

namespace application\classes;

class View{
	public static function load($view,
	$body,
	$additionalValues=array(),
	$valuesLocation='application/values/',
	$viewsLocation='application/views/'){
		$values=require_once($valuesLocation.$view);

		$values['subviews']['blog_admin_body']=$body;

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		require_once('ClassFactory.php');

		require_once($viewsLocation.$view);
	}
}
