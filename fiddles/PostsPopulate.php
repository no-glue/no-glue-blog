<?php

namespace fiddles;

class PostsPopulate{
	public function populate(
		$posts=16,
		$nameChars=16,
		$bodyChars=256,
		$act='BlogAct',
		$fakeLorem='FakeLorem',
		$factoryAct='\blog\act\Factory',
		$factoryUseful='\useful\Factory'
	){
		$act=$factoryAct::create($act);

		$fakeLorem=$factoryUseful::create($fakeLorem);

		$createdAt=time();

		while($posts--){
			$name=$fakeLorem->text(
				$nameChars
			);

			$body=$fakeLorem->text(
				$bodyChars
			);

			$act->addPost(
				(Object)array(
					'name'=>str_replace(' ','-',$name),
					'title'=>$name,
					'body'=>$body,
					'created_at'=>$createdAt,
					'modified_at'=>$createdAt
				)
			);
		}
	}
}
