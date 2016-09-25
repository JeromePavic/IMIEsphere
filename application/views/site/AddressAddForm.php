<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Adresse</h1>
                    
                    <h2>Ajouter une adresse</h2>
                    <p><?php echo $message; ?></p>
                  
                  
                  		

                    <form id="addressFormA" action="index.php?action=addressAdd" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Ville :</label>
                            <select class="form-control" name="id_city" id="id_city">
                                <option value = "0">Sélectionnez la ville dans laquelle se situe l'adresse</option>
                                <?php foreach ($allCities as $city) : ?>
                                    <option value = "<?php echo $city['id_city'] ?>"><?php echo $city['city_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="article">Nom de la rue :</label>
                            <input type="text" name="city_name">
                        </div>
                        <div class="form-group">
                            <label for="article">Numéro :</label>
                            <input type="text" name="street_number">
                        </div>
                        <div class="form-group">
                            <label for="article">Batiment :</label>
                            <input type="text" name="building">
                        </div>
                        <div class="form-group">
                            <label for="article">Nom de la nouvelle addresse :</label>
                            <input type="text" name="address_name">
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>
                    
                    <h2>Modifier une adresse :</h2>
                    
                    <form id="addressFormS" action="index.php?action=addressAddAsk" method="POST">
                        
                        <div class="form-group">
                            <select class="form-control" name="id_address" id="modif">
                                <option value = "0">Adresses existantes</option>
                                <?php foreach ($allAddress as $address) : ?>
                                    <option value = "<?php echo $address['id_address'] ?>"><?php echo $address['city_name'].' - '.$address['address_name'].', '.$address['street_number'].' '.$address['street'].' '.$address['postal_code'].' '.$address['city_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        

                    </form>
                    
                    <form id="addressFormM" action="index.php?action=addressMod" method="POST">
                        
                        <div class="form-group">
                            <label for="article">Ville :</label>
                            <select class="form-control" name="id_city" id="id_city">
                                <option value = "<?php echo $currentAddress['id_city'] ?>"><?php echo $currentAddress['city_name'] ?></option>
                                <?php foreach ($allCities as $city) : ?>
                                    <option value = "<?php echo $city['id_city'] ?>"><?php echo $city['city_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="article">Nom de la rue :</label>
                            <input type="text" name="street" value = "<?php echo $currentAddress['street'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="article">Numéro :</label>
                            <input type="text" name="street_number" value = "<?php echo $currentAddress['street_number'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="article">Batiment :</label>
                            <input type="text" name="building" value = "<?php echo $currentAddress['building'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="article">Nom de l'addresse :</label>
                            <input type="hidden" name="id_address" value="<?php echo $currentAddress['id_address']; ?>" />
                            <input type="text" name="address_name" value = "<?php echo $currentAddress['address_name'] ?>">
                        </div>
                        
                        <button type="submit" class="btn btn-default">valider</button>
                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>