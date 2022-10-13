<?php
namespace app\models;

class Publication extends \app\core\Model{
	public function getAll(){
		//get all newest first
		$SQL = "SELECT * FROM publication ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function search($searchTerm){
		//get all newest first
		$SQL = "SELECT * FROM publication WHERE caption LIKE :searchTerm ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function get($publication_id){
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO publication(profile_id, picture, caption) VALUES (:profile_id, :picture, :caption)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,
						'picture'=>$this->picture,
						'caption'=>$this->caption]);
	}

	public function update(){
		$SQL = "UPDATE publication SET picture=:picture, caption=:caption, date_time=:date_time WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['picture'=>$this->picture,
						'caption'=>$this->caption,
						'date_time'=>$this->date_time,
						'publication_id'=>$this->publication_id]);
	}

	public function delete(){
		$SQL = "DELETE FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
	}

	public function deleteComments(){
		$SQL = "DELETE FROM comment WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
	}

	public function getProfile(){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}

	public function getComments(){
		$SQL = "SELECT * FROM comment WHERE publication_id=:publication_id ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetchAll();
	}
}