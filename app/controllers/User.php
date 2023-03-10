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
					header('location:/Main/index');
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
					$_SESSION['user_id'] = $user->insert();
					$_SESSION['username'] = $user->username;
					header('location:/Main/index');
				}else{
					header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');
				}

			}else{
				$this->view('User/register');
			}
	}

	#[\app\filters\Login]
	public function logout(){
		session_destroy();
		header('location:/Main/index');
	}
}