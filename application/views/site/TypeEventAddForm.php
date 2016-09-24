<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Nouveau type d'événement</h1>
                    <p><?php echo $message; ?></p>
                  

                    <form id="connection" action="index.php?action=typeEventAdd" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom du nouveau type:</label>
                            <input type="text" name="type_event_name">
                        </div>
                        <div class="form-group">
                            <label for="article">Description du nouveau type d'événement :</label>
                            <textarea class="form-control" rows="3" name="type_event_description" id="type_event_description"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>