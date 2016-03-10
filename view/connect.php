<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Connectez-vous</title>
        <link href="./view/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./view/dist/css/material-fullpalette.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <!-- Menu de la fenetre -->
        <div class="bs-component">
            <div class="navbar navbar-default">
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
                        <li class="active"><a href="?action=connect">Connexion</a></li>
                        <li><a href="?action=aide">Aide</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-primary" style="text-align: center;"><i class="material-icons" style="font-size: 60px;">person</i></h1>

                    <div class="form-group">
                        <center>
                            <div class="col-cg-6">
                                <form method="post" action="?action=connexion">
                                    <br>
                                    <input class="form-control" id="inputPseudo" placeholder="Pseudo" style="text-align: center;" type="login" name="login">
                                    <br>
                                    <input class="form-control" id="inputPassword" placeholder="Password" style="text-align: center;" type="password" name="password">
                                    <br>
                                    <input class="btn btn-success btn-raised" type="submit" value="Connexion" >
                                </form>

                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>