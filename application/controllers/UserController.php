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
			$userModel->userAdd($firstname, $lastname, $email, $phone, $password, $id_grade, 3);
			
			require_once('application/controllers/SessionController.php');
        	$sessionController = new SessionController();
        	$sessionController->connectionAsk($currentRole,'Votre profil est créé, vous pouvez vous connecter.');
		}
	}
	
	public function userUpdateAsk($currentRole, $currentDate){
		require_once('application/models/UserModel.php');
		$userModel = new UserModel();
		$users = $userModel->getAllUsersMore();
		
		require_once('application/views/site/UserUpdateForm.php');
	}
	
	public function userUpdate($id_user, $update, $currentRole, $currentDate){
		require_once('application/models/UserModel.php');
		$userModel = new UserModel();
		
		if ($update == "delete") {
			$userModel->userDelete($id_user);
		}
		if ($update == "member") {
			$userModel->userMember($id_user);
		}
		if ($update == "admin") {
			$userModel->userAdmin($id_user);
		}
		
		header('location: index.php?action=userUpdateAsk');
		
	}
	
	public function getUser($id_user){
		
		require_once('application/models/UserModel.php');
		$userModel = new UserModel();
		$userInfos = $userModel->getUser($id_user);

		return $userInfos;
	}
	
}