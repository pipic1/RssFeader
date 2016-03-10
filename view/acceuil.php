<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>RSS FEEDER</title>
        <link href="./view/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./view/dist/css/material-fullpalette.min.css" rel="stylesheet">	
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <!-- Menu de la fenetre -->
        <div class="bs-component">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-header">
                    <a class="navbar-brand" href="?action">RSSREADER v0.1</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="?action">Acceuil</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" method="post" action="?action=search">
                        <input type="./view/text" class="form-control col-lg-8" placeholder="Search" type="searchtext" name="searchtext">
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (ModelAdmin::isAdmin()) {
                            echo '<li class="active"><a href="?action=disconnect">Deconnection</a></li>';
                            echo '<li><a href="?action=formulaire">Gérer</a></li>';
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
        <div class="container-fluid main">
            <div class="row">
                <nav class="col-xs-2 " style="margin-left: -50px;">
                    <ul style="list-style-type: none;">
                        <li data-target="#about">
                            <a href="" class="btn btn-default">Toute les news</a>
                        </li>
                        <li data-target="#about">
                            <a href="" class="btn btn-default">Monde</a>
                        </li>
                        <li data-target="#about">
                            <a href="" class="btn btn-default">Technologie</a>
                        </li>
                    </ul>
                </nav>

                <div class="pages col-xs-9">
                    <!-- Header, div obligatoire -->
                    <div class="page-header">
                        <br><br>
                        <h1 id="tables">Flux RSS</h1>
                    </div>

                    <div class="bs-component">
                        <table class="table table-striped table-hover ">
                            <tbody>
                                <?php
                                // $tabNews 
                                /* @News $affich type */
                                if (!isset($tabNews)) {
                                    echo 'Aucune news n est presente dans la BDD';
                                } else {
                                    foreach ($tabNews as $affich) {
                                        echo '<tr>
                                        <div class="panel panel-primary">
                                        <div class="panel-heading">';
                                        if (ModelAdmin::isAdmin()) {
                                            echo '<form method="post" action="?action=delete&id=' . $affich->getID() . '">'
                                            . '<button type="submit" class="close" data-dismiss="modal" aria-hidden="true">×</button>'
                                            . '</form>';
                                        }
                                        echo '<h3 class="panel-title"><strong>' . $affich->getTitle() . '</strong></h3></div>
                                        <div class="panel-body">';
                                        echo html_entity_decode($affich->getDescription());
                                        echo '<a href="' . $affich->getLink() . '" class="btn btn-success btn-flat pull-right" target="_blank">Lire l\'article <i class="mdi-navigation-arrow-forward"></i></a></div>
                                        <div class="panel-footer">
                                        <p class="text-primary">Ce flux a &eacutet&eacute publi&eacute le ' . date("D, d M y H:i:s ", strtotime($affich->getPubDate())) . '<p class="text-primary" style="text-align: right;">Categorie :<strong>' . $affich->getCategory() . '</strong>.</p></p>      
                                        </div></div></tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <ul class="pager">

                        <?php
                        $nbnews = ModelNews::getNbNews();
                        for ($i = 1; $i <= $nbnews[0] / 10; $i++) {

                            echo '<li><a class="withripple" href="?action=getPage&page=' . $i . '">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
