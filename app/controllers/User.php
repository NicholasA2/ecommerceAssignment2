<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function index(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->getByUsername($_POST['username']);
			if($user){
				if(password_verify($_POST['password'], $user->password_hash)){
					$_SESSION['user_id'] = $user->user_id;
					$_SESSION['username'] = $user->username;
					header('location:/User/profile');
				}else{
					header('location:/User/index?error=Bad username/password combination');
				}
			}else{
				header('location:/User/index?error=Bad username/password combination');
			}

		}else{
			$this->view('User/index');
		}
	}

	public function register(){
			if(isset($_POST['action'])){
				$user = new \app\models\User();
				$usercheck = $user->getByUsername($_POST['username']);
				if(!$usercheck){
					$user->username= $_POST['username'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->insert();
					header('location:/Profile/create');
				}else{
					header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');
				}

			}else{
				$this->view('User/register');
			}
	}

	public function logout(){
		session_destroy();
		header('location:/User/index');
	}

	//public function profile(){
	//	if(!isset($_SESSION['user_id'])){
	//		header('location:/User/index');
	//		return;
	//	}
	//	$message = new \app\models\Profile();
	//	$messages = $message->getAllForUser($_SESSION['user_id']);
	//	$this->view('User/profile',$messages);
	//}
//CHANGE this to posts and profile since we don't have messages
}