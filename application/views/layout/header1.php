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
            
                <nav class="navbar navbar-inverse navbar-default">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="index.php">IMIEsphere</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                            <li><a href="index.php?action=eventAddAsk">Créer un événement</a></li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" id ="btnMenu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <li><a href="index.php?action=typeEventAddAsk">Ajouter un type d'événement</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=gradeAddAsk">Ajouter une promotion d'étudiants</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=cityAddAsk">Ajouter une ville</a></li>
                                <li><a href="index.php?action=addressAddAsk">Ajouter une adresse</a></li>
                              </ul>
                            </li>
                          </ul>
                            <form class="navbar-form navbar-left">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                              </div>
                              <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php?action=connection">connexion</a></li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown test <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                </nav>

            
            </header>