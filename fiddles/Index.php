<?php

namespace fiddles;

class Index{
	public function __construct(
		$classLoader='../premade/SplClassLoader.php',
		$folder=__DIR__
	){
		$loader=require_once($classLoader);

		$loader->setIncludePath(dirname($folder));
	}

	public function run($argv,$namespace='\\fiddles\\'){
		$argv=array_slice($argv,1);

		$object=array_shift($argv);

		$object=$namespace.$object;

		$function=array_shift($argv);

		print_r($argv);

		call_user_func_array(array(new $object,$function),$argv);

		return $this;
	}
}

(new \fiddles\Index())->run($argv);
