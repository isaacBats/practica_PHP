<?php

use PlatziPHP\Domain\User;

class UserTest extends PHPUnit_Framework_TestCase{
	
	/**
	 * @test
	 */
	public function it_should_be_able_to_construct(){

		$user = new User('fake@email.com', 'platzi');
		$this->assertInstanceOf(User::class, $user);
	}

	/** @test */
	function it_should_have_a_first_name(){

		$user = new User('email@example.com', '1234');
		$user->setName('Isaac', 'Batista');
		$name = $user->getFirstName();

		$this->assertEquals('Isaac', $name);
	}
}