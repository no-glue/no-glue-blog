<?php

namespace useful;

class Link{
	public function link(
		$class,
		$action,
		$text,
		$parameters=array(),
		$host=\premade\Constants::HOST
	){
		$host=(string)$host;

		if($host!==\premade\Constants::HOST){
			return '<a href=\''.$host.'\'>'.$text.'</a>';
		}

		$result='<a href=\'%s?%s\'>%s</a>';

		$query=http_build_query(
			array_merge(
				array(
					'class'=>$class,
					'action'=>$action
				),
				$parameters
			));

		return sprintf($result,$host,$query,$text);
	}

	public function css($location,$type='text/css',$rel='stylesheet'){
		return '<link href=\''.$location.'\' type=\''.$type.'\' rel=\''.$rel.'\'/>';
	}

	public function lineForm(
		$class,
		$action,
		$itemId='',
		$attributes=array(),
		$formName='view',
		$formMethod='get',
		$host=\premade\Constants::HOST
	){
		$string='<form method=\''.$formMethod.'\' action=\''.$host.'\'>';
		$string.='<input type=\'hidden\' name=\'class\' value=\''.$class.'\' />';
		$string.='<input type=\'hidden\' name=\'action\' value=\''.$action.'\' />';
		$string.='<input type=\'hidden\' name=\'id\' value='.$itemId.' />';

		$string.='<input type=\'submit\' name=\''.$formName.'\' value=\''.$formName.'\'';

		foreach($attributes as $key=>$attribute){
			$string.=' %s=\'%s\'';
			$string=sprintf($string,$key,$attribute);
		}

		$string.=' />';

		$string.='</form>';

		return $string;
	}
}
