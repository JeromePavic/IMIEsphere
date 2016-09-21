<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">
                <div class="col-sm-8">
                
                    <h1></h1>

                    <?php foreach ($allEvents as $event) : ?>
                   
                        <article class="article">
                            <header>
                                <h2><?php echo $event['event_name'] ?></h2>
                                <p class="article-info"><?php echo $event['event_start'] ?></p>
                            </header>
                            <section><?php echo $event['event_description'] ?></section>
                            <footer>
                                <span><?php echo $event['address_name'].', '.$event['city_name'] ?></span>
                            </footer>
                        </article>

                    <?php endforeach; ?>
                </div>

                <?php if(isset($_SESSION['id_role'])) : ?>
                    <?php require_once('application/views/layout/side.php'); ?>
                <?php endif; ?>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>
