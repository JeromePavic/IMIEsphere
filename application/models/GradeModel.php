<?php

class GradeModel{


    public function getAllCurrentGrades($year){

         require_once('application/models/DbConnection.php');
        $db = Db::getInstance();
        $query = $db->query('SELECT * FROM grade
                                WHERE grade.promotion LIKE \'%'.$year.'%\'');

        $grades = $query->fetchAll();
        return $grades;
    }
    
    public function checkGrade($grade_name, $promotion) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$query = $db->query('SELECT id_grade FROM grade WHERE grade.grade_name LIKE \''.$grade_name.'\' AND grade.promotion LIKE \''.$promotion.'\'');
    	$query = $query->fetch();
    	if($query){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }
    
    public function gradeAdd($grade_name, $promotion) {
    	require_once('application/models/DbConnection.php');
    	$db = Db::getInstance();
    	$req=$db->prepare('INSERT INTO grade (grade_name, promotion) VALUES (:grade_name, :promotion)');
    	$req->execute(array('grade_name'=>$grade_name, 'promotion'=>$promotion));
    }


}





?>