<?php
    $viewsDir = __DIR__ . '/views';
    $modelsDir = __DIR__ . '/models';
    $controllerDir = __DIR__ . '/controllers';

    set_include_path( __DIR__ . '/controllers' . PATH_SEPARATOR . __DIR__ . '/models' . PATH_SEPARATOR . get_include_path() );

    spl_autoload_register( function( $class ) {
        include( $class . '.php' ); // on fait un include d'un fichier sur base du nom du fichier
    } );

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

    $controller_name = ucfirst( $e ) . 'Controller'; // ucfirst met en uppercase la premiere lettre
    $controller = new $controller_name();

    $datas = call_user_func( [ $controller, $a ] ); // on donne un contexte à $a pour qu'elle fonctionne


    include( 'views/view.php' );
