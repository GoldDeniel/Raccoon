<?php

require_once '../app/models/Comment.php';
class HomeController extends Controller
{
	public function index()
	{
		$this->view('home');
	}
	// TODO: Implement sending feedback to the admin, add author to the database, else null, or -1, up to you Dave

	public function createFeedback()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$message = $_POST['message'];
			$author = -1;
			if (isset($_SESSION['user_id'])) {
				$author = $_SESSION['user_id'];
			}
			if ($phone == "") $phone = "-";
			$commentModel = new Comment();
			$commentModel->createComment($message, $email, $phone, $author) ;
			header('Location: ' . ROOT . '/home');
		}
	}
	
}
