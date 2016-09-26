<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Types d'événements</h1>
                    <p><?php echo $message; ?></p>
                  		
                  
                  	<h2>Ajouter un type d'événement</h2>
                  	

                    <form id="typeEventA" action="index.php?action=typeEventAdd" method="POST">
                        
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
                    
                    <h2>Modifier un type d'événement</h2>
                    
                    <form id="typeEventS" action="index.php?action=typeEventAddAsk" method="POST">
                        
                        <div class="form-group">
                            <select class="form-control" name="id_type_event" id="modif">
                                <option value = "0">Types d'événements existants</option>
                                <?php foreach ($allTypeEvent as $typeEvent) : ?>
                                    <option value = "<?php echo $typeEvent['id_type_event'] ?>"><?php echo $typeEvent['type_event_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        

                    </form>
                    
                    <form id="typeEventM" action="index.php?action=typeEventMod" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom du type d'événement :</label>
                            <input type="hidden" name="id_type_event" value=<?php echo '"'.$currentTypeEvent['id_type_event'].'"'; ?> />
                            <input type="text" name="type_event_name" value=<?php echo '"'.$currentTypeEvent['type_event_name'].'"'; ?>>
                        </div>
                        <div class="form-group">
                            <label for="article">Description du type d'événement :</label>
                            <textarea class="form-control" rows="3" name="type_event_description" id="type_event_description"><?php echo $currentTypeEvent['type_event_description']; ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>