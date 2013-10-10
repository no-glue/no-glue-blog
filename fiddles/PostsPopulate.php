<?php

namespace fiddles;

class PostsPopulate{
	public function populate(
		$posts=16,
		$fakeLorem='FakeLorem',
		$factory='\useful\Factory'
	){
		$fakeLorem=$factory::create($fakeLorem);

		var_dump($fakeLorem->text());
	}
}
