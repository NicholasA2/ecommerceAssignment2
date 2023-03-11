<?php
namespace app\controllers;

class Follow extends \app\core\Controller {
	public function follow($follower_id, $followed_id) {
		$STMT = $this->model->follow($follower_id, $followed_id);
		if($STMT) {
			echo "You are now following this user!";
		} else {
			echo "Something went wrong.";
		}
	}

	public function unfollow($follower_id, $followed_id) {
		$STMT = $this->model->unfollow($follower_id, $followed_id);
		if ($result) {
			echo "You are no longer following this user.";
		} else {
			echo "Something went wrong.";
		}
	}

	public function get_followers($user_id) {
		$followers = $this->model->get_followers($user_id);
		echo "Followers: ";
		foreach ($followers as $follower_id) {
			echo $follower_id . ", ";
		}
	}

	public function get_following($user_id) {
		$following = $this->model->get_following($user_id);
		echo "Following: ";
		foreach ($following as $followed_id) {
			echo $followed_id . ", ";
		}
	}
	
}