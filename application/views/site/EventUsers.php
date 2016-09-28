<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">
                <div class="col-sm-8">
                
                	<div class="titre"><h2></h2></div>
             			
			             <div class="table-responsive">
				             <table class="table">
								<thead>
									<tr>
										<th>Utilisateur</th>
										<th>Promotion</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) : ?>
									<tr>
										<td><?php echo $user['firstname'].' '.$user['lastname'] ?></td>
										<td><?php echo $user['grade_name'].' '.$user['promotion'] ?></td>
										<td><?php echo $user['email'] ?></td>
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
