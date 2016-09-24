<?php

class AddressController{

	//this function gets the 'new address' formular
	public function addressAddAsk($currentRole, $currentDate, $message) {
	
		require_once('application/models/CityModel.php');
		$cityModel = new CityModel();
		$allCities = $cityModel->getAllCities();
	
		require_once('application/views/site/AddressAddForm.php');
	}
	
	public function addressAdd($address_name, $street, $street_number, $building, $id_city, $currentRole, $currentDate){
	
		require_once('application/models/AddressModel.php');
		$addressModel = new AddressModel();
		if ($addressModel->checkAddress($street, $street_number, $building, $id_city)) {
			$this->addressAddAsk($currentRole, $currentDate, 'Une adresse identique existe déjà...');
		}
		else{
			$addressModel->addressAdd($address_name, $street, $street_number, $building, $id_city);
		}
	}
	

}

?>