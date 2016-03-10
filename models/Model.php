<?php
    class Model {
        protected $table = '';
        protected $cn = null;
        // instancier cn dans le constructeur du modèle et le réutiliser

        

        public function getRows() {
            $sql = 'SELECT * FROM ' . $this -> table; // on fait une requête
            // on stocke la requête dans une variable
            $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $sql ); // on exécute la requête
            return $pdoStmnt -> fetchAll(); // crée un tableau d'objets avec ≠ infos
        }
        public function getRow( $id ) {
            $sql = 'SELECT * FROM ' . . $this -> table . ' WHERE id= :id';
            $stmnt = $GLOBALS[ 'cn' ] -> prepare( $sql );
            // Toutes les variables qui sont dans le scope global sont récupérables avec $GLOBALS qui est une sorte de super-variable
            $stmnt -> execute( [ ':id' => $id ] );
            return $stmnt -> fetch();
        }
    }
