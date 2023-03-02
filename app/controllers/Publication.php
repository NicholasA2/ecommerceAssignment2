<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function create(){
		if(isset($_POST['action'])){
			$publication = new \app\models\Publication();
			$publication->caption = $_POST['caption'];
			$publication->profile_id = $_SESSION['profile_id'];//FK
			$filename = $this->saveFile($_FILES['picture']);
			if($filename){
				$publication->picture = $filename;
				$publication->insert();
				header('location:/Profile/index/');
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
		if(isset($_POST['action']) && $publication->profile_id == $_SESSION['profile_id']){
			$publication->caption = $_POST['caption'];
			$publication->update();
			header('location:/Profile/index/');
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
		if($publication->profile_id == $_SESSION['profile_id']){
			$publication->deleteComments();
			unlink("images/$publication->picture");
			$publication->delete();
		}
		header('location:/Profile/index/');
	}

}