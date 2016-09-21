<?php

class SiteController {


	public function welcome($currentRole) {
		require_once('application/views/site/Welcome.php');
	}


	public function consult($currentRole, $currentDate) {
		
		require_once('application/models/EventModel.php');
		$eventModel = new EventModel();
		$allEvents = $eventModel->getAllEvents($currentDate);
		//$dateFrancaise = date('d/m/Y', strtotime($article['date_publication']));
		if (empty($allEvents)) {
			echo "problème de connexion à la base";
		} else {
			require_once('application/views/site/Calendarconsult.php');
		}
	}

	//this function gets the connection formular
    public function userAddAsk($currentRole, $currentDate, $message) {

    	$year = $this->getYear($currentDate);

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

    //this function gets the 'new event' formular
    public function eventAddAsk($currentRole, $currentDate, $message) {

        require_once('application/models/TypeEventModel.php');
        $typeEventModel = new TypeEventModel();
        $allTypeEvent = $typeEventModel->getAllTypeEvents();

        require_once('application/models/AddressModel.php');
        $addressModel = new AddressModel();
        $allAddress = $addressModel->getAllAddress();

        require_once('application/views/site/EventAddForm.php');
    }

    public function eventAdd($event_name, $event_description, $date_start, $date_end, $time_start, $time_end, $id_address, $id_type_event, $currentRole, $currentDate){
        $event_start = $this->dateConvert($date_start, $time_start);
        $event_end = $this->dateConvert($date_end, $time_end);

        require_once('application/models/EventModel.php');
        $eventModel = new EventModel();
        $eventModel->eventAdd($event_name, $event_description, $event_start, $event_end, $id_address, $id_type_event);
    }



	public function getYear($currentDate){
		$yearStr = strftime("%Y", strtotime($currentDate));
		$year = intval($yearStr);
        return $year;
	}

    public function rightDate($date1, $date2, $time1, $time2) {

        $timestamp1 = strtotime($date1);

        $tabTime=explode(':', $time1);
        $sectime1 = (intval($tabTime[0])*3600) + (intval($tabTime[1])*60);

        $timestamp1 += $sectime1;

        $timestamp2 = strtotime($date2);

        $tabTime=explode(':', $time2);
        $sectime2 = (intval($tabTime[0])*3600) + (intval($tabTime[1])*60);

        $timestamp2 += $sectime2;

        if ($timestamp1<=$timestamp2) {
            return 1;
        }
        else{
            return 0;
        }

    }

    public function dateConvert($date, $time){

        $timestamp = strtotime($date);
        $tabTime=explode(':', $time);
        $sectime = (intval($tabTime[0])*3600) + (intval($tabTime[1])*60);
        $timestamp += $sectime;

        $datetime = strftime("%Y-%m-%d %H:%M:%S", $timestamp);
        return $datetime;
    }
}
?>