<?php
class UserModel {

    public function getAllUsersMin() {
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT user.id_user, user.email, user.password, user.id_role, user.firstname, user.lastname FROM user');
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

    public function userAdd($firstname, $lastname, $email, $phone, $password, $id_grade) {
        require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $req=$db->prepare('INSERT INTO user (firstname, lastname, email, phone, password, id_grade) VALUES (:firstname, :lastname, :email, :phone, :password, :id_grade )');
        $req->execute(array('firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'phone'=> $phone, 'password'=>$password, 'id_grade'=>$id_grade));
    }
}