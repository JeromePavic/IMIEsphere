<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">
                <div class="col-sm-8">
                
                	<div class="titre"><h2>Gestion des utilisateurs</h2></div>
             			
			             <div class="table-responsive">
				             <table class="table">
								<thead>
									<tr>
										<th>Promotion IMIE</th>
										<th>Utilisateur</th>
										<th>id membre</th>
										<th>statut</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) : ?>
									<tr>
										<td><?php echo $user['grade_name'].' '.$user['promotion'] ?></td>
										<td><?php echo $user['lastname'].' '.$user['firstname'] ?></td>
										<td><?php echo $user['membership_number'] ?></td>
										<td><?php echo $user['role_name'] ?></td>
										<td><form method="POST" action="index.php?action=userUpdate">
											<input type="hidden" name="id" value="<?php echo $user['id_user'] ?>" />
											<input type="hidden" name="update" value="delete" />
											<button type="submit" class="btn btn-default">supprimer</button>
											</form></td>
										<td><form method="POST" action="index.php?action=userUpdate">
											<input type="hidden" name="id" value="<?php echo $user['id_user'] ?>" />
											<input type="hidden" name="update" value="member" />
											<button type="submit" class="btn btn-default">adhérent</button>
											</form></td>
										<td><form method="POST" action="index.php?action=userUpdate">
											<input type="hidden" name="id" value="<?php echo $user['id_user'] ?>" />
											<input type="hidden" name="update" value="admin" />
											<button type="submit" class="btn btn-default">administrateur</button>
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
