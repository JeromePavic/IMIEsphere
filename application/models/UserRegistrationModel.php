<?php

class UserRegistrationModel {
	
	
	public function getNbUserRegistration($id_registration) {
		
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$query = $db->query('SELECT COUNT(*) FROM user_registration
						        WHERE user_registration.id_registration = '.$id_registration.'');
		$number = $query->fetch();
		return $number;
	}
	
	public function register ($id_registration, $id_user, $currentDate){

		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$req=$db->prepare('INSERT INTO user_registration (id_registration, id_user, date_time_registration) VALUES (:id_registration, :id_user, :date_time_registration)');
		$req->execute(array('id_registration'=>$id_registration, 'id_user'=>$id_user, 'date_time_registration'=>$currentDate));
	}
	
	
	
	
	
	
	
	
}



?>