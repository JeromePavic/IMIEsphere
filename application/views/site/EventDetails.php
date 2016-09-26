<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">
                <div class="col-sm-8">
                
                    <h1><?php echo $event['event_name'] ?></h1>

                        <article class="article">
                            <header>
                                <h3>Détails de l'événement :</h3>
                                <p class="article-info"><?php echo 'du '.$event['event_start'].' au '. $event['event_end']; ?></p>
                            	<p class="article-info"><?php echo $event['address_name'].', '.$event['building'].' '.$event['street_number'].' '.$event['street']; ?></p>
                            	<p class="article-info"><?php echo $event['city_name']; ?></p>
                            </header>
                            <section><?php echo $event['event_description'] ?></section>
                            <footer>
                                <p>places disponibles : <span id="availability">0</span></p>
                                <p>prix : <?php echo $registration['price'].'€'; ?></p>
                            </footer>
                            
                        </article>
                        
                        <form id="userRegistration" action="index.php?action=userRegistration" method="POST">
                            <input type="hidden" name="id_registration" value="<?php echo $registration['id_registration']; ?>" />
                        	<button type="submit" class="btn btn-default" id="register">Je m'inscris!</button>
                    	</form>

                </div>

                <?php if(isset($_SESSION['id_role'])) : ?>
                    <?php require_once('application/views/layout/side.php'); ?>
                <?php endif; ?>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>
