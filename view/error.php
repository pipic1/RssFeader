<!DOCTYPE html>
<html>
    <?php global $dataVueErreur; ?>
    <head>
        <meta charset="utf-8">
        <title>RSS FEEDER</title>
        <link href="./view/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./view/dist/css/material-fullpalette.min.css" rel="stylesheet">		
    </head>
    <body>
        <!-- Menu de la fenetre -->
        <div class="bs-component">
            <div class="navbar navbar-warning">
                <div class="navbar-header">
                    <a class="navbar-brand" href="?action">RSSREADER v0.1</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="?action">Acceuil</a></li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <input type="./view/text" class="form-control col-lg-8" placeholder="Search">
                    </form>
                    <ul class="nav navbar-nav navbar-right">                        
                        <?php
                        if (ModelAdmin::isAdmin()) {
                            echo '<li class="active"><a href="?action=disconnect">Deconnection</a></li>';
                        } else {
                            echo '<li class="active"><a href="?action=connect">Connexion</a></li>';
                        }
                        ?>
                        <li><a href="?action=aide">Aide</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- SideBar, test -->

        <!-- Corps de la page -->
    <center>
        <h1 id="tables" style="color: red">ERREUR SURVENUE</h1>     
        <h3 style="color: red;text-align: center;">Description: <?php echo $dataVueErreur; ?></h3>
    </center>
</body>
</html>
