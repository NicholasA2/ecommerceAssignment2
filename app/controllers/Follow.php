<?php
namespace app\controllers;

class Follow extends \app\core\Controller {

	public function index() {
		$following = new \app\models\Follow();
        $following = $following->following($_SESSION['user_id']);
        if(isset($_POST['action'])) {
        	echo "hello";
        }
        $this->view('Follow/index', $following);
	}
}