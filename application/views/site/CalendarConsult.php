<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">
                <div class="col-sm-8 bloc">
                
                <div class="titre"><h2>Evenements</h2></div>
             
                    <?php foreach ($allEvents as $event) : ?>
                   
                        <div class="sous-bloc">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="http://lorempixel.com/500/400" alt="" />
                                </div>
                                <article class="col-md-8">
                            		<header>
	                            		<h2><a href="index.php?action=eventShow&id_event=<?php echo $event['id_event']; ?>" id="link" ><?php echo $event['event_name']; ?></a></h2>
                                		<p class="article-info"><?php echo $event['event_start'] ?></p>
                            		</header>
                            		<section><?php echo $event['event_description'] ?></section>
                            		<footer>
                                		<span><?php echo $event['address_name'].', '.$event['city_name'] ?></span>
                           		 	</footer>
                        		</article>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <?php if(isset($_SESSION['id_role'])) : ?>
                    <?php require_once('application/views/layout/side.php'); ?>
                <?php endif; ?>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>
