<?php 

use PlatziPHP\Domain\Author;
use PlatziPHP\Domain\Post;

class PostTest extends PHPUnit_Framework_TestCase{

	/** @test */
	function it_gives_us_the_author_name(){

		$author = new Author(
				'email@foo.com',
				'1234',
				'AUTOR_DE_PLATZI'
		);

		$author->setName('Isaac', 'Batista');

		$post = new Post($author, 'A Title', 'A post body');

		$this->assertEquals(
				'by Isaac',
				$post->getAuthor()
		);
	}	
}