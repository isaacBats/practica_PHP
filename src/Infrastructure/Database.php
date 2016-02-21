<?php 

namespace PlatziPHP\Infrastructure;

use Illuminate\Support\Collection;
use PlatziPHP\Domain\Post;

class Database {
	
	public function posts()	{
		
		$pdo = new \PDO(
			'mysql:host=localhost;dbname=php_curso_guido', 
			'sa', 
			'1234'
		);

		$statement = $pdo->prepare(
			'SELECT * FROM posts'
		);
		$statement->execute();

		return $this->mapToPost(
			$statement->fetchAll()
		);		
	}

	private function mapToPost(array $results){

		$posts = new Collection();

		foreach ($results as $result) {
			
			$post = new Post(
				$result['author_id'],
				$result['title'],
				$result['body'],
				$result['id']
			);
			$posts->push($post);
		}

		return $posts;
	}
}