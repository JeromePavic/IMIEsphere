<?php 

class CostModel {
	
	public function costAdd($id_registration, $id_payment, $id_role) {
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
		$req=$db->prepare('INSERT INTO cost (id_registration, id_payment, id_role) VALUES (:id_registration, :id_payment, :id_role)');
		$req->execute(array('id_registration'=>$id_registration, 'id_payment'=>$id_payment, 'id_role'=>$id_role));
	}
	
	
}



?>