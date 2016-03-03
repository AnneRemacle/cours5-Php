<?php
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
        $cn -> query( 'SET CHARACTER SET UTF8' );
        $cn -> query( 'SET NAMES UTF8' );
        // on définit que le jeu de caractères utilisés pour les échanges entre la base de données et PDO est bien UTF8
    } catch( PDOException $e ) { // on attrape l'exception dans une variable e qui contient l'erreur produite
        echo $e -> getMessage(); // quand on a un objet, pour accéder à ses propriétés ou méthodes publiques, on utilise une ->
    }
// le script est maintenant connecté à la base de données.
/*
Pour exécuter des req sql avec php, différentes fonctions sont disponibles:
la classe PDO qui représente la connexion
PDOStatement pour les requêtes
*/


    include( 'book.php' );
    include( 'view.php' );
