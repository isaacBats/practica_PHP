<?php 
namespace PlatziPHP\Http\Controllers;


use Illuminate\Http\Request;
use PlatziPHP\FakeDatabase;
use PlatziPHP\Http\Views\View;


class HomeController{

	/**
	 * @type FakeDatabase
	 */
	private $db;

	public function __construct(FakeDatabase $db){
		$this->db = $db;
	}

	public function index(Request $request){

		$posts = $this->db->posts();
		$first = $posts->first();

		/*return View::make('home', [
			'posts' => $posts, 
			'firstPost' => $first
		]);*/

		$view = new View('home', [
			'posts' => $posts, 
			'firstPost' => $first
		]);

		return $view->render();

		/*$response = $view->render();
		$response->send();*/

		//var_dump($request);
		// return 'Hello at '. 
		// $request->getRequestUri().
		// ' from controller!';
	}
}
