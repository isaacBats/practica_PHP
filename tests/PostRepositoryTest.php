<?php 

use Illuminate\Support\Collection;
use PlatziPHP\Infrastructure\PostRepository;


class PostRepositoryTest extends PHPUnit_Framework_TestCase{

	public function test_all_posts(){

		$posts = new PostRepository();

		$result = $posts->all();

		//$this->assertCount(3, $result);
		//var_dump($result);
		
		$this->assertInstanceOf(
			\Illuminate\Support\Collection::class,
			$result
		);

		foreach ($result as $post) {
			$this->assertInstanceOf(
				\PlatziPHP\Domain\Post::class, 
				$post
			);
		}
	}

	public function test_find_a_post_by_id(){

		$posts = new PostRepository();
		$post = $posts->find(1);
		$this->assertInstanceOf(
			\PlatziPHP\Domain\Post::class,
			$post
		);
	}

	public function test_fail_to_find_a_post_by_id(){

		$posts = new PostRepository();
		$this->setExpectedException(\OutOfBoundsException::class);
		$post = $posts->find(34);
	}

	public function test_searching_posts(){

		$posts = new PostRepository();

		$results = $posts->search('#3');
		$this->assertInstanceOf(Collection::class, $results);
	}
}