<?php
    class Books {
        public function getBooks() {
            $booksStmnt = 'SELECT * FROM books'; // on fait une requête
            // on stocke la requête dans une variable
            $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $booksStmnt ); // on exécute la requête
            return $pdoStmnt -> fetchAll(); // crée un tableau d'objets avec ≠ infos
        }
        public function getBook( $id ) {
            $bookSql = 'SELECT * FROM books WHERE id= :id';
            $bookStmnt = $GLOBALS[ 'cn' ] -> prepare( $bookSql );
            // Toutes les variables qui sont dans le scope global sont récupérables avec $GLOBALS qui est une sorte de super-variable
            $bookStmnt -> execute( [ ':id' => $id ] );
            return $bookStmnt -> fetch();
        }
    }
