<?php
namespace app\filters;

#[\Attribute]
class Profile implements \app\core\AccessFilter{
	public function execute(){
		$currentUser = new \app\models\Profile();
		 if (!$currentUser->getByUserId($_SESSION['user_id'])) {
			header('location:/Profile/create?error=You must now create your profile to access publication functionality.');
			return true;
		}
		return false;
	}
}
?>