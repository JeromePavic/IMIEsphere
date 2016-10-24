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
	
	public function getUserRegistration ($id_user, $currentDate){

		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$query = $db->query('SELECT event.id_event, event.event_name, event.event_start, address.address_name, city.city_name FROM user_registration
								INNER JOIN registration ON user_registration.id_registration = registration.id_registration
								INNER JOIN event ON registration.id_event = event.id_event
								INNER JOIN address ON event.id_address = address.id_address
								INNER JOIN city ON address.id_city = city.id_city
						        WHERE user_registration.id_user = '.$id_user.'
								AND DATE(event.event_start) >= \''.$currentDate.'\'
								ORDER BY DATE(event.event_start)');
		$query = $query->fetchAll();
		return $query;
	}
	
	
	
	
	
	
	
	
}



?>