<?php

require_once '../app/models/Post.php';
class FeedController extends Controller
{

	public function index()
	{
		$postModel = new Post();
        $posts = $postModel->getAllPosts();
        $this->view('Feed', ['Posts' => $posts]);
	}
	
}
