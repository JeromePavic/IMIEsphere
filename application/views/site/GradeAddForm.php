<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Promotions IMIE</h1>
                    <p><?php echo $message; ?></p>
                  
                  	<h2>Ajouter une nouvelle promotion d'étudiants</h2>	

                    <form id="gradeFormA" action="index.php?action=gradeAdd" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom de la nouvelle promotion :</label>
                            <input type="text" name="grade_name">
                        </div>
                         <div class="form-group">
                            <label for="article">Année scolaire :</label>
                            <input type="text" name="promotion">
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>
                    
                    <h2>Modifier une promotion d'étudiants</h2>	
                    
                    <form id="gradeFormS" action="index.php?action=gradeAddAsk" method="POST">
                        
                        <div class="form-group">
                            <select class="form-control" name="id_grade" id="modif">
                                <option value = "0">Promotions existantes</option>
                                <?php foreach ($allGrades as $grade) : ?>
                                    <option value = "<?php echo $grade['id_grade'] ?>"><?php echo $grade['grade_name'].' '.$grade['promotion']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                    </form>
                    
                    <form id="gradeFormM" action="index.php?action=gradeMod" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom de la promotion :</label>
                            <input type="hidden" name="id_grade" value=<?php echo '"'.$currentGrade['id_grade'].'"'; ?> />
                            <input type="text" name="grade_name" value=<?php echo '"'.$currentGrade['grade_name'].'"'; ?>>
                        </div>
                         <div class="form-group">
                            <label for="article">Année scolaire :</label>
                            <input type="text" name="promotion" value=<?php echo '"'.$currentGrade['promotion'].'"'; ?>>
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>