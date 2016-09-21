<?php
class AddressModel {


    public function getAllAddress() {

        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM address 
                                INNER JOIN city ON address.id_city = city.id_city
                                ORDER BY city.city_name, address_name');
        $allAddress = $query->fetchAll();
        return $allAddress;

    }
    
}



?>