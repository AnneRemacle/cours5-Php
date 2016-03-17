<?php
    namespace Model;

    // Model\Model => nom qualifié de la classe, c'est le Model qui est dans l'espace de noms Model
    class Model {
        protected $table = '';
        protected $cn = null;

        public function __construct() {
            $dbConfig = parse_ini_file( 'db.ini' );
            $PDOOptions = [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ];


            try {
                $dsn = sprintf( '%s:host=%s; dbname=%s', $dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] );

                $this -> cn = new \PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $PDOOptions );
                // on vient de créer une connexion à la base de données
                $this -> cn -> exec( 'SET CHARACTER SET UTF8' );
                $this -> cn -> exec( 'SET NAMES UTF8' );
                // on définit que le jeu de caractères utilisés pour les échanges entre la base de données et PDO est bien UTF8
            } catch( \PDOException $e ) { // on attrape l'exception dans une variable e qui contient l'erreur produite
                die( $e -> getMessage() ); // quand on a un objet, pour accéder à ses propriétés ou méthodes publiques, on utilise une ->
            }

        }


        public function all() {
            $sql = sprintf('SELECT * FROM ' . $this -> table); // on fait une requête
            // on stocke la requête dans une variable
            $pdoStmnt = $this -> cn -> query( $sql ); // on exécute la requête
            return $pdoStmnt -> fetchAll(); // crée un tableau d'objets avec ≠ infos
        }

        public function  find( $id ) {
            $sql = sprintf('SELECT * FROM ' .  $this -> table . ' WHERE id= :id');
            $stmnt = $this -> cn -> prepare( $sql );
            // Toutes les variables qui sont dans le scope global sont récupérables avec $GLOBALS qui est une sorte de super-variable
            $stmnt -> execute( [ ':id' => $id ] );
            return $stmnt -> fetch();
        }
    }

    /*
    :: = quand on crée une classe on le fait avec le mot clé class. Dans cette classe on définit fonctions et propriétés.
    Quand on fait un new, si on veut accéder à une prop, on fait -> qui permet d'accéder à une instance.
    Il peut exister à l'intérieur de la classe des prop statiques (on ne peut les utiliser que directement depuis la classe et pas à travers une instance. Dans ce cas, on doit utiliser la classe elle-même (ici PDO)::titi )
    L'intérêt des valeurs statiques est qu'elles sont partagées par plusieurs instances, contrairement aux autres qui sont propres à chaque instance.
    */
