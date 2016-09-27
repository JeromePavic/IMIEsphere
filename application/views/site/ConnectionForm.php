<?php require_once('application/views/layout/header'.$currentRole.'.php'); ?>



            <div class="row">

                <div class="col-sm-12 center">
                
                    <h1>Connexion</h1>
                    <p><?php echo $message; ?></p>

                    <form id="connection" action="index.php?action=connection" method="POST">
                        <div>
                            <label for="article">Email :</label>
                            <input type="text" name="email">
                        </div>
                        <div>
                            <label for="article">Mot de passe :</label>
                            <input type="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">connexion</button>

                    </form>

                    <a href="index.php?action=userAddAsk">Nouvel utilisateur ? Inscrivez-vous...</a>

                </div>
                
            </div>



<?php require_once('application/views/layout/footer.php'); ?>