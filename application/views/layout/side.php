                <div class="col-sm-4">
                    <aside>

                        <div class="post-recents">
                            <h3><?php echo $_COOKIE['userInfos']['firstname'].' '.$_COOKIE['userInfos']['firstname']; ?></h3>
                        </div>

                        <div class="categories liste">
                            <h3>Votre profil</h3>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-perso"><?php echo 'email : '.$_COOKIE['userInfos']['email']; ?> </a>
                                <a href="#" class="list-group-item list-perso "><?php echo 'téléphone : '.$_COOKIE['userInfos']['phone']; ?> </a>
                                <a href="#" class="list-group-item list-perso"><?php echo 'promotion : '.$_COOKIE['userInfos']['grade_name'].' '.$_COOKIE['userInfos']['promotion']; ?> </a>
                            </div>
                        </div>
                        <div class="commentaires-recents liste">
                            <h3>Vos prochains événements</h3>
                            <div class="list-group">

                            	<?php foreach ($_COOKIE['userEvents'] as $event) : ?>
                   
                        			<article class="list-group-item list-perso">
                            			<header>
	                            		<h4><a href="index.php?action=eventShow&id_event=<?php echo $event['id_event']; ?>" id="link" ><?php echo $event['event_name']; ?></a></h4>
                                		<p class="article-info"><?php echo $event['event_start'] ?></p>
                           				</header>
                            			<footer>
                                			<span><?php echo $event['address_name'].', '.$event['city_name'] ?></span>
                            			</footer>
                        			</article>

                    			<?php endforeach; ?>
                            
                            </div>
                        </div>
                      
                    </aside>
                </div>