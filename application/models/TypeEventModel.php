<?php
class TypeEventModel {


    public function getAllTypeEvents() {

        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM type_event ORDER BY type_event.type_event_name');
        $typeEvents = $query->fetchAll();
        return $typeEvents;

    }
    
    public function checkTypeEvent($type_event_name) {

    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	
    	$query = $db->query('SELECT id_type_event FROM type_event WHERE type_event.type_event_name LIKE \''.$type_event_name.'\'');
    	$query = $query->fetch();
    	if($query){
       		return 1;
    	}
    	else{
    		return 0;
    	}
    }
    
    public function typeEventAdd($type_event_name, $type_event_description) {

    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('INSERT INTO type_event (type_event_name, type_event_description) VALUES (:type_event_name, :type_event_description)');
    	$req->execute(array('type_event_name'=>$type_event_name, 'type_event_description'=>$type_event_description));
    }
    
}



?>