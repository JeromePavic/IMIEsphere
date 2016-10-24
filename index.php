<?php


//__a lot of cleaning to do here__



//on load of a new page we check if a session is on...

require_once('application/controllers/SessionController.php');
$sessionController = new SessionController();
$sessionOn = $sessionController->checkSession();
$currentDate = $sessionController->setDate();
$currentRole = $sessionController->checkRole();

if ($currentRole < 3) {
	require_once('application/controllers/UserController.php');
	$userController = new UserController();
	$_COOKIE['userInfos'] = $userController->getUser(intval(htmlspecialchars($_SESSION['id_user'])));
	
	require_once('application/controllers/UserRegistrationController.php');
	$userRegistrationController = new UserRegistrationController();
	$_COOKIE['userEvents'] = $userRegistrationController->getUserRegistration(intval(htmlspecialchars($_SESSION['id_user'])));
	

}



//------------------------------------------------------------------------
//then we check wich action is riquired...
//...and if the type of user (currentRole) is authorised to get the page
//------------------------------------------------------------------------

if (!empty($_GET['action']) && ($sessionController->authorization (htmlspecialchars($_GET['action']), $currentRole))){
	switch ($_GET['action']){
		case 'calendar' ://consulting the calendar.
			require_once('application/controllers/EventController.php');
			$eventController = new EventController();
			$eventController->eventConsult($currentRole, $currentDate);
			break;
		
		case 'connection' ://connecting.
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
			break;
			
		case 'userAddAsk' :
			require_once('application/controllers/UserController.php');
		    $userController = new UserController();
		    $userController->userAddAsk($currentRole, $currentDate, '');
    		break;
    		
		case 'userAdd' ://adding a new user
			//if required fiels are ok, we add the new user
			if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
				require_once('application/controllers/UserController.php');
				$userController = new UserController();
				$userController->userAdd(htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['lastname']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['phone']), htmlspecialchars($_POST['password']), intval(htmlspecialchars($_POST['id_grade'])), $currentRole, $currentDate);
			
			}
			//else we redirect the new user to the registration page with a message
			else{
				require_once('application/controllers/UserController.php');
				$userController = new UserController();
				$userController->userAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'userUpdateAsk' ://asking for updating a user
			require_once('application/controllers/UserController.php');
			$userController = new UserController();
			$userController->userUpdateAsk($currentRole, $currentDate);
			break;
			
		case 'userUpdate' :// updating a user
			require_once('application/controllers/UserController.php');
			$userController = new UserController();
			$userController->userUpdate(intval(htmlspecialchars($_POST['id'])), htmlspecialchars($_POST['update']), $currentRole, $currentDate);
			break;
		
		case 'eventAddAsk' ://asking for adding a new event
			require_once('application/controllers/EventController.php');
			$eventController = new EventController();
			$eventController->eventAddAsk ($currentRole, $currentDate, '');
			break;
			
		case 'eventAdd' ://adding a new event
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
						$registration_end = $event_start;
						$pre_registration = $dateController->dateConvert($_POST['pReg_date_start'], $_POST['pReg_time_start']);
					}
					 
					require_once('application/controllers/RegistrationController.php');
					$registrationController = new RegistrationController();
					$registrationController->registrationAdd((htmlspecialchars($_POST['max_place'])), $registration_start, $registration_end, $pre_registration, $id_event, htmlspecialchars($_POST['priceNa']), htmlspecialchars($_POST['priceAd']), htmlspecialchars($_POST['priceMb']));
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
			break;
		
		case 'eventShow' ://consulting an event
			//if required fiels are ok, ...
			if (!empty($_GET['id_event'])) {
			
				require_once('application/controllers/EventController.php');
				$eventController = new EventController();
				$id_event = $eventController->eventShow(intval(htmlspecialchars($_GET['id_event'])), $currentRole, $currentDate);
			}
			break;
			
		case 'userRegistration' ://registering to an event
			//if required fiels are ok, ...
			if (!empty($_POST['id_registration'])) {
					
				require_once('application/controllers/UserRegistrationController.php');
				$userRegistrationController = new UserRegistrationController();
				$userRegistrationController->register(intval(htmlspecialchars($_POST['id_registration'])), intval(htmlspecialchars($_SESSION['id_user'])), $currentRole, $currentDate);
			}
			break;
			
		case 'eventAdmin' ://asking for admin part of events
			require_once('application/controllers/EventController.php');
			$eventController = new EventController();
			$eventController->eventAdmin($currentRole, $currentDate);
			break;
			
		case 'eventUser' :// asking for the list of registered users for an event
			require_once('application/controllers/EventController.php');
			$eventController = new EventController();
			$eventController->eventUser(intval(htmlspecialchars($_POST['id'])), $currentRole, $currentDate);
			break;
			
		case 'typeEventAddAsk' ://asking for adding a new type of event
			if (!empty($_POST['id_type_event'])){
				$id_type_event = intval($_POST['id_type_event']);
			}
			else{
				$id_type_event = 0;
			}
			
			require_once('application/controllers/TypeEventController.php');
			$typeEventController = new TypeEventController();
			$typeEventController->typeEventAddAsk($currentRole, $currentDate, $id_type_event, '');
			break;
			
		case 'typeEventAdd' ://adding a new type of event
			//if required fiels are ok, ...
			if (!empty($_POST['type_event_name'])) {
				require_once('application/controllers/TypeEventController.php');
				$typeEventController = new TypeEventController();
				$typeEventController->typeEventAdd(htmlspecialchars($_POST['type_event_name']), htmlspecialchars($_POST['type_event_description']), $currentRole, $currentDate);
			}
			//else we redirect the user
			else{
				require_once('application/controllers/TypeEventController.php');
				$typeEventController = new TypeEventController();
				$typeEventController->typeEventAddAsk($currentRole, $currentDate, $id_type_event, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'typeEventMod' ://modifying a type of event
			//if required fiels are ok, ...
			if (!empty($_POST['type_event_name']) && ($_POST['id_type_event'])) {
				require_once('application/controllers/TypeEventController.php');
				$typeEventController = new TypeEventController();
				$typeEventController->typeEventMod(intval(htmlspecialchars($_POST['id_type_event'])), htmlspecialchars($_POST['type_event_name']), htmlspecialchars($_POST['type_event_description']), $currentRole, $currentDate);
			}
			//else we redirect the user
			else{
				require_once('application/controllers/TypeEventController.php');
				$typeEventController = new TypeEventController();
				$typeEventController->typeEventAddAsk($currentRole, $currentDate, 0, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
		
		case 'gradeAddAsk' ://asking for adding a new grade
			if (!empty($_POST['id_grade'])){
				$id_grade = intval($_POST['id_grade']);
			}
			else{
				$id_grade = 0;
			}
			
			require_once('application/controllers/GradeController.php');
			$gradeController = new GradeController();
			$gradeController->gradeAddAsk($currentRole, $currentDate, $id_grade, '');
			break;
			
		case 'gradeAdd' ://adding a new grade
			//if required fiels are ok, ...
			if (!empty($_POST['grade_name']) && !empty($_POST['promotion'])) {
				require_once('application/controllers/GradeController.php');
				$gradeController = new GradeController();
				$gradeController->gradeAdd(htmlspecialchars($_POST['grade_name']), htmlspecialchars($_POST['promotion']), $currentRole, $currentDate);
			}
			//else we redirect the user
			else{
				require_once('application/controllers/GradeController.php');
				$gradeController = new GradeController();
				$gradeController->gradeAddAsk($currentRole, $currentDate, $id_grade, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'gradeMod' ://modifying a grade
			//if required fiels are ok, ...
			if (!empty($_POST['grade_name']) && !empty($_POST['promotion']) && ($_POST['id_grade'])) {
				require_once('application/controllers/GradeController.php');
				$gradeController = new GradeController();
				$gradeController->gradeMod(intval(htmlspecialchars($_POST['id_grade'])), htmlspecialchars($_POST['grade_name']), htmlspecialchars($_POST['promotion']), $currentRole, $currentDate);
			}
			//else we redirect the user to the grade page with a message
			else{
				require_once('application/controllers/GradeController.php');
				$gradeController = new GradeController();
				$gradeController->gradeAddAsk($currentRole, $currentDate, 0, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'cityAddAsk' ://asking for adding a new city
			if (!empty($_POST['id_city'])){
				$id_city = intval($_POST['id_city']);
			}
			else{
				$id_city = 0;
			}
			require_once('application/controllers/CityController.php');
			$cityController = new CityController();
			$cityController->cityAddAsk($currentRole, $currentDate, $id_city, '');
			break;
			
		case 'cityAdd' ://adding a new city
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
				$cityController->cityAddAsk($currentRole, $currentDate, $id_city, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'cityMod' : //modifying a city
			//if required fiels are ok, we add the new city
			if (!empty($_POST['city_name']) && !empty($_POST['postal_code']) && ($_POST['id_city'])) {
				require_once('application/controllers/CityController.php');
				$cityController = new CityController();
				$cityController->cityMod(intval(htmlspecialchars($_POST['id_city'])), htmlspecialchars($_POST['city_name']), htmlspecialchars($_POST['postal_code']), $currentRole, $currentDate);
			}
			//else we redirect the user to the city page with a message
			else{
				require_once('application/controllers/CityController.php');
				$cityController = new CityController();
				$cityController->cityAddAsk($currentRole, $currentDate, 0, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'addressAddAsk' ://asking for adding a new address
			if (!empty($_POST['id_address'])){
				$id_address = intval($_POST['id_address']);
			}
			else{
				$id_address = 0;
			}
			require_once('application/controllers/AddressController.php');
			$addressController = new AddressController();
			$addressController->addressAddAsk($currentRole, $currentDate, $id_address, '');
			break;
		
		case 'addressAdd' ://adding a new address
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
				$addressController->addressAddAsk($currentRole, $currentDate, $id_address, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case 'addressMod' ://modifying an address
			//if required fiels are ok, we add the new address
			if (!empty($_POST['address_name']) && ($_POST['id_address'])) {
				require_once('application/controllers/AddressController.php');
				$addressController = new AddressController();
				$addressController->addressMod(intval(htmlspecialchars($_POST['id_address'])), htmlspecialchars($_POST['address_name']), htmlspecialchars($_POST['street']), htmlspecialchars($_POST['street_number']), htmlspecialchars($_POST['building']), htmlspecialchars($_POST['id_city']), $currentRole, $currentDate);
			}
			//else we redirect the new user to the address page with a message
			else{
				require_once('application/controllers/AddressController.php');
				$addressController = new AddressController();
				$addressController->addressAddAsk($currentRole, $currentDate, 0, 'Vous n\'avez pas rempli correctement le formulaire');
			}
			break;
			
		case ''://no paramater given so we give the default page.
			require_once('application/controllers/SiteController.php');
			$siteController = new SiteController();
			$siteController->welcome($currentRole);
	}
	
	
}
else {
	require_once('application/controllers/SiteController.php');
	$siteController = new SiteController();
	$siteController->welcome($currentRole);
}


?>