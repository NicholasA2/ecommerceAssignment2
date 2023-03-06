<?php
namespace app\models;

class Publication extends \app\core\Model{
	public function getAll(){
		$SQL = "SELECT * FROM publication ORDER BY timestamp DESC";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function search($searchTerm){
		$SQL = "SELECT * FROM publication WHERE caption LIKE :searchTerm ORDER BY timestamp DESC";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function get($publication_id){
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO publication(profile_id, picture, caption) VALUES (:profile_id, :picture, :caption)";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,
						'picture'=>$this->picture,
						'caption'=>$this->caption]);
	}

	public function update(){
		$SQL = "UPDATE publication SET picture=:picture, caption=:caption, timestamp=:timestamp WHERE publication_id=:publication_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['picture'=>$this->picture,
						'caption'=>$this->caption,
						'timestamp'=>$this->timestamp,
						'publication_id'=>$this->publication_id]);
	}

	public function delete(){
		$SQL = "DELETE FROM publication WHERE publication_id=:publication_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
	}

	public function getProfile(){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STMT = $this->connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}
}
