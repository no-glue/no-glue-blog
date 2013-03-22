<?php

return array(
	'folder'=>'application',
	'class'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->lettersUnderscoresOnly($_GET['class'],
		function($word){
			return ucfirst($word);
		});
	},
	'action'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->lettersUnderscoresOnly($_GET['action'],
		function($word){
			return lcfirst($word);
		});
	},
	'params'=>function(){
		return $_GET['params'];
	}
);
