<?php
namespace app\models;

class Profile extends \app\core\Model{
	public function __toString(){
		return "$this->first_name $this->middle_name $this->last_name";
	}

	public function getAll(){
		$SQL = "SELECT * FROM profile";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetchAll();
	}

	public function get($profile_id){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}

	public function getPublications(){
		$SQL = "SELECT * FROM publication WHERE profile_id=:profile_id ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getComments(){
		$SQL = "SELECT * FROM comment WHERE profile_id=:profile_id ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO profile(first_name, middle_name, last_name, user_id) VALUES (:first_name, :middle_name, :last_name, :user_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'user_id'=>$this->user_id]);
		return self::$_connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'profile_id'=>$this->profile_id]);
	}

	
}