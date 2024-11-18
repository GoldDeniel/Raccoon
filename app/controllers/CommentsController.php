<?php
require_once '../app/models/Comment.php';
class CommentsController extends Controller {

    public function index() {
        if (!isset($_SESSION['user_id'])) {     
			$this->view('404');
			return;
		}
        if (isset($_SESSION['role']) && $_SESSION['role'] != 2) {
            $this->view('404');
            return;
        }
        $commentModel = new Comment();
        $comments = $commentModel->getAllComments();
        $this->view('comments', ['comments' => $comments]);
    }
}    