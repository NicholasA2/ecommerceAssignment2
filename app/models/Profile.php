<?php
namespace app\models;

class Profile extends \app\core\Model{
	public $user_id;
	public $first_name;
	public $last_name;
	public $middle_name;

	public function __toString(){
		return "$this->first_name $this->middle_name $this->last_name";
	}

	public function getByUserId($user_id){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['user_id'=>$user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');
		return $STH->fetch();
	}

	public function getPublications(){
        $SQL = "SELECT * FROM publication WHERE profile_id=:user_id ORDER BY timestamp DESC";
        $STMT = $this->connection->prepare($SQL);
        $STMT->execute(['user_id'=>$this->user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

	public function insert(){
		$SQL = "INSERT INTO profile(user_id,first_name,last_name,middle_name) VALUE (:user_id,:first_name,:last_name,:middle_name)";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'user_id'=>$this->user_id]);
		return $this->connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE `profile` SET `first_name`=:first_name,`last_name`=:last_name,`middle_name`=:middle_name WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		$data = ['user_id'=>$this->user_id,
				'first_name'=>$this->first_name,
				'last_name'=>$this->last_name,
				'middle_name'=>$this->middle_name];
		$STH->execute($data);
		return $STH->rowCount();
	}

	
	public function isFollowed($user_id) {
		$SQL = "SELECT * FROM follow WHERE follower_id=:user_id AND followed_id=:profile_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id, 'profile_id'=>$this->user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		return ($STMT->rowCount() == 1);
	}

	public function getFollowers() {
		$SQL = "SELECT * FROM follow JOIN profile ON follow.follower_id = profile.user_id WHERE follow.followed_id=:user_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetchAll();
	}





}