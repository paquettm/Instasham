<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\Profile]
class Comment extends \app\core\Controller{
	#[\app\filters\JustLeave]
	public function index(){
		//TODO: find a purpose for this index or place create here
	}

	public function add($publication_id){
		//-	To provide my opinion, as a user, I can add comments to a publication.
		if(isset($_POST['action'])){
			//make a new object
			$comment = new \app\models\Comment();
			//populate the object
			$comment->comment = $_POST['comment'];
			$comment->profile_id = $_SESSION['profile_id'];//FK
			$comment->publication_id = $publication_id;
			$comment_id = $comment->insert();
		}
		header("location:/Publication/details/$publication_id#comment$comment_id");
	}

	public function edit($comment_id){
		//To correct my comments, as a user, I can edit my comments.
		$comment = new \app\models\Comment();
		$comment = $comment->get($comment_id);
		$publication_id = $comment->publication_id;
		if(isset($_POST['action']) && $comment->profile_id == $_SESSION['profile_id']){//only my comments
			$comment->comment = $_POST['comment'];
			$comment->update();
		}
		header("location:/Publication/details/$publication_id#comment$comment_id");
	}

	public function delete($comment_id){
		//To avoid embarrassment, as a user, I can delete my publication.
		$comment = new \app\models\Comment();
		$comment = $comment->get($comment_id);
		$publication_id = $comment->publication_id;
		if($comment->profile_id == $_SESSION['profile_id']){//only my comments
			$comment->delete();
		}
		header("location:/Publication/details/$publication_id");
	}
}