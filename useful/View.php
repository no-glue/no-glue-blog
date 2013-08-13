<?php

namespace useful;

class View{
	public static function load(
	$view,
	$for,
	$additionalValues=array(),
	$valuesLocation='blog/values/',
	$viewsLocation='blog/views/'
	){
		$values=require_once($valuesLocation.$view);
		$forValues=require_once($valuesLocation.$for);

		$values['subviews']=
			array_merge($values['subviews'],$forValues);

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		$view=$this->cache($view,$for,$additionalValues,$valuesLocation,$viewsLocation);

		require_once($viewsLocation.$view);
	}

	public function cache(
		$view,
		$for,
		$additionalValues,
		$valuesLocation,
		$viewsLocation,
		$cache=TRUE,
		$applicationPath=\premade\Constants::APPLICATION_PATH,
		$cachedName='cached_',
		$cachedFolder='views/'
	){
		if(!$cache){
			return $view;
		}

		$cachedFile=$applicationPath.$cachedFolder.$cachedName.$for;

		if(file_exists($cachedFile)){
			return $cachedName.$for;
		}
	}
}
