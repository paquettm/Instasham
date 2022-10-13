<?php
namespace app\filters;

#[\Attribute]
class Profile extends \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['profile_id'])){
			header('location:/Profile/create?message=You must now create your profile to access publication/commenting functionality.');
			return true;
		}
		return false;
	}
}
?>