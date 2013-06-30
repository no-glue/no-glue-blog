<?php

namespace premade;

class PopulateHelper{
	public function populate(
		$object,
		$provider,
		$members,
		$conventionMember='_',
		$conventionCall='get'
	){
		foreach($members as $member){
			$mine=$conventionMember.$member;
			$call=$convention.ucfirst($member);
			$object->{$mine}=$provider->{$call};
		}
	}
}
