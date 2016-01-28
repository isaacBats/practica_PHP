<?php 

namespace PlatziPHP;

class User{
	
	private $email;

	private $password;

	private $firstName;

	private $lastName;

	public function __construct($email, $password){
		$this->email = $email;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	public function setName($firstName, $lastName){
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function getFirsName(){

		return 'by '.$this->firstName;
	}
}