<?php



class CityController{


	//this function gets the 'new city' formular
	public function cityAddAsk($currentRole, $currentDate, $id_city, $message) {
		
		require_once('application/models/CityModel.php');
		$cityModel = new CityModel();
		$allCities = $cityModel->getAllCities();
		
		$currentCity = $cityModel->getCity($id_city);

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
			
			header('location: index.php?action=calendar');
		}

	}

	public function cityMod($id_city, $city_name, $postal_code, $currentRole, $currentDate){
	
		require_once('application/models/CityModel.php');
		$cityModel = new CityModel();
		$cityModel->cityMod($id_city, $city_name, $postal_code);
				
		header('location: index.php?action=calendar');
		
	}

}



?>