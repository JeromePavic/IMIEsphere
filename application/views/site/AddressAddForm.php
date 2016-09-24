<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12">
                
                    <h1>Nouvelle adresse</h1>
                    <p><?php echo $message; ?></p>
                  

                    <form id="cityForm" action="index.php?action=addressAdd" method="POST">
                        
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

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>