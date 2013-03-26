<?php

return array(
	'folder'=>'application',
	'class'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->getCorrectClass($_GET['class'],
			function($word){
				return ucfirst($word);
			},
			'_lettersUnderscoresOnly'
		);
	},
	'action'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->getCorrectClass($_GET['action'],
			function($word){
				return lcfirst($word);
			},
			'_lettersUnderscoresNumbersOnly'
		);
	},
	'params'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->getCorrectParams(array_slice($_GET,2),
			function($word){
				return strtolower($word);
			},
			'_lettersUnderscoresNumbersOnly'
		);
	}
);
