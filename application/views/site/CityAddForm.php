<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Ville</h1>
                    <p><?php echo $message; ?></p>
                  
					<h2>Ajouter une ville</h2>	
                        
                        
                        
                    <form id="cityFormA" action="index.php?action=cityAdd" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom de la nouvelle ville :</label>
                            <input type="text" name="city_name">
                        </div>
                         <div class="form-group">
                            <label for="article">code postal :</label>
                            <input type="text" name="postal_code">
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>

                    
                    <h2>Modifier une ville</h2>
                    
                    <form id="cityFormS" action="index.php?action=cityAddAsk" method="POST">
                        
                        <div class="form-group">
                            <select class="form-control" name="id_city" id="modif">
                                <option value = "0">Villes existantes</option>
                                <?php foreach ($allCities as $city) : ?>
                                    <option value = "<?php echo $city['id_city'] ?>"><?php echo $city['city_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        

                    </form>
                    
                    <form id="cityFormM" action="index.php?action=cityMod" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Nom de la ville :</label>
                            <input type="hidden" name="id_city" value="<?php echo $currentCity['id_city']; ?>" />
                            <input type="text" name="city_name" value = "<?php echo $currentCity['city_name']; ?>"/>
                        </div>
                         <div class="form-group">
                            <label for="article">code postal :</label>
                            <input type="text" name="postal_code" value = "<?php echo $currentCity['postal_code'] ?>"/>
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>
                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>