<?php
class AddressModel {


    public function getAllAddress() {

        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM address 
                                INNER JOIN city ON address.id_city = city.id_city
                                ORDER BY postal_code, address_name');
        $allAddress = $query->fetchAll();
        return $allAddress;

    }
    
    public function checkAddress($street, $street_number, $building, $id_city) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$query = $db->query('SELECT id_address FROM address WHERE address.street LIKE \''.$street.'\' AND address.street_number LIKE \''.$street_number.'\'AND address.building LIKE \''.$building.'\'AND address.id_city = '.$id_city.'');
    	$query = $query->fetch();
    	if($query){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }
    
    public function getAddress($id_address) {
    
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    
    	$query = $db->query('SELECT * FROM address INNER JOIN city ON address.id_city = city.id_city 
    							WHERE address.id_address = '.$id_address.'');
    	$query = $query->fetch();
    	 
    	return $query;
    }
    
    public function addressAdd($address_name, $street, $street_number, $building, $id_city) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('INSERT INTO address (address_name, street, street_number, building, id_city) VALUES (:address_name, :street, :street_number, :building, :id_city)');
    	$req->execute(array('address_name'=>$address_name, 'street'=>$street, 'street_number'=>$street_number, 'building'=>$building, 'id_city'=>$id_city));
    }
    
	public function addressMod($id_address, $address_name, $street, $street_number, $building, $id_city) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('UPDATE address SET address_name = :address_name, street = :street, street_number = :street_number, building = :building, id_city = :id_city 
    						WHERE address.id_address = :id_address');
    	$req->execute(array('id_address'=>$id_address, 'address_name'=>$address_name, 'street'=>$street, 'street_number'=>$street_number, 'building'=>$building, 'id_city'=>$id_city));
    }
    
}



?>