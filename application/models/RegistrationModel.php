<?php 

class RegistrationModel {
	
	public function registrationAdd($max_place, $registration_start, $registration_end, $pre_registration, $id_event) {
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		
		$query=$db->prepare('INSERT INTO registration (max_place, registration_start, registration_end, pre_registration, id_event) VALUES (:max_place, :registration_start, :registration_end, :pre_registration, :id_event)');
		$query->execute(array('max_place'=>$max_place, 'registration_start'=>$registration_start, 'registration_end'=>$registration_end, 'pre_registration'=> $pre_registration, 'id_event'=>$id_event));
		
		$query = $db->query('SELECT id_registration FROM registration ORDER BY registration.id_registration DESC LIMIT 1');
		$registration = $query->fetch();
		$id_registration = $registration[0];
		
		return $id_registration;
	}
	
}

?>