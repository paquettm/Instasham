<?php
namespace app\models;

class Comment extends \app\core\Model{

	public function get($comment_id){
		$SQL = "SELECT * FROM comment WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_id'=>$comment_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO comment(profile_id, publication_id, comment) VALUES (:profile_id, :publication_id, :comment)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,
						'publication_id'=>$this->publication_id,
						'comment'=>$this->comment]);
		return self::$_connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE comment SET comment=:comment, date_time=:date_time WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment'=>$this->comment,
						'date_time'=>$this->date_time,
						'comment_id'=>$this->comment_id]);
	}

	public function delete(){
		$SQL = "DELETE FROM comment WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_id'=>$this->comment_id]);
	}

	public function getProfile(){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}

	public function getPublication(){
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}
}