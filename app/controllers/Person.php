<?php
namespace app\controllers;

class Person extends \app\core\Controller{


	public function index(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user = $user->getByUsername($_POST['username']);
			if($user){
				if(password_verify($_POST['password'], $user->password_hash)){
					$_SESSION['user_id'] = $user->user_id;
					header('location:/User/profile');
				}else{
					header('location:/User/index?error=Bad username and password combination.');
				}
			}else{
				header('location:/User/index?error=Bad username and password combination.');
			}
		}else {
			$this->view('User/index');
		}
	}

	public function register(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$usercheck = $user->getByUsername($_POST['username']);
			if(!usercheck){
				$user->username = $_POST['username'];
				$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->insert();
				header('location:/User/index');
			}else{
				header('location:/User/register?error=Username ' . $_POST['username'] . ' is being used by someone else. Please choose a different username.');
			}

		}else{
			$this->view('User/register');
		}
	}

//!!!!!!The logout function is for the user only, and as such, changes will probably be made to the previous methods as well
	public function logout(){
		session_destroy();
		header('location:/User/index');
	}


}