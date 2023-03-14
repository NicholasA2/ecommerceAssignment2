<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function create(){
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($_SESSION['user_id']);
		if(isset($_POST['action']) && $profile){
			$publication = new \app\models\Publication();
			$publication->caption = $_POST['caption'];
			$publication->profile_id = $_SESSION['user_id'];//FK
			$filename = $this->saveFile($_FILES['picture']);
			if($filename){
				$publication->picture = $filename;
				$publication->insert();
				header("location:/Profile/index/{$_SESSION['user_id']}");
			}else{
				header('location:/Publication/create/');
			}
			
		}else{
			$this->view('Publication/create');
		}
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function edit($publication_id){
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		if(isset($_POST['action']) && $publication->profile_id == $_SESSION['user_id']){
			$publication->caption = $_POST['caption'];
			$publication->update();
			header("location:/Profile/index/{$_SESSION['user_id']}");
		}else{
			$this->view('Publication/edit', $publication);
		}
	}

	public function details($publication_id){
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		$this->view('Publication/details', $publication);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function delete($publication_id){
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		if($publication->profile_id == $_SESSION['user_id']){
			unlink("images/$publication->picture");
			$publication->delete();
		}
		header("location:/Profile/index/{$_SESSION['user_id']}");
	}

}