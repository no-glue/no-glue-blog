<?php

namespace fiddles;

class MakeFile{
	public function makeFile($file){
		$handle=fopen($file,'w');

		fclose($handle);
	}
}
