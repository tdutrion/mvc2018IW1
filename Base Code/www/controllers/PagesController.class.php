<?php
class PagesController{
	
	public function defaultAction(){


		$v = new View("homepage", "front");
		$v->assign("pseudo","prof");
	}
	

}