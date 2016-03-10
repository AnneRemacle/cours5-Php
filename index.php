<?php
    set_include_path( __DIR__ . '/controllers' . PATH_SEPARATOR . __DIR__ . '/models' . PATH_SEPARATOR . get_include_path() );

    spl_autoload_register( function( $class ) {
        include( $class . '.php' ); // on fait un include d'un fichier sur base du nom du fichier
    } );
//de là
    $dbConfig = parse_ini_file( 'db.ini' );
    $PDOOptions = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    /*
    :: = quand on crée une classe on le fait avec le mot clé class. Dans cette classe on définit fonctions et propriétés.
    Quand on fait un new, si on veut accéder à une prop, on fait -> qui permet d'accéder à une instance.
    Il peut exister à l'intérieur de la classe des prop statiques (on ne peut les utiliser que directement depuis la classe et pas à travers une instance. Dans ce cas, on doit utiliser la classe elle-même (ici PDO)::titi )
    L'intérêt des valeurs statiques est qu'elles sont partagées par plusieurs instances, contrairement aux autres qui sont propres à chaque instance.
    */

    try {
        $dsn = sprintf( '%s:host=%s; dbname=%s', $dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] );

        $cn = new PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $PDOOptions );
        // on vient de créer une connexion à la base de données
        $cn -> exec( 'SET CHARACTER SET UTF8' );
        $cn -> exec( 'SET NAMES UTF8' );
        // on définit que le jeu de caractères utilisés pour les échanges entre la base de données et PDO est bien UTF8
    } catch( PDOException $e ) { // on attrape l'exception dans une variable e qui contient l'erreur produite
        die( $e -> getMessage() ); // quand on a un objet, pour accéder à ses propriétés ou méthodes publiques, on utilise une ->
    }
// à de là
// le script est maintenant connecté à la base de données.
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
