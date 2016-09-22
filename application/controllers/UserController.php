<?php

class UserController {
	
	//this function gets the connection formular
	public function userAddAsk($currentRole, $currentDate, $message) {
	
		require_once('application/controllers/DateController.php');
		$dateController = new DateController();
		$year = $dateController->getYear($currentDate);
	
		require_once('application/models/GradeModel.php');
		$gradeModel = new GradeModel();
		$allCurrentGrades = $gradeModel->getAllCurrentGrades($year);
	
		require_once('application/views/site/UserAddForm.php');
	}
	
	
	public function userAdd($firstname, $lastname, $email, $phone, $password, $id_grade, $currentRole, $currentDate){
		require_once('application/models/UserModel.php');
		$userModel = new UserModel();
		if ($userModel->checkUser($email)) {
			$this->userAddAsk($currentRole, $currentDate, 'Un utilisateur est déjà enregistré avec cet email');
			//header('application/index.php?action=userAddAsk');
		}
		else{
			$userModel->userAdd($firstname, $lastname, $email, $phone, $password, $id_grade);
		}
	}
	
}