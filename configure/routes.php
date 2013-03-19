<?php

return array(
	'folder'=>'application',
	'namespace'=>'application',
	'class'=>function(){
		return ucwords($_GET['class']);
	}
);
