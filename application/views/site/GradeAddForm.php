<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Nouvelle promotion d'étudiants</h1>
                    <p><?php echo $message; ?></p>
                  

                    <form id="gradeForm" action="index.php?action=gradeAdd" method="POST">
                        
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

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>