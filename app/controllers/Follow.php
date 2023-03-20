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

	public function follow($profile_id){
		$follow = new \app\models\Follow();

		$follower_id = $_SESSION['user_id'];
		$followed_id = $profile_id;

		$follow->follow($follower_id,$followed_id);

		header('location:/Profile/index/' . $profile_id);
	}

	public function unFollow($profile_id){
		$follow = new \app\models\Follow();

		$follower_id = $_SESSION['user_id'];
		$followed_id = $profile_id;

		$follow->unfollow($follower_id,$followed_id);

		header('location:/Profile/index/' . $profile_id);
	}





}