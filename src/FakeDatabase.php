<?php 

namespace PlatziPHP;

use Illuminate\Support\Collection;
use PlatziPHP\Author;
use PlatziPHP\Post;

class FakeDatabase{
	
	/**
	 * @return Collection
	 */
	public function posts (){
		$author = new Author(
			'isaac@gmail.com',
			'1234',
			'AUTOR_DE_PLATZI'
		);

		$author->setName('Isaac', 'Batista');
		return new Collection([
			new Post($author, 'Post #1', 'This is the first post'),
			new Post($author, 'Post #2', 'This is the second post'),
			new Post($author, 'Post #3', 'This is the third post'),
			new Post($author, 'Post #4', 'This is the fourth post'),
		]);
	}
}