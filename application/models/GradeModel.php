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


}





?>