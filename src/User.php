<?php 

namespace PlatziPHP;

class User{
	
	/**
	 * @type string
	 */
	protected $email;

	/**
	 * @type string
	 */
	protected $password;

	/**
	 * @type string
	 */
	protected $firstName;

	/**
	 * @var string
	 */
	protected $lastName;

	public function __construct($email, $password){
		$this->email = $email;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	/**
	 * @param $firsrName
	 * @param $lastName
	 */
	public function setName($firstName, $lastName){
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	/**
	 * @return string
	 */
	public function getFirsName(){

		return 'by '.$this->firstName;
	}
}