<?php 

class PaymentModel {
	
	public function paymentAdd($price){
		require_once('application/models/DbConnection.php');
		$db = Db::getInstance();
	
		//test à faire sur le payment pour ne pas insérer si la valeur est déjà présente...
		
		$query=$db->prepare('INSERT INTO payment (price) VALUES (:price)');
		$query->execute(array('price'=>$price));
	
		$query = $db->query('SELECT id_payment FROM payment ORDER BY payment.id_payment DESC LIMIT 1');
		$payment = $query->fetch();
		$id_payment = $payment[0];
		
		return $id_payment;
	}
	
}


?>