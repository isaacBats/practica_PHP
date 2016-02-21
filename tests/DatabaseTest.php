<?php 

use PlatziPHP\Infrastructure\Database;

class DatabaseTest extends PHPUnit_Framework_TestCase{

	public function test_connection_doesnt_explode(){

		$db = new Database();

		$result = $db->posts();

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
}