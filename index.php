<?php
    $dbConfig = parse_ini_file( 'db.ini' );

    try {
        $dsn = sprintf( 'mysql:host=%s; dbname=%s', $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] );

        $cn = new PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ] );
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
