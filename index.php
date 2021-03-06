<?php
    require 'vendor/autoload.php';

/*
Pour exécuter des req sql avec php, différentes fonctions sont disponibles:
la classe PDO qui représente la connexion
PDOStatement pour les requêtes
*/
    include( 'routes.php' );

    $a = isset( $_REQUEST[ 'a' ] ) ? $_REQUEST[ 'a' ] : 'index'; // request = méta tableau qui regroupe get et post
    $e = isset( $_REQUEST[ 'e' ] ) ? $_REQUEST[ 'e' ] : 'books'; // par défaut, la page qui va s'afficher est la liste des livres
    // on teste si il y a un paramètre a ou un paramètre e dans l'url

    if( !in_array( $a .'_' . $e , $routes ) ) {
        die( 'Cette route n’est pas permise' );
    }

    $controller_name = '\Controller\\' . ucfirst( $e ) . 'Controller'; // ucfirst met en uppercase la premiere lettre
    $controller = new $controller_name();

    $datas = call_user_func( [ $controller, $a ] ); // on donne un contexte à $a pour qu'elle fonctionne


    include( 'views/view.php' );
