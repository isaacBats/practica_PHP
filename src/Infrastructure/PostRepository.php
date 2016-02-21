<?php 

namespace PlatziPHP\Infrastructure;

use Illuminate\Support\Collection;
use PlatziPHP\Domain\Post;

class PostRepository {
	
	public function all()	{
		
		$pdo = $this->getPDO();

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
			
			$post = $this->mapPost($result);
			$posts->push($post);
		}

		return $posts;
	}

	private function mapPost(array $result){

		return new Post(
				$result['author_id'],
				$result['title'],
				$result['body'],
				$result['id']
			);
	}

	public function find($id){

		$pdo = $this->getPDO();

		$statement = $pdo->prepare(
			'SELECT * FROM posts WHERE id = :id'
		);

		$statement->bindParam(':id', $id, \PDO::PARAM_INT);

		$statement->execute();
		$result = $statement->fetch();

		if($result === false){

			throw new \OutOfBoundsException("Post $id does not exist.");
		}

		return $this->mapPost($result);
	}

	/**
	 * @return \PDO
	 */
	private function getPDO(){

		return new \PDO(
			'mysql:host=localhost;dbname=php_curso_guido', 
			'sa', 
			'1234'
		);
	}

	public function search($query){

		$pdo = $this->getPDO();

		$statement = $pdo->prepare(
			'SELECT * FROM posts WHERE title LIKE :query OR body LIKE :query'
		);

		$query = "%$query%";
		$statement->bindParam(':query', $query, \PDO::PARAM_STR);

		return $this->mapToPost($statement->fetchAll());

	}
}