<?php

namespace application\classes;

class Text{
	public function cut($text,$length=100,$start=0){
		return substr($text,$start,$length);
	}
}
