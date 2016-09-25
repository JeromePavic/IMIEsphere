<?php

class CityModel {


    public function getAllCities() {

        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM city 
                                ORDER BY postal_code');
        $allCities = $query->fetchAll();
        return $allCities;

    }
     
    public function checkCity($city_name, $postal_code) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$query = $db->query('SELECT id_city FROM city WHERE city.city_name LIKE \''.$city_name.'\' AND city.postal_code LIKE \''.$postal_code.'\'');
    	$query = $query->fetch();
    	if($query){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }
    
    public function getCity($id_city) {
    
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    
    	$query = $db->query('SELECT * FROM city WHERE city.id_city = '.$id_city.'');
    	$query = $query->fetch();
    
    	return $query;
    }
    
    public function cityAdd($city_name, $postal_code) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('INSERT INTO city (city_name, postal_code) VALUES (:city_name, :postal_code)');
    	$req->execute(array('city_name'=>$city_name, 'postal_code'=>$postal_code));
    }
    
    public function cityMod($id_city, $city_name, $postal_code) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('UPDATE city SET city_name = :city_name, postal_code  = :postal_codeVALUES 
    						WHERE city.id_city = :id_city');
    	$req->execute(array('id_city'=>$id_city, 'city_name'=>$city_name, 'postal_code'=>$postal_code));
    }
}



?>