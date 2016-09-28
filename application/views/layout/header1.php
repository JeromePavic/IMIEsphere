<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>IMIEsphere</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <script src="assets/js/jquery-3.1.0.min.js"></script>
        <script src="assets/js/jquery/jquery-ui.min.js"></script>
        <script src="assets/js/jquery/jquery.timepicker.min.js"></script>
        <script src="assets/js/npm.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        
        <script src="assets/js/main.js"></script>

        <link rel="stylesheet" href="assets/js/jquery/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/js/jquery/jquery.timepicker.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" href="assets/css/style.css">
          
    </head>
    <body>

        <main class="container">
        
            <header class="row">
            
            	 <nav class="navbar navbar-inverse navbar-fixed-top">
			      <div class="container">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <a class="navbar-brand" href="index.php">IMIEsphere</a>
			        </div>
			        <div id="navbar" class="navbar-collapse collapse">
			          <ul class="nav navbar-nav">
                            <li><a href="index.php?action=calendar">Calendrier</a></li>
                            <li><a href="index.php?action=eventAddAsk">Créer un événement</a></li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" id ="btnMenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <li><a href="index.php?action=typeEventAddAsk">Ajouter/Modifier un type d'événement</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=gradeAddAsk">Ajouter/Modifier une promotion d'étudiants</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=cityAddAsk">Ajouter/Modifier une ville</a></li>
                                <li><a href="index.php?action=addressAddAsk">Ajouter/Modifier une adresse</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=userUpdateAsk">Utilisateurs</a></li>
                              	<li role="separator" class="divider"></li>
                                <li><a href="index.php?action=eventAdmin">Evénements</a></li>
                              </ul>
                            </li>
                          </ul>
			          <ul class="nav navbar-nav navbar-right">
                          	<?php if (isset($_SESSION['id_user'])) : ?>
	                          	<li><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></li>
	                            <li><a href="index.php?action=connection">Déconnexion</a></li>
                            <?php else : ?>
	                            <li><a href="index.php?action=connection">Connexion</a></li>
                            <?php endif; ?>
                          </ul>
			        </div>
			      </div>
			    </nav>
            

            
            </header>