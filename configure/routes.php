<?php

return array(
	'folder'=>'application',
	'class'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->getCorrectExpression($_GET['class'],
		function($word){
			return ucfirst($word);
		});
	},
	'action'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->getCorrectExpression($_GET['action'],
		function($word){
			return lcfirst($word);
		},
		'_lettersUnderscoresNumbersOnly'
		);
	},
	'params'=>function(){
		require_once('premade/LettersFactory.php');
		$letters=\premade\LettersFactory::create();
		return $letters->getCorrectParams($_GET['params'],
		function($word){
			return strtolower($word);
		},
		'_lettersUnderscoresNumbersOnly'
		);
	}
);
