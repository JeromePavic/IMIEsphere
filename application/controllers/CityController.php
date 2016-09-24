<?php



class CityController{


	//this function gets the 'new city' formular
	public function cityAddAsk($currentRole, $currentDate, $message) {

		require_once('application/views/site/CityAddForm.php');
	}

	public function cityAdd($city_name, $postal_code, $currentRole, $currentDate){

		require_once('application/models/CityModel.php');
		$cityModel = new CityModel();
		if ($cityModel->checkCity($city_name, $postal_code)) {
			$this->cityAddAsk($currentRole, $currentDate, 'Une ville identique existe déjà...');
		}
		else{
			$cityModel->cityAdd($city_name, $postal_code);
		}

	}



}



?>