<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	
	public function index($user_id){
		//view the profile
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($user_id);
		$this->view('Profile/index', $profile);
	}

	#[\app\filters\Login]
	public function create(){
		if(isset($_POST['action'])){
			$profile = new \app\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name =  $_POST['first_name'];
			$profile->last_name =  $_POST['last_name'];
			$profile->middle_name =  $_POST['middle_name'];
			$success = $profile->insert();
			if($success)
				header("location:/Profile/index/{$_SESSION['user_id']}?success=Profile Created.");
			else
				header("location:/Profile/index/{$_SESSION['user_id']}?error=Something went wrong. You can only have one profile."); 
		}else{
			$this->view('Profile/create');
		}
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function edit(){
		if (isset($_SESSION['user_id'])) {
			$profile = new \app\models\Profile();
			$profile = $profile->getByUserId($_SESSION['user_id']);
			$currentUser = $_SESSION['user_id'];
		}

		if(isset($_POST['action'])){

			$profile->first_name =  $_POST['first_name'];
			$profile->last_name =  $_POST['last_name'];
			$profile->middle_name =  $_POST['middle_name'];

			$success = $profile->update();
			if($success > 0)
				header("location:/Profile/index/{$_SESSION['user_id']}?success=Profile modified.");
			else if($success == 0)
				header("location:/Profile/index/{$_SESSION['user_id']}?success=Nothing modified.");
			else {
				header("location:/Profile/index/{$_SESSION['user_id']}?error=Something went wrong.");
			}
		}else{
			$this->view('Profile/edit',$profile);
		}
	}

}