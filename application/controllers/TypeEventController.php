<?php


class TypeEventController{
	
	
	//this function gets the 'new type_event' formular
	public function typeEventAddAsk($currentRole, $currentDate, $id_type_event, $message) {
		
		require_once('application/models/TypeEventModel.php');
		$typeEventModel = new TypeEventModel();
		$allTypeEvent = $typeEventModel->getAllTypeEvents();
		
		$currentTypeEvent = $typeEventModel->getTypeEvent($id_type_event);
	
		require_once('application/views/site/TypeEventAddForm.php');
	}
	
	public function typeEventAdd($type_event_name, $type_event_description, $currentRole, $currentDate){
	
		require_once('application/models/TypeEventModel.php');
		$typeEventModel = new TypeEventModel();
		if ($typeEventModel->checkTypeEvent($type_event_name)) {
			$this->typeEventAddAsk($currentRole, $currentDate, 'Un type du même nom existe déjà...');
		}
		else{
			$typeEventModel->typeEventAdd($type_event_name, $type_event_description);
			
			header('location: index.php?action=calendar');
		}
	}
	
	public function typeEventMod($id_type_event, $type_event_name, $type_event_description, $currentRole, $currentDate){

		require_once('application/models/TypeEventModel.php');
		$typeEventModel = new TypeEventModel();
		$typeEventModel->typeEventMod($id_type_event, $type_event_name, $type_event_description);
			
		header('location: index.php?action=calendar');
	}
	
	
	
}



?>