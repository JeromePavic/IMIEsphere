<?php



class GradeController{


	//this function gets the 'new grade' formular
	public function gradeAddAsk($currentRole, $currentDate, $id_grade, $message) {
		
		require_once('application/models/GradeModel.php');
		$gradeModel = new GradeModel();
		$allGrades = $gradeModel->getAllGrades();

		$currentGrade = $gradeModel->getGrade($id_grade);

		require_once('application/views/site/GradeAddForm.php');
	}

	public function gradeAdd($grade_name, $promotion, $currentRole, $currentDate){

		require_once('application/models/GradeModel.php');
		$gradeModel = new GradeModel();
		if ($gradeModel->checkGrade($grade_name, $promotion)) {
			$this->gradeAddAsk($currentRole, $currentDate, 'Une promotion identique existe déjà...');
		}
		else{
			$gradeModel->gradeAdd($grade_name, $promotion);
			
			header('location: index.php?action=calendar');
		}

	}

	public function gradeMod($id_grade, $grade_name, $promotion, $currentRole, $currentDate){
	
		require_once('application/models/GradeModel.php');
		$gradeModel = new GradeModel();
		$gradeModel->gradeMod($id_grade, $grade_name, $promotion);
			
		header('location: index.php?action=calendar');
	
	}


}



?>