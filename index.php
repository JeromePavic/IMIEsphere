<?php


//on load of a new page we check if a session is on...

require_once('application/controllers/SessionController.php');
$sessionController = new SessionController();
$sessionOn = $sessionController->checkSession();
$currentDate = $sessionController->setDate();
$currentRole = $sessionController->checkRole();

//then we check wich action is riquired...
//...and if the type of user (currentRole) is authorised to get the







//consulting the calendar.
if (!empty($_GET['action']) && $_GET['action'] == 'calendar') {
	// ICI, je veux lire un article
	require_once('application/controllers/SiteController.php');
	$siteController = new SiteController();
	$siteController->consult($currentRole, $currentDate);
} 
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
//asking for registration (adding a user)
else if (!empty($_GET['action']) && $_GET['action']=='userAddAsk') {
    require_once('application/controllers/SiteController.php');
        $siteController = new SiteController();
        $siteController->userAddAsk($currentRole, $currentDate, '');
}
//adding a new user
else if (!empty($_GET['action']) && $_GET['action']=='userAdd') {
    //if required fiels are ok, we add the new user
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        require_once('application/controllers/SiteController.php');
        $siteController = new SiteController();
        $siteController->userAdd(htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['lastname']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['phone']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['id_grade']), $currentRole, $currentDate);  
    }
    //else we redirect the new user to the registration page with a message
    else{
        require_once('application/controllers/SiteController.php');
        $siteController = new SiteController();
        $siteController->userAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
    }
}
//adding a new event
else if (!empty($_GET['action']) && $_GET['action']=='eventAddAsk') {
    require_once('application/controllers/SiteController.php');
    $siteController = new SiteController();
    $siteController->eventAddAsk($currentRole, $currentDate, '');
}

else if (!empty($_GET['action']) && $_GET['action']=='eventAdd') {
    //if required fiels are ok, we add the new event
    if (!empty($_POST['event_name']) && !empty($_POST['date_start']) && !empty($_POST['time_start']) && !empty($_POST['id_address'])) {
        require_once('application/controllers/SiteController.php');
        $siteController = new SiteController();

        if($siteController->rightDate(htmlspecialchars($_POST['date_start']), htmlspecialchars($_POST['date_end']), htmlspecialchars($_POST['time_start']), htmlspecialchars($_POST['time_end']))){

            $siteController->eventAdd(htmlspecialchars($_POST['event_name']), htmlspecialchars($_POST['event_description']), htmlspecialchars($_POST['date_start']), htmlspecialchars($_POST['date_end']), htmlspecialchars($_POST['time_start']), htmlspecialchars($_POST['time_end']), htmlspecialchars($_POST['id_address']), htmlspecialchars($_POST['id_type_event']), $currentRole, $currentDate); 
        }
        else{
            require_once('application/controllers/SiteController.php');
            $siteController = new SiteController();
            $siteController->eventAddAsk($currentRole, $currentDate, 'La date de début doit être antérieure à la date de fin');
        }
    }
    //else we redirect the new user to the registration page with a message
    else{
        require_once('application/controllers/SiteController.php');
        $siteController = new SiteController();
        $siteController->eventAddAsk($currentRole, $currentDate, 'Vous n\'avez pas rempli correctement le formulaire');
    }
}
//no paramater given so we give the default page.
else {
	require_once('application/controllers/SiteController.php');
    $siteController = new SiteController();
    $siteController->welcome($currentRole);
}

?>