<?php

namespace useful;

class Cache{
	public static function cache(
		$view,
		$for,
		$values,
		$viewsLocation,
		$cache=FALSE,
		$applicationLocation=\premade\Constants::APPLICATION_LOCATION,
		$cachedName='cached_',
		$cachedLocation='cached/',
		$applicationFolder=\premade\Constants::APPLICATION_FOLDER,
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

		$require=$applicationFolder.$cachedLocation.$cachedName.$hash.$for;

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

		fclose($pointer);

		return $bytes;
	}
}
