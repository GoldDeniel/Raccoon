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
	
			// Debugging statements
			echo "Username: " . htmlspecialchars($username) . "<br>";
			echo "Password: " . htmlspecialchars($password) . "<br>";
	
			$userModel = new User();
			$user = $userModel->verifyUser($username, $password);
	
			if ($user) {
				// User is authenticated, start a session and redirect to the dashboard
				session_start();
				$_SESSION['user_id'] = $user->id;
				$_SESSION['username'] = $user->username;
				header('Location: /dashboard');
				exit();
			} else {
				// Authentication failed, show an error message
				$this->view('login', ['error' => 'Invalid username or password']);
			}
		} else {
			$this->view('login');
		}
	}
}