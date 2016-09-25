<?php

class RegistrationController {
	
	public function registrationAdd($max_place, $registration_start, $registration_end, $pre_registration, $id_event, $priceNa, $priceAd, $priceMb){
		
		require_once('application/models/RegistrationModel.php');
		$registrationModel = new RegistrationModel();
		$id_registration = $registrationModel->registrationAdd($max_place, $registration_start, $registration_end, $pre_registration, $id_event);
		
		require_once('application/models/PaymentModel.php');
		$paymentModel = new PaymentModel();
		$id_p_Na = $paymentModel->paymentAdd($priceNa);
		$id_p_Ad = $paymentModel->paymentAdd($priceAd);
		$id_p_Mb = $paymentModel->paymentAdd($priceMb);
		
		require_once('application/models/CostModel.php');
		$costModel = new CostModel();
		$costModel->costAdd($id_registration, $id_p_Na, 3);
		$costModel->costAdd($id_registration, $id_p_Ad, 2);
		$costModel->costAdd($id_registration, $id_p_Mb, 1);
		
		header('location: index.php?action=calendar');
		
	}
}