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
        
        <link rel="stylesheet" href="assets/css/test.css">
          
    </head>
    <body>

        <main class="container">
        
            <header class="row">
            
                <nav class="navbar navbar-inverse navbar-default">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          </button>
                          <a class="navbar-brand" href="#">IMIEsphere</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                          	<li><a href="index.php?action=calendar">Calendrier</a></li>
                          </ul>
                          <ul class="nav navbar-nav navbar-right">
                          	<?php if (isset($_SESSION['id_user'])) : ?>
	                          	<li><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></li>
	                            <li><a href="index.php?action=connection">déconnexion</a></li>
                            <?php else : ?>
	                            <li><a href="index.php?action=connection">connexion</a></li>
                            <?php endif; ?>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                </nav>

            
            </header>