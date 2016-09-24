<?php


//on load of a new page we check if a session is on...

require_once('application/controllers/SessionController.php');
$sessionController = new SessionController();
$sessionOn = $sessionController->checkSession();
$currentDate = $sessionController->setDate();
$currentRole = $sessionController->checkRole();



//------------------------------------------------------------------------
//then we check wich action is riquired...
//...and if the type of user (currentRole) is authorised to get the page
//------------------------------------------------------------------------





//consulting the calendar.
if (!empty($_GET['action']) && $_GET['action'] == 'calendar') {
	if ($sessionController->authorization ('calendar', $currentRole)){
	
		require_once('application/controllers/EventController.php');
		$eventController = new EventController();
		$eventController->eventConsult($currentRole, $currentDate);
	}

} 


//------------------------------------------------------------------------


//connecting.
else if (!empty($_GET['action']) && $_GET['action'] == 'connection'){
    //if a session is on we call the disconnection function
    if($sessionOn==1){
        require_once('application/controllers/SessionController.php');
        $sessionController = new SessionController();
        $sessionController->connectionEnd($currentRole);
    }
    //else we call the connection function
    else{
        //if email and password are given it's a call FROM the connection form
        if (!empty($_POST['email']) || !empty($_POST['password'])){
            require_once('application/controllers/SessionController.php');
            $sessionController = new SessionController();
            $sessionController->connection($currentRole, htmlspecialchars($_POST['email']),htmlspecialchars($_POST['password']));
        }
        //if nothing is given it's a call TO the connection form
        else{
            require_once('application/controllers/SessionController.php');
            $sessionController = new SessionController();
            $sessionController->connectionAsk($currentRole,'');
        }
    }
}


//------------------------------------------------------------------------



//asking for registration (adding a user)
else if (!empty($_GET['action']) && $_GET['action']=='userAddAsk') {
    require_once('application/controllers/UserController.php');
        $userController = new UserController();
        $userController->userAddAsk($currentRole, $currentDate, '');
}

//adding a new user
else if (!empty($_GET['action']) && $_GET['action']=='userAdd') {
    //if required fiels are ok, we add the new user
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        require_once('application/controllers/UserController.php');
        $userController = new UserController();
        $userController->userAdd(htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['lastname']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['phone']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['id_grade']), $currentRole, $currentDate);  
    }
    //else we redirect the new user to the registration page with a message
    else{
        require_once('application/controllers/UserController.php');
        $userController = new UserController();
        $userController->userAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
    }
}


//------------------------------------------------------------------------


//asking for adding a new event
else if (!empty($_GET['action']) && $_GET['action']=='eventAddAsk') {
	
	if ($sessionController->authorization ('eventAddAsk', $currentRole)){
	    require_once('application/controllers/EventController.php');
	    $eventController = new EventController();
	    $eventController->eventAddAsk ($currentRole, $currentDate, '');
	}
}

//adding a new event
else if (!empty($_GET['action']) && $_GET['action']=='eventAdd') {
	
	if ($sessionController->authorization ('eventAdd', $currentRole)){
	    //if required fiels are ok, we add the new event
	    if (!empty($_POST['event_name']) && !empty($_POST['date_start']) && !empty($_POST['time_start']) && !empty($_POST['reg_date_start'])&& !empty($_POST['id_address'])) {
	        require_once('application/controllers/EventController.php');
	        $eventController = new EventController();
	        
	        //here we control if start datetime is before end datetime
	        require_once('application/controllers/DateController.php');
	        $dateController = new DateController();
	
	        if($dateController->rightDate(htmlspecialchars($_POST['date_start']), htmlspecialchars($_POST['date_end']), htmlspecialchars($_POST['time_start']), htmlspecialchars($_POST['time_end']))) {
				//then we convert dates to right format
	        	$event_start = $dateController->dateConvert($_POST['date_start'], $_POST['time_start']);
	        	$event_end = $dateController->dateConvert($_POST['date_end'], $_POST['time_end']);
	        	
	            $id_event = $eventController->eventAdd(htmlspecialchars($_POST['event_name']), htmlspecialchars($_POST['event_description']), $event_start, $event_end, htmlspecialchars($_POST['id_address']), htmlspecialchars($_POST['id_type_event']), $currentRole, $currentDate); 
	        
	            //then we add the registration
	            
	            //here we control if start datetime is before end datetime
	            if($dateController->rightDate(htmlspecialchars($_POST['reg_date_start']), htmlspecialchars($_POST['reg_date_end']), htmlspecialchars($_POST['reg_time_start']), htmlspecialchars($_POST['reg_time_end']))) {
	            	//then we convert dates to right format
	            	$registration_start = $dateController->dateConvert($_POST['reg_date_start'], $_POST['reg_time_start']);
	            	$registration_end = $dateController->dateConvert($_POST['reg_date_end'], $_POST['reg_time_end']);
	            	$pre_registration = $dateController->dateConvert($_POST['pReg_date_start'], $_POST['pReg_time_start']);
	            }
	            else {
	            	// if dates are wrong we just set the end date to the event start date and we convert dates to right format
	            	$registration_start = $dateController->dateConvert($_POST['reg_date_start'], $_POST['reg_time_start']);
	            	$registration_end = event_start;
	            	$pre_registration = $dateController->dateConvert($_POST['pReg_date_start'], $_POST['pReg_time_start']);
	            }
	        
	            require_once('application/controllers/RegistrationController.php');
	            $registrationController = new RegistrationController();
	            $registrationController->registrationAdd(htmlspecialchars(htmlspecialchars($_POST['max_place'])), $registration_start, $registration_end, $pre_registration, $id_event, htmlspecialchars($_POST['priceNa']), htmlspecialchars($_POST['priceAd']), htmlspecialchars($_POST['priceMb']));
	        }
	        else{
	            $eventController->eventAddAsk($currentRole, $currentDate, 'La date de début doit être antérieure à la date de fin');
	        }
	    }
	    //else we redirect the new user to the event add page page with a message
	    else{
	        require_once('application/controllers/EventController.php');
	        $eventController = new EventController();
	    	$eventController->eventAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
	    }
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}


//------------------------------------------------------------------------


//asking for adding a new type of event
else if (!empty($_GET['action']) && $_GET['action']=='typeEventAddAsk') {
	
	if ($sessionController->authorization ('typeEventAddAsk', $currentRole)){
		require_once('application/controllers/TypeEventController.php');
		$typeEventController = new TypeEventController();
		$typeEventController->typeEventAddAsk($currentRole, $currentDate, '');
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
	
}

//adding a new type of event
else if (!empty($_GET['action']) && $_GET['action']=='typeEventAdd') {
	
	if ($sessionController->authorization ('typeEventAdd', $currentRole)){
		//if required fiels are ok, we add the new user
		if (!empty($_POST['type_event_name'])) {
			require_once('application/controllers/TypeEventController.php');
			$typeEventController = new TypeEventController();
			$typeEventController->typeEventAdd(htmlspecialchars($_POST['type_event_name']), htmlspecialchars($_POST['type_event_description']), $currentRole, $currentDate);
		}
		//else we redirect the new user to the registration page with a message
		else{
			require_once('application/controllers/TypeEventController.php');
			$typeEventController = new TypeEventController();
			$typeEventController->typeEventAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
		}
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}




//------------------------------------------------------------------------


//asking for adding a new grade
else if (!empty($_GET['action']) && $_GET['action']=='gradeAddAsk') {

	if ($sessionController->authorization ('gradeAddAsk', $currentRole)){
		require_once('application/controllers/GradeController.php');
		$gradeController = new GradeController();
		$gradeController->gradeAddAsk($currentRole, $currentDate, '');
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}

//adding a new grade
else if (!empty($_GET['action']) && $_GET['action']=='gradeAdd') {

	if ($sessionController->authorization ('gradeAdd', $currentRole)){
		//if required fiels are ok, we add the new user
		if (!empty($_POST['grade_name']) && !empty($_POST['promotion'])) {
			require_once('application/controllers/GradeController.php');
			$gradeController = new GradeController();
			$gradeController->gradeAdd(htmlspecialchars($_POST['grade_name']), htmlspecialchars($_POST['promotion']), $currentRole, $currentDate);
		}
		//else we redirect the new user to the grade page with a message
		else{
			require_once('application/controllers/GradeController.php');
			$gradeController = new GradeController();
			$gradeController->gradeAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
		}
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}




//------------------------------------------------------------------------




//asking for adding a new city
else if (!empty($_GET['action']) && $_GET['action']=='cityAddAsk') {

	if ($sessionController->authorization ('cityAddAsk', $currentRole)){
		require_once('application/controllers/CityController.php');
		$cityController = new CityController();
		$cityController->cityAddAsk($currentRole, $currentDate, '');
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}

//adding a new city
else if (!empty($_GET['action']) && $_GET['action']=='cityAdd') {

	if ($sessionController->authorization ('cityAdd', $currentRole)){
		//if required fiels are ok, we add the new city
		if (!empty($_POST['city_name']) && !empty($_POST['postal_code'])) {
			require_once('application/controllers/CityController.php');
			$cityController = new CityController();
			$cityController->cityAdd(htmlspecialchars($_POST['city_name']), htmlspecialchars($_POST['postal_code']), $currentRole, $currentDate);
		}
		//else we redirect the new user to the city page with a message
		else{
			require_once('application/controllers/CityController.php');
			$cityController = new CityController();
			$cityController->cityAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
		}
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}





//------------------------------------------------------------------------




//asking for adding a new address
else if (!empty($_GET['action']) && $_GET['action']=='addressAddAsk') {

	if ($sessionController->authorization ('addressAddAsk', $currentRole)){
		require_once('application/controllers/AddressController.php');
		$addressController = new AddressController();
		$addressController->addressAddAsk($currentRole, $currentDate, '');
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}

//adding a new address
else if (!empty($_GET['action']) && $_GET['action']=='addressAdd') {

	if ($sessionController->authorization ('addressAdd', $currentRole)){
		//if required fiels are ok, we add the new address
		if (!empty($_POST['address_name'])) {
			require_once('application/controllers/AddressController.php');
			$addressController = new AddressController();
			$addressController->addressAdd(htmlspecialchars($_POST['address_name']), htmlspecialchars($_POST['street']), htmlspecialchars($_POST['street_number']), htmlspecialchars($_POST['building']), htmlspecialchars($_POST['id_city']), $currentRole, $currentDate);
		}
		//else we redirect the new user to the address page with a message
		else{
			require_once('application/controllers/AddressController.php');
			$addressController = new AddressController();
			$addressController->addressAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
		}
	}
	else{
		echo 'Vous vous êtes perdu?';
	}
}






//no paramater given so we give the default page.
else {
	require_once('application/controllers/SiteController.php');
    $siteController = new SiteController();
    $siteController->welcome($currentRole);
}

?>