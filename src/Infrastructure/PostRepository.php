<?php 

namespace PlatziPHP\Infrastructure;

use Illuminate\Support\Collection;
use PlatziPHP\Domain\EntityNotFound;
use PlatziPHP\Domain\Post;

class PostRepository extends BaseRepository {
	
	protected function table(){

		return 'posts';
	}



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
			
			$post = $this->mapEntity($result);
			$posts->push($post);
		}

		return $posts;
	}

	protected function mapEntity(array $result){

		return new Post(
				$result['author_id'],
				$result['title'],
				$result['body'],
				$result['id']
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