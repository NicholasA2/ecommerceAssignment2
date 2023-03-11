<?php
namespace app\models;

class Follow extends app\core\Model{
	private int $follower_id;
	private int $followed_id;
	private int $timestamp;

	public function follow($follower_id, $followed_id) {
		$SQL = "INSERT INTO follow (follower_id, followed_id) VALUES ('$follower_id', '$followed_id')";
		$STMT = $this->connection->query($SQL);
		return $STMT;
	}

	public function unfollow($follower_id, $followed_id) {
		$SQL = "DELETE FROM follow WHERE follower_id='$follower_id' AND followed_id='$followed_id'";
		$STMT = $this->connection->query($SQL);
		return $STMT;
	}

	public function get_followers($user_id) {
		$SQL = "SELECT * FROM follow WHERE followed_id='$user_id'";
		$STMT = $this->connection->query($sql);
		$followers = array();
		while ($row = $result->fetch_assoc()) {
			$followers[] = $row['follower_id'];
		}
		return $followers;
	}

	public function get_following($user_id) {
		$SQL = "SELECT * FROM follow WHERE follower_id='$user_id'";
		$STMT = $this->connection->query($SQL);
		$following = array();
		while ($row = $result->fetch_assoc()) {
			$following[] = $row['followed_id'];
		}
		return $following;
	}
	
}