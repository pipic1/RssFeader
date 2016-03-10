<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Panneau de gestion du site</title>
        <link href="./view/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./view/dist/css/material-fullpalette.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
    </head>
    <body>
        <!-- Menu de la fenetre -->
        <div class="bs-component">
            <div class="navbar navbar-inverse">
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
                        <li class="active"><a href="?action=disconnect">Deconnection</a></li>
                        <li><a href="?action=aide">Aide</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-inverse"><i class="material-icons" style="font-size: 45px;">edit</i>&nbsp;&nbsp;Fenetre d'administration</h1>
                    <br>
                    <br>

                    <!-- 1er jumbotron modfiier le flux rss -->
                    <div class="jumbotron">
                        <h3><i class="material-icons">insert_comment</i>&nbsp;&nbsp;Modifier le flux RSS</h3>
                        <p style="font-size: 12px;">Vous pouvez modifier le flux RSS de votre site ici, l'URL doit avoir cette forme :
                            <br>
                            <strong>http://www.example.domaine/nom_du_flux.xml</strong><br>
                            <strong>http://www.lemonde.fr/technologies/rss_full.xml</strong>
                        </p>
                        <form method="post" action="?action=update">
                            <input class="form-control" id="inputRSS" placeholder="Flux RSS" type="fluxRSS" name="fluxRSS">
                            <input class="btn btn-success btn-raised" type="submit" value="Mettre a jour" >  
                        </form>
                    </div>       

                    <!-- 2eme jumbotron modfiier le nombre d'article par pages-->
                    <div class="jumbotron">
                        <h3><i class="material-icons">format_list_numbered</i>&nbsp;&nbsp; Modifier le nombre d'article par page</h3>
                        <p style="font-size: 12px;">Vous pouvez modifier le nombre d'article afficher par page :</p>
                        <form method="post" action="?action=nombre_article">
                            <input class="form-control" id="nbArticleperPage" placeholder="Nombre d'Articles par pages " type="nbArticle" name="nbArticle">
                            <input class="btn btn-success btn-raised" type="submit" value="Mettre a jour" >  
                        </form>
                    </div>

                    <div class="jumbotron">
                        <h3><i class="material-icons">delete</i>&nbsp;&nbsp;Vider toutes les news </h3>
                        <p style="font-size: 12px;">Vous pouvez supprimer toute les news contenue dans la base de données, </p>
                        <p class="text-danger">Attention cette action est irreversible</p>
                        <form method="post" action="?action=deleteBDD">
                            <input class="btn btn-raised btn-danger" type="submit" value="Supprimer" >  
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>