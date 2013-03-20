<?php

return array(
	'folder'=>'application',
	'namespace'=>'application',
	'class'=>function(){
		return ucwords($_GET['class']);
	},
	'action'=>function(){
		return $_GET['action'];
	},
	'params'=>function(){
		return $_GET['params'];
	}
);
