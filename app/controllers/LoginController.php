<?php

require_once '../app/models/User.php';

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login');
    }

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$userModel = new User();
			$user = $userModel->verifyUser($username, $password);
	
			if ($user) {
				// User is authenticated, start a session and redirect to the dashboard
				session_start();
				$_SESSION['user_id'] = $user->id;
				$_SESSION['username'] = $user->username;
				header('Location: ' . ROOT . '/feed');
				exit();
			} else {
				// Authentication failed, show an error message
				$this->view('login', ['error' => 'Invalid username or password']);
			}
		} else {
			$this->view('login');
		}
	}
	public function logout()
	{
		session_start();
		session_unset();
		session_destroy();
		header('Location: ' . ROOT . '/login');
		exit();
	}
}