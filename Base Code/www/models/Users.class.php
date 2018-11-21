<?php
class Users extends BaseSQL{

	private $id = null;
	private $firstname;
	private $lastname;
	private $email;
	private $pwd;
	private $role=1;
	private $status=0;

	public function __construct(){
		parent::__construct();
	}


	public function setId($id){
		$this->id = $id;
	}
	public function setFirstname($firstname){
		$this->firstname = ucwords(strtolower(trim($firstname)));
	}
	public function setLastname($lastname){
		$this->lastname = strtoupper(trim($lastname));
	}
	public function setEmail($email){
		$this->email = strtolower(trim($email));
	}
	public function setPwd($pwd){
		$this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
	}
	public function setRole($role){
		$this->role = $role;
	}
	public function setStatus($status){
		$this->status = $status;
	}


}
