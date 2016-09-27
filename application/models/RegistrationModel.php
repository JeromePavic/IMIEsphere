<?php 

class RegistrationModel {
	
	public function registrationAdd($max_place, $registration_start, $registration_end, $pre_registration, $id_event) {
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		
		echo '____________________________________________';
		var_dump($max_place);
		var_dump($registration_start);
		var_dump($registration_end);
		var_dump($pre_registration);
		var_dump($id_event);
		

		
		$query=$db->prepare('INSERT INTO registration (max_place, registration_start, registration_end, pre_registration, id_event) VALUES (:max_place, :registration_start, :registration_end, :pre_registration, :id_event)');
		$query->execute(array('max_place'=>$max_place, 'registration_start'=>$registration_start, 'registration_end'=>$registration_end, 'pre_registration'=> $pre_registration, 'id_event'=>$id_event));
		
		$query = $db->query('SELECT id_registration FROM registration ORDER BY registration.id_registration DESC LIMIT 1');
		$registration = $query->fetch();
		$id_registration = $registration[0];
		
		return $id_registration;
	}
	
	public function getRegistrationLess ($id_event, $id_role){
	
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$query = $db->query('SELECT registration.id_registration, registration.max_place, registration.registration_start, registration.registration_end, registration.pre_registration FROM registration
						        WHERE registration.id_event = '.$id_event.'');
		$registration = $query->fetch();
		return $registration;
	}
	
	public function getRegistrationMore ($id_event, $id_role){
		
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$query = $db->query('SELECT registration.id_registration, registration.max_place, registration.registration_start, registration.registration_end, registration.pre_registration, payment.price  FROM registration
						        INNER JOIN cost ON registration.id_registration = cost.id_registration
						        INNER JOIN payment ON cost.id_payment = payment.id_payment
						        WHERE registration.id_event = '.$id_event.' AND cost.id_role = '.$id_role.'');
		$registration = $query->fetch();
		return $registration;
	}
	
	public function getPlacesRegistration ($id_registration){
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$query = $db->query('SELECT max_place  FROM registration WHERE registration.id_registration = '.$id_registration.'');
		$registration = $query->fetch();
		return $registration;
	}
	
}

?>