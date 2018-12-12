<?php

class UsersController{

	public function defaultAction(){
		echo "users default";
	}
	
	public function addAction(){
		$user = new Users();
		$user->setId(1);
		$user->setEmail("y.skrzypczyk@gmail.com");
		$user->save();

	
		$v = new View("addUser", "front");

		
	}

	public function saveAction(){
	
		$v = new View("addUser", "front");
		
	}


	public function loginAction(){
	
		$v = new View("loginUser", "front");
		
	}


	public function forgetPasswordAction(){
	
		$v = new View("forgetPasswordUser", "front");
		
	}
}