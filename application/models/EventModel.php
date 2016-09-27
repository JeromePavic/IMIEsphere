<?php
class EventModel {


    public function getAllEvents($date) {
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT event.id_event, event.event_name, event.event_description, event.event_start, address.street_number, address.street, address.address_name, city.city_name FROM event
                                INNER JOIN address ON event.id_address = address.id_address
                                INNER JOIN city ON address.id_city = city.id_city
                                WHERE DATE(event.event_start) > \''.$date.'\'
                                ORDER BY event.event_start');
        $events = $query->fetchAll();
        return $events;
    }
    
    public function getEvent($id_event) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$query = $db->query('SELECT event.id_event, event.event_name, event.event_description, event.event_start, event.event_end, address.street_number, address.street, address.building, address.address_name, city.city_name FROM event
                                INNER JOIN address ON event.id_address = address.id_address
                                INNER JOIN city ON address.id_city = city.id_city
                                WHERE event.id_event = '.$id_event.'');
    	$event = $query->fetch();
    	return $event;
    }


    public function eventAdd($event_name, $event_description, $event_start, $event_end, $id_address, $id_type_event){
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();

        $query=$db->prepare('INSERT INTO event (event_name, event_description, event_start, event_end, id_address) VALUES (:event_name, :event_description, :event_start, :event_end, :id_address)');
        $query->execute(array('event_name'=>$event_name, 'event_description'=>$event_description, 'event_start'=>$event_start, 'event_end'=> $event_end, 'id_address'=>$id_address));

        $query = $db->query('SELECT id_event FROM event ORDER BY event.id_event DESC LIMIT 1');
        $event = $query->fetch();
        $id_event = intval($event[0]);
		
        var_dump($id_event);
        
        $query=$db->prepare('INSERT INTO event_type_event (id_event, id_type_event) VALUES (:id_event, :id_type_event)');
        $query->execute(array('id_event'=>$id_event, 'id_type_event'=>$id_type_event));

        return $id_event;
    }
}



?>