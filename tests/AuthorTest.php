<?php 

use PlatziPHP\Domain\Author;

class AuthorTest extends PHPUnit_Framework_TestCase{

	/** @test */
	function it_should_construct(){
		$author = new Author(
				'email@algo.com', 
				'1234',
				'AUTOR_DE_PLATZI'

			);

		$this->assertInstanceOf(Author::class, $author);
	}

	/** @test */
	function it_should_fail_when_no_key_is_given(){
		
		$this->setExpectedException(\InvalidArgumentException::class);

		$author = new Author(
				'anemail@foo.dev',
				'1234', 
				'Isaac'
			);

		//$this->assertInstanceOf(Author::class, $author);
	}
}