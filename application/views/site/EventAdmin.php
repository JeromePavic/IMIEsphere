<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">
                <div class="col-sm-8">
                
                	<div class="titre"><h2>Gestion des événements</h2></div>
             			
			             <div class="table-responsive">
				             <table class="table">
								<thead>
									<tr>
										<th>Date</th>
										<th>Evénement</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($events as $event) : ?>
									<tr>
										<td><?php echo $event['event_start'] ?></td>
										<td><?php echo $event['event_name'] ?></td>
										<td><form method="POST" action="index.php?action=eventUser">
											<input type="hidden" name="id" value="<?php echo $event['id_event'] ?>" />
											<button type="submit" class="btn btn-default">détails</button>
											</form></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
			             </div>
                   		
                    
				</div>
                <?php if(isset($_SESSION['id_role'])) : ?>
                    <?php require_once('application/views/layout/side.php'); ?>
                <?php endif; ?>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>
