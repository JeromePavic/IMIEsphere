<?php

class EventController{
	
	public function eventConsult($currentRole, $currentDate) {
	
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$allEvents = $eventModel->getAllEvents($currentDate);
		
		if (empty($allEvents)) {
			echo "problème de connexion à la base";
		} else {
			require_once('application/views/site/Calendarconsult.php');
		}
	}
	
	public function eventShow($id_event, $currentRole, $currentDate) {
		
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$event = $eventModel->getEvent($id_event);
		
		require_once('application/models/RegistrationModel.php');
		$registrationModel = new RegistrationModel();
		$registration = $registrationModel->getRegistrationMore($id_event, $currentRole);

		if ($registration == false){
			$registration = $registrationModel->getRegistrationLess($id_event, $currentRole);
			$registration['price']=0;
		}

		
		require_once('application/models/UserRegistrationModel.php');
		$userRegistrationModel = new UserRegistrationModel();
		$userRegistration = $userRegistrationModel->getNbUserRegistration($registration['id_registration']);
		
		$availability = $registration['max_place'] - $userRegistration[0];
		
		
		if (empty($event) && empty($registration) && empty($userRegistration)) {
			echo "problème de connexion à la base";
		} else {
			require_once('application/views/site/EventDetails.php');
		}
	}
	
	
	
	//this function gets the 'new event' formular
	public function eventAddAsk($currentRole, $currentDate, $message) {
	
		require_once('application/models/TypeEventModel.php');
		$typeEventModel = new TypeEventModel();
		$allTypeEvent = $typeEventModel->getAllTypeEvents();
	
		require_once('application/models/AddressModel.php');
		$addressModel = new AddressModel();
		$allAddress = $addressModel->getAllAddress();
	
		require_once('application/views/site/EventAddForm.php');
	}
	
	public function eventAdd($event_name, $event_description, $event_start, $event_end, $id_address, $id_type_event, $currentRole, $currentDate){
	
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$id_event = $eventModel->eventAdd($event_name, $event_description, $event_start, $event_end, $id_address, $id_type_event);
	
		return $id_event;
	}
	
}