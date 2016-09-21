<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12 center">
                
                    <h1>Création d'événement</h1>
                    <p><?php echo $message; ?></p>
                  

                    <form id="connection" action="index.php?action=eventAdd" method="POST">
                        <div class="form-group">
                            <label for="article">Type d'événement :</label>
                            <select class="form-control" name="id_type_event" id="id_type_event">
                                <option value = "0">Sélectionnez le type d'événement</option>
                                <?php foreach ($allTypeEvent as $typeEvent) : ?>
                                    <option value = "<?php echo $typeEvent['id_type_event'] ?>"><?php echo $typeEvent['type_event_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="article">Nom de l'événement :</label>
                            <input type="text" name="event_name">
                        </div>
                        <div class="form-group">
                            <label for="article">Description de l'événement :</label>
                            <input type="text" name="event_description">
                        </div>
                        <div class="form-group" id="start">
                            <label for="article">Date de l'événement :</label>
                            <input type="text" name="date_start" class="date"/>
                            <input type="text" name="time_start" class="time" />
                        </div>
                        <div class="form-group" id="end">
                            <label for="article">Fin de l'événement :</label>
                            <input type="text" name="date_end" class="date"/>
                            <input type="text" name="time_end" class="time" />
                        </div>
                        <div class="form-group">
                            <label for="article">Lieu de l'événement :</label>
                            <select class="form-control" name="id_address" id="id_address">
                                <option value = "0">Sélectionnez l'adresse de l'événement</option>
                                <?php foreach ($allAddress as $address) : ?>
                                    <option value = "<?php echo $address['id_address'] ?>"><?php echo $address['city_name'].' - '.$address['address_name'].', '.$address['street_number'].' '.$address['street'].' '.$address['postal_code'].' '.$address['city_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                       
                        <button type="submit" class="btn btn-default">valider</button>

                    </form>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>