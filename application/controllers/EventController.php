<?php

class EventController{
	
	public function eventConsult($currentRole, $currentDate) {
	
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$allEvents = $eventModel->getAllEvents($currentDate);
		
		require_once('application/views/site/Calendarconsult.php');
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
		
		$availability = intval($registration['max_place']) - intval($userRegistration[0]);
		
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
	
	public function eventAdd($event_name, $event_description, $event_date_start, $event_date_end, $event_time_start, $event_time_end, $id_address, $id_type_event, $maxPlace, $registration_date_start, $registration_date_end, $registration_time_start, $registration_time_end, $pre_registration_date_start, $pre_registration_time_start, $priceNa, $priceAd, $priceMb, $currentRole, $currentDate){
	
		//here we control if start datetime is before end datetime
		require_once('application/controllers/DateController.php');
		$dateController = new DateController();
			
		if($dateController->rightDate($event_date_start, $event_date_end, $event_time_start, $event_time_end)) {
			//then we convert dates to right format
			$event_start = $dateController->dateConvert($event_date_start, $event_time_start);
			$event_end = $dateController->dateConvert($event_date_end, $event_time_end);
				
			require_once('application/models/EventModel.php');
			$eventModel = new EventModel();
			$id_event = $eventModel->eventAdd($event_name, $event_description, $event_start, $event_end, $id_address, $id_type_event);
			
			//then we add the registration
		
			//here we control if start datetime is before end datetime
			if($dateController->rightDate($registration_date_start, $registration_date_end, $registration_time_start, $registration_time_end)) {
				//then we convert dates to right format
				$registration_start = $dateController->dateConvert($registration_date_start, $registration_time_start);
				$registration_end = $dateController->dateConvert($registration_date_end, $registration_time_end);
				$pre_registration = $dateController->dateConvert($pre_registration_date_start, $pre_registration_time_start);
			}
			else {
				// if dates are wrong we just set the end date to the event start date and we convert dates to right format
				$registration_start = $dateController->dateConvert($registration_date_start, $registration_time_start);
				$registration_end = $event_start;
				$pre_registration = $dateController->dateConvert($pre_registration_date_start, $pre_registration_time_start);
			}
		
			require_once('application/controllers/RegistrationController.php');
			$registrationController = new RegistrationController();
			$registrationController->registrationAdd($maxPlace, $registration_start, $registration_end, $pre_registration, $id_event, $priceNa, $priceAd, $priceMb);
		}
		else{
			$eventController->eventAddAsk($currentRole, $currentDate, 'La date de début doit être antérieure à la date de fin');
		}
	}
	
	public function eventAdmin ($currentRole, $currentDate){
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$events = $eventModel->getAllEvents($currentDate);
		
		require_once('application/views/site/EventAdmin.php');
		
	}
	
	public function eventUser ($id_event, $currentRole, $currentDate){
		
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$event = $eventModel->getEvent($id_event);
		
		require_once('application/models/UserModel.php');
		$userModel = new UserModel();
		$users = $userModel->getUserEvent($id_event);
		
		require_once('application/views/site/EventUsers.php');
	}
	
}