<?php

namespace useful;

class Cache{
	public static function cache(
		$view,
		$for,
		$values,
		$viewsLocation,
		$cache=TRUE,
		$applicationLocation=\premade\Constants::APPLICATION_LOCATION,
		$cachedName='cached_',
		$cachedLocation='blog/cached/',
		$expiresSeconds=1800
	){
		if(!$cache){
			return $viewsLocation.$view;
		}

		$cachedFile=$applicationLocation.$cachedLocation.$cachedName.$for;

		$require=$cachedLocation.$cachedName.$for;

		if(file_exists($cachedFile) && (filemtime($cachedFile)+$expiresSeconds>time())){
			return $require;
		}

		ob_start();
		require_once($viewsLocation.$view);
		$out=ob_get_clean();

		self::write($cachedFile,$out);

		return $require;
	}

	public static function write($file,$content){
		$pointer=fopen($file,'w');

		$bytes=fwrite($pointer,$content);

		fclose($file);

		return $bytes;
	}
}
