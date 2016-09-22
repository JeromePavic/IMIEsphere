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