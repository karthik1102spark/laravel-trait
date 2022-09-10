<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\Crud;
use Illuminate\Http\Request;

class PostController extends Controller
{
	use Crud;
	
	public function __construct() {
		
		//pages
		$this->list = 'posts.list';
		$this->create = 'posts.create';
		$this->edit = 'posts.edit';
		$this->show = 'posts.show';
		
		//routes
		$this->store = 'posts.store';
		$this->update = 'posts.update';
		$this->redirect = '/posts';
		$this->model = Post::class;
	}
	protected function validationRules($resource_id = 0)
	{
		return ['title' => 'required'];
	}
	
}