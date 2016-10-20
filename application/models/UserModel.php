<?php
class UserModel {

    public function getAllUsersMin() {
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT user.id_user, user.email, user.password, user.id_role, user.firstname, user.lastname FROM user');
        $users = $query->fetchAll();
        return $users;
    }
    
    public function getAllUsersMore(){
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$query = $db->query('SELECT user.id_user, user.email, user.firstname, user.lastname, user.membership_number, role.role_name, grade.grade_name, grade.promotion FROM grade
    							RIGHT JOIN user ON grade.id_grade = user.id_grade
    							INNER JOIN role ON user.id_role = role.id_role
    							ORDER BY grade.grade_name, grade.promotion, user.lastname, user.firstname, role.role_name');
    	$users = $query->fetchAll();
    	return $users;
    }

    public function checkUser($email) {
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        
        $query = $db->query('SELECT id_user FROM user WHERE user.email LIKE \''.$email.'\'');
        $query = $query->fetch();
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function userAdd($firstname, $lastname, $email, $phone, $password, $id_grade, $id_role) {
    	
    	
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $req=$db->prepare('INSERT INTO user (firstname, lastname, email, phone, password) VALUES (:firstname, :lastname, :email, :phone, :password)');
        $req->execute(array('firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'phone'=> $phone, 'password'=>$password));
    
        $query = $db->query('SELECT id_user FROM user WHERE user.email LIKE \''.$email.'\'');
        $query = $query->fetch();
        $id_user = intval($query['id_user']);

        
        $req=$db->prepare('UPDATE user SET id_grade = :id_grade WHERE id_user = :id_user');
        $req->execute(array('id_grade'=>$id_grade,'id_user'=>$id_user));
       	$req=$db->prepare('UPDATE user SET id_role = :id_role WHERE id_user = :id_user');
        $req->execute(array('id_role'=>$id_role,'id_user'=>$id_user));
    }
    
    public function userAdmin($id_user) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('UPDATE user SET id_role = 1 WHERE user.id_user = :id_user');
    	$req->execute(array('id_user'=>$id_user));
    	 
    }
    
    public function userMember($id_user) {
    	
    	$membership_number = uniqid();
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('UPDATE user SET id_role = 2, membership_number = :membership_number WHERE user.id_user = :id_user');
    	$req->execute(array('membership_number'=>$membership_number, 'id_user'=>$id_user));
    }
    
    public function userDelete($id_user) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('DELETE FROM user_registration WHERE id_user = :id_user');
    	$req->execute(array('id_user'=>$id_user));
    	$req=$db->prepare('DELETE FROM user WHERE id_user = :id_user');
    	$req->execute(array('id_user'=>$id_user));
    }
    
    public function getUser($id_user){
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	
    	$query = $db->query('SELECT user.id_user, user.firstname, user.lastname, user.email, user.phone, grade.grade_name, grade.promotion FROM user 
    							LEFT JOIN grade ON user.id_grade = grade.id_grade WHERE user.id_user ='.$id_user.'');
    	$query = $query->fetch();
    	
    	return $query;
    }
    
    public function getUserEvent($id_event){
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	 
    	$query = $db->query('SELECT user.id_user, user.firstname, user.lastname, user.email, grade.grade_name, grade.promotion, event.event_name FROM event
    							INNER JOIN registration ON event.id_event = registration.id_event
    							INNER JOIN user_registration ON registration.id_registration = user_registration.id_registration
    							INNER JOIN user ON user_registration.id_user = user.id_user
    							INNER JOIN grade ON	user.id_grade = grade.id_grade						
    							WHERE registration.id_event ='.$id_event.'');
    								
    							
    	$query = $query->fetchAll();
    	return $query;
    	
    }
}