<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\Profile]
class Comment extends \app\core\Controller{
	public function add($publication_id){
		if(isset($_POST['action'])){
			$comment = new \app\models\Comment();
			$comment->comment = $_POST['comment'];
			$comment->profile_id = $_SESSION['profile_id'];
			$comment->publication_id = $publication_id;
			$comment_id = $comment->insert();
		}
		header("location:/Publication/details/$publication_id#comment$comment_id");
	}

	public function edit($comment_id){
		$comment = new \app\models\Comment();
		$comment = $comment->get($comment_id);
		$publication_id = $comment->publication_id;
		if(isset($_POST['action']) && $comment->profile_id == $_SESSION['profile_id']){
			$comment->comment = $_POST['comment'];
			$comment->update();
		}
		header("location:/Publication/details/$publication_id#comment$comment_id");
	}

	public function delete($comment_id){
		$comment = new \app\models\Comment();
		$comment = $comment->get($comment_id);
		$publication_id = $comment->publication_id;
		if($comment->profile_id == $_SESSION['profile_id']){
			$comment->delete();
		}
		header("location:/Publication/details/$publication_id");
	}
}