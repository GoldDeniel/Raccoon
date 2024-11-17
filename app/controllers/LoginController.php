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
			$password = sha1($_POST['password']);

			$userModel = new User();
			$user = $userModel->verifyUser($username, $password);
	
			if ($user) {
				// User is authenticated, start a session and redirect to the dashboard
				session_start();
				$_SESSION['user_id'] = $user->id;
				$_SESSION['username'] = $user->username;
				$_SESSION['first_name'] = $user->first_name;
				$_SESSION['last_name'] = $user->last_name;
				header('Location: ' . ROOT . '/feed');
				return;
			} else {
				// Authentication failed, show an error message
				$this->view('login', ['error' => 'Invalid username or password']);
				return;
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