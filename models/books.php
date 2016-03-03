<?php
    function getBooks() {
        $booksStmnt = 'SELECT * FROM books';
        // on stocke la requête dans une variable
        $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $booksStmnt );
        return $pdoStmnt -> fetchAll();
    }
    function getBook( $id ) {
        $bookSql = 'SELECT * FROM books WHERE id= :id';
        $bookStmnt = $GLOBALS[ 'cn' ] -> prepare( $bookSql );
        // Toutes les variables qui sont dans le scope global sont récupérables avec $GLOBALS qui est une sorte de super-variable
        $bookStmnt -> execute( [ ':id' => $id ] );
        return $bookStmnt -> fetch();
    }
