<?php
namespace app\controllers;

class Follow extends \app\core\Controller {

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function index() {
		$following = new \app\models\Follow();
        $following = $following->following($_SESSION['user_id']);
        $this->view('Follow/index', $following);
	}
}