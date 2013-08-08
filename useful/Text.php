<?php

namespace useful;

class Text{
	public function cut($text,$length=100,$start=0){
		$result=substr($text,$start,$length);
		$lastch=$result[strlen($result)-1];

		$lastch==='.' AND
		$result.='..';

		$lastch!=='.' AND
		$result.='...';

		return $result;
	}
}
