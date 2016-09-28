<?php


class SessionController{

	

	

    //this function checks if a session is set or not
    public function checkSession(){

        session_start ();

        if(isset($_SESSION['id_user']) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['id_role'])){
            $sessionOn = 1;
            $connectionString = 'déconnexion';
        }
        else{
            $sessionOn = 0;
            $connectionString = 'connexion';
        }

        return $sessionOn;

    }

    //this function sets the date at the right format
    public function setDate(){

        // Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
        date_default_timezone_set('Europe/Paris');
        // --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
        setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
        // strftime("jourEnLettres jour moisEnLettres annee") de la date courante 
        $date=strftime("%Y-%m-%d %H:%M:%S");
        return $date;

    }

    //this function gets the connection formular
    public function connectionAsk($currentRole, $message) {
    
        require_once('application/views/site/ConnectionForm.php');
    }


    public function connection($currentRole, $email, $password) {

        //first we get the table of all users
        require_once('application/models/UserModel.php');
        $userModel = new UserModel();
        $allUsers = $userModel->getAllUsersMin();

        //then if the table is not empty, we go through it to check the current user
        if (empty($allUsers)) {
            echo "problème de connexion à la base";
        } 
        else {
            
            $flag = 0;

            foreach ($allUsers as $user) {
                //if we find the user and the pw is correct we start his session
                if ($user['email'] == $email && $user['password'] == $password){
                    session_start ();
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['firstname'] = $user['firstname'];
                    $_SESSION['lastname'] = $user['lastname'];
                    $_SESSION['id_role'] = $user['id_role'];

                    header('location: index.php?action=calendar');
                    
                    $flag = 1;
                }     
            }
            if ($flag == 0) {
                $this->connectionAsk($currentRole, 'email ou mot de passe non valide');
            }
        }
    }


    public function connectionEnd($currentRole){

        // we unset the session var
        session_unset ();

        // we detroy the session
        session_destroy ();

        echo '<body onLoad="alert(\'vous êtes maintenant déconnecté.\')">';
        header('location: index.php?action=\'\'');
    }


    public function checkRole(){
        if (isset($_SESSION['id_role']) && $_SESSION['id_role']==1) {
            $id_role=1;
        }
        else if (isset($_SESSION['id_role']) && ($_SESSION['id_role']==2 || $_SESSION['id_role']==3)) {
            $id_role=2;
        }
        else {
            $id_role=3;
        }
        return $id_role;
    }

    

    
    public function authorization ($action, $role){
    	if ($action == 'eventAddAsk' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'eventAdd' && $role == 1){
    		return 1;
    	}if ($action == 'typeEventAddAsk' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'typeEventAdd' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'typeEventMod' && $role == 1){
    		return 1;
    	}
    	if ($action == 'gradeAddAsk' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'gradeAdd' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'gradeMod' && $role == 1){
    		return 1;
    	}
    	if ($action == 'cityAddAsk' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'cityAdd' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'cityMod' && $role == 1){
    		return 1;
    	}
    	if ($action == 'addressAddAsk' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'addressAdd' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'addressMod' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'userUpdateAsk' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'userUpdate' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'eventUser' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'eventAdmin' && $role == 1){
    		return 1;
    	}
    	else if ($action == 'eventShow' && $role <=3){
    		return 1;
    	}
    	else if ($action == 'eventRegistration' && $role <=3){
    		return 1;
    	}
    	else if ($action == 'calendar' && $role <=3){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }
    
    
    
}



?>