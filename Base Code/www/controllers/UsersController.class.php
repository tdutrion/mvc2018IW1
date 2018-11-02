<?php
class UsersController{

	public function defaultAction(){
		echo "users default";
	}
	
	public function addAction(){
	
		$v = new View("addUser", "front");
		
	}
}