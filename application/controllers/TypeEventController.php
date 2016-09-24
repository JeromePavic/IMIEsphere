<?php


class TypeEventController{
	
	
	//this function gets the 'new type_event' formular
	public function typeEventAddAsk($currentRole, $currentDate, $message) {
	
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
		}
	}
	
	
	
}



?>