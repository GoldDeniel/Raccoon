<?php
require_once '../app/models/User.php';
class RegisterController extends Controller
{
	public function index()
	{
		$this->view('register');
	}
	public function register()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = $_POST['username'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$password = sha1($_POST['password']);

			$userModel = new User();
			$user = $userModel->registerUser($username, $password, $first_name, $last_name);

			if (!$user) {
				$this->view('register', ['error' => 'User already exists']);
				return;
			}

			header('Location: ' . ROOT . '/login');

			
		} else {
			header('Location: ' . ROOT . '/register');
		}
	}
}
