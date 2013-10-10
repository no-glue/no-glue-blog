<?php

namespace fiddles;

class PostsPopulate{
	public function populate(
		$posts=16,
		$act='BlogAct',
		$fakeLorem='FakeLorem',
		$factoryAct='\blog\act\facory',
		$factoryUseful='\useful\Factory'
	){
		$act=$factoryAct::create($act);

		$fakeLorem=$factoryUseful::create($fakeLorem);

		while($posts--){
		}

		var_dump($fakeLorem->text());
	}
}
