<?php

require_once '../app/models/Post.php';
class FeedController extends Controller
{

	public function index()
	{
		if (!isset($_SESSION['user_id'])) {
			$this->view('login', ['error' => 'You must be logged in to view the feed.']);
			return;
		}
		$postModel = new Post();
        $posts = $postModel->getAllPosts();
        $this->view('feed', ['posts' => $posts]);
	}
	
}
