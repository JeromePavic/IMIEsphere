<?php
class TypeEventModel {


    public function getAllTypeEvents() {

        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM type_event ORDER BY type_event.type_event_name');
        $typeEvents = $query->fetchAll();
        return $typeEvents;

    }
    
}



?>