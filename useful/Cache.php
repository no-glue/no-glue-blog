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
		$expiresSeconds=1800,
		$exclude=array(
			'blog_admin'
		)
	){
		if(!$cache || in_array(implode('_',array_slice(explode('_',$for),0,2)),$exclude)){
			return $viewsLocation.$view;
		}

		$hash=hash('sha256',print_r($values,true)).'_';

		$cachedFile=$applicationLocation.$cachedLocation.$cachedName.$hash.$for;

		$require=$cachedLocation.$cachedName.$hash.$for;

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
