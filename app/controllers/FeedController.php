<?php

require_once '../app/models/Post.php';
class FeedController extends Controller
{

	public function index()
	{
		if (!isset($_SESSION['user_id'])) {
			header('Location: '.ROOT.'/login');
			return;
		}
		$postModel = new Post();
        $posts = $postModel->getAllPosts();
        $this->view('Feed', ['Posts' => $posts]);
	}
	
}
