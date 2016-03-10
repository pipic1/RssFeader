<?php

//Default Repertory
$rep = __DIR__ . '/../';

//vue erreur 
$dataVueErreur = NULL;
//php view
$vues['erreur'] = 'view/error.php';
$vues['acceuil'] = 'view/acceuil.php';
$vues['connect'] = 'view/connect.php';
$vues['aide'] = 'view/aide.php';
$vues['admin'] = 'view/admin.php';


//Nombre d'article par pages
$newsParPage = 10;
$pageActuelle = 1;

//Liste d'action
$listActionAdmin = array('disconnect', 'update', 'nombre_article', 'deleteBDD', 'delete', 'formulaire');
?>


