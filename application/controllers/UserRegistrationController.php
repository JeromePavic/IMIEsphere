<?php

class UserRegistrationController{

	public function register($id_registration, $id_user, $currentRole, $currentDate) {

		require_once('application/models/UserRegistrationModel.php');
		$userRegistrationModel = new UserRegistrationModel();
		$nbRegistred = $userRegistrationModel->getNbUserRegistration($id_registration);
		
		require_once('application/models/RegistrationModel.php');
		$registrationModel = new RegistrationModel();
		$registration = $registrationModel->getPlacesRegistration($id_registration);
		
		if ((intval($registration['max_place']) - intval($nbRegistred[0]) > 0) || (intval($registration['max_place'])==0)) {
			
			require_once('application/models/RegistrationModel.php');
			$userRegistrationModel = new UserRegistrationModel();
			$userRegistrationModel->register($id_registration, $id_user, $currentDate);
			
			header('location: index.php?action=calendar');
		}
		else {
			echo '<body onLoad="alert(\'Cet événement est complet...\')">';
				
		}

		
	
	}
	
	public function getUserRegistration ($id_user){
		
		require_once('application/models/UserRegistrationModel.php');
		$userRegistrationModel = new UserRegistrationModel();
		$userEvents = $userRegistrationModel->getUserRegistration($id_user);
		
		return $userEvents;
	}
	
}