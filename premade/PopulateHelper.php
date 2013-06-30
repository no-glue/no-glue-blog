<?php

namespace premade;

class PopulateHelper{
	public function populate(
		$object,
		$provider,
		$members,
		$setMember='set',
		$getMember='get'
	){
		foreach($members as $member){
			$setCall=$setMember.ucfirst($member);
			$getCall=$getMember.ucfirst($member);
			$object->{$setCall}($provider->{$getCall}());
		}
	}
}
