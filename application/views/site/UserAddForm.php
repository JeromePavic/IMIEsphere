<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12 center">
                
                    <h1>Inscription</h1>
                    <p><?php echo $message; ?></p>
                  

                    <form id="connection" action="index.php?action=userAdd" method="POST">
                        <div class="form-group">
                            <label for="article">Nom :</label>
                            <input type="text" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="article">Prénom :</label>
                            <input type="text" name="firstname">
                        </div>
                        <div class="form-group">
                            <label for="article">Email :</label>
                            <input type="text" name="email">
                        </div>
                        <div class="form-group">
                            <label for="article">Téléphone :</label>
                            <input type="text" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="article">Etudiant IMIE :</label>
                            <select class="form-control" name="id_grade" id="id_grade">
                                <option value = "0">Sélectionnez votre promotion</option>
                                <?php foreach ($allCurrentGrades as $grade) : ?>
                                    <option value = "<?php echo $grade['id_grade'] ?>"><?php echo $grade['grade_name'].' '.$grade['promotion']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="article">Mot de passe :</label>
                            <input type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="article">Resaisissez votre mot de passe :</label>
                            <input type="password" name="password2">
                        </div>
                        <button type="submit" class="btn btn-default">valider</button>

                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>