<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Nouvelle ville</h1>
                    <p><?php echo $message; ?></p>
                  

                    <form id="cityForm" action="index.php?action=cityAdd" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom de la nouvelle promotion :</label>
                            <input type="text" name="city_name">
                        </div>
                         <div class="form-group">
                            <label for="article">code postal :</label>
                            <input type="number" name="postal_code">
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>