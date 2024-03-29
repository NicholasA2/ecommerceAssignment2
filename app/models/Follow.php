<?php
namespace app\models;

class Follow extends \app\core\Model{
	private int $follower_id;
	private int $followed_id;
	private int $timestamp;

	public function follow($follower_id, $followed_id) {
		$SQL = "INSERT INTO follow (follower_id, followed_id) VALUES (:follower_id, :followed_id)";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['follower_id'=>$follower_id, 'followed_id'=>$followed_id]);
	}

	public function unfollow($follower_id, $followed_id) {
		$SQL = "DELETE FROM follow WHERE follower_id=:follower_id AND followed_id=:followed_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['follower_id'=>$follower_id, 'followed_id'=>$followed_id]);
	}

	public function following($user_id) {
		$SQL = "SELECT * FROM publication JOIN follow ON publication.profile_id=follow.followed_id WHERE follow.follower_id=:user_id ORDER BY publication.timestamp DESC";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
	}
	
	public function isFollowing($profile_id, $user_id) {
		$SQL = "SELECT * FROM follow WHERE follower_id=:user_id AND followed_id=:profile_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id, 'profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		return ($STMT->rowCount() == 1);
	}
}